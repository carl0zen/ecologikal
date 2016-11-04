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
<div id="profilecontent" class="ecocenters clearfix" >
	<h3>My Ecocenters
	<?php if ($myprofile): ?>
		<button class="green addecocenter" onclick="location.href='<?php echo _VIEWS_URL_ ?>_registration/ecocenter_reg.php'">Add Ecocenter</button>
	<?php endif ?>
	</h3>
	<?php $ecocenters = ec_get_member_ecocenters($userid);
	if($ecocenters){
	 	foreach ($ecocenters as $key => $value){
		$name = $ecocenters[$key]['name'];
		$description = $ecocenters[$key]['description'];
		$id = $ecocenters[$key]['id'];
		$address = $ecocenters[$key]['address'];
		$roleid = $ecocenters[$key]['role_id'];
		$rolename = $ecocenters[$key]['rolename']; ?>
		<div class="ecocenter">
			<memberavatar><?php ec_display_profile_thumb($id); ?></memberavatar>
			<a href="<?php echo _VIEWS_URL_ ?>ecocenters/profile.php?ec_id=<?php echo $id ?>"><h4><?php echo $name ?></h4></a>
			<input type="hidden" name="ec_id" value="<?php echo $id ?>" id="ec_id">
			<input type="hidden" name="role_id" value="<?php echo $roleid ?>" id="role_id">
			<div class="role"><?php echo $rolename ?></div>
			<div class="address"><?php echo $address ?></div>
			<div class="description"><?php echo $description ?></div>
		</div>
	<?php } // end foreach
	} // if ecocenters?>
</div>