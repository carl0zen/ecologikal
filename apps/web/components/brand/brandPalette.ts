/**
 * Brand hexes that ImageResponse / OG cannot read from CSS variables.
 * Must match `:root` in `globals.css` — change both or neither.
 */
export const BRAND_HEX = {
  inkBg: '#100f16', // --eco-bg
  leaf: '#5fb87a', // --eco-leaf
  kin: '#b895d4', // --eco-kin (orchid — social luxury)
} as const;
