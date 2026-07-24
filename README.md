# Ecologikal

Vintage **Eco + Social** network + **revival v2** (Next.js) as a Certexi OS
reference vertical. Both UIs coexist.

## Dual-stack

| URL | What |
|-----|------|
| http://localhost:8090/ | Vintage PHP (gateway) |
| http://localhost:8090/v2 | Revival Next.js |
| http://localhost:3100 | Revival dev (`pnpm dev`) |
| http://localhost:8081 | Eco Nextcloud (`dual:up`) |

```bash
pnpm install
pnpm dual:up:lite     # vintage + v2 + gateway (fastest)
pnpm dual:up          # above + Eco Nextcloud (:8081)
pnpm dev              # hot revival on :3100 (optional)
```

Health: `http://localhost:8090/v2/api/health` (or `:3100/api/health` with `pnpm dev`).

Details: [docs/DUAL_STACK.md](docs/DUAL_STACK.md)

## Docs

| Doc | Purpose |
|-----|---------|
| [CLAUDE.md](CLAUDE.md) | Agent compass |
| [docs/VERTICAL_PLAYBOOK.md](docs/VERTICAL_PLAYBOOK.md) | Eco × Certexi map |
| [docs/DEMO_SCRIPT.md](docs/DEMO_SCRIPT.md) | Demo walkthrough |
| [docs/DUAL_STACK.md](docs/DUAL_STACK.md) | Vintage + v2 coexistence |

Certexi methods: `../certexi/architecture/PLATFORM-INTEGRATION.md`

## Revival packages

- `apps/web` — Next.js UI
- `packages/domain` — petals, flower, KINS, places
- `packages/certexi-bridge` — SSO / NC / proof

Vintage PHP at repo root remains the classic product surface.
