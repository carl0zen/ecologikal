<?php require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php"); ?>
<script>
	$('.share a').fancybox({ type: 'iframe', 'width' : 650, 'height': 500, 'overlayShow'	:	true, 'overlayColor'	: '#000',	'bgColor': '#000' });
	$('.share .post-idea a').fancybox({ type: 'iframe', 'width' : 650, 'height': 300, 'overlayShow'	:	true, 'overlayColor'	: '#000',	'bgColor': '#000' });
</script>
<div class="clearfix width100 margin20t">

	<div class="width25 fleft post-place">
  	<a href="<?=_VIEWS_URL_;?>post-place.php">LUGAR</a>
  </div>

	<div class="width25 fleft post-article">
  	<a href="<?=_VIEWS_URL_;?>post-article.php">ART&Iacute;CULO</a>
  </div>

	<div class="width25 fleft post-idea">
  	<a href="<?=_VIEWS_URL_;?>post-idea.php">IDEA</a>
  </div>

	<div class="width25 fleft post-social">
  	<a href="<?=_VIEWS_URL_;?>post-social.php">NECESIDAD</a>
  </div>

</div>
