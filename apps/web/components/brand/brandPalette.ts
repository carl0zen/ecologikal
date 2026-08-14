/**
 * Brand hexes that ImageResponse / OG cannot read from CSS variables.
 * Must match `:root` in `globals.css` — change both or neither.
 */
export const BRAND_HEX = {
  inkBg: '#121c16', // --eco-bg
  leaf: '#6aad72', // --eco-leaf
  kin: '#b8964e', // --eco-kin
} as const;
