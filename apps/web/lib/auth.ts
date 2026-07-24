import { cookies } from 'next/headers';
import {
  SSO_SESSION_COOKIE,
  verifySsoSession,
  type SsoSessionClaims,
} from '@ecologikal/certexi-bridge';
import { getSsoSecret } from './env';

export async function getSession(): Promise<SsoSessionClaims | null> {
  const jar = await cookies();
  const token = jar.get(SSO_SESSION_COOKIE)?.value;
  if (!token) return null;
  return verifySsoSession(token, getSsoSecret());
}

export async function requireSession(): Promise<SsoSessionClaims> {
  const session = await getSession();
  if (!session) {
    throw new Error('UNAUTHORIZED');
  }
  return session;
}
