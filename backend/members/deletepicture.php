<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$picname = $_POST['picname'];
	$userid = $_SESSION['user_id'];
	$albumname = $_POST['albumname'];

	members_delete_picture($userid, $albumname, $picname);
?>