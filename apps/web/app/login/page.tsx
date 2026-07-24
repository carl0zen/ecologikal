import { redirect } from 'next/navigation';
import {
  buildSsoRedirectUrl,
  createDevSession,
  SSO_SESSION_COOKIE,
  SSO_SESSION_MAX_AGE,
} from '@ecologikal/certexi-bridge';
import { cookies } from 'next/headers';
import { flag, getSsoSecret } from '@/lib/env';
import { getSession } from '@/lib/auth';
import { withStore, uid } from '@/lib/store';

async function startSso() {
  'use server';
  const platform = process.env.CERTEXI_PLATFORM_URL || 'http://localhost:3000';
  const appUrl = process.env.NEXT_PUBLIC_APP_URL || 'http://localhost:3100';
  const callback = `${appUrl}/api/auth/platform-sso`;
  redirect(buildSsoRedirectUrl(platform, callback));
}

async function devLogin(formData: FormData) {
  'use server';
  if (!flag('ECO_ALLOW_DEV_LOGIN')) {
    throw new Error('Dev login disabled');
  }
  const username = String(formData.get('username') || 'guest1').trim();
  const accountClass = String(formData.get('accountClass') || 'guest') as
    | 'admin'
    | 'host'
    | 'guest';
  const token = await createDevSession(username, accountClass, getSsoSecret());
  const jar = await cookies();
  jar.set(SSO_SESSION_COOKIE, token, {
    httpOnly: true,
    sameSite: 'lax',
    path: '/',
    maxAge: SSO_SESSION_MAX_AGE,
  });

  await withStore((db) => {
    if (!db.profiles.find((p) => p.userId === username)) {
      db.profiles.push({
        userId: username,
        displayName: username,
        accountClass,
        createdAt: new Date().toISOString(),
        bio: '',
      });
    }
    if (db.posts.length === 0) {
      db.posts.push({
        id: uid('post'),
        type: 'idea',
        title: 'Compost comunitario',
        body: 'Idea para hubs de compostaje urbano compartido.',
        petalId: 4,
        authorId: username,
        createdAt: new Date().toISOString(),
      });
    }
  });

  redirect('/profile');
}

export default async function LoginPage() {
  const session = await getSession();
  if (session) redirect('/profile');

  return (
    <main className="grid">
      <section className="card">
        <h1>Entrar</h1>
        <p className="muted">
          Patrón bot de Certexi: redirige al IdP de platform, recibe JWT corto,
          crea sesión local <code>eco-session</code>.
        </p>
        <form action={startSso} style={{ marginTop: '1rem' }}>
          <button className="btn" type="submit">
            Continuar con Certexi SSO
          </button>
        </form>
      </section>

      {flag('ECO_ALLOW_DEV_LOGIN') ? (
        <section className="card">
          <h2>Demo local (sin platform)</h2>
          <p className="muted">
            Solo con <code>ECO_ALLOW_DEV_LOGIN=true</code>.
          </p>
          <form action={devLogin}>
            <label htmlFor="username">Usuario NC</label>
            <input id="username" name="username" defaultValue="guest1" />
            <label htmlFor="accountClass">Clase</label>
            <select id="accountClass" name="accountClass" defaultValue="guest">
              <option value="guest">guest</option>
              <option value="host">host</option>
              <option value="admin">admin</option>
            </select>
            <button className="btn secondary" type="submit">
              Entrar en demo
            </button>
          </form>
        </section>
      ) : null}
    </main>
  );
}
