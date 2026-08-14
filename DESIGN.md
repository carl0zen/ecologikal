# Design

Visual system for the Ecologikal revival (`apps/web`). Pairs with PRODUCT.md.

## Theme

Dual-theme, both first-class. Scene: *a guest opens the platform under a palapa
at golden hour (light); that night an econauta browses vacancies in a candle-lit
common room (dark).* Dark is the cinematic default for the brand surfaces; the
stored user choice wins everywhere.

Mechanics: `data-theme="dark" | "light"` on `<html>`, set pre-hydration from
`localStorage('eco-theme')`, falling back to `prefers-color-scheme`. All colors
are CSS custom properties; no hardcoded hex in components.

## Color (OKLCH)

Strategy: **Committed** — the dusk-forest ground carries the surface; one gold
thread of luxury ≤ 10%.

### Dark (dusk at the center)

- `--bg`: oklch(0.16 0.02 165) — forest night, green-tinted, never #000
- `--bg-elev`: oklch(0.20 0.025 163)
- `--ink`: oklch(0.94 0.012 120) — warm off-white
- `--muted`: oklch(0.68 0.03 150)
- `--gold`: oklch(0.78 0.10 85) — the luxury thread (Agroabundanza gold)
- `--green`: oklch(0.52 0.10 155) · `--green-bright`: oklch(0.72 0.13 150)
- Sunset scene ramp: oklch(0.75 0.14 55) → oklch(0.55 0.12 35) ambers

### Light (daylight in the field)

- `--bg`: oklch(0.965 0.008 95) — warm ivory
- `--bg-elev`: oklch(0.99 0.005 95)
- `--ink`: oklch(0.24 0.03 160) — deep green ink
- `--muted`: oklch(0.50 0.03 150)
- `--gold`: oklch(0.62 0.11 80) (darkened for AA on ivory)
- `--green`: oklch(0.46 0.10 155) · `--green-bright`: oklch(0.52 0.12 150)

## Glass (purposeful, skeuomorphic-clear)

Glass = translucent panel + backdrop blur/saturate + hairline border + inner top
highlight (the "clear glass" edge). Used ONLY: sticky nav, panels floating over
imagery (hero, flagship), theme toggle. Regular cards stay solid `--bg-elev`.

```css
--glass-bg: color-mix(in oklab, var(--bg-elev) 55%, transparent);
--glass-border: color-mix(in oklab, var(--ink) 14%, transparent);
--glass-highlight: inset 0 1px 0 color-mix(in oklab, white 12%, transparent);
backdrop-filter: blur(18px) saturate(1.4);
```

Fallback: `@supports not (backdrop-filter: blur(1px))` → raise bg opacity to 92%.

## Typography

- **Display**: Fraunces (variable, optical size) — h1/h2/brand/kickers. Modest
  luxury serif; use `font-variation-settings` soft optical sizing.
- **Body/UI**: Geist Sans (existing). Mono: Geist Mono.
- Scale ratio ≥1.25; hero clamps to ~4rem. Body max 70ch.
- Kickers: 0.75rem, uppercase, letter-spacing 0.14em, gold.

## Imagery

Crafted inline SVG, theme-aware via CSS variables (no external assets):

1. **Valle hero** — layered ridgelines, low sun, terraced field rows, haze;
   amber dusk in dark, morning gold in light.
2. **Flagship aerial** — Agroabundanza motif: curved crop rows, laguna, airstrip
   ribbon, bamboo perimeter.
Grain: subtle SVG turbulence overlay ≤4% opacity for the cinematic finish.

## Motion

- Easings: `--ease-out: cubic-bezier(0.23,1,0.32,1)`; UI ≤ 250ms.
- Buttons: `scale(0.97)` on `:active`.
- Entrances: `@starting-style` fades with ≤8px rise, stagger 40–60ms, home only.
- `prefers-reduced-motion`: opacity-only.

## Components

- `.btn` pill: green primary; gold reserved for the single flagship CTA.
- `.badge`: hairline, tinted; petal badges pair color + number + name.
- `.rail`: horizontal scroll row (Netflix-like) with scroll-snap, edge fade masks.
- `.glass-panel`: the only translucent container; never nested.
- Focus: 2px `--green-bright` outline, 2px offset, both themes.
