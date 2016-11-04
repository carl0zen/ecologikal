<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

	$ec_id = $_POST['ec_id'];
	$name = $_POST['name'];
	$maxcapacity = $_POST['max_capacity'];
	$minallowance = $_POST['min_allowance'];
	$description = $_POST['description'];
	$datefrom = $_POST['datefrom'];
	$duration = $_POST['duration'];
	$price = $_POST['price'];
	$currency = $_POST['currency'];
	$petal = $_POST['petal'];


	workshops_add_new($ec_id, $name, $maxcapacity, $minallowance, $description, $datefrom, $duration, $price, $currency, $petal);
	echo $workshop_id = workshop_get_id($ec_id, $name, $description, $datefrom);
?>