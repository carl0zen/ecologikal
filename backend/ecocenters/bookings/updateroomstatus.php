<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

$ec_id = $_POST['ec_id'];
$room_id = $_POST['room_id'];
$is_available = $_POST['is_available'];

bookings_update_room_status($ec_id, $room_id, $is_available);
?>