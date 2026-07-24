import { NextResponse } from 'next/server';
import { createAccount, type CreateAccountInput } from '@ecologikal/certexi-bridge';
import { getSession } from '@/lib/auth';
import { getNextcloudConfig, flag } from '@/lib/env';
import { withStore } from '@/lib/store';

export async function POST(req: Request) {
  const session = await getSession();
  if (!session || session.accountClass === 'guest') {
    return NextResponse.json({ error: 'forbidden' }, { status: 403 });
  }

  const body = (await req.json()) as CreateAccountInput;
  if (!body.userid || !body.password || !body.accountClass) {
    return NextResponse.json({ error: 'invalid_body' }, { status: 400 });
  }

  let nc: { userid: string; group: string } | null = null;
  let ncError: string | undefined;

  try {
    nc = await createAccount(getNextcloudConfig(), body);
  } catch (err) {
    ncError = err instanceof Error ? err.message : 'nc_failed';
    if (!flag('ECO_ALLOW_DEV_LOGIN')) {
      return NextResponse.json({ error: ncError }, { status: 502 });
    }
  }

  await withStore((db) => {
    const existing = db.profiles.find((p) => p.userId === body.userid);
    if (existing) {
      existing.accountClass = body.accountClass;
      existing.displayName = body.displayName ?? body.userid;
    } else {
      db.profiles.push({
        userId: body.userid,
        displayName: body.displayName ?? body.userid,
        accountClass: body.accountClass,
        createdAt: new Date().toISOString(),
      });
    }
  });

  return NextResponse.json({
    ok: true,
    nextcloud: nc,
    warning: ncError,
  });
}
