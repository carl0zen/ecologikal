#!/usr/bin/env node
/**
 * Repo-invariant guard gate.
 *
 * Enforces the invariants declared in CLAUDE.md so a refactor (or an agent)
 * cannot silently dilute a product primitive or extend the frozen archive.
 *
 * Checks (all run; the gate fails if any FAIL):
 *   1. Petal taxonomy — IDs 1..7 with their canonical names are intact.
 *   2. Frozen/parasitic paths — no staged edits under the archive or conflict copies.
 *   3. Secrets — no obvious private keys / cloud keys / credential assignments in staged diffs.
 *
 * Usage:
 *   node scripts/gate-invariants.mjs            # scan staged changes (hook mode)
 *   node scripts/gate-invariants.mjs --all      # scan whole working tree (petals only)
 *
 * Escape hatch for a *deliberate* archive/banner edit (zengineer "Removable?"):
 *   ECO_ALLOW_ARCHIVE_EDIT=1 git commit ...
 */

import { execSync } from 'node:child_process';
import { readFileSync, existsSync } from 'node:fs';

const ALL = process.argv.includes('--all');
const TTY = process.stdout.isTTY;
const RESET = TTY ? '\x1b[0m' : '';
const RED = TTY ? '\x1b[31m' : '';
const GREEN = TTY ? '\x1b[32m' : '';
const YELLOW = TTY ? '\x1b[33m' : '';

const failures = [];
const notes = [];

function sh(cmd) {
  return execSync(cmd, { encoding: 'utf8' });
}

function stagedFiles() {
  try {
    return sh('git diff --cached --name-only --diff-filter=ACMR')
      .split('\n')
      .map((s) => s.trim())
      .filter(Boolean);
  } catch {
    return [];
  }
}

function stagedAddedLines() {
  // Only added ('+') lines from the staged diff, so we don't flag pre-existing content.
  try {
    const diff = sh('git diff --cached --unified=0');
    return diff
      .split('\n')
      .filter((l) => l.startsWith('+') && !l.startsWith('+++'))
      .map((l) => l.slice(1));
  } catch {
    return [];
  }
}

// ── 1. Petal taxonomy invariant ────────────────────────────────────────────
const PETALS_FILE = 'packages/domain/src/petals.ts';
const CANONICAL_PETALS = [
  [1, 'Building'],
  [2, 'Community Gov'],
  [3, 'Finance & Economics'],
  [4, 'Land & Nature'],
  [5, 'Culture & Education'],
  [6, 'Tools & Technology'],
  [7, 'Health & Spirituality'],
];

function petalSource() {
  // In hook (staged) mode, judge the *staged* content, not the working tree, so a
  // staged change can't hide behind a reverted working copy. Fall back to disk.
  if (!ALL) {
    try {
      return sh(`git show :${PETALS_FILE}`);
    } catch {
      /* not staged / not in index — use working tree below */
    }
  }
  if (!existsSync(PETALS_FILE)) return null;
  return readFileSync(PETALS_FILE, 'utf8');
}

function checkPetals() {
  const src = petalSource();
  if (src === null) {
    failures.push(`Petal SSOT missing: ${PETALS_FILE}`);
    return;
  }
  for (const [id, name] of CANONICAL_PETALS) {
    const idOk = new RegExp(`\\bid:\\s*${id}\\b`).test(src);
    const nameOk = src.includes(`name: '${name}'`) || src.includes(`name: "${name}"`);
    if (!idOk || !nameOk) {
      failures.push(
        `Petal invariant broken: expected id ${id} → "${name}" in ${PETALS_FILE}`,
      );
    }
  }
  // Guard against an 8th petal sneaking in.
  const idCount = (src.match(/\bid:\s*[0-9]+/g) || []).length;
  if (idCount > 7) {
    failures.push(
      `Petal taxonomy must stay at 7 (found ${idCount} id: entries in ${PETALS_FILE})`,
    );
  }
}

// ── 2. Frozen / parasitic paths ────────────────────────────────────────────
// Hard-frozen: never edited, no escape hatch.
const PARASITIC = [
  /(^|\/)frontend_bkp\//,
  /conflicted copy/i,
  /conflict copy/i,
  /(^|\/)error_log$/,
];
// Archive: read-only product memory. Editable only with ECO_ALLOW_ARCHIVE_EDIT=1.
const ARCHIVE = [
  /(^|\/)backend\//,
  /(^|\/)frontend\//,
  /(^|\/)greenble_ecologikalv1\.sql$/,
];

function checkPaths(files) {
  const allowArchive = process.env.ECO_ALLOW_ARCHIVE_EDIT === '1';
  for (const f of files) {
    if (PARASITIC.some((re) => re.test(f))) {
      failures.push(`Parasitic file must never be edited: ${f}`);
      continue;
    }
    if (ARCHIVE.some((re) => re.test(f))) {
      if (allowArchive) {
        notes.push(`archive edit allowed via ECO_ALLOW_ARCHIVE_EDIT: ${f}`);
      } else {
        failures.push(
          `Archive is frozen: ${f} (set ECO_ALLOW_ARCHIVE_EDIT=1 for a deliberate salvage/banner edit)`,
        );
      }
    }
  }
}

// ── 3. Secrets in staged additions ─────────────────────────────────────────
const SECRET_PATTERNS = [
  [/-----BEGIN (RSA |EC |OPENSSH |DSA |PGP )?PRIVATE KEY-----/, 'private key'],
  [/\bAKIA[0-9A-Z]{16}\b/, 'AWS access key id'],
  [/\bgh[pousr]_[A-Za-z0-9]{30,}\b/, 'GitHub token'],
  [/\bxox[baprs]-[A-Za-z0-9-]{10,}\b/, 'Slack token'],
  [
    /(password|passwd|secret|api[_-]?key|token)\s*[:=]\s*['"][^'"]{6,}['"]/i,
    'hardcoded credential',
  ],
];
// Obvious placeholders we don't want to flag.
const PLACEHOLDER = /(changeme|example|placeholder|your[_-]?|xxx+|<[^>]+>|\$\{)/i;

function checkSecrets(lines) {
  for (const line of lines) {
    if (PLACEHOLDER.test(line)) continue;
    for (const [re, label] of SECRET_PATTERNS) {
      if (re.test(line)) {
        failures.push(`Possible ${label} in staged change: ${line.trim().slice(0, 80)}`);
        break;
      }
    }
  }
}

// ── run ─────────────────────────────────────────────────────────────────────
checkPetals();
if (!ALL) {
  const files = stagedFiles();
  checkPaths(files);
  checkSecrets(stagedAddedLines());
}

for (const n of notes) console.log(`${YELLOW}note${RESET}  ${n}`);

if (failures.length) {
  console.error(`\n${RED}✖ invariant gate FAILED${RESET} (${failures.length}):`);
  for (const f of failures) console.error(`  ${RED}·${RESET} ${f}`);
  console.error(
    `\nThese invariants come from CLAUDE.md. Fix the change, or use the documented escape hatch.\n`,
  );
  process.exit(1);
}

console.log(`${GREEN}✓ invariant gate passed${RESET}`);
