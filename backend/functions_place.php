<?php
function place_display_profile_pic($pid){
	$picurl = _PICS_URL_.'places/'.$pid."/profile/profile.jpg";
	$picpath = _PICS_PATH_.'places/'.$pid."/profile/profile.jpg";
	if(file_exists($picpath)){
		echo "<img src='$picurl'/>";
	}else{
		echo "<img src='"._IMAGES_URL_."avatar.png'/>";
	}
}

function p_get_name($p_id){
	$sql = "SELECT name FROM place WHERE id = $p_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return $row['name'];
	}else{
		return 'none';
	}
}

function p_get_cat_name($p_id){
	$sql = "SELECT category FROM place WHERE id = $p_id LIMIT 1";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	$sql = "SELECT name FROM cat_places WHERE id = $row[category] LIMIT 1";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return $row['name'];
	}else{
		return 'none';
	}
}

function p_get_info($field,$p_id=0){
	$r="";
	$field_=$field;
	$sql="SELECT $field_ FROM place WHERE id='$p_id'";
	$rst = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($rst)>0){
		$row=mysql_fetch_row($rst);
		$r=$row[0];
	}
	return $r;
}

function people_is_place_follower($p_id, $userid){
	$sql = "SELECT id FROM place_people_roles WHERE place_id = $p_id AND user_id = $userid AND role_id = 3";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}

function people_has_been_here($p_id, $userid){
	$sql = "SELECT id FROM place_people_roles WHERE place_id = $p_id AND user_id = $userid AND role_id = 4";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}

function user_is_founder($p_id, $userid){
	$sql = "SELECT id FROM place_people_roles WHERE place_id = $p_id AND user_id = $userid AND role_id = 2";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}

function place_set_follower($p_id, $userid){
	$sql = "SELECT id FROM place_people_roles WHERE place_id = $p_id AND user_id = $userid AND role_id = 3";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
		$sql = "INSERT INTO place_people_roles(place_id, user_id, role_id) VALUES($p_id, $userid, 3)";
		mysql_query($sql) or die(mysql_error());
	}
}

function place_set_visitor($p_id, $userid){
	$sql = "SELECT id FROM place_people_roles WHERE place_id = $p_id AND user_id = $userid AND role_id = 4";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
		$sql = "INSERT INTO place_people_roles(place_id, user_id, role_id) VALUES($p_id, $userid, 4)";
		mysql_query($sql) or die(mysql_error());
	}
}

function place_unfollow($p_id, $user_id){
	$sql = "DELETE FROM place_people_roles WHERE place_id = $p_id AND user_id = $user_id AND role_id = 3";
	mysql_query($sql) or die(mysql_error());
}

function place_get_followers($p_id){
	$followers = array();
	$sql = "SELECT * FROM place_people_roles WHERE place_id = $p_id AND role_id = 3";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$follower['id'] = $row['user_id'];
		$follower['name'] = members_get_info('nombre', $follower['id']);
		$followers[] = $follower;
	}
	return $followers;	
}

function place_get_visitors($p_id){
	$visitors = array();
	$sql = "SELECT * FROM place_people_roles WHERE place_id = $p_id AND role_id = 4";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$visitor['id'] = $row['user_id'];
		$visitor['name'] = members_get_info('nombre', $follower['id']);
		$visitors[] = $visitor;
	}
	return $visitors;	
}

function place_get_experiences($p_id){
	$experiences = array();
	$sql = "SELECT * FROM place_experiences WHERE place_id = $p_id";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$exp['user_id'] = $row['user_id'];
		$exp['experience'] = $row['experience'];
		$experiences[] = $exp;
	}
	return $experiences;	
}

function place_get_comments($p_id){
	$comments = array();
	$sql = "SELECT * FROM place_comments WHERE place_id = $p_id";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$comm['user_id'] = $row['user_id'];
		$comm['comment'] = $row['comment'];
		$comments[] = $comm;
	}
	return $comments;	
}

function place_add_comment($comment, $userid, $p_id){
	$sql = "INSERT INTO place_comments(comment, user_id, place_id) VALUES('$comment', $userid, $p_id)";
	mysql_query($sql) or die(mysql_error());
}

?>