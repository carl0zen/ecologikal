<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

$ec_id = $_POST['ec_id'];
$workshop_id = $_POST['workshop_id'];
$is_available = $_POST['is_available'];

workshops_update_status($ec_id, $workshop_id, $is_available);
?>