<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$tripid = $_POST['tripid'];
	$stopid = $_POST['stopid'];

	members_delete_trip_stop($tripid, $stopid);

?>