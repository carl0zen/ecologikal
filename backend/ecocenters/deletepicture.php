<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$picname = $_POST['picname'];
	$ecid = $_POST['ecid'];
	$albumname = $_POST['albumname'];

	ec_delete_picture($ecid, $albumname, $picname);
?>