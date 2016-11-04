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
<div id="profilecontent" class="clearfix">
	<div id="bonds">

		<?php $members = members_get_friends($userid); ?>
		<h3>Bonds <span class="friendcount">(<?php echo count($members);?>)</span><span class="viewall"><a href="#">View all</a></span></h3>

	<?php	if ($members == null && $myprofile){
			echo "You have no Friends <a href='"._ROOT_URL_."membersdir.php'>Start Making Bonds</a>";
		}else{?>
		<friends>
				<?php foreach ($members as $key => $value) { ?>
					<a href="<?php members_display_profile_url($members[$key]['user_id']) ?>" ><memberavatar class="tiptip" title="<?php echo $members[$key]['name'].' '.$members[$key]['lastname']; ?>"><?php members_display_profile_thumb($members[$key]['user_id']); ?></memberavatar></a>
				<?php }	// end For?>
		</friends>
		<?php } //End if?>
	</div>
</div>
<script>
	$(document).ready(function(e){
		$('.tiptip').tipTip();
	});
</script>