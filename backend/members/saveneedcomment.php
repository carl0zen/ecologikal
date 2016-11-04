<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$comment = $_POST['comment'];
	$user = $_SESSION['user_id'];
	$need = $_POST['need'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];

	need_add_comment($comment, $user, $need, $lat, $lng);
?>