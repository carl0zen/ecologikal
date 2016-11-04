<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$type = $_GET['type'];

// So users can only upload to their profiles
$userid = $_SESSION['user_id']; ?>
<?php if (function_exists('load_js_scripts')){ load_js_scripts('pictureuploader');} ?>
<?php if (function_exists('load_js_scripts')){ load_css_files('pictureuploader');} ?>

<?php if ($type == 'member'){
	$albumname = $_GET['albumname'];
	$pictures = members_get_album_picture_thumbs($userid, $albumname); ?>
<div id="iframe" class="picturedetails">
	<h1>Album : <?php echo $albumname ?></h1>
	<input type="hidden" name="albumname" value="<?php echo $albumname ?>" id="albumname">
	<button class="green  saveall margin10b">Save all and close </button>

<div class="picturecontainer">
<?php	if ($pictures){
	foreach ($pictures as $key => $value) {
		if (members_pic_has_description($userid, $pictures[$key]['name']) == false){?>
	<div class="image clearfix width100 margin10b relative">
		<span class="icon delete fleft"></span>
		<img src="<?php echo $pictures[$key]['url'];?>" class="fleft margin10r">
		<input type="hidden" name="picname" value="<?php echo $pictures[$key]['name']?>" id="picname">
		<textarea id="description" class="notupdated fleft margin10r"></textarea>
		<button class="green savedescription fleft margin15t">Save</button>
    <div class="nodisplay feedback">Description saved</div>
	</div>
	<?php }else{ ?>
	<div class="image clearfix width100 margin10b relative">
		<span class="icon delete fleft"></span>
		<img src="<?php echo $pictures[$key]['url'];?>" class="fleft margin10r">
		<input type="hidden" name="picname" value="<?php echo $pictures[$key]['name']?>" id="picname">
		<textarea id="description" class="notupdated fleft margin10r"><?php echo members_get_pic_description($userid, $pictures[$key]['name']);?></textarea>
		<button class="green savedescription fleft margin15t">Save</button>
    <div class="nodisplay feedback">Description saved</div>
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
			albumname = "<?php echo $albumname ?>";
			queryurl= BACKEND_URL + 'members/savepicturedetails.php';
			$.post(queryurl, { description: description, name:name, albumname: albumname},function(data){
			});
			$('textarea.notupdated:first').focus();
			$(this).attr('disabled','disabled');
			$(this).parent().find('.feedback').show().animate({ top:30 },1000,'',function(){ $(this).fadeOut(200); });
		});
		$('button.saveall').click(function(e){
			$('button.savedescription').each(function(e){
			//	desc = $(this).parent().find('#description').val();
			//	if(desc){
					$(this).trigger('click');
			//	}
			});
			window.parent.location= "<?php echo _VIEWS_URL_ ?>members/member_profile.php";
		});
		$('span.delete').click(function(e){
			picname = $(this).parent().find('#picname').val();
			albumname = $('#albumname').val();
			queryurl = BACKEND_URL + 'members/deletepicture.php';
			$.post(queryurl, {picname:picname, albumname:albumname}, function(data){

			});
			$(this).parent().remove();
		});
		$('.image input').live('keydown',function(){ $(this).parent().find('button').removeAttr('disabled'); })
	});
</script>
<?php } // end if member?>