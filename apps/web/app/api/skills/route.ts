import { NextResponse } from 'next/server';
import { isPetalId, clampSkillLevel, type PetalId } from '@ecologikal/domain';
import { getSession } from '@/lib/auth';
import { uid, withStore } from '@/lib/store';
import { earnDelta } from '@ecologikal/domain';

export async function GET() {
  const session = await getSession();
  if (!session) {
    return NextResponse.json({ error: 'unauthorized' }, { status: 401 });
  }
  const { readStore } = await import('@/lib/store');
  const db = await readStore();
  const skills = db.skills.filter((s) => s.userId === session.username);
  const refs = db.skillReferences.filter((r) => r.toUserId === session.username);
  return NextResponse.json({ skills, refs });
}

export async function POST(req: Request) {
  const session = await getSession();
  if (!session) {
    return NextResponse.json({ error: 'unauthorized' }, { status: 401 });
  }
  const body = (await req.json()) as {
    name?: string;
    petalId?: number;
    level?: number;
  };
  if (!body.name || !isPetalId(body.petalId ?? 0)) {
    return NextResponse.json({ error: 'invalid_body' }, { status: 400 });
  }

  const skill = await withStore((db) => {
    const row = {
      id: uid('skill'),
      userId: session.username,
      petalId: body.petalId as PetalId,
      name: body.name!,
      level: clampSkillLevel(body.level ?? 1),
      createdAt: new Date().toISOString(),
    };
    db.skills.push(row);
    db.kins.push({
      id: uid('kins'),
      userId: session.username,
      type: 'skill',
      delta: earnDelta('skill'),
      relatedId: row.id,
      createdAt: row.createdAt,
    });
    return row;
  });

  return NextResponse.json({ skill });
}
