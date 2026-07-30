import { NextRequest, NextResponse } from 'next/server';
import {
  SSO_SESSION_COOKIE,
  SSO_SESSION_MAX_AGE,
  createSsoSession,
  verifySsoToken,
} from '@ecologikal/certexi-bridge';
import { getSsoSecret, sessionCookieOptions } from '@/lib/env';
import { withStore } from '@/lib/store';
import { postAuthPath } from '@/lib/onboarding';
import { revivalPath } from '@/lib/urls';

export async function GET(req: NextRequest) {
  const token = req.nextUrl.searchParams.get('token');
  const nextParam = req.nextUrl.searchParams.get('next');

  if (!token) {
    return NextResponse.redirect(new URL(revivalPath('/login'), req.url));
  }

  const secret = getSsoSecret();
  const claims = await verifySsoToken(token, secret);
  if (!claims) {
    return NextResponse.redirect(new URL(revivalPath('/login'), req.url));
  }

  const session = await createSsoSession(
    {
      userId: claims.sub,
      username: claims.username,
      accountClass: 'guest',
    },
    secret,
  );

  const gate = await withStore((db) => {
    let profile = db.profiles.find((p) => p.userId === claims.username);
    if (!profile) {
      profile = {
        userId: claims.username,
        displayName: claims.username,
        accountClass: 'guest',
        createdAt: new Date().toISOString(),
      };
      db.profiles.push(profile);
    }
    const skillCount = db.skills.filter(
      (s) => s.userId === claims.username,
    ).length;
    return postAuthPath(profile, skillCount);
  });

  const explicitNext =
    nextParam &&
    nextParam.startsWith('/') &&
    !nextParam.startsWith('//') &&
    nextParam !== '/profile'
      ? nextParam
      : null;
  const dest = revivalPath(explicitNext ?? gate);
  const res = NextResponse.redirect(new URL(dest, req.url));
  res.cookies.set(
    SSO_SESSION_COOKIE,
    session,
    sessionCookieOptions(SSO_SESSION_MAX_AGE),
  );
  return res;
}
