<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$picid = $_POST['picid'];
$message = $_POST['message'];
$userid = $_SESSION['user_id'];
$albumid = $_POST['album_id'];
members_add_picture_comment($userid, $picid, $message, $albumid);
?>