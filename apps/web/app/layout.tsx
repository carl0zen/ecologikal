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
    'Red regenerativa — flor de habilidades, KINS, eco-centros. Certexi OS reference vertical.',
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html
      lang="es"
      className={`${petrona.variable} ${sourceSans.variable} ${jetbrains.variable}`}
    >
      <body>
        <div className="shell">
          <Nav />
          {children}
        </div>
      </body>
    </html>
  );
}
