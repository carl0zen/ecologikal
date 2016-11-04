<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$ec_id=$_GET['ec_id'];
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
</style>
<?php if (function_exists('load_js_scripts')){ load_js_scripts('ecocenter');} ?>
<?php if (function_exists('load_js_scripts')){ load_css_files('ecocenter');} ?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="<?php echo _PLUGINS_URL_ ?>gmap3/gmap3.min.js"></script>
<script src="<?php echo _PLUGINS_URL_ ?>gmap3/jquery-autocomplete.min.js"></script>

<p>Please type the address (or the closest address) of your Ecocenter</p>
<input type="text" name="address" value="" id="address">
<h3 class="pleasedrag nodisplay">Please Drag the Marker to the exact position of your Eco Center to continue</h3>
<div id="map" ></div>
<button class="green nextstep nodisplay">Save</button>

<script type="text/javascript">

$(document).ready(function(e){

	// Save Eco center
	$('button.nextstep').click(function(e){
		var	queryurl = BACKEND_URL+'ecocenters/save_ecocenterdata.php?ec_id=<?=$ec_id;?>';
		$.post(queryurl, {
			latitude	: latitude,
			longitude	: longitude,
			address		: address
		},
		function(data){
			window.parent.location.href="profile.php?ec_id=<?=$ec_id;?>";
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
	}).watermark('Type an Address');
});

</script>