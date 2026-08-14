'use client';

import { useCallback, useEffect, useState } from 'react';
import { Moon, Sun } from '@phosphor-icons/react';

type Theme = 'dark' | 'light';

function systemTheme(): Theme {
  return window.matchMedia('(prefers-color-scheme: dark)').matches
    ? 'dark'
    : 'light';
}

/**
 * Dark ↔ light toggle. The pre-hydration script in layout.tsx applies the
 * stored choice before first paint; this button only flips + persists it.
 */
export function ThemeToggle() {
  const [theme, setTheme] = useState<Theme | null>(null);

  useEffect(() => {
    const stored = document.documentElement.dataset.theme;
    setTheme(stored === 'dark' || stored === 'light' ? stored : systemTheme());
  }, []);

  const toggle = useCallback(() => {
    const next: Theme = theme === 'dark' ? 'light' : 'dark';
    document.documentElement.dataset.theme = next;
    try {
      localStorage.setItem('eco-theme', next);
    } catch {
      /* private mode — theme still applies for this page */
    }
    setTheme(next);
  }, [theme]);

  // Render a stable placeholder pre-hydration to avoid icon flicker.
  return (
    <button
      type="button"
      className="theme-toggle"
      onClick={toggle}
      aria-label={
        theme === 'dark' ? 'Cambiar a modo día' : 'Cambiar a modo noche'
      }
      title={theme === 'dark' ? 'Modo día' : 'Modo noche'}
    >
      {theme === 'dark' ? (
        <Sun size={15} weight="bold" aria-hidden />
      ) : (
        <Moon size={15} weight="bold" aria-hidden />
      )}
    </button>
  );
}
