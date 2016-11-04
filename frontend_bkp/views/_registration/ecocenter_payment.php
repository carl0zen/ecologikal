<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
load_css_files('ecocenter');
load_js_scripts('ecocenter');

$ec_id = $_GET['ec_id'];
$name = ec_get_name($ec_id);
$latitude = ec_get_info('latitude', $ec_id);
$longitude = ec_get_info('longitude', $ec_id);
$latitude = ec_get_info('latitude', $ec_id);
$status = ec_get_info('status', $ec_id);
?>
<style>
	.innerfields{
		text-align:center;
	}
	strong {
		font-size:18px;
	}
	button.stdaccount{
		font-size:25;
		padding:14 17px;
	}
	button.unlimitedaccount{
		font-size:14px;
		padding:7px 10px;
	}
	span.ui-icon {
	position: relative;
	float: right;
	width: 16px;
	margin-top: 0px;

	}
</style>
<content>
	<h1>Welcome to the family!</h1>
	<h2>You have successfully registered <?php echo $name ?></h2>
	You are about to experience the revolution in global cooperation. All of our efforts are focused on creating a world wide hub of people looking forward to live a more sustainable life. However we need to run the network, and it costs, for this reason we offer different services:</p>
	<table border="0" cellspacing="5" cellpadding="5">
		<tr><th></th>
			<th class="innerfields">Free</th>
			<th class="innerfields">Standard</th>
			<th class="innerfields">Unlimited</th>
		</tr>
		<tr>
			<td>Profile</td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
		</tr>
		<tr>
			<td>Media Gallery</td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
		</tr>
		<tr>
			<td>Flower of Activities</td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
		</tr>
		<tr>
			<td>Reviews</td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>close.png"></td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>

		</tr>
		<tr>
			<td>Places</td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>close.png"></td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
		</tr>
		<tr>
			<td>Volunteer Vacancies</td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>close.png"></td>
			<td class="innerfields tiptip" title="$7 USD per extra volunteer <h2> or 700 kins</h2>">3 <span class="ui-icon ui-icon-info"></span></td>
			<td class="innerfields">Unlimited</td>
		</tr>
		<tr>
			<td>Workshop Bookings</td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>close.png"></td>
			<td  class="innerfields tiptip" title="10 % comission per transaction">
				<img src="<?php echo _IMAGES_URL_ ?>tick.png">
				<span class="ui-icon ui-icon-info"></span>
			</td>
			<td  class="innerfields tiptip" title="Only 7 % comission per transaction">
				<img src="<?php echo _IMAGES_URL_ ?>tick.png">
				<span class="ui-icon ui-icon-info"></span>
			</td>
		</tr>
		<tr>
			<td>Event Bookings</td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>close.png"></td>
			<td  class="innerfields tiptip" title="10 % comission per transaction">
				<img src="<?php echo _IMAGES_URL_ ?>tick.png">
				<span class="ui-icon ui-icon-info"></span>
			</td>
			<td  class="innerfields tiptip" title="Only 7 % comission per transaction">
				<img src="<?php echo _IMAGES_URL_ ?>tick.png">
				<span class="ui-icon ui-icon-info"></span>
			</td>
		</tr>
		<tr>
			<td>Room Bookings</td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>close.png"></td>
			<td  class="innerfields tiptip" title="10 % comission per transaction">
				<img src="<?php echo _IMAGES_URL_ ?>tick.png">
				<span class="ui-icon ui-icon-info"></span>
			</td>
			<td  class="innerfields tiptip" title="Only 7 % comission per transaction">
				<img src="<?php echo _IMAGES_URL_ ?>tick.png">
				<span class="ui-icon ui-icon-info"></span>
			</td>
		</tr>
		<tr>
			<td>Skill Certification</td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>close.png"></td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>close.png"></td>
			<td class="innerfields"><img src="<?php echo _IMAGES_URL_ ?>tick.png"></td>
		</tr>
		<tr>
			<td><strong>Monthly Costs</strong></td>
			<td class="innerfields"><h4>Free</h4></td>
			<td class="innerfields"><h4>$13 USD or 1300 kins</h4></td>
			<td class="innerfields"><h4>$39 USD or 3900 kins</h4></td>
		</tr>
		<tr>
			<td></td>
			<td class="innerfields"><a href="<?php echo _VIEWS_URL_ ?>ecocenters/profile.php?ec_id=<?php echo $ec_id ?>" class="green freeaccount">Always Free</a></td>
			<td class="innerfields"><button class="green stdaccount">Upgrade</button></td>
			<td class="innerfields"><button class="green unlimitedaccount">Upgrade</button></td>
		</tr>
	</table>


	<?php if($status == 'forming'){ ?>
		<div id="specialoffer">
			<h2>Special Offer</h2>

			<p>To help you in the process of creating your Ecocenter we decided to give you access to a<strong>Standard Account completely FREE for 3 months</strong> so you can get your Ecocenter Moving.</p>
			<p>NO credit card required, NO payment required.</p>
			<button class="green upgradeaccount">Upgrade for free Now</button>
		</div>
	<?php } ?>
	<div id="referral">
		<h2>Refer Friends and Earn Kins</h2>
		If you know of any ecocenter interested on this services please provide their e-mail and we will send them an invitation. These 	invitations also generate Kins! (+130 kins per Eco Center that subscribes). So if you refer to 10 Ecocenters you get <strong>1 Extra Month for FREE of the standard account</strong>
		<button class="green addemail">Invite Ecocenter</button>
		<textarea id="invitemessage">We invite you to this amazing Portal, it will help your ecocenter achieve sustainability through a very interesting travelers' game, You should join!</textarea>
	</div>
</content>
<script>
	$(document).ready(function(e){
		$('.addemail').click(function(e){
			$(this).parent().append('<input type="text" name="email" value="" id="email">').find('#email').watermark('Type an email').focus();
		});
	});
</script>