import Link from 'next/link';
import { PILLARS } from '@ecologikal/domain';
import { getSession } from '@/lib/auth';
import { vintageUrl } from '@/lib/urls';

export async function Nav() {
  const session = await getSession();
  const vintage = vintageUrl('/');

  return (
    <header className="nav">
      <Link href="/" className="brand">
        Eco<span>logikal</span>
        <span className="badge" style={{ marginLeft: '0.5rem' }}>
          v2
        </span>
      </Link>
      <nav className="pillars" aria-label="Pillars">
        {PILLARS.map((p) => (
          <Link key={p.id} href={p.href}>
            {p.labelEs}
          </Link>
        ))}
      </nav>
      <div className="row">
        <a className="btn secondary" href={vintage} title="Vintage PHP UI">
          Vintage
        </a>
        {session ? (
          <>
            <span className="muted" style={{ fontSize: '0.85rem' }}>
              {session.username}
              {session.accountClass ? ` · ${session.accountClass}` : ''}
            </span>
            <Link className="btn secondary" href="/profile">
              Perfil
            </Link>
            <Link className="btn secondary" href="/admin">
              Admin
            </Link>
            <form action="/api/auth/logout" method="post">
              <button className="btn secondary" type="submit">
                Salir
              </button>
            </form>
          </>
        ) : (
          <Link className="btn" href="/login">
            Entrar
          </Link>
        )}
      </div>
    </header>
  );
}
