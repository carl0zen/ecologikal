import { NextResponse } from 'next/server';
import { SSO_SESSION_COOKIE } from '@ecologikal/certexi-bridge';

export async function POST(req: Request) {
  const res = NextResponse.redirect(new URL('/', req.url));
  res.cookies.set(SSO_SESSION_COOKIE, '', {
    httpOnly: true,
    path: '/',
    maxAge: 0,
  });
  return res;
}
