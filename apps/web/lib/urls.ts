/** Public URLs for dual-stack coexistence (vintage PHP + revival Next). */

export function vintageUrl(path = '/'): string {
  const base = (
    process.env.NEXT_PUBLIC_VINTAGE_URL || 'http://localhost:8082'
  ).replace(/\/$/, '');
  if (!path || path === '/') return `${base}/`;
  return `${base}${path.startsWith('/') ? path : `/${path}`}`;
}

export function revivalPath(path: string): string {
  const base = process.env.NEXT_PUBLIC_BASE_PATH || '';
  if (!path.startsWith('/')) return `${base}/${path}`;
  return `${base}${path}`;
}
