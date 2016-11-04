<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$type = $_GET['type'];
$scid = $_GET['ec_id'];

// So users can only upload to their profiles
$userid = $_SESSION['user_id']; ?>
<?php if (function_exists('load_js_scripts')){ load_js_scripts('pictureuploader');} ?>
<?php if (function_exists('load_js_scripts')){ load_css_files('pictureuploader');} ?>

<?php if ($type == 'ec_album'){
	$albumname = $_GET['albumname'];
	$pictures = ec_get_album_picture_thumbs($scid, $albumname); ?>
<input type="hidden" id="ecid" value="<?=$scid;?>" />
<div id="iframe" class="picturedetails">
	<h1>Album : <?php echo $albumname ?></h1>
	<input type="hidden" name="albumname" value="<?php echo $albumname ?>" id="albumname">
	<button class="green  saveall">Save all and close </button>

<div class="picturecontainer">
<?php	if ($pictures){
	foreach ($pictures as $key => $value) {
		if ( ec_pic_has_description($scid, $pictures[$key]['name']) == false){ ?>
	<div class="image">
		<img src="<?php echo $pictures[$key]['url'];?>">
		<input type="hidden" name="picname" value="<?php echo $pictures[$key]['name']?>" id="picname">
		<textarea id="description" class="notupdated"></textarea>
		<button class="green savedescription">Save</button>
		<span class="icon delete"></span>
	</div>
	<?php }else{ ?>
	<div class="image">

		<img src="<?php echo $pictures[$key]['url'];?>">
		<input type="hidden" name="picname" value="<?php echo $pictures[$key]['name']?>" id="picname">
		<textarea id="description" class="notupdated"><?php echo ec_get_pic_description($scid, $pictures[$key]['name']);?></textarea>
		<button class="green savedescription">Save</button>
		<span class="icon delete"></span>
	</div>
	<?php }  // end if img has description
		}// end if pictures?>
<?php }// end foreach ?>
</div>
</div>
<script>
	$(document).ready(function(e){
		$('button.savedescription').click(function(e){
			$(this).parent().find('#description').removeClass('notupdated');
			$(this).parent().find('#description').addClass('updated');
			description = $(this).parent().find('#description').val();
			name = $(this).parent().find('#picname').val();
			ecid = $('#ecid').val();
			albumname = "<?php echo $albumname ?>";
			queryurl= BACKEND_URL + 'ecocenters/savepicturedetails.php';
			$.post(queryurl, { description: description, name:name, albumname: albumname, ecid: ecid},function(data){
			});
			$('textarea.notupdated:first').focus();
		});
		$('button.saveall').click(function(e){
			$('button.savedescription').each(function(e){
			//	desc = $(this).parent().find('#description').val();
			//	if(desc){
					$(this).trigger('click');
			//	}
			});
			window.parent.location= "<?php echo _VIEWS_URL_ ?>ecocenters/profile.php?ec_id=<?=$scid;?>";
		});
		$('span.delete').click(function(e){
			picname = $(this).parent().find('#picname').val();
			albumname = $('#albumname').val();
			ecid = $('#ecid').val();
			queryurl = BACKEND_URL + 'ecocenters/deletepicture.php';
			$.post(queryurl, {picname:picname, albumname:albumname, ecid: ecid}, function(data){

			});
			$(this).parent().remove();
		});
	});
</script>
<?php } // end if member?>