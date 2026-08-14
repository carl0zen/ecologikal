import Link from 'next/link';
import { PETALS, PILLARS } from '@ecologikal/domain';
import { EcoWordmark, FlowerMark } from '@/components/brand/FlowerMark';
import { SeedDemoButton } from '@/components/ClientForms';
import { flag } from '@/lib/env';
import { vintageUrl } from '@/lib/urls';

export default function HomePage() {
  const vintage = vintageUrl('/');
  const allowDev =
    flag('ECO_ALLOW_DEV_LOGIN') || flag('ECO_ALLOW_PROOF_STUB');

  return (
    <main>
      <section className="home-hero">
        <div className="eco-lockup">
          <FlowerMark size={64} decorative />
          <EcoWordmark as="p" />
        </div>
        <p className="promise">
          Tu flor de habilidades es tu reputación en la red regenerativa.
        </p>
        <p className="muted home-support">
          Declara pétalos, gana KINS, y conoce econautas por lo que saben hacer.
        </p>
        <div className="row" style={{ marginTop: '1.5rem' }}>
          <Link className="btn" href="/login">
            Empezar mi flor
          </Link>
          <Link className="btn secondary" href="/meet">
            Conoce
          </Link>
        </div>
        <div className="pillars" style={{ marginTop: '1.25rem' }}>
          {PILLARS.map((p) => (
            <Link key={p.id} href={p.href}>
              {p.labelEs}
            </Link>
          ))}
        </div>
      </section>

      <section className="card" style={{ marginTop: '2rem' }}>
        <h2>Siete pétalos</h2>
        <div className="row" style={{ marginTop: '0.75rem' }}>
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
      </section>

      {allowDev ? (
        <section className="card home-dev">
          <h2>Desarrollo</h2>
          <p className="muted">
            Dual-stack, semillas y specimen de marca — solo con flags de demo.
          </p>
          <div className="row" style={{ marginTop: '0.75rem' }}>
            <a className="btn secondary" href={vintage}>
              Vintage PHP
            </a>
            <Link className="btn secondary" href="/brand-system">
              Brand system
            </Link>
            <SeedDemoButton />
          </div>
        </section>
      ) : null}
    </main>
  );
}
