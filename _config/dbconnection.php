<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ecologikal = "db.carlitosway.club";
$database_ecologikal = "carlitosway_db";
$username_ecologikal = "the_godfather";
$password_ecologikal = "elpadrino";
$ecologikal = mysql_pconnect($hostname_ecologikal, $username_ecologikal, $password_ecologikal) or trigger_error(mysql_error());
mysql_select_db($database_ecologikal, $ecologikal);

?>