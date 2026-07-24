import { NextResponse } from 'next/server';
import { getStatus } from '@ecologikal/certexi-bridge';
import { flag, getNextcloudConfig } from '@/lib/env';
import { readStore } from '@/lib/store';

/**
 * Dual-stack / revival readiness. Safe for probes; no secrets.
 */
export async function GET() {
  const store = await readStore();
  let nextcloud: {
    configured: boolean;
    ok: boolean;
    version?: string;
    error?: string;
  } = { configured: Boolean(process.env.ECO_NEXTCLOUD_URL), ok: false };

  if (nextcloud.configured) {
    try {
      const status = await getStatus(getNextcloudConfig());
      nextcloud = {
        configured: true,
        ok: Boolean(status.installed ?? true),
        version: status.versionstring,
      };
    } catch (err) {
      nextcloud = {
        configured: true,
        ok: false,
        error: err instanceof Error ? err.message : 'unreachable',
      };
    }
  }

  const body = {
    ok: true,
    surface: 'revival',
    basePath: process.env.NEXT_BASE_PATH || '',
    vintageUrl: process.env.NEXT_PUBLIC_VINTAGE_URL || null,
    flags: {
      allowDevLogin: flag('ECO_ALLOW_DEV_LOGIN'),
      allowProofStub: flag('ECO_ALLOW_PROOF_STUB'),
    },
    store: {
      backend: 'json-file',
      path: '.data/eco-store.json',
      counts: {
        profiles: store.profiles.length,
        centers: store.centers.length,
        vacancies: store.vacancies.length,
        workshops: store.workshops.length,
        places: store.places.length,
        needs: store.needs.length,
        skills: store.skills.length,
        skillReferences: store.skillReferences.length,
        kins: store.kins.length,
        proofs: store.proofs.length,
      },
    },
    nextcloud,
    certexiPlatformUrl: process.env.CERTEXI_PLATFORM_URL || null,
  };

  return NextResponse.json(body, {
    headers: { 'Cache-Control': 'no-store' },
  });
}
