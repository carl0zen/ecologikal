import { NextResponse } from 'next/server';
import { isPetalId, type PetalId, earnDelta } from '@ecologikal/domain';
import { getSession } from '@/lib/auth';
import { uid, withStore } from '@/lib/store';

export async function POST(req: Request) {
  const session = await getSession();
  if (!session) {
    return NextResponse.json({ error: 'unauthorized' }, { status: 401 });
  }

  const body = (await req.json()) as {
    action?: 'create' | 'spend';
    centerId?: string;
    title?: string;
    petalId?: number;
    costKins?: number;
    workshopId?: string;
  };

  if (body.action === 'spend') {
    if (!body.workshopId) {
      return NextResponse.json({ error: 'invalid_body' }, { status: 400 });
    }
    const entry = await withStore((db) => {
      const ws = db.workshops.find((w) => w.id === body.workshopId);
      if (!ws) throw new Error('workshop_not_found');
      const delta = -(ws.costKins ?? Math.abs(earnDelta('workshop_spend')));
      const row = {
        id: uid('kins'),
        userId: session.username,
        type: 'workshop_spend' as const,
        delta,
        relatedId: ws.id,
        note: ws.title,
        createdAt: new Date().toISOString(),
      };
      db.kins.push(row);
      return row;
    });
    return NextResponse.json({ entry });
  }

  if (session.accountClass === 'guest') {
    return NextResponse.json({ error: 'forbidden' }, { status: 403 });
  }
  if (!body.centerId || !body.title || !isPetalId(body.petalId ?? 0)) {
    return NextResponse.json({ error: 'invalid_body' }, { status: 400 });
  }

  const workshop = await withStore((db) => {
    if (!db.centers.find((c) => c.id === body.centerId)) {
      throw new Error('center_not_found');
    }
    const row = {
      id: uid('ws'),
      centerId: body.centerId!,
      title: body.title!,
      petalId: body.petalId as PetalId,
      costKins: body.costKins ?? 15,
      createdAt: new Date().toISOString(),
    };
    db.workshops.push(row);
    return row;
  });

  return NextResponse.json({ workshop });
}
