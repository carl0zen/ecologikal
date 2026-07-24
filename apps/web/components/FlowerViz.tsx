import { PETALS, type FlowerSnapshot } from '@ecologikal/domain';

export function FlowerViz({ snapshot }: { snapshot: FlowerSnapshot }) {
  return (
    <div>
      <p className="muted">
        Flor general:{' '}
        <strong style={{ color: 'var(--ink)' }}>
          {snapshot.overall.toFixed(2)}
        </strong>{' '}
        / 5
      </p>
      <div className="flower" aria-label="Skill flower">
        {PETALS.map((petal) => {
          const grade =
            snapshot.petals.find((p) => p.petalId === petal.id)?.grade ?? 0;
          const pct = Math.min(100, (grade / 5) * 100);
          return (
            <div className="petal-bar" key={petal.id}>
              <div className="bar">
                <div
                  className="fill"
                  style={{
                    height: `${pct}%`,
                    background: petal.color,
                  }}
                />
              </div>
              <small>
                {petal.id}. {petal.nameEs}
              </small>
            </div>
          );
        })}
      </div>
    </div>
  );
}
