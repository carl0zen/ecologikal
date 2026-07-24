# Domain Primitives

Cross-cutting concepts that form Ecologikal’s product OS. Prefer these over inventing new category systems.

---

## 1. Petal taxonomy (7)

Defined in `_config/bootstrap.php`:

| ID | Name |
|----|------|
| 1 | Building |
| 2 | Community Gov |
| 3 | Finance & Economics |
| 4 | Land & Nature |
| 5 | Culture & Education |
| 6 | Tools & Technology |
| 7 | Health & Spirituality |

**Surfaces:** skills, learn feed categories, workshop tags, vacancy skills, meet filters, game filters, ecoicon glyphs `1`–`7`, registration sliders.

**Helpers:** `get_petals()`, `get_petal_name()`, `get_petal_class()`, `get_petal_color()` in `backend/functions.php`.

**Rule:** Never introduce a parallel “category” enum. Extend petals or map into them.

---

## 2. Skill flower + peer references

- Members declare skills under petals with a level (Beginner→Expert).
- Peers leave **references** that grade skills.
- Aggregates: `members_get_petal_grade($userid, $petalno)`, `members_get_flower_grade($userid)` in `backend/functions_member.php`.
- Live viz: Raphael polar chart — `frontend/views/members/skills.php` + `frontend/js/flower/member_flower.js`.
- Directory bars: `membersdir.php` shows per-petal proportions.

**Idea:** reputation as a living organism (flower), not a score badge.

---

## 3. KINS (ecosocial currency)

- Maya “kin” ≈ sun; marketed as ecosocial money on `index.php`.
- Balance on `miembros.user_kins`; ledger table `member_kins`.
- Earn path (implemented): `members_update_kins($userid, $type)` — e.g. skill/reference/place/media deltas.
- Spend path (promised): lodging, workshops, eco-products — partial / aspirational in UI.

**Idea:** contribution → currency → regenerative spend. Concept > incomplete spend rails.

---

## 4. Amplificate / Broadcast / Feature

Not like / share.

| Action | Table | Meaning |
|--------|-------|---------|
| Amplificate | `post_amplifications` | Boost / amplify signal |
| Broadcast | `post_broadcast` | Reshare / resonance |
| Comment | `post_comments` | Discussion |
| Feature | admin-gated on posts | Editorial highlight |

Polymorphic key: `(post_id, type)` where `type` ∈ image | video | idea | article.

Functions: `post_amplificate()`, `post_broadcast()` in `backend/functions.php`.

---

## 5. Role graphs (participation ≠ boolean)

Same pattern across domains — people attach via role rows:

| Domain | Role table | Example roles |
|--------|------------|---------------|
| Eco-center | `ecocenter_people_roles` + `cat_ecocenter_roles` | Admin, Settler, Follower, Visitor, Ecotraveler, Volunteer |
| Place | `place_people_roles` | founder/promoter, follower, visitor |
| Need | `need_people_roles` | founder, follower, worker |

**Rule:** participation = role rows, not `is_following` flags.

---

## 6. Intent feeds

Primary navigation is **mode of being**, not content type:

`Juega | Viaja | Descubre | Aprende | Conoce | Coopera`

Each mode gets its own filter language (petal, distance, map/list). See `UI.md`.

Missing entries: `gamefeed.php`, `cooperatefeed.php`.

---

## 7. Share taxonomy

From `frontend/views/postcontent.php`:

| Type | Domain |
|------|--------|
| Lugar (Place) | Ecozona stewardship |
| Artículo (Article) | Knowledge |
| Idea | Knowledge / proposal |
| Necesidad (Need) | Ecosocial need |

---

## 8. Eco-center venue

`ecocenters` is an org with:

- Lifecycle status: planning / forming / formed
- Type: urban / rural / …
- Culture fields: land, food, alcohol, tobacco, dietary & spiritual practices
- Ops: rooms + bookings, workshops, vacancies (+ skills + recompenses), volunteers, galleries, follows

Related catalogs: `cat_dietary_practice`, `cat_spiritual_practice`, `cat_services_available`, `cat_orientations`, etc.

Naming drift: `sustcenters` vs `ecocenters` — prefer **ecocenters** going forward.

---

## 9. Collaborative trip

Tables: `member_trips`, `member_trips_stops`, `member_trips_friends`, `member_trips_skills`, `member_trips_comments`.

API: `backend/functions_trip.php`.

**Idea:** travel as a multiplayer object with capability requirements.

---

## 10. Bonds & messaging

- `member_bonds` — friendship / request graph
- `messages` + `message_threads` + `message_thread_members` + `message_read_state`
- `notifications`

Social graph is capability-adjacent (meet by petal → bond → message), not celebrity-follow.

---

## Schema anchors

Canonical dump: `greenble_ecologikalv1.sql`.

High-signal tables: `miembros`, `member_skills`, `member_kins`, `member_bonds`, `ecocenters`, `place`, `need`, `idea`, `article`, `post_amplifications`, `post_broadcast`, `member_trips*`, `ecocenter_vacancies`, `ecocenter_workshops`.
