<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$comment = $_POST['comment'];
	$user = $_SESSION['user_id'];
	$post = $_POST['postid'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$type= $_POST['type'];

	echo post_add_comment($comment, $user, $post, $type, $lat, $lng);
?>