/** Participation = role rows, not boolean flags. */

export type AccountClass = 'admin' | 'host' | 'guest';

export type CenterRole =
  | 'admin'
  | 'settler'
  | 'follower'
  | 'visitor'
  | 'ecotraveler'
  | 'volunteer';

export const NC_GROUPS = {
  admin: 'eco-admins',
  host: 'eco-hosts',
  guest: 'eco-guests',
} as const;

export interface CenterMembership {
  centerId: string;
  userId: string;
  role: CenterRole;
}
