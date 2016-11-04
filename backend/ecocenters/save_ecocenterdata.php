<?php require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

	$ec_id=$_GET['ec_id'];
	foreach ($_POST as $var => $value) {
		//Stores Gender
		if ($var == 'year'){
			ec_set_info('year',$ec_id,$value);
			echo $value;
		}
		if ($var == 'description'){
			ec_set_info('description',$ec_id,$value);
			echo $value;
		}
		if ($var == 'status'){
			ec_set_info('status',$ec_id,$value);
			echo $value;
		}
		if ($var == 'type'){
			ec_set_info('type',$ec_id,$value);
			echo $value;
		}
		if ($var == 'latitude'){
			ec_set_info('latitude',$ec_id,$value);
			echo $value;
		}
		if ($var == 'longitude'){
			ec_set_info('longitude',$ec_id,$value);
			echo $value;
		}
		if ($var == 'address'){
			ec_set_info('address',$ec_id,$value);
			echo $value;
		}

	}
?>