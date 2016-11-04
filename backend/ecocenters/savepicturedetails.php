<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	echo $imgdesc = $_POST['description'];
	echo $imgname = $_POST['name'];
	echo $scid = $_POST['ecid'];
	echo $albumname = $_POST['albumname'];

	$albumid = ec_get_album_id($scid, $albumname);
	ec_add_picture_description($scid, $imgname, $imgdesc, $albumid);
?>