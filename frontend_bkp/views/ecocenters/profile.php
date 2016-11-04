<?php
$view = 'ecocenter'; // This is for determining which scripts and css are going to be loaded
include("../../../header.php");


$ec_id = $_GET['ec_id'];
if(isset($_GET['edit'])){
	$edit = $_GET['edit'];
}else{
	$edit =0;
}

$name = ec_get_name($ec_id);
$status = ec_get_info('status', $ec_id);
$year = ec_get_info('year', $ec_id);
$description = ec_get_info('description', $ec_id);
$address = ec_get_info('address', $ec_id);
$type = ec_get_info('type', $ec_id);
$foodgrown = ec_get_info('food_grown', $ec_id);
$sharedmeals = ec_get_info('shared_meals', $ec_id);
$alcohol = ec_get_info('alcohol', $ec_id);
$tobacco = ec_get_info('tobacco', $ec_id);
$restrictions = ec_get_info('restrictions', $ec_id);
$website = ec_get_info('website', $ec_id);
$user_id = $_SESSION['user_id'];
//If the user is profile a true value is stored
$myec = people_is_admin($ec_id, $user_id);
$isfollower = people_is_follower($ec_id, $user_id);	

include (_VIEWS_PATH_."members/sidebar_left.php"); ?>
<div id="itemicon">
	<img class="tiptip" title="<h2><?php echo ec_get_info('name', $ec_id); ?></h2>" src="<?php echo _IMAGES_URL_ ?>ecocenter.png">
</div>
<content>
	<div id="profileheader">
		<div id="profileimage">
			<?php ec_display_profile_pic($ec_id);?>

		</div>
		
		<div id="buttons">
			<?php if ($myec){ ?>
					<button class="green manage_ec tiptip" title="Manage Ecocenter" onclick="location.href='<?php echo _VIEWS_URL_ ?>ecocenters/admin/manage_ecocenter.php?ec_id=<?php echo $ec_id ?>'"><div class="iconic cog"></div></button>
					<button class="green tiptip" title="Change your profile Pic" onclick="$(this).parent().find('a.profilepic').trigger('click');"><div class="iconic image"></div></button>
					<a href="<?php echo _PLUGINS_URL_ ?>jquery.upload.crop/upload_crop_ec.php?command=upload&ec_id=<?php echo $ec_id ?>" class="iframe profilepic" id="#profilelink"></a>
			<?php } ?>
			<?php if (!$myec): ?>
					<?php if (!$isfollower){ ?>
						<button class="green follow tiptip" title="Follow"><div class="iconic arrow-right"></div></button>
					<?php }else{ ?>
						<button class="green unfollow tiptip" title="Unfollow"><div class="iconic x"></div></button>
					<?php } ?>	
			<?php endif ?>
			
		</div>
	</div>
	
	<div id="tabs" class="clearfix">
		<ul>
			<li><a title= "profile" href="tabs/profile.php?ec_id=<?php echo $ec_id ?><?php if ($edit == 1){ echo "&edit=1"; } ?>">Profile</a></li>
			<li><a title= "aboutus" href="tabs/moreabout.php?ec_id=<?php echo $ec_id ?>">More About Us</a></li>
			<li><a title= "places" href="tabs/places.php?ec_id=<?php echo $ec_id ?>">Places</a></li>
			<li><a title= "workshops" href="tabs/workshops.php?ec_id=<?php echo $ec_id ?>">Workshops</a></li>
			<li><a title= "rooms" href="tabs/rooms.php?ec_id=<?php echo $ec_id ?>">Rooms</a></li>
			<li><a title= "vacancies" href="tabs/vacancies.php?ec_id=<?php echo $ec_id ?>">Vacancies</a></li>
			<li><a title= "services" href="tabs/services.php?ec_id=<?php echo $ec_id ?>">Services</a></li>
			
		</ul>
	</div>
	<div id="rightbar">
		<div id="bookingform">
			<h2><div class="icon bookingicon"></div>Travel Here</h2>
			<input type="text" name="date" value="" id="date">
			<input type="text" name="nodays" value="" id="nodays">
			<h3>Search for</h3>
			<button class="green accomodation">Rooms</button>
			<button class="green workshops">Workshops</button>
			<button class="green volunteer">Vacancies</button>
		</div>
		<div id="reputation">
			<h2><div class="icon vibe"></div>Place Vibe</h2>
			<div id="bargraph"></div>
			<div class="comments"><span class="iconic comment"></span>Reviews (14)</div>
		</div>
	</div>
</content>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="<?php echo _PLUGINS_URL_ ?>gmap3/gmap3.min.js"></script>
<script src="<?php echo _PLUGINS_URL_ ?>gmap3/jquery-autocomplete.min.js"></script>
<script src="<?php echo _PLUGINS_URL_ ?>bargraph.js"></script>
<script>

	
	$(document).ready(function(e){
		
		$('#date').change(function(e){
			$('#nodays').focus();
		});
		arrayOfData = new Array(
				[<?php echo rand(20,100) ?>,'<div class="tiptip icon facilities" title="Facilities"></div>','#FF7054'],
				[<?php echo rand(20,100) ?>,'<div class="tiptip icon fun" title="Fun"></div>','#FFD51F'],
				[<?php echo rand(20,100) ?>,'<div class="tiptip icon friendliness" title="Friendliness"></div>','#92E842'],
				[<?php echo rand(20,100) ?>,'<div class="icon places tiptip" title="Location"></div>','#48D4E8'],
				[<?php echo rand(20,100) ?>,'<div class="tiptip icon cleanliness" title="Cleanliness"></div>','#DA76FF']
				
			);
		$('#bargraph').jqbargraph({ data: arrayOfData, width:'270px', height: '100px', barSpace: 20, speed:1, showValues: false, postfix: '%' });
		
		$('#date').datepicker({
			dateFormat: 'd MM,yy'
		}).watermark('Click to Select Date');
		$('#nodays').watermark('# days');
		$('button.follow').live('click',function(e){
			ec_id = <?php echo $ec_id ?>;
			queryurl = BACKEND_URL + 'ecocenters/follow.php';
			$.post(queryurl, {ec_id:ec_id}, function(e){
			});
			$(this).removeClass('follow').addClass('unfollow').html('<div class="iconic arrow-right"></div>');
		});
		$('button.unfollow').live('click',function(e){
			ec_id = <?php echo $ec_id ?>;
			queryurl = BACKEND_URL + 'ecocenters/unfollow.php';
			$.post(queryurl, {ec_id:ec_id}, function(e){
			});
			$(this).removeClass('unfollow').addClass('follow').html('<div class="iconic x"></div>');
		});
		$(function() {
				$( "#tabs" ).tabs({
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
		
	});
		
</script>