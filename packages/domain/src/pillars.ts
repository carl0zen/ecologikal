export type PillarId =
  | 'play'
  | 'travel'
  | 'discover'
  | 'learn'
  | 'meet'
  | 'cooperate';

export interface Pillar {
  id: PillarId;
  labelEs: string;
  labelEn: string;
  href: string;
}

export const PILLARS: readonly Pillar[] = [
  { id: 'play', labelEs: 'Juega', labelEn: 'Play', href: '/play' },
  { id: 'travel', labelEs: 'Viaja', labelEn: 'Travel', href: '/travel' },
  {
    id: 'discover',
    labelEs: 'Descubre',
    labelEn: 'Discover',
    href: '/discover',
  },
  { id: 'learn', labelEs: 'Aprende', labelEn: 'Learn', href: '/learn' },
  { id: 'meet', labelEs: 'Conoce', labelEn: 'Meet', href: '/meet' },
  {
    id: 'cooperate',
    labelEs: 'Coopera',
    labelEn: 'Cooperate',
    href: '/cooperate',
  },
] as const;
