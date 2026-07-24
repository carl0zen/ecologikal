# Ecologikal Nextcloud Tenancy

Ecologikal runs a **dedicated Nextcloud instance** (not Certexi’s NC).
People and venue assets live here. Certexi remains IdP + proof plane.

## Account classes

| Group id | Display | Who | Capabilities |
|----------|---------|-----|--------------|
| `eco-admins` | Admins | Platform operators | Create hosts/guests, manage groups/folders, Tables admin |
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
   (or a stored mapping table in Eco Tables).

API surface used by `packages/certexi-bridge` / admin routes:

- `ocs/v2.php/cloud/users` — create / get user
- `ocs/v2.php/cloud/groups` — ensure group, add user
- Group folders app (ops) for per-center isolation

## Tables (domain)

Prefer Nextcloud Tables for reference purity:

| Table | Purpose |
|-------|---------|
| `profiles` | Guest/host display profile, petal interests |
| `skills` | Declared skills by petal + level |
| `skill_references` | Peer/host attestations (+ optional proof id) |
| `centers` | Eco-center venue records |
| `vacancies` | Petal-tagged volunteer openings |
| `workshops` | Host workshops |
| `kins_ledger` | Append-only KINS entries |
| `proof_receipts` | Certexi proof ids linked to local actions |

If Tables velocity blocks MVP, use local JSON/SQLite in `apps/web` with the
**same shapes**, and migrate to Tables later — do not invent a second domain language.

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
