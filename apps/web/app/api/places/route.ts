import { NextResponse } from 'next/server';
import { isPetalId, type PetalId } from '@ecologikal/domain';
import { getSession } from '@/lib/auth';
import { readStore, uid, withStore } from '@/lib/store';

export async function GET() {
  const db = await readStore();
  return NextResponse.json({ places: db.places, needs: db.needs });
}

export async function POST(req: Request) {
  const session = await getSession();
  if (!session) {
    return NextResponse.json({ error: 'unauthorized' }, { status: 401 });
  }

  const body = (await req.json()) as {
    kind?: 'place' | 'need';
    name?: string;
    title?: string;
    summary?: string;
    placeId?: string;
    petalId?: number;
    kinsGoal?: number;
  };

  if (body.kind === 'need') {
    if (!body.title || !isPetalId(body.petalId ?? 0)) {
      return NextResponse.json({ error: 'invalid_body' }, { status: 400 });
    }
    const need = await withStore((db) => {
      const row = {
        id: uid('need'),
        title: body.title!,
        summary: body.summary,
        placeId: body.placeId,
        petalId: body.petalId as PetalId,
        founderUserId: session.username,
        kinsGoal: body.kinsGoal,
        createdAt: new Date().toISOString(),
      };
      db.needs.push(row);
      return row;
    });
    return NextResponse.json({ need });
  }

  if (!body.name) {
    return NextResponse.json({ error: 'invalid_body' }, { status: 400 });
  }

  const place = await withStore((db) => {
    const row = {
      id: uid('place'),
      name: body.name!,
      summary: body.summary,
      founderUserId: session.username,
      createdAt: new Date().toISOString(),
    };
    db.places.push(row);
    return row;
  });
  return NextResponse.json({ place });
}
