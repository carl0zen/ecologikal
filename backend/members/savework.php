<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$exp = $_POST['experience'];
	$user = $_SESSION['user_id'];
	$need = $_POST['need'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];

	add_work($exp, $user, $need, $lat, $lng);
	need_set_worker($need, $user);
?>