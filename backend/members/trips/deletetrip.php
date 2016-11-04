<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$tripid = $_POST['tripid'];

	members_delete_trip($tripid);

?>