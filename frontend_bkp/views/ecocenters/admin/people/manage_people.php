<?php

$view = 'ecocenter'; // This is for determining which scripts and css are going to be loaded
include_once($_SERVER['DOCUMENT_ROOT']."/header.php");

$ec_id = $_GET['ec_id'];

$user_id = $_SESSION['user_id'];
//If the user is profile a true value is stored
$myec = people_is_admin($ec_id, $user_id);

$name = ec_get_name($ec_id);

include(_VIEWS_PATH_."members/sidebar_left.php");
include_once("../admin_menu.php");
?>

<script src="<?php echo _PLUGINS_URL_ ?>iphonecheckbox/iphone-style-checkboxes.js"></script>
<link rel="stylesheet" href="<?php echo _PLUGINS_URL_ ?>iphonecheckbox/style.css" type="text/css" media="screen" charset="utf-8">
<?php if ($myec): ?>
	<content>
		<h1>People Admin</h1><button class="green backtoprofile" onclick="location.href='<?php echo _VIEWS_URL_ ?>ecocenters/profile.php?ec_id=<?php echo $ec_id ?>'">Back to Profile</button>
		<p>In this section you will be able to manage people in your ecocenter</p>
	<div id="people">
			<div id="admins">
			<h2>Managers</h2>
			<a href="<?php echo _VIEWS_URL_ ?>ecocenters/admin/people/add_manager.php?ec_id=<?php echo $ec_id ?>" class="iframe addmanager fancylink">Add Manager</a>
			<div class="avatars">
				<?php $admins = people_get_admins($ec_id);
			 	if($admins){
					foreach ($admins as $key => $value) { ?>
			 		<memberavatar class="tiptip" title="<?php echo $admins[$key]['name'] ?>" onclick="location.href='<?php echo members_display_profile_url($admins[$key]['id']) ?>'"><?php echo members_display_profile_thumb($admins[$key]['id']); ?></memberavatar>
			 	<?php
					}//End foreach
				}// End if?>
			</div>
		</div>
		<div id="settlers">
			<h2>Settlers</h2>
			<a href="<?php echo _VIEWS_URL_ ?>ecocenters/admin/people/add_settler.php?ec_id=<?php echo $ec_id ?>" class="iframe addsettlers fancylink">Add Settlers</a>
			<div class="avatars">
				<?php $settlers = people_get_settlers($ec_id);
			 	if($settlers){
					foreach ($settlers as $key => $value) { ?>
			 		<memberavatar title = "<?php echo $settlers[$key]['name'] ?>" class = "tiptip" onclick="location.href='<?php echo members_display_profile_url($settlers[$key]['id']) ?>'"><?php echo members_display_profile_thumb($settlers[$key]['id']); ?></memberavatar>
			 	<?php
					}//End foreach
				}else{
					echo "No Settlers Yet";
				}// End if?>
			</div>
		</div>
		<div id="currentvisitors">
			<h2>Current Volunteers</h2>
			<div class="avatars" >
				<?php $volunteers = people_get_volunteers($ec_id);
			 	if($volunteers){
					foreach ($volunteers as $key => $value) { ?>
			 		<memberavatar title = "<?php echo $volunteers[$key]['name'] ?>" class = "tiptip" onclick="location.href='<?php echo members_display_profile_url($volunteers[$key]['id']) ?>'"><?php echo members_display_profile_thumb($volunteers[$key]['id']); ?></memberavatar>
			 	<?php
					}//End foreach
				}else{
					echo "No Volunteers Now";
				}// End if?>
			</div>
			<h2>Current Ecotravelers</h2>
				<div class="avatars" >
					<?php $ecotravelers = people_get_ecotravelers($ec_id);
				 	if($ecotravelers){
						foreach ($ecotravelers as $key => $value) { ?>
				 		<memberavatar title = "<?php echo $ecotravelers[$key]['name'] ?>" class = "tiptip" onclick="location.href='<?php echo members_display_profile_url($ecotravelers[$key]['id']) ?>'"><?php echo members_display_profile_thumb($ecotravelers[$key]['id']); ?></memberavatar>
				 	<?php
						}//End foreach
					}else{
						echo "No Ecotravelers Now";
					}// End if?>
				</div>
		</div>
		<div id="followers">
			<h2>Followers</h2>
			<div class="avatars" >
				<?php $followers = people_get_followers($ec_id);
			 	if($followers){
					foreach ($followers as $key => $value) { ?>
			 		<memberavatar title = "<?php echo $followers[$key]['name'] ?>" class = "tiptip" onclick="location.href='<?php echo members_display_profile_url($followers[$key]['id']) ?>'"><?php echo members_display_profile_thumb($followers[$key]['id']); ?></memberavatar>
			 	<?php
					}//End foreach
				}else{
					echo "No Followers Now";
				}// End if?>
			</div>
		</div>
		<div id="visitors">
			<h2>All time Visitors</h2>
			<div class="avatars" >
				<?php $visitors = people_get_visitors($ec_id);
			 	if($visitors){
					foreach ($visitors as $key => $value) { ?>
			 		<memberavatar title = "<?php echo $visitors[$key]['name'] ?>" class = "tiptip" onclick="location.href='<?php echo members_display_profile_url($visitors[$key]['id']) ?>'"><?php echo members_display_profile_thumb($visitors[$key]['id']); ?></memberavatar>
			 	<?php
					}//End foreach
				}else{
					echo "No Visitors Now";
				}// End if?>
			</div>
		</div>
		</div>
	</content>
<?php endif ?>
