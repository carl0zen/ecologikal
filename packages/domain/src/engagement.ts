/** Amplificate / Broadcast — not like / share. */

export type PostType = 'idea' | 'article' | 'place' | 'need' | 'image' | 'video';

export interface KnowledgePost {
  id: string;
  type: 'idea' | 'article';
  title: string;
  body: string;
  petalId: number;
  authorId: string;
  featured?: boolean;
  createdAt: string;
}

export interface Amplification {
  postId: string;
  userId: string;
  createdAt: string;
}

export interface Broadcast {
  postId: string;
  userId: string;
  createdAt: string;
}
