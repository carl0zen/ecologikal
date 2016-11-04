<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$_SESSION['user_hash'] = members_get_info('hash',$_SESSION['user_id']);
// If a parameter is passed with the user_id then it displays the profile for the user_id passed, if not it means that should display loggedin user profile
if (isset($_GET['user_id']) || isset($_GET['user'])){
	if(isset($_GET['user'])){
		$userid = members_get_user_id($_GET['user']);
	}else{
		$userid = $_GET['user_id'];
	}


	if ($userid == $_SESSION['user_id']){
		$myprofile = true;
	}else{
		$myprofile = false; // flag to not display editable features
	}
}else{
	$myprofile = true; // flag to allow editable features
	$userid = $_SESSION['user_id'];
}
// Check for edit mode ?edit=1 to edit
if(isset($_GET['edit'])){
	$edit = $_GET['edit'];
}else{
	$edit =0;
}

?>
