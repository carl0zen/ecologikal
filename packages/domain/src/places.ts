import type { PetalId } from './petals';

/** Ecozona (place) + ecosocial need — Discover pillar. */

export interface Place {
  id: string;
  name: string;
  summary?: string;
  lat?: number;
  lng?: number;
  founderUserId: string;
  createdAt: string;
}

export interface Need {
  id: string;
  title: string;
  summary?: string;
  placeId?: string;
  petalId: PetalId;
  founderUserId: string;
  kinsGoal?: number;
  createdAt: string;
}
