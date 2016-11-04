<?
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$user_id = $_SESSION['user_id'];
	$step = $_POST['step'];

	/* Validate username */
	function isUsernameValid($username) {
    	return preg_match('/^[a-zA-Z0-9\.]{4,10}$/', $username);
	}

	/* Validate username */
	function isEmailValid($email) {
		// First, we check that there's one @ symbol,
		// and that the lengths are right.
		if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
			// Email invalid because wrong number of characters
			// in one section or wrong number of @ symbols.
			return false;
		}
		// Split it into sections to make life easier
		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		for ($i = 0; $i < sizeof($local_array); $i++) {
			if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",$local_array[$i])) {
				return false;
			}
		}
		// Check if domain is IP. If not,
		// it should be valid domain name
		if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
			$domain_array = explode(".", $email_array[1]);
			if (sizeof($domain_array) < 2) {
				return false; // Not enough parts to domain
			}
			for ($i = 0; $i < sizeof($domain_array); $i++) {
				if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
					return false;
				}
			}
		}

		return true;
	}

	function isPhoneValid ($phone) {
		return preg_match('/^[0-9\-\(\)\+ ]+$/i', $phone);
	}

	switch ($step) {
		case 1:
			/* Receive name and interests array */
			$name = $_POST['name'];
			$interests = $_POST['interests'];

			/* Save name */
			members_set_info('nombre', $user_id, $name);

			/* Save each interest */
			member_remove_interests($user_id);
			foreach ($interests as $interest) {
				member_add_interest($interest, $user_id);
			}

			break;
		case 2:
			$ids = $_POST['ids'];
			$grades = $_POST['grades'];
			$descriptions = $_POST['descriptions'];

			/* Clear current skills */
			member_delete_skills($user_id);

			for ($i = 0; $i < count($ids); $i++) {
				members_add_skill($user_id, $ids[$i], $grades[$i], $descriptions[$i]);
			}

			break;
		case 3:
			/* Receive each parameter */
			$nombre = 			$_POST['nombre'];
			$usuario = 			$_POST['usuario'];
			$email = 			$_POST['email'];
			$fecha_nacimiento = $_POST['fecha_nacimiento'];
			$gender = 			$_POST['gender'];
			$nationality = 		$_POST['nationality'];
			$phone =			$_POST['phone'];
			$website =			$_POST['website'];
			$aboutme =			$_POST['aboutme'];
			$languages =		$_POST['languages'];
			$errors =			array();

			/* Check nombre format */
			if (strlen($nombre) > 0) {
				members_set_info('nombre', $user_id, $nombre);
			} else {
				$errors[] = '<li>Name empty.</li>';
			}

			/* Check usuario format */
			if (isUsernameValid($usuario) && user_name_availability($usuario)) {
				members_set_info('usuario', $user_id, $usuario);
			} else if ($usuario != members_get_info('usuario', $user_id)) {
				$errors[] = '<li>Unavailable/Invalid username.</li>';
			}

			/* Check email format */
			if (isEmailValid($email) && $email != members_get_info('email', $user_id)) {
				members_set_info('email', $user_id, $email);
			} else if ($email != members_get_info('email', $user_id)) {
				$errors[] = '<li>Invalid email.</li>';
			}

			/* Check fecha_nacimiento valid */
			if (strtotime($fecha_nacimiento)) {
				members_set_info('fecha_nacimiento', $user_id, $fecha_nacimiento);
			} else {
				$errors[] = '<li>Invalid date.</li>';
			}

			/* Check gender */
			if ($gender == "Male" || $gender == "Female") {
				members_set_info('gender', $user_id, $gender);
			} else {
				$errors[] = '<li>Invalid gender.</li>';
			}

			/* Check nationality */
			if (strlen($nationality) > 0) {
				members_set_info('nationality', $user_id, $nationality);
			} else {
				$errors[] = '<li>Empty nationality.</li>';
			}

			/* Check about me */
			if (strlen($aboutme) > 0) {
				members_set_info('aboutme', $user_id, $aboutme);
			}

			/* Check phone number */
			if (isPhoneValid($phone)) {
				members_set_info('phone', $user_id, $phone);
			} else {
				$errors[] = '<li>Invalid phone number. (Can contain digits, dashes or parentheses)</li>';
			}

			/* Check website value */
			if (strlen($website) > 0) {
				members_set_info('website', $user_id, $website);
			}

			/* Add languages */
			if (count($languages) > 0) {
				//Deletes previous language records from the DB to avoid duplicity
				members_delete_language_list($user_id);

				/* Add each language */
				foreach ($languages as $language) {
					members_add_language($user_id, $language);
				}
			}

			/* If there were any errors */
			if (count($errors) > 0) {
				?>
				<h3>There were the following errors on your form submit:</h3>
				<ul>
				<?
				foreach($errors as $error) {
					echo $error;
				}
				?>
				</ul>
				<?
			} else {
				?>
				<script>$('#uploading').hide(0);</script>
				<div style="color:#999;text-align:center">Ready!</div>
				<script>document.location='members_registration_step4.php';</script><?
			}


			break; // End case
 	}
?>