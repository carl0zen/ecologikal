# Ecologikal — Agent Guide

> Regenerative eco-social vertical + **Certexi OS reference implementation**.
> Vintage PHP (~2011–2012) is the product archive; revival lives under `apps/` + `packages/`.
> **Protect product primitives. Do not merge into Certexi. Evolve docs as you learn.**

## Stance

**Certexi** = OS plane (IdP, proof, federation patterns).  
**Ecologikal** = independent business with its **own Nextcloud** (hosts / guests).  
Together they prove two businesses can share one platform OS without a monorepo merge.

| Read first | Purpose |
|------------|---------|
| [docs/VERTICAL_PLAYBOOK.md](docs/VERTICAL_PLAYBOOK.md) | Eco map + dual-business claim |
| [docs/NEXTCLOUD_TENANCY.md](docs/NEXTCLOUD_TENANCY.md) | Eco NC admins / hosts / guests |
| [docs/DUAL_STACK.md](docs/DUAL_STACK.md) | Vintage + v2 coexistence |
| [docs/DEMO_SCRIPT.md](docs/DEMO_SCRIPT.md) | Investor/partner demo |
| Certexi `architecture/PLATFORM-INTEGRATION.md` | Generic SSO / proof methods |

## Read order (every session)

1. This file
2. [docs/VERTICAL_PLAYBOOK.md](docs/VERTICAL_PLAYBOOK.md)
3. [`.claude/knowledge/PRIMITIVES.md`](.claude/knowledge/PRIMITIVES.md)
4. Revival code: `apps/web`, `packages/domain`, `packages/certexi-bridge`
5. Vintage archive only when salvaging: `backend/functions_*.php`, `greenble_ecologikalv1.sql`

When you discover something durable, follow **[`.claude/EVOLVE.md`](.claude/EVOLVE.md)**.

## Revival layout

```
apps/web/                 Next.js vertical UI + API
packages/domain/          petals, flower, roles, KINS (pure TS)
packages/certexi-bridge/  SSO + NC provisioning + proof client
infra/                    Eco Nextcloud compose
docs/                     Eco playbook + tenancy + demo
legacy PHP at repo root   Archive — do not extend
```

## Product primitives (do not dilute)

1. **7-petal taxonomy**
2. **Skill flower + peer references**
3. **KINS** ecosocial currency
4. **Amplificate / Broadcast**
5. **Role graphs** on centers / places / needs
6. **Intent feeds** (six pillars)
7. **Eco-center as first-class venue**
8. **Collaborative travel diary**

## Six pillars

Juega · Viaja · Descubre · Aprende · Conoce · Coopera — see revival nav in `apps/web`.

## Agent rules

### Do

- Prefer `packages/domain` + `apps/web` for new work
- Keep Certexi integration in `packages/certexi-bridge`
- Preserve petal IDs `1..7` and host/guest NC account classes
- Append learnings to `.claude/living/LEARNINGS.md`
- Update playbook when seams change

### Don't

- Merge this repo into Certexi
- Extend vintage PHP as the primary app
- Edit `frontend_bkp/` or Dropbox conflict copies
- Call Flowhash/NFTC URLs bypassing Certexi platform
- Commit secrets

## Self-evolving loop

```
Observe → Extract → Write (.claude or docs/) → Log LEARNINGS.md → Reflect
```

Full protocol: [`.claude/EVOLVE.md`](.claude/EVOLVE.md)

## Knowledge index

| Doc | Contents |
|-----|----------|
| [docs/VERTICAL_PLAYBOOK.md](docs/VERTICAL_PLAYBOOK.md) | Vertical integration kit |
| [docs/BRAND_SYSTEM.md](docs/BRAND_SYSTEM.md) | Brand voice, identity, tokens |
| [DESIGN.md](DESIGN.md) · [PRODUCT.md](PRODUCT.md) | Design tokens · product context |
| [`.claude/README.md`](.claude/README.md) | Knowledge base index |
| [`.claude/EVOLVE.md`](.claude/EVOLVE.md) | Evolve protocol |
| [`.claude/product/VISION.md`](.claude/product/VISION.md) | Pitch / journeys |
| [`.claude/knowledge/PRIMITIVES.md`](.claude/knowledge/PRIMITIVES.md) | Domain primitives |
| [`.claude/knowledge/PATTERNS.md`](.claude/knowledge/PATTERNS.md) | Code patterns |
| [`.claude/knowledge/UI.md`](.claude/knowledge/UI.md) | UI / IA |
| [`.claude/living/STATUS.md`](.claude/living/STATUS.md) | Living / dead map |
| [`.claude/living/LEARNINGS.md`](.claude/living/LEARNINGS.md) | Session log |
