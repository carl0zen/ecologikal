<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$userfrom = $_SESSION['user_id'];
	$userto = $_POST['user_to'];
	$userfromname = members_get_info('nombre', $userfrom);
	$message = "wants to add you as a friend";

	members_request_friendship($userfrom, $userto, $message);

?>