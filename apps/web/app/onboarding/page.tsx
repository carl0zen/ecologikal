import { redirect } from 'next/navigation';
import { getSession } from '@/lib/auth';
import { readStore } from '@/lib/store';
import { needsOnboarding, postAuthPath } from '@/lib/onboarding';
import { OnboardingWizard } from '@/components/onboarding/OnboardingWizard';

export default async function OnboardingPage() {
  const session = await getSession();
  if (!session) redirect('/login');

  const db = await readStore();
  const profile = db.profiles.find((p) => p.userId === session.username);
  const skillCount = db.skills.filter(
    (s) => s.userId === session.username,
  ).length;

  if (!needsOnboarding(profile, skillCount)) {
    redirect(postAuthPath(profile, skillCount));
  }

  return (
    <main>
      <OnboardingWizard
        username={session.username}
        initialDisplayName={profile?.displayName || session.username}
        initialBio={profile?.bio ?? ''}
      />
    </main>
  );
}
