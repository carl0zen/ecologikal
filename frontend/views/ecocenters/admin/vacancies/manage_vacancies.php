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
		<h1>Volunteer Vacancies Admin </h1>
		<button class="green backtoprofile" onclick="location.href='<?php echo _VIEWS_URL_ ?>ecocenters/profile.php?ec_id=<?php echo $ec_id ?>'">Back to Profile</button>
		<p>These are your vacancies, you can update availability by simply clicking on the available button</p>
		<a href="<?php echo _VIEWS_URL_ ?>ecocenters/admin/vacancies/new_vacancy.php?ec_id=<?php echo $ec_id ?>" class="iframe new_vacancy fancylink">New Vacancy</a>
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
					?>
					<div class="vacancy">
						<h3><?php echo $name ?> <span class="icon delete deletevacancy"></span></h3>
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

						<a href="<?php echo _VIEWS_URL_ ?>ecocenters/pictureuploader.php?type=vacancy&ec_id=<?php echo $ec_id ?>&vacancy_id=<?php echo $id ?>" class="iframe fancylink">Add Pics</a>
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
						<div id="is_available">
							 <input type="checkbox" id="availability_<?php echo $id ?>"
								<?php $is_available = vacancies_is_available($ec_id, $id);
								 		if($is_available == 'true'){
											echo "checked = 'checked'";
										} ?>/>

						</div>
					</div>
					
			<?php } //End Foreach
			}else{
				echo "No Vacancies yet";
			}//End if roooms 
}else{
	echo "<h1>you are not allowed to be here</h1>";
}// If My ec?>
</content>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(e){
		$("a.fancylink, a.pic, a.iframe").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'padding'		: 0,
				'speedIn'		:	300, 
				'speedOut'		:	200, 
				'overlayShow'	:	true,
				'width'			: 700,
				'height'		: 500, 
				'overlayColor'	: '#000',
				'hideOnContentClick': false,
			});
		ec_id = <?php echo $ec_id ?>;
		$('span.delete.icon').click(function(e){
			answer = confirm('Are you sure you want to delete this Vacancy?');
			
			if(answer){
				vacancy_id = $(this).parent().parent().find('#id').val();
				queryurl = BACKEND_URL + 'ecocenters/vacancies/deletevacancy.php';
				$.post(queryurl,{vacancy_id:vacancy_id, ec_id:ec_id}, function(e){

				});

				$(this).parent().parent().remove();
			}
			
		});
		$('#is_available input').each(function(e){
			$(this).data('vacancy_id', $(this).parent().parent().find('#id').val());
			
			$(this).iphoneStyle({
				checkedLabel: 'YES', 
				uncheckedLabel: 'NO',
				onChange: function(elem, value){
					var vacancy_id = elem.data('vacancy_id');
					queryurl = BACKEND_URL + 'ecocenters/vacancies/updatestatus.php';
					$.post(queryurl, {vacancy_id:vacancy_id, is_available: value, ec_id:ec_id},function(e){

					})
				}
			})
		});
	
	});
</script>