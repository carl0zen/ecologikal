<?php require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

$ec_id = $_GET['ec_id'];
$user_id = $_SESSION['user_id'];
$myec = people_is_admin($ec_id, $user_id);
$longitude = ec_get_info('longitude', $ec_id);
$latitude = ec_get_info('latitude', $ec_id);
?>


<div id="profilecontent" class="clearfix">
	<h2>Places Near Us <button class="green addmarker">Add Place</button></h2>

	<div id="map"></div>

	<div id="placelinks">
		<?php $places = ec_get_places($ec_id);
			if ($places) {
				foreach ($places as $key => $value) {
					 $title = $places[$key]['title'];
					 $description = $places[$key]['description'];
					 $typeid = $places[$key]['type'];
					 $typename = ec_get_type_name($typeid);
					 $icon = $places[$key]['icon'];
					$placeid = $places[$key]['id']; ?>
					<div class="place">
							<div class="placetitle">
								<?php if ($myec){ ?>
										<span class="icon delete"></span>
									<?php } ?>
									<input type="hidden" name="placeid" value="<?php echo $placeid ?>" id="placeid">
									<h4><img src="<?php echo _IMAGES_URL_.$icon ?>"><?php echo $title ?></h4>
							</div>
					</div>

				<?php
				} // end foreach
			} // end id?>
	</div>
</div>
<script type="text/javascript" charset="utf-8">

	$(document).ready(function(e){
		latitude = null;
		longitude = null;
		function addMarker($this, i, lat, lng, iconimg){
		  	$this.gmap3({
		    	action : 'addMarker',
				name : 'newmarker',
		    	lat: lat,
		    	lng: lng,
		    	marker:{
		      		options:{
						draggable: true,
		      		},
					events:{
						dragend: function(marker){
							$this.gmap3({
								action:'getAddress',
								latLng:marker.getPosition(),
								callback:function(results){
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
		function addFixedMarker($this, lat, lng, icon, data1){
			$this.gmap3({
		    	action : 'addMarker',
		    	lat: lat,
		    	lng: lng,
		    	marker:{
		      		options:{
						draggable: false,
						icon : '<?php echo _IMAGES_URL_ ?>'+icon,
		      		},events:{
							click: function(marker, event, data){
								var map = $this.gmap3('get'),
								infowindow = $this.gmap3({action:'get', name:'infowindow'});
								if (infowindow){
									infowindow.open(map, marker);
									infowindow.setContent(data1);
								} else {
									$this.gmap3({action:'addinfowindow', anchor:marker, options:{content: data1}});
								}
							},
						}
		   		}
			});
		}
		<?php $places = ec_get_places($ec_id);
		 	if ($places) {
				foreach ($places as $key => $value) { ?>

						addFixedMarker($('#map'), <?php echo $places[$key]["lat"] ?>, <?php echo $places[$key]["lng"] ?>, '<?php echo $places[$key]["icon"] ?>', '<h2><?php echo $places[$key]["title"] ?></h2><?php echo $places[$key]["description"] ?>' );

				<?php
				}// end foreach
		 	} // end if?>
		$('button.addmarker').click(function(e){
			$('#map').gmap3({
				action: 'clear',
			});
			addMarker($('#map'), 1, lat,lng ,'ecocenter.png');

			$('#map')
			.after('<div class="addplace">'+
					'<h2>Add a New Place</h2>'+
					'<p>Please Drag the Marker to the exact location of the place</p>'+
					'<select name="placetype" id="placetype">'+
								'<option value="null">Place Type</option>'+
							<?php $maptypes = ec_get_map_types();
								foreach ($maptypes as $key => $value) {?>
									'<option value="<?php echo $maptypes[$key]["id"] ?>"><?php echo $maptypes[$key]["type"] ?></option>'+
								<?php } ?>
							'</select>'+
							'<input type="text" name="placename" value="" id="placename">'+
							'<textarea id="description"></textarea>'+
							'<button class="green saveplace">Save Place</button></div>');
			$('#placename').watermark('Place Title');
			$('#placetype').watermark('Place Type').focus();
			$('#description').watermark('Please type a Description');
			// General Validation of fields
			$('input, textarea').focusout(function(e){
					if ($(this).val() == ''){
						$(this).css({background: '#B3236C', 'border': '2px solid #924'});
						$(this).data("status", "invalid");
					}else{
						$(this).css({background: '#E6E6E6', 'border': '1px solid #999'});
						$(this).data("status", "valid");
					}
			});
			// Validating Selects

			$('div.addplace select').change(function(e){
				if ($(this).val()=='null'){
					$(this).data("status", "invalid");
					$(this).css({background: '#B3236C', 'border': '2px solid #924'});
				}else{
					$(this).data("status", "valid");
					$(this).css({background: '#E6E6E6', 'border': '1px solid #999'});
				}
			});
			$('button.saveplace').click(function(e){
				validated = true;
					$('div.addplace input, div.addplace textarea, div.addplace select').each(function(e){
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
						placename = $('#placename').val();
						placetype = $('#placetype').val();
						description = $('#description').val();
						ec_id = <?php echo $ec_id ?>;
						if(latitude && longitude){
							queryurl = BACKEND_URL + 'ecocenters/places/saveplace.php';
							$.post(queryurl,
								{
									placename:placename,
									placetype:placetype,
									description:description,
									latitude: latitude,
									longitude: longitude,
									ec_id : ec_id
								},function(e){
									$('#places').load('<?php echo _VIEWS_URL_ ?>ecocenters/tabs/places.php?ec_id=<?php echo $ec_id ?>');
									//window.location.reload(true);
							});
							validated = false;
						}else{
							alert('Please Drag the Marker to a Position');
						}

					}


			});
			$(this).remove();
		});
		lat = <?php echo ec_get_info('latitude', $ec_id); ?>;
		lng = <?php echo ec_get_info('longitude', $ec_id); ?>;
		var latlng = new google.maps.LatLng(lat, lng);
		$('#map').gmap3({
			action:'init',
			options:{
				center:latlng,
				zoom: 11

			}
		});
		$('#map').gmap3({
			action: 'addMarker',
			latLng: latlng,
			map:{
				center: latlng,
				zoom: 11
			},
			marker:{
				options:{
					draggable: false,
					icon: 	'<?php echo _IMAGES_URL_?>gmap/ecocenter.png',
				}
			}
		});
	});
</script>