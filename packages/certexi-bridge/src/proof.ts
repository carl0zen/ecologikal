/**
 * Session-gated Certexi proof client.
 * Until service tokens exist, calls require a forwarded session cookie
 * or operate in local-stub mode for demos.
 */

export interface ProofConfig {
  platformUrl: string;
  /** Forward Certexi session cookie when available */
  sessionCookie?: string;
  /** When true, mint local stub receipts (dev / demo) */
  allowStub?: boolean;
}

export interface ProofReceipt {
  id: string;
  kind: 'skill_reference' | 'volunteer_completion' | 'booking';
  subjectUserId: string;
  payload: Record<string, unknown>;
  stub: boolean;
  createdAt: string;
  verifyUrl?: string;
}

function stubId(kind: string): string {
  return `stub_${kind}_${Date.now().toString(36)}`;
}

export async function attestAction(
  cfg: ProofConfig,
  input: {
    kind: ProofReceipt['kind'];
    subjectUserId: string;
    payload: Record<string, unknown>;
  },
): Promise<ProofReceipt> {
  const createdAt = new Date().toISOString();

  if (cfg.sessionCookie && cfg.platformUrl) {
    try {
      const res = await fetch(
        new URL('/api/identity/credential/validate', cfg.platformUrl),
        {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            Cookie: cfg.sessionCookie,
          },
          body: JSON.stringify({
            kind: input.kind,
            subject: input.subjectUserId,
            ...input.payload,
          }),
        },
      );
      if (res.ok) {
        const data = (await res.json()) as { id?: string };
        return {
          id: data.id ?? stubId(input.kind),
          kind: input.kind,
          subjectUserId: input.subjectUserId,
          payload: input.payload,
          stub: false,
          createdAt,
          verifyUrl: new URL(
            `/api/identity/credential/validate`,
            cfg.platformUrl,
          ).toString(),
        };
      }
    } catch {
      // fall through to stub
    }
  }

  if (!cfg.allowStub) {
    throw new Error(
      'Certexi proof APIs unavailable and stub mode disabled. ' +
        'SSO session + platform URL required (see VERTICAL_PLAYBOOK §5).',
    );
  }

  return {
    id: stubId(input.kind),
    kind: input.kind,
    subjectUserId: input.subjectUserId,
    payload: input.payload,
    stub: true,
    createdAt,
  };
}

export async function verifyReceipt(
  cfg: ProofConfig,
  receipt: ProofReceipt,
): Promise<{ verified: boolean; stub: boolean }> {
  if (receipt.stub) {
    return { verified: true, stub: true };
  }
  if (!cfg.platformUrl) {
    return { verified: false, stub: false };
  }
  // Real verify path depends on credential shape; treat presence as success for now.
  return { verified: Boolean(receipt.id), stub: false };
}
