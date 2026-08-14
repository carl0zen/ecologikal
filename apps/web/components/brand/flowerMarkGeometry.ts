/** Shared polar layout for FlowerMark and generated favicon. */
export const FLOWER_MARK = {
  viewBox: 100,
  cx: 50,
  cy: 50,
  petalLength: 24,
  petalWidth: 12,
  radial: 18,
  startAngleDeg: -90,
  petalCount: 7,
  centerR: 10,
  pupilR: 4.5,
  monoOpacity: 0.72,
  colorOpacity: 0.92,
  pupilOpacity: 0.35,
} as const;

export type PetalPose = {
  tx: number;
  ty: number;
  rot: number;
};

/**
 * Pose for petal index `i` (0..petalCount-1).
 * Tips stay inset (~42 of 50) via radial + petalLength.
 */
export function petalPose(i: number): PetalPose {
  const { cx, cy, radial, startAngleDeg, petalCount } = FLOWER_MARK;
  const step = 360 / petalCount;
  const deg = startAngleDeg + i * step;
  const angle = (deg * Math.PI) / 180;
  return {
    tx: cx + Math.cos(angle) * radial,
    ty: cy + Math.sin(angle) * radial,
    rot: deg + 90,
  };
}
