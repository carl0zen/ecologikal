<?php 
	$view = 'member_registration';
	$step = $_SESSION['registration_step'] = 3;
	include("../../../header_nobar.php");
	$user_id = $_SESSION['user_id'];
		?>
		<style>
			div.field {
				float: left;
				width: 20%;
				font-weight: 500;
				padding: 10px;
			}
			
			div.value, div.locked {
				float: right;
				padding: 10px;
				width: 65%;
			}
			
			div.value, div.field, span#current-location {
				color: #999;
			}
			
			div.value:hover {
				background-color: #EEE;
			}
			
			div.value input, div.value textarea {
				outline: 0px;
				padding: 0px;
				margin: 0px;
				font-size: inherit;
				font-family: inherit;
				font-weight: inherit;
				width: 100%;
				border: 0px;
				background-color: transparent;
			}
			
			div.value textarea {
				height: 80px;
				resize: none;
			}
			
			input#website {
				color: rgb(86, 180, 250);
			}
			
			.clear {
				height: 0;
				clear: both;
			}
			
			div.spacer {
				height:0;
				border-top: 1px solid #CCC;
				width: 100%;
				margin: 10px 0;
			}
			
			div#saving-error, div#uploading {
				color: #999;
				text-align: center;
				padding: 15px;
				background-color: #EEE;
				border-radius: 10px;
				margin-top: 10px;
				display: none;
			}
			
			div#saving-error {
				color: red;
				text-align: inherit;
			}
			
			div.language {
				cursor: pointer;
			}
			
			#map {
				display: none;
			}
		</style>
		<div class="wrapper">
			<div id="content" >
				<div class="padding10">
					<a href="javascript:sendInfo()" class="button green font20 fright">Siguiente Paso</a>
					<h1 class="fontwhite">Bienvenido a Ecologikal! </h1>
					<div class='container clearfix margin10t'>
						<div id="uploading" >Uploading...</div>
						<div id="saving-error"></div>
						<h2>Verifica la información de tu perfil</h2>
						<div class="fields width60 fleft">
							
							<!-- Nombre -->					
							<div id="field-name" class="field">
								Nombre
							</div>
							<div id="value-name" class="value">
								<input id="nombre" onclick="this.select()" value="<?=members_get_info('nombre', $user_id)?>"/>
							</div>
							<div class="clear">&nbsp;</div>
							
							<!-- Username -->
							<div id="field-username" class="field">
								Username
							</div>
							<div id="value-username" class="value">
								<input id="usuario" onclick="this.select()" value="<?=members_get_info('usuario', $user_id)?>"/>
							</div>
							<div id="username-unavailable" class="value" style="display:none;color:red;padding-top:3px;padding-bottom:3px;text-align:right">
								Username unavailable.
							</div>
							
							<div class="clear">&nbsp;</div>
							
							
							<!-- Email -->
							<div id="field-email" class="field">
								Email
							</div>
							<div id="value-email" class="value">
								<input id="email" onclick="this.select()" value="<?=members_get_info('email', $user_id)?>"/>
							</div>
							<div id="invalid-email" class="value" style="display:none;color:red;padding-top:3px;padding-bottom:3px;text-align:right">
								Invalid email.
							</div>
							<div class="clear">&nbsp;</div>
							
							<div class="spacer">&nbsp;</div>
							
							<!-- Location -->
							<div id="div-current-location" style="display: none">
								<div id="field-location" class="field">
									Location
								</div>
								<div id="value-location" class="locked">
									<span id="current-location">[Retrieving location…]</span>
								</div>
							</div>
							<div class="clear">&nbsp;</div>
							
							<!-- Date of birth -->
							<div id="field-birth" class="field">
								Date of Birth
							</div>
							<div id="value-birth" class="value">
								<input id="fecha_nacimiento" name="fecha" value="<?=members_get_info('fecha_nacimiento', $user_id)?>"/>
							</div>
							<div class="clear">&nbsp;</div>
							
							<!-- Gender -->
							<div id="field-gender" class="field">
								Gender
							</div>
							<div id="value-gender" class="value">
								<input id="gender" onclick="toSelect(1, this)" value="<?=members_get_info('gender', $user_id)?>"/>
							</div>
							<div class="clear">&nbsp;</div>
							
							<div id="field-nationality" class="field">
								Nationality
							</div>
							<div id="value-nationality" class="value">
								<input id="nationality" onclick="toSelect(2, this)" value="<?=members_get_info('nationality', $user_id)?>"/>
							</div>
							<div class="clear">&nbsp;</div>
							
							<div class="spacer">&nbsp;</div>
							
							<div id="field-aboutme" class="field">
								About me
							</div>
							<div id="value-aboutme" class="value">
								<textarea id="aboutme" onclick="this.select()"><?=members_get_info('aboutme', $user_id)?></textarea>
							</div>
							<div class="clear">&nbsp;</div>
							
							<div class="spacer">&nbsp;</div>
							
							<div id="field-telephone" class="field">
								Telephone
							</div>
							<div id="value-telephone" class="value">
								<input id="phone" onclick="this.select()" value="<?=members_get_info('phone', $user_id)?>" />
							</div>
							<div class="clear">&nbsp;</div>
							
							<div class="spacer">&nbsp;</div>
							
							<div id="field-website" class="field">
								Website
							</div>
							<div id="value-website"  class="value">
								<input id="website" onclick="this.select()" name="website" value="<?=members_get_info('website', $user_id)?>" />
							</div>
							<div class="clear">&nbsp;</div>
							
							<div id="field-languages" class="field">
								Languages
							</div>
							
							<div id="languages">
						<?
							/* Get languages from user */
							$languages = members_get_languages($user_id);
							/* Print each language */
							foreach ($languages as $language) {
								?><div id="lang-<?=$language['Id']?>" class="language value"><?=$language['Language']?> (<?=$language['Level']?>)<div class="cross fright" style="display:none">&times;</div></div><?
							}
						?>
							</div>
							<div id="add-language" class="value">
								+ Add language…
							</div>
						<?
							/* Get all languages list */
							$languages = get_languages_list();
						?>
							<div id="add-language-select" class="value" style="display:none">
								<select id="select-language">
								<?
									foreach ($languages as $language) {
										?><option id="langopt-<?=$language['id']?>" value="<?=$language['id']?>"><?=$language['language']?> (<?=$language['level']?>)</option><?
									}
								?>
								</select>
							</div>
							<div class="clear">&nbsp;</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
		<!-- Map -->
		<div id="map">
			<!-- Need to initialize map -->
		</div>
		
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(e){
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
			/** Show autocomplete**/
			$('#interest').click(function(e){

					$('#autocomplete').slideDown(200);
			});
			//Delete interest item
			$('.interest').click(function(e){
				$(this).remove();
			});
			
	
			$('#fecha_nacimiento').datepicker({
				dateFormat: "yy-mm-dd",
				maxDate: "-1d",
				
			});

			/* To select */
			toSelect = function (type, input) {
				var element = input.parentNode;
				var currentValue = input.value;
				var select = $('<select id=""></select>');
				var name = input.id;
				
				switch (type) {
					case 1:
						var male = $('<option '+((currentValue == "Male")? 'selected="selected"' : '')+' value="Male">Male</option>');
						var female = $('<option '+((currentValue == "Female")? 'selected="selected"' : '')+' value="Female">Female</option>');
						
						select.append(male);
						select.append(female);
						
						break;
					case 2:
						$.ajax({
							method: 'POST',
							url: BACKEND_URL + 'members/getcountrieslist.php',
							data: {
								country: currentValue
							},
							success: function (data) {
								$(select).append(data);
							}
						});
						break;
				}
				
				$(select).change(function (evt) {
					var newValue = $(select).val();
					$(element).html('<input id="'+name+'" onclick="toSelect('+type+', this)" name="'+name+'" value="'+newValue+'"/>');
				});
								
				$(element).html('');
				$(element).append(select);
				
			};
	
	
		/* Actualizar posición */
		function error(msg) {
		 	if (error.code = error.PERMISSION_DENIED) {
		        // pop up dialog asking for location
		        notificationWindow('Geolocation: permission denied...', '#');
		    }
		}
	
		/* If navigator supports geolocation */
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
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
							$('#current-location').html(results[results.length - 3].formatted_address);
							$('#div-current-location').show();
						}
					}
				});
	
			}, error);
		} else {
			;
			error('Geolocation not supported on your current browser.');
		}
		
		/* A hover functionality (cross) */
		languageFunctionality = function () {
			$('.language').click(function (evt) {
				$(this).remove();
			});
			$('.language').mouseover(function (evt) {
				$(this).find('.cross').show(100);
			});
			$('.language').mouseout(function (evt) {
				$(this).find('.cross').hide(100);
			});
		};
		languageFunctionality(); // A hover functionality
		
		/* A function that adds languages */
		$('#select-language').change(function (evt) {
			/* Create element */
			var id = $(this).val();
			var value = $('#langopt-' + id).html();
			var element = $('<div id="lang-'+ id +'" class="language value">'+ value +'<div class="cross fright" style="display:none">&times;</div></div>');
			
			$('#languages').append(element);
			
			$('#add-language-select').hide();
			$('#add-language').show();
			
			/* Restart hover functionality */
			languageFunctionality();
		});
		
		/* Add language event */
		$('#add-language').click(function () {
			$(this).hide();
			$('#add-language-select').show();
		});
		
		/* Send current info */
		sendInfo = function () {
			/* NOMBRE, USUARIO, EMAIL,FECHA_NACIMIENTO, nationality, TELEPHONE, WEBSITE, LANGUAGES */
			var nombre, usuario, email, fecha_nacimiento, gender, nationality, phone, website, website, languages;
			
			/* Obtener el valor de cada parámetro */
			nombre = $('#nombre').val();
			usuario = $('#usuario').val();
			email = $('#email').val();
			fecha_nacimiento = $('#fecha_nacimiento').val();
			gender = $('#gender').val();
			nationality = $('#nationality').val();
			phone = $('#phone').val();
			website = $('#website').val();
			aboutme = $('#aboutme').val();
			languages = Array();
			
			/* Get languages, then get em into array */
			langs = $('.language');
			for (i = 0; i < langs.length; i++) {
				/* Format id */
				var id = langs[i].id.replace('lang-', '');
				languages.push(id);
			}
			
			/* Show loading */
			$('#uploading').show(100);
			
			/* Send info */
			$.post(
				BACKEND_URL + 'members/saveregistrationinfo.php',
				{
					step: 3,
					nombre: nombre,
					usuario: usuario,
					email: email,
					fecha_nacimiento: fecha_nacimiento,
					gender: gender,
					nationality: nationality,
					phone: phone,
					website: website,
					languages: languages,
					aboutme: aboutme
				},
				function (data) {
					console.log(data);
					$('#saving-error').html(data);
					$('#saving-error').show();
				}
			);
		};
		
		
		/* VALIDATIONS */
		$('#usuario').change(function (evt) {
			var newValue = $(this).val();
			var pattern = /^[a-zA-Z0-9\.]{4,10}$/;
			
			$.ajax({
				methor: 'POST',
				url: BACKEND_URL + 'members/checkuseravailability.php',
				data: {
					usuario: newValue
				},
				success: function (data) {
					var usable = data.indexOf('true') > -1;
					
					if (pattern.test(newValue) && usable) {
						$('#username-unavailable').hide();	
						$('#usuario').css({
							color: 'green'
						});
					} else {
						$('#username-unavailable').show();
						$('#usuario').css({
							color: 'red'
						});
					}
				}
			});
		});
		
		$('#email').change(function (evt) {
			var newValue = $('#email').val();
			var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			
			if (pattern.test(newValue)) {
				$('#invalid-email').hide();
				$('#email').css({
					color: 'green'
				});
			} else {
				$('#invalid-email').show();
				$('#email').css({
					color: 'red'
				});
			}
		});
	});
</script>