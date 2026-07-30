import type { Profile } from '@/lib/store';

/**
 * Guest econauta path: wizard until onboarded with at least one skill.
 * Hosts and admins always skip.
 */
export function needsOnboarding(
  profile: Pick<Profile, 'accountClass' | 'onboardedAt'> | null | undefined,
  skillCount: number,
): boolean {
  if (!profile) return true;
  if (profile.accountClass !== 'guest') return false;
  return !profile.onboardedAt || skillCount === 0;
}

/** Post-auth destination after session is established. */
export function postAuthPath(
  profile: Pick<Profile, 'accountClass' | 'onboardedAt'> | null | undefined,
  skillCount: number,
): '/onboarding' | '/admin' | '/profile' {
  if (needsOnboarding(profile, skillCount)) return '/onboarding';
  if (profile?.accountClass === 'host' || profile?.accountClass === 'admin') {
    return '/admin';
  }
  return '/profile';
}
