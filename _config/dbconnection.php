<?php
# Local / dual-stack: infra/vintage/docker-entrypoint.sh overwrites this file
# with dbconnection.docker.php. Do not commit live remote credentials.
$hostname_ecologikal = getenv('ECO_DB_HOST') ?: '127.0.0.1';
$database_ecologikal = getenv('ECO_DB_NAME') ?: 'ecologikal';
$username_ecologikal = getenv('ECO_DB_USER') ?: 'eco';
$password_ecologikal = getenv('ECO_DB_PASSWORD') ?: 'eco';
$ecologikal = mysql_pconnect($hostname_ecologikal, $username_ecologikal, $password_ecologikal) or trigger_error(mysql_error());
mysql_select_db($database_ecologikal, $ecologikal);
