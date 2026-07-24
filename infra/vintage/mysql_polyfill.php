<?php
/**
 * Minimal mysql_* → mysqli bridge so vintage PHP 5-era code can run on PHP 7.4+.
 * Loaded only inside the vintage Docker container via auto_prepend_file.
 */

if (function_exists('mysql_connect')) {
  return;
}

$GLOBALS['__eco_mysql'] = null;

function mysql_pconnect($host, $user, $pass) {
  return mysql_connect($host, $user, $pass);
}

function mysql_connect($host, $user, $pass) {
  $mysqli = @new mysqli($host, $user, $pass);
  if ($mysqli->connect_error) {
    trigger_error($mysqli->connect_error, E_USER_WARNING);
    return false;
  }
  $GLOBALS['__eco_mysql'] = $mysqli;
  return $mysqli;
}

function mysql_select_db($db, $link = null) {
  $link = $link ?: $GLOBALS['__eco_mysql'];
  return $link && $link->select_db($db);
}

function mysql_query($sql, $link = null) {
  $link = $link ?: $GLOBALS['__eco_mysql'];
  if (!$link) {
    return false;
  }
  return $link->query($sql);
}

function mysql_error($link = null) {
  $link = $link ?: $GLOBALS['__eco_mysql'];
  return $link ? $link->error : 'no connection';
}

function mysql_fetch_assoc($result) {
  return $result ? $result->fetch_assoc() : false;
}

function mysql_fetch_array($result, $type = MYSQLI_BOTH) {
  return $result ? $result->fetch_array($type) : false;
}

function mysql_fetch_row($result) {
  return $result ? $result->fetch_row() : false;
}

function mysql_num_rows($result) {
  return $result ? $result->num_rows : 0;
}

function mysql_insert_id($link = null) {
  $link = $link ?: $GLOBALS['__eco_mysql'];
  return $link ? $link->insert_id : 0;
}

function mysql_real_escape_string($str, $link = null) {
  $link = $link ?: $GLOBALS['__eco_mysql'];
  return $link ? $link->real_escape_string($str) : addslashes($str);
}

function mysql_close($link = null) {
  $link = $link ?: $GLOBALS['__eco_mysql'];
  if ($link) {
    $link->close();
  }
  return true;
}
