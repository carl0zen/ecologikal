/**
 * Cinematic inline-SVG scenes. Every color is a CSS custom property from
 * globals.css, so the same geometry renders as amber dusk in dark mode and
 * morning gold in light mode. Decorative: aria-hidden, no external assets.
 */

/**
 * Valle hero — low sun over layered ridges and terraced fields.
 * With `hideSky`, the sky rect and sun are omitted so a live layer behind
 * (ShaderSky, or the .cine-hero CSS gradient) paints them instead.
 */
export function ValleScene({ hideSky = false }: { hideSky?: boolean }) {
  return (
    <div className="scene" aria-hidden="true">
      <svg
        viewBox="0 0 1440 640"
        preserveAspectRatio="xMidYMax slice"
        role="presentation"
      >
        <defs>
          <linearGradient id="vs-sky" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0" stopColor="var(--sky-hi)" />
            <stop offset="1" stopColor="var(--sky-lo)" />
          </linearGradient>
          <radialGradient id="vs-glow" cx="0.5" cy="0.5" r="0.5">
            <stop offset="0" stopColor="var(--sun)" stopOpacity="0.55" />
            <stop offset="1" stopColor="var(--sun)" stopOpacity="0" />
          </radialGradient>
          <linearGradient id="vs-haze" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0" stopColor="var(--haze)" stopOpacity="0" />
            <stop offset="1" stopColor="var(--haze)" stopOpacity="0.55" />
          </linearGradient>
        </defs>

        {/* sky + sun — omitted when a live sky renders behind the svg */}
        {hideSky ? null : (
          <>
            <rect width="1440" height="640" fill="url(#vs-sky)" />
            <circle cx="1040" cy="238" r="210" fill="url(#vs-glow)" />
            <circle cx="1040" cy="238" r="46" fill="var(--sun)" />
          </>
        )}

        {/* far ridge */}
        <path
          d="M0 300 C 180 258, 340 292, 520 274 C 700 256, 830 296, 1010 282 C 1190 268, 1320 296, 1440 278 L 1440 640 L 0 640 Z"
          fill="var(--ridge-far)"
        />
        <rect y="240" width="1440" height="140" fill="url(#vs-haze)" />

        {/* mid ridge */}
        <path
          d="M0 384 C 210 342, 380 388, 560 368 C 760 346, 900 396, 1090 378 C 1260 362, 1360 388, 1440 374 L 1440 640 L 0 640 Z"
          fill="var(--ridge-mid)"
        />

        {/* near ridge */}
        <path
          d="M0 462 C 190 428, 400 470, 610 452 C 830 432, 1010 476, 1210 458 C 1320 448, 1390 462, 1440 456 L 1440 640 L 0 640 Z"
          fill="var(--ridge-near)"
        />

        {/* terraced foreground */}
        <path d="M0 520 C 320 492, 760 540, 1440 508 L 1440 640 L 0 640 Z" fill="var(--field)" />
        <g stroke="var(--field-row)" strokeWidth="6" fill="none" opacity="0.75">
          <path d="M-30 552 C 330 522, 750 566, 1470 536" />
          <path d="M-30 584 C 330 556, 750 598, 1470 566" />
          <path d="M-30 616 C 330 590, 750 630, 1470 598" />
        </g>

        {/* birds */}
        <g
          stroke="var(--ink)"
          strokeWidth="2.5"
          strokeLinecap="round"
          fill="none"
          opacity="0.5"
        >
          <path d="M690 186 q 9 -9 18 0 q 9 -9 18 0" />
          <path d="M760 158 q 7 -7 14 0 q 7 -7 14 0" />
          <path d="M820 200 q 6 -6 12 0 q 6 -6 12 0" />
        </g>
      </svg>
    </div>
  );
}

/** Flagship aerial — curved crop rows, laguna, airstrip, campus lights. */
export function FlagshipScene() {
  return (
    <div className="scene" aria-hidden="true">
      <svg
        viewBox="0 0 1200 480"
        preserveAspectRatio="xMidYMid slice"
        role="presentation"
      >
        <defs>
          <linearGradient id="fs-light" x1="1" y1="0" x2="0" y2="1">
            <stop offset="0" stopColor="var(--sun)" stopOpacity="0.28" />
            <stop offset="0.55" stopColor="var(--sun)" stopOpacity="0" />
          </linearGradient>
          <radialGradient id="fs-lamp" cx="0.5" cy="0.5" r="0.5">
            <stop offset="0" stopColor="var(--sun)" stopOpacity="0.9" />
            <stop offset="1" stopColor="var(--sun)" stopOpacity="0" />
          </radialGradient>
        </defs>

        {/* land */}
        <rect width="1200" height="480" fill="var(--field)" />

        {/* bamboo perimeter */}
        <rect
          x="14"
          y="14"
          width="1172"
          height="452"
          rx="60"
          fill="none"
          stroke="var(--ridge-near)"
          strokeWidth="30"
          opacity="0.85"
        />

        {/* curved crop rows */}
        <g stroke="var(--field-row)" strokeWidth="9" fill="none" opacity="0.85">
          <path d="M120 430 C 240 330, 250 220, 160 110" />
          <path d="M170 442 C 300 336, 312 212, 210 92" />
          <path d="M224 452 C 360 342, 374 206, 262 78" />
          <path d="M282 458 C 420 348, 436 202, 318 68" />
          <path d="M344 462 C 480 354, 498 200, 378 62" />
        </g>

        {/* airstrip */}
        <g transform="rotate(-14 880 120)">
          <rect x="640" y="96" width="480" height="46" rx="10" fill="var(--ridge-mid)" />
          <g fill="var(--haze)" opacity="0.85">
            <rect x="668" y="116" width="34" height="6" rx="3" />
            <rect x="730" y="116" width="34" height="6" rx="3" />
            <rect x="792" y="116" width="34" height="6" rx="3" />
            <rect x="854" y="116" width="34" height="6" rx="3" />
            <rect x="916" y="116" width="34" height="6" rx="3" />
            <rect x="978" y="116" width="34" height="6" rx="3" />
            <rect x="1040" y="116" width="34" height="6" rx="3" />
          </g>
        </g>

        {/* laguna */}
        <path
          d="M760 320 C 800 288, 872 292, 908 320 C 944 348, 936 392, 892 406 C 844 420, 776 412, 752 380 C 734 356, 736 338, 760 320 Z"
          fill="var(--water)"
        />

        {/* campus — palapa circles, lit at dusk */}
        <g>
          <circle cx="560" cy="250" r="60" fill="url(#fs-lamp)" />
          <circle cx="560" cy="250" r="26" fill="var(--ridge-near)" />
          <circle cx="560" cy="250" r="26" fill="none" stroke="var(--sun)" strokeWidth="3" opacity="0.9" />
          <circle cx="648" cy="300" r="44" fill="url(#fs-lamp)" />
          <circle cx="648" cy="300" r="18" fill="var(--ridge-near)" />
          <circle cx="648" cy="300" r="18" fill="none" stroke="var(--sun)" strokeWidth="3" opacity="0.9" />
          <circle cx="620" cy="188" r="40" fill="url(#fs-lamp)" />
          <circle cx="620" cy="188" r="15" fill="var(--ridge-near)" />
          <circle cx="620" cy="188" r="15" fill="none" stroke="var(--sun)" strokeWidth="3" opacity="0.9" />
          <circle cx="700" cy="232" r="34" fill="url(#fs-lamp)" />
          <circle cx="700" cy="232" r="12" fill="var(--ridge-near)" />
          <circle cx="700" cy="232" r="12" fill="none" stroke="var(--sun)" strokeWidth="3" opacity="0.9" />
        </g>

        {/* connecting paths */}
        <g stroke="var(--haze)" strokeWidth="5" fill="none" opacity="0.5" strokeLinecap="round">
          <path d="M560 276 C 580 300, 610 306, 630 302" />
          <path d="M588 238 C 600 220, 610 206, 618 200" />
          <path d="M666 288 C 680 268, 690 250, 696 244" />
          <path d="M676 310 C 710 330, 744 344, 766 352" />
        </g>

        {/* dusk light wash */}
        <rect width="1200" height="480" fill="url(#fs-light)" />
      </svg>
    </div>
  );
}
