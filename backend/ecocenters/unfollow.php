<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$ec_id = $_POST['ec_id'];
	$user_id = $_SESSION['user_id'];

	people_unfollow($ec_id, $user_id);

	?>