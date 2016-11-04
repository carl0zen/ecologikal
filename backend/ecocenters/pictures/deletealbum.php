<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$albumid = $_POST['albumid'];
	$ecid = $_POST['ecid'];

	ec_delete_album($ecid, $albumid);
?>