<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");

$_SESSION['user_hash'] = members_get_info('hash',$_SESSION['user_id']);

// If a parameter is passed with the user_id then it displays the profile for the user_id passed, if not it means that should display loggedin user profile

if (isset($_GET['user_id']) || isset($_GET['user'])){
	if(isset($_GET['user'])) {
		$userid = members_get_user_id($_GET['user']);
	} else {
		$userid = $_GET['user_id'];
	}

	if ($userid == $_SESSION['user_id']){
		$myprofile = true;
	} else {
		$myprofile = false; // flag to not display editable features
	}
} else {
	$myprofile = true; // flag to allow editable features
	$userid = $_SESSION['user_id'];
}
// Check for edit mode ?edit=1 to edit
if(isset($_GET['edit'])){
	$edit = $_GET['edit'];
} else {
	$edit =0;
}

?>
<link rel="stylesheet" href="<?=_CSS_URL_?>feeds.css" media="screen" />
<div id="profilecontent" class="clearfix">

  <div class="width100 clearfix">
    <div class="type pics on" title="image">
      <div class="ecoicon  fleft">9</div><div class="text">Im&aacute;genes</div>
    </div>
    <div class="type videos" title="video">
      <div class="ecoicon  fleft">;</div><div class="text">Videos</div>
    </div>

    <div class="type ideas" title="idea">
      <div class="ecoicon  fleft">A</div><div class="text">Ideas</div>
    </div>

    <div class="type article" title="article">
      <div class="ecoicon  fleft">S</div><div class="text">Art&iacute;culos</div>
    </div>
  </div>
  <div id="pictures" class="clearfix">
  </div>
	<input type="hidden" id="lf_type" value=""  />

</div>

<script>
	$(document).ready(function(e){

		$('#pictures').load('<?=_BACKEND_URL_?>user_feed.php?userid=<?=$userid;?>');

		// Filtro por tipo de contenido
		$('.type').live('click', function(){
			$('.type.on').removeClass('on');
			$(this).addClass('on');
			var type = $(this).attr('title');
			$('#lf_type').val(type);
			$('#pictures').load('<?=_BACKEND_URL_?>user_feed.php?type=' + type + '&userid=<?=$userid;?>');
		});

		$('.comments').live('click', function(e){

			$('.response').remove();
			i = $(this).parents('.picture-item').find('#no-item').val();
			i = parseInt(i);
			x = $(this).parents('.picture-item').index(); x++;

			if(x%3 != 0){

				if((x+1)%3 === 0){
					x= x+1;
				}else{
					if((x+2)%3 === 0){
						x=x+2;
					}
				}
			}
			count = $('.picture-item').length;
			if(count<x){
				x = count;
			}
			x--;
			$('#pictures .picture-item:eq('+x+')').after('<div class="response"><div class="fright close"><div class="ecoicon fright">J</div></div><div class="comments nodisplay clearfix "></div></div>');

			$('.picture-item').css('opacity','0.5');
			$(this).parents('.picture-item').css('opacity',1);
			$('.close').live('click', function(e){
				$(this).parents('.response').slideUp(200);
				$('.picture-item').css('opacity',1);
			});
			var id = $(this).parent().parent().find('.post-id').val(),
					category = $(this).parent().parent().find('.post-cat').val(),
					type = $(this).parent().parent().find('.post-type').val();
			$('.response .comments').load('<?php echo _VIEWS_URL_ ?>members/showfeedcomments.php?postid=' + id + '&type=' + type + '&category=' + category);
			$('.response').slideDown(200, function(e){
				$('.response .comments').fadeIn(200);
			});
		});

		$('.amplificate a').live('click', function(){
			$(this).toggleClass('active');
			var id = $(this).parent().parent().parent().find('.post-id').val(),
					category = $(this).parent().parent().parent().find('.post-cat').val(),
					type = $(this).parent().parent().parent().find('.post-type').val(),
					count = $(this).parent().parent().parent().find('.amplification .value').html();
			if( $(this).hasClass('active') ){
				count++;
				queryurl = '<?=_BACKEND_URL_;?>members/amplificate.php';
			} else {
				count--;
				queryurl = '<?=_BACKEND_URL_;?>members/deamplificate.php';
			}
			$(this).parent().parent().parent().find('.amplification .value').html(count);
			$.post(queryurl,{ postid: id, category: category, type: type }, function(data){ });
		});

		$('.broadcast a').live('click', function(){
			$(this).addClass('active');
			var id = $(this).parent().parent().parent().find('.post-id').val(),
					category = $(this).parent().parent().parent().find('.post-cat').val(),
					type = $(this).parent().parent().parent().find('.post-type').val(),
					count = $(this).parent().parent().parent().find('.broadcasts .value').html(),
					queryurl = '<?=_BACKEND_URL_;?>members/broadcast.php';
			count++;
			$(this).parent().parent().parent().find('.broadcasts .value').html(count);
			$.post(queryurl,{ postid: id, category: category, type: type }, function(data){ });
		});

		$('.comment a').live('click', function(){
			var id = $(this).parent().parent().parent().find('.post-id').val(),
					category = $(this).parent().parent().parent().find('.post-cat').val(),
					type = $(this).parent().parent().parent().find('.post-type').val();
			$(this).fancybox({ href: '<?=_VIEWS_URL_;?>members/add_post_comment.php?post_id=' + id + '&type=' + type, type: 'iframe', 'width' : 650, 'height': 300, 'overlayShow'	:	true, 'overlayColor'	: '#000',	'bgColor': '#000' });
		});

		$('.picture').live('click', function(){
			var id = $(this).parent().find('.post-id').val(),
					category = $(this).parent().find('.post-cat').val(),
					type = $(this).parent().find('.post-type').val();
			$(this).fancybox({ href: '<?=_VIEWS_URL_;?>view_post.php?post_id=' + id + '&type=' + type + '&category=' + category, type: 'iframe', 'width' : 800, 'height': 500, 'overlayShow'	:	true, 'overlayColor'	: '#000',	'bgColor': '#000' });
		});

		function last_post_function() {
			var ID=$("div.picture-item:last").find(".post-id").val(),
					type = $('#lf_type').val(),
					cat = $('#lf_cat').val(),
					subfilter = $('#lf_subfilter').val();
			$('div#loader').html('<img src="<?php echo _IMAGES_URL_ ?>ajax-loader.gif">Loading...');
			$.post("<?=_BACKEND_URL_?>user_feed.php?last_post_id="+ID+"&type="+type+"&userid=<?=$userid;?>",
			function(data){
				if (data != "") {
					$("div.picture-item:last").after(data);
				}
				$('div#loader').empty();
			});
		};

		$(window).scroll(function(){
			if ($(window).scrollTop() == $(document).height() - $(window).height()){
				last_post_function();
			}
		});

	});
</script>