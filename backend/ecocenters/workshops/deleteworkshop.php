<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

	$ec_id = $_POST['ec_id'];
	$workshop_id = $_POST['workshop_id'];


	workshops_delete($ec_id, $workshop_id);

?>