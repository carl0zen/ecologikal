import { NextRequest, NextResponse } from 'next/server';
import {
  SSO_SESSION_COOKIE,
  SSO_SESSION_MAX_AGE,
  createSsoSession,
  verifySsoToken,
} from '@ecologikal/certexi-bridge';
import { getSsoSecret } from '@/lib/env';
import { withStore } from '@/lib/store';

export async function GET(req: NextRequest) {
  const token = req.nextUrl.searchParams.get('token');
  const next = req.nextUrl.searchParams.get('next') || '/profile';

  if (!token) {
    return NextResponse.redirect(new URL('/login', req.url));
  }

  const secret = getSsoSecret();
  const claims = await verifySsoToken(token, secret);
  if (!claims) {
    return NextResponse.redirect(new URL('/login', req.url));
  }

  const session = await createSsoSession(
    {
      userId: claims.sub,
      username: claims.username,
      accountClass: 'guest',
    },
    secret,
  );

  await withStore((db) => {
    if (!db.profiles.find((p) => p.userId === claims.username)) {
      db.profiles.push({
        userId: claims.username,
        displayName: claims.username,
        accountClass: 'guest',
        createdAt: new Date().toISOString(),
      });
    }
  });

  const dest =
    next.startsWith('/') && !next.startsWith('//') ? next : '/profile';
  const res = NextResponse.redirect(new URL(dest, req.url));
  res.cookies.set(SSO_SESSION_COOKIE, session, {
    httpOnly: true,
    secure: process.env.NODE_ENV === 'production',
    sameSite: 'lax',
    maxAge: SSO_SESSION_MAX_AGE,
    path: '/',
  });
  return res;
}
