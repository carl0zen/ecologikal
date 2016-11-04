<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$userfrom 		   = $_POST['ecid'];
	$albumname			= $_POST['albumname'];
	$albumdesc   = $_POST['albumdesc'];

	ec_add_album($userfrom, $albumname, $albumdesc);
	echo $albumid = ec_get_album_id($userfrom, $albumname);
?>