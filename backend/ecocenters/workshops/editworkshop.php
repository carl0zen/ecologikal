<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

	$workshop_id = $_POST['workshop_id'];
	$name = $_POST['name'];
	$maxcapacity = $_POST['max_capacity'];
	$minallowance = $_POST['min_allowance'];
	$description = $_POST['description'];
	$datefrom = $_POST['datefrom'];
	$duration = $_POST['duration'];
	$price = $_POST['price'];
	$currency = $_POST['currency'];
	$petal = $_POST['petal'];


	workshops_edit($workshop_id, $name, $maxcapacity, $minallowance, $description, $datefrom, $duration, $price, $currency, $petal);

?>