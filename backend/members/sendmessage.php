<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$friends = $_POST['friends'];
	$message = $_POST['message'];
	$userfrom = $_SESSION['user_id'];

	$friends = explode(',',$friends );
	//Deletes the first element of the array
	array_shift($friends);
	// Deletes the last element of the array
	array_pop($friends);

	members_send_message($userfrom, $friends, $message);

?>