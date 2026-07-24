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

export function getSsoSecret(): Uint8Array {
  const raw =
    process.env.JWT_SECRET ||
    process.env.SSO_SECRET ||
    'development-only-secret-change-me';
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
