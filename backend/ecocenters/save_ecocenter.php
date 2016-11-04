<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$userid 	= $_SESSION['user_id'];
 	$latitude 	= $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$name = $_POST['name'];
	$year 		= $_POST['year'];
	$description = $_POST['description'];
	$address 	= $_POST['address'];
	$status 	= $_POST['status'];
	$type 		= $_POST['type'];
	$phone 	= $_POST['phone'];
	$landsize 	= $_POST['landsize'];
	$units 	= $_POST['units'];
	$foodgrown = $_POST['foodgrown'];
	$meals 	= $_POST['meals'];
	$alcohol 	= $_POST['alcohol'];
	$tobacco 	= $_POST['tobacco'];
	$restrictions 	= $_POST['restrictions'];
	$website 	= $_POST['website'];

	ec_register($userid, $latitude, $longitude, $name, $year, $description, $address, $status, $type, $phone, $landsize, $units, $foodgrown, $meals, $alcohol, $tobacco, $restrictions, $website);

	$services 	= $_POST['services'];
	$activities 	= $_POST['activities'];
	$diet 	= $_POST['diet'];
	$spirituality 	= $_POST['spirituality'];
	$orientations 	= $_POST['orientations'];

	echo $ec_id = ec_get_id($name, $latitude, $longitude);


	foreach ($services as $key => $value) {
		ec_add_service($ec_id, $services[$key]);
	}
	foreach ($activities as $key => $value) {
		ec_add_activity($ec_id, $activities[$key]);
	}
	foreach ($diet as $key => $value) {
		ec_add_diet_item($ec_id, $diet[$key]);
	}
	foreach ($spirituality as $key => $value) {
		ec_add_spiritual_practice($ec_id, $spirituality[$key]);
	}
	foreach ($orientations as $key => $value) {
		ec_add_orientation($ec_id, $orientations[$key]);
	}

	// Add creator as administrator

	people_set_admin($ec_id, $userid);


?>