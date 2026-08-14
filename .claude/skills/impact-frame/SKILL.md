---
name: impact-frame
description: "Turn a raw social or ecological problem into an on-model Ecologikal intent. Use when someone says 'I want to help with X', 'frame this problem', 'how would this fit', or brings a cause/idea. Maps the problem to a pillar, a primitive (need/place/center/trip), and a participation model via role graphs."
---

# impact-frame

Newcomers arrive with a *problem* ("food deserts", "reforestation", "elder
isolation"). This skill converts that into something the platform can actually
carry — expressed in the existing primitives, not a new feature silo.

## When to use

Someone brings a social/ecological problem or a feature idea and you need to place
it on-model before any design or build. Runs after [onboard](../onboard/SKILL.md),
feeds [petal-map](../petal-map/SKILL.md) and [contribute](../contribute/SKILL.md).

## Process

1. **State the problem** in one sentence — the human need, not a solution.
2. **Pick the pillar** — the *mode of being* it lives in
   (`packages/domain/src/pillars.ts`): Juega · Viaja · Descubre · Aprende ·
   Conoce · Coopera.
3. **Bind to a primitive** — do NOT invent a new object. Choose the closest of:
   | Primitive | Use when the problem is about… |
   |-----------|--------------------------------|
   | **Need** | an unmet ecosocial need seeking workers/founders |
   | **Place** | stewarding a physical ecozone |
   | **Eco-center** | an org/venue with lifecycle, rooms, workshops, vacancies |
   | **Collaborative trip** | movement of people with skill requirements |
   | **Skill flower** | matching people by capability + peer references |
   | **KINS** | incentivizing contribution → regenerative spend |
4. **Define participation as role rows** — who founds, follows, works, visits
   (`*_people_roles`). Participation is never a boolean.
5. **Tag the petal(s)** — hand off to [petal-map](../petal-map/SKILL.md).
6. **Name the KINS loop** — what contribution earns, what it can spend on.

## Output format

```
## Impact Frame — <problem>

**Human need:** <one sentence>
**Pillar:** <play/travel/discover/learn/meet/cooperate>
**Primitive:** <need | place | center | trip | flower | kins> — <why>
**Participants (roles):** founder <x>, worker <y>, follower <z>
**Petal(s):** <1–7 via /petal-map>
**KINS loop:** earn <action> → spend <regenerative outcome>
**On-model? ** yes / needs-reshape — <if a new object seems required, stop and justify against the 8 primitives>
```

## Rules

- Reuse a primitive before proposing anything new (4-filter test: Essential?
  Symbiotic? Traceable? Removable?).
- If a problem genuinely fits no primitive, that's a finding — surface it, don't
  silently bolt on a parallel concept. The taxonomy's coherence is the product.
- Social impact here = capability + place + currency, not a feed of good intentions.
