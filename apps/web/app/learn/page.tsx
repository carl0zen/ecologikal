import { getPetal, isPetalId } from '@ecologikal/domain';
import { readStore } from '@/lib/store';
import { EngageButtons } from '@/components/ClientForms';
import { getSession } from '@/lib/auth';

export default async function LearnPage() {
  const db = await readStore();
  const session = await getSession();

  return (
    <main className="stack">
      <section className="card">
        <h1>Aprende</h1>
        <p className="muted">
          Conocimiento útil por pétalo. Engagement = Amplificate / Broadcast
          (no likes).
        </p>
      </section>

      {db.posts.map((post) => {
        const amp = db.amplifications.filter((a) => a.postId === post.id)
          .length;
        const bcast = db.broadcasts.filter((b) => b.postId === post.id).length;
        const petalLabel = isPetalId(post.petalId)
          ? getPetal(post.petalId).nameEs
          : `petal ${post.petalId}`;
        return (
          <article key={post.id} className="card">
            <h2>{post.title}</h2>
            <p className="muted">
              {petalLabel} · {post.authorId}
            </p>
            <p>{post.body}</p>
            <p className="muted">
              Amplificate {amp} · Broadcast {bcast}
            </p>
            {session ? <EngageButtons postId={post.id} /> : null}
          </article>
        );
      })}
    </main>
  );
}
