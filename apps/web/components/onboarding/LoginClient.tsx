'use client';

import type { ReactNode } from 'react';
import { useFormStatus } from 'react-dom';
import { Plant, SignIn } from '@phosphor-icons/react';
import { EcoWordmark, FlowerMark } from '@/components/brand/FlowerMark';

type Props = {
  allowDevLogin: boolean;
  startSso: () => Promise<void>;
  devLogin: (formData: FormData) => Promise<void>;
};

function SubmitButton({
  label,
  secondary,
  icon,
}: {
  label: string;
  secondary?: boolean;
  icon?: ReactNode;
}) {
  const { pending } = useFormStatus();
  return (
    <button
      className={`btn${secondary ? ' secondary' : ''}`}
      type="submit"
      disabled={pending}
      aria-busy={pending}
    >
      {icon}
      {pending ? 'Entrando…' : label}
    </button>
  );
}

/**
 * Brand-first login composition — one stage, SSO primary, demo quiet.
 */
export function LoginClient({ allowDevLogin, startSso, devLogin }: Props) {
  return (
    <main className="login-stage">
      <section className="login-brand">
        <div className="eco-lockup">
          <FlowerMark size={56} decorative />
          <EcoWordmark as="p" />
        </div>
        <p className="promise">
          Tu flor de habilidades es tu reputación.
        </p>
      </section>

      <section className="login-panel">
        <div className="login-primary">
          <form action={startSso}>
            <SubmitButton
              label="Continuar con Certexi"
              icon={<SignIn size={18} weight="bold" aria-hidden />}
            />
          </form>
          <p className="muted" style={{ fontSize: '0.85rem', margin: 0 }}>
            Entra y dibuja tu primera flor de habilidades.
          </p>
        </div>

        {allowDevLogin ? (
          <div className="login-demo">
            <h2>Demo econauta</h2>
            <p className="muted" style={{ fontSize: '0.8rem', margin: '0 0 0.75rem' }}>
              Sin platform — solo desarrollo. Guest es el camino hero.
            </p>
            <form action={devLogin}>
              <label htmlFor="username">Usuario</label>
              <input id="username" name="username" defaultValue="guest1" />
              <label htmlFor="accountClass">Clase</label>
              <select id="accountClass" name="accountClass" defaultValue="guest">
                <option value="guest">guest (econauta)</option>
                <option value="host">host</option>
                <option value="admin">admin</option>
              </select>
              <SubmitButton
                label="Entrar en demo"
                secondary
                icon={<Plant size={16} weight="bold" aria-hidden />}
              />
            </form>
          </div>
        ) : null}
      </section>
    </main>
  );
}
