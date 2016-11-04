<?php include_once($_SERVER['DOCUMENT_ROOT'].'/_config/bootstrap.php');
	load_css_files('ecocenter');
	load_js_scripts('ecocenter');
	?>
<style>
	.left{
		float:left;
	}
	.right{
		float:right;
	}
	input, textarea{
		width:650px;
		font-size:16px;
	}
	textarea{
		height:120px;
	}
	#map{
		width:100%;
		height:300px;
	}
	#year{
		width:130px;
	}
	#landsize{
		width:105px;
	}
	#phone{
		width:200px;
		margin-right:7px;
	}
	button.green{
		margin:20px 0;
		float:right;
		font-size:28px;
		padding:10px 30px;
	}
	.checkboxes input{
		width:10px;
	}
	select {
	    background: none repeat scroll 0 0 #eee;
		font-family:Helvetica Neue;
		color:#aaa;
	    font-size: 16px;
	    margin-right: 7px;
	    margin-top: 5px;
	    padding: 4px 10px;


	}
	#website{
		width:430px;
	}
	input#address{
		width:640px;
	}
	content.registration{
		height:auto;

	}
	content p{
		font-size:15px;
		line-height:20px;

	}
	div.block{
		width:650px;
	}
	div.background{
		background:url("<?php echo _IMAGES_URL_ ?>/bg_slide.png") no-repeat top;
		height: 210px;
	    position: fixed;
	    top: 0;
	    width: 200px;
	}
	div.sky {
	    background-image: linear-gradient(bottom, rgb(153,236,247) 26%, rgb(71,191,255) 63%);
		background-image: -o-linear-gradient(bottom, rgb(153,236,247) 26%, rgb(71,191,255) 63%);
		background-image: -moz-linear-gradient(bottom, rgb(153,236,247) 26%, rgb(71,191,255) 63%);
		background-image: -webkit-linear-gradient(bottom, rgb(153,236,247) 26%, rgb(71,191,255) 63%);
		background-image: -ms-linear-gradient(bottom, rgb(153,236,247) 26%, rgb(71,191,255) 63%);

		background-image: -webkit-gradient(
			linear,
			left bottom,
			left top,
			color-stop(0.26, rgb(153,236,247)),
			color-stop(0.63, rgb(71,191,255))
		);
	    height: 123px;
	    position: fixed;
	    top: 0;
	    width: 100%;
	    z-index: -1;
	}
	background{
		background-image: linear-gradient(bottom, rgb(88,150,6) 26%, rgb(155,222,11) 63%);
		background-image: -o-linear-gradient(bottom, rgb(88,150,6) 26%, rgb(155,222,11) 63%);
		background-image: -moz-linear-gradient(bottom, rgb(88,150,6) 26%, rgb(155,222,11) 63%);
		background-image: -webkit-linear-gradient(bottom, rgb(88,150,6) 26%, rgb(155,222,11) 63%);
		background-image: -ms-linear-gradient(bottom, rgb(88,150,6) 26%, rgb(155,222,11) 63%);

		background-image: -webkit-gradient(
			linear,
			left bottom,
			left top,
			color-stop(0.26, rgb(88,150,6)),
			color-stop(0.63, rgb(155,222,11))
		);

	}
</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="<?php echo _PLUGINS_URL_ ?>gmap3/gmap3.min.js"></script>
<script src="<?php echo _PLUGINS_URL_ ?>gmap3/jquery-autocomplete.min.js"></script>
<background></background>
<div class="background"></div>
<div class="sky"></div>
<header><logo></logo></header>
<content class="registration">
	<h1>Ecocenter Registration !</h1>


	<div id="step1">
			<p>You are one step ahead from Registering your Eco-center<br/>
			By registering your Eco-center in Ecologikal.net you will have access to skillful volunteers all over the world willing to help you in the development of your Eco-center. </p>

		<p>	We provide you with the tools necessary to:</p>

			<h2>Skill oriented Volunteer Selection</h2>
				<p>With Ecologikal you can look for volunteers based on their Skills. This is achieved by using the <a href="#">Flower Module</a> which keeps track of member skills and allows other members of the community to rate them. Guess what? Your Eco-center also has th</p>

		<h2><span class="number">1</span> Basic Info</h2>
		<p>Please Provide us the Basic Details of your Eco-center</p>
		<div class="basicinfo block left">
			<input type="text" name="centername" value="" id="centername">
			<select id="status">
				<option value="null">-Status</option>
				<option value="planning">Planning</option>
				<option value="forming">Forming</option>
				<option value="formed">Formed</option>
			</select>
			<select id="type">
				<option value="null">-Type</option>
				<option value="urban">Urban</option>
				<option value="rural">Rural</option>
				<option value="suburban">Suburban</option>
			</select>
			<input type="text" name="year" value="" id="year">
			<input type="text" name="landsize" value="" id="landsize">
			<select id="units">
				<option value="null">-Units</option>
				<option value="Ha">Ha</option>
				<option value="sq">Sq Feet</option>
			</select>

			<input type="text" name="phone" value="" id="phone">
			<input type="text" name="website" value="" id="website">
			<textarea id="description"></textarea >
		</div>
		<button class="green nextstep">Next Step</button>
	</div>
	<div id="step2" class="nodisplay">
		<h2 ><span class="number">2</span>Location</h2>
			<p>Please type the address (or the closest address) of your Ecocenter</p>
			<input type="text" name="address" value="" id="address">
			<h3 class="pleasedrag nodisplay">Please Drag the Marker to the exact position of your Eco Center to continue</h3>
			<div id="map" ></div>
			<a href="#" class="back">Back</a><button class="green nextstep nodisplay">Next Step</button>

	</div>
	<div id="step3" class="nodisplay">
		<h2 ><span class="number">3</span>Services & Activities</h2>
			<p>Select which services are offered in your Eco-center</p>

			<div class="checkboxes" id="services">
				<?php $services = ec_get_cat_services();
				foreach ($services as $key => $value){ ?>
					<input type="checkbox" name="service" value="<?php echo $services[$key]['id'] ?>" id="service_<?php echo $key ?>">
					<label for="service_<?php echo $key ?>"><?php echo $services[$key]['name'] ?></label>
				<?php } ?>
			</div>

			<p>Select which activities are offered in your Eco-center</p> <br>

			<div class="checkboxes" id="activities"><?php $acitvities = ec_get_cat_activities();
			foreach ($acitvities as $key => $value){ ?>
				<input type="checkbox" name="activity" value="<?php echo $acitvities[$key]['id'] ?>" id="activity_<?php echo $key ?>">
				<label for="activity_<?php echo $key ?>"><?php echo $acitvities[$key]['name'] ?></label>
			<?php } ?>
			</div>

		<a class="green back">Go Back</a><button class="green nextstep ">Next Step</button>
	</div>
	<div id="step4" class="nodisplay">
		<h2><span class="number">4</span>Diet & Spirituality</h2>
		<input type="text" name="foodgrown" value="" id="foodgrown">
		<p>Choose the Dietary Practices of the people in your Eco-center </p>
		<div class="checkboxes" id="diet"><?php $diet = ec_get_cat_dietary_practice();
			foreach ($diet as $key => $value){ ?>
				<input type="checkbox" name="diet" value="<?php echo $diet[$key]['id'] ?>" id="diet_<?php echo $key ?>">
				<label for="diet_<?php echo $key ?>"><?php echo $diet[$key]['name'] ?></label>
		<?php } ?>
		</div>
		<p>Select the Kind of Spiritual Practices in your Ecocenter </p>
		<div class="checkboxes" id="spirituality"><?php $spirituality = ec_get_cat_spiritual_practices();
			foreach ($spirituality as $key => $value){ ?>
				<input type="checkbox" name="diet" value="<?php echo $spirituality[$key]['id'] ?>" id="spiritual_<?php echo $key ?>">
				<label for="spiritual_<?php echo $key ?>"><?php echo $spirituality[$key]['name'] ?></label>
			<?php } ?>
		</div>
		<a href="#" class="back">Back</a><button class="green nextstep">Next Step</button>
	</div>
	<div id="step5" class="nodisplay">
		<h2><span class="number">5</span>Orientation & Rules</h2>

		<p>Select the orientation of your Ecocenter </p>
		<div class="checkboxes" id="orientation"><?php $orientations = ec_get_cat_orientation();
			foreach ($orientations as $key => $value){ ?>
				<input type="checkbox" name="orientation" value="<?php echo $orientations[$key]['id'] ?>" id="orientation_<?php echo $key ?>">
				<label for="orientation_<?php echo $key ?>"><?php echo $orientations[$key]['name'] ?></label>
			<?php } ?>
		</div>
		<p>Please select the rules that apply to your Ecocenter</p>
		<select id="meals">
			<option value="null">-Shared meals</option>
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select>
		<select id="alcohol">
			<option value="null">-Alcohol Use</option>
			<option value="allowed">Allowed</option>
			<option value="notallowed">Not Allowed</option>
			<option value="withmoderation">With Moderation</option>
		</select>
		<select id="tobacco">
			<option value="null">-Tobbaco Use</option>
			<option value="allowed">Allowed</option>
			<option value="notallowed">Not Allowed</option>
		</select>
		<textarea id="restrictions"></textarea>
		<a href="#" class="back">Go Back</a><button class="green register_ecocenter">Register</button>
	</div>
</content>
<script>

$(document).ready(function(e){

	$('#website').watermark("Your Ecocenter's Website");
	$('#centername').watermark('Type your center name').focus();
	$('#year').watermark('Year of creation');
	$('#description').watermark('Type a description for your center');
	$('#phone').watermark('Contact Phone').mask('(99) 999 99 99 999');
	$('#landsize').watermark('Land Size');
	$('#foodgrown').watermark('Percentage of food grown in your center');
	$('#restrictions').watermark('Other Restrictions');
	$('div.checkboxes').buttonset();

	$('#step1 button.nextstep').click(function(e){
		validated = true;
			$('.basicinfo input, .basicinfo textarea, .basicinfo select').each(function(e){
				status = $(this).data('status');
				if (status != 'valid'){
					validated = false;
					$(this).css({background: '#B3236C', 'border': '2px solid #924'});
					$('#centername').focus();
				}else{
					$(this).css({background: '#E6E6E6', 'border': '1px solid #999'});
				}
			});
			if (validated === true){
					$('#step1').slideUp(200);
					$('#step2').slideDown(200);
					$('#address').focus();
					validated = false;
			}
	});
	$('#step2 .nextstep').click(function(e){
		$('#step2').slideUp(200);
		$('#step3').slideDown(200);
	});
	$('#step3 .nextstep').click(function(e){
		$('#step3').slideUp(200);
		$('#step4').slideDown(200);
		$('#foodgrown').focus();
	});
	$('#step4 .nextstep').click(function(e){
		$('#step4').slideUp(200);
		$('#step5').slideDown(200);
	});
	$('#step2 .back').click(function(e){
		e.preventDefault();
		$('#step2').slideUp(200);
		$('#step1').slideDown(200);
	});
	$('#step3 .back').click(function(e){
		e.preventDefault();
		$('#step3').slideUp(200);
		$('#step2').slideDown(200);
	});
	$('#step4 .back').click(function(e){
		e.preventDefault();
		$('#step4').slideUp(200);
		$('#step3').slideDown(200);
	});
	$('#step5 .back').click(function(e){
		e.preventDefault();
		$('#step5').slideUp(200);
		$('#step4').slideDown(200);
	});
	// General Validation of fields
	$('input, textarea').focusout(function(e){

		if ($(this).attr('id') != 'landsize' || $(this).attr('id') != 'year'){
			if ($(this).val() == ''){
				$(this).css({background: '#B3236C', 'border': '2px solid #924'});
				$(this).data("status", "invalid");
			}else{
				$(this).css({background: '#E6E6E6', 'border': '1px solid #999'});
				$(this).data("status", "valid");
			}
		}

	});
	// Validating number fields
	$('#landsize, #year').focusout(function(e){
		d = new Date();
		year = d.getFullYear();
		id = $(this).attr('id');
		if (id == 'year'){
			if ($(this).val() > 1800 && $(this).val() <= year){
				$(this).css({background: '#E6E6E6', 'border': '1px solid #999'});
				$(this).data("status", "valid");
			}else{
				$(this).css({background: '#B3236C', 'border': '2px solid #924'});
				$(this).data("status", "invalid");
			}
		}else{
			if ($(this).val() > 0 ){
				$(this).css({background: '#E6E6E6', 'border': '1px solid #999'});
				$(this).data("status", "valid");
			}else{
				$(this).css({background: '#B3236C', 'border': '2px solid #924'});
				$(this).data("status", "invalid");
			}
		}


	});
	// Validating Selects

	$('select').change(function(e){
		if ($(this).val()=='null'){
			$(this).data("status", "invalid");
			$(this).css({background: '#B3236C', 'border': '2px solid #924'});
		}else{
			$(this).data("status", "valid");
			$(this).css({background: '#E6E6E6', 'border': '1px solid #999'});
		}
	});

	// Save Eco center
	$('button.register_ecocenter').click(function(e){
		var services = [];
		$("#services :checked").each(function() {
		  services.push($(this).val());
		});
		var activities = [];
		$("#activities :checked").each(function() {
		  activities.push($(this).val());
		});
		var diet = [];
		$("#diet :checked").each(function() {
		  diet.push($(this).val());
		});
		var spirituality = [];
		$("#spirituality :checked").each(function() {
		  spirituality.push($(this).val());
		});
		var orientations = [];
		$("#orientation :checked").each(function() {
		  orientations.push($(this).val());
		});
		var	type		= $('#type').val(),
			name		= $('#centername').val(),
			year		= $('#year').val(),
			phone		= $('#phone').val(),
			description	= $('#description').val(),
			landsize		= $('#landsize').val(),
			units		= $('#units').val(),
			status		= $('#status').val(),
			foodgrown	= $('#foodgrown').val(),
			meals		= $('#meals').val(),
			tobacco		= $('#tobacco').val(),
			alcohol		= $('#alcohol').val(),
			restrictions= $('#restrictions').val(),
			website		= $('#website').val(),


		queryurl = BACKEND_URL+'ecocenters/save_ecocenter.php';
		$.post(queryurl, {
		  	latitude	: latitude,
		  	longitude	: longitude,
			description	: description,
		  	status		: status,
		  	type		: type,
		  	name 		: name,
		  	year		: year,
		  	phone		: phone,
		  	address		: address,
		  	landsize	: landsize,
			units		: units,
			services	: services,
			activities	: activities,
			diet		: diet,
			foodgrown	: foodgrown,
			meals		: meals,
			tobacco		: tobacco,
			alcohol		: alcohol,
			restrictions: restrictions,
			website		: website,
			spirituality: spirituality,
			orientations: orientations
		  },
		  function(data){
			location.href="ecocenter_payment.php?ec_id="+data;
		  });

	});
	queryurl = BACKEND_URL + '_general/getcountrylist.php';
	$('#address').autocomplete({
	            source: function() {
	              $("#map").gmap3({
	                action:'getAddress',
	                address: $(this).val(),
	                callback:function(results){
	                  if (!results) return;
	                  $('#address').autocomplete(
	                    'display',
	                    results,
	                    false
	                  );
	                }
	              });
	            },
	            cb:{
	              cast: function(item){
	                return item.formatted_address;
	              },
	              select: function(item) {
					$('.pleasedrag').slideDown(200);

					$('#map').gmap3({
						action: 'addMarker',
						latLng: item.geometry.location,
						map:{
							center: true,
							zoom: 15,
							mapTypeId: google.maps.MapTypeId.TERRAIN
						},
						marker:{
							options:{
								draggable:true
							},
							events:{
								dragend: function(marker){
									$(this).parent().find('.nextstep').fadeIn(200);
									$(this).gmap3({
										action:'getAddress',
										latLng:marker.getPosition(),
										callback:function(results){
											var map = $(this).gmap3('get'),
											content = results && results[1] ? results && results[1].formatted_address : 'no address';


											address = results[0].formatted_address;
											address = String(address);
											$('#address').val(address);
											// LAT LNG
											latlng = marker.getPosition();
											latlng = String(latlng).replace(')','').replace('(','');;
											latlng = latlng.split(',');
											latitude = latlng[0];
											longitude = latlng[1];



										}
									});
								}
							}
						}
					});
	              }

	            }
	          })
	          .watermark('Type an Address');
});

</script>