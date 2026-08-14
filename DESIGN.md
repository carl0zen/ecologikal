# Ecologikal — Design Tokens

Source of truth for implementation. Live specimen: `/brand-system`.
Narrative guidelines: `docs/BRAND_SYSTEM.md`.

## Aesthetic lane

**Canopy field notebook** — dark chlorophyll surfaces, living petal spectrum, kin-gold markers. Organic geometry without hippie clutter. Spanish-first, GEN-native, regenerative — not industrial (Certexi) and not pastel wellness SaaS.

## Color strategy

**Committed canopy** — forest base carries 50–70% of surface; leaf bright is the primary signal; kin gold marks currency and earned state; seven petal hues are taxonomy only (never decorative fills).

### Canopy · surfaces

| Token | Hex | Role |
|-------|-----|------|
| `--eco-bg` | `#121c16` | Page base |
| `--eco-raised` | `#1a2820` | Panels, cards |
| `--eco-elevated` | `#243028` | Insets, hover strips |
| `--eco-line` | `rgba(238,242,235,0.12)` | Default hairline |
| `--eco-line-strong` | `rgba(238,242,235,0.22)` | Emphasised edge |
| `--eco-canopy-mist` | `#1a3324` | Body vignette only |

### Type

| Token | Hex | Role |
|-------|-----|------|
| `--eco-ink` | `#eef2eb` | Primary text |
| `--eco-muted` | `#9aab9c` | Secondary |
| `--eco-faint` | `#8a9b8c` | Tertiary / scaffolding (≥4.5:1 on elevated; min 0.85rem) |

### Signal · accents

| Token | Hex | Role |
|-------|-----|------|
| `--eco-leaf` | `#6aad72` | Primary CTA, brand emphasis, links |
| `--eco-canopy` | `#3d7348` | Solid fills, pressed green |
| `--eco-kin` | `#b8964e` | KINS, earned markers |
| `--eco-alert` | `#c45a72` | Caution / need urgency |

### Petal spectrum (taxonomy — IDs stable)

| ID | Name | Hex |
|----|------|-----|
| 1 | Construcción | `#c4a35a` |
| 2 | Gobierno comunitario | `#d45d79` |
| 3 | Finanzas & Economía | `#2a9d8f` |
| 4 | Tierra & Naturaleza | `#3a7d44` |
| 5 | Cultura & Educación | `#3d5a80` |
| 6 | Herramientas & Tecnología | `#6c63ff` |
| 7 | Salud & Espiritualidad | `#e76f51` |

**Two readings of the same seven petals (intentional):**
- `FlowerMark` — radiating ellipses = brand identity (who we are)
- `FlowerViz` — concentric arcs = skill grades (what you’ve earned)

Same `PETALS` colours/order. Do not invent a third flower.

## Typography

| Token | Value | Role |
|-------|-------|------|
| `--eco-wordmark-size` | nav `1.25rem`; specimen `1.85rem`; hero `clamp(2.4rem, 5vw, 3.5rem)` | Wordmark scale via CSS custom property |

| Role | Family | Notes |
|------|--------|-------|
| Display / brand | **Petrona** | Latin-American serif; wordmarks, hero promises |
| UI / body | **Source Sans 3** | Humanist UI; readable bilingual ES/EN |
| Mono / markers | **JetBrains Mono** | Petal IDs, KINS amounts, eyebrows, hashes |

### Scale

| Step | Size | Tracking | Leading |
|------|------|----------|---------|
| Display | `clamp(2.4rem, 5.4vw, 4rem)` | `-0.03em` | `1.08` |
| Section | `clamp(1.5rem, 3.2vw, 2.35rem)` | `-0.02em` | `1.15` |
| Card title | `1.1rem` semibold | `-0.015em` | `1.25` |
| Body | `1.05rem` | `0` | `1.65` |
| Small | `0.9rem` | `0` | `1.6` |
| Eyebrow | `0.7rem` mono uppercase | `0.16em` | `1` |

## Elevation

Depth from **tonal steps + 1px hairlines**, not multi-layer shadows. Optional soft canopy vignette on heroes only. No glassmorphism cards. No glow halos on leaf.

## Radius & spacing

- `--eco-radius`: `12px` panels; `8px` inputs; pills `999px` only for chips/CTAs
- Base space unit: `0.25rem`; section rhythm `3–5rem`

## Motion

| Token | Value |
|-------|-------|
| Ease | `--eco-ease` |
| UI | `--eco-duration-ui` (`180ms`) |
| Rise-in (specimen load) | `--eco-rise-in` (`0.65s`) |
| Stagger | `--eco-stagger` (`70ms`) |

Respect `prefers-reduced-motion`: snap to final state, no bounce.

## Iconography

**Phosphor** (bold weight in nav) for pillars and actions. Petal identity stays color + numeric ID + flower geometry — do not replace the flower with generic Lucide sets.

## Components (canonical)

Signal CTA (leaf fill) · Ghost (hairline) · Quiet link · Petal chip · Kin badge · Flower viz · Pillar nav · Status: earned / verified / need.

## Don'ts

No purple SaaS gradients · No leaf as paragraph background · No pure `#000`/`#fff` · No Certexi signal-lime · No exclamation-mark marketing · No isometric eco cartoon kits · No collapsing six pillars into Home/Feed.
