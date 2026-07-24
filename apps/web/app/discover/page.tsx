import { getPetal } from '@ecologikal/domain';
import { getSession } from '@/lib/auth';
import { readStore } from '@/lib/store';
import { CreatePlaceNeedForm } from '@/components/ClientForms';
import { vintageUrl } from '@/lib/urls';

export default async function DiscoverPage() {
  const db = await readStore();
  const session = await getSession();

  return (
    <main className="stack">
      <section className="card">
        <h1>Descubre</h1>
        <p className="muted">
          Ecozonas y necesidades ecosociales. El feed vintage sigue en{' '}
          <a href={vintageUrl('/discoverfeed.php')}>discoverfeed.php</a>.
        </p>
      </section>

      <section className="grid">
        <div className="card">
          <h2>Ecozonas</h2>
          {db.places.length === 0 ? (
            <p className="muted">Sin lugares. Siembra demo o publica uno.</p>
          ) : (
            <ul>
              {db.places.map((p) => (
                <li key={p.id}>
                  <strong>{p.name}</strong> — {p.summary}{' '}
                  <span className="muted">({p.founderUserId})</span>
                </li>
              ))}
            </ul>
          )}
        </div>
        <div className="card">
          <h2>Necesidades</h2>
          {db.needs.length === 0 ? (
            <p className="muted">Sin necesidades aún.</p>
          ) : (
            <ul>
              {db.needs.map((n) => (
                <li key={n.id}>
                  <strong>{n.title}</strong> · {getPetal(n.petalId).nameEs}
                  {n.kinsGoal ? ` · meta ${n.kinsGoal} KINS` : ''}
                </li>
              ))}
            </ul>
          )}
        </div>
        {session ? (
          <div className="card">
            <h2>Publicar</h2>
            <CreatePlaceNeedForm
              places={db.places.map((p) => ({ id: p.id, name: p.name }))}
            />
          </div>
        ) : null}
      </section>
    </main>
  );
}
