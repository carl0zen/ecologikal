import Link from 'next/link';
import { PETALS, PILLARS } from '@ecologikal/domain';
import { SeedDemoButton } from '@/components/ClientForms';
import { vintageUrl } from '@/lib/urls';

export default function HomePage() {
  const vintage = vintageUrl('/');
  const allowSeed =
    process.env.ECO_ALLOW_DEV_LOGIN === 'true' ||
    process.env.ECO_ALLOW_PROOF_STUB === 'true';

  return (
    <main>
      <section className="card">
        <h1>
          Red <span style={{ color: 'var(--green-bright)' }}>Eco</span> +{' '}
          <span style={{ color: '#7eb6ff' }}>Social</span>
          <span className="badge" style={{ marginLeft: '0.6rem' }}>
            revival v2
          </span>
        </h1>
        <p className="muted" style={{ maxWidth: '40rem' }}>
          Dual-stack: esta UI Next.js coexiste con el PHP vintage. Certexi OS
          aporta SSO y prueba; Eco Nextcloud hosts/guests.
        </p>
        <div className="row" style={{ marginTop: '1.25rem' }}>
          <Link className="btn" href="/login">
            Entrar (v2)
          </Link>
          <a className="btn secondary" href={vintage}>
            Abrir Vintage PHP
          </a>
          <Link className="btn secondary" href="/travel">
            Viaja
          </Link>
          {allowSeed ? <SeedDemoButton /> : null}
        </div>
      </section>

      <section className="grid">
        <article className="card">
          <h2>Vintage</h2>
          <p className="muted">
            PHP 2011–2012 en{' '}
            <code>{vintage}</code> (gateway <code>:8090/</code> o directo{' '}
            <code>:8082</code>).
          </p>
          <ul>
            <li>
              <a href={vintageUrl('/learnfeed.php')}>Aprende</a>
            </li>
            <li>
              <a href={vintageUrl('/meetfeed.php')}>Conoce</a>
            </li>
            <li>
              <a href={vintageUrl('/ecocentersdir.php')}>Viaja</a>
            </li>
            <li>
              <a href={vintageUrl('/discoverfeed.php')}>Descubre</a>
            </li>
          </ul>
        </article>
        <article className="card">
          <h2>Revival v2</h2>
          <p className="muted">
            Pilares con store local + bridge Certexi. Misma IA, nuevo runtime.
          </p>
          <div className="pillars" style={{ marginTop: '0.5rem' }}>
            {PILLARS.map((p) => (
              <Link key={p.id} href={p.href}>
                {p.labelEs}
              </Link>
            ))}
          </div>
        </article>
      </section>

      <section className="card">
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
    </main>
  );
}
