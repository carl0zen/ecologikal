# Learnings Log

Append-only. Newest at bottom. One insight per bullet. Cite a path.

Format: `- YYYY-MM-DD — insight (path)`

---

- 2026-07-23 — Initial audit: durable IP is petal OS + flower + KINS + amplify/broadcast + role graphs + intent feeds; stack is PHP 5 / `mysql_*` vintage. (`CLAUDE.md`, `.claude/`)
- 2026-07-23 — Product pitch lives in `index.php` pillar blocks; GEN partnership is explicit (`logo_gen.png` ally).
- 2026-07-23 — Nav promises `gamefeed.php` and `cooperatefeed.php` but files are absent; game board entry is `maingame.php`. (`header.php`)
- 2026-07-23 — `get_userfeed()` exists only in Dropbox conflict copy, not in live `backend/functions.php` — user feed orphaned.
- 2026-07-23 — Petals defined once in bootstrap `$petal_name[1..7]` and reused everywhere; treat as canonical taxonomy. (`_config/bootstrap.php`)
- 2026-07-23 — Live skill flower is `frontend/views/members/skills.php` (Raphael); `member_flower.php` is mostly demo markup.
- 2026-07-23 — Eco-center domain is the richest “living” subsystem (bookings, workshops, vacancies, roles) — best reference for rewrite patterns. (`functions_ecocenter.php`)
- 2026-07-23 — Engagement model is Amplificate/Broadcast keyed by `(post_id, type)`, not Facebook-style likes. (`post_amplifications`, `post_broadcast`)
- 2026-07-23 — Ignore `frontend_bkp/` when editing; dual tree is a footgun.
- 2026-07-23 — Revival stance: Ecologikal = Certexi reference vertical (own NC, no monorepo merge). Playbook in `docs/VERTICAL_PLAYBOOK.md`; Certexi pointer at `certexi/docs/architecture/VERTICAL_INTEGRATION.md`.
- 2026-07-23 — SSO gold path is Certexi `apps/bot` + `@certexi/auth`, not hand-rolled www.
- 2026-07-23 — Revival shipped: `apps/web` + domain + certexi-bridge; local JSON store mirrors NC Tables shapes; proof stub until Certexi service tokens (U2).
- 2026-07-23 — Host/guest provisioning uses OCS; falls back to local profiles when NC is down if `ECO_ALLOW_DEV_LOGIN`.
- 2026-07-23 — zengineer: Certexi `architecture/*` is SSOT for generic integration; Eco playbook kept Eco-only. Deleted duplicated DUAL_BUSINESS + CERTEXI_UPSTREAM docs. STATUS rewritten revival-first. Removed false claim of `file:` Certexi package dep.
- 2026-07-23 — Next refine candidate: wire store → NC Tables OR delete NC-Tables promises from tenancy doc until real.
- 2026-07-23 — Dual-stack: gateway `:8080/` vintage + `/v2` revival; PHP 7.4 + mysql polyfill; cross-links via `ECO_REVIVAL_PUBLIC_URL` / `NEXT_PUBLIC_VINTAGE_URL`. Discover places/needs + workshops + seed shipped.
- 2026-07-23 — Domain SSOT is JSON store; NC is accounts/files only until Tables sync. Health at `/api/health`. Lite dual-stack: `pnpm dual:up:lite` (no NC profile).
