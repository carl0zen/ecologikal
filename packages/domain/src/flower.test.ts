import { describe, it } from 'node:test';
import assert from 'node:assert/strict';
import { flowerGrade, flowerSnapshot, petalGrade } from './flower';
import type { Skill, SkillReference } from './skills';

describe('flower grades', () => {
  it('averages declared levels when no refs', () => {
    const skills: Skill[] = [
      {
        id: 's1',
        userId: 'u1',
        petalId: 4,
        name: 'Permaculture',
        level: 4,
        createdAt: '2026-01-01',
      },
      {
        id: 's2',
        userId: 'u1',
        petalId: 4,
        name: 'Soil',
        level: 2,
        createdAt: '2026-01-01',
      },
    ];
    assert.equal(petalGrade(skills, [], 4), 3);
  });

  it('prefers peer reference average per skill', () => {
    const skills: Skill[] = [
      {
        id: 's1',
        userId: 'u1',
        petalId: 1,
        name: 'Cob',
        level: 2,
        createdAt: '2026-01-01',
      },
    ];
    const refs: SkillReference[] = [
      {
        id: 'r1',
        skillId: 's1',
        fromUserId: 'h1',
        toUserId: 'u1',
        grade: 5,
        createdAt: '2026-01-02',
      },
      {
        id: 'r2',
        skillId: 's1',
        fromUserId: 'h2',
        toUserId: 'u1',
        grade: 3,
        createdAt: '2026-01-03',
      },
    ];
    assert.equal(petalGrade(skills, refs, 1), 4);
    assert.ok(flowerGrade(skills, refs) > 0);
  });

  it('flowerSnapshot lists all 7 petals with empty petals at 0', () => {
    const skills: Skill[] = [
      {
        id: 's1',
        userId: 'u1',
        petalId: 4,
        name: 'Permaculture',
        level: 3,
        createdAt: '2026-01-01',
      },
    ];
    const snap = flowerSnapshot(skills, []);
    assert.equal(snap.petals.length, 7);
    assert.equal(snap.overall, 3);
    for (const p of snap.petals) {
      if (p.petalId === 4) {
        assert.equal(p.grade, 3);
      } else {
        assert.equal(p.grade, 0);
      }
    }
  });
});

