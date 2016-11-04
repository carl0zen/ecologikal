<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$post = get_post_info($_GET['post_id'], $_GET['type']);
	$userid = $_SESSION['user_id'];
?>
<link rel="stylesheet" href="<?=_CSS_URL_?>main.css" media="screen" />
<link rel="stylesheet" href="<?=_CSS_URL_?>generalstyles.css" media="screen" />
<link rel="stylesheet" href="<?=_CSS_URL_?>feeds.css" media="screen" />
<div class="clearfix width100">

	<div class="width70 fleft">
  	<? if( $_GET['type'] == 'image' ) : ?>
    	<img src="<?=_BACKEND_URL_.'ajaxupload/uploads/'.$post['image'];?>" class="width100" />
  	<? elseif( $_GET['type'] == 'video' ) : ?>
    	<iframe width="560" height="420" src="http://www.youtube.com/embed/<?=$post['video'];?>?rel=0" frameborder="0" allowfullscreen></iframe>
  	<? elseif( $_GET['type'] == 'article' ) : ?>
    	<h1><?=$post['title'];?></h1>
      <div>
      	<?=$post['content'];?>
      </div>
    <? endif; ?>
  </div>

	<div class="width30 fleft">
  	<div class="actions clearfix">
      <div class="action amplificate tiptip" title="Amplificate"><a class="ecoicon <?=people_has_amplified($post['id'], $userid, $_GET['type']) ? 'active' : '';?>">X</a></div>
      <div class="action broadcast tiptip" title="Broadcast"><a class="ecoicon <?=people_has_broadcasted($post['id'], $userid, $_GET['type']) ? 'active' : '';?>">T</a></div>
      <div class="action comment tiptip" title="Comment"><a class="ecoicon">A</a></div>
    </div>
    <div class="social-response clearfix">
      <a class="p4 social amplification"><div class="value"><?=post_count_amplification($post['id'], $_GET['type']);?></div></a>
      <a class="p2 social broadcasts"><div class="value"><?=post_count_broadcast($post['id'], $_GET['type']);?></div></a>
      <a class="p5 social comments"><div class="value"><?=post_count_comments($post['id'], $_GET['type']);?></div></a>
    </div>
    <div class="padding10 fcomment nodisplay">
      <div class="font20 margin15b"><strong>Post a comment:</strong></div>
      <div class="margin15b dblock width100"><textarea id="comment"></textarea></div>
      <button class="green postcomm">Post Comment</button>
    </div>
  	<div class="padding20">
  	<? if( $_GET['type'] == 'image' || $_GET['type'] == 'video' || $_GET['type'] == 'idea' ) : ?>
    	<p><?=$post['idea'];?></p>
    <? endif; ?>
  	</div>
    <div>
    	Comments:
      <div class="dcomments"></div>
    </div>
  </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script>
$(document).ready(function(e){

	$('.amplificate a').live('click', function(){
		$(this).toggleClass('active');
		var count = $(this).parent().parent().parent().find('.amplification .value').html();
		if( $(this).hasClass('active') ){
			count++;
			queryurl = '<?=_BACKEND_URL_;?>members/amplificate.php';
		} else {
			count--;
			queryurl = '<?=_BACKEND_URL_;?>members/deamplificate.php';
		}
		$(this).parent().parent().parent().find('.amplification .value').html(count);
		$.post(queryurl,{ postid: <?=$post['id'];?>, category: <?=$post['category'];?>, type: '<?=$_GET['type'];?>' }, function(data){ });
	});

	$('.broadcast a').live('click', function(){
		$(this).addClass('active');
		var count = $(this).parent().parent().parent().find('.broadcasts .value').html(),
				queryurl = '<?=_BACKEND_URL_;?>members/broadcast.php';
		count++;
		$(this).parent().parent().parent().find('.broadcasts .value').html(count);
		$.post(queryurl,{ postid: <?=$post['id'];?>, category: <?=$post['category'];?>, type: '<?=$_GET['type'];?>' }, function(data){ });
	});

	$('.comment a').live('click', function(){
		$('.fcomment').show();
	});

	$('.postcomm').click(function(){
		var comment = $('#comment').val(),
				postid = <?=$post['id'];?>,
				type = '<?=$_GET['type'];?>',
				queryurl = '<?=_BACKEND_URL_;?>members/savepostcomment.php';
		if(comment == ''){
			$('#comment').css({background: '#B3236C', 'border': '2px solid #924'});
		}else{
			$.post(queryurl,{ comment: comment, type: type, postid: postid, user: <?=$userid;?>, lat: <?=members_get_info('latitude',$userid);?>, lng: <?=members_get_info('longitude',$userid);?> }, function(data){
				window.parent.location.href= "<?=_ROOT_URL_;?>learnfeed.php";
			});
		}
		return false;
	});

	$('.dcomments').load('<?php echo _VIEWS_URL_ ?>members/showfeedcomments.php?postid=<?=$post['id'];?>&type=<?=$_GET['type'];?>&category=<?=$post['category'];?>');

});
</script>
