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
<content>

	<?php
if ($myec){ ?>
		<h1>Rooms Admin </h1>
		<button class="green backtoprofile" onclick="location.href='<?php echo _VIEWS_URL_ ?>ecocenters/profile.php?ec_id=<?php echo $ec_id ?>'">Back to Profile</button>
		<p>These are your rooms, you can update availability by simply clicking on the available button</p>
		<a href="<?php echo _VIEWS_URL_ ?>ecocenters/admin/bookings/newroom.php?ec_id=<?php echo $ec_id ?>" class="iframe newroom fancylink">New Room</a>
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
					$min_stay = $rooms[$key]['min_stay']; ?>
					<div class="room">
						<h3><?php echo $name ?> <span class="icon delete deleteroom"></span></h3>
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

						<a href="<?php echo _VIEWS_URL_ ?>ecocenters/pictureuploader.php?type=room&ec_id=<?php echo $ec_id ?>&room_id=<?php echo $id ?>" class="iframe fancylink">Add Pics</a>
						<input type="hidden" name="id" value="<?php echo $id ?>" id="id">
						<div class="description"><?php echo $description ?></div>
						<div id="capacity">
							Room Capacity: <?php echo $capacity ?>
						</div>
						<div id="type">
							Room Type: <?php echo $type ?>
						</div>
						<div id="price">
							$<?php echo $price ?> <?php echo get_currency_code($currency_id); ?>
						</div>
						<div id="is_available">
							 <input type="checkbox" id="availability_<?php echo $id ?>"
								<?php $is_available = bookings_is_room_available($ec_id, $id);
								 		if($is_available == 'true'){
											echo "checked = 'checked'";
										} ?>/>

						</div>
					</div>

			<?php } //End Foreach
			}else{
				echo "No rooms yet";
			}//End if roooms
}else{
	echo "<h1>you are not allowed to be here</h1>";
}// If My ec?>
</content>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(e){
		ec_id = <?php echo $ec_id ?>;
		$('span.delete.icon').click(function(e){
			answer = confirm('Are you sure you want to delete this room?');

			if(answer){
				room_id = $(this).parent().parent().find('#id').val();
				queryurl = BACKEND_URL + 'ecocenters/bookings/deleteroom.php';
				$.post(queryurl,{room_id:room_id, ec_id:ec_id}, function(e){

				});

				$(this).parent().parent().slideUp(100);
			}

		});
		$('#is_available input').each(function(e){
			$(this).data('room_id', $(this).parent().parent().find('#id').val());

			$(this).iphoneStyle({
				checkedLabel: 'YES',
				uncheckedLabel: 'NO',
				onChange: function(elem, value){
					var room_id = elem.data('room_id');
					queryurl = BACKEND_URL + 'ecocenters/bookings/updateroomstatus.php';
					$.post(queryurl, {room_id:room_id, is_available: value, ec_id:ec_id},function(e){

					})
				}
			})
		});

	});
</script>