<?
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$username = $_POST['usuario'];

	if (!isset($username)) {
		$username = $_GET['usuario'];
	}

	if (!isset($username)) {
		exit();
	}

	$usuario = members_get_info('usuario', $_SESSION['user_id']);

	if( user_name_availability($username) || $usuario == $username ) {
		?>true<?
	} else {
		?>false<?
	}
?>