<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$post_id = $_GET['postid'];
	$type = $_GET['type'];
	$category = $_GET['category'];

	if( $comments = get_post_comments($post_id, $type, $category) ) :
?>
	<ul>
<?
		foreach ($comments as $key => $value) :
?>
			<li><?=$comments[$key]['comment'];?></li>
<?
		endforeach;
?>
	</ul>
<?
	endif;
?>