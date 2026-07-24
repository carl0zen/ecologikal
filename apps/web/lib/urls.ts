/** Public URLs for dual-stack coexistence (vintage PHP + revival Next). */

export function vintageUrl(path = '/'): string {
  const base = (
    process.env.NEXT_PUBLIC_VINTAGE_URL || 'http://localhost:8090'
  ).replace(/\/$/, '');
  if (!path || path === '/') return `${base}/`;
  return `${base}${path.startsWith('/') ? path : `/${path}`}`;
}

/** App-relative path including Next basePath (`/v2` behind gateway). */
export function revivalPath(path: string): string {
  const base =
    process.env.NEXT_PUBLIC_BASE_PATH || process.env.NEXT_BASE_PATH || '';
  const normalized = path.startsWith('/') ? path : `/${path}`;
  if (!base) return normalized;
  if (normalized === '/') return base || '/';
  return `${base}${normalized}`;
}
