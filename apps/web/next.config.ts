import type { NextConfig } from 'next';

const basePath = process.env.NEXT_BASE_PATH || '';

const nextConfig: NextConfig = {
  basePath: basePath || undefined,
  transpilePackages: ['@ecologikal/domain', '@ecologikal/certexi-bridge'],
  env: {
    NEXT_PUBLIC_BASE_PATH: basePath,
  },
};

export default nextConfig;
