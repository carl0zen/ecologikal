import { NextResponse } from 'next/server';
import { getSession } from '@/lib/auth';
import { withStore } from '@/lib/store';

export async function GET() {
  const session = await getSession();
  if (!session) {
    return NextResponse.json({ error: 'unauthorized' }, { status: 401 });
  }
  const { readStore } = await import('@/lib/store');
  const db = await readStore();
  const profile = db.profiles.find((p) => p.userId === session.username);
  if (!profile) {
    return NextResponse.json({ error: 'not_found' }, { status: 404 });
  }
  return NextResponse.json({ profile });
}

export async function POST(req: Request) {
  const session = await getSession();
  if (!session) {
    return NextResponse.json({ error: 'unauthorized' }, { status: 401 });
  }

  const body = (await req.json()) as {
    displayName?: string;
    bio?: string;
  };

  const displayName = body.displayName?.trim();
  const bio = body.bio?.trim();

  if (displayName !== undefined && displayName.length < 1) {
    return NextResponse.json({ error: 'invalid_display_name' }, { status: 400 });
  }

  const profile = await withStore((db) => {
    let row = db.profiles.find((p) => p.userId === session.username);
    if (!row) {
      row = {
        userId: session.username,
        displayName: displayName || session.username,
        accountClass: session.accountClass ?? 'guest',
        bio: bio ?? '',
        createdAt: new Date().toISOString(),
      };
      db.profiles.push(row);
      return row;
    }
    if (displayName !== undefined) row.displayName = displayName;
    if (bio !== undefined) row.bio = bio;
    return row;
  });

  return NextResponse.json({ profile });
}
