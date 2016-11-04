<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

$ec_id = $_POST['ec_id'];
$friends = $_POST['friends'];
$user_id = $_SESSION['user_id'];

$friends = explode(',',$friends );
//Deletes the first element of the array
array_shift($friends);
// Deletes the last element of the array
array_pop($friends);

foreach ($friends as $i=> $value){
	people_set_settler($ec_id, $friends[$i]);
	$ec_name = ec_get_info('name', $ec_id);
	$userfrom = members_get_info('nombre', $user_id);
	$message = $userfrom.' made you settler of '.$ec_name;
	members_send_notification($user_id, $friends[$i], $message , 'ec_settler', $ec_id);
}

?>