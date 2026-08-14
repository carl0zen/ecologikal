import type { Metadata } from 'next';
import Link from 'next/link';
import { notFound } from 'next/navigation';
import { PETALS, PILLARS } from '@ecologikal/domain';
import { EcoWordmark, FlowerMark } from '@/components/brand/FlowerMark';
import { PILLAR_ICONS } from '@/components/brand/pillarIcons';
import { flag } from '@/lib/env';
import './brand-system.css';

export const metadata: Metadata = {
  title: 'Brand system · Ecologikal',
  description:
    'Identity, voice, colour, typography, surfaces, components, motion, and don’ts — live from Eco design tokens.',
};

const TOC = [
  { id: 'identity', label: '01 Identity' },
  { id: 'voice', label: '02 Voice' },
  { id: 'colour', label: '03 Colour' },
  { id: 'type', label: '04 Type' },
  { id: 'surfaces', label: '05 Surfaces' },
  { id: 'components', label: '06 Components' },
  { id: 'icons', label: '07 Icons' },
  { id: 'motion', label: '08 Motion' },
  { id: 'imagery', label: '09 Imagery' },
  { id: 'donts', label: '10 Don’ts' },
  { id: 'primitives', label: '11 Primitives' },
  { id: 'assets', label: '12 Assets' },
] as const;

const SURFACES = [
  { name: 'Page base', token: '--eco-bg' },
  { name: 'Raised', token: '--eco-raised' },
  { name: 'Elevated', token: '--eco-elevated' },
] as const;

const TEXT_SWATCHES = [
  { name: 'Ink', token: '--eco-ink' },
  { name: 'Muted', token: '--eco-muted' },
  { name: 'Faint', token: '--eco-faint' },
] as const;

const SIGNAL_SWATCHES = [
  { name: 'Leaf', token: '--eco-leaf' },
  { name: 'Canopy', token: '--eco-canopy' },
  { name: 'Kin', token: '--eco-kin' },
  { name: 'Alert', token: '--eco-alert' },
] as const;

function Swatch({
  name,
  token,
  fill,
}: {
  name: string;
  token: string;
  /** CSS color — prefer `var(--token)`; petals may use domain hex */
  fill: string;
}) {
  return (
    <div className="bs-swatch">
      <div className="chip" style={{ background: fill }} />
      <div className="meta">
        <p className="name">{name}</p>
        <p className="token">{token}</p>
      </div>
    </div>
  );
}

export default function BrandSystemPage() {
  if (
    !flag('ECO_ALLOW_DEV_LOGIN') &&
    !flag('ECO_ALLOW_PROOF_STUB')
  ) {
    notFound();
  }

  return (
    <main className="bs-page">
      <header className="bs-hero">
        <p className="bs-kicker">Brand system · v1 · 2026</p>
        <h1>Ecologikal brand — regenerative by construction.</h1>
        <p className="lede">
          Identity, voice, colour, typography, surfaces, components, motion and
          the don&apos;ts. Every specimen below is composed from live design
          tokens — if the canopy changes, this page changes with it.
        </p>
        <ul className="bs-toc">
          {TOC.map((item) => (
            <li key={item.id}>
              <a href={`#${item.id}`}>{item.label}</a>
            </li>
          ))}
        </ul>
      </header>

      <section className="bs-section" id="identity">
        <div className="bs-section-head">
          <p className="bs-index">01 · Identity</p>
          <h2>The mark, the wordmark, the lockup.</h2>
          <p className="intro">
            Three forms, one organism. The seven-petal flower stands alone for
            tight UI; the lockup carries the regenerative network context.
          </p>
        </div>
        <div className="bs-identity-row">
          <div className="bs-mark-card">
            <FlowerMark size={88} />
            <span className="label">Mark · full spectrum</span>
          </div>
          <div className="bs-mark-card">
            <FlowerMark size={88} mono />
            <span className="label">Mark · mono leaf</span>
          </div>
          <div className="bs-mark-card" style={{ minWidth: '16rem' }}>
            <div className="eco-lockup bs-lockup">
              <FlowerMark size={44} decorative />
              <EcoWordmark as="p" />
            </div>
            <span className="label">Primary lockup</span>
          </div>
          <div className="bs-mark-card" style={{ minWidth: '16rem' }}>
            <div className="eco-lockup bs-lockup">
              <FlowerMark size={44} mono decorative />
              <div>
                <EcoWordmark as="p" />
                <p
                  className="bs-type-mono"
                  style={{ marginTop: '0.2rem', letterSpacing: '0.12em' }}
                >
                  red regenerativa
                </p>
              </div>
            </div>
            <span className="label">Extended lockup</span>
          </div>
        </div>
        <div className="bs-panel" style={{ marginTop: '1.25rem' }}>
          <h3>Clear space</h3>
          <p>
            Reserve a margin equal to the mark diameter on all four sides.
            Nothing — text, UI, imagery — encroaches inside that frame. Never
            recolour <em>logikal</em> in kin gold; leaf green only.
          </p>
        </div>
      </section>

      <section className="bs-section" id="voice">
        <div className="bs-section-head">
          <p className="bs-index">02 · Thesis & voice</p>
          <h2>Field-useful. Peer-attested. Compost-warm.</h2>
          <p className="intro">
            One thesis. A deliberately grounded voice. Marketing dopamine is
            rejected by construction.
          </p>
        </div>
        <p className="bs-thesis">La flor es tu reputación.</p>
        <p className="bs-thesis-en">Your flower is your reputation.</p>
        <div className="bs-voice-attrs">
          <article>
            <strong>Field-useful</strong>
            <span>Write like a coop bulletin — concrete, actionable.</span>
          </article>
          <article>
            <strong>Peer-attested</strong>
            <span>Claims come from references, not self-promo.</span>
          </article>
          <article>
            <strong>Compost-warm</strong>
            <span>Alive and grounded — never cold, never syrupy.</span>
          </article>
          <article>
            <strong>Intentional</strong>
            <span>Six modes of being. No infinite-scroll filler.</span>
          </article>
          <article>
            <strong>Spanish-first</strong>
            <span>ES carries gravity; EN keeps the same weight.</span>
          </article>
        </div>
        <div className="bs-say-grid">
          <div className="bs-panel bs-say do">
            <h3>Do say</h3>
            <ul>
              <li>Declara tus pétalos. Gana KINS. Conoce por habilidad.</li>
              <li>Amplifica lo útil — no “likes” vacíos.</li>
              <li>Tu flor crece con referencias de pares.</li>
              <li>Eco-centros con reglas de vida, no páginas genéricas.</li>
            </ul>
          </div>
          <div className="bs-panel bs-say dont">
            <h3>Don&apos;t say</h3>
            <ul>
              <li>Revolutionary AI-powered eco experience!!!</li>
              <li>Save the planet in one click 🌍✨</li>
              <li>World-class LinkedIn for hippies.</li>
              <li>Boost your personal brand today.</li>
            </ul>
          </div>
        </div>
      </section>

      <section className="bs-section" id="colour">
        <div className="bs-section-head">
          <p className="bs-index">03 · Colour</p>
          <h2>Canopy, leaf, kin — plus seven petals.</h2>
          <p className="intro">
            Committed canopy strategy. Forest carries the product; leaf is the
            signal; kin marks earned value; petals are taxonomy only.
          </p>
        </div>
        <p className="bs-eyebrow">
          <span className="sq" /> Surfaces
        </p>
        <div className="bs-grid" style={{ marginBottom: '1.5rem' }}>
          {SURFACES.map((s) => (
            <Swatch key={s.token} name={s.name} token={s.token} fill={`var(${s.token})`} />
          ))}
        </div>
        <p className="bs-eyebrow">
          <span className="sq" /> Type
        </p>
        <div className="bs-grid" style={{ marginBottom: '1.5rem' }}>
          {TEXT_SWATCHES.map((s) => (
            <Swatch key={s.token} name={s.name} token={s.token} fill={`var(${s.token})`} />
          ))}
        </div>
        <p className="bs-eyebrow">
          <span className="sq" /> Signal
        </p>
        <div className="bs-grid" style={{ marginBottom: '1.5rem' }}>
          {SIGNAL_SWATCHES.map((s) => (
            <Swatch key={s.token} name={s.name} token={s.token} fill={`var(${s.token})`} />
          ))}
        </div>
        <p className="bs-eyebrow">
          <span className="sq" /> Petal spectrum · IDs 1–7 stable forever
        </p>
        <div className="bs-grid">
          {PETALS.map((petal) => (
            <Swatch
              key={petal.id}
              name={`${petal.id}. ${petal.nameEs}`}
              token={`PETALS[${petal.id - 1}]`}
              fill={petal.color}
            />
          ))}
        </div>
      </section>

      <section className="bs-section" id="type">
        <div className="bs-section-head">
          <p className="bs-index">04 · Typography</p>
          <h2>Petrona display. Source Sans 3 UI. JetBrains Mono markers.</h2>
          <p className="intro">
            Latin-American serif for brand gravity; humanist sans for bilingual
            product UI; mono for petal IDs, KINS, and structural eyebrows.
          </p>
        </div>
        <div className="bs-type-row">
          <div className="bs-type-specimen">
            <p className="meta">
              Display · Petrona · clamp(2.4rem, 5.4vw, 4rem) · −0.03 tracking
            </p>
            <p className="bs-type-display">La flor es tu reputación.</p>
          </div>
          <div className="bs-type-specimen">
            <p className="meta">Section · Petrona · clamp(1.5rem, 3.2vw, 2.35rem)</p>
            <p className="bs-type-section">Diseñado para participar, no scrollear.</p>
          </div>
          <div className="bs-type-specimen">
            <p className="meta">Body · Source Sans 3 · 1.05rem · 1.65 leading</p>
            <p className="bs-type-body">
              Ecologikal convierte la participación ecológica en un juego
              estructurado de conexión: gana KINS, viaja a eco-centros, protege
              ecozonas, y conoce econautas por habilidad — no por métricas de
              vanidad.
            </p>
          </div>
          <div className="bs-type-specimen">
            <p className="meta">Eyebrow / mono · JetBrains Mono · 0.7rem · 0.16em</p>
            <p className="bs-type-mono">
              PÉTALOS 1–7 · KINS 240 · 25.6866°N 100.3161°W · AMPLIFICA
            </p>
          </div>
        </div>
      </section>

      <section className="bs-section" id="surfaces">
        <div className="bs-section-head">
          <p className="bs-index">05 · Surfaces & hairlines</p>
          <h2>Three canopy tones, two hairline tiers.</h2>
          <p className="intro">
            Depth from tonal steps, not shadow stacks. Every panel sits on a 1px
            line — no glassmorphism, no glow halos on leaf.
          </p>
        </div>
        <div className="bs-grid-2">
          <div className="bs-surface-stack">
            {SURFACES.map((s) => (
              <div
                key={s.token}
                className="bs-surface"
                style={{ background: `var(${s.token})` }}
              >
                <strong>{s.name}</strong>
                <code>{s.token}</code>
              </div>
            ))}
          </div>
          <div className="bs-panel">
            <h3>Hairlines</h3>
            <ul>
              <li>
                <code>--eco-line</code> — default 1px border, section dividers
              </li>
              <li>
                <code>--eco-line-strong</code> — emphasised edges, resting
                panels
              </li>
              <li>
                <code>--eco-leaf</code> — key underlines and markers only
              </li>
            </ul>
            <h3 style={{ marginTop: '1.25rem' }}>Textures</h3>
            <ul>
              <li>Soft canopy vignette on heroes</li>
              <li>Faint radial bloom (leaf / kin at low opacity)</li>
              <li>No blueprint grids, no scanlines (Certexi territory)</li>
            </ul>
          </div>
        </div>
      </section>

      <section className="bs-section" id="components">
        <div className="bs-section-head">
          <p className="bs-index">06 · Components</p>
          <h2>A small, living set of parts.</h2>
          <p className="intro">
            The product is assembled from these. If a screen needs something new,
            the system extends — it doesn&apos;t redesign.
          </p>
        </div>
        <p className="bs-eyebrow">
          <span className="sq" /> Buttons
        </p>
        <div className="bs-comp-row">
          <button type="button" className="btn">
            Empezar mi flor
          </button>
          <button type="button" className="btn secondary">
            Ghost
          </button>
          <Link href="/meet">Quiet link · Conoce</Link>
        </div>
        <p className="bs-eyebrow">
          <span className="sq" /> Badges & chips
        </p>
        <div className="bs-comp-row">
          <span className="badge">240 KINS</span>
          <span className="badge verified">Referencia verificada</span>
        </div>
        <p className="bs-eyebrow">
          <span className="sq" /> Intent signals
        </p>
        <div className="bs-petal-row" style={{ marginBottom: '1.5rem' }}>
          {PETALS.map((petal) => (
            <span
              key={petal.id}
              className="bs-petal-chip"
              style={{ ['--petal' as string]: petal.color }}
            >
              <span className="dot" />
              {petal.id}. {petal.nameEs}
            </span>
          ))}
        </div>
        <p className="bs-eyebrow">
          <span className="sq" /> Six pillars
        </p>
        <div className="bs-pillar-grid">
          {PILLARS.map((p) => {
            const Icon = PILLAR_ICONS[p.id];
            return (
              <div key={p.id} className="bs-pillar">
                <Icon size={22} weight="bold" aria-hidden />
                <strong>{p.labelEs}</strong>
                <span>{p.labelEn}</span>
              </div>
            );
          })}
        </div>
      </section>

      <section className="bs-section" id="icons">
        <div className="bs-section-head">
          <p className="bs-index">07 · Iconography</p>
          <h2>Phosphor for actions. Flower for identity.</h2>
          <p className="intro">
            Pillar and action icons use Phosphor (bold in nav). Petal meaning
            stays colour + stable ID + flower geometry — never erase the taxonomy
            with a generic icon kit.
          </p>
        </div>
        <div className="bs-comp-row">
          {PILLARS.map((p) => {
            const Icon = PILLAR_ICONS[p.id];
            return (
              <span
                key={p.id}
                className="bs-petal-chip"
                title={p.labelEs}
                style={{ gap: '0.5rem' }}
              >
                <Icon size={18} weight="bold" aria-hidden />
                {p.labelEs}
              </span>
            );
          })}
        </div>
      </section>

      <section className="bs-section" id="motion">
        <div className="bs-section-head">
          <p className="bs-index">08 · Motion</p>
          <h2>One organic ease. Nothing bounces.</h2>
          <p className="intro">
            Content rises into place once. Reduced-motion users get the same
            compositions with transforms snapped to the final state.
          </p>
        </div>
        <div className="bs-grid">
          <div className="bs-panel">
            <h3>Easing</h3>
            <p>
              <code>cubic-bezier(0.23, 1, 0.32, 1)</code>
              <br />
              Fast start, settled end — applied to reveals, hovers, and staggers.
            </p>
          </div>
          <div className="bs-panel">
            <h3>Durations</h3>
            <p>
              UI · 180ms
              <br />
              Rise-in · --eco-rise-in (0.65s, on load)
              <br />
              Stagger · --eco-stagger (70ms)
            </p>
          </div>
          <div className="bs-panel">
            <h3>Flower</h3>
            <p>
              Reveal may breathe once on first paint. No infinite neon pulse. No
              spring bounce.
            </p>
          </div>
        </div>
      </section>

      <section className="bs-section" id="imagery">
        <div className="bs-section-head">
          <p className="bs-index">09 · Imagery</p>
          <h2>Hands, places, skills — not leaf stickers.</h2>
          <p className="intro">
            Photography shows regenerative work and venues. Atmosphere from real
            context, not abstract “nature” gradients.
          </p>
        </div>
        <div className="bs-say-grid">
          <div className="bs-panel bs-say do">
            <h3>Do show</h3>
            <ul>
              <li>Workshops, tools, soil, travel stops</li>
              <li>Soft daylight, chlorophyll shadows</li>
              <li>People with visible skills</li>
              <li>Ecozonas as stewardship maps</li>
            </ul>
          </div>
          <div className="bs-panel bs-say dont">
            <h3>Don&apos;t show</h3>
            <ul>
              <li>Stock handshake + leaf overlay</li>
              <li>Neon cyber-forest</li>
              <li>Influencer vanity crops</li>
              <li>Abstract blob gradients as nature</li>
            </ul>
          </div>
        </div>
      </section>

      <section className="bs-section" id="donts">
        <div className="bs-section-head">
          <p className="bs-index">10 · Don&apos;ts</p>
          <h2>What the brand is not.</h2>
          <p className="intro">
            The system is defined as much by what we refuse as by what we ship.
          </p>
        </div>
        <div className="bs-dont-grid">
          <div className="bs-dont">No Certexi graphite + signal-lime cosplay</div>
          <div className="bs-dont">No purple / indigo SaaS gradients</div>
          <div className="bs-dont">
            No cream + terracotta editorial cliché as default
          </div>
          <div className="bs-dont">No exclamation marks or emoji in body copy</div>
          <div className="bs-dont">No glassmorphism card stacks</div>
          <div className="bs-dont">
            No collapsing six pillars into Home / Feed / Profile
          </div>
          <div className="bs-dont">
            No renaming Amplificate / Broadcast to Like / Share
          </div>
          <div className="bs-dont">No eighth petal or parallel category enum</div>
        </div>
      </section>

      <section className="bs-section" id="primitives">
        <div className="bs-section-head">
          <p className="bs-index">11 · Product primitives</p>
          <h2>The brand encodes the product OS.</h2>
          <p className="intro">
            If a visual pattern contradicts a primitive, the primitive wins.
          </p>
        </div>
        <div className="bs-grid">
          {[
            '7-petal taxonomy',
            'Skill flower + peer refs',
            'KINS currency',
            'Amplificate / Broadcast',
            'Role graphs',
            'Six intent pillars',
            'Eco-center as venue',
            'Travel diary',
          ].map((item) => (
            <div key={item} className="bs-panel">
              <h3>{item}</h3>
            </div>
          ))}
        </div>
      </section>

      <section className="bs-section" id="assets">
        <div className="bs-section-head">
          <p className="bs-index">12 · Assets</p>
          <h2>Source of truth in the repo.</h2>
          <p className="intro">
            Apply the brand by composing these parts — never by replacing them.
          </p>
        </div>
        <div className="bs-grid">
          <div className="bs-panel">
            <h3>Docs</h3>
            <ul>
              <li>
                <code>docs/BRAND_SYSTEM.md</code>
              </li>
              <li>
                <code>DESIGN.md</code> · <code>PRODUCT.md</code>
              </li>
            </ul>
          </div>
          <div className="bs-panel">
            <h3>Code</h3>
            <ul>
              <li>
                <code>apps/web/components/brand/flowerMarkGeometry.ts</code>
              </li>
              <li>
                <code>apps/web/components/brand/brandPalette.ts</code>
              </li>
              <li>
                <code>apps/web/components/brand/FlowerMark.tsx</code>
              </li>
              <li>
                <code>apps/web/app/icon.tsx</code>
              </li>
              <li>
                <code>apps/web/app/globals.css</code>
              </li>
              <li>
                <code>packages/domain/src/petals.ts</code>
              </li>
            </ul>
          </div>
          <div className="bs-panel">
            <h3>Sibling OS</h3>
            <p>
              Certexi owns proof/SSO patterns — not Eco visuals. Same platform
              plane, separate brands. Do not merge looks.
            </p>
          </div>
        </div>
      </section>

      <footer className="bs-footer">
        <p className="thesis-echo">La flor es tu reputación.</p>
        <div className="row">
          <Link className="btn" href="/login">
            Empezar mi flor
          </Link>
          <Link className="btn secondary" href="/">
            Back to Eco
          </Link>
        </div>
      </footer>
    </main>
  );
}
