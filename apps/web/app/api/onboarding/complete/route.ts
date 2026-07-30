import { NextResponse } from 'next/server';
import {
  clampSkillLevel,
  earnDelta,
  flowerSnapshot,
  isPetalId,
  type PetalId,
  type Skill,
  type SkillLevel,
} from '@ecologikal/domain';
import { getSession } from '@/lib/auth';
import { uid, withStore } from '@/lib/store';

type SkillDraft = {
  name?: string;
  petalId?: number;
  level?: number;
};

/**
 * Atomic guest onboarding finish: profile + skills + KINS + onboardedAt.
 */
export async function POST(req: Request) {
  const session = await getSession();
  if (!session) {
    return NextResponse.json({ error: 'unauthorized' }, { status: 401 });
  }

  const body = (await req.json()) as {
    displayName?: string;
    bio?: string;
    skills?: SkillDraft[];
  };

  const displayName = (body.displayName ?? '').trim();
  if (displayName.length < 1) {
    return NextResponse.json({ error: 'invalid_display_name' }, { status: 400 });
  }

  const drafts = Array.isArray(body.skills) ? body.skills : [];
  const cleaned: { name: string; petalId: PetalId; level: SkillLevel }[] = [];
  for (const d of drafts) {
    const name = (d.name ?? '').trim();
    if (!name || !isPetalId(d.petalId ?? 0)) continue;
    cleaned.push({
      name,
      petalId: d.petalId as PetalId,
      level: clampSkillLevel(d.level ?? 3),
    });
  }

  if (cleaned.length < 1) {
    return NextResponse.json({ error: 'skills_required' }, { status: 400 });
  }

  const now = new Date().toISOString();
  const skillDelta = earnDelta('skill');

  const result = await withStore((db) => {
    let profile = db.profiles.find((p) => p.userId === session.username);
    if (!profile) {
      profile = {
        userId: session.username,
        displayName,
        accountClass: session.accountClass ?? 'guest',
        bio: (body.bio ?? '').trim(),
        createdAt: now,
        onboardedAt: now,
      };
      db.profiles.push(profile);
    } else {
      profile.displayName = displayName;
      profile.bio = (body.bio ?? '').trim();
      profile.onboardedAt = now;
    }

    const created: Skill[] = [];
    for (const draft of cleaned) {
      const row: Skill = {
        id: uid('skill'),
        userId: session.username,
        petalId: draft.petalId,
        name: draft.name,
        level: draft.level,
        createdAt: now,
      };
      db.skills.push(row);
      db.kins.push({
        id: uid('kins'),
        userId: session.username,
        type: 'skill',
        delta: skillDelta,
        relatedId: row.id,
        createdAt: now,
      });
      created.push(row);
    }

    const refs = db.skillReferences.filter(
      (r) => r.toUserId === session.username,
    );
    const snapshot = flowerSnapshot(created, refs);
    const kinsEarned = created.length * skillDelta;

    return { profile, skills: created, snapshot, kinsEarned };
  });

  return NextResponse.json(result);
}
