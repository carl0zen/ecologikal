import { flowerSnapshot, getPetal } from '@ecologikal/domain';
import { readStore } from '@/lib/store';
import { FlowerViz } from '@/components/FlowerViz';

export default async function MeetPage() {
  const db = await readStore();
  const guests = db.profiles.filter((p) => p.accountClass !== 'admin');

  return (
    <main className="stack">
      <section className="card">
        <h1>Conoce</h1>
        <p className="muted">
          Econautas por flor de skills — reputación visual, no keyword spam.
        </p>
      </section>

      <section className="grid">
        {guests.length === 0 ? (
          <div className="card">
            <p className="muted">Sin perfiles aún.</p>
          </div>
        ) : (
          guests.map((p) => {
            const skills = db.skills.filter((s) => s.userId === p.userId);
            const refs = db.skillReferences.filter(
              (r) => r.toUserId === p.userId,
            );
            const snap = flowerSnapshot(skills, refs);
            return (
              <article key={p.userId} className="card">
                <h2>{p.displayName}</h2>
                <p className="muted">
                  <span className="badge">{p.accountClass}</span>
                </p>
                <FlowerViz snapshot={snap} />
                <ul>
                  {skills.slice(0, 5).map((s) => (
                    <li key={s.id}>
                      {s.name} · {getPetal(s.petalId).nameEs}
                    </li>
                  ))}
                </ul>
              </article>
            );
          })
        )}
      </section>
    </main>
  );
}
