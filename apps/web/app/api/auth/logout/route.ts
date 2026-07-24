import { NextResponse } from 'next/server';
import { SSO_SESSION_COOKIE } from '@ecologikal/certexi-bridge';
import { sessionCookieOptions } from '@/lib/env';
import { revivalPath } from '@/lib/urls';

export async function POST(req: Request) {
  const res = NextResponse.redirect(new URL(revivalPath('/'), req.url));
  res.cookies.set(SSO_SESSION_COOKIE, '', {
    ...sessionCookieOptions(0),
    maxAge: 0,
  });
  return res;
}
