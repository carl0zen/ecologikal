'use client';

import { useMemo, useState } from 'react';
import {
  PETALS,
  getPetal,
  type FlowerSnapshot,
  type PetalId,
  type Skill,
  type SkillReference,
} from '@ecologikal/domain';

export type FlowerProof = {
  id: string;
  stub?: boolean;
};

type Props = {
  snapshot: FlowerSnapshot;
  skills?: Skill[];
  refs?: SkillReference[];
  proofs?: FlowerProof[];
  compact?: boolean;
  /** When set, petal click calls this instead of opening the panel (meet cards). */
  onPetalSelect?: (petalId: PetalId) => void;
};

/**
 * Polar skill flower — concentric arcs inspired by vintage Raphael viz.
 * Grade 1–5 maps to arc sweep; click a ring to drill into petal skills.
 */
export function FlowerViz({
  snapshot,
  skills = [],
  refs = [],
  proofs = [],
  compact = false,
  onPetalSelect,
}: Props) {
  const [selected, setSelected] = useState<PetalId | null>(null);
  const size = compact ? 160 : 280;
  const cx = size / 2;
  const cy = size / 2;
  const stroke = compact ? 8 : 14;
  const gap = compact ? 3 : 4;
  const baseR = compact ? 18 : 28;

  const rings = useMemo(() => {
    return PETALS.map((petal, i) => {
      const grade =
        snapshot.petals.find((p) => p.petalId === petal.id)?.grade ?? 0;
      const rad = baseR + i * (stroke + gap);
      const sweep = Math.max(0.001, Math.min(1, grade / 5)) * 359.99;
      return { petal, grade, rad, sweep };
    });
  }, [snapshot, baseR, stroke, gap]);

  const petalSkills = selected
    ? skills.filter((s) => s.petalId === selected)
    : [];

  function handlePetal(petalId: PetalId) {
    if (onPetalSelect) {
      onPetalSelect(petalId);
      return;
    }
    if (compact) return;
    setSelected((prev) => (prev === petalId ? null : petalId));
  }

  return (
    <div className={`flower-viz${compact ? ' compact' : ''}`}>
      <p className="muted flower-overall">
        Flor general:{' '}
        <strong style={{ color: 'var(--ink)' }}>
          {snapshot.overall.toFixed(2)}
        </strong>{' '}
        / 5
      </p>
      <div className="flower-chart-row">
        <svg
          className="flower-svg"
          width={size}
          height={size}
          viewBox={`0 0 ${size} ${size}`}
          role="img"
          aria-label="Flor de habilidades"
        >
          <circle
            cx={cx}
            cy={cy}
            r={baseR - stroke / 2 - 2}
            fill="var(--bg)"
            stroke="var(--line)"
            strokeWidth={1}
          />
          {rings.map(({ petal, grade, rad, sweep }) => {
            const active = selected === petal.id;
            const dimTrack = describeArc(cx, cy, rad, 0, 359.99);
            const dimArc =
              grade > 0 ? describeArc(cx, cy, rad, 0, sweep) : null;
            return (
              <g key={petal.id}>
                <path
                  d={dimTrack}
                  fill="none"
                  stroke="var(--line)"
                  strokeWidth={stroke}
                  strokeLinecap="round"
                  opacity={0.35}
                />
                {dimArc ? (
                  <path
                    d={dimArc}
                    fill="none"
                    stroke={petal.color}
                    strokeWidth={active ? stroke + 3 : stroke}
                    strokeLinecap="round"
                    className="flower-arc"
                    style={{ cursor: 'pointer' }}
                    tabIndex={0}
                    role="button"
                    aria-label={`${petal.nameEs}, grado ${grade.toFixed(1)} de 5`}
                    aria-pressed={active}
                    onClick={() => handlePetal(petal.id)}
                    onKeyDown={(e) => {
                      if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        handlePetal(petal.id);
                      }
                    }}
                  />
                ) : (
                  <path
                    d={dimTrack}
                    fill="none"
                    stroke={petal.color}
                    strokeWidth={stroke}
                    strokeLinecap="round"
                    opacity={0.15}
                    style={{ cursor: 'pointer' }}
                    tabIndex={0}
                    role="button"
                    aria-label={`${petal.nameEs}, sin skills`}
                    onClick={() => handlePetal(petal.id)}
                    onKeyDown={(e) => {
                      if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        handlePetal(petal.id);
                      }
                    }}
                  />
                )}
              </g>
            );
          })}
        </svg>
        {!compact ? (
          <ul className="flower-legend">
            {PETALS.map((p) => {
              const grade =
                snapshot.petals.find((x) => x.petalId === p.id)?.grade ?? 0;
              return (
                <li key={p.id}>
                  <button
                    type="button"
                    className={
                      selected === p.id ? 'legend-btn on' : 'legend-btn'
                    }
                    style={{ borderColor: p.color }}
                    onClick={() => handlePetal(p.id)}
                  >
                    <span
                      className="swatch"
                      style={{ background: p.color }}
                    />
                    {p.nameEs}
                    <span className="muted"> {grade.toFixed(1)}</span>
                  </button>
                </li>
              );
            })}
          </ul>
        ) : null}
      </div>

      {!compact && selected ? (
        <div
          className="flower-panel"
          style={{ borderColor: getPetal(selected).color }}
        >
          <div className="row" style={{ justifyContent: 'space-between' }}>
            <h3 style={{ margin: 0, color: getPetal(selected).color }}>
              {getPetal(selected).nameEs}
            </h3>
            <button
              type="button"
              className="btn secondary"
              onClick={() => setSelected(null)}
            >
              Cerrar
            </button>
          </div>
          {petalSkills.length === 0 ? (
            <p className="muted">Sin skills en este pétalo.</p>
          ) : (
            <ul className="flower-skill-list">
              {petalSkills.map((skill) => {
                const skillRefs = refs.filter((r) => r.skillId === skill.id);
                const peerAvg =
                  skillRefs.length === 0
                    ? null
                    : skillRefs.reduce((a, r) => a + r.grade, 0) /
                      skillRefs.length;
                return (
                  <li key={skill.id}>
                    <strong>{skill.name}</strong>
                    <span className="muted">
                      {' '}
                      · declarado {skill.level}
                      {peerAvg != null
                        ? ` · peers ${peerAvg.toFixed(1)}`
                        : ''}
                    </span>
                    {skillRefs.length > 0 ? (
                      <ul className="flower-refs">
                        {skillRefs.map((r) => {
                          const proof = proofs.find((p) => p.id === r.proofId);
                          return (
                            <li key={r.id}>
                              de {r.fromUserId} · grado {r.grade}
                              {r.note ? ` — ${r.note}` : ''}
                              {proof ? (
                                <span className="badge verified">
                                  {proof.stub ? 'proof stub' : 'verified'}{' '}
                                  {proof.id}
                                </span>
                              ) : null}
                            </li>
                          );
                        })}
                      </ul>
                    ) : null}
                  </li>
                );
              })}
            </ul>
          )}
        </div>
      ) : null}
    </div>
  );
}

/** Polar arc path from startAngle to endAngle (degrees, 0 = east, CCW). */
function describeArc(
  cx: number,
  cy: number,
  r: number,
  startAngle: number,
  endAngle: number,
): string {
  const start = polarToCartesian(cx, cy, r, endAngle);
  const end = polarToCartesian(cx, cy, r, startAngle);
  const large = endAngle - startAngle <= 180 ? '0' : '1';
  return [
    'M',
    start.x,
    start.y,
    'A',
    r,
    r,
    0,
    large,
    0,
    end.x,
    end.y,
  ].join(' ');
}

function polarToCartesian(
  cx: number,
  cy: number,
  r: number,
  angleDeg: number,
) {
  const rad = ((angleDeg - 90) * Math.PI) / 180;
  return {
    x: cx + r * Math.cos(rad),
    y: cy + r * Math.sin(rad),
  };
}
