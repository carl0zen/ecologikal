import type { Metadata } from 'next';
import { JetBrains_Mono, Petrona, Source_Sans_3 } from 'next/font/google';
import './globals.css';
import { Nav } from '@/components/Nav';

const petrona = Petrona({
  subsets: ['latin', 'latin-ext'],
  variable: '--font-petrona',
  display: 'swap',
});

const sourceSans = Source_Sans_3({
  subsets: ['latin', 'latin-ext'],
  variable: '--font-source',
  display: 'swap',
});

const jetbrains = JetBrains_Mono({
  subsets: ['latin', 'latin-ext'],
  variable: '--font-jetbrains',
  display: 'swap',
});

export const metadata: Metadata = {
  title: 'Ecologikal',
  description:
    'Red regenerativa — flor de habilidades, KINS, eco-centros. Plataforma de Agroabundanza Institute · Certexi OS reference vertical.',
};

/* Applies the stored theme before first paint; system preference otherwise. */
const themeInit = `try{var t=localStorage.getItem('eco-theme');if(t==='dark'||t==='light')document.documentElement.dataset.theme=t}catch(e){}`;

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html
      lang="es"
      className={`${petrona.variable} ${sourceSans.variable} ${jetbrains.variable}`}
      suppressHydrationWarning
    >
      <head>
        <script dangerouslySetInnerHTML={{ __html: themeInit }} />
      </head>
      <body>
        <div className="shell">
          <Nav />
          {children}
        </div>
      </body>
    </html>
  );
}
