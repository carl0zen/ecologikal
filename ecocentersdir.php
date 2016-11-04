<?php
 	$view = 'ecocenter'; // This is for determining which scripts and css are going to be loaded
	include("header.php"); 
	include(_VIEWS_PATH_."members/sidebar_left.php");
	
	
?>

<content>
	<h1>Ecocenters Directory</h1>
	<?php $ecocenters = get_all_ecocenters();
			foreach ($ecocenters as $key => $value) { 
				
				$id 			= $ecocenters[$key]['id'];
				$name 			= $ecocenters[$key]['name'];
				$description	= $ecocenters[$key]['description'];
				$address 		= $ecocenters[$key]['address'];
				$latitude 		= $ecocenters[$key]['latitude'];
				$longitude 		= $ecocenters[$key]['longitude'];
				$admin 			= $ecocenters[$key]['admin'];
				$status 		= $ecocenters[$key]['status'];
				$type 			= $ecocenters[$key]['type'];
				$admin_name 	= $ecocenters[$key]['admin_name'];
				$isfollower 	= people_is_follower($id, $_SESSION['user_id']);	
?>
			<div class="ecocenter" >
				
					<input type="hidden" name="ec_id" value="<?php echo $id?>" id="ec_id">
						<memberavatar class="tiptip" title="<?php echo $adminame ?>" onclick="location.href='<?php members_display_profile_url($admin) ?>'"><?php members_display_profile_thumb($admin)?></memberavatar>
					
					<a href="<?php echo _VIEWS_URL_ ?>ecocenters/profile.php?ec_id=<?php echo $id ?>"><h3><?php echo $name ?></h3></a>
					<div class="status"><?php echo $status ?></div>
					<div class="type"><?php echo $type ?></div>	
					<div class="description"><?php echo $description ?></div>
					<?php if (!$isfollower){ ?>
						<button class="green follow">Follow</button>
					<?php }else{ ?>
						<button class="green unfollow">Unfollow</button>
					<?php } ?>
				
			</div>	<!--member-->
	<?php	
		} // End Foreach?>
	
</content>

<?php include("footer.php") ?>
	<script>
		$(document).ready(function(e){
			$('button.follow').live('click',function(e){
				ec_id = $(this).parent().find('#ec_id').val();
				queryurl = BACKEND_URL + 'ecocenters/follow.php';
				$.post(queryurl, {ec_id:ec_id}, function(e){
					alert(e);
				});
				$(this).removeClass('follow').addClass('unfollow').html('<div class="iconic arrow-right"></div>');
			});
			$('button.unfollow').live('click',function(e){
				ec_id = $(this).parent().find('#ec_id').val();
				queryurl = BACKEND_URL + 'ecocenters/unfollow.php';
				$.post(queryurl, {ec_id:ec_id}, function(e){
					alert('notfollowing');
				});
				$(this).removeClass('unfollow').addClass('follow').html('<div class="iconic x"></div>');
			});
		});
	</script>