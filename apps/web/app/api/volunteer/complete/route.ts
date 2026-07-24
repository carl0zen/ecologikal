import { NextResponse } from 'next/server';
import { earnDelta } from '@ecologikal/domain';
import { attestAction } from '@ecologikal/certexi-bridge';
import { getSession } from '@/lib/auth';
import { flag } from '@/lib/env';
import { uid, withStore } from '@/lib/store';

export async function POST(req: Request) {
  const session = await getSession();
  if (!session || session.accountClass === 'guest') {
    return NextResponse.json({ error: 'host_required' }, { status: 403 });
  }

  const body = (await req.json()) as {
    vacancyId?: string;
    guestUserId?: string;
  };

  if (!body.vacancyId || !body.guestUserId) {
    return NextResponse.json({ error: 'invalid_body' }, { status: 400 });
  }

  const receipt = await attestAction(
    {
      platformUrl: process.env.CERTEXI_PLATFORM_URL || '',
      allowStub: flag('ECO_ALLOW_PROOF_STUB'),
    },
    {
      kind: 'volunteer_completion',
      subjectUserId: body.guestUserId,
      payload: {
        vacancyId: body.vacancyId,
        hostUserId: session.username,
      },
    },
  );

  const completion = await withStore((db) => {
    const vacancy = db.vacancies.find((v) => v.id === body.vacancyId);
    if (!vacancy) throw new Error('vacancy_not_found');
    const row = {
      id: uid('vol'),
      vacancyId: body.vacancyId!,
      guestUserId: body.guestUserId!,
      hostUserId: session.username,
      proofId: receipt.id,
      verified: true,
      createdAt: new Date().toISOString(),
    };
    db.volunteerCompletions.push(row);
    db.proofs.push({
      id: receipt.id,
      kind: receipt.kind,
      subjectUserId: receipt.subjectUserId,
      relatedId: row.id,
      stub: receipt.stub,
      payload: receipt.payload,
      createdAt: receipt.createdAt,
    });
    db.kins.push({
      id: uid('kins'),
      userId: body.guestUserId!,
      type: 'volunteer',
      delta: vacancy.recompenseKins ?? earnDelta('volunteer'),
      relatedId: row.id,
      createdAt: row.createdAt,
    });
    return row;
  });

  return NextResponse.json({
    completion,
    proof: { id: receipt.id, stub: receipt.stub, verified: true },
  });
}
