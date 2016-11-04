<?php

function n_get_name($n_id){
	$sql = "SELECT name FROM need WHERE id = $n_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return $row['name'];
	}else{
		return 'none';
	}
}

function n_get_cat_name($n_id){
	$sql = "SELECT category FROM need WHERE id = $n_id LIMIT 1";
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

function n_get_info($field,$n_id=0){
	$r="";
	$field_=$field;
	$sql="SELECT $field_ FROM need WHERE id='$n_id'";
	$rst = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($rst)>0){
		$row=mysql_fetch_row($rst);
		$r=$row[0];
	}
	return $r;
}

function people_is_need_follower($n_id, $userid){
	$sql = "SELECT id FROM need_people_roles WHERE need_id = $n_id AND user_id = $userid AND role_id = 3";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}

function people_has_acted($n_id, $userid){
	$sql = "SELECT id FROM need_people_roles WHERE need_id = $n_id AND user_id = $userid AND role_id = 6";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}

function user_is_promoter($n_id, $userid){
	$sql = "SELECT id FROM need_people_roles WHERE need_id = $n_id AND user_id = $userid AND role_id = 2";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}

function need_set_follower($n_id, $userid){
	$sql = "SELECT id FROM need_people_roles WHERE need_id = $n_id AND user_id = $userid AND role_id = 3";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
		$sql = "INSERT INTO need_people_roles(need_id, user_id, role_id) VALUES($n_id, $userid, 3)";
		mysql_query($sql) or die(mysql_error());
	}
}

function need_set_worker($n_id, $userid){
	$sql = "SELECT id FROM need_people_roles WHERE need_id = $n_id AND user_id = $userid AND role_id = 6";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
		$sql = "INSERT INTO need_people_roles(need_id, user_id, role_id) VALUES($n_id, $userid, 6)";
		mysql_query($sql) or die(mysql_error());
	}
}

function need_unfollow($n_id, $user_id){
	$sql = "DELETE FROM need_people_roles WHERE need_id = $n_id AND user_id = $user_id AND role_id = 3";
	mysql_query($sql) or die(mysql_error());
}

function need_get_followers($n_id){
	$followers = array();
	$sql = "SELECT * FROM need_people_roles WHERE need_id = $n_id AND role_id = 3";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$follower['id'] = $row['user_id'];
		$follower['name'] = members_get_info('nombre', $follower['id']);
		$followers[] = $follower;
	}
	return $followers;	
}

function need_get_sworkers($n_id){
	$visitors = array();
	$sql = "SELECT * FROM need_people_roles WHERE need_id = $n_id AND role_id = 6";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$visitor['id'] = $row['user_id'];
		$visitor['name'] = members_get_info('nombre', $follower['id']);
		$visitors[] = $visitor;
	}
	return $visitors;	
}

function need_get_experiences($n_id){
	$experiences = array();
	$sql = "SELECT * FROM need_experiences WHERE need_id = $n_id";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$exp['user_id'] = $row['user_id'];
		$exp['experience'] = $row['experience'];
		$experiences[] = $exp;
	}
	return $experiences;	
}

function need_get_comments($n_id){
	$comments = array();
	$sql = "SELECT * FROM need_comments WHERE need_id = $n_id";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$comm['user_id'] = $row['user_id'];
		$comm['comment'] = $row['comment'];
		$comments[] = $comm;
	}
	return $comments;	
}

function need_add_comment($comment, $userid, $n_id){
	$sql = "INSERT INTO need_comments(comment, user_id, need_id) VALUES('$comment', $userid, $n_id)";
	mysql_query($sql) or die(mysql_error());
}

?>