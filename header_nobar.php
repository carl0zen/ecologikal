<?php require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
if (isset($_SESSION['registration_step'])){
	$step = $_SESSION['registration_step'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Ecologikal</title>

		<?php if (function_exists('load_css_files')){ load_css_files($view);} ?>
		<?php if (function_exists('load_js_scripts')){ load_js_scripts($view);$js_loaded=true;} ?>

	</head>
   	<body>
	<background></background>
		<div id="header">
			<div class="wrapper">
				<span id="logo" class="block fleft pointer"></span>

				<!-- EOF notification_btn -->
				<style>
					div#content .button.green.fright {
						margin-top: 15px;
						margin-right: 15px;
					}

					div#topmenu {
						margin-left: 70px;
					}
				</style>

				<div id="topmenu" class="fleft">
					<a href="members_registration_step1.php"><span class="step"><span class="number <?php if($step == 1){echo 'selected';} ?>">1</span><span class="stepname">Intereses</span></span></a>
					<a href="members_registration_step2.php"><span class="step"><span class="number <?php if($step == 2){echo 'selected';} ?>">2</span><span class="stepname">Habilidades</span></span></a>
					<a href="members_registration_step3.php"><span class="step"><span class="number <?php if($step == 3){echo 'selected';} ?>">3</span><span class="stepname">Pasaporte</span></span></a>
					<a href="members_registration_step4.php"><span class="step"><span class="number <?php if($step == 4){echo 'selected';} ?>">4</span><span class="stepname">Tu comunidad</span></span></a>

				</div>

				<div class="fright margin5t width45" >
				   				</div>
			</div>
		</div>