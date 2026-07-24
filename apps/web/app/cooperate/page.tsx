import { getPetal } from '@ecologikal/domain';
import { readStore } from '@/lib/store';
import Link from 'next/link';

export default async function CooperatePage() {
  const db = await readStore();

  return (
    <main className="stack">
      <section className="card">
        <h1>Coopera</h1>
        <p className="muted">
          Vacantes por pétalo + atestación de voluntariado con proof Certexi.
        </p>
        <Link className="btn secondary" href="/admin">
          Atestar como host
        </Link>
      </section>

      <section className="grid">
        {db.vacancies.length === 0 ? (
          <div className="card">
            <p className="muted">Sin vacantes. Publícalas desde Admin.</p>
          </div>
        ) : (
          db.vacancies.map((v) => {
            const center = db.centers.find((c) => c.id === v.centerId);
            const done = db.volunteerCompletions.filter(
              (c) => c.vacancyId === v.id,
            );
            return (
              <article key={v.id} className="card">
                <h2>{v.title}</h2>
                <p className="muted">
                  {center?.name ?? v.centerId} ·{' '}
                  {getPetal(v.petalId).nameEs} · {v.recompenseKins} KINS
                </p>
                {done.map((d) => (
                  <p key={d.id}>
                    <span className="badge verified">
                      {d.guestUserId} completó · {d.proofId}
                    </span>
                  </p>
                ))}
              </article>
            );
          })
        )}
      </section>
    </main>
  );
}
