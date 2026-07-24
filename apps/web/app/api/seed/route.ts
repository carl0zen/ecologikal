import { NextResponse } from 'next/server';
import { getSession } from '@/lib/auth';
import { flag } from '@/lib/env';
import { uid, withStore } from '@/lib/store';

/** Demo seed for dual-stack walkthrough. Dev / stub mode only. */
export async function POST() {
  if (!flag('ECO_ALLOW_DEV_LOGIN') && !flag('ECO_ALLOW_PROOF_STUB')) {
    return NextResponse.json({ error: 'forbidden' }, { status: 403 });
  }
  const session = await getSession();
  const hostId = session?.accountClass !== 'guest' ? session?.username : 'host1';
  const guestId = 'guest1';
  const now = new Date().toISOString();

  const result = await withStore((db) => {
    for (const p of [
      {
        userId: hostId || 'host1',
        displayName: hostId || 'host1',
        accountClass: 'host' as const,
      },
      {
        userId: guestId,
        displayName: 'Guest Uno',
        accountClass: 'guest' as const,
      },
    ]) {
      if (!db.profiles.find((x) => x.userId === p.userId)) {
        db.profiles.push({ ...p, createdAt: now });
      }
    }

    let center = db.centers[0];
    if (!center) {
      center = {
        id: uid('center'),
        name: 'Ecoaldea Aurora',
        slug: 'aurora',
        hostUserId: hostId || 'host1',
        summary: 'Centro regenerativo de demostración.',
        type: 'ecovillage',
        status: 'forming',
        createdAt: now,
      };
      db.centers.push(center);
    }

    if (db.vacancies.length === 0) {
      db.vacancies.push({
        id: uid('vac'),
        centerId: center.id,
        title: 'Huerta comunitaria',
        petalId: 4,
        recompenseKins: 10,
        createdAt: now,
      });
    }

    if (db.workshops.length === 0) {
      db.workshops.push({
        id: uid('ws'),
        centerId: center.id,
        title: 'Intro a permacultura',
        petalId: 4,
        costKins: 15,
        createdAt: now,
      });
    }

    if (db.places.length === 0) {
      const place = {
        id: uid('place'),
        name: 'Río Sabinas',
        summary: 'Ecozona a proteger — demo.',
        lat: 25.68,
        lng: -100.31,
        founderUserId: guestId,
        createdAt: now,
      };
      db.places.push(place);
      db.needs.push({
        id: uid('need'),
        title: 'Limpieza de ribera',
        summary: 'Necesidad ecosocial demo.',
        placeId: place.id,
        petalId: 4,
        founderUserId: guestId,
        kinsGoal: 50,
        createdAt: now,
      });
    }

    if (db.posts.length === 0) {
      db.posts.push({
        id: uid('post'),
        type: 'idea',
        title: 'Compost comunitario',
        body: 'Idea demo para hubs de compostaje.',
        petalId: 4,
        authorId: guestId,
        createdAt: now,
      });
    }

    if (!db.skills.find((s) => s.userId === guestId)) {
      db.skills.push({
        id: uid('skill'),
        userId: guestId,
        petalId: 4,
        name: 'Permacultura',
        level: 3,
        createdAt: now,
      });
    }

    return {
      centers: db.centers.length,
      places: db.places.length,
      vacancies: db.vacancies.length,
      workshops: db.workshops.length,
      posts: db.posts.length,
    };
  });

  return NextResponse.json({ ok: true, ...result });
}
