export type KinsEntryType =
  | 'skill'
  | 'reference'
  | 'volunteer'
  | 'workshop_spend'
  | 'booking_spend'
  | 'purchase'
  | 'adjust';

export interface KinsEntry {
  id: string;
  userId: string;
  type: KinsEntryType;
  delta: number;
  note?: string;
  relatedId?: string;
  createdAt: string;
}

/** Vintage-inspired earn amounts. */
export const KINS_DELTA: Record<string, number> = {
  skill: 3,
  reference: 3,
  volunteer: 10,
  workshop_spend: -15,
  booking_spend: -25,
  purchase: 0,
  adjust: 0,
};

export function balanceFor(entries: KinsEntry[], userId: string): number {
  return entries
    .filter((e) => e.userId === userId)
    .reduce((sum, e) => sum + e.delta, 0);
}

export function earnDelta(type: KinsEntryType): number {
  return KINS_DELTA[type] ?? 0;
}
