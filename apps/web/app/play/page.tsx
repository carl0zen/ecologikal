import { balanceFor } from '@ecologikal/domain';
import { getSession } from '@/lib/auth';
import { readStore } from '@/lib/store';
import Link from 'next/link';

export default async function PlayPage() {
  const session = await getSession();
  const db = await readStore();
  const ledger = session
    ? db.kins.filter((k) => k.userId === session.username)
    : [];
  const bal = session ? balanceFor(db.kins, session.username) : 0;

  return (
    <main className="stack">
      <section className="card">
        <h1>Juega · KINS</h1>
        <p className="muted">
          Moneda ecosocial: gana por contribuir, gasta en talleres y estancias.
          Ledger append-only en el vertical; spends de alto valor pueden anclar
          proof.
        </p>
        {session ? (
          <p>
            Balance de {session.username}: <strong>{bal} KINS</strong>
          </p>
        ) : (
          <Link className="btn" href="/login">
            Entrar para ver ledger
          </Link>
        )}
      </section>

      <section className="card">
        <h2>Ledger</h2>
        {ledger.length === 0 ? (
          <p className="muted">Sin movimientos.</p>
        ) : (
          <ul>
            {ledger
              .slice()
              .reverse()
              .map((e) => (
                <li key={e.id}>
                  {e.createdAt.slice(0, 10)} · {e.type} ·{' '}
                  <strong>
                    {e.delta > 0 ? '+' : ''}
                    {e.delta}
                  </strong>
                </li>
              ))}
          </ul>
        )}
      </section>
    </main>
  );
}
