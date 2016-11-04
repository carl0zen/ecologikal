<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$postid = $_POST['postid'];
	$type = $_POST['type'];

	echo feature_post($postid, $type);
?>