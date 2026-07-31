import { redirect } from 'next/navigation';
import {
  buildSsoRedirectUrl,
  createDevSession,
  SSO_SESSION_COOKIE,
  SSO_SESSION_MAX_AGE,
} from '@ecologikal/certexi-bridge';
import { cookies } from 'next/headers';
import { flag, getSsoSecret, sessionCookieOptions } from '@/lib/env';
import { getSession } from '@/lib/auth';
import { withStore, uid, readStore } from '@/lib/store';
import { postAuthPath } from '@/lib/onboarding';
import { LoginClient } from '@/components/onboarding/LoginClient';

async function startSso() {
  'use server';
  const platform = process.env.CERTEXI_PLATFORM_URL || 'http://localhost:3000';
  const appUrl = (
    process.env.NEXT_PUBLIC_APP_URL || 'http://localhost:3100'
  ).replace(/\/$/, '');
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
  jar.set(
    SSO_SESSION_COOKIE,
    token,
    sessionCookieOptions(SSO_SESSION_MAX_AGE),
  );

  await withStore((db) => {
    if (!db.profiles.find((p) => p.userId === username)) {
      db.profiles.push({
        userId: username,
        displayName: username,
        accountClass,
        createdAt: new Date().toISOString(),
        bio: '',
      });
    } else {
      const existing = db.profiles.find((p) => p.userId === username)!;
      existing.accountClass = accountClass;
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

  const db = await readStore();
  const profile = db.profiles.find((p) => p.userId === username);
  const skillCount = db.skills.filter((s) => s.userId === username).length;
  redirect(postAuthPath(profile, skillCount));
}

export default async function LoginPage() {
  const session = await getSession();
  if (session) {
    const db = await readStore();
    const profile = db.profiles.find((p) => p.userId === session.username);
    const skillCount = db.skills.filter(
      (s) => s.userId === session.username,
    ).length;
    redirect(postAuthPath(profile, skillCount));
  }

  return (
    <LoginClient
      allowDevLogin={flag('ECO_ALLOW_DEV_LOGIN')}
      startSso={startSso}
      devLogin={devLogin}
    />
  );
}
