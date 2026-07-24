import { NextResponse } from 'next/server';
import { getSession } from '@/lib/auth';
import { uid, withStore } from '@/lib/store';

export async function POST(req: Request) {
  const session = await getSession();
  if (!session) {
    return NextResponse.json({ error: 'unauthorized' }, { status: 401 });
  }

  const body = (await req.json()) as {
    postId?: string;
    action?: 'amplificate' | 'broadcast';
  };

  if (!body.postId || !body.action) {
    return NextResponse.json({ error: 'invalid_body' }, { status: 400 });
  }

  await withStore((db) => {
    const post = db.posts.find((p) => p.id === body.postId);
    if (!post) throw new Error('post_not_found');
    const row = {
      postId: body.postId!,
      userId: session.username,
      createdAt: new Date().toISOString(),
    };
    if (body.action === 'amplificate') {
      db.amplifications.push(row);
    } else {
      db.broadcasts.push(row);
    }
  });

  return NextResponse.json({ ok: true, id: uid('eng') });
}
