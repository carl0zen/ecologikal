'use client';

import Link from 'next/link';
import { useMemo, useState } from 'react';
import {
  PETALS,
  flowerSnapshot,
  getPetal,
  type PetalId,
  type Skill,
  type SkillReference,
} from '@ecologikal/domain';
import { FlowerViz } from '@/components/FlowerViz';

export type MeetGuest = {
  userId: string;
  displayName: string;
  accountClass: string;
  skills: Skill[];
  refs: SkillReference[];
};

type Props = {
  guests: MeetGuest[];
  sessionUserId?: string | null;
  /** Prefill from /meet?petal= after onboarding */
  initialPetal?: PetalId | null;
  fromOnboarding?: boolean;
};

export function MeetDirectory({
  guests,
  sessionUserId,
  initialPetal = null,
  fromOnboarding = false,
}: Props) {
  const [petalFilter, setPetalFilter] = useState<PetalId | null>(initialPetal);
  const [sortMode, setSortMode] = useState<'overall' | 'petal'>(
    initialPetal != null ? 'petal' : 'overall',
  );

  const ranked = useMemo(() => {
    const withSnap = guests.map((g) => {
      const snap = flowerSnapshot(g.skills, g.refs);
      const petalGrade =
        petalFilter == null
          ? 0
          : (snap.petals.find((p) => p.petalId === petalFilter)?.grade ?? 0);
      return { ...g, snap, petalGrade };
    });

    let filtered = withSnap;
    if (petalFilter != null) {
      filtered = withSnap.filter(
        (g) =>
          g.skills.some((s) => s.petalId === petalFilter) || g.petalGrade > 0,
      );
    }

    const sorted = [...filtered].sort((a, b) => {
      if (sortMode === 'petal' && petalFilter != null) {
        return b.petalGrade - a.petalGrade;
      }
      return b.snap.overall - a.snap.overall;
    });
    return sorted;
  }, [guests, petalFilter, sortMode]);

  const bannerPetal =
    fromOnboarding && petalFilter != null ? getPetal(petalFilter) : null;

  return (
    <div className="stack">
      <section className="card">
        <h1>Conoce</h1>
        <p className="muted">
          Econautas por flor de skills — reputación visual, no keyword spam.
        </p>
        {bannerPetal ? (
          <p className="meet-handoff-banner" role="status">
            Estas flores hablan tu idioma — {bannerPetal.nameEs}.
          </p>
        ) : null}
        <div className="petal-chips" role="group" aria-label="Filtrar por pétalo">
          <button
            type="button"
            className={petalFilter == null ? 'petal-chip on' : 'petal-chip'}
            onClick={() => {
              setPetalFilter(null);
              setSortMode('overall');
            }}
          >
            Todos
          </button>
          {PETALS.map((p) => (
            <button
              key={p.id}
              type="button"
              className={petalFilter === p.id ? 'petal-chip on' : 'petal-chip'}
              style={
                petalFilter === p.id
                  ? { color: p.color, borderColor: p.color }
                  : undefined
              }
              onClick={() => {
                setPetalFilter(p.id);
                setSortMode('petal');
              }}
            >
              {p.nameEs}
            </button>
          ))}
        </div>
        <label className="muted">
          Ordenar{' '}
          <select
            value={sortMode}
            onChange={(e) =>
              setSortMode(e.target.value === 'petal' ? 'petal' : 'overall')
            }
            style={{ width: 'auto', display: 'inline-block', margin: 0 }}
          >
            <option value="overall">Flor general</option>
            <option value="petal" disabled={petalFilter == null}>
              Pétalo seleccionado
            </option>
          </select>
        </label>
      </section>

      <section className="grid">
        {ranked.length === 0 ? (
          <div className="card">
            <p className="muted">
              {petalFilter
                ? `Nadie con skills en ${getPetal(petalFilter).nameEs}.`
                : 'Sin perfiles aún.'}
            </p>
          </div>
        ) : (
          ranked.map((g) => {
            const isSelf = sessionUserId === g.userId;
            return (
              <article key={g.userId} className="card">
                <Link
                  href={`/profile/${encodeURIComponent(g.userId)}`}
                  className="meet-card-link"
                >
                  <h2>{g.displayName}</h2>
                  <p className="muted">
                    <span className="badge">{g.accountClass}</span> · @
                    {g.userId}
                  </p>
                  <FlowerViz snapshot={g.snap} compact />
                  <ul>
                    {g.skills.slice(0, 5).map((s) => (
                      <li key={s.id}>
                        {s.name} · {getPetal(s.petalId).nameEs}
                      </li>
                    ))}
                  </ul>
                </Link>
                {sessionUserId && !isSelf && g.skills.length > 0 ? (
                  <p style={{ marginTop: '0.75rem' }}>
                    <Link
                      href={`/profile/${encodeURIComponent(g.userId)}#attest`}
                      className="btn secondary"
                    >
                      Atestar
                    </Link>
                  </p>
                ) : null}
              </article>
            );
          })
        )}
      </section>
    </div>
  );
}
