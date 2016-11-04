<?php require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$ec_id = $_POST['ec_id'];
$name = $_POST['placename'];
$type = $_POST['placetype'];
$description = $_POST['description'];
$lat = $_POST['latitude'];
$lng = $_POST['longitude'];

ec_save_place($ec_id, $name, $type, $description, $lat, $lng);

 ?>