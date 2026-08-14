---
name: onboard
description: "Guided first-run tour of the Ecologikal skill network for a newcomer. Use when someone says 'onboard me', 'where do I start', 'what is this project', 'help me get oriented', or is new to the repo. Reads the compass docs and produces a personalized what-this-is / where-to-start / your-first-change brief."
---

# onboard

The front door to the Ecologikal skill network — a regenerative eco-social
platform where people solve social & ecological problems through shared skills.
Turn a cold newcomer into someone who can make their first coherent change.

## When to use

A person (or agent) new to this repo asks what it is, where to start, or how to
help. Also the natural first step before [impact-frame](../impact-frame/SKILL.md),
[petal-map](../petal-map/SKILL.md), or [contribute](../contribute/SKILL.md).

## Process

1. **Read the compass, in order** — don't skim:
   - [CLAUDE.md](../../../CLAUDE.md) — what this is, the 8 primitives, the gates.
   - [`.claude/knowledge/PRIMITIVES.md`](../../knowledge/PRIMITIVES.md) — the primitives in depth.
   - [`.claude/living/STATUS.md`](../../living/STATUS.md) — what's Living / Archive / Parasitic.
   - [`.claude/product/VISION.md`](../../product/VISION.md) — the mission and journeys.
2. **Learn the shape** — the six pillars (`packages/domain/src/pillars.ts`) are the
   navigation; the 7 petals (`packages/domain/src/petals.ts`) are the one taxonomy.
3. **Ask the newcomer two things** (don't assume):
   - What social/ecological problem pulls at them?
   - Do they want to *design*, *build*, or *understand* first?
4. **Produce the brief** (see format). Point at one concrete, small first change
   that touches `packages/domain` or `apps/web` — never the frozen archive.

## Output format

```
## Welcome to Ecologikal

**What it is:** <2 sentences, plain language>
**The mission fit:** <how their problem maps to a pillar + primitive>
**The rules that matter for you:** taxonomy stays at 7 petals; archive is read-only;
gates run on commit (see CLAUDE.md → Gates).

**Where to start (pick one):**
1. Understand → read <file>
2. Design → run /impact-frame on "<their problem>"
3. Build → run /contribute for a small change to <path>

**Your first change:** <one specific, gate-safe, ~1hr task>
**Next skill:** /impact-frame · /petal-map · /contribute
```

## Rules

- Orient before prescribing. A newcomer with the wrong mental model ships noise.
- Never send a newcomer into the archive (`backend/`, `frontend/`, `frontend_bkp/`,
  `*.php`, `greenble_ecologikalv1.sql`). Read-only memory, enforced by the gate.
- Keep it to one page. Onboarding is a doorway, not a manual.
