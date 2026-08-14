import type { ComponentType } from 'react';
import type { PillarId } from '@ecologikal/domain';
import {
  BookOpen,
  Compass,
  GameController,
  Handshake,
  AirplaneTilt,
  UsersThree,
} from '@phosphor-icons/react/ssr';

type PillarIcon = ComponentType<{
  size?: number;
  weight?: 'bold';
  'aria-hidden'?: boolean;
}>;

/** Shared pillar → Phosphor map (Nav + brand specimen). */
export const PILLAR_ICONS: Record<PillarId, PillarIcon> = {
  play: GameController,
  travel: AirplaneTilt,
  discover: Compass,
  learn: BookOpen,
  meet: UsersThree,
  cooperate: Handshake,
};
