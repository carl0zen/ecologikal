# Demo script — two businesses, one Certexi OS

Audience: partners / investors / vertical builders.

Time: ~8 minutes.

## Setup

```bash
pnpm install
pnpm dual:up:lite     # recommended for this script (no Nextcloud)
# or: pnpm dual:up    # + Eco Nextcloud on :8081
# Gateway:  http://localhost:8090/     → vintage PHP
#           http://localhost:8090/v2   → revival v2
# Optional hot UI: pnpm dev → :3100 (paths without /v2 prefix)
```

Optional: Certexi platform on `:3000` with shared `JWT_SECRET` for real SSO.
Demo login works with `ECO_ALLOW_DEV_LOGIN=true`.

Paths below assume the **gateway** (`/v2` prefix on `:8090`).

## Script

### 1. Pitch (30s)

Open `http://localhost:8090/`.

> “Certexi is the OS plane — identity and proof. Ecologikal is a second
> business: regenerative eco-social. Same OS, separate Nextcloud, no monorepo
> merge.”

Point to docs: `VERTICAL_PLAYBOOK.md` (+ Certexi `architecture/PLATFORM-INTEGRATION.md`).

### 2. Guest identity + flower (2m)

1. `/v2/login` → **Demo local** as `guest1` / guest.
2. `/v2/profile` → declare skill *Permacultura*, petal Tierra, level 3.
3. Show flower bars + KINS +3.

### 3. Host + eco-center (2m)

1. Logout → login as `host1` / host.
2. `/v2/admin` → create guest account `guest2` (NC warning OK if lite stack).
3. Create ecocenter *Aurora*, publish vacancy *Huerta*, petal Tierra, 10 KINS.
   Or use **Cargar datos demo** on home / seed API.

### 4. Proof loop (2m)

Still as host:

1. If `guest1` has a skill, **Atestar skill** → badge shows proof id (stub or live).
2. **Completar voluntariado** for `guest1` on the vacancy → proof + KINS.

Switch to `guest1`:

1. `/v2/profile` — references + verified badges.
2. `/v2/play` — ledger shows skill / reference / volunteer earns.
3. `/v2/cooperate` — vacancy shows completion.

### 5. Intent IA (1m)

Click pillars: Viaja (center), Aprende (Amplificate/Broadcast), Conoce (flowers),
Descubre (places/needs).

### 6. Close (30s)

> “Any vertical that needs proof and federated infra copies the playbook —
> own app, own Nextcloud, Certexi SSO + proof. Ecologikal is the reference.”

Upstream asks: playbook § Upstream (Certexi repo).
