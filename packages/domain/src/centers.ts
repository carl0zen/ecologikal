import type { PetalId } from './petals';
import type { CenterRole } from './roles';

export interface EcoCenter {
  id: string;
  slug: string;
  name: string;
  hostUserId: string;
  summary?: string;
  type?: 'urban' | 'rural' | 'ecovillage' | 'hostel' | 'hotel';
  status?: 'planning' | 'forming' | 'formed';
  createdAt: string;
}

export interface Vacancy {
  id: string;
  centerId: string;
  title: string;
  petalId: PetalId;
  recompenseKins?: number;
  createdAt: string;
}

export interface Workshop {
  id: string;
  centerId: string;
  title: string;
  petalId: PetalId;
  costKins?: number;
  createdAt: string;
}

export interface VolunteerCompletion {
  id: string;
  vacancyId: string;
  guestUserId: string;
  hostUserId: string;
  proofId?: string;
  verified: boolean;
  createdAt: string;
}

export type { CenterRole };
