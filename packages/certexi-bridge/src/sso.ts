/**
 * Bot-pattern SSO consumer helpers (mirrors @certexi/auth).
 * Prefer swapping to the published package when Certexi U1 lands.
 */

import { SignJWT, jwtVerify } from 'jose';

export const SSO_SESSION_COOKIE = 'eco-session';
export const SSO_SESSION_MAX_AGE = 60 * 60 * 24;
export const PLATFORM_SSO_ENDPOINT = '/api/auth/sso-token';

export interface SsoSessionClaims {
  sub: string;
  username: string;
  source: 'platform_sso';
  accountClass?: 'admin' | 'host' | 'guest';
}

export function resolveSecret(
  value: string | undefined,
  label: string,
): Uint8Array {
  const secret = value?.trim();
  if (!secret) {
    throw new Error(
      `Missing SSO secret for ${label}. Set JWT_SECRET or SSO_SECRET.`,
    );
  }
  return new TextEncoder().encode(secret);
}

export function buildSsoRedirectUrl(
  platformUrl: string,
  callbackUrl: string,
): string {
  const url = new URL(PLATFORM_SSO_ENDPOINT, platformUrl);
  url.searchParams.set('bot_redirect', callbackUrl);
  return url.toString();
}

export async function verifySsoToken(
  token: string,
  secret: Uint8Array,
): Promise<{ sub: string; username: string; license_valid?: boolean } | null> {
  try {
    const { payload } = await jwtVerify(token, secret, {
      algorithms: ['HS256'],
    });
    if (payload.purpose !== 'sso' || typeof payload.sub !== 'string') {
      return null;
    }
    const username =
      typeof payload.username === 'string' ? payload.username : payload.sub;
    return {
      sub: payload.sub,
      username,
      license_valid: Boolean(payload.license_valid),
    };
  } catch {
    return null;
  }
}

export async function createSsoSession(
  claims: {
    userId: string;
    username: string;
    accountClass?: SsoSessionClaims['accountClass'];
  },
  secret: Uint8Array,
): Promise<string> {
  return new SignJWT({
    username: claims.username,
    source: 'platform_sso',
    accountClass: claims.accountClass ?? 'guest',
  })
    .setProtectedHeader({ alg: 'HS256' })
    .setSubject(claims.userId)
    .setIssuedAt()
    .setExpirationTime('24h')
    .sign(secret);
}

export async function verifySsoSession(
  token: string,
  secret: Uint8Array,
): Promise<SsoSessionClaims | null> {
  try {
    const { payload } = await jwtVerify(token, secret, {
      algorithms: ['HS256'],
    });
    if (payload.source !== 'platform_sso' || typeof payload.sub !== 'string') {
      return null;
    }
    const username =
      typeof payload.username === 'string' ? payload.username : payload.sub;
    const accountClass =
      payload.accountClass === 'admin' ||
      payload.accountClass === 'host' ||
      payload.accountClass === 'guest'
        ? payload.accountClass
        : 'guest';
    return {
      sub: payload.sub,
      username,
      source: 'platform_sso',
      accountClass,
    };
  } catch {
    return null;
  }
}

/**
 * Dev-only local session when Certexi platform is unreachable.
 * Never enable in production.
 */
export async function createDevSession(
  username: string,
  accountClass: SsoSessionClaims['accountClass'],
  secret: Uint8Array,
): Promise<string> {
  return createSsoSession(
    { userId: username, username, accountClass },
    secret,
  );
}
