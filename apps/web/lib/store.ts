/**
 * Local JSON store mirroring Eco NC Tables shapes.
 * Swap implementation for Nextcloud Tables without changing domain types.
 */

import { promises as fs } from 'node:fs';
import path from 'node:path';
import type {
  EcoCenter,
  KnowledgePost,
  KinsEntry,
  Need,
  Place,
  Skill,
  SkillReference,
  Vacancy,
  VolunteerCompletion,
  Workshop,
  Amplification,
  Broadcast,
} from '@ecologikal/domain';

export interface Profile {
  userId: string;
  displayName: string;
  accountClass: 'admin' | 'host' | 'guest';
  bio?: string;
  createdAt: string;
}

export interface ProofReceiptRow {
  id: string;
  kind: string;
  subjectUserId: string;
  relatedId?: string;
  stub: boolean;
  payload: Record<string, unknown>;
  createdAt: string;
}

interface DbShape {
  profiles: Profile[];
  skills: Skill[];
  skillReferences: SkillReference[];
  centers: EcoCenter[];
  vacancies: Vacancy[];
  workshops: Workshop[];
  volunteerCompletions: VolunteerCompletion[];
  places: Place[];
  needs: Need[];
  posts: KnowledgePost[];
  amplifications: Amplification[];
  broadcasts: Broadcast[];
  kins: KinsEntry[];
  proofs: ProofReceiptRow[];
}

const emptyDb = (): DbShape => ({
  profiles: [],
  skills: [],
  skillReferences: [],
  centers: [],
  vacancies: [],
  workshops: [],
  volunteerCompletions: [],
  places: [],
  needs: [],
  posts: [],
  amplifications: [],
  broadcasts: [],
  kins: [],
  proofs: [],
});

function dataPath(): string {
  return path.join(process.cwd(), '.data', 'eco-store.json');
}

async function readDb(): Promise<DbShape> {
  try {
    const raw = await fs.readFile(dataPath(), 'utf8');
    return { ...emptyDb(), ...JSON.parse(raw) } as DbShape;
  } catch {
    return emptyDb();
  }
}

async function writeDb(db: DbShape): Promise<void> {
  const dir = path.dirname(dataPath());
  await fs.mkdir(dir, { recursive: true });
  await fs.writeFile(dataPath(), JSON.stringify(db, null, 2), 'utf8');
}

export async function withStore<T>(
  fn: (db: DbShape) => T | Promise<T>,
): Promise<T> {
  const db = await readDb();
  const result = await fn(db);
  await writeDb(db);
  return result;
}

export async function readStore(): Promise<DbShape> {
  return readDb();
}

export function uid(prefix: string): string {
  return `${prefix}_${Date.now().toString(36)}_${Math.random()
    .toString(36)
    .slice(2, 8)}`;
}
