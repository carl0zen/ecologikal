import type { PetalId } from './petals';

/** Skill level 1–5 (Beginner → Expert), matching vintage sliders. */
export type SkillLevel = 1 | 2 | 3 | 4 | 5;

export interface Skill {
  id: string;
  userId: string;
  petalId: PetalId;
  name: string;
  level: SkillLevel;
  createdAt: string;
}

export interface SkillReference {
  id: string;
  skillId: string;
  fromUserId: string;
  toUserId: string;
  grade: SkillLevel;
  note?: string;
  /** Certexi proof receipt id when attested via OS plane */
  proofId?: string;
  createdAt: string;
}

export function clampSkillLevel(n: number): SkillLevel {
  const v = Math.round(n);
  if (v <= 1) return 1;
  if (v >= 5) return 5;
  return v as SkillLevel;
}
