<?php require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php"); $user_id = $_SESSION['user_id']; ?>
<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<meta charset="utf-8" />
    <link rel="stylesheet" href="<?=_CSS_URL_;?>main.css" type="text/css" />
    <link rel="stylesheet" href="<?=_CSS_URL_;?>traveldiary.css" type="text/css" />
    <link rel="stylesheet" href="<?=_PLUGINS_URL_;?>gmap3/jquery-autocomplete.css" type="text/css" />
    <link rel="stylesheet" href="<?=_PLUGINS_URL_;?>autoSuggest/autoSuggest.css" type="text/css" />
    <style>select, select option{ text-transform:capitalize; }</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script src="<?=_PLUGINS_URL_;?>maskedinput.js"></script>
    <script src="<?=_PLUGINS_URL_;?>jquery.watermark.js"></script>
    <script src="<?=_PLUGINS_URL_;?>jquery/jquery-ui-1.8.14.custom.min.js"></script>
    <script src="<?=_PLUGINS_URL_;?>jquery/ui/minified/jquery.ui.core.min.js"></script>
    <script src="<?=_PLUGINS_URL_;?>jquery/ui/minified/jquery.ui.draggable.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="<?=_PLUGINS_URL_;?>gmap3/gmap3.min.js"></script>
    <script src="<?=_PLUGINS_URL_;?>gmap3/jquery-autocomplete.min.js"></script>
    <script src="<?=_PLUGINS_URL_;?>autoSuggest/jquery.autoSuggest.js"></script>
    <script>
      // My Trips
    $(document).ready(function(e){

        $('#map').gmap3({
          action:'init',
          options:{
            center:[46.578498,2.457275],
            zoom: 2

          }
        });

        $('#map').parent().prepend('<input id="address" type="text">');

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
            markerposition = item.geometry.location;
            $('#placeform').html('<select name="needcat" id="needcat"></select><input type="text" name="title" value="" id="needname" /><input type="hidden" name="lat" value="" id="lat" /><input type="hidden" name="long" value="" id="long" /><textarea name="needdesc" id="needdesc"></textarea><button class="green saveneed">Save Need</button>');
            $('#needname').watermark('Need Name').focus();
            $('#needdesc').watermark('Describe the need');
            $.get("<?php echo _BACKEND_URL_ ?>_general/getneeds.php", function(data){ $('#needcat').append(data); });
            latlng = item.geometry.location;
            latlng = String(latlng).replace(')','').replace('(','');;
            latlng = latlng.split(',');
            latitude = latlng[0];
            longitude = latlng[1];
            $('#lat').val(latitude);
            $('#long').val(longitude);
            // POST Request to save Trip in database
            $('button.saveneed').click(function(e){
              var	name = $('#needname').val(),
              description = $('#needdesc').val(),
              category = $('#needcat option:selected').val(),
              lat = $('#lat').val(),
              long = $('#long').val();
              queryurl 	= '<?php echo _BACKEND_URL_ ?>members/saveneed.php';
              // FIELD VALIDATION
              if(name == '' || description == ''){
                if(name == ''){
                  $('#needname').css({background: '#B3236C', 'border': '2px solid #924'});
                }else{
                  $('#needname').css({background: '#E6E6E6', 'border': '1px solid #999'});
                }
                if(description == ''){
                  $('#needdesc').css({background: '#B3236C', 'border': '2px solid #924'});
                }else{
                  $('#needdesc').css({background: '#E6E6E6', 'border': '1px solid #999'});
                }
              }else{
                $.post(queryurl,{name: name, description:description, category: category, latitude: lat, longitude:long, user: <?=$user_id;?>}, function(data){
                  window.parent.location.href= "<?php echo _VIEWS_URL_ ?>members/member_profile.php";
                });
              }
            });

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
                        $('#lat').val(latitude);
                        $('#long').val(longitude);
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
  </head>
  <body>
    <div class="content">
      <div class="font20 margin15b"><strong>Share Need:</strong></div>
      <div>
        <div id="map"></div>
        <div id="placeform">

        </div>
      </div>
    </div>
  </body>
</html>