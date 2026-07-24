/** Canonical 7-petal taxonomy (GEN-adjacent). IDs are stable forever. */

export type PetalId = 1 | 2 | 3 | 4 | 5 | 6 | 7;

export interface Petal {
  id: PetalId;
  name: string;
  nameEs: string;
  cssClass: string;
  color: string;
}

export const PETALS: readonly Petal[] = [
  {
    id: 1,
    name: 'Building',
    nameEs: 'Construcción',
    cssClass: 'petal-building',
    color: '#c4a35a',
  },
  {
    id: 2,
    name: 'Community Gov',
    nameEs: 'Gobierno comunitario',
    cssClass: 'petal-community',
    color: '#d45d79',
  },
  {
    id: 3,
    name: 'Finance & Economics',
    nameEs: 'Finanzas & Economía',
    cssClass: 'petal-finance',
    color: '#2a9d8f',
  },
  {
    id: 4,
    name: 'Land & Nature',
    nameEs: 'Tierra & Naturaleza',
    cssClass: 'petal-land',
    color: '#3a7d44',
  },
  {
    id: 5,
    name: 'Culture & Education',
    nameEs: 'Cultura & Educación',
    cssClass: 'petal-culture',
    color: '#3d5a80',
  },
  {
    id: 6,
    name: 'Tools & Technology',
    nameEs: 'Herramientas & Tecnología',
    cssClass: 'petal-tools',
    color: '#6c63ff',
  },
  {
    id: 7,
    name: 'Health & Spirituality',
    nameEs: 'Salud & Espiritualidad',
    cssClass: 'petal-health',
    color: '#e76f51',
  },
] as const;

export function getPetal(id: PetalId): Petal {
  const petal = PETALS.find((p) => p.id === id);
  if (!petal) {
    throw new Error(`Unknown petal id: ${id}`);
  }
  return petal;
}

export function isPetalId(value: number): value is PetalId {
  return Number.isInteger(value) && value >= 1 && value <= 7;
}
