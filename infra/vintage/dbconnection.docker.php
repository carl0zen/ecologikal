<?php
/**
 * Docker-local DB connection (overrides remote credentials inside container only).
 */
$hostname_ecologikal = getenv('ECO_DB_HOST') ?: 'vintage-db';
$database_ecologikal = getenv('ECO_DB_NAME') ?: 'ecologikal';
$username_ecologikal = getenv('ECO_DB_USER') ?: 'eco';
$password_ecologikal = getenv('ECO_DB_PASSWORD') ?: 'eco';
$ecologikal = mysql_pconnect(
  $hostname_ecologikal,
  $username_ecologikal,
  $password_ecologikal
) or trigger_error(mysql_error(), E_USER_WARNING);
if ($ecologikal) {
  mysql_select_db($database_ecologikal, $ecologikal);
}
