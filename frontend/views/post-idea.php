<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$user_id = $_SESSION['user_id'];
?>
<link rel="stylesheet" href="<?=_CSS_URL_;?>main.css" type="text/css" />
<link href="<?=_CSS_URL_;?>fileuploader.css" rel="stylesheet" type="text/css" />
<style>
#idea{ width:100%; height:100px; }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="<?=_PLUGINS_URL_;?>jquery.watermark.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=_PLUGINS_URL_;?>fileuploader.js" type="text/javascript" language="javascript1.2"></script>
<script>
	$(document).ready(function(e){

		$.get("<?php echo _BACKEND_URL_ ?>_general/getmaincats.php", function(data){ $('#ideacategory').append(data); });

		$('.postidea').click(function(){
			var idea = $('#idea').val(),
					image = $('#image').val(),
					video = $('#video').val(),
					category = $('#ideacategory option:selected').val(),
					queryurl = '<?php echo _BACKEND_URL_ ?>members/saveidea.php';
			if(idea == ''){
				$('#idea').css({background: '#B3236C', 'border': '2px solid #924'});
			}else{
				$.post(queryurl,{ idea: idea, image: image, video: video, user: <?=$user_id;?>, lat: <?=members_get_info('latitude',$user_id);?>, lng: <?=members_get_info('longitude',$user_id);?>, timestamp: <?=time();?>, category: category }, function(data){
					window.parent.location.href= "<?php echo _ROOT_URL_ ?>learnfeed.php";
				});
			}
			return false;
		});

		var uploader = new qq.FileUploader({
			// pass the dom node (ex. $(selector)[0] for jQuery users)
			element: document.getElementById('file-uploader'),
			// path to server-side upload script
			action: '<?php echo _BACKEND_URL_ ?>ajaxupload/php.php',
			allowedExtensions: ['jpg','png','gif','jpeg'],
			sizeLimit: 2097152,
			onSubmit: function(id, fileName){ $('.qq-upload-button').hide(); },
			onCancel: function(id, fileName){ $('.qq-upload-button').show(); },
			onComplete: function(id, fileName, responseJSON){
				$('#image').val(responseJSON.filename);
				$('.qq-upload-list').html('<li><img src="<?php echo _BACKEND_URL_ ?>ajaxupload/uploads/' + responseJSON.filename + '" width="80" height="80"></li>');
			}
		});

		$('#idea').bind('keyup', function(e) {
			var x = $(this).val(), y = linkifyYouTubeURLs(x);
			if( y != x ){
				var z = y.split("yt-link=");
				$('#yt').html('Video: <img src="http://img.youtube.com/vi/' + z[1] +'/0.jpg" height="60" />');
				$('#video').val(z[1]);
				$('.qq-upload-button').hide();
				$('#idea').unbind('keyup');
			}
		});

	});
	function linkifyYouTubeURLs(text) {
    var x = $('#idea').val();
		if( x.match(/(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=))([\w\-]{10,12})\b[?=&\w]*(?!['"][^<>]*>|<\/a>)/ig) ){
			y = x.replace(/(.)?(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=))([\w\-]{10,12})\b[?=&\w]*(?!['"][^<>]*>|<\/a>)/ig,'$1')
			$('#idea').val(y);
		}
		return text.replace(/(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=))([\w\-]{10,12})\b[?=&\w]*(?!['"][^<>]*>|<\/a>)/ig,'yt-link=$1');
	}
</script>
<div class="content">
  <div class="font20 margin15b"><strong>Share your thoughts:</strong></div>
  <select id="ideacategory" class="margin15b dblock">
  	<option>- Select -</option>
  	<option value="0">Opinion</option>
  </select>
	<div class="margin15b dblock"><textarea id="idea"></textarea></div>
  <div id="yt"></div>
  <input type="hidden" id="video" />
  <input type="hidden" id="image" />
  <div id="file-uploader">
    <noscript>
      <p>Please enable JavaScript to use file uploader.</p>
      <!-- or put a simple form for upload here -->
    </noscript>
  </div>
  <button class="green postidea">Post Idea</button>
</div>