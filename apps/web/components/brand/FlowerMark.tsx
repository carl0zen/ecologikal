import { PETALS } from '@ecologikal/domain';

type FlowerMarkProps = {
  size?: number;
  /** Single-colour mark for favicons / tight UI */
  mono?: boolean;
  monoColor?: string;
  className?: string;
  title?: string;
};

/**
 * Seven-petal brand mark. Petal colours follow domain taxonomy;
 * centre uses kin gold. Mono mode collapses to one fill.
 */
export function FlowerMark({
  size = 64,
  mono = false,
  monoColor = 'var(--eco-leaf)',
  className,
  title = 'Ecologikal',
}: FlowerMarkProps) {
  const cx = 50;
  const cy = 50;
  const petalLength = 28;
  const petalWidth = 14;
  const startAngle = -90;

  return (
    <svg
      width={size}
      height={size}
      viewBox="0 0 100 100"
      className={className}
      role="img"
      aria-label={title}
    >
      <title>{title}</title>
      {PETALS.map((petal, i) => {
        const angle = ((startAngle + i * (360 / 7)) * Math.PI) / 180;
        const tx = cx + Math.cos(angle) * 22;
        const ty = cy + Math.sin(angle) * 22;
        const rot = startAngle + i * (360 / 7) + 90;
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
            opacity={mono ? 1 : 0.92}
          />
        );
      })}
      <circle
        cx={cx}
        cy={cy}
        r={10}
        fill={mono ? monoColor : 'var(--eco-kin, #b8964e)'}
      />
      <circle
        cx={cx}
        cy={cy}
        r={4.5}
        fill={mono ? 'var(--eco-bg, #121c16)' : 'var(--eco-bg, #121c16)'}
        opacity={0.35}
      />
    </svg>
  );
}

type WordmarkProps = {
  className?: string;
  as?: 'p' | 'span' | 'h1';
};

/** Eco + leaf-emphasized logikal */
export function EcoWordmark({ className, as: Tag = 'span' }: WordmarkProps) {
  return (
    <Tag className={className ?? 'eco-wordmark'}>
      Eco<em>logikal</em>
    </Tag>
  );
}
