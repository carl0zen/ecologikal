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
?>
<div id="tabs-5">
	<div id="profilecontent" class="clearfix">
		<h2>Accomodation
			<?php if ($myec): ?>
				<button class="green tiptip" title="Manage Rooms" onclick="location.href='<?php echo _VIEWS_URL_ ?>ecocenters/admin/bookings/managerooms.php?ec_id=<?php echo $ec_id ?>'"><div class="iconic cog"></div></button>
				<select id="currency">
					<option value="null">Display Prices in</option>
					<?php $currencies = get_currencies();
					 	foreach ($currencies as $key => $value) { ?>
							<option value="<?php echo $currencies[$key]['id']; ?>"><?php echo $currencies[$key]['code'] ?> - <?php echo $currencies[$key]['name'] ?></option>
					 	<?php
					 	}?>
				</select>
			<?php endif ?>

		</h2>
	<?php 	$rooms = bookings_get_rooms($ec_id);
	if($rooms){
		 	foreach ($rooms as $key => $value) {
				$id = $rooms[$key]['id'];
				$name = $rooms[$key]['name'];
				$description = $rooms[$key]['description'];
				$capacity = $rooms[$key]['capacity'];
				$type = $rooms[$key]['type'];
				$price = $rooms[$key]['price'];
				$currency_id = $rooms[$key]['currency_id'];
				$min_stay = $rooms[$key]['min_stay'];
				$is_available = $rooms[$key]['is_available'];
				if($is_available == 'true'){?>
				<div class="room">
					<h3><?php echo $name ?>
						<div id="price">
							$<?php echo $price ?> <?php echo get_currency_code($currency_id); ?>
						</div>
					</h3>
					<div class="picthumbs">
						<?php
						$pictures = bookings_get_room_pictures($ec_id, $id);
						if($pictures){
							$count = count($pictures);
							if ($count > 10){
								$count = 10;
							}
							for($key = 0; $key < $count ; $key++) { ?>
								<div class="picthumb">
									<a href="<?php echo $pictures[$key]['url'] ?>" class="iframe pic" rel="room_<?php echo $id?>"><img src="<?php echo $pictures[$key]['thumb'];?>"></a>

								</div>
									<?php
							}//end foreach
						}else{
							echo "No pictures Yet";
						}
						?>
					</div>


					<input type="hidden" name="id" value="<?php echo $id ?>" id="id">
					<div class="description"><?php echo $description ?></div>
					<div id="capacity">
						Room Capacity: <?php echo $capacity ?>
					</div>
					<div id="type">
						Room Type: <?php echo $type ?>
					</div>
					<?php if(!$myec){ ?>
						<button class="green booknow">Book Now</button>
					<?php } ?>
				</div>

		<?php }//End if
		 	} //End Foreach
		}else{
			echo "No rooms yet";
		}//End if roooms ?>
		</div>
</div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(e){
		$('.tiptip').tipTip();
			$("a.fancylink, a.pic").fancybox({
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
	});
</script>