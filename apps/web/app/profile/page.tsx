import { redirect } from 'next/navigation';
import { flowerSnapshot, balanceFor, getPetal } from '@ecologikal/domain';
import { getSession } from '@/lib/auth';
import { readStore } from '@/lib/store';
import { FlowerViz } from '@/components/FlowerViz';
import { AddSkillForm } from '@/components/ClientForms';

export default async function ProfilePage() {
  const session = await getSession();
  if (!session) redirect('/login');

  const db = await readStore();
  const skills = db.skills.filter((s) => s.userId === session.username);
  const refs = db.skillReferences.filter((r) => r.toUserId === session.username);
  const snapshot = flowerSnapshot(skills, refs);
  const kins = balanceFor(db.kins, session.username);
  const proofs = db.proofs.filter((p) => p.subjectUserId === session.username);

  return (
    <main className="stack">
      <section className="card">
        <h1>{session.username}</h1>
        <p className="muted">
          Clase <span className="badge">{session.accountClass}</span> · KINS{' '}
          <strong>{kins}</strong>
        </p>
        <FlowerViz snapshot={snapshot} />
      </section>

      <section className="grid">
        <div className="card">
          <h2>Declarar skill</h2>
          <AddSkillForm />
        </div>
        <div className="card">
          <h2>Mis skills</h2>
          {skills.length === 0 ? (
            <p className="muted">Aún no declaras skills.</p>
          ) : (
            <ul>
              {skills.map((s) => (
                <li key={s.id}>
                  {s.name} · {getPetal(s.petalId).nameEs} · nivel {s.level}
                </li>
              ))}
            </ul>
          )}
        </div>
      </section>

      <section className="card">
        <h2>Referencias / proofs</h2>
        {refs.length === 0 ? (
          <p className="muted">Sin referencias aún.</p>
        ) : (
          <ul>
            {refs.map((r) => {
              const proof = proofs.find((p) => p.id === r.proofId);
              return (
                <li key={r.id}>
                  de {r.fromUserId} · grado {r.grade}{' '}
                  {proof ? (
                    <span className="badge verified">
                      {proof.stub ? 'proof stub' : 'verified'} {proof.id}
                    </span>
                  ) : null}
                </li>
              );
            })}
          </ul>
        )}
      </section>
    </main>
  );
}
