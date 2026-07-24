export function env(name: string, fallback?: string): string {
  const v = process.env[name] ?? fallback;
  if (v === undefined) {
    throw new Error(`Missing env ${name}`);
  }
  return v;
}

export function flag(name: string): boolean {
  return process.env[name] === 'true' || process.env[name] === '1';
}

/**
 * Cookie options for eco-session. Default secure=false so HTTP gateway
 * demos work under NODE_ENV=production; set ECO_COOKIE_SECURE=true for TLS.
 */
export function sessionCookieOptions(maxAge: number): {
  httpOnly: true;
  secure: boolean;
  sameSite: 'lax';
  path: string;
  maxAge: number;
} {
  const basePath = process.env.NEXT_BASE_PATH || '';
  return {
    httpOnly: true,
    secure: flag('ECO_COOKIE_SECURE'),
    sameSite: 'lax',
    path: basePath || '/',
    maxAge,
  };
}

export function getSsoSecret(): Uint8Array {
  const raw = process.env.JWT_SECRET || process.env.SSO_SECRET;
  if (!raw) {
    if (process.env.NODE_ENV === 'production' && !flag('ECO_ALLOW_DEV_LOGIN')) {
      throw new Error('Missing JWT_SECRET or SSO_SECRET');
    }
    return new TextEncoder().encode('development-only-secret-change-me');
  }
  return new TextEncoder().encode(raw);
}

export function getNextcloudConfig() {
  return {
    baseUrl: env('ECO_NEXTCLOUD_URL', 'http://localhost:8081'),
    adminUser: env('ECO_NEXTCLOUD_ADMIN_USER', 'ecoadmin'),
    adminPassword: env(
      'ECO_NEXTCLOUD_ADMIN_PASSWORD',
      'ecoadmin-change-me',
    ),
  };
}
