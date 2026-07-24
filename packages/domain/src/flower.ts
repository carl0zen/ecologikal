import type { PetalId } from './petals';
import { PETALS } from './petals';
import type { Skill, SkillReference } from './skills';

/**
 * Port of members_get_petal_grade / members_get_flower_grade:
 * average peer-referenced grades, falling back to declared skill levels.
 */
export function petalGrade(
  skills: Skill[],
  refs: SkillReference[],
  petalId: PetalId,
): number {
  const petalSkills = skills.filter((s) => s.petalId === petalId);
  if (petalSkills.length === 0) return 0;

  const grades = petalSkills.map((skill) => {
    const skillRefs = refs.filter((r) => r.skillId === skill.id);
    if (skillRefs.length === 0) return skill.level;
    const sum = skillRefs.reduce((acc, r) => acc + r.grade, 0);
    return sum / skillRefs.length;
  });

  return grades.reduce((a, b) => a + b, 0) / grades.length;
}

export function flowerGrade(
  skills: Skill[],
  refs: SkillReference[],
): number {
  const petalGrades = PETALS.map((p) => petalGrade(skills, refs, p.id)).filter(
    (g) => g > 0,
  );
  if (petalGrades.length === 0) return 0;
  return petalGrades.reduce((a, b) => a + b, 0) / petalGrades.length;
}

export interface FlowerSnapshot {
  overall: number;
  petals: Array<{ petalId: PetalId; grade: number }>;
}

export function flowerSnapshot(
  skills: Skill[],
  refs: SkillReference[],
): FlowerSnapshot {
  return {
    overall: flowerGrade(skills, refs),
    petals: PETALS.map((p) => ({
      petalId: p.id,
      grade: petalGrade(skills, refs, p.id),
    })),
  };
}
