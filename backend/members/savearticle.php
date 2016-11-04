<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$title = $_POST['title'];
	$content = $_POST['content'];
	$user = $_POST['user'];
	$category = $_POST['category'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$timestamp = $_POST['timestamp'];

	add_article($title, $content, $user, $category, $lat, $lng, $timestamp);
?>