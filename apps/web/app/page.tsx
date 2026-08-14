import Link from 'next/link';
import { PETALS, PILLARS } from '@ecologikal/domain';
import {
  AirplaneTilt,
  BookOpen,
  Compass,
  GameController,
  Handshake,
  UsersThree,
} from '@phosphor-icons/react/ssr';
import { SeedDemoButton } from '@/components/ClientForms';
import { FlagshipScene, ValleScene } from '@/components/scenes';
import { vintageUrl } from '@/lib/urls';

const PILLAR_META: Record<
  string,
  {
    Icon: React.ComponentType<{
      size?: number;
      weight?: 'duotone';
      'aria-hidden'?: boolean;
    }>;
    tile: string;
    tag: string;
  }
> = {
  play: {
    Icon: GameController,
    tile: 'var(--gold)',
    tag: 'Gana KINS con cada acción regenerativa.',
  },
  travel: {
    Icon: AirplaneTilt,
    tile: 'var(--blue)',
    tag: 'Diarios de viaje colectivos entre eco-centros.',
  },
  discover: {
    Icon: Compass,
    tile: 'var(--green-bright)',
    tag: 'Ecozonas y necesidades cerca de ti.',
  },
  learn: {
    Icon: BookOpen,
    tile: 'var(--pink)',
    tag: 'Saber útil, filtrado por pétalo.',
  },
  meet: {
    Icon: UsersThree,
    tile: 'var(--green)',
    tag: 'Econautas por lo que saben hacer.',
  },
  cooperate: {
    Icon: Handshake,
    tile: 'var(--gold)',
    tag: 'Voluntariado experto con recompensa.',
  },
};

export default function HomePage() {
  const vintage = vintageUrl('/');
  const allowDev =
    process.env.ECO_ALLOW_DEV_LOGIN === 'true' ||
    process.env.ECO_ALLOW_PROOF_STUB === 'true';

  return (
    <main>
      {/* ——— Cinematic opening ——— */}
      <section className="cine-hero full-bleed" aria-label="Ecologikal">
        <ValleScene />
        <div className="cine-content">
          <div className="cine-panel glass-panel">
            <p className="kicker">La red regenerativa</p>
            <p className="brand-mark">
              Tu flor es tu <em>reputación</em>
            </p>
            <p className="promise">
              Declara pétalos, gana KINS y encuentra tu lugar en la tierra que
              estamos regenerando.
            </p>
            <div className="row" style={{ marginTop: '1.4rem' }}>
              <Link className="btn" href="/login">
                Empezar mi flor
              </Link>
              <Link className="btn secondary" href="/meet">
                Conocer econautas
              </Link>
            </div>
          </div>
        </div>
      </section>

      {/* ——— Six modes, one rail ——— */}
      <div className="section-head">
        <h2>Seis maneras de estar</h2>
        <span className="muted" style={{ fontSize: '0.85rem' }}>
          Modos de participación, no un feed
        </span>
      </div>
      <div className="rail" role="list">
        {PILLARS.map((p) => {
          const meta = PILLAR_META[p.id];
          const Icon = meta.Icon;
          return (
            <Link
              key={p.id}
              role="listitem"
              href={p.href}
              className="rail-card"
              style={{ ['--tile' as string]: meta.tile }}
            >
              <div className="rail-icon">
                <Icon size={26} weight="duotone" aria-hidden />
              </div>
              <h3>{p.labelEs}</h3>
              <p>{meta.tag}</p>
            </Link>
          );
        })}
      </div>

      {/* ——— Flagship center ——— */}
      <section className="flagship" aria-label="Agroabundanza Institute">
        <FlagshipScene />
        <div className="flagship-inner glass-panel">
          <p className="kicker">Centro insignia · 330 hectáreas</p>
          <h2>Agroabundanza Institute</h2>
          <p className="muted" style={{ margin: 0, fontSize: '0.95rem' }}>
            Retiros donde se trabaja en problemas reales: agroecología,
            educación vivencial e innovación para la abundancia sustentable.
          </p>
          <ul className="principles">
            <li>Regenerar</li>
            <li>Educar</li>
            <li>Elevar</li>
          </ul>
          <div className="row">
            <Link className="btn gold" href="/cooperate">
              Ver retiros y vacantes
            </Link>
            <Link className="btn secondary" href="/travel">
              Planear visita
            </Link>
          </div>
        </div>
      </section>

      {/* ——— Petal taxonomy ——— */}
      <div className="section-head">
        <h2>Siete pétalos</h2>
        <span className="muted" style={{ fontSize: '0.85rem' }}>
          Una sola taxonomía para todo
        </span>
      </div>
      <div className="petal-strip">
        {PETALS.map((petal) => (
          <span
            key={petal.id}
            className="badge"
            style={{ borderColor: petal.color, color: petal.color }}
          >
            {petal.id}. {petal.nameEs}
          </span>
        ))}
      </div>

      {allowDev ? (
        <section className="card home-dev">
          <h2>Desarrollo</h2>
          <p className="muted">Dual-stack y semillas — solo con flags de demo.</p>
          <div className="row" style={{ marginTop: '0.75rem' }}>
            <a className="btn secondary" href={vintage}>
              Vintage PHP
            </a>
            <SeedDemoButton />
          </div>
        </section>
      ) : null}
    </main>
  );
}
