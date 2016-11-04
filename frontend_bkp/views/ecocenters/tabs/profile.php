<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$ec_id = $_GET['ec_id'];

$name = ec_get_name($ec_id);
$latitude = ec_get_info('latitude', $ec_id);
$longitude = ec_get_info('longitude', $ec_id);
$latitude = ec_get_info('latitude', $ec_id);
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
// Var to display editable features
// Check for edit mode ?edit=1 to edit
if(isset($_GET['edit'])){
	$edit = $_GET['edit'];
}else{
	$edit =0;
}
?>

<div id="container">
	<div id="profilecontent" class="main clearfix">
			<div class="block left">
			<h3><?php if ($myec && $edit == 0){ ?>
					<button class="green editprofile" onclick="location.href='?ec_id=<?php echo $ec_id ?>&edit=1'">Edit</button>
			<?php } ?>

			<?php echo $name ?>

			</h3>
			<fields <?php if ($edit == 1){ echo "class='editmode'"; } ?>>
				<strong>Year of Foundation: </strong>
				<div class="year"><?php echo $year ?></div>
				<strong>Status: </strong>
				<div class="status"><?php echo $status ?></div>
				<strong>Type: </strong>
				<div class="type"><?php echo $type ?></div>
				<strong>Address:</strong>
				<div class="address"><?php echo $address ?></div>
				<strong>Description:</strong>
				<div class="description"><?php echo $description ?></div>


				<?php if ($edit == 1){ ?>
					<button class="green updateprofile">Update Profile</button>
				<?php } ?>
			</fields>
			<div id="howtogethere">
				<h4>How get here?</h4>
				<button class="green byplane">By plane</button>
				<button class="green bybus">By Bus</button>
				<button class="green bycar">By Car</button>
				<a href="<?php echo _VIEWS_URL_ ?>ecocenters/howtogethere.php?ec_id=<?php echo $ec_id ?>&by=plane" class="iframe byplane"></a>
				<a href="<?php echo _VIEWS_URL_ ?>ecocenters/howtogethere.php?ec_id=<?php echo $ec_id ?>&by=bus" class="iframe bybus"></a>
				<a href="<?php echo _VIEWS_URL_ ?>ecocenters/howtogethere.php?ec_id=<?php echo $ec_id ?>&by=car" class="iframe bycar"></a>
			</div>
			</div>
			<div id="people">
				<h3>People</h3>
				<div id="admins">
					<?php $admins = people_get_admins($ec_id);
					 		$no = count($admins);?>
					<h4><div class="icon admin"></div>Managers <span class="no">(<?php echo $no ?>)</span>
						<a href="<?php echo _VIEWS_URL_ ?>ecocenters/people.php?ec_id=<?php echo $ec_id ?>&people=admins" class="viewall iframe">View All</a>
					</h4>

					<div class="avatars">
						<?php
						$i = 0;
					 	if($admins){
							foreach ($admins as $key => $value) {
							if ($i++ == 7 ) break;?>
					 		<memberavatar class="tiptip" title="<?php echo $admins[$key]['name'] ?>" onclick="location.href='<?php echo members_display_profile_url($admins[$key]['id']) ?>'"><?php echo members_display_profile_thumb($admins[$key]['id']); ?></memberavatar>
					 	<?php
							}//End foreach
						}// End if?>
					</div>
				</div>
				<div id="settlers">
					<?php $settlers = people_get_settlers($ec_id);
					 		$no = count($settlers)?>
					<h4><div class="icon inhabitants"></div>Settlers <span class="no">(<?php echo $no ?>)</span>
						<a href="<?php echo _VIEWS_URL_ ?>ecocenters/people.php?ec_id=<?php echo $ec_id ?>&people=settlers" class="viewall iframe">View All</a>
					</h4>
					<div class="avatars">
						<?php
					 	if($settlers){
						$i = 0;
							foreach ($settlers as $key => $value) {
								if ($i++ == 7 ) break;?>
					 		<memberavatar title = "<?php echo $settlers[$key]['name'] ?>" class = "tiptip" onclick="location.href='<?php echo members_display_profile_url($settlers[$key]['id']) ?>'"><?php echo members_display_profile_thumb($settlers[$key]['id']); ?></memberavatar>
					 	<?php
							}//End foreach
						}else{
							echo "No Settlers Yet";
						}// End if?>
					</div>
				</div>
				<div id="currentvisitors">
					<?php $volunteers = people_get_volunteers($ec_id);
					 	$no = count($volunteers);?>
					<h4><div class="icon volunteer"></div>Current Volunteers <span class="no">(<?php echo $no ?>)</span>
						<a href="<?php echo _VIEWS_URL_ ?>ecocenters/people.php?ec_id=<?php echo $ec_id ?>&people=volunteers" class="viewall iframe">View All</a>
					</h4>
					<div class="avatars" >
						<?php
					 	if($volunteers){
							$i=0;
							foreach ($volunteers as $key => $value) {
							if ($i++ == 7 ) break;?>
					 		<memberavatar title = "<?php echo $volunteers[$key]['name'] ?>" class = "tiptip" onclick="location.href='<?php echo members_display_profile_url($volunteers[$key]['id']) ?>'"><?php echo members_display_profile_thumb($volunteers[$key]['id']); ?></memberavatar>
					 	<?php
							}//End foreach
						}else{
							echo "No Volunteers Now";
						}// End if?>
					</div>
					<?php $ecotravelers = people_get_ecotravelers($ec_id);
					 		$no = count($ecotravelers);?>
					<h4><div class="icon ecotraveler"></div>Current Ecotravelers <span class="no">(<?php echo $no ?>)</span>
							<a href="<?php echo _VIEWS_URL_ ?>ecocenters/people.php?ec_id=<?php echo $ec_id ?>&people=ecotravelers" class="viewall iframe">View All</a>
					</h4>
						<div class="avatars" >
							<?php

						 	if($ecotravelers){
								$i = 0;
								foreach ($ecotravelers as $key => $value) {
									if ($i++ == 7 ) break; ?>
						 		<memberavatar title = "<?php echo $ecotravelers[$key]['name'] ?>" class = "tiptip" onclick="location.href='<?php echo members_display_profile_url($ecotravelers[$key]['id']) ?>'"><?php echo members_display_profile_thumb($ecotravelers[$key]['id']); ?></memberavatar>
						 	<?php
								}//End foreach
							}else{
								echo "No Ecotravelers Now";
							}// End if?>
						</div>
				</div>
				<div id="followers">
					<?php $followers = people_get_followers($ec_id);
					 	$no = count($followers);?>
					<h4><div class="icon follower"></div>Followers <span class="no">(<?php echo $no ?>)</span>
						<a href="<?php echo _VIEWS_URL_ ?>ecocenters/people.php?ec_id=<?php echo $ec_id ?>&people=followers" class="viewall iframe">View All</a>
					</h4>
					<div class="avatars" >
						<?php
					 	if($followers){
							$i = 0;
							foreach ($followers as $key => $value) {
								if ($i++ == 7 ) break;?>
					 		<memberavatar title = "<?php echo $followers[$key]['name'] ?>" class = "tiptip" onclick="location.href='<?php echo members_display_profile_url($followers[$key]['id']) ?>'"><?php echo members_display_profile_thumb($followers[$key]['id']); ?></memberavatar>
					 	<?php
							}//End foreach
						}else{
							echo "No Followers Now";
						}// End if?>
					</div>
				</div>
				<div id="visitors">
					<h4><div class="icon visitor"></div>All time Visitors
						<a href="<?php echo _VIEWS_URL_ ?>ecocenters/people.php?ec_id=<?php echo $ec_id ?>&people=visitors" class="viewall iframe">View All</a>
					</h4>
					<div class="avatars" >
						<?php $visitors = people_get_visitors($ec_id);
					 	if($visitors){
						$i = 0;
							foreach ($visitors as $key => $value) {
								if ($i++ == 7 ) break;?>
					 		<memberavatar title = "<?php echo $visitors[$key]['name'] ?>" class = "tiptip" onclick="location.href='<?php echo members_display_profile_url($visitors[$key]['id']) ?>'"><?php echo members_display_profile_thumb($visitors[$key]['id']); ?></memberavatar>
					 	<?php
							}//End foreach
						}else{
							echo "No Visitors Now";
						}// End if?>
					</div>
				</div>

			</div>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	$('.tiptip').tipTip();
	$(document).ready(function(e){
		$("a.iframe").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'padding'		: 0,
				'speedIn'		:	300,
				'speedOut'		:	200,
				'overlayShow'	:	true,
				'width'			: 500,
				'height'		: 400,
				'overlayColor'	: '#000',
				'hideOnContentClick': false,
			});
		$('button.byplane').click(function(e){
			$('a.byplane').trigger('click');
		});
		$('button.bybus').click(function(e){
			$('a.bybus').trigger('click');
		});
		$('button.bycar').click(function(e){
			$('a.bycar').trigger('click');
		});

	});
</script>