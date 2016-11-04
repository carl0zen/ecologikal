<?php require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

$placeid = $_POST['placeid'];

ec_delete_place($placeid); ?>