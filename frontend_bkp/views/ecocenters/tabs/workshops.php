<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$ec_id = $_GET['ec_id'];

$name = ec_get_name($ec_id);
$user_id = $_SESSION['user_id'];
//If the user is profile a true value is stored
$myec = people_is_admin($ec_id, $user_id);
?>
<div id="tabs-5">
	<div id="profilecontent" class="clearfix">
		<h2>Workshops <?php if ($myec): ?>
			<button class="green tiptip" title="Manage Workshops" onclick="location.href='<?php echo _VIEWS_URL_ ?>ecocenters/admin/workshops/manage_workshops.php?ec_id=<?php echo $ec_id ?>'"><div class="iconic cog"></div></button>
			<select id="currency">
				<option value="null">Display Prices in</option>
				<?php $currencies = get_currencies();
				 	foreach ($currencies as $key => $value) { ?>
						<option value="<?php echo $currencies[$key]['id']; ?>"><?php echo $currencies[$key]['code'] ?> - <?php echo $currencies[$key]['name'] ?></option>
				 	<?php
				 	}?>
			</select>
		<?php endif ?></h2>
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
				$is_available 	= $workshops[$key]['is_available'];
				if($is_available == 'true'){	?>
				<div class="workshop">
					<h3><?php echo $name ?> <span class="petal"><?php echo $petal ?></span>
						<div id="price">
							Price:	$<?php echo $price ?> <?php echo get_currency_code($currency_id); ?>
						</div></h3>
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


					<input type="hidden" name="id" value="<?php echo $id ?>" id="id">
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
					<?php if(!$myec){ ?>
						<button class="green booknow">Book Now</button>
					<?php } ?>
				</div>

		<?php } // End if available
			} //End Foreach
		}else{
			echo "No Workshops yet";
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