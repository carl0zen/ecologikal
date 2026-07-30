'use client';

import Link from 'next/link';
import type { FlowerSnapshot, Skill } from '@ecologikal/domain';
import { FlowerViz } from '@/components/FlowerViz';

type Props = {
  snapshot: FlowerSnapshot;
  skills: Skill[];
  kinsEarned: number;
  displayName: string;
};

/**
 * Celebrated polar flower reveal after onboarding completes.
 */
export function FlowerReveal({
  snapshot,
  skills,
  kinsEarned,
  displayName,
}: Props) {
  return (
    <div className="reveal-stage reveal-pulse onboard-step" data-stagger>
      <h1>Tu flor, {displayName}</h1>
      <p className="muted" style={{ margin: '0 auto', maxWidth: '26rem' }}>
        Así te ven en Conoce. Cada pétalo crece con habilidades y atestaciones.
      </p>
      <span className="kins-earn">+{kinsEarned} KINS ganados</span>
      <div className="flower-chart-row">
        <FlowerViz snapshot={snapshot} skills={skills} />
      </div>
      <div className="onboard-actions" style={{ justifyContent: 'center' }}>
        <Link className="btn" href="/meet">
          Ver Conoce
        </Link>
        <Link className="btn secondary" href="/profile">
          Ir a mi perfil
        </Link>
      </div>
    </div>
  );
}
