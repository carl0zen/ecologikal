'use client';

import { useState } from 'react';
import type { FlowerSnapshot, PetalId, Skill } from '@ecologikal/domain';
import { PetalPicker } from './PetalPicker';
import { SkillStep, type SkillDraft } from './SkillStep';
import { FlowerReveal } from './FlowerReveal';

type Step = 0 | 1 | 2 | 3;

type Props = {
  username: string;
  initialDisplayName: string;
  initialBio?: string;
};

type CompleteResponse = {
  profile: { displayName: string };
  skills: Skill[];
  snapshot: FlowerSnapshot;
  kinsEarned: number;
};

const STEP_LABELS = ['Identidad', 'Pétalos', 'Habilidades', 'Flor'] as const;

/**
 * Guest onboarding funnel: identity → petals → skills → flower reveal.
 */
export function OnboardingWizard({
  username,
  initialDisplayName,
  initialBio = '',
}: Props) {
  const [step, setStep] = useState<Step>(0);
  const [displayName, setDisplayName] = useState(initialDisplayName || username);
  const [bio, setBio] = useState(initialBio);
  const [petals, setPetals] = useState<PetalId[]>([]);
  const [drafts, setDrafts] = useState<SkillDraft[]>([]);
  const [nameError, setNameError] = useState('');
  const [petalError, setPetalError] = useState('');
  const [skillError, setSkillError] = useState('');
  const [submitError, setSubmitError] = useState('');
  const [pending, setPending] = useState(false);
  const [result, setResult] = useState<CompleteResponse | null>(null);

  function syncDrafts(nextPetals: PetalId[]) {
    setPetals(nextPetals);
    setDrafts((prev) => {
      const kept = prev.filter((d) => nextPetals.includes(d.petalId));
      const added = nextPetals
        .filter((id) => !kept.some((d) => d.petalId === id))
        .map((petalId) => ({ petalId, name: '', level: 3 }));
      return [...kept, ...added];
    });
  }

  function goIdentityNext() {
    const name = displayName.trim();
    if (name.length < 1) {
      setNameError('Escribe cómo te llamas.');
      return;
    }
    setNameError('');
    setStep(1);
  }

  function goPetalsNext() {
    if (petals.length < 2 || petals.length > 3) {
      setPetalError('Elige entre 2 y 3 pétalos.');
      return;
    }
    setPetalError('');
    setStep(2);
  }

  async function complete() {
    const filled = drafts.filter((d) => d.name.trim().length > 0);
    if (filled.length < 1) {
      setSkillError('Nombra al menos una habilidad.');
      return;
    }
    setSkillError('');
    setSubmitError('');
    setPending(true);
    try {
      const res = await fetch('/api/onboarding/complete', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          displayName: displayName.trim(),
          bio: bio.trim(),
          skills: filled.map((d) => ({
            name: d.name.trim(),
            petalId: d.petalId,
            level: d.level,
          })),
        }),
      });
      if (!res.ok) {
        const err = (await res.json().catch(() => ({}))) as {
          error?: string;
        };
        throw new Error(err.error || 'No se pudo guardar');
      }
      const data = (await res.json()) as CompleteResponse;
      setResult(data);
      setStep(3);
    } catch (e) {
      setSubmitError(
        e instanceof Error ? e.message : 'Error al completar el registro',
      );
    } finally {
      setPending(false);
    }
  }

  if (step === 3 && result) {
    return (
      <div className="onboard">
        <Progress step={3} />
        <FlowerReveal
          snapshot={result.snapshot}
          skills={result.skills}
          kinsEarned={result.kinsEarned}
          displayName={result.profile.displayName}
        />
      </div>
    );
  }

  return (
    <div className="onboard">
      <Progress step={step} />

      {step === 0 ? (
        <section className="onboard-step" data-stagger>
          <h1>Cómo te presentas</h1>
          <p className="muted">
            Empieza tu flor. Luego eliges en qué pétalos creces.
          </p>
          <label htmlFor="displayName">Nombre</label>
          <input
            id="displayName"
            value={displayName}
            onChange={(e) => setDisplayName(e.target.value)}
            maxLength={60}
            autoComplete="nickname"
          />
          {nameError ? <p className="field-error">{nameError}</p> : null}
          <label htmlFor="bio">Qué te mueve (opcional)</label>
          <textarea
            id="bio"
            rows={3}
            value={bio}
            onChange={(e) => setBio(e.target.value)}
            maxLength={280}
            placeholder="Una línea sobre lo que te trae aquí…"
          />
          <p className="muted" style={{ fontSize: '0.8rem' }}>
            Cuenta: guest · @{username}
          </p>
          <div className="onboard-actions">
            <button className="btn" type="button" onClick={goIdentityNext}>
              Seguir
            </button>
          </div>
        </section>
      ) : null}

      {step === 1 ? (
        <section className="onboard-step" data-stagger>
          <h1>Elige tus pétalos</h1>
          <p className="muted">
            Escoge 2 o 3 áreas donde quieres crecer y aportar.
          </p>
          <PetalPicker selected={petals} onChange={syncDrafts} />
          {petalError ? <p className="field-error">{petalError}</p> : null}
          <div className="onboard-actions">
            <button
              className="btn secondary"
              type="button"
              onClick={() => setStep(0)}
            >
              Atrás
            </button>
            <button className="btn" type="button" onClick={goPetalsNext}>
              Seguir
            </button>
          </div>
        </section>
      ) : null}

      {step === 2 ? (
        <section className="onboard-step" data-stagger>
          <h1>Tus primeras habilidades</h1>
          <p className="muted">
            Un nombre y un nivel por pétalo. Puedes añadir más después.
          </p>
          <SkillStep
            petals={petals}
            drafts={drafts}
            onChange={setDrafts}
            error={skillError}
          />
          {submitError ? <p className="field-error">{submitError}</p> : null}
          <div className="onboard-actions">
            <button
              className="btn secondary"
              type="button"
              onClick={() => setStep(1)}
              disabled={pending}
            >
              Atrás
            </button>
            <button
              className="btn"
              type="button"
              onClick={() => void complete()}
              disabled={pending}
              aria-busy={pending}
            >
              {pending ? 'Creando tu flor…' : 'Crear mi flor'}
            </button>
          </div>
        </section>
      ) : null}
    </div>
  );
}

function Progress({ step }: { step: Step }) {
  return (
    <div
      className="onboard-progress"
      role="navigation"
      aria-label="Progreso de registro"
    >
      {STEP_LABELS.map((label, i) => (
        <span
          key={label}
          className={`onboard-dot${i <= step ? ' on' : ''}`}
          title={label}
          aria-current={i === step ? 'step' : undefined}
        />
      ))}
    </div>
  );
}
