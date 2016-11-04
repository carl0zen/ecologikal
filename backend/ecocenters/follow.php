<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$ec_id = $_POST['ec_id'];
	$user_id = $_SESSION['user_id'];

	people_set_follower($ec_id, $user_id);

	$ec_admins = people_get_admins($ec_id);

	foreach($ec_admins as $key => $value) {
		if ($user_id != $ec_admins[$key]['id']){
			$message = members_get_info('nombre', $user_id). ' '.members_get_info('apellido', $user_id). ' is now following '.ec_get_info('name',$ec_id);
			members_send_notification($user_id, $ec_admins[$key]['id'], $message, 'ec_follow', $ec_id);
		}

	}
	?>