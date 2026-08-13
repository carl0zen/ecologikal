# Ecologikal skill network

Skills that help a newcomer onboard and ship coherent work on a regenerative
eco-social platform — a network where people solve social & ecological problems
through shared skills, places, and an ecosocial currency (KINS).

Skills are activated by name in conversation (e.g. "onboard me", "which petal is
this") or invoked directly. Start at the top and walk down.

## Onboarding path

```
onboard → impact-frame → petal-map → contribute
 (what    (turn a         (place it   (ship it through
  is this) problem into    on the 7    zenkit + the gates)
           an intent)      petals)
```

| Skill | Use it to… |
|-------|------------|
| [onboard](onboard/SKILL.md) | Get oriented: what this is, where to start, your first change. |
| [impact-frame](impact-frame/SKILL.md) | Turn a raw social/ecological problem into an on-model intent (pillar + primitive + roles + KINS loop). |
| [petal-map](petal-map/SKILL.md) | Classify anything onto the canonical 7-petal taxonomy; block parallel category enums. |
| [contribute](contribute/SKILL.md) | The change workflow: spec → plan → build → audit → gate → checkpoint. |

## ZenKit workflow skills (installed by `zenkit init claude`)

| Skill | Use it to… |
|-------|------------|
| [zenkit-audit](zenkit-audit/SKILL.md) | Structured code review with rubrics and a pass/fail verdict. |
| [zenkit-checkpoint](zenkit-checkpoint/SKILL.md) | Snapshot state, separating validated facts from assumptions. |
| [zenkit-handoff](zenkit-handoff/SKILL.md) | Context-preserving handoff between sessions or agents. |

Related commands live in [`.claude/commands/`](../commands): `/zenkit-spec`,
`/zenkit-plan`, `/zenkit-build`, `/zenkit-audit`, `/zenkit-checkpoint`,
`/zenkit-handoff`.

## Also available (global)

- **`/zengineer`** — system refinement through subtraction (audit · simplify ·
  design · refine). The stance behind this whole repo; see [CLAUDE.md](../../CLAUDE.md).

## Adding a skill

Each skill is a directory with a `SKILL.md` whose frontmatter has `name:` and a
`description:` that says *when* to use it. Keep bodies short and grounded in real
files. New skills should ride existing primitives — run `petal-map` / `impact-frame`
on the idea first, and respect the invariant gate.
