import Link from 'next/link';
import { PILLARS } from '@ecologikal/domain';
import {
  BookOpen,
  Compass,
  GameController,
  Handshake,
  AirplaneTilt,
  UsersThree,
} from '@phosphor-icons/react/ssr';
import { getSession } from '@/lib/auth';
import { vintageUrl } from '@/lib/urls';

const PILLAR_ICONS: Record<
  string,
  React.ComponentType<{ size?: number; weight?: 'bold'; 'aria-hidden'?: boolean }>
> = {
  play: GameController,
  travel: AirplaneTilt,
  discover: Compass,
  learn: BookOpen,
  meet: UsersThree,
  cooperate: Handshake,
};

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
        {PILLARS.map((p) => {
          const Icon = PILLAR_ICONS[p.id];
          return (
            <Link
              key={p.id}
              href={p.href}
              style={{ display: 'inline-flex', alignItems: 'center', gap: '0.35rem' }}
            >
              {Icon ? <Icon size={15} weight="bold" aria-hidden /> : null}
              {p.labelEs}
            </Link>
          );
        })}
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
