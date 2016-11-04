<?php
/** Function to add trips to a specific member
	@params:
		(int)userid 		: user to modify from
		(string)title 		: title for the trip
		(string)address 	: address for the trip
		(string)latitude 	: lat for the trip
		(string)longitude 	: lng for the trip
		(text)description	: description for trip
		(date)datefrom		: datefrom the trip
		(int)days			: number of days
		(array)skills		: Skills Array
		(array)friends		: Friends Array
**/
function tip_display_profile_pic($tripid){
	$picurl = _PICS_URL_.'trips/trip_'.$tripid."/profile/profile.jpg";
	$picpath = _PICS_PATH_.'trips/trip_'.$tripid."/profile/profile.jpg";
	if(file_exists($picpath)){
		echo "<img src='$picurl'/>";
	}else{
		echo "<img src='"._IMAGES_URL_."avatar.png'/>";
	}
}
function members_add_trip($userid, $title, $description, $datefrom, $days, $skills, $friends, $address, $latitude, $longitude){
	$datefrom = strtotime($datefrom);
	$sql = "INSERT INTO member_trips(user_id, title, description, datefrom, days, address, latitude, longitude) VALUES($userid, '$title', '$description', FROM_UNIXTIME($datefrom), $days, '$address', '$latitude', '$longitude')";
	mysql_real_escape_string($sql);
	mysql_query($sql) or die(mysql_error());
	
	// This query is to get the trip id and store it in member_trips_skills and member_trips_friends tables
	$result = mysql_query("SHOW TABLE STATUS LIKE 'member_trips'");
	$row = mysql_fetch_array($result);
	$tripid = $row['Auto_increment'] -1;
	mysql_free_result($result);

	foreach ($skills as $key => $value) {
		$skillid = $skills[$key];
		$sql = "INSERT INTO member_trips_skills(trip_id, skill_id) VALUES ('$tripid', '$skillid')";
		mysql_real_escape_string($sql);
		mysql_query($sql) or die(mysql_error());
		
	}
	members_invite_friends('trip', $tripid, $friends);
	 echo $tripid;
}
function members_get_trip_id($userid, $title, $description){
	$sql = "SELECT id FROM member_trips WHERE user_id = $userid AND title = '$title' AND description = '$description'";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['id'];
}

function members_delete_trip_comments($tripid){
	$sql = "DELETE FROM member_trips_comments WHERE trip_id = $tripid";
	mysql_query($sql) or die(mysql_error());
}
function members_delete_stop_pictures($tripid, $stopid){
	$folder = _PICS_PATH_. "trips/trip_".$tripid."/stop_".$stopid."/";
	$folderthumbs = $folder."/thumbs/";
		
		// REMOVE THUMBS FOLDER
		echo is_dir($folderthumbs);
		if (is_dir($folderthumbs)){
			$d = dir($folderthumbs); 
			while($entry = $d->read()) { 
			 if ($entry!= "." && $entry!= "..") { 
			 	unlink($folderthumbs.$entry);
			 } 
			} 
			$d->close(); 
			rmdir($folderthumbs);
		}
		if(is_dir($folder)){
			$d = dir($folder); 
			while($entry = $d->read()) { 
			 if ($entry!= "." && $entry!= "..") { 
			 	unlink($folder.$entry);
			 } 
			} 
			$d->close(); 
			rmdir($folder);
		}
}
function members_delete_trip_stop($tripid, $stopid){
	$sql = "DELETE FROM member_trips_stops WHERE trip_id = $tripid AND id = $stopid";
	mysql_query($sql) or die(mysql_error());
}
function members_delete_trip_skills($tripid){
	$sql = "DELETE FROM member_trips_skills WHERE trip_id = $tripid";
	mysql_query($sql) or die(mysql_error());
}
function members_delete_trip_friends($tripid){
	$sql = "DELETE FROM member_trips_friends WHERE trip_id = $tripid";
	mysql_query($sql) or die(mysql_error());
}
function members_delete_trip_picture($tripid, $stopid, $imgname){
	
}
function members_delete_trip($tripid){
	
	$stops = members_get_trip_stops($tripid);
	if($stops){
		foreach ($stops as $key => $value) {
		
			members_delete_trip_stop($tripid, $stops[$key]['id']);
			members_delete_stop_pictures($tripid, $stops[$key]['id']);
		
		} 
		$folder = _PICS_PATH_. "trips/trip_".$tripid."/";
		if(is_dir($folder)){
			$d = dir($folder); 
			while($entry = $d->read()) { 
			 if ($entry!= "." && $entry!= "..") { 
			 	unlink($folder.$entry);
			 } 
			} 
			$d->close(); 
			rmdir($folder);
		}
	}
	members_delete_trip_comments($tripid);
	members_delete_trip_skills($tripid);
	members_delete_trip_friends($tripid);
	$sql = "DELETE FROM member_trips WHERE id = $tripid";
	mysql_query($sql) or die(mysql_error());
	
	
}
// A function to send notification of trips, includes trip id parameter to relate notification with trip
function members_send_trip_notification($userfrom, $userto, $message, $itemid){
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);
	$sql = "INSERT INTO notifications(user_from, user_to, message, type, time, item_id) VALUES ($userfrom, $userto, '$message', 'trip_invite', '$time', $itemid)";
	mysql_real_escape_string($sql);
	mysql_query($sql) or die(mysql_error());
}
// Invite friends to an specific profile (Trip, Project, SC, Event, etc..)
function members_invite_friends($type, $itemid, $friends){
	if ($type == 'trip'){
		foreach ($friends as $key => $value) {
			$friendid = $friends[$key];
			if (!members_is_invited_to_trip($friendid, $itemid)){
				
				$sql = "INSERT INTO member_trips_friends(trip_id, user_id) VALUES ('$itemid', '$friendid')";
				mysql_real_escape_string($sql);
				mysql_query($sql) or die(mysql_error());
				$trip = members_get_trip($itemid);
				$title = $trip['title'];
				$address = $trip['address'];
				$userid = $_SESSION['user_id'];
				$message = 'has invited you to '.$title.' in '.$address;
				members_send_trip_notification($userid, $friendid, $message, $itemid);
			}
		}
	}
}
// Get member trips
function members_get_trips($userid){
	$trips = array();
	$sql = "SELECT id, address, title, datefrom, days, description, latitude, longitude FROM member_trips WHERE user_id = $userid ORDER BY datefrom DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$trip['id'] = $row['id'];
			$trip['address'] = $row['address'];
			$trip['title'] = $row['title'];
			$trip['datefrom']= $row['datefrom'];
			$trip['days'] = $row['days'];
			$trip['description'] = $row['description'];
			$trip['latitude'] = $row['latitude'];
			$trip['longitude'] = $row['longitude'];
			$trips[] = $trip;
	}
	if ($trips == null){
		return null;
	}
	return $trips;
}
// Get trip members
function members_get_trip_friends($tripid){
	$friends = array();
	$sql = "SELECT * FROM member_trips_friends WHERE trip_id= $tripid";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$friend['id'] = $row['user_id'];
		$friend['status'] = $row['status'];
		$friend['name'] = members_get_info('nombre', $friend['id']) . members_get_info('apellido', $friend['id']);
		$friend['thumb'] = members_get_profile_thumb($friend['id']);
		$friend['profileurl'] = members_get_profile_url($friend['id']);
		$friends[] = $friend;
	}
	if ($friends == null){
		return null;
	}
	return $friends;
}
function members_get_trip_skills($tripid){
	$skills = array();
	$sql = "SELECT * FROM member_trips_skills WHERE trip_id = $tripid";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$skill['id'] = $row['skill_id'];
		$skill['name'] = members_get_skill_name($row['skill_id']);
		$skill['petal'] = members_get_skill_petal($row['skill_id']);
		$skill['petalname'] = get_petal_name($skill['petal']);
		$skill['petalclass'] = get_petal_class($skill['petal']);
		$skills[] = $skill;
	}
	if ($skills == null){
		return null;
	}
	return $skills;
}
// Returns a tripid from a notification id
function members_get_trip_from_notification($notifid){
	$sql = "SELECT item_id FROM notifications WHERE id = $notifid";
	$rst = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_assoc($rst);
	$tripid = $row['item_id'];
	return $tripid;
}
// Returns a trip array
function members_get_trip($tripid){
	$sql = "SELECT * FROM member_trips WHERE id=$tripid";
	$rst= mysql_query($sql) or die($rst);
	
	$row = mysql_fetch_assoc($rst);
	
	if ($row){
		$trip['id'] = $row['id'];
		$trip['address'] = $row['address'];
		$trip['title'] = $row['title'];
		$trip['description'] = $row['description'];
		$trip['datefrom'] = $row['datefrom'];
		$trip['days'] = $row['days'];
		$trip['latitude'] = $row['latitude'];
		$trip['longitude'] = $row['longitude'];
		return $trip;
	}else{
		return null;
	}
	
}
function members_is_my_trip($tripid){
	$userid = $_SESSION['user_id'];
	$sql = "SELECT * FROM member_trips WHERE id = $tripid AND user_id = $userid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}
function members_is_invited_to_trip($userid, $tripid){
	$sql = "SELECT * FROM member_trips_friends WHERE user_id = $userid AND trip_id=$tripid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}
function members_update_trip_status($userid, $tripid, $status){
	if ($status == 'rejected'){
		$sql = "DELETE FROM member_trips_friends WHERE trip_id=$tripid AND user_id = $userid";
		mysql_query($sql) or die(mysql_error());
	}
	$sql = "UPDATE member_trips_friends SET status = '$status' WHERE user_id = '$userid' AND trip_id = '$tripid'";
	mysql_real_escape_string($sql);
	mysql_query($sql) or die (mysql_error());
}
function members_is_confirmed_to_trip($userid, $tripid){
	$sql = "SELECT status FROM member_trips_friends WHERE user_id = $userid AND trip_id = $tripid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row['status']=='confirmed'){
		return true;
	}else{
		return false;
	}
}
function members_add_trip_stop($userid, $tripid, $title, $description, $datefrom, $days, $address, $latitude, $longitude){
	$datefrom = strtotime($datefrom);
	$sql = "INSERT INTO member_trips_stops(user_id, trip_id, title, description, datefrom, days, address, latitude, longitude) VALUES($userid, $tripid, '$title', '$description', FROM_UNIXTIME($datefrom), $days, '$address', '$latitude', '$longitude')";
	mysql_real_escape_string($sql);
	mysql_query($sql) or die(mysql_error());
}
function members_get_trip_stops($tripid){
	$tripstops = array();
	$sql = "SELECT * FROM member_trips_stops WHERE trip_id=$tripid ORDER BY datefrom";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$tripstop['id'] = $row['id'];
			$tripstop['user_id'] = $row['user_id'];
			$tripstop['address'] = $row['address'];
			$tripstop['title'] = $row['title'];
			$tripstop['datefrom']= $row['datefrom'];
			$tripstop['days'] = $row['days'];
			$tripstop['description'] = $row['description'];
			$tripstop['latitude'] = $row['latitude'];
			$tripstop['longitude'] = $row['longitude'];
			$tripstops[] = $tripstop;
	}
	if ($tripstops == null){
		return null;
	}
	return $tripstops;
}
function members_is_my_stop($stopid){
	$userid = $_SESSION['user_id'];
	$sql = "SELECT * FROM member_trips_stops WHERE id = $stopid AND user_id = $userid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}
function members_add_trip_comment($userid, $tripid, $stopid, $comment){
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);
	$sql = "INSERT INTO member_trips_comments(user_id, trip_id, stop_id, comment, time) VALUES ($userid, $tripid, $stopid, '$comment', '$time')";
	mysql_real_escape_string($sql);
	mysql_query($sql) or die(mysql_error());
}
function members_get_trip_comments($tripid, $stopid){
	$tripcomments = array();
	$sql = "SELECT user_id, comment, time FROM member_trips_comments WHERE trip_id = '$tripid' AND stop_id = '$stopid' ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$tripcomment['user_id'] = $row['user_id'];
			$tripcomment['comment'] = $row['comment'];
			$tripcomment['time'] = $row['time'];
			$tripcomments[] = $tripcomment;
	}
	if ($tripcomments == null){
		return null;
	}
	return $tripcomments;
}
?>