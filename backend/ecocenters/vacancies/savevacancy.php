<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

	$ec_id = $_POST['ec_id'];
	$name = $_POST['name'];
	$spots = $_POST['spots'];
	$description = $_POST['description'];
	$datefrom = $_POST['datefrom'];
	$duration = $_POST['duration'];
	$tasks = $_POST['tasks'];
	$recompenses = $_POST['recompenses'];
	$petal = $_POST['petal'];


	vacancies_add_new($ec_id, $name, $spots, $description, $datefrom, $duration, $tasks, $recompenses, $petal);
	echo $vacancy_id = vacancy_get_id($ec_id, $name, $description, $datefrom);
?>