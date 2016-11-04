<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$commentid = $_POST['comment_id'];

	ec_delete_picture_comment($commentid);
?>