<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$user_id = $_SESSION['user_id'];
?>
<link rel="stylesheet" href="<?=_CSS_URL_;?>main.css" type="text/css" />
<style>
#comment{ width:100%; height:100px; }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="<?=_PLUGINS_URL_;?>jquery.watermark.js" type="text/javascript" charset="utf-8"></script>
<script>
	$(document).ready(function(e){

		$('.postcomm').click(function(){
			var comment = $('#comment').val(),
					place = <?=$_GET['p_id'];?>,
					queryurl = '<?=_BACKEND_URL_;?>members/saveplacecomment.php';
			if(comment == ''){
				$('#comment').css({background: '#B3236C', 'border': '2px solid #924'});
			}else{
				$.post(queryurl,{ comment: comment, place: place, user: <?=$user_id;?>, lat: <?=members_get_info('latitude',$user_id);?>, lng: <?=members_get_info('longitude',$user_id);?> }, function(data){
					window.parent.location.href= "<?php echo _VIEWS_URL_ ?>places/profile.php?p_id=<?=$_GET['p_id'];?>";
				});
			}
			return false;
		});

	});
</script>
<div class="content">
  <div class="font20 margin15b"><strong>Post a comment in <?=p_get_name($_GET['p_id']);?>:</strong></div>
	<div class="margin15b dblock"><textarea id="comment"></textarea></div>
  <button class="green postcomm">Post Comment</button>
</div>