# Ecologikal brand system

Live specimen: [`/brand-system`](/brand-system) in `apps/web`.
Tokens: [`DESIGN.md`](../DESIGN.md) · Product context: [`PRODUCT.md`](../PRODUCT.md).

Inspired in structure by Certexi (`certexi.com/brand-system`) and Grupo Solmex (`gruposolmex.com/brand-system`): numbered modules, voice rules, colour ramps, type specimens, don'ts, and downloadable-adjacent assets — generated from live tokens so the page and the product stay one system.

---

## 01 · Identity

### Thesis mark

A **seven-petal flower** with a kin-gold centre. Geometry is radial and even — reputation as a living organism, not a badge score. The mark stands alone in tight UI; the lockup carries the full regenerative context.

| Form | Use |
|------|-----|
| Mark | App icon, favicon, avatar fallback, tight UI |
| Wordmark | `Eco` + `logikal` (leaf emphasis on *logikal*) |
| Primary lockup | Mark + wordmark |
| Extended | Lockup + “red regenerativa” / “regenerative network” |

**Clear space:** 1× mark diameter on all sides.

**Wordmark rule:** Never restyle *logikal* in kin gold for the logo — leaf green only. Kin gold is reserved for currency and earned states.

---

## 02 · Thesis & voice

### The thesis

> **La flor es tu reputación.**  
> Your flower is your reputation.

### Voice attributes

| Attribute | Means |
|-----------|--------|
| Field-useful | Write like a coop bulletin or seed catalog — actionable, concrete |
| Peer-attested | Claims come from community references, not self-promo |
| Compost-warm | Alive and grounded; never cold industrial, never syrupy |
| Intentional | Six modes of being; no dopamine filler |
| Bilingual-capable | Spanish-first; English that keeps the same gravity |

### Do say

- Declara tus pétalos. Gana KINS. Conoce por habilidad.
- Amplifica lo útil. No “likes” vacíos.
- Tu flor crece con referencias de pares.
- Eco-centros con reglas de vida, no páginas genéricas.

### Don't say

- Revolutionary AI-powered eco experience!!!
- Save the planet in one click 🌍✨
- World-class LinkedIn for hippies.
- Boost your personal brand today.

### Register map

| Surface | Register |
|---------|----------|
| Marketing / brand-system / landing | Brand — thesis-led, Petrona display |
| App feeds, forms, directories | Product — Source Sans 3, denser, quieter |
| Proof / Certexi bridge copy | Stay Eco voice; never adopt Certexi “sealed/operator” lexicon for Eco UX |

---

## 03 · Colour

**Strategy: committed canopy.** Deep forest carries the product; leaf is the signal; kin is earned value; petals are taxonomy.

See `DESIGN.md` for the full token table. Rules:

1. Never use pure black or white — tint neutrals toward chlorophyll.
2. Leaf is for CTAs, key underlines, brand emphasis — not large paragraph backgrounds.
3. Kin gold is for KINS balance, earn toasts, earned markers — not decorative chrome.
4. Petal colours identify taxonomy only; do not invent an eighth “category colour.”
5. Certexi signal lime (`#CAFB4C`) is off-limits on Eco surfaces.

---

## 04 · Typography

| Role | Family | Why |
|------|--------|-----|
| Display | Petrona | Latin-American serif; soft authority; Spanish-friendly |
| UI / body | Source Sans 3 | Humanist, bilingual UI, not Inter monoculture |
| Mono | JetBrains Mono | Petal IDs, KINS amounts, structural eyebrows |

Display is for brand moments and section theses. Product UI lives mostly in Source Sans 3 with mono markers.

---

## 05 · Surfaces

Three canopy tones + two hairline tiers. Depth from tone, not shadow stacks.

Textures allowed (CSS-only): soft canopy vignette, faint radial bloom behind heroes, optional petal-arc watermark at ≤6% opacity. No scanlines, no blueprint grids (those belong to Certexi).

---

## 06 · Components

Canonical set (extend, don’t redesign):

- **Buttons** — Leaf CTA · Ghost · Quiet link  
- **Badges** — Kin · Verified · Petal chip  
- **Flower viz** — polar skill chart (profile identity)  
- **Pillar nav** — six intent modes with Phosphor icons  
- **Cards** — hairline panels for interaction containers only  
- **Engagement row** — Amplificate · Broadcast · Comment  

---

## 07 · Iconography

- **Pillars / actions:** Phosphor (`bold` in nav).  
- **Petals:** colour swatch + stable ID `1…7` + flower geometry.  
- Do not replace ecoicon petal meaning with generic icon packs that erase the taxonomy.

---

## 08 · Motion

One organic ease: `cubic-bezier(0.23, 1, 0.32, 1)`. Rise-in on scroll for brand pages; short UI transitions (`180ms`) in product. Flower reveal may breathe once — never bounce, never infinite neon pulse. Honour `prefers-reduced-motion`.

---

## 09 · Photography & imagery

| Do | Don't |
|----|-------|
| Real places, hands in soil, workshops, travel stops | Stock handshake + leaf overlay |
| Soft daylight, chlorophyll shadows | Neon cyber-forest |
| People with tools/skills visible | Influencer vanity crops |
| Maps and ecozonas as stewardship | Abstract blob gradients as “nature” |

---

## 10 · Don'ts

1. No Certexi graphite + signal-lime cosplay  
2. No purple/indigo SaaS gradients  
3. No cream + terracotta editorial cliché as default  
4. No exclamation marks or emoji in body brand copy  
5. No glassmorphism card stacks  
6. No collapsing pillars into Home / Feed / Profile without intent modes  
7. No renaming Amplificate/Broadcast to Like/Share without product reason  
8. No eighth petal or parallel category enum  

---

## 11 · Assets

| Asset | Location |
|-------|----------|
| Live system | `apps/web/app/brand-system` |
| Flower mark component | `apps/web/components/brand/FlowerMark.tsx` |
| CSS tokens | `apps/web/app/globals.css` |
| Petal colours (domain) | `packages/domain/src/petals.ts` |
| Design token table | `DESIGN.md` |

---

## 12 · Product primitives in the brand

The brand encodes the product OS:

1. Seven petals  
2. Skill flower + peer references  
3. KINS  
4. Amplificate / Broadcast  
5. Role graphs  
6. Six intent pillars  
7. Eco-center as venue  
8. Collaborative travel diary  

If a visual pattern contradicts a primitive, the primitive wins.
