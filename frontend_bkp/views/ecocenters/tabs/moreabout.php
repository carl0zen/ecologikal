<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$ec_id = $_GET['ec_id'];

$name = ec_get_name($ec_id);

$user_id = $_SESSION['user_id'];
//If the user is profile a true value is stored
$myec = people_is_admin($ec_id, $user_id);
?>
<div id="tabs-2">
	<div id="profilecontent" class="clearfix">
		<?php if ($myec): ?>
			<button class="green managediet">Manage Section</button>
		<?php endif ?>
		<table id="moreabout">
			<tr>
				<td><h2><div class="icon facilities"></div>Facilities</h2></td>
				<td><h2><div class="icon age"></div>Orientation</h2></td>
				<td><h2><div class="icon activities"></div>Activities</h2></td>
			</tr>
			<tr>
				<td>

					<?php $services = ec_get_services($ec_id);
						 foreach ($services as $key => $value) { ?>
							<div class="item"><?php echo $services[$key]['name']; ?></div>
						<?php } ?>
				</td>

				<td>
					<?php $orientations = ec_get_orientations($ec_id);
					 	foreach ($orientations as $key => $value) { ?>
							<div class="item"><?php echo $orientations[$key]['name']; ?></div>
						<?php } ?>
				</td>
				<td>

					<?php $activities = ec_get_activities($ec_id);
					 	foreach ($activities as $key => $value) { ?>
							<div class="item"><?php echo $activities[$key]['name']; ?></div>
						<?php } ?>
				</td>
			</tr>
			<tr>
				<td><h2><div class="icon spirituality"></div>Spirituality</h2></td>
				<td><h2><div class="icon diet"></div>Diet</h2></td>
			</t>
			<tr>
				<td>

					<?php $spiritualpr = ec_get_spiritual_practices($ec_id);
					 	foreach ($spiritualpr as $key => $value) { ?>
							<div class="item"><?php echo $spiritualpr[$key]['name']; ?></div>
						<?php } ?>
				</td>
				<td>

					<?php $dietarypr = ec_get_dietary_practices($ec_id);
					 	foreach ($dietarypr as $key => $value) { ?>
							<div class="item"><?php echo $dietarypr[$key]['name']; ?></div>
						<?php } ?>
				</td>
				<td>

				</td>
			</tr>
		</table>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(e){


	});
</script>