---
name: petal-map
description: "Classify any feature, skill, idea, or content onto the canonical 7-petal taxonomy. Use when someone asks 'which petal', 'how do we categorize this', 'what category', or is about to add a category/tag/enum. Refuses to invent a parallel category system — extends or maps into petals instead."
---

# petal-map

Guards product primitive #1: **there is one taxonomy, the 7 petals.** Every skill,
learn-feed item, workshop tag, vacancy, and filter maps into it. This skill places
things on the petals and blocks parallel "category" enums before they're born.

## The 7 petals (IDs stable forever)

Source of truth: [`packages/domain/src/petals.ts`](../../../packages/domain/src/petals.ts).

| ID | Name | Domain |
|----|------|--------|
| 1 | Building | shelter, construction, infrastructure |
| 2 | Community Gov | governance, decision-making, conflict |
| 3 | Finance & Economics | money, exchange, livelihoods |
| 4 | Land & Nature | soil, water, food, ecology |
| 5 | Culture & Education | learning, art, transmission |
| 6 | Tools & Technology | tools, software, systems |
| 7 | Health & Spirituality | body, mind, meaning, care |

## When to use

Placing a skill/idea/feature in a category; reviewing a design that introduces a
tag/enum; the [impact-frame](../impact-frame/SKILL.md) hand-off. Complements the
invariant gate ([scripts/gate-invariants.mjs](../../../scripts/gate-invariants.mjs))
which fails commits that alter petal IDs/names.

## Process

1. **Restate the thing** to classify in one line.
2. **Map to petal(s)** — pick the primary petal; list secondaries only if truly
   cross-cutting. Justify each with one clause.
3. **Detect the anti-pattern** — is code about to add a new category system
   (a `category`, `topic`, `tag` enum parallel to petals)? If so: STOP.
   - Can it be expressed as a petal? → use the petal.
   - Is it a *sub-facet* of a petal? → model as a child of the petal, not a peer.
4. **Check surfaces** — the same petal id must drive color/class/glyph everywhere
   (`getPetal(id)` → `color`, `cssClass`). Don't hardcode a new color.

## Output format

```
## Petal Map — <thing>

**Primary petal:** <id> <name> — <why>
**Secondary:** <id(s) or none>
**Anti-pattern check:** clean | parallel-category-detected → <what to do instead>
**Surfaces to wire:** color/class via getPetal(<id>)
```

## Rules

- Never introduce a parallel category enum. Extend petals or map into them.
- Petal IDs `1..7` and their names are immutable. Renaming = breaking the gate and
  every downstream surface (skills, feeds, filters, glyphs).
- If something honestly spans many petals, it may belong at the *pillar* level
  (mode of being), not the petal level — reconsider the altitude.
