'use client';

import { useEffect, useRef } from 'react';

/**
 * Live shader sky for the landing hero. Raw WebGL1 (no dependency): a slow
 * atmospheric gradient with drifting fbm haze and a breathing sun, colored at
 * runtime from the theme tokens so dark/light both render correctly.
 *
 * Craft constraints (emil-design-eng):
 * - GPU-only work; DPR capped at 1.5; loop pauses when the hero leaves the
 *   viewport (IntersectionObserver) and when the tab is hidden (rAF).
 * - prefers-reduced-motion: a single still frame, redrawn only on theme change.
 * - If WebGL is unavailable the canvas stays empty and the CSS-gradient sky
 *   behind it (on .cine-hero) carries the scene — no JS fallback needed.
 */

const FRAG = `
precision mediump float;
uniform vec2 u_res;
uniform float u_t;
uniform vec3 u_skyHi;
uniform vec3 u_skyLo;
uniform vec3 u_sun;
uniform vec3 u_haze;

float hash(vec2 p) {
  return fract(sin(dot(p, vec2(127.1, 311.7))) * 43758.5453123);
}

float noise(vec2 p) {
  vec2 i = floor(p);
  vec2 f = fract(p);
  vec2 u = f * f * (3.0 - 2.0 * f);
  return mix(
    mix(hash(i), hash(i + vec2(1.0, 0.0)), u.x),
    mix(hash(i + vec2(0.0, 1.0)), hash(i + vec2(1.0, 1.0)), u.x),
    u.y
  );
}

float fbm(vec2 p) {
  float v = 0.0;
  float a = 0.5;
  for (int i = 0; i < 4; i++) {
    v += a * noise(p);
    p = p * 2.03 + vec2(11.3, 7.9);
    a *= 0.5;
  }
  return v;
}

void main() {
  vec2 st = gl_FragCoord.xy / u_res; /* y up */
  float aspect = u_res.x / u_res.y;

  /* base sky: horizon glow rises into the upper sky */
  vec3 col = mix(u_skyLo, u_skyHi, smoothstep(0.15, 0.95, st.y));

  /* drifting haze, heavier near the horizon */
  float h = fbm(vec2(st.x * 3.0 + u_t * 0.016, st.y * 5.0 + u_t * 0.004));
  float band = smoothstep(0.75, 0.2, st.y);
  col = mix(col, u_haze, h * band * 0.35);

  /* thin high cloud drift */
  float c = fbm(vec2(st.x * 6.0 - u_t * 0.01, st.y * 14.0));
  col = mix(col, u_haze, smoothstep(0.55, 0.85, c) * (1.0 - band) * 0.12);

  /* sun — position matches the vector scene (72% across, 37% down) */
  vec2 sun = vec2(0.722, 0.628);
  vec2 d2 = st - sun;
  d2.x *= aspect;
  float d = length(d2);
  float breathe = 1.0 + 0.05 * sin(u_t * 0.25);
  float glow = exp(-d * 5.5) * 0.45 + exp(-d * 16.0) * 0.4;
  col += u_sun * glow * breathe;
  col = mix(col, u_sun, smoothstep(0.052, 0.046, d));

  /* dither to kill gradient banding */
  col += (hash(gl_FragCoord.xy) - 0.5) * (1.8 / 255.0);

  gl_FragColor = vec4(col, 1.0);
}
`;

const VERT = `
attribute vec2 a_pos;
void main() { gl_Position = vec4(a_pos, 0.0, 1.0); }
`;

/** Resolve a CSS color (incl. oklch) to 0..1 RGB via 2D-canvas readback. */
function makeColorResolver() {
  const c = document.createElement('canvas');
  c.width = c.height = 1;
  const ctx = c.getContext('2d', { willReadFrequently: true });
  return (color: string): [number, number, number] => {
    if (!ctx) return [0, 0, 0];
    ctx.fillStyle = '#000';
    ctx.fillStyle = color.trim();
    ctx.fillRect(0, 0, 1, 1);
    const d = ctx.getImageData(0, 0, 1, 1).data;
    return [d[0] / 255, d[1] / 255, d[2] / 255];
  };
}

export function ShaderSky() {
  const canvasRef = useRef<HTMLCanvasElement>(null);

  useEffect(() => {
    const canvas = canvasRef.current;
    if (!canvas) return;
    const gl = canvas.getContext('webgl', {
      alpha: false,
      antialias: false,
      powerPreference: 'low-power',
    });
    if (!gl) return; /* CSS sky behind us carries the scene */

    const compile = (type: number, src: string) => {
      const s = gl.createShader(type);
      if (!s) return null;
      gl.shaderSource(s, src);
      gl.compileShader(s);
      if (!gl.getShaderParameter(s, gl.COMPILE_STATUS)) {
        gl.deleteShader(s);
        return null;
      }
      return s;
    };

    const vs = compile(gl.VERTEX_SHADER, VERT);
    const fs = compile(gl.FRAGMENT_SHADER, FRAG);
    if (!vs || !fs) return;
    const prog = gl.createProgram();
    if (!prog) return;
    gl.attachShader(prog, vs);
    gl.attachShader(prog, fs);
    gl.linkProgram(prog);
    if (!gl.getProgramParameter(prog, gl.LINK_STATUS)) return;
    gl.useProgram(prog);

    const quad = gl.createBuffer();
    gl.bindBuffer(gl.ARRAY_BUFFER, quad);
    gl.bufferData(
      gl.ARRAY_BUFFER,
      new Float32Array([-1, -1, 3, -1, -1, 3]),
      gl.STATIC_DRAW,
    );
    const aPos = gl.getAttribLocation(prog, 'a_pos');
    gl.enableVertexAttribArray(aPos);
    gl.vertexAttribPointer(aPos, 2, gl.FLOAT, false, 0, 0);

    const uRes = gl.getUniformLocation(prog, 'u_res');
    const uT = gl.getUniformLocation(prog, 'u_t');
    const uSkyHi = gl.getUniformLocation(prog, 'u_skyHi');
    const uSkyLo = gl.getUniformLocation(prog, 'u_skyLo');
    const uSun = gl.getUniformLocation(prog, 'u_sun');
    const uHaze = gl.getUniformLocation(prog, 'u_haze');

    const resolve = makeColorResolver();
    const readTheme = () => {
      const cs = getComputedStyle(document.documentElement);
      gl.uniform3fv(uSkyHi, resolve(cs.getPropertyValue('--sky-hi')));
      gl.uniform3fv(uSkyLo, resolve(cs.getPropertyValue('--sky-lo')));
      gl.uniform3fv(uSun, resolve(cs.getPropertyValue('--sun')));
      gl.uniform3fv(uHaze, resolve(cs.getPropertyValue('--haze')));
    };
    readTheme();

    const dpr = Math.min(window.devicePixelRatio || 1, 1.5);
    const resize = () => {
      const w = Math.max(1, Math.round(canvas.clientWidth * dpr));
      const h = Math.max(1, Math.round(canvas.clientHeight * dpr));
      if (canvas.width !== w || canvas.height !== h) {
        canvas.width = w;
        canvas.height = h;
        gl.viewport(0, 0, w, h);
      }
      gl.uniform2f(uRes, canvas.width, canvas.height);
    };
    resize();

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
    const start = performance.now();
    let raf = 0;
    let visible = true;

    const draw = (t: number) => {
      gl.uniform1f(uT, t);
      gl.drawArrays(gl.TRIANGLES, 0, 3);
    };

    const loop = () => {
      draw((performance.now() - start) / 1000);
      raf = requestAnimationFrame(loop);
    };

    const still = () => {
      resize();
      draw(40); /* a pleasant fixed moment of drift */
    };

    const run = () => {
      cancelAnimationFrame(raf);
      if (reduced.matches) still();
      else if (visible) raf = requestAnimationFrame(loop);
    };
    run();

    const ro = new ResizeObserver(() => {
      resize();
      if (reduced.matches) still();
    });
    ro.observe(canvas);

    const io = new IntersectionObserver(([e]) => {
      visible = e.isIntersecting;
      run();
    });
    io.observe(canvas);

    const mo = new MutationObserver(() => {
      readTheme();
      if (reduced.matches) still();
    });
    mo.observe(document.documentElement, {
      attributes: true,
      attributeFilter: ['data-theme'],
    });

    const scheme = window.matchMedia('(prefers-color-scheme: dark)');
    const onScheme = () => {
      readTheme();
      if (reduced.matches) still();
    };
    scheme.addEventListener('change', onScheme);
    reduced.addEventListener('change', run);

    /* If the GPU context is lost, hide the canvas so the CSS sky beneath
       carries the scene instead of a dead black rectangle. */
    const onLost = (e: Event) => {
      e.preventDefault();
      cancelAnimationFrame(raf);
      canvas.style.display = 'none';
    };
    canvas.addEventListener('webglcontextlost', onLost);

    return () => {
      canvas.removeEventListener('webglcontextlost', onLost);
      cancelAnimationFrame(raf);
      ro.disconnect();
      io.disconnect();
      mo.disconnect();
      scheme.removeEventListener('change', onScheme);
      reduced.removeEventListener('change', run);
      gl.getExtension('WEBGL_lose_context')?.loseContext();
    };
  }, []);

  return <canvas ref={canvasRef} className="shader-sky" aria-hidden="true" />;
}
