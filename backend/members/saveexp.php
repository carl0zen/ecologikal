<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$exp = $_POST['experience'];
	$user = $_SESSION['user_id'];
	$place = $_POST['place'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];

	add_experience($exp, $user, $place, $lat, $lng);
	place_set_visitor($place, $user);
?>