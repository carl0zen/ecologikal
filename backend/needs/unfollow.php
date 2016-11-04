<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$n_id = $_POST['n_id'];
	$user_id = $_SESSION['user_id'];

	need_unfollow($n_id, $user_id);

?>