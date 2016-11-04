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
		<h2>Vacancies <?php if ($myec): ?>
			<button class="green tiptip" title="Manage Vacancies" onclick="location.href='<?php echo _VIEWS_URL_ ?>ecocenters/admin/vacancies/manage_vacancies.php?ec_id=<?php echo $ec_id ?>'"><div class="iconic cog"></div></button>
		<?php endif ?></h2>
	<?php 	$vacancies = vacancies_get_all($ec_id);
	if($vacancies){
		 	foreach ($vacancies as $key => $value) {
				$id 			= $vacancies[$key]['id'];
			    $name 			= $vacancies[$key]['name'];
			    $description	= $vacancies[$key]['description'];
			    $spots			= $vacancies[$key]['spots'];
			    $datefrom 		= $vacancies[$key]['datefrom'];
			    $duration 		= $vacancies[$key]['duration'];
			    $tasks 			= $vacancies[$key]['tasks'];
			    $recompenses 	= $vacancies[$key]['recompenses'];
				$petal_id 		= $vacancies[$key]['petal_id'];
				$petal 			= $vacancies[$key]['petal'];
				$is_available 	= $vacancies[$key]['is_available'];
				if($is_available == 'true'){?>
				<div class="vacancy">
					<h3><?php echo $name ?>
						<?php if (!$myec){ ?>
							<button class="green applynow">Apply Now</button>
						<?php } ?>
					</h3>
					<div class="picthumbs">
						<?php
						$pictures = vacancies_get_pictures($ec_id, $id);
						if($pictures){
							$count = count($pictures);
							if ($count > 10){
								$count = 10;
							}
							for($key = 0; $key < $count ; $key++) { ?>
								<div class="picthumb">
									<a href="<?php echo $pictures[$key]['url'] ?>" class="iframe pic" rel="vacancy_<?php echo $id?>"><img src="<?php echo $pictures[$key]['thumb'];?>"></a>

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
						Spots Available: <?php echo $spots ?>
					</div>
					<div id="datefrom">
						Date: <?php echo $datefrom ?>
					</div>
					<div id="duration">
						Vacancy Duration:	<?php echo $duration ?>
					</div>
					<div id="tasks">
						Tasks:	<p><?php echo $tasks ?> </p>
					</div>
					<div id="recompenses">
						Recompenses:	<p><?php echo $recompenses ?> </p>
					</div>

				</div>

		<?php } // End if available
			} //End Foreach
		}else{
			echo "No Vacancies yet";
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