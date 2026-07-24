#!/bin/bash
set -euo pipefail

# Swap in Docker DB credentials without touching the committed remote file.
if [ -f /var/www/html/infra/vintage/dbconnection.docker.php ]; then
  cp /var/www/html/infra/vintage/dbconnection.docker.php \
    /var/www/html/_config/dbconnection.php
fi

# Point bootstrap ROOT URL at the gateway / vintage host when provided.
if [ -n "${ECO_VINTAGE_PUBLIC_URL:-}" ] && [ -f /var/www/html/_config/bootstrap.php ]; then
  sed -i "s|define('_ROOT_URL_', '[^']*');|define('_ROOT_URL_', '${ECO_VINTAGE_PUBLIC_URL}');|g" \
    /var/www/html/_config/bootstrap.php || true
fi

exec "$@"
