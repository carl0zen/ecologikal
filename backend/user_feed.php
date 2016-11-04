<?
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	if( $_GET['type'] == '') $type = 'image'; else $type = $_GET['type'];
	if( $_GET['last_post_id'] == '') $lastpostid = ''; else $lastpostid = $_GET['last_post_id'];
	$userid = $_GET['userid'];
	if( $feed = get_userfeed($userid, $type, $lastpostid) ) :
		$i = 1;
		foreach ($feed as $key => $value) :
	?>
	<div class="picture-item relative">
		<input type="hidden" value="<?=$i;?>" name="no-item" id="no-item">
		<input type="hidden" value="<?=$feed[$key]['id'];?>" class="post-id">
		<input type="hidden" value="<?=$feed[$key]['category'];?>" class="post-cat">
		<input type="hidden" value="<?=$feed[$key]['type'];?>" class="post-type">
		<div class="category p<?=$feed[$key]['category'];?>"><div class="ecoicon fleft"><?=$feed[$key]['category'];?></div></div>
		<?
		if( post_is_featured($feed[$key]['id'], $feed[$key]['type'], $feed[$key]['category']) ) :
		?>
		<div class="ecoicon star featured"></div>
		<?
		elseif( $userid == '73' ) :
		?>
		<div class="ecoicon star feature"></div>
		<?
		endif;
		?>

		<div class="picture">
			<? if( $type == 'image' ) : ?>
			<img width="233" src="<?=_BACKEND_URL_;?>ajaxupload/uploads/<?=$feed[$key]['image'];?>" alt="">
			<? elseif( $type == 'video' ) : ?>
			<img height="232" src="http://img.youtube.com/vi/<?=$feed[$key]['video'];?>/0.jpg" alt="">
			<? elseif( $type == 'idea' ) : ?>
			<p><?=$feed[$key]['idea'];?></p>
			<? elseif( $type == 'article' ) : ?>
			<p><?=$feed[$key]['title'];?></p>
			<? endif; ?>
		</div>
		<div class="actions clearfix">
			<div class="action amplificate tiptip" title="Amplificate"><a class="ecoicon <?=people_has_amplified($feed[$key]['id'], $userid, $feed[$key]['type']) ? 'active' : '';?>">X</a></div>
			<div class="action broadcast tiptip" title="Broadcast"><a class="ecoicon <?=people_has_broadcasted($feed[$key]['id'], $userid, $feed[$key]['type']) ? 'active' : '';?>">T</a></div>
			<div class="action comment tiptip" title="Comment"><a class="ecoicon">A</a></div>
		</div>
		<div class="social-response clearfix">
			<a class="p4 social amplification"><div class="value"><?=post_count_amplification($feed[$key]['id'], $feed[$key]['type']);?></div></a>
			<a class="p2 social broadcasts"><div class="value"><?=post_count_broadcast($feed[$key]['id'], $feed[$key]['type']);?></div></a>
			<a class="p5 social comments"><div class="value"><?=post_count_comments($feed[$key]['id'], $feed[$key]['type']);?></div></a>
		</div>
	</div>
	<?
		$i++;
		endforeach;
	/*else :
		echo "No hay contenido que mostrar.";*/
	endif;
	//$posts = get_next_posts($lastpostid, $cat, $type);
	?>