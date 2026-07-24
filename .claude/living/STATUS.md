# Status Map

Last zengineered: 2026-07-23

## Categories

| Class | Meaning |
|-------|---------|
| **Living** | Wired and used by the revival |
| **Dormant** | Schema/idea kept; UI thin or deferred |
| **Prototype** | Works with stubs / local store |
| **Archive** | Vintage PHP — salvage primitives only |
| **Parasitic** | Noise that steals agent attention |

---

## Living (revival + dual-stack)

| Area | Path |
|------|------|
| Next.js vertical | `apps/web` |
| Domain | `packages/domain` |
| Certexi bridge | `packages/certexi-bridge` |
| Dual-stack compose | `infra/docker-compose.yml` (vintage+v2+NC+gateway) |
| Vintage coexist banner | `header.php`, `index.php` |
| Playbook (Eco-only) | `docs/VERTICAL_PLAYBOOK.md` |
| Dual-stack runbook | `docs/DUAL_STACK.md` |
| Tenancy + demo | `docs/NEXTCLOUD_TENANCY.md`, `docs/DEMO_SCRIPT.md` |
| Agent compass | `CLAUDE.md`, `.claude/knowledge/PRIMITIVES.md` |

## Prototype

| Area | Note |
|------|------|
| Proof bridge | Stub receipts without platform session |
| JSON store | Tables-shaped stand-in for Eco NC Tables |
| Discover pillar | Placeholder route (IA kept; no domain yet) |
| Dev login | `ECO_ALLOW_DEV_LOGIN` bypasses Certexi IdP |

## Dormant

| Area | Note |
|------|------|
| NC Tables sync | Store API ready; not wired to OCS Tables |
| Real SSO e2e | Needs running Certexi + allowlisted host |
| Place → need loop | Vintage idea; not in revival store |

## Archive (do not extend)

Root `*.php`, `backend/`, `frontend/`, `greenble_ecologikalv1.sql` — product
memory for primitives. Conflict copies + `frontend_bkp/` = **parasitic**; ignore.

## Removed by zengineer (2026-07-23)

- Duplicated generic SSO/topology docs (Certexi `architecture/*` is SSOT)
- `docs/DUAL_BUSINESS_PROOF.md`, `docs/CERTEXI_UPSTREAM.md` (folded into playbook)
