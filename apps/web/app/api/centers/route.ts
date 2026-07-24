import { NextResponse } from 'next/server';
import { getSession } from '@/lib/auth';
import { readStore, uid, withStore } from '@/lib/store';

export async function GET() {
  const db = await readStore();
  return NextResponse.json({
    centers: db.centers,
    vacancies: db.vacancies,
    workshops: db.workshops,
  });
}

export async function POST(req: Request) {
  const session = await getSession();
  if (!session || session.accountClass === 'guest') {
    return NextResponse.json({ error: 'forbidden' }, { status: 403 });
  }

  const body = (await req.json()) as {
    name?: string;
    slug?: string;
    summary?: string;
    type?: 'urban' | 'rural' | 'ecovillage' | 'hostel' | 'hotel';
  };

  if (!body.name || !body.slug) {
    return NextResponse.json({ error: 'invalid_body' }, { status: 400 });
  }

  const center = await withStore((db) => {
    const row = {
      id: uid('center'),
      name: body.name!,
      slug: body.slug!,
      hostUserId: session.username,
      summary: body.summary,
      type: body.type ?? 'ecovillage',
      status: 'forming' as const,
      createdAt: new Date().toISOString(),
    };
    db.centers.push(row);
    return row;
  });

  return NextResponse.json({ center });
}
