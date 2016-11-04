<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

	$ec_id = $_POST['ec_id'];
	$name = $_POST['name'];
	$capacity = $_POST['capacity'];
	$type = $_POST['type'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$currency = $_POST['currency'];
	$minstay = $_POST['min_stay'];


	bookings_add_room($ec_id, $name, $capacity, $type, $description, $price, $currency, $minstay);

?>