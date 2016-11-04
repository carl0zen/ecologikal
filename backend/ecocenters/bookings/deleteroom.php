<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

	$ec_id = $_POST['ec_id'];
	$room_id = $_POST['room_id'];


	bookings_delete_room($ec_id, $room_id);

?>