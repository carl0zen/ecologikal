import Link from 'next/link';
import { PETALS, PILLARS } from '@ecologikal/domain';
import { SeedDemoButton } from '@/components/ClientForms';
import { vintageUrl } from '@/lib/urls';

export default function HomePage() {
  const vintage = vintageUrl('/');
  const allowDev =
    process.env.ECO_ALLOW_DEV_LOGIN === 'true' ||
    process.env.ECO_ALLOW_PROOF_STUB === 'true';

  return (
    <main>
      <section className="home-hero">
        <p className="brand-mark">
          Eco<em>logikal</em>
        </p>
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
            Dual-stack y semillas — solo con flags de demo.
          </p>
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
