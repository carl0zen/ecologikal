import { redirect } from 'next/navigation';
import { getSession } from '@/lib/auth';
import { readStore } from '@/lib/store';
import {
  CreateAccountForm,
  AddReferenceForm,
  CreateCenterForm,
  CreateVacancyForm,
  CreateWorkshopForm,
  CompleteVolunteerForm,
  SeedDemoButton,
} from '@/components/ClientForms';

export default async function AdminPage() {
  const session = await getSession();
  if (!session) redirect('/login');
  if (session.accountClass === 'guest') {
    return (
      <main className="card">
        <h1>Admin</h1>
        <p className="muted">
          Solo hosts/admins provisionan cuentas y atestan. Entra como host en
          demo login.
        </p>
      </main>
    );
  }

  const db = await readStore();
  const otherSkills = db.skills.filter((s) => s.userId !== session.username);
  const guests = db.profiles.filter((p) => p.accountClass === 'guest');

  return (
    <main className="stack">
      <section className="card">
        <h1>Host / Admin console</h1>
        <p className="muted">
          Crea cuentas en Eco Nextcloud (`eco-hosts` / `eco-guests`) y gestiona
          el vertical. Dual-stack: vintage PHP sigue en el gateway.
        </p>
        <SeedDemoButton />
      </section>

      <section className="grid">
        <div className="card">
          <h2>Crear host / guest</h2>
          <CreateAccountForm />
        </div>
        <div className="card">
          <h2>Crear ecocentro</h2>
          <CreateCenterForm />
        </div>
        <div className="card">
          <h2>Publicar vacante</h2>
          <CreateVacancyForm
            centers={db.centers.map((c) => ({ id: c.id, name: c.name }))}
          />
        </div>
        <div className="card">
          <h2>Publicar taller</h2>
          <CreateWorkshopForm
            centers={db.centers.map((c) => ({ id: c.id, name: c.name }))}
          />
        </div>
        <div className="card">
          <h2>Atestar skill (proof)</h2>
          <AddReferenceForm skills={otherSkills} />
        </div>
        <div className="card">
          <h2>Completar voluntariado (proof)</h2>
          <CompleteVolunteerForm
            vacancies={db.vacancies.map((v) => ({
              id: v.id,
              title: v.title,
            }))}
            guests={guests}
          />
        </div>
      </section>

      <section className="card">
        <h2>Perfiles locales</h2>
        <ul>
          {db.profiles.map((p) => (
            <li key={p.userId}>
              {p.displayName} · <span className="badge">{p.accountClass}</span>
            </li>
          ))}
        </ul>
      </section>
    </main>
  );
}
