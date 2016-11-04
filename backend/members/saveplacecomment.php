<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$comment = $_POST['comment'];
	$user = $_SESSION['user_id'];
	$place = $_POST['place'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];

	place_add_comment($comment, $user, $place, $lat, $lng);
?>