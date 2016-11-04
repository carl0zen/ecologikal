<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$postid = $_POST['postid'];
	$user = $_SESSION['user_id'];
	$category = $_POST['category'];
	$type = $_POST['type'];

	post_broadcast($postid, $type, $category, $user);
?>