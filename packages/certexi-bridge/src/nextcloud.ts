/**
 * Eco Nextcloud provisioning via OCS.
 * Uses raw fetch so we do not require a published @certexi/nextcloud-client.
 */

import { NC_GROUPS, type AccountClass } from '@ecologikal/domain';

export interface NextcloudConfig {
  baseUrl: string;
  adminUser: string;
  adminPassword: string;
}

export class NextcloudError extends Error {
  constructor(
    message: string,
    readonly status?: number,
  ) {
    super(message);
    this.name = 'NextcloudError';
  }
}

function authHeader(cfg: NextcloudConfig): string {
  const raw = `${cfg.adminUser}:${cfg.adminPassword}`;
  const token = btoa(raw);
  return `Basic ${token}`;
}

async function ocs<T>(
  cfg: NextcloudConfig,
  path: string,
  init: RequestInit = {},
): Promise<T> {
  const url = new URL(path, cfg.baseUrl.replace(/\/?$/, '/'));
  const res = await fetch(url, {
    ...init,
    headers: {
      'OCS-APIRequest': 'true',
      Accept: 'application/json',
      Authorization: authHeader(cfg),
      ...(init.headers ?? {}),
    },
  });
  const body = (await res.json().catch(() => null)) as {
    ocs?: { meta?: { statuscode?: number; message?: string }; data?: T };
  } | null;
  const code = body?.ocs?.meta?.statuscode ?? res.status;
  if (!res.ok || (code !== undefined && code >= 400)) {
    throw new NextcloudError(
      body?.ocs?.meta?.message || `OCS failed (${code})`,
      code,
    );
  }
  return (body?.ocs?.data ?? ({} as T)) as T;
}

export async function ensureGroup(
  cfg: NextcloudConfig,
  groupId: string,
): Promise<void> {
  try {
    await ocs(cfg, `ocs/v2.php/cloud/groups`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams({ groupid: groupId }),
    });
  } catch (err) {
    // 102 = already exists in many NC versions
    if (err instanceof NextcloudError && (err.status === 102 || err.status === 400)) {
      return;
    }
    throw err;
  }
}

export async function ensureAccountClasses(
  cfg: NextcloudConfig,
): Promise<void> {
  await ensureGroup(cfg, NC_GROUPS.admin);
  await ensureGroup(cfg, NC_GROUPS.host);
  await ensureGroup(cfg, NC_GROUPS.guest);
}

export interface CreateAccountInput {
  userid: string;
  password: string;
  displayName?: string;
  email?: string;
  accountClass: AccountClass;
}

export async function createAccount(
  cfg: NextcloudConfig,
  input: CreateAccountInput,
): Promise<{ userid: string; group: string }> {
  await ensureAccountClasses(cfg);
  const group = NC_GROUPS[input.accountClass];

  await ocs(cfg, 'ocs/v2.php/cloud/users', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({
      userid: input.userid,
      password: input.password,
      displayName: input.displayName ?? input.userid,
      email: input.email ?? '',
      groups: group,
    }),
  });

  try {
    await ocs(cfg, `ocs/v2.php/cloud/users/${input.userid}/groups`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams({ groupid: group }),
    });
  } catch {
    // user may already be in group from create payload
  }

  return { userid: input.userid, group };
}

export async function getStatus(
  cfg: NextcloudConfig,
): Promise<{ installed?: boolean; versionstring?: string }> {
  const url = new URL('status.php', cfg.baseUrl.replace(/\/?$/, '/'));
  const res = await fetch(url);
  if (!res.ok) {
    throw new NextcloudError(`status.php failed (${res.status})`, res.status);
  }
  return res.json() as Promise<{ installed?: boolean; versionstring?: string }>;
}
