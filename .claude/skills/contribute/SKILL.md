---
name: contribute
description: "Newcomer change workflow for Ecologikal — how to ship here. Use when someone says 'I want to make a change', 'how do I contribute', 'ship this', 'implement X properly', or is ready to write code. Chains the ZenKit workflow with the repo's invariant gates and archive rules."
---

# contribute

The safe path from idea to merged change on the Ecologikal skill network. Ties the
ZenKit workflow to the repo's real guardrails so a newcomer ships something
coherent without tripping the gates or touching frozen memory.

## When to use

Someone is ready to change code. Runs after [impact-frame](../impact-frame/SKILL.md)
(what) and [petal-map](../petal-map/SKILL.md) (where in the taxonomy).

## The path

```
/impact-frame → /petal-map → spec → plan → build → audit → gate → checkpoint
```

1. **Spec** — run `/zenkit-spec`. State the change, the primitive it serves, the
   pillar and petal(s). One page.
2. **Plan** — run `/zenkit-plan`. Files touched (in `packages/domain` and/or
   `apps/web` only), decisions, risks.
3. **Build** — implement. Keep domain logic pure in `packages/domain`; keep Certexi
   glue in `packages/certexi-bridge`; UI in `apps/web`.
4. **Audit** — run `/zenkit-audit`. Don't rubber-stamp; verify tests actually ran.
5. **Gate** — run `pnpm gate` (or just commit — the pre-commit hook runs it). It
   fails on: petal IDs/names changed, edits to frozen/parasitic paths, staged
   secrets. See [scripts/gate-invariants.mjs](../../../scripts/gate-invariants.mjs).
6. **Checkpoint** — run `/zenkit-checkpoint`. What's validated vs assumed.

## Where you may and may not write

| Allowed | Frozen (gate blocks) |
|---------|----------------------|
| `packages/domain`, `apps/web`, `packages/certexi-bridge`, `docs/`, `.claude/` | `backend/`, `frontend/`, `*.php`, `greenble_ecologikalv1.sql`, `frontend_bkp/`, conflict copies |

**Deliberate archive/banner edit** (rare — STATUS.md marks the coexist banner
*Living*): `ECO_ALLOW_ARCHIVE_EDIT=1 git commit …`. Parasitic paths have no hatch.

## Checks before you push

```bash
pnpm gate           # invariants (fast, no deps)
pnpm typecheck
pnpm test
```

Pre-push also re-runs the invariant guard over the whole tree.

## Rules

- Prefer subtraction. Don't add a dependency or abstraction without retiring one
  (the [zengineer](../../../CLAUDE.md) stance).
- New work rides existing primitives — if you're inventing a new core object, stop
  and re-run [impact-frame](../impact-frame/SKILL.md).
- Never claim tests pass without running them. "I couldn't verify" beats a false green.
