<?php require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");?>
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
				<div id="topmenu" class="fleft">
					<a href="<?php echo _ROOT_URL_ ?>gamefeed.php" class="item <?php if ($feed == 'game'): ?>on<?php endif ?>">
						<div class="ecoicon kin"></div><span class=" text">Juega</span>
					</a>
					<a href="<?php echo _ROOT_URL_ ?>ecocentersdir.php" class="item <?php if ($feed == 'travel'): ?>on<?php endif ?>">
						<div class="ecoicon backpack"></div><span class="text">Viaja</span>
					</a>
					<a href="<?php echo _ROOT_URL_ ?>discoverfeed.php" class="item <?php if ($feed == 'discover'): ?>on<?php endif ?>">
						<div class="ecoicon flag"></div><span class=" text">Descubre</span>
					</a>
					<a href="<?php echo _ROOT_URL_ ?>learnfeed.php" class="item <?php if ($feed == 'learn'): ?>on<?php endif ?>">
						<div class="ecoicon book"></div><span class=" text">Aprende</span>
					</a>
					<a href="<?php echo _ROOT_URL_ ?>meetfeed.php" class="item <?php if ($feed == 'meet'): ?>on<?php endif ?>">
						<div class="ecoicon chat"></div><span class=" text">Conoce</span>
					</a>

					<a href="<?php echo _ROOT_URL_ ?>cooperatefeed.php" class="item <?php if ($feed == 'cooperate'): ?>on<?php endif ?>"><div class="ecoicon tree"></div><span class=" text">Coopera</span></a>
				</div>

				<div class="fright margin5t width30" >
				   <div id="myaccount" class="fright pointer">
				   		<div class="memberavatar fleft"
					   	onclick="location.href='<?php echo members_display_profile_url($_SESSION['user_id']) ?>'">
					   	<?php members_display_profile_thumb($_SESSION['user_id']); ?>
					   	</div>
					   	<span class="clearfix line35 margin10l font12 bold fleft">
					   	<?php echo members_get_info('nombre',$_SESSION['user_id']); ?></span>
						<img src="<?php echo _CSS_URL_ ?>img/triangle_down.png" class="margin10l margin15t">
						<div id="dropdown" class="padding10 nodisplay ">
							<ul>

								<li><a href="#">Settings</a></li>
								<li><a href="#">Help</a></li>
								<li><a href="?command=logout">Log Out</a></li>
							</ul>
						</div>
						<!-- #myaccount -->
				   </div>
					<div class="fright margin10r">
						<div class="button pink" id="share_btn">
							<span class="ecoicon post"></span><?php echo HEADER_SHARE ?></div>
						</div>
						<!-- .button.pink -->

						<!-- #community -->
					</div>
				</div>
			</div>
		</div>