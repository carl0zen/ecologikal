<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

	$ec_id = $_GET['ec_id'];
 	$type = $_GET['people'];
load_css_files('ecocenter');
switch($type){
	case 'admins':
		$title = "Managers";
		$people = people_get_admins($ec_id);
		break;
	case 'settlers':
		$title = "Settlers";
		$people = people_get_settlers($ec_id);
		break;
	case 'volunteers':
		$title = "Volunteers";
		$people = people_get_volunteers($ec_id);
		break;
	case 'ecotravelers':
		$title = "Ecotravelers";
		$people = people_get_ecotravelers($ec_id);
		break;
	case 'followers':
		$title = "Followers";
		$people = people_get_followers($ec_id);
		break;
	case 'visitors':
		$title = "Visitors";
		$people = people_get_visitors($ec_id);
		break;
}?>
<style>
	div.member{
		height:40px;
		font-size:12px;
	}
	memberavatar{
		margin-right:10px;
	}
</style>
<div id="iframe">
<h1><?php echo $title ?></h1>
<?php if($people){
			foreach ($people as $key => $value) { ?>
		<div class="member">
	 		<memberavatar title = "<?php echo $people[$key]['name'] ?>" class = "tiptip" onclick="location.href='<?php echo members_display_profile_url($people[$key]['id']) ?>'"><?php echo members_display_profile_thumb($people[$key]['id']); ?></memberavatar>
			<?php echo members_get_info('nombre', $people[$key]['id']). " ". members_get_info('apellido', $people[$key]['id']); ?>
		</div>

	 	<?php
			}//End foreach
		}else{
			echo "No Visitors Now";
		}// End if ?>
</div>