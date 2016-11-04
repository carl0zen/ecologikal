<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$ec_id = $_GET['ec_id'];

$name = ec_get_name($ec_id);

$user_id = $_SESSION['user_id'];
//If the user is profile a true value is stored
$myec = people_is_admin($ec_id, $user_id);
?>
<div id="profilecontent" class="gallery clearfix">
	<input type="hidden" id="ec_id" name="ec_id" value="<?=$ec_id;?>" />
  <?
		if($myec != false){?>
		<button class="green addalbum iconspan fright margin10t"><span class="ui-icon ui-icon-plus"></span>Add Album</button>
	<? } // End if is my ecocenter?>
		<h3>My Gallery</h3>
	<div class="albumscontainer">
		<?php
		$albums = ec_get_albums($ec_id);
		if($albums){
			foreach ($albums as $key => $value) {
				$albumid = $albums[$key]['id'];
				$albumname = $albums[$key]['name'];
				$albumdesc = $albums[$key]['description'];
				$albumtime = $albums[$key]['time'];
			 ?>
			<div class="album">
				<input type="hidden" name="albumid" value="<?php echo $albumid ?>" id="albumid">
					<div class="name">
          	<div class="clearfix width100">
              <h3 class="fleft width80 line20"><?=($myec) ? '<span class="delete icon deletealbum tiptip" title="Delete Album"></span>' : '';?><? echo $albumname?></h3>
              <? if ($myec) : ?>
              <button class="green addpicstoalbum tiptip fright" title="Add Pictures" ><span class="ui-icon ui-icon-plus"></span></button>
              <a class="iframe addpicstoalbum" href="<?php echo _VIEWS_URL_?>ecocenters/pictureuploader.php?type=ec_album&ec_id=<?=$ec_id?>&albumname=<?php echo $albumname ?>"></a>
              <button class="green managepictures tiptip fright margin5r" title="Manage Pictures" ><span class="ui-icon ui-icon-image"></span></button>
              <a class="iframe managepictures" href="<?php echo _VIEWS_URL_?>ecocenters/picturedetails.php?type=ec_album&ec_id=<?=$ec_id?>&albumname=<?php echo $albumname ?>"></a>
              <? endif; ?>
            </div>
						<span class="nopics">
							<span class="ui-icon ui-icon-image"></span>
							<?php echo ec_count_album_pictures($albumid); ?> pictures
						</span>
						<timeago><abbr class="timeago" title="<?php echo $albumtime ?>"></abbr></timeago>
        </div>

				<div class="description"><?php echo $albumdesc ?></div>
				<div class="albumpics">
					<?php $albumpics = ec_get_album_pictures($ec_id, $albumname);
	 	  		$albumthumbs = ec_get_album_picture_thumbs($ec_id, $albumname);
				if($albumthumbs && $albumpics){
					$count = count($albumpics);
					if ($count > 10){
						$count = 10;
					}
					for($key = 0; $key < $count ; $key++) {
						$picid = $albumthumbs[$key]['id'];?>
						<div class="picthumb">
							<a href="<?php echo _VIEWS_URL_ ?>ecocenters/pictures/singlepicture.php?type=ec_album&ec_id=<?php echo $ec_id ?>&picid=<?php echo $picid?>" class='iframe pic'><img src="<?php echo $albumthumbs[$key]['url']?>"></a>
						</div>
							<?php
					}//end foreach
				}else{
					echo "No pictures Yet";
				}?>
			</div>
		</div>

	<?php }
	}else{ ?>
	No pictures Yet
	<?php	}//end if?>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(e){
		$('.tiptip').tipTip();
			$("a.addpics, a.addpicstoalbum, a.managepictures").livequery(function(e){
					$(this).fancybox({
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
					'onClosed': function() {
				   			parent.location.reload(true);
				  		}
				});
			});
		height = $(window).height();
		width = $(window).width();

		$('a.pic').fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'padding'		: 0,
			'speedIn'		:	300,
			'speedOut'		:	200,
			'overlayShow'	:	true,
			'width'			: width-180,
			'height'		: height-50,
			'autoScale':false,
			'overlayColor'	: '#555',
		});
	});
</script>