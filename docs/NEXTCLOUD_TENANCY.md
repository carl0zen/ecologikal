# Ecologikal Nextcloud Tenancy

Ecologikal runs a **dedicated Nextcloud instance** (not Certexi’s NC).
Certexi remains IdP + proof plane.

## What is live today

| Concern | Backend | Notes |
|---------|---------|-------|
| Host / guest **accounts** | Nextcloud OCS | Groups + folders when NC is up |
| Domain data (centers, skills, KINS, …) | **JSON file** `apps/web/.data/eco-store.json` | Tables-shaped types in `packages/domain` |
| Proof receipts | Local store + optional Certexi stub | Real service tokens = Certexi upstream |

Do not claim NC Tables as wired until a sync layer exists. The store API is the
migration seam: same shapes, swap implementation later.

Probe: `GET /api/health` (or `/v2/api/health` behind the gateway).

## Account classes

| Group id | Display | Who | Capabilities |
|----------|---------|-----|--------------|
| `eco-admins` | Admins | Platform operators | Create hosts/guests, manage groups/folders |
| `eco-hosts` | Hosts | Eco-center / venue operators | Manage venue folder, workshops, vacancies, attest guests |
| `eco-guests` | Guests | Econautas / travelers / volunteers | Own profile folder, declare skills, join vacancies |

Map to vintage roles: Admin / Settler-like host staff / Ecotraveler-Volunteer guest.

## Provisioning flow

1. Bootstrap NC with an admin app-password (see `infra/`).
2. Ensure groups `eco-admins`, `eco-hosts`, `eco-guests` exist.
3. **Create host:** OCS user create → add to `eco-hosts` → create group folder
   `centers/{slug}` with host write access.
4. **Create guest:** OCS user create → add to `eco-guests` → personal folder only.
5. After Certexi SSO, Ecologikal session `username` should match NC `userid`
   (or a mapping row in the JSON store / future Tables).

API surface used by `packages/certexi-bridge` / admin routes:

- `ocs/v2.php/cloud/users` — create / get user
- `ocs/v2.php/cloud/groups` — ensure group, add user
- Group folders app (ops) for per-center isolation
- `status.php` — health probe

When NC is down and `ECO_ALLOW_DEV_LOGIN=true`, admin routes keep local profiles
in the JSON store so demos still work.

## Domain store shapes (JSON now → Tables later)

| Collection | Purpose |
|------------|---------|
| `profiles` | Guest/host display profile, petal interests |
| `skills` | Declared skills by petal + level |
| `skillReferences` | Peer/host attestations (+ optional proof id) |
| `centers` | Eco-center venue records |
| `vacancies` | Petal-tagged volunteer openings |
| `workshops` | Host workshops |
| `kins` | Append-only KINS entries |
| `proofs` | Certexi proof ids linked to local actions |
| `places` / `needs` | Discover map |
| `amplifications` / `broadcasts` | Engagement |

## Group folders

```
/EcoCenters/
  {center-slug}/
    gallery/
    workshops/
    evidence/          # media attached to attested actions
/Guests/
  {userid}/
    profile/
```

## Federation note

Core CLI federation can inventory Ecologikal NC vs Certexi NC
(read-only; no raw evidence exchange). Do not use platform
`/api/federation/sites` as durable registry (stub).

## Env

See `infra/.env.example` and `apps/web/.env.example`:

- `ECO_NEXTCLOUD_URL`
- `ECO_NEXTCLOUD_ADMIN_USER`
- `ECO_NEXTCLOUD_ADMIN_PASSWORD` (or app password)
- `CERTEXI_PLATFORM_URL`
- `JWT_SECRET` / `SSO_SECRET` (shared with Certexi)
