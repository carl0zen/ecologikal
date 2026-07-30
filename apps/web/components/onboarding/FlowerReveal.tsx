'use client';

import Link from 'next/link';
import type { FlowerSnapshot, PetalId, Skill } from '@ecologikal/domain';
import { FlowerViz } from '@/components/FlowerViz';
import { CopyLinkButton } from '@/components/CopyLinkButton';

type Props = {
  snapshot: FlowerSnapshot;
  skills: Skill[];
  kinsEarned: number;
  displayName: string;
  userId: string;
  /** First chosen petal for Conoce handoff */
  handoffPetalId: PetalId;
};

/**
 * Celebrated polar flower reveal — ownership (copy link) before Conoce.
 */
export function FlowerReveal({
  snapshot,
  skills,
  kinsEarned,
  displayName,
  userId,
  handoffPetalId,
}: Props) {
  const publicPath = `/profile/${encodeURIComponent(userId)}`;
  const meetHref = `/meet?petal=${handoffPetalId}&from=onboarding`;

  return (
    <div className="reveal-stage reveal-pulse onboard-step" data-stagger>
      <h1>Tu flor, {displayName}</h1>
      <p className="muted" style={{ margin: '0 auto', maxWidth: '26rem' }}>
        Así te ven en Conoce — y quien abra tu enlace.
      </p>
      <span className="kins-earn">+{kinsEarned} KINS ganados</span>
      <div className="flower-chart-row">
        <FlowerViz snapshot={snapshot} skills={skills} />
      </div>
      <div className="onboard-actions" style={{ justifyContent: 'center' }}>
        <CopyLinkButton url={publicPath} />
        <Link className="btn secondary" href={publicPath}>
          Ver mi flor pública
        </Link>
      </div>
      <div
        className="onboard-actions"
        style={{ justifyContent: 'center', marginTop: '0.5rem' }}
      >
        <Link className="btn secondary" href={meetHref}>
          Ver Conoce
        </Link>
        <Link
          href="/profile"
          className="muted"
          style={{ fontSize: '0.85rem' }}
        >
          Editar más tarde
        </Link>
      </div>
    </div>
  );
}
