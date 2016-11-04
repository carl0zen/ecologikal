<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

$ec_id = $_POST['ec_id'];
$vacancy_id = $_POST['vacancy_id'];
$is_available = $_POST['is_available'];
echo "test";
vacancies_update_status($ec_id, $vacancy_id, $is_available);
?>