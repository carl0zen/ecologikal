import { ImageResponse } from 'next/og';
import { BRAND_HEX } from '@/components/brand/brandPalette';
import { FLOWER_MARK, petalPose } from '@/components/brand/flowerMarkGeometry';

export const size = { width: 64, height: 64 };
export const contentType = 'image/png';

/**
 * Favicon derived from the same polar math as FlowerMark.
 * Generated at build time (`○ /icon`) from `flowerMarkGeometry.ts`
 * so petal poses cannot drift from the product mark.
 */
export default function Icon() {
  const {
    viewBox,
    cx,
    cy,
    petalLength,
    petalWidth,
    petalCount,
    centerR,
    pupilR,
    monoOpacity,
    pupilOpacity,
  } = FLOWER_MARK;
  const inner = size.width - 8;
  const { leaf, kin, inkBg } = BRAND_HEX;

  const petals = Array.from({ length: petalCount }, (_, i) => {
    const { tx, ty, rot } = petalPose(i);
    return (
      <ellipse
        key={i}
        cx={tx}
        cy={ty}
        rx={petalWidth}
        ry={petalLength}
        fill={leaf}
        transform={`rotate(${rot} ${tx} ${ty})`}
        opacity={monoOpacity}
      />
    );
  });

  return new ImageResponse(
    (
      <div
        style={{
          width: '100%',
          height: '100%',
          display: 'flex',
          alignItems: 'center',
          justifyContent: 'center',
          background: inkBg,
        }}
      >
        <svg width={inner} height={inner} viewBox={`0 0 ${viewBox} ${viewBox}`}>
          {petals}
          <circle cx={cx} cy={cy} r={centerR} fill={kin} />
          <circle
            cx={cx}
            cy={cy}
            r={pupilR}
            fill={inkBg}
            opacity={pupilOpacity}
          />
        </svg>
      </div>
    ),
    { ...size },
  );
}
