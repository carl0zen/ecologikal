import { NextResponse } from 'next/server';
import { isPetalId, type PetalId } from '@ecologikal/domain';
import { getSession } from '@/lib/auth';
import { uid, withStore } from '@/lib/store';

export async function POST(req: Request) {
  const session = await getSession();
  if (!session || session.accountClass === 'guest') {
    return NextResponse.json({ error: 'forbidden' }, { status: 403 });
  }

  const body = (await req.json()) as {
    centerId?: string;
    title?: string;
    petalId?: number;
    recompenseKins?: number;
  };

  if (!body.centerId || !body.title || !isPetalId(body.petalId ?? 0)) {
    return NextResponse.json({ error: 'invalid_body' }, { status: 400 });
  }

  const vacancy = await withStore((db) => {
    const center = db.centers.find((c) => c.id === body.centerId);
    if (!center) throw new Error('center_not_found');
    const row = {
      id: uid('vac'),
      centerId: body.centerId!,
      title: body.title!,
      petalId: body.petalId as PetalId,
      recompenseKins: body.recompenseKins ?? 10,
      createdAt: new Date().toISOString(),
    };
    db.vacancies.push(row);
    return row;
  });

  return NextResponse.json({ vacancy });
}
