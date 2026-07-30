'use client';

import { PETALS, type PetalId } from '@ecologikal/domain';

type Props = {
  selected: PetalId[];
  min?: number;
  max?: number;
  onChange: (next: PetalId[]) => void;
};

/**
 * Asymmetric 7-petal interest picker — select 2–3 petals.
 */
export function PetalPicker({
  selected,
  min = 2,
  max = 3,
  onChange,
}: Props) {
  const atMax = selected.length >= max;

  function toggle(id: PetalId) {
    if (selected.includes(id)) {
      onChange(selected.filter((p) => p !== id));
      return;
    }
    if (atMax) return;
    onChange([...selected, id]);
  }

  return (
    <div>
      <div className="petal-picker" role="group" aria-label="Pétalos de interés">
        {PETALS.map((petal) => {
          const isOn = selected.includes(petal.id);
          const disabled = !isOn && atMax;
          return (
            <button
              key={petal.id}
              type="button"
              className={`petal-opt${isOn ? ' selected' : ''}`}
              style={{ ['--petal-color' as string]: petal.color }}
              aria-pressed={isOn}
              disabled={disabled}
              onClick={() => toggle(petal.id)}
            >
              <span className="petal-swatch" aria-hidden />
              <span className="petal-name">{petal.nameEs}</span>
            </button>
          );
        })}
      </div>
      <p className="muted" style={{ fontSize: '0.85rem', margin: 0 }}>
        Elige {min}–{max} pétalos · {selected.length} seleccionados
      </p>
    </div>
  );
}
