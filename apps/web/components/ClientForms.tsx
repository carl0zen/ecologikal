'use client';

import { useRouter } from 'next/navigation';
import { useState } from 'react';
import { PETALS } from '@ecologikal/domain';

async function postJson(url: string, body: unknown) {
  const res = await fetch(url, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(body),
  });
  const data = await res.json().catch(() => ({}));
  if (!res.ok) {
    throw new Error(data.error || res.statusText);
  }
  return data;
}

export function CreateAccountForm() {
  const router = useRouter();
  const [error, setError] = useState<string | null>(null);
  const [ok, setOk] = useState<string | null>(null);

  return (
    <form
      className="stack"
      onSubmit={async (e) => {
        e.preventDefault();
        setError(null);
        setOk(null);
        const fd = new FormData(e.currentTarget);
        try {
          const data = await postJson('/api/admin/accounts', {
            userid: fd.get('userid'),
            password: fd.get('password'),
            displayName: fd.get('displayName'),
            accountClass: fd.get('accountClass'),
          });
          setOk(
            data.warning
              ? `Perfil local OK. NC: ${data.warning}`
              : `Creado en grupo ${data.nextcloud?.group}`,
          );
          router.refresh();
        } catch (err) {
          setError(err instanceof Error ? err.message : 'error');
        }
      }}
    >
      <label>
        userid
        <input name="userid" required placeholder="host_aurora" />
      </label>
      <label>
        password
        <input name="password" type="password" required />
      </label>
      <label>
        display name
        <input name="displayName" />
      </label>
      <label>
        class
        <select name="accountClass" defaultValue="host">
          <option value="host">host</option>
          <option value="guest">guest</option>
          <option value="admin">admin</option>
        </select>
      </label>
      <button className="btn" type="submit">
        Crear cuenta
      </button>
      {error ? <p className="muted">{error}</p> : null}
      {ok ? <p className="badge verified">{ok}</p> : null}
    </form>
  );
}

export function AddSkillForm() {
  const router = useRouter();
  return (
    <form
      className="stack"
      onSubmit={async (e) => {
        e.preventDefault();
        const fd = new FormData(e.currentTarget);
        await postJson('/api/skills', {
          name: fd.get('name'),
          petalId: Number(fd.get('petalId')),
          level: Number(fd.get('level')),
        });
        e.currentTarget.reset();
        router.refresh();
      }}
    >
      <label>
        Skill
        <input name="name" required placeholder="Permacultura" />
      </label>
      <label>
        Pétalo
        <select name="petalId" defaultValue="4">
          {PETALS.map((p) => (
            <option key={p.id} value={p.id}>
              {p.id}. {p.nameEs}
            </option>
          ))}
        </select>
      </label>
      <label>
        Nivel (1–5)
        <input name="level" type="number" min={1} max={5} defaultValue={3} />
      </label>
      <button className="btn" type="submit">
        Declarar skill (+3 KINS)
      </button>
    </form>
  );
}

export function AddReferenceForm({
  skills,
  toUserId,
}: {
  skills: Array<{ id: string; name: string; userId: string }>;
  /** When set, all skills belong to this user (public profile). */
  toUserId?: string;
}) {
  const router = useRouter();
  const [msg, setMsg] = useState<string | null>(null);
  const [error, setError] = useState<string | null>(null);

  if (skills.length === 0) {
    return <p className="muted">No hay skills para atestar.</p>;
  }

  return (
    <form
      className="stack"
      onSubmit={async (e) => {
        e.preventDefault();
        setError(null);
        setMsg(null);
        const fd = new FormData(e.currentTarget);
        const skillId = String(fd.get('skillId'));
        const skill = skills.find((s) => s.id === skillId);
        try {
          const data = await postJson('/api/references', {
            skillId,
            toUserId: toUserId ?? skill?.userId,
            grade: Number(fd.get('grade')),
            note: fd.get('note'),
          });
          setMsg(
            data.proof?.stub
              ? `Atestado (proof stub ${data.proof.id})`
              : `Atestado verificado ${data.proof?.id}`,
          );
          router.refresh();
        } catch (err) {
          setError(err instanceof Error ? err.message : 'error');
        }
      }}
    >
      <label>
        Skill
        <select name="skillId">
          {skills.map((s) => (
            <option key={s.id} value={s.id}>
              {toUserId ? s.name : `${s.name} (${s.userId})`}
            </option>
          ))}
        </select>
      </label>
      <label>
        Grado
        <input name="grade" type="number" min={1} max={5} defaultValue={4} />
      </label>
      <label>
        Nota
        <input name="note" placeholder="Trabajó en el taller de cob" />
      </label>
      <button className="btn" type="submit">
        Atestar (+ proof Certexi)
      </button>
      {msg ? <p className="badge verified">{msg}</p> : null}
      {error ? <p className="muted">{error}</p> : null}
    </form>
  );
}

export function CreateCenterForm() {
  const router = useRouter();
  return (
    <form
      className="stack"
      onSubmit={async (e) => {
        e.preventDefault();
        const fd = new FormData(e.currentTarget);
        await postJson('/api/centers', {
          name: fd.get('name'),
          slug: fd.get('slug'),
          summary: fd.get('summary'),
          type: fd.get('type'),
        });
        e.currentTarget.reset();
        router.refresh();
      }}
    >
      <label>
        Nombre
        <input name="name" required placeholder="Ecoaldea Aurora" />
      </label>
      <label>
        Slug
        <input name="slug" required placeholder="aurora" />
      </label>
      <label>
        Tipo
        <select name="type" defaultValue="ecovillage">
          <option value="ecovillage">ecovillage</option>
          <option value="hostel">hostel</option>
          <option value="hotel">hotel</option>
          <option value="rural">rural</option>
          <option value="urban">urban</option>
        </select>
      </label>
      <label>
        Resumen
        <textarea name="summary" rows={3} />
      </label>
      <button className="btn" type="submit">
        Crear ecocentro
      </button>
    </form>
  );
}

export function CreateVacancyForm({
  centers,
}: {
  centers: Array<{ id: string; name: string }>;
}) {
  const router = useRouter();
  if (centers.length === 0) {
    return <p className="muted">Crea un ecocentro primero.</p>;
  }
  return (
    <form
      className="stack"
      onSubmit={async (e) => {
        e.preventDefault();
        const fd = new FormData(e.currentTarget);
        await postJson('/api/vacancies', {
          centerId: fd.get('centerId'),
          title: fd.get('title'),
          petalId: Number(fd.get('petalId')),
          recompenseKins: Number(fd.get('recompenseKins')),
        });
        e.currentTarget.reset();
        router.refresh();
      }}
    >
      <label>
        Centro
        <select name="centerId">
          {centers.map((c) => (
            <option key={c.id} value={c.id}>
              {c.name}
            </option>
          ))}
        </select>
      </label>
      <label>
        Vacante
        <input name="title" required placeholder="Huerta comunitaria" />
      </label>
      <label>
        Pétalo
        <select name="petalId" defaultValue="4">
          {PETALS.map((p) => (
            <option key={p.id} value={p.id}>
              {p.nameEs}
            </option>
          ))}
        </select>
      </label>
      <label>
        Recompensa KINS
        <input name="recompenseKins" type="number" defaultValue={10} />
      </label>
      <button className="btn" type="submit">
        Publicar vacante
      </button>
    </form>
  );
}

export function CompleteVolunteerForm({
  vacancies,
  guests,
}: {
  vacancies: Array<{ id: string; title: string }>;
  guests: Array<{ userId: string; displayName: string }>;
}) {
  const router = useRouter();
  const [msg, setMsg] = useState<string | null>(null);

  if (vacancies.length === 0 || guests.length === 0) {
    return (
      <p className="muted">
        Necesitas vacantes y perfiles guest para atestar cooperación.
      </p>
    );
  }

  return (
    <form
      className="stack"
      onSubmit={async (e) => {
        e.preventDefault();
        const fd = new FormData(e.currentTarget);
        const data = await postJson('/api/volunteer/complete', {
          vacancyId: fd.get('vacancyId'),
          guestUserId: fd.get('guestUserId'),
        });
        setMsg(
          `Completado · proof ${data.proof?.id}${
            data.proof?.stub ? ' (stub)' : ''
          }`,
        );
        router.refresh();
      }}
    >
      <label>
        Vacante
        <select name="vacancyId">
          {vacancies.map((v) => (
            <option key={v.id} value={v.id}>
              {v.title}
            </option>
          ))}
        </select>
      </label>
      <label>
        Guest
        <select name="guestUserId">
          {guests.map((g) => (
            <option key={g.userId} value={g.userId}>
              {g.displayName}
            </option>
          ))}
        </select>
      </label>
      <button className="btn" type="submit">
        Atestar voluntariado (+ KINS + proof)
      </button>
      {msg ? <p className="badge verified">{msg}</p> : null}
    </form>
  );
}

export function SeedDemoButton() {
  const router = useRouter();
  const [msg, setMsg] = useState<string | null>(null);
  return (
    <button
      className="btn secondary"
      type="button"
      onClick={async () => {
        const data = await postJson('/api/seed', {});
        setMsg(
          `Seed OK · centers ${data.centers} · places ${data.places} · workshops ${data.workshops}`,
        );
        router.refresh();
      }}
    >
      Cargar datos demo
      {msg ? <span className="badge verified">{msg}</span> : null}
    </button>
  );
}

export function CreatePlaceNeedForm({
  places,
}: {
  places: Array<{ id: string; name: string }>;
}) {
  const router = useRouter();
  return (
    <form
      className="stack"
      onSubmit={async (e) => {
        e.preventDefault();
        const fd = new FormData(e.currentTarget);
        const kind = String(fd.get('kind'));
        if (kind === 'need') {
          await postJson('/api/places', {
            kind: 'need',
            title: fd.get('title'),
            summary: fd.get('summary'),
            placeId: fd.get('placeId') || undefined,
            petalId: Number(fd.get('petalId')),
            kinsGoal: Number(fd.get('kinsGoal') || 0) || undefined,
          });
        } else {
          await postJson('/api/places', {
            kind: 'place',
            name: fd.get('name'),
            summary: fd.get('summary'),
          });
        }
        e.currentTarget.reset();
        router.refresh();
      }}
    >
      <label>
        Tipo
        <select name="kind" defaultValue="place">
          <option value="place">Ecozona (lugar)</option>
          <option value="need">Necesidad</option>
        </select>
      </label>
      <label>
        Nombre / título
        <input name="name" placeholder="Río Sabinas" />
        <input name="title" placeholder="Limpieza de ribera" />
      </label>
      <label>
        Resumen
        <textarea name="summary" rows={2} />
      </label>
      <label>
        Lugar (para necesidad)
        <select name="placeId">
          <option value="">—</option>
          {places.map((p) => (
            <option key={p.id} value={p.id}>
              {p.name}
            </option>
          ))}
        </select>
      </label>
      <label>
        Pétalo (necesidad)
        <select name="petalId" defaultValue="4">
          {PETALS.map((p) => (
            <option key={p.id} value={p.id}>
              {p.nameEs}
            </option>
          ))}
        </select>
      </label>
      <label>
        Meta KINS
        <input name="kinsGoal" type="number" defaultValue={50} />
      </label>
      <button className="btn" type="submit">
        Publicar en Descubre
      </button>
    </form>
  );
}

export function CreateWorkshopForm({
  centers,
}: {
  centers: Array<{ id: string; name: string }>;
}) {
  const router = useRouter();
  if (centers.length === 0) {
    return <p className="muted">Crea un ecocentro primero.</p>;
  }
  return (
    <form
      className="stack"
      onSubmit={async (e) => {
        e.preventDefault();
        const fd = new FormData(e.currentTarget);
        await postJson('/api/workshops', {
          action: 'create',
          centerId: fd.get('centerId'),
          title: fd.get('title'),
          petalId: Number(fd.get('petalId')),
          costKins: Number(fd.get('costKins')),
        });
        e.currentTarget.reset();
        router.refresh();
      }}
    >
      <label>
        Centro
        <select name="centerId">
          {centers.map((c) => (
            <option key={c.id} value={c.id}>
              {c.name}
            </option>
          ))}
        </select>
      </label>
      <label>
        Taller
        <input name="title" required placeholder="Intro a cob" />
      </label>
      <label>
        Pétalo
        <select name="petalId" defaultValue="1">
          {PETALS.map((p) => (
            <option key={p.id} value={p.id}>
              {p.nameEs}
            </option>
          ))}
        </select>
      </label>
      <label>
        Costo KINS
        <input name="costKins" type="number" defaultValue={15} />
      </label>
      <button className="btn" type="submit">
        Publicar taller
      </button>
    </form>
  );
}

export function SpendWorkshopButton({ workshopId }: { workshopId: string }) {
  const router = useRouter();
  return (
    <button
      className="btn secondary"
      type="button"
      onClick={async () => {
        await postJson('/api/workshops', {
          action: 'spend',
          workshopId,
        });
        router.refresh();
      }}
    >
      Reservar con KINS
    </button>
  );
}

export function EngageButtons({ postId }: { postId: string }) {
  const router = useRouter();
  return (
    <div className="row">
      <button
        className="btn secondary"
        type="button"
        onClick={async () => {
          await postJson('/api/engagement', {
            postId,
            action: 'amplificate',
          });
          router.refresh();
        }}
      >
        Amplificate
      </button>
      <button
        className="btn secondary"
        type="button"
        onClick={async () => {
          await postJson('/api/engagement', {
            postId,
            action: 'broadcast',
          });
          router.refresh();
        }}
      >
        Broadcast
      </button>
    </div>
  );
}
