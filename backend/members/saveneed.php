<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$name = $_POST['name'];
	$desc = $_POST['description'];
	$cat = $_POST['category'];
	$lat = $_POST['latitude'];
	$lon = $_POST['longitude'];
	$user = $_POST['user'];

	add_need($name, $desc, $cat, $lat, $lon, $user);
?>