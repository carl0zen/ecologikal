<?php 
	$view = 'member_registration';
	$step = $_SESSION['registration_step'] = 1;
	
	
	include("../../../header_nobar.php");
	$user_id = $_SESSION['user_id'];
	
	
		?>
		<style>
			input#name-input {
				/*float: left; width:60%;text-align:left;margin-left:10px*/
				width: 55%;
				float: left;
				background-color: transparent;
				color: black;
				font-size: 50px;
				outline: none;
			}
			
			div#current-location {
				margin-top: 33px;
				margin-right: 20px;
				font-size: 20px;
				float: right;
				background-color: transparent;
			}
			
			div#name {
				background-color: rgba(255, 255, 255, 0.6);
			}
			
			div#name:hover {
				background-color: rgba(255, 255, 255, 0.8);
			}
			
			div#cover {
				min-height: 277px;
			}
			
			
			div#cover img {
				width: 852px;
			}
			
			a#change-pic {
				float: right;
				margin-top: 10px;
			}
			
			/* Hidden map */
			#map {
				display: none;
				height: 0px;
				width: 0px;
			}
		</style>
		<div class="wrapper">
			<div id="content" >
				
				<div class="padding10">
					<a class="button green  fright " href="javascript:sendInfo()">Siguiente Paso</a>
					<h1 class="fontwhite">Bienvenido a Ecologikal! </h1>
					<div id='cover' class='width100 center'>
						<div id="name">
							
							<input id="name-input" class="tiptip" title="Click para cambiar nombre" value="<?=members_get_info('nombre', $user_id)?>"/>
							<div id="div-ubicacion">
								<div id="current-location" style="display:none">
									<span id="current-location">Getting location...</span>
								</div>
							</div>
							
							
						</div>
						
						<?/* Display member display picture */?>
						<?php members_display_profile_pic($user_id);?>
					</div>
					<div class='container clearfix'>
						<a id="change-pic" class="button green iframe profilepic" href="<?php echo _PLUGINS_URL_ ?>jquery.upload.crop/upload_crop.php?command=upload">
							Change Profile Pic
						</a>
						<h2>Invítanos a conocerte</h2>
						<p>Ecologikal es una red semántica que ofrece contenido a la medida a sus miembros, para poder ofrecerte conocimiento necesitamos conocerte. Añade tus intereses para comenzar el viaje</p>
						<div id="interests" class="clearfix">
						<?
							/* Get interests for list */
							$interests = get_interests($user_id);
							$user_interests = 0;
						?>
							<ul id="interests-list" class="interests clearfix">
							<?
							foreach ($interests as $interest) {
								if ($interest['userlikes']) {
								?><li class="interest" id="<?=$interest['id']?>" style="padding-left: 17px; "><div class="ecoicon delete" style="display: none; "></div><?=$interest['interest']?></li><?
								$user_interests++;
								}
							}
							?>
							</ul>
							<input type="text" name="interest" value="" id="interest" class="margin20r" placeholder="Escribe un interés...">
							<div id="autocomplete">
								<ul id="results-list" class="list">
								<?
								foreach ($interests as $interest) {
									if (!$interest['userlikes']) {
									?><li class="result" onclick="addInterest(<?=$interest['id']?>, '<?=$interest['interest']?>', this)"><span class="people"><span class="number tiptip" title="people liking this"> <?=$interest['likes']?> <span class="ecoicon up"></span></span></span><span class="skillName"><?=$interest['interest']?></span> <span class="ecoicon plus"></span></li>
									<?
									}
								}
								?>
								</ul>
							</div>
						</div>
						<div></div>
						
						
					</div>
				</div>
				
			</div>
		</div>
		
		<!-- Hidden map  -->
		<div id="map"></div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(e){
			
			interestEffects = function () {			
				$('.interest').hover(function(e){
					$(this).find('.delete').fadeIn(100);
	
					$(this).stop().animate({
							'padding-left':'25px'
					});
				},function(e){
					$(this).find('.delete').fadeOut(100);
	
					$(this).stop().animate({
							'padding-left':'17px'
					});
				});
				
				$('.interest').click(function(e){
					var id = this.id;
					if (interestsHTML[parseInt(id)] != undefined) {
						$('#results-list').html(interestsHTML[parseInt(id)] + $('#results-list').html());
					}
					
					interestsInside = interestsInside - 1;
					$(this).remove();
					
				});
			};
			
			interestEffects();
			
			/** Show autocomplete**/
			$('#interest').click(function(e){
				$('#autocomplete').slideDown(200);
			});
			//Delete interest item
			$('.interest').click(function(e){
				$(this).remove();
			});
			
			/* Add event to #interest */
			$('#interest').keyup(function (evt) {
				filterInterests($(this).val());
			});
			
			$('#name-input').click(function () {
				$(this).select();
			});
			
			if ($('.interest').length == 0) {
				$('#interest-list').show();
			}
			
			/* Filter interests */
			filterInterests = function (string) {
				string = string.toLowerCase();
				/* Get all results */
				var results = $('.result');
				for (i = 0; i < results.length; i++) {
					var result = results[i];
					var interest = result.childNodes[1].innerHTML.toLowerCase();
					
					/* If innerHTML contains string, show, else, hide */
					if (interest.indexOf(string) > -1) {
						$(result).show();
					} else {
						$(result).hide();
					}
				}
			};
			
			/* Add interest */
			interestsInside = $('.interest').length;
			interests = Array();
			interestsHTML = Array();
			addInterest = function (id, text, element) {
				var newElement = '<li class="interest" id="'+ id +'"><div class="ecoicon delete"></div>'+ text +'</li>';
				$('#interests-list').html($('#interests-list').html() + newElement);
				
				interestsHTML[id] = element.outerHTML;
				$(element).remove();
				$('#interest').val("");
				filterInterests("");
				
				//Delete interest item
				interestEffects();
				interestsInside = interestsInside + 1;
				
				if (interestsInside != 0) {
					$('#interests-list').show();
				} else {
					$('#interests-list').hide();
				}
			};
			
			/* Send info */
			sendInfo = function () {
				/* Get name */
				var name = $('#name-input').val();
				
				/* Get all interests */
				var interests = $('.interest');
				var interestsArray = Array();
				for (i = 0; i < interests.length; i++) {
					interestsArray.push(interests[i].id);
				}
				
				/* Send info */
				$.post(
					BACKEND_URL + 'members/saveregistrationinfo.php',
					{
						step: 1,
						name: name,
						interests: interestsArray
					},
					function (data) {
						document.location = "members_registration_step2.php";
					}
				);
			};
			
			/* Actualizar posición */
		function error(msg) {
		 	if (error.code = error.PERMISSION_DENIED) {
		        // pop up dialog asking for location
		        notificationWindow('Geolocation: permission denied...', '#');
		    }
		}
	
		/* If navigator supports geolocation */
		allowed = false;
		if (navigator.geolocation) {
			/* Show that we're retrieving the current location */
			$('#current-location').show();
			
			
			/* Check if allowed after 10 seconds... */
			window.setTimeout(function () {
				if (!allowed) {
					notificationWindow('Geolocation: allow us to find your location for a better functionality, check on top :)', '#');
				}
			}, 5000);
			
			navigator.geolocation.getCurrentPosition(function (position) {
				/* activated */
				allowed = true;
				/* If geolocation exists */
				latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
				
				/* Save location */
				$.ajax({
					method: 'POST',
					url: BACKEND_URL+ 'members/updategeoloc.php',
					data: {
						lat: latlng.lat(),
						lng: latlng.lng()
					},
					success: function (data) {
						console.log(data);
					}
				});
				
				/* Update results */
				$('#map').gmap3({
					action: 'getAddress',
					latLng: latlng,
					callback: function (results) {
						if (!results) {
							$('#current-location').html("[No se ha encontrado localidad]");
						} else {
							$('#current-location').html(results[results.length - 2].formatted_address);
							
						}
					}
				});
	
			}, error);
		} else {
			notificationWindow('Geolocation not supported on your current browser.', '#');
		}
		
		
		/* A function that removes e from any array */
		Array.prototype.remove = function(e) {
		    var t, _ref;
		    if ((t = this.indexOf(e)) > -1) {
		        return ([].splice.apply(this, [t, t - t + 1].concat(_ref = [])), _ref);
		    }
		};
	});
</script>