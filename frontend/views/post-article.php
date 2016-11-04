<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$user_id = $_SESSION['user_id'];
?>
<link rel="stylesheet" href="<?=_CSS_URL_;?>main.css" type="text/css" />
<style>
#artcontent{ width:100%; height:300px; }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="<?=_PLUGINS_URL_;?>tiny_mce/tiny_mce.js"></script>
<script src="<?=_PLUGINS_URL_;?>jquery.watermark.js" type="text/javascript" charset="utf-8"></script>
<script>
	$(document).ready(function(e){

		tinyMCE.init({
			mode : "specific_textareas",
			editor_selector : "artcontent",
			theme : "advanced",
			theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,fontsizeselect,formatselect",
			theme_advanced_buttons2 : "cut,copy,paste,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,|,forecolor",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top"
		});

		$('#title').watermark('Article Title').focus();
		$.get("<?php echo _BACKEND_URL_ ?>_general/getmaincats.php", function(data){ $('#artcategory').append(data); });

		$('.postarticle').click(function(){
			var title = $('#title').val(),
					category = $('#artcategory option:selected').val(),
					content = tinyMCE.get('artcontent').getContent(),
					queryurl = '<?php echo _BACKEND_URL_ ?>members/savearticle.php';
			if(title == '' || content == '' || category == ''){
				if(title == ''){
					$('#title').css({background: '#B3236C', 'border': '2px solid #924'});
				}else{
					$('#title').css({background: '#E6E6E6', 'border': '1px solid #999'});
				}
			}else{
				$.post(queryurl,{title:title, content:content, category: category, user: <?=$user_id;?>, lat: <?=members_get_info('latitude',$user_id);?>, lng: <?=members_get_info('longitude',$user_id);?>, timestamp: <?=time();?> }, function(data){
					window.parent.location.href= "<?php echo _VIEWS_URL_ ?>members/member_profile.php";
				});
			}
			return false;
		});

	});
</script>
<div class="content">
  <div class="font20 margin15b"><strong>Share Article:</strong></div>
  <div class="margin15b dblock"><input type="text" id="title" /></div>
  <select id="artcategory" class="margin15b dblock">
  	<option>- Select -</option>
  	<option value="0">Opinion</option>
  </select>
  <div class="font15 margin15b"><strong>Content:</strong></div>
	<div class="margin15b dblock"><textarea id="artcontent" class="artcontent"></textarea></div>
  <button class="green postarticle">Post Article</button>
</div>