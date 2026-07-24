<?php
/**
 * Docker-local DB connection (copied over _config/dbconnection.php on container start).
 * Host defaults to the compose service name so PHP works even when getenv is empty.
 */
$hostname_ecologikal = 'vintage-db';
$database_ecologikal = 'ecologikal';
$username_ecologikal = 'eco';
$password_ecologikal = 'eco';
$ecologikal = mysql_pconnect(
  $hostname_ecologikal,
  $username_ecologikal,
  $password_ecologikal
) or trigger_error(mysql_error(), E_USER_WARNING);
if ($ecologikal) {
  mysql_select_db($database_ecologikal, $ecologikal);
}
