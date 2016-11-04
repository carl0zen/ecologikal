<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$_SESSION['user_hash'] = members_get_info('hash',$_SESSION['user_id']);
// If a parameter is passed with the user_id then it displays the profile for the user_id passed, if not it means that should display loggedin user profile
if (isset($_GET['user_id']) || isset($_GET['user'])){
	if(isset($_GET['user'])){
		$userid = members_get_user_id($_GET['user']);
	}else{
		$userid = $_GET['user_id'];
	}


	if ($userid == $_SESSION['user_id']){
		$myprofile = true;
	}else{
		$myprofile = false; // flag to not display editable features
	}
}else{
	$myprofile = true; // flag to allow editable features
	$userid = $_SESSION['user_id'];
}
// Check for edit mode ?edit=1 to edit
if(isset($_GET['edit'])){
	$edit = $_GET['edit'];
}else{
	$edit =0;
}
?>
<div id="profilecontent" class="gallery clearfix">
		<h3>My Gallery
		<?php
			if($myprofile != false){?>
			<button class="green addalbum iconspan"><span class="ui-icon ui-icon-plus"></span>Add Album</button>
		<?php } // End if is my profile?>
	</h3>
	<div class="albumscontainer">
		<?php
		$albums = members_get_albums($userid);
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
						<h4>
						<?php if ($myprofile): ?>
							<span class="delete icon deletealbum"></span>
						<?php endif ?>

						<?php echo $albumname?>
						<span class="nopics">
							<span class="ui-icon ui-icon-image"></span>
							<?php echo members_count_album_pictures($albumid); ?> pictures
						</span>
						<timeago><abbr class="timeago" title="<?php echo $albumtime ?>"></abbr></timeago>

					</h4>
				<?php if($myprofile){?>
					<button class="green addpicstoalbum tiptip" title="Add Pictures" ><span class="ui-icon ui-icon-plus"></span></button>
					<a class="iframe addpicstoalbum" href="<?php echo _VIEWS_URL_?>members/pictureuploader.php?type=member&albumname=<?php echo $albumname ?>"></a>
					<button class="green managepictures tiptip" title="Manage Pictures" ><span class="ui-icon ui-icon-image"></span></button>
					<a class="iframe managepictures" href="<?php echo _VIEWS_URL_?>members/picturedetails.php?type=member&albumname=<?php echo $albumname ?>"></a>

				<?php }?></div>

				<div class="description"><?php echo $albumdesc ?></div>
				<div class="albumpics">
					<?php $albumpics = members_get_album_pictures($userid, $albumname);
	 	  		$albumthumbs = members_get_album_picture_thumbs($userid, $albumname);
				if($albumthumbs && $albumpics){
					$count = count($albumpics);
					if ($count > 10){
						$count = 10;
					}
					for($key = 0; $key < $count ; $key++) {
						$picid = $albumthumbs[$key]['id'];?>
						<div class="picthumb">
							<a href="<?php echo _VIEWS_URL_ ?>members/pictures/singlepicture.php?type=member&user_id=<?php echo $userid ?>&picid=<?php echo $picid?>" class='iframe pic'><img src="<?php echo $albumthumbs[$key]['url']?>"></a>
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