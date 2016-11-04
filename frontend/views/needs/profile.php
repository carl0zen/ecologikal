<?php
$view = 'need'; // This is for determining which scripts and css are going to be loaded
include("../../../header.php");


$n_id = $_GET['n_id'];
if(isset($_GET['edit'])){
	$edit = $_GET['edit'];
}else{
	$edit =0;
}

$user_id = $_SESSION['user_id'];

$name = n_get_name($n_id);
$description = n_get_info('description', $n_id);
$category = n_get_info('category', $n_id);
$f_id = n_get_info('user_id', $n_id);
$founder_name = members_get_info('nombre', $f_id).' '.members_get_info('apellido', $f_id);

$myneed = user_is_promoter($n_id, $user_id);
$isfollower = people_is_need_follower($n_id, $user_id);	
$hasacted = people_has_acted($n_id, $user_id);	

?>

<div class="wrapper" id="ecocenter">

  <div id="content" class="clearfix">

    <div id="skills" class="relative fleft clearfix"><div class="padding10">

      <div>

				<div class="margin15b clearfix"><a href="<?=members_display_profile_url($f_id);?>" ><memberavatar class="tiptip margin10r" title="<?=$founder_name;?>"><?=members_display_profile_thumb($f_id);?></memberavatar></a> <?=$founder_name;?> added this need. </div>

				<div class="margin15b">

        	<div class="font20 margin10b">Followers:</div>
          <div class="clearfix margin15b">
						<? 
            if( $people = need_get_followers($n_id) ) :
              foreach ($people as $key => $value) :
            ?>
            <div class="member">
              <memberavatar title = "<?=$people[$key]['name'];?>" class = "tiptip" onclick="location.href='<?=members_display_profile_url($people[$key]['id']);?>'"><?=members_display_profile_thumb($people[$key]['id']);?></memberavatar>
            </div>
            <?
              endforeach;
            else :
              echo "No Followers Yet";
            endif;
						?>
          </div>

        	<div class="font20 margin10b">Social Workers:</div>
          <div class="clearfix margin15b">
						<? 
            if( $people = need_get_sworkers($n_id) ) :
              foreach ($people as $key => $value) :
            ?>
            <div class="member">
              <memberavatar title = "<?=$people[$key]['name'];?>" class = "tiptip" onclick="location.href='<?=members_display_profile_url($people[$key]['id']);?>'"><?=members_display_profile_thumb($people[$key]['id']);?></memberavatar>
            </div>
            <?
              endforeach;
            else :
              echo "No Social Workers Yet";
            endif;
						?>
          </div>

        	<div class="font20 margin10b">Comments:</div>
          <div class="margin15b">
						<?
            if( $exp = need_get_comments($n_id) ) :
              foreach ($exp as $key => $value) :
            ?>
            <ul class="experiences">
            	<li class="clearfix">
              	<memberavatar title = "<?=members_get_info('nombre', $exp[$key]['user_id']);?>" class = "tiptip margin10r" onclick="location.href='<?=members_display_profile_url($exp[$key]['user_id']);?>'"><?=members_display_profile_thumb($exp[$key]['user_id']);?></memberavatar>
              	<div><?=$exp[$key]['comment'];?></div>
              </li>
            </ul>
            <?
              endforeach;
            else :
              echo "No Comments Yet";
            endif;
						?>
          </div>

        </div>

      </div>

    </div></div>

    <div id="maincontent" class="fright clearfix">

    	<div class="padding10"><h1><strong><?=$name;?></strong></h1></div>

			<div class="relative">

      	<div id="buttons">
          <? if (!$myneed): ?>

            <? if (!$isfollower) : ?>
              <button class="green follow tiptip" title="Follow"><div class="iconic arrow-right"></div></button>
            <? else :?>
              <button class="green unfollow tiptip" title="Unfollow"><div class="iconic x"></div></button>
            <? endif; ?>	

            <? if (!$hasacted) : ?>
              <button class="green tiptip" onclick="$(this).parent().find('a.addsw').trigger('click');" title="Worked Here"><div class="iconic pin"></div></button>
              <a href="<?=_VIEWS_URL_;?>members/add_socialwork.php?n_id=<?=$n_id;?>" class="iframe addsw"></a>
            <? endif; ?>	

          <? endif; ?>
          <button class="green tiptip" onclick="$(this).parent().find('a.addcomment').trigger('click');" title="Add Comment"><div class="iconic quote"></div></button>
          <a href="<?=_VIEWS_URL_;?>members/add_need_comment.php?n_id=<?=$n_id;?>" class="iframe addcomment"></a>
              
        </div>

				<div class="margin15b"><div id="map"></div></div>

				<div class="padding10">
					<div class="font20 margin10b blackfont"><strong>Work done:</strong></div>
          <div class="margin15b">
						<? 
            if( $comm = need_get_experiences($n_id) ) :
              foreach ($comm as $key => $value) :
            ?>
            <ul class="comments">
              <li class="clearfix">
                <memberavatar title = "<?=members_get_info('nombre', $comm[$key]['user_id']);?>" class = "tiptip margin10r" onclick="location.href='<?=members_display_profile_url($comm[$key]['user_id']);?>'"><?=members_display_profile_thumb($comm[$key]['user_id']);?></memberavatar>
                <div><?=$comm[$key]['experience'];?></div>
              </li>
            </ul>
            <?
              endforeach;
            else :
              echo "<div class='blackfont'>No Work Done Yet</div>";
            endif;
            ?>
          </div>
        </div>

      </div>

    </div>

  </div>
</div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="<?=_PLUGINS_URL_;?>gmap3/gmap3.min.js"></script>
<script>
	
	$(document).ready(function(e){
	
		$('button.unfollow').live('click',function(e){
			var n_id = <?=$n_id;?>;
			queryurl = BACKEND_URL + 'needs/unfollow.php';
			$.post(queryurl, {n_id:n_id}, function(e){});
			$(this).removeClass('unfollow').addClass('follow').html('<div class="iconic x"></div>');
		});
	
		$('button.follow').live('click',function(e){
			var n_id = <?=$n_id;?>,	queryurl = BACKEND_URL + 'needs/follow.php';
			$.post(queryurl, { n_id: n_id }, function(data){ $('button.follow').removeClass('follow').addClass('unfollow').html('<div class="iconic arrow-right"></div>'); });
		});

		$('.addsw, .addcomment').fancybox({ type: 'iframe', 'width' : 650, 'height': 300, 'overlayShow'	:	true, 'overlayColor'	: '#000',	'bgColor': '#000' });

		lat = <?php echo n_get_info('lat', $n_id); ?>;
		lng = <?php echo n_get_info('lng', $n_id); ?>;
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
					icon: 	'<?=_IMAGES_URL_;?>gmap/ecocenter.png',
				}
			}
		});

	});
		
</script>