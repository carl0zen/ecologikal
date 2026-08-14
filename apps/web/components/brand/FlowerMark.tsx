import { PETALS } from '@ecologikal/domain';
import { FLOWER_MARK, petalPose } from './flowerMarkGeometry';

type FlowerMarkProps = {
  size?: number;
  /** Single-colour mark for favicons / tight UI */
  mono?: boolean;
  monoColor?: string;
  className?: string;
  title?: string;
  /** Hide from AT when paired with visible wordmark */
  decorative?: boolean;
};

/**
 * Seven-petal brand mark. Petal colours follow domain taxonomy;
 * centre uses kin gold. Mono mode collapses to one fill.
 * Geometry: `flowerMarkGeometry.ts` (shared with favicon).
 */
export function FlowerMark({
  size = 64,
  mono = false,
  monoColor = 'var(--eco-leaf)',
  className,
  title = 'Ecologikal',
  decorative = false,
}: FlowerMarkProps) {
  const {
    viewBox,
    cx,
    cy,
    petalLength,
    petalWidth,
    centerR,
    pupilR,
    monoOpacity,
    colorOpacity,
    pupilOpacity,
  } = FLOWER_MARK;

  return (
    <svg
      width={size}
      height={size}
      viewBox={`0 0 ${viewBox} ${viewBox}`}
      className={className}
      role={decorative ? 'presentation' : 'img'}
      aria-hidden={decorative ? true : undefined}
      aria-label={decorative ? undefined : title}
    >
      {decorative ? null : <title>{title}</title>}
      {PETALS.map((petal, i) => {
        const { tx, ty, rot } = petalPose(i);
        const fill = mono ? monoColor : petal.color;
        return (
          <ellipse
            key={petal.id}
            cx={tx}
            cy={ty}
            rx={petalWidth}
            ry={petalLength}
            fill={fill}
            transform={`rotate(${rot} ${tx} ${ty})`}
            opacity={mono ? monoOpacity : colorOpacity}
          />
        );
      })}
      <circle
        cx={cx}
        cy={cy}
        r={centerR}
        fill={mono ? monoColor : 'var(--eco-kin)'}
      />
      <circle
        cx={cx}
        cy={cy}
        r={pupilR}
        fill="var(--eco-bg)"
        opacity={pupilOpacity}
      />
    </svg>
  );
}

type WordmarkProps = {
  as?: 'p' | 'span' | 'h1';
  /** Extra classes; base `eco-wordmark` is always applied */
  className?: string;
};

/** Eco + leaf-emphasized logikal */
export function EcoWordmark({ className, as: Tag = 'span' }: WordmarkProps) {
  const classes = className
    ? `eco-wordmark ${className}`
    : 'eco-wordmark';
  return (
    <Tag className={classes}>
      Eco<em>logikal</em>
    </Tag>
  );
}
