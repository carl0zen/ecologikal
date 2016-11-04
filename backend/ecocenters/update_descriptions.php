<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

	$ec_id = $_GET['ec_id'];
	$dir_id = $_GET['dir_id'];
	echo $directions = $_POST['directions'];

	ec_add_directions($ec_id, $dir_id, $directions);
?>