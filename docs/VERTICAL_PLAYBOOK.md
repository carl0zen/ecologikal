# Ecologikal × Certexi — Reference Vertical

Certexi owns the **generic** integration methods. This file is only what is
**Ecologikal-specific**.

**Read first (Certexi):**

- `../certexi/architecture/PLATFORM-INTEGRATION.md`
- `../certexi/architecture/VERTICAL_INTEGRATION.md`
- Docs site: `/docs/integrations/platform-sso`, `/docs/integrations/vertical-os`

---

## Dual-business claim

| | Certexi | Ecologikal |
|--|---------|------------|
| Business | Customs / logistics SaaS | Regenerative eco-social |
| Nextcloud | Platform tenant | **Separate** Eco instance |
| Accounts | Operators | Hosts / guests |
| Proof | Almost always | Skill refs, volunteer, bookings |

Same OS plane (SSO + proof). Separate repos, brands, data. **Do not merge.**

---

## Eco map

| Piece | Path |
|-------|------|
| Dual-stack run | [DUAL_STACK.md](./DUAL_STACK.md) · `pnpm dual:up` |
| App | `apps/web` (`pnpm dev` → :3100; gateway `/v2`) |
| Domain (petals, flower, KINS) | `packages/domain` |
| SSO / NC / proof bridge | `packages/certexi-bridge` (local jose + OCS; not a `file:` Certexi dep yet) |
| Eco NC compose | `infra/docker-compose.yml` (:8081) |
| Domain store | `apps/web/lib/store.ts` → `.data/eco-store.json` (Tables-shaped; NC Tables later) |
| Hosts / guests | [NEXTCLOUD_TENANCY.md](./NEXTCLOUD_TENANCY.md) |
| Demo | [DEMO_SCRIPT.md](./DEMO_SCRIPT.md) |
| Primitives | [.claude/knowledge/PRIMITIVES.md](../.claude/knowledge/PRIMITIVES.md) |

---

## Eco proof map

| Action | Certexi? | Where |
|--------|----------|-------|
| Amplificate / Broadcast | No | `apps/web` store |
| Skill reference | Yes | `/api/references` → bridge `attestAction` |
| Volunteer complete | Yes | `/api/volunteer/complete` |
| Flower grade | No (derived) | `packages/domain` |
| KINS ledger | Local; optional audit | store `kins[]` |

Stub receipts when `ECO_ALLOW_PROOF_STUB=true` and platform session is absent.

---

## Upstream (file in Certexi, not here)

1. Publish `@certexi/auth` / `@certexi/nextcloud-client`
2. Service tokens for headless proof
3. Persist federation site registry
4. Optional host/guest provisioner helpers
5. Align www SSO on `@certexi/auth/next`

---

## Agent rules

- Extend `apps/web` + `packages/*` — not vintage PHP
- Ignore `frontend_bkp/`, `*BKP*`, Dropbox conflict copies
- Prefer Certexi docs for SSO topology; keep this file for Eco paths only
