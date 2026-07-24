# UI & Information Architecture

Patterns worth keeping in any redesign. Stack is jQuery-era; salvage the IA and visual language, not the plugins.

---

## IA — Six-intent chrome

Top nav (`header.php`, landing `index.php`) is the product:

```
Juega · Viaja · Descubre · Aprende · Conoce · Coopera
```

Each item has a dedicated **ecoicon** (kin, backpack, flag, book, chat, tree).

**Rule:** first viewport of any redesign should make the brand + these modes unmistakable. Do not collapse into a generic “Home / Feed / Profile” shell without preserving intent modes.

---

## Feed shell (Discover / Learn / Meet)

Shared pattern across feed pages:

1. Left sidebar — petal / type filters (color-coded)
2. Distance chips + list/map toggle
3. Masonry or card list of entities
4. Infinite scroll via AJAX partials

**Salvage:** mode-specific filters + map/list duality. Replace hardcoded Monterrey stubs with live geo queries.

---

## Ecoicon webfont

Custom icon font (`.ecoicon`) encodes petals (`1`–`7`), roles, and brand glyphs. Color utilities: `.cgreen`, `.cblue`, `.cpink`, `.cyellow`, `.corange`, `.cpurple`.

**Salvage:** keep a single symbolic vocabulary tied to petals — avoid swapping for generic Lucide/FA sets that erase meaning.

---

## Skill flower (Raphael)

Interactive polar chart: click petal → skills + references.

- Live: `frontend/views/members/skills.php`
- Demo/static: `member_flower.php` (prefer skills.php)

**Salvage:** flower as primary profile identity, not an afterthought tab.

---

## Game board (Isotope)

`maingame.php` + `frontend/views/_game/*` + `_filters.php`:

- Mixed card types: member, sustcenter, article, event, project, workshop, volunteering, comment
- Filters: type × petal × popularity/date/geo/relevance
- KINS deltas shown on tiles

**Salvage:** discovery-as-playable-board. Replace `getgamedata.php` mocks with real entity queries.

---

## Share hub

`frontend/views/postcontent.php` — modal/hub with four content types:

Place · Article · Idea · Need

**Salvage:** constrained share taxonomy (useful content only) vs freeform wall posts.

---

## Engagement row

Learn / user cards expose:

**Amplificate · Broadcast · Comment** (+ counts)

Meet cards surface Amplificación / Resonancia language.

**Salvage:** dual verbs with distinct meaning — do not rename to Like/Share without product reason.

---

## Directories as skill visualization

`membersdir.php` — avatar + kin balance + petal proportion bars + bond CTAs.

`ecocentersdir.php` — venue directory with follow.

**Salvage:** directories that show capability, not only photos.

---

## Profile composition

Tabs under members: flower / stream / gallery / travel diary / bonds / ecocenters.

Eco-center admin: workshops, vacancies, rooms/bookings, people roles, gallery.

**Salvage:** org admin as first-class (not a bolted-on “page”).

---

## Landing storytelling

`index.php` sells each pillar with large ecoicon + short mission copy + ally (GEN) + multimedia.

**Salvage:** pillar-by-pillar narrative after a brand-forward hero. Avoid dashboard clutter in the first viewport.

---

## Custom semantic tags (quirky but expressive)

Markup uses nonstandard tags as style hooks: `<flower>`, `<skill>`, `<memberavatar>`, `<friends>`, `<game>`, `<content>`.

**Rewrite note:** keep the semantics as components/classes; don't rely on unknown HTML elements for a11y.

---

## Modal pattern

Fancybox iframes for messaging, uploaders, nested dialogs — dated but consistent.

**Rewrite:** one dialog system; avoid iframe-per-feature.
