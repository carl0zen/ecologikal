# Dual-stack: vintage PHP + revival Next.js

Both UIs run side by side. Same product primitives; different runtimes.

## Ports

| Surface | URL | Role |
|---------|-----|------|
| Gateway | http://localhost:8080/ | Vintage PHP (default) |
| Gateway v2 | http://localhost:8080/v2 | Revival Next (`basePath=/v2`) |
| Vintage direct | http://localhost:8082/ | PHP container without gateway |
| Revival dev | http://localhost:3100/ | `pnpm dev` (no basePath) |
| Eco Nextcloud | http://localhost:8081/ | Hosts/guests plane |

## Start everything

```bash
# From repo root
cd infra && docker compose up -d --build

# Optional: hot revival outside compose
cd .. && pnpm install && pnpm dev
# set NEXT_PUBLIC_VINTAGE_URL=http://localhost:8080
```

Cross-links:

- Vintage banner → `ECO_REVIVAL_PUBLIC_URL` (default gateway `/v2`)
- Revival nav **Vintage** → `NEXT_PUBLIC_VINTAGE_URL`

## Vintage notes

- PHP 7.4 + `infra/vintage/mysql_polyfill.php` (mysql_* → mysqli)
- DB credentials swapped in-container via `dbconnection.docker.php`
- Schema import: `greenble_ecologikalv1.sql` on first MySQL boot (slow)
- `vintage-db` uses `platform: linux/amd64` (MySQL 5.7 has no arm64 image)

## Profiles

| Command | Stack |
|---------|-------|
| `pnpm dual:up:lite` | Vintage + revival + gateway (no Nextcloud) |
| `pnpm dual:up` | Above + Eco Nextcloud (`--profile nc`) |

## Revival notes

- Domain store: JSON file `.data/eco-store.json` (SSOT today; not NC Tables yet)
- Health: `GET http://localhost:8080/v2/api/health` or `:3100/api/health`
- Seed: Admin or home **Cargar datos demo** (`POST /api/seed`)
- Certexi SSO optional; `ECO_ALLOW_DEV_LOGIN=true` for local demo

## Do not

- Merge revival into Certexi mono
- Delete vintage PHP while the dual-stack demo is the product story
- Commit `.data/`, `.env.local`, or remote DB passwords
