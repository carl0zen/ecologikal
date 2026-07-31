'use client';

import { useState } from 'react';
import { LinkSimple } from '@phosphor-icons/react';

type Props = {
  /** Absolute or path URL to copy */
  url: string;
  label?: string;
  className?: string;
  toast?: string;
};

/**
 * Clipboard copy with brief confirmation — shared by reveal + public profile.
 */
export function CopyLinkButton({
  url,
  label = 'Copiar enlace',
  className = 'btn',
  toast = 'Enlace copiado — compártelo con quien te conoce',
}: Props) {
  const [copied, setCopied] = useState(false);

  async function onCopy() {
    const absolute =
      url.startsWith('http') || typeof window === 'undefined'
        ? url
        : new URL(url, window.location.origin).toString();
    try {
      await navigator.clipboard.writeText(absolute);
    } catch {
      window.prompt('Copia este enlace:', absolute);
    }
    setCopied(true);
    window.setTimeout(() => setCopied(false), 2200);
  }

  return (
    <span className="copy-link-wrap">
      <button
        type="button"
        className={className}
        onClick={() => void onCopy()}
        aria-live="polite"
      >
        <LinkSimple size={16} weight="bold" aria-hidden />
        {copied ? 'Copiado' : label}
      </button>
      {copied ? (
        <span className="copy-toast" role="status">
          {toast}
        </span>
      ) : null}
    </span>
  );
}
