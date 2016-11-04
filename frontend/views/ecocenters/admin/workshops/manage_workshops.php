<?php

$view = 'ecocenter'; // This is for determining which scripts and css are going to be loaded
include_once("/Users/ads/Documents/WEB/ECOLOGIKAL/header.php");
 
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
		<h1>Workshops Admin </h1>
		<button class="green backtoprofile" onclick="location.href='<?php echo _VIEWS_URL_ ?>ecocenters/profile.php?ec_id=<?php echo $ec_id ?>'">Back to Profile</button>
		<p>These are your Workshops, you can update availability by simply clicking on the available button</p>
		<a href="<?php echo _VIEWS_URL_ ?>ecocenters/admin/workshops/new_workshop.php?ec_id=<?php echo $ec_id ?>" class="iframe new_workshop fancylink">New Room</a>
		<?php 	$workshops = workshops_get_all($ec_id);
		if($workshops){
			 	foreach ($workshops as $key => $value) {
					$id 			= $workshops[$key]['id'];		
					$name 			= $workshops[$key]['name'];		
					$description	= $workshops[$key]['description'];
					$max_capacity	= $workshops[$key]['max_capacity'];
					$min_allowance	= $workshops[$key]['min_allowance']; 
					$datefrom 		= $workshops[$key]['datefrom'];	
					$duration 		= $workshops[$key]['duration'];	
					$price 			= $workshops[$key]['price'];	
					$currency_id 	= $workshops[$key]['currency_id'];
					$currency 		= $workshops[$key]['currency'];
					$petal_id 		= $workshops[$key]['petal_id'];
					$petal 			= $workshops[$key]['petal'];		
					?>
					<div class="workshop">
						<h3><?php echo $name ?> <span class="icon delete deleteworkshop"></span></h3>
						<div class="picthumbs">
							<?php
							$pictures = workshops_get_pictures($ec_id, $id);
							if($pictures){
								$count = count($pictures);
								if ($count > 10){
									$count = 10;
								}
								for($key = 0; $key < $count ; $key++) { ?>
									<div class="picthumb">
										<a href="<?php echo $pictures[$key]['url'] ?>" class="iframe pic" rel="workshop_<?php echo $id?>"><img src="<?php echo $pictures[$key]['thumb'];?>"></a>
										
									</div>
										<?php			
								}//end foreach
							}else{	
								echo "No pictures Yet";
							}
							?>
						</div>

						<a href="<?php echo _VIEWS_URL_ ?>ecocenters/pictureuploader.php?type=workshop&ec_id=<?php echo $ec_id ?>&workshop_id=<?php echo $id ?>" class="iframe fancylink">Add Pics</a>
						<input type="hidden" name="id" value="<?php echo $id ?>" id="id">
						<a href="edit_workshop.php?ec_id=<?php echo $ec_id ?>&workshop_id=<?php echo $id ?>" class="iframe fancylink">Edit Workshop</a>
						<div class="description"><?php echo $description ?></div>
						<div id="capacity">
							Max Capacity: <?php echo $max_capacity ?>
						</div>
						<div id="type">
							Min People to open Group: <?php echo $min_allowance ?>
						</div>
						<div id="datefrom">
							Date: <?php echo $datefrom ?>
						</div>
						<div id="duration">
							Workshop Duration:	<?php echo $duration ?>
						</div>
						<div id="price">
							Price:	$<?php echo $price ?> <?php echo get_currency_code($currency_id); ?>
						</div>
						<div id="is_available">
							 <input type="checkbox" id="availability_<?php echo $id ?>"
								<?php $is_available = workshops_is_available($ec_id, $id);
								 		if($is_available == 'true'){
											echo "checked = 'checked'";
										} ?>/>

						</div>
					</div>
					
			<?php } //End Foreach
			}else{
				echo "No Workshops yet";
			}//End if roooms 
}else{
	echo "<h1>you are not allowed to be here</h1>";
}// If My ec?>
</content>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(e){
		ec_id = <?php echo $ec_id ?>;
		$('span.delete.icon').click(function(e){
			answer = confirm('Are you sure you want to delete this Workshop?');
			
			if(answer){
				workshop_id = $(this).parent().parent().find('#id').val();
				queryurl = BACKEND_URL + 'ecocenters/workshops/deleteworkshop.php';
				$.post(queryurl,{workshop_id:workshop_id, ec_id:ec_id}, function(e){

				});

				$(this).parent().parent().remove();
			}
			
		});
		$('#is_available input').each(function(e){
			$(this).data('workshop_id', $(this).parent().parent().find('#id').val());
			
			$(this).iphoneStyle({
				checkedLabel: 'YES', 
				uncheckedLabel: 'NO',
				onChange: function(elem, value){
					var workshop_id = elem.data('workshop_id');
					queryurl = BACKEND_URL + 'ecocenters/workshops/updatestatus.php';
					$.post(queryurl, {workshop_id:workshop_id, is_available: value, ec_id:ec_id},function(e){

					})
				}
			})
		});
	
	});
</script>