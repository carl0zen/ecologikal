<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
	$idea = $_POST['idea'];
	$user = $_POST['user'];
	$image = $_POST['image'];
	$video = $_POST['video'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$timestamp = $_POST['timestamp'];
	$category = $_POST['category'];

	add_idea($idea, $user, $image, $video, $lat, $lng, $timestamp, $category);
?>