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
	
	<div class="wrapper">
		<div id="content" class="clearfix">

			<div id="skills" class="relative fleft clearfix">
				<ul>
					<li style="background:none;border:none;">
						<a title="flower" href="skills.php?user_id=<?php echo $userid ?>">
							<span class="ecoicon">D</span>
						</a>
					</li>
					<li style="background:none;border:none;">
						<a title="perfil" href="profile.php?user_id=<?php echo $userid ?>">
							<span class="ecoicon">v</span>
						</a>
					</li>
					<li style="background:none;border:none;">
						<a title="lazos" href="bonds.php?user_id=<?php echo $userid ?>">
							<span class="ecoicon">&amp;</span>
						</a>
					</li>
				</ul>
	
			</div>
			<!-- #skills -->

			<div id="maincontent" class="fright clearfix">
				<div id="profileimage">
					<h1><?php echo members_get_info('nombre', $userid). ' ' . members_get_info('apellido', $userid); ?>
						<div id="reactionpoints">
							<span class="ecoicon kin"></span><span class="kinvalue"><?php echo members_get_kins($userid)?> kins</span>
						</div>
					</h1>
					<?php members_display_profile_pic($userid);?>
					<div id="buttons">

						<?php if($myprofile){ ?>
							<a class="button green iframe profilepic" href="<?php echo _PLUGINS_URL_ ?>jquery.upload.crop/upload_crop.php?command=upload">
								<div class="ecoicon picture"></div>Change Profile Pic
							</a>
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
					<!-- EOF #reactionpoints -->
				</div>
				<!-- #profileimage -->
				<div id="tabs" >
					<ul>
						<li><a title= "profile" href="tabs/feed.php?user_id=<?php echo $userid ?><?php if ($edit == 1){ echo "&edit=1"; } ?>"><div class="ecoicon member"></div>User Feed</a></li>
						<li><a title= "gallery" href="tabs/gallery.php?user_id=<?php echo $userid ?>"><div class="ecoicon media"></div>Gallery</a></li>
						<li><a title= "ecocenters" href="tabs/ecocenters.php?user_id=<?php echo $userid ?>"><div class="ecoicon ecocenter"></div>Ecocenters</a></li>
						<li><a title= "traveldiary" href="tabs/traveldiary.php?user_id=<?php echo $userid ?>"><div class="ecoicon traveldiary"></div>Travel Diary</a></li>
				
					</ul>
					<div id="profileheader" >

					</div>
					<!-- #profileheader -->
				</div>
				<!-- EOF #tabs -->
			</div>
			<!-- EOF #maincontent -->
    </div>
		<!-- EOF #content -->

 	</div><!--Wrapper-->

	<script>
		$(function() {
				$( "#tabs, #skills" ).tabs({
					cache:false,
					load: function (e, ui) {
					     $(ui.panel).find(".tab-loading").remove();
					   },
					select: function (e, ui) {
					     var $panel = $(ui.panel);

					     if ($panel.is(":empty")) {
					         $panel.append('<div class="loader"><img class="fright" src="<?php echo _IMAGES_URL_ ?>ajax-loader.gif"></div>');
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