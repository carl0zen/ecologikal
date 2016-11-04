<?php
 	$view = 'member'; // This is for determining which scripts and css are going to be loaded
	include("../../../header.php");
	
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
<script>
	USER_ID_VIEWING = '<?php echo $userid ?>';
	
</script>
	
	<div id="wrapper">
		<?php include ("sidebar_left.php") ?>
		<div id="itemicon">
			<img src="<?php echo _IMAGES_URL_ ?>member.png">
		</div>
		<content>
			
			<div id="profileheader" >
				<div id="buttons">
					
					<?php if($myprofile){ ?>
						<a href="<?php echo _PLUGINS_URL_ ?>jquery.upload.crop/upload_crop.php?command=upload" class="iframe profilepic"></a>
						<button class="green tiptip" title="Click to Change Profile Pic" onclick="$(this).parent().find('a.profilepic').trigger('click');"><div class="iconic image"></div></button>
					<?php } ?>
					<input type="hidden" name="user_id" value="<?php echo $userid ?>" id="user_id">
					
					<?php if(!$myprofile){?>
						<a href="<?php echo _VIEWS_URL_ ?>members/sendmessage.php?user_id=<?php echo $userid ?>" class="iframe sendmessage"></a>
						<button class="green sendmessage tiptip" title="Send Message" onclick="$('a.sendmessage').trigger('click')"><div class="iconic mail"></div></button>
						
					<?php }?>
				<?php $requestsent = members_check_request($_SESSION['user_id'], $userid, 'friendship');
					if($requestsent && !members_is_friend($userid)){ ?>
						<span class="requested">Friendship Requested</span>
				<?php	} ?>
				<?php if(members_is_friend($userid) && !$myprofile){ ?>
						<button class="green tiptip deletefriend" title="Delete Friend"><div class="iconic x"></div></button>
				<?php }?>	
				<?php	if(!$myprofile && !$requestsent && !members_is_friend($userid)){?>
					<div id="makebond">
						<button id="addfriend" class="green"><div class="iconic plus-alt"></div></button>
						
						
					</div>
			<?php		}	//endif
				?>
				</div>
				<div id="profileimage">
					<?php members_display_profile_pic($userid);?>
				</div>
				<div id="reactionpoints">
					<span id="kinvalue" class="tiptip" title="Your alternative currency"><span class="icon kin"></span><?php echo members_get_kins($userid)?> kins</span>
				</div>
			</div>
			<div id="tabs">
				<ul>
					<li><a title= "profile" href="tabs/profile.php?user_id=<?php echo $userid ?><?php if ($edit == 1){ echo "&edit=1"; } ?>"><div class="ecoicon member"></div></a></li>
					<li><a title= "ecocenters" href="tabs/ecocenters.php?user_id=<?php echo $userid ?>"><div class="ecoicon ecocenter"></div></a></li>
					<li><a title= "traveldiary" href="tabs/traveldiary.php?user_id=<?php echo $userid ?>"><div class="ecoicon traveldiary"></div></a></li>
					<li><a title= "gallery" href="tabs/gallery.php?user_id=<?php echo $userid ?>"><div class="ecoicon media"></div></a></li>
					<li><a title= "actions" href="tabs/actions.php?user_id=<?php echo $userid ?>"><div class="ecoicon action"></div></a></li>
				</ul>
			</div>
        </content>
	
		<div class="rightbar">
			<div id="tabsright">
				<ul>
					<li><a title= "Search" href="tabs/search.php?user_id=<?php echo $userid ?>"><div class="iconic magnifying-glass"></div></a></li>
					<li><a title="flower" href="sidebar_right.php?user_id=<?php echo $userid ?>"><div class="icon flower"></div></a></li>
					
				</ul>
			</div>
 			<?php //include("sidebar_right.php"); ?>
		</div>
 	</div><!--Wrapper-->

	<script>
		$(function() {
				$( "#tabs, #tabsright" ).tabs({
					cache:true,
					load: function (e, ui) {
					     $(ui.panel).find(".tab-loading").remove();
					   },
					select: function (e, ui) {
					     var $panel = $(ui.panel);

					     if ($panel.is(":empty")) {
					         $panel.append("<div class='tab-loading'>Loading...</div>")
					     }
					    },
					cookie: {
									// store cookie for a day, without, it would be a session cookie
									expires: 1
								}
				});
			});
		function success(position) {


		  var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

		coords = String(latlng).replace(')','').replace('(','');
		coords = coords.split(',');
		lat = coords[0];
		lng = coords[1];



		<?php if($myprofile){ // Only update geolocation if its my profile?>
			$.post(BACKEND_URL+ 'members/updategeoloc.php',{lat: lat, lng: lng}, function(data){

			});
		<?php }?>

		}

		function error(msg) {
		 	alert('failed finding your geolocation');
		}

		if (navigator.geolocation) {
		  navigator.geolocation.getCurrentPosition(success, error);
		} else {
		  error('not supported');
		}
	</script>