import Link from 'next/link';
import { getPetal } from '@ecologikal/domain';
import { getSession } from '@/lib/auth';
import { readStore } from '@/lib/store';
import { SpendWorkshopButton } from '@/components/ClientForms';
import { vintageUrl } from '@/lib/urls';

export default async function TravelPage() {
  const db = await readStore();
  const session = await getSession();

  return (
    <main className="stack">
      <section className="card">
        <h1>Viaja</h1>
        <p className="muted">
          Ecocentros v2 — talleres y vacantes. Directorio vintage:{' '}
          <a href={vintageUrl('/ecocentersdir.php')}>ecocentersdir.php</a>
        </p>
        <Link className="btn secondary" href="/admin">
          Consola host
        </Link>
      </section>

      <section className="grid">
        {db.centers.length === 0 ? (
          <div className="card">
            <p className="muted">
              Aún no hay ecocentros. Entra como host, usa seed demo, o crea uno.
            </p>
          </div>
        ) : (
          db.centers.map((c) => (
            <article key={c.id} className="card">
              <h2>{c.name}</h2>
              <p className="muted">
                {c.type} · {c.status} · host {c.hostUserId}
              </p>
              <p>{c.summary}</p>
              <h3 style={{ fontSize: '0.95rem' }}>Vacantes</h3>
              <ul>
                {db.vacancies
                  .filter((v) => v.centerId === c.id)
                  .map((v) => (
                    <li key={v.id}>
                      {v.title} · {getPetal(v.petalId).nameEs} ·{' '}
                      {v.recompenseKins} KINS
                    </li>
                  ))}
              </ul>
              <h3 style={{ fontSize: '0.95rem' }}>Talleres</h3>
              <ul>
                {db.workshops
                  .filter((w) => w.centerId === c.id)
                  .map((w) => (
                    <li key={w.id} className="row">
                      <span>
                        {w.title} · {getPetal(w.petalId).nameEs} ·{' '}
                        {w.costKins} KINS
                      </span>
                      {session ? (
                        <SpendWorkshopButton workshopId={w.id} />
                      ) : null}
                    </li>
                  ))}
              </ul>
            </article>
          ))
        )}
      </section>
    </main>
  );
}
