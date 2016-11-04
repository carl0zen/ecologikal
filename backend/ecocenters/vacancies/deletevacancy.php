<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

	$ec_id = $_POST['ec_id'];
	$vacancy_id = $_POST['vacancy_id'];


	workshops_delete($ec_id, $vacancy_id);

?>