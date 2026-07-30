import { isPetalId, type PetalId } from '@ecologikal/domain';
import { getSession } from '@/lib/auth';
import { readStore } from '@/lib/store';
import { MeetDirectory } from '@/components/MeetDirectory';

type Props = {
  searchParams: Promise<{ petal?: string; from?: string }>;
};

export default async function MeetPage({ searchParams }: Props) {
  const session = await getSession();
  const q = await searchParams;
  const petalNum = Number(q.petal);
  const initialPetal: PetalId | null = isPetalId(petalNum) ? petalNum : null;
  const fromOnboarding = q.from === 'onboarding';

  const db = await readStore();
  const guests = db.profiles
    .filter((p) => p.accountClass !== 'admin')
    .map((p) => ({
      userId: p.userId,
      displayName: p.displayName,
      accountClass: p.accountClass,
      skills: db.skills.filter((s) => s.userId === p.userId),
      refs: db.skillReferences.filter((r) => r.toUserId === p.userId),
    }));

  return (
    <main>
      <MeetDirectory
        guests={guests}
        sessionUserId={session?.username ?? null}
        initialPetal={initialPetal}
        fromOnboarding={fromOnboarding}
      />
    </main>
  );
}
