<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$p_id = $_POST['p_id'];
	$user_id = $_SESSION['user_id'];

	place_unfollow($p_id, $user_id);

?>