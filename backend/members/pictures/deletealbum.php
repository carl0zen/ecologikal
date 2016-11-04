<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$albumid = $_POST['albumid'];
	$userid = $_SESSION['user_id'];

	members_delete_album($userid, $albumid);
?>