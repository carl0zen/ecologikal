import Link from 'next/link';
import { PILLARS } from '@ecologikal/domain';
import { EcoWordmark, FlowerMark } from '@/components/brand/FlowerMark';
import { PILLAR_ICONS } from '@/components/brand/pillarIcons';
import { getSession } from '@/lib/auth';
import { vintageUrl } from '@/lib/urls';
import { ThemeToggle } from '@/components/ThemeToggle';

export async function Nav() {
  const session = await getSession();
  const vintage = vintageUrl('/');

  return (
    <header className="nav">
      <Link href="/" className="eco-lockup">
        <FlowerMark size={28} decorative />
        <EcoWordmark />
        <span className="badge" style={{ marginLeft: '0.35rem' }}>
          v2
        </span>
      </Link>
      <nav className="pillars" aria-label="Pillars">
        {PILLARS.map((p) => {
          const Icon = PILLAR_ICONS[p.id];
          return (
            <Link key={p.id} href={p.href}>
              <Icon size={15} weight="bold" aria-hidden />
              {p.labelEs}
            </Link>
          );
        })}
      </nav>
      <div className="row">
        <ThemeToggle />
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
