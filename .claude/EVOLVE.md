# Self-Evolving Loop

Agents treat Ecologikal docs as a living system. After meaningful work, update the knowledge base so the next session starts smarter.

## When to run

Run a loop pass when any of these happen:

- You discovered a reusable primitive, pattern, or product idea not yet documented
- Code contradicted STATUS / VISION / PRIMITIVES
- You completed a feature, audit, or salvage of an old module
- You fixed a bug class that should never recur
- Session end after substantial exploration

Skip for trivial one-line edits with no new insight.

## Loop

```
1. OBSERVE   What did we learn that future agents need?
2. CLASSIFY  primitive | pattern | ui | product-idea | living|dead | bug-class
3. WRITE     Update the matching file (see routing table)
4. LOG       One dated bullet in living/LEARNINGS.md
5. REFLECT   Did CLAUDE.md still point to truth? Fix pointers if not.
```

## Routing table

| Classification | Write to |
|----------------|----------|
| Cross-cutting product OS concept | `knowledge/PRIMITIVES.md` |
| Code / architecture reuse | `knowledge/PATTERNS.md` |
| IA, visual, interaction | `knowledge/UI.md` |
| Business / market relevance | `product/VISION.md` |
| Completeness of a module | `living/STATUS.md` |
| Non-obvious session insight | `living/LEARNINGS.md` (always) |
| Recurring bug class + inoculation | `living/BUGS.md` (create if needed) |
| Entry-point / rules change | `../CLAUDE.md` |
| Certexi integration / Eco map | `../docs/VERTICAL_PLAYBOOK.md` |
| Eco NC host/guest tenancy | `../docs/NEXTCLOUD_TENANCY.md` |
| Generic SSO / proof methods | Certexi `architecture/PLATFORM-INTEGRATION.md` |
| Upstream asks to Certexi | playbook § Upstream (do not fork a second file) |

## Reference vertical stance

Ecologikal is a **Certexi reference vertical** — sibling repo, own Nextcloud,
SSO + proof consumer. Never “fix” integration by merging into Certexi.
Document seam changes in the playbook before inventing new auth paths.

## Write rules

1. **Compress** — Prefer a bullet + file path over essays.
2. **Cite** — Always include a path or table name.
3. **Don't invent** — If it's not in code/SQL, mark as `idea:` not `exists:`.
4. **Promote carefully** — Only promote mock/UI into “living” after verifying a real data path.
5. **Subtract duplicates** — If two docs say the same thing, keep one and link.
6. **Preserve primitives** — Never “simplify away” petals, KINS, amplify/broadcast, or role graphs without explicit human request.

## Session end checklist

- [ ] LEARNINGS.md has ≥1 line if the session taught something
- [ ] STATUS.md updated if living/dead boundary moved
- [ ] CLAUDE.md “product primitives” list still accurate
- [ ] No secrets (passwords, tokens, connection strings) written into docs

## Quality bar for a “primitive”

A concept earns a PRIMITIVES.md entry only if it:

1. Appears in **more than one** surface (schema + UI, or multiple functions), AND
2. Would still be valuable in a greenfield rewrite, AND
3. Is not merely a PHP-era implementation detail

## Example log line

```md
- 2026-07-23 — `get_userfeed()` exists only in Dropbox conflict copy; live `functions.php` lacks it. STATUS: user feed = dormant/orphan.
```
