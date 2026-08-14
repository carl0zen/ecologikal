# Ecologikal — Agent Guide

## What this is (read this first)

**Ecologikal is a regenerative eco-social network.** People declare skills, earn
peers' references, build reputation as a living *flower*, gather at *eco-centers*,
travel collaboratively, and exchange an ecosocial currency (**KINS**). Everything
is organized under one **7-petal taxonomy** and navigated by six *modes of being*
(Juega · Viaja · Descubre · Aprende · Conoce · Coopera).

Two stacks coexist in this one repo:

- **Archive** — vintage PHP (~2011–2012) at the repo root. The original product,
  now frozen. **Read it to recover primitives; never extend it.**
- **Revival** — Next.js + TypeScript under `apps/` + `packages/`. Where all new
  work goes.

It also serves as a **reference vertical for the Certexi platform OS**: proof that
an independent business (own users, own Nextcloud, own domain) can ride shared
platform services — SSO, proof receipts, tenancy — *without merging its repo into
Certexi*. That seam is load-bearing, not decorative. Keep it.

**The real asset is the primitives, not the code.** The PHP will be deleted; the
8 primitives below must survive every rewrite unchanged.

## For /zengineer specifically

This repo is already mapped for subtraction. Before you diagnose:

- **The Living/Archive/Parasitic map already exists** →
  [`.claude/living/STATUS.md`](.claude/living/STATUS.md). Trust it; correct it if
  reality drifted. Don't re-derive it from scratch.
- **Parasitic (safe to ignore, never "fix"):** `frontend_bkp/`, Dropbox conflict
  copies, `error_log`. These steal attention and produce nothing.
- **Archive (do NOT simplify or delete):** root `*.php`, `backend/`, `frontend/`,
  `greenble_ecologikalv1.sql`. This is product *memory*. Subtracting it destroys
  the primitives' provenance. It is frozen, not dead.
- **Invariants — never subtract these**, no matter how much simpler it looks:
  petal IDs `1..7` and their meanings; the host/guest Nextcloud account classes;
  the Certexi bridge boundary (`packages/certexi-bridge`); the 8 primitives.
- **SSOT boundaries** (so you don't "merge" a real seam into noise):
  - Domain truth = `packages/domain` (pure TS). The JSON store is today's data
    SSOT; its shapes mirror future Nextcloud Tables — this is deliberate, not dupe.
  - Generic SSO/proof/topology truth = **Certexi** `architecture/*`, not this repo.
    If you find generic platform docs duplicated here, *that* is the thing to remove
    (a prior pass already did this — see STATUS.md "Removed by zengineer").
- **When you find something durable, follow** [`.claude/EVOLVE.md`](.claude/EVOLVE.md)
  and log it in [`.claude/living/LEARNINGS.md`](.claude/living/LEARNINGS.md).

## The 8 product primitives (do not dilute)

Details + code anchors in [`.claude/knowledge/PRIMITIVES.md`](.claude/knowledge/PRIMITIVES.md).

1. **7-petal taxonomy** — one category system for everything. Never add a parallel
   "category" enum; extend petals or map into them. IDs `1..7` are stable forever.
2. **Skill flower + peer references** — reputation as a living organism, not a score.
3. **KINS** — ecosocial currency: contribution → currency → regenerative spend.
4. **Amplificate / Broadcast / Feature** — resonance verbs, *not* like/share.
5. **Role graphs** — participation is role *rows*, not `is_following` booleans.
6. **Intent feeds** — navigation is mode-of-being (six pillars), not content type.
7. **Eco-center** — a first-class venue (org, lifecycle, culture, rooms, vacancies).
8. **Collaborative trip** — travel as a multiplayer object with skill requirements.

## Revival layout

```
apps/web/                 Next.js vertical UI + API (six-pillar nav)
packages/domain/          petals, flower, roles, KINS, pillars, centers (pure TS)
packages/certexi-bridge/  SSO + Nextcloud provisioning + proof client
infra/                    Eco Nextcloud + dual-stack compose
docs/                     Eco playbook · tenancy · dual-stack · demo
root *.php, backend/, …   Archive — read to salvage, never extend
```

## Run it

```bash
pnpm install
pnpm dual:up:lite     # vintage + v2 + gateway (fastest)
pnpm dual:up          # + Eco Nextcloud on :8081
pnpm dev              # hot revival on :3100
```

| URL | What |
|-----|------|
| http://localhost:8090/ | Vintage PHP gateway |
| http://localhost:8090/v2 | Revival Next.js |
| http://localhost:3100 | Revival dev (`pnpm dev`) |
| http://localhost:8081 | Eco Nextcloud (`dual:up`) |

Health: `http://localhost:8090/v2/api/health` · Checks: `pnpm typecheck`, `pnpm test`.

## Gates (enforced by git hooks)

`git config core.hooksPath .githooks` (auto-wired by `pnpm install` via `prepare`).

- **pre-commit** — invariant guard (always) + `typecheck` (when deps installed).
- **pre-push** — invariant guard over the tree + `test`.
- **Invariant guard** ([scripts/gate-invariants.mjs](scripts/gate-invariants.mjs),
  run standalone with `pnpm gate`): fails the commit if petal IDs `1..7`/names
  change, if a **frozen/parasitic** path is touched (`frontend_bkp/`, conflict
  copies, `error_log`) or an **archive** path is edited (`backend/`, `frontend/`,
  `greenble_ecologikalv1.sql`), or if a staged diff adds an obvious secret.
- **Escape hatch** for a deliberate archive/banner edit (STATUS.md marks the
  coexist banner *Living*): `ECO_ALLOW_ARCHIVE_EDIT=1 git commit …`. Parasitic
  paths have no hatch.

## Rules

**Do**
- Put new work in `packages/domain` + `apps/web`; keep Certexi glue in `packages/certexi-bridge`.
- Preserve petal IDs `1..7` and host/guest Nextcloud account classes.
- Update the playbook when a seam changes; log durable findings to `LEARNINGS.md`.

**Don't**
- Merge this repo into Certexi, or duplicate Certexi's generic platform docs here.
- Extend vintage PHP as the primary app, or edit `frontend_bkp/` / conflict copies.
- Call Flowhash/NFTC URLs bypassing the Certexi platform. Commit secrets.

## Map

| Read first | Purpose |
|------------|---------|
| [docs/VERTICAL_PLAYBOOK.md](docs/VERTICAL_PLAYBOOK.md) | Eco map + dual-business claim |
| [docs/BRAND_SYSTEM.md](docs/BRAND_SYSTEM.md) · [DESIGN.md](DESIGN.md) · [PRODUCT.md](PRODUCT.md) | Brand · tokens · product context |
| [`.claude/knowledge/PRIMITIVES.md`](.claude/knowledge/PRIMITIVES.md) | The 8 primitives, in depth |
| [`.claude/living/STATUS.md`](.claude/living/STATUS.md) | Living / dormant / archive / parasitic map |
| [docs/DUAL_STACK.md](docs/DUAL_STACK.md) | Vintage + v2 coexistence |
| [docs/NEXTCLOUD_TENANCY.md](docs/NEXTCLOUD_TENANCY.md) | Eco NC admins / hosts / guests |
| [docs/DEMO_SCRIPT.md](docs/DEMO_SCRIPT.md) | Investor/partner demo |
| [`.claude/knowledge/PATTERNS.md`](.claude/knowledge/PATTERNS.md) · [UI.md](.claude/knowledge/UI.md) | Code patterns · UI/IA |
| [`.claude/product/VISION.md`](.claude/product/VISION.md) · [`.claude/EVOLVE.md`](.claude/EVOLVE.md) | Pitch/journeys · evolve protocol |
| Certexi `architecture/PLATFORM-INTEGRATION.md` | Generic SSO / proof (SSOT lives there) |
| [`.claude/skills/README.md`](.claude/skills/README.md) | Skill network — newcomer onboarding path (onboard → impact-frame → petal-map → contribute) |


# ZenKit Workflow Discipline

This project uses ZenKit for structured AI-assisted development.

## Commands

Use these slash commands during development:

- `/zenkit-spec` — Write a feature specification before building
- `/zenkit-plan` — Create a structured implementation plan
- `/zenkit-build` — Implement from a plan with documented decisions
- `/zenkit-audit` — Review changes for correctness, security, and alignment
- `/zenkit-checkpoint` — Capture current state (what's validated vs assumed)
- `/zenkit-handoff` — Produce a structured context transfer document

## Workflow

```
/zenkit-spec → /zenkit-plan → /zenkit-build → /zenkit-audit → /zenkit-checkpoint
```

## Output contract

Every command output should include:
- **Context** — current situation
- **Assumptions** — explicit, not hidden
- **Constraints** — hard limits
- **Decision** — what and why
- **Deliverable** — what was produced
- **Risks** — specific to this output
- **Open questions** — unresolved items
- **Next handoff** — who continues

## Rules

1. Do not claim tests pass without running them.
2. Do not hide assumptions in prose — list them explicitly.
3. Distinguish validated facts from inferences in every checkpoint.
4. When uncertain, say so. "I don't know" beats a false claim.
5. Keep output concise. Artifacts over narration.
