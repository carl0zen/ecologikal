#!/bin/bash
set -euo pipefail

# Swap in Docker DB credentials without touching the committed remote file.
if [ -f /var/www/html/infra/vintage/dbconnection.docker.php ]; then
  cp /var/www/html/infra/vintage/dbconnection.docker.php \
    /var/www/html/_config/dbconnection.php
fi

# bootstrap.php reads ECO_VINTAGE_PUBLIC_URL at runtime (no sed needed).

exec "$@"
