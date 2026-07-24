FROM node:20-alpine AS deps
WORKDIR /app
RUN corepack enable
COPY package.json pnpm-workspace.yaml pnpm-lock.yaml tsconfig.base.json ./
COPY apps/web/package.json apps/web/
COPY packages/domain/package.json packages/domain/
COPY packages/certexi-bridge/package.json packages/certexi-bridge/
RUN pnpm install --frozen-lockfile

FROM deps AS build
COPY apps/web apps/web
COPY packages packages
ENV NEXT_TELEMETRY_DISABLED=1
ARG NEXT_BASE_PATH=/v2
ARG NEXT_PUBLIC_APP_URL=http://localhost:8090/v2
ARG NEXT_PUBLIC_VINTAGE_URL=http://localhost:8090
ENV NEXT_BASE_PATH=$NEXT_BASE_PATH
ENV NEXT_PUBLIC_APP_URL=$NEXT_PUBLIC_APP_URL
ENV NEXT_PUBLIC_VINTAGE_URL=$NEXT_PUBLIC_VINTAGE_URL
RUN pnpm --filter @ecologikal/web build

FROM node:20-alpine AS runner
WORKDIR /app
ENV NODE_ENV=production
ENV NEXT_TELEMETRY_DISABLED=1
ENV PORT=3100
ARG NEXT_BASE_PATH=/v2
ARG NEXT_PUBLIC_APP_URL=http://localhost:8090/v2
ARG NEXT_PUBLIC_VINTAGE_URL=http://localhost:8090
ENV NEXT_BASE_PATH=$NEXT_BASE_PATH
ENV NEXT_PUBLIC_APP_URL=$NEXT_PUBLIC_APP_URL
ENV NEXT_PUBLIC_VINTAGE_URL=$NEXT_PUBLIC_VINTAGE_URL
RUN corepack enable
COPY --from=build /app /app
WORKDIR /app/apps/web
EXPOSE 3100
CMD ["pnpm", "start"]
