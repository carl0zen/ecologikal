import { NextResponse } from 'next/server';
import { clampSkillLevel, earnDelta } from '@ecologikal/domain';
import { attestAction } from '@ecologikal/certexi-bridge';
import { getSession } from '@/lib/auth';
import { flag } from '@/lib/env';
import { uid, withStore } from '@/lib/store';

export async function POST(req: Request) {
  const session = await getSession();
  if (!session) {
    return NextResponse.json({ error: 'unauthorized' }, { status: 401 });
  }

  const body = (await req.json()) as {
    skillId?: string;
    toUserId?: string;
    grade?: number;
    note?: string;
  };

  if (!body.skillId || !body.toUserId) {
    return NextResponse.json({ error: 'invalid_body' }, { status: 400 });
  }

  const receipt = await attestAction(
    {
      platformUrl: process.env.CERTEXI_PLATFORM_URL || '',
      allowStub: flag('ECO_ALLOW_PROOF_STUB'),
    },
    {
      kind: 'skill_reference',
      subjectUserId: body.toUserId,
      payload: {
        skillId: body.skillId,
        fromUserId: session.username,
        grade: body.grade ?? 3,
      },
    },
  );

  const ref = await withStore((db) => {
    const skill = db.skills.find((s) => s.id === body.skillId);
    if (!skill) {
      throw new Error('skill_not_found');
    }
    const row = {
      id: uid('ref'),
      skillId: body.skillId!,
      fromUserId: session.username,
      toUserId: body.toUserId!,
      grade: clampSkillLevel(body.grade ?? 3),
      note: body.note,
      proofId: receipt.id,
      createdAt: new Date().toISOString(),
    };
    db.skillReferences.push(row);
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
      userId: body.toUserId!,
      type: 'reference',
      delta: earnDelta('reference'),
      relatedId: row.id,
      createdAt: row.createdAt,
    });
    return row;
  });

  return NextResponse.json({
    reference: ref,
    proof: { id: receipt.id, stub: receipt.stub },
  });
}
