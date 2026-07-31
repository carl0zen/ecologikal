'use client';

import { getPetal, type PetalId } from '@ecologikal/domain';

export type SkillDraft = {
  petalId: PetalId;
  name: string;
  level: number;
};

type Props = {
  petals: PetalId[];
  drafts: SkillDraft[];
  onChange: (next: SkillDraft[]) => void;
  error?: string;
};

/**
 * One optional skill name + level slider per selected petal.
 */
export function SkillStep({ petals, drafts, onChange, error }: Props) {
  function update(petalId: PetalId, patch: Partial<SkillDraft>) {
    onChange(
      drafts.map((d) => (d.petalId === petalId ? { ...d, ...patch } : d)),
    );
  }

  return (
    <div>
      {petals.map((petalId) => {
        const petal = getPetal(petalId);
        const draft = drafts.find((d) => d.petalId === petalId);
        if (!draft) return null;
        return (
          <div
            key={petalId}
            className="skill-block"
            style={{ ['--petal-color' as string]: petal.color }}
          >
            <h3>{petal.nameEs}</h3>
            <label htmlFor={`skill-name-${petalId}`}>Habilidad</label>
            <input
              id={`skill-name-${petalId}`}
              placeholder={`Ej. ${petal.nameEs.split(' ')[0]}…`}
              value={draft.name}
              onChange={(e) => update(petalId, { name: e.target.value })}
              maxLength={80}
            />
            <label htmlFor={`skill-level-${petalId}`}>Nivel (1–5)</label>
            <div className="level-row">
              <input
                id={`skill-level-${petalId}`}
                type="range"
                min={1}
                max={5}
                step={1}
                value={draft.level}
                onChange={(e) =>
                  update(petalId, { level: Number(e.target.value) })
                }
              />
              <span className="level-val">{draft.level}</span>
            </div>
          </div>
        );
      })}
      {error ? <p className="field-error">{error}</p> : null}
      <p className="muted" style={{ fontSize: '0.85rem' }}>
        Nombra al menos una habilidad. Cada una suma +3 KINS.
      </p>
    </div>
  );
}
