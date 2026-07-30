import type { Metadata } from 'next';
import Link from 'next/link';
import { notFound } from 'next/navigation';
import {
  flowerSnapshot,
  balanceFor,
  getPetal,
  PETALS,
} from '@ecologikal/domain';
import { getSession } from '@/lib/auth';
import { readStore } from '@/lib/store';
import { FlowerViz } from '@/components/FlowerViz';
import { AddReferenceForm } from '@/components/ClientForms';
import { CopyLinkButton } from '@/components/CopyLinkButton';

type Props = {
  params: Promise<{ userId: string }>;
};

async function loadProfile(userId: string) {
  const db = await readStore();
  const profile = db.profiles.find((p) => p.userId === userId);
  if (!profile) return null;
  const skills = db.skills.filter((s) => s.userId === userId);
  const refs = db.skillReferences.filter((r) => r.toUserId === userId);
  return { db, profile, skills, refs };
}

export async function generateMetadata({ params }: Props): Promise<Metadata> {
  const { userId: rawId } = await params;
  const userId = decodeURIComponent(rawId);
  const data = await loadProfile(userId);
  if (!data) {
    return { title: 'Flor · Ecologikal' };
  }
  const petalNames = [
    ...new Set(data.skills.map((s) => getPetal(s.petalId).nameEs)),
  ];
  const petalLine =
    petalNames.length > 0
      ? petalNames.slice(0, 3).join(', ')
      : PETALS.map((p) => p.nameEs).slice(0, 2).join(', ');
  const title = `${data.profile.displayName} · flor Ecologikal`;
  const description = `${data.profile.displayName} crece en ${petalLine}. Reputación por habilidades, no por likes.`;
  return {
    title,
    description,
    openGraph: {
      title,
      description,
      type: 'profile',
    },
  };
}

export default async function PublicProfilePage({ params }: Props) {
  const { userId: rawId } = await params;
  const userId = decodeURIComponent(rawId);
  const session = await getSession();
  const data = await loadProfile(userId);
  if (!data) notFound();

  const { db, profile, skills, refs } = data;
  const snapshot = flowerSnapshot(skills, refs);
  const kins = balanceFor(db.kins, userId);
  const proofs = db.proofs.filter((p) => p.subjectUserId === userId);
  const isSelf = session?.username === userId;
  const canAttest = Boolean(session && !isSelf && skills.length > 0);
  const publicPath = `/profile/${encodeURIComponent(userId)}`;

  return (
    <main className="stack">
      <section className="card">
        <h1>{profile.displayName}</h1>
        <p className="muted">
          <span className="badge">{profile.accountClass}</span> · @{userId} ·
          KINS <strong>{kins}</strong>
          {isSelf ? (
            <>
              {' · '}
              <Link href="/profile">Editar mi perfil</Link>
            </>
          ) : null}
        </p>
        {profile.bio ? <p>{profile.bio}</p> : null}
        {isSelf ? (
          <div className="row" style={{ marginTop: '0.75rem' }}>
            <CopyLinkButton url={publicPath} className="btn secondary" />
            <span className="muted" style={{ fontSize: '0.85rem' }}>
              Comparte tu flor
            </span>
          </div>
        ) : null}
        <FlowerViz
          snapshot={snapshot}
          skills={skills}
          refs={refs}
          proofs={proofs.map((p) => ({ id: p.id, stub: p.stub }))}
        />
      </section>

      <section className="card">
        <h2>Skills</h2>
        {skills.length === 0 ? (
          <p className="muted">Sin skills declaradas.</p>
        ) : (
          <ul>
            {skills.map((s) => (
              <li key={s.id}>
                {s.name} · {getPetal(s.petalId).nameEs} · nivel {s.level}
              </li>
            ))}
          </ul>
        )}
      </section>

      <section className="card">
        <h2>Referencias</h2>
        {refs.length === 0 ? (
          <p className="muted">Sin referencias aún.</p>
        ) : (
          <ul>
            {refs.map((r) => {
              const proof = proofs.find((p) => p.id === r.proofId);
              const skill = skills.find((s) => s.id === r.skillId);
              return (
                <li key={r.id}>
                  {skill?.name ?? r.skillId} · de {r.fromUserId} · grado{' '}
                  {r.grade}
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

      {canAttest ? (
        <section className="card" id="attest">
          <h2>Atestar skill</h2>
          <p className="muted">
            Deja una referencia peer-attested. Suma +3 KINS a{' '}
            {profile.displayName}.
          </p>
          <AddReferenceForm
            skills={skills.map((s) => ({
              id: s.id,
              name: s.name,
              userId: s.userId,
            }))}
            toUserId={userId}
          />
        </section>
      ) : null}

      {!session ? (
        <section className="card">
          <h2>¿Te gusta esta flor?</h2>
          <p className="muted">
            Entra y dibuja la tuya — reputación por lo que sabes hacer.
          </p>
          <Link className="btn" href="/login">
            Entrar y crear mi flor
          </Link>
        </section>
      ) : null}
    </main>
  );
}
