# Dual-stack: vintage PHP + revival Next.js

Both UIs run side by side. Same product primitives; different runtimes.

## Ports

| Surface | URL | Role |
|---------|-----|------|
| Gateway | http://localhost:8090/ | Vintage PHP (default) |
| Gateway v2 | http://localhost:8090/v2 | Revival Next (`basePath=/v2`) |
| Vintage direct | http://localhost:8082/ | PHP container without gateway |
| Revival (compose) | http://localhost:3101/v2 | Next container (bypasses gateway) |
| Revival dev | http://localhost:3100/ | `pnpm dev` (no basePath) |
| Eco Nextcloud | http://localhost:8081/ | Hosts/guests plane (`dual:up`) |

Gateway uses **:8090** so it does not collide with Certexi Nextcloud often bound on `:8080`.

## Start

```bash
pnpm install
pnpm dual:up:lite     # vintage + v2 + gateway
# or: pnpm dual:up    # + Eco Nextcloud on :8081

# Optional hot revival outside compose
pnpm dev
# NEXT_PUBLIC_VINTAGE_URL=http://localhost:8090
```

Cross-links:

- Vintage banner → `ECO_REVIVAL_PUBLIC_URL` (default gateway `/v2`)
- Revival nav **Vintage** → `NEXT_PUBLIC_VINTAGE_URL`

## Profiles

| Command | Stack |
|---------|-------|
| `pnpm dual:up:lite` | Vintage + revival + gateway (no Nextcloud) |
| `pnpm dual:up` | Above + Eco Nextcloud (`--profile nc`) |

## Vintage notes

- PHP 7.4 + `infra/vintage/mysql_polyfill.php` (mysql_* → mysqli)
- DB credentials swapped in-container via `dbconnection.docker.php`
- `_ROOT_URL_` from `ECO_VINTAGE_PUBLIC_URL` or request `Host` (not carlitosway.club)
- Missing `_plugins/` → CDN fallbacks for jQuery UI / fancybox (see `load_css_files`)
- Schema import: `greenble_ecologikalv1.sql` on first MySQL boot (slow)
- `vintage-db` uses `platform: linux/amd64` (MySQL 5.7 has no arm64 image)

## Revival notes

- Domain store: JSON file `.data/eco-store.json` (SSOT today; not NC Tables yet)
- Health: `GET http://localhost:8090/v2/api/health` or `:3100/api/health`
- Seed: Admin or home **Cargar datos demo** (`POST /api/seed`)
- Certexi SSO optional; `ECO_ALLOW_DEV_LOGIN=true` for local demo

## Do not

- Merge revival into Certexi mono
- Delete vintage PHP while the dual-stack demo is the product story
- Commit `.data/`, `.env.local`, or remote DB passwords
