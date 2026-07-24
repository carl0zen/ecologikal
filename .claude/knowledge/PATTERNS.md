# Reusable Code & Architecture Patterns

Implementation patterns worth preserving when evolving or rewriting.

---

## P1 — Bootstrap constants + portable paths

`_config/bootstrap.php` defines `_ROOT_PATH_`, `_ROOT_URL_`, `_VIEWS_*`, `_BACKEND_*`, picture roots.

**Reuse:** keep a single constants module so views never hardcode host paths (today `_ROOT_URL_` is hardcoded — fix when modernizing).

---

## P2 — Domain function libraries as the API

Logic lives in:

- `backend/functions.php` — shared / petals / feeds / posts
- `backend/functions_member.php`
- `backend/functions_ecocenter.php`
- `backend/functions_place.php`
- `backend/functions_need.php`
- `backend/functions_trip.php`

Views and AJAX scripts call prefixed functions (`members_*`, `ec_*`, `place_*`, …).

**Reuse:** thin controllers, fat domain modules — even without a framework.

---

## P3 — View-scoped asset bundles

`$view` drives `load_js_scripts($view)` / `load_css_files($view)` in `functions.php`.

Member pages pull maps/jeditable/uploaders; flower pulls Raphael; game pulls Isotope.

**Reuse:** per-route asset manifests beat a global kitchen-sink bundle.

---

## P4 — `$array_goto` mini-router

Bootstrap maps profile sub-views:

`gallery | stream | profile | flower | game | image-uploader | …`

**Reuse:** tiny named-route table for tabbed entity pages.

---

## P5 — Cursor pagination for feeds

`get_learnfeed($type, $cat, $lastpostid, $subfilter)` — `id < last` + `LIMIT 12` + category/featured filters.

**Reuse:** keyset pagination over offset for masonry/infinite feeds.

---

## P6 — Polymorphic engagement rows

Engagement tables key by `(post_id, type)` across heterogeneous content.

**Reuse:** one amplification model over many post kinds — avoid per-type like tables.

---

## P7 — Progressive semantic onboarding

Registration steps: interests → skills-by-petal (level sliders) → profile → social bonds.

Framed as building a semantic network before showing content.

**Reuse:** skill/intent capture before the firehose.

---

## P8 — Dual i18n

1. PHP `define()` strings in `_lang/{es,en}/*.php`
2. DB `translation` table via helpers (`get_translation`, etc.)

**Reuse:** static chrome vs CMS-ish strings. Note: bootstrap forces `_LANG_ = 'es'`.

---

## P9 — AJAX HTML partials

`backend/learn_feed.php`, `backend/user_feed.php` return rendered card HTML for infinite scroll.

**Reuse (with caution):** fine for server-rendered progressive enhancement; prefer JSON + client templates in a rewrite.

---

## P10 — Parallel role helpers across domains

Place/need/ecocenter follow similar follow/role/comment helpers.

**Reuse:** one Participation service parameterized by entity type.

---

## Anti-patterns (do not copy)

| Anti-pattern | Where | Prefer |
|--------------|-------|--------|
| Mock data as feed source | `maingame.php`, discover/meet stubs | Real queries from schema |
| Dropbox conflict copies as API | `functions (Andres GM's conflicted copy…).php` | Single canonical `functions.php` |
| Dual frontend trees | `frontend/` + `frontend_bkp/` | One tree |
| Password MD5 + dual cookie/session | login / session | Modern auth (when rebuilding) |
| Raw SQL in views/stream posts | various | Domain functions + parameterized queries |
| Hardcoded featured admin id | learnfeed featuring | Role/permission check |

---

## Suggested rewrite mapping (if greenfield)

| Old | New shape |
|-----|-----------|
| `functions_*.php` | Domain services / modules |
| Petal globals | Shared taxonomy package |
| Role tables | `Participation(entity_type, entity_id, user_id, role)` |
| Amplificate/Broadcast | Engagement service with typed actions |
| KINS updates | Ledger with append-only entries |
| `$array_goto` | Nested routes under `/members/:id/*` |
| Isotope game board | Discovery canvas fed by real entities |
