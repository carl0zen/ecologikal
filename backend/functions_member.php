<?php 
	
function find_url($text){
	$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
	
	// The Text you want to filter for urls
	//$text = "The text you want to filter goes here. http://google.com";
	
	// Check if there is a url in the text
	if(preg_match($reg_exUrl, $text, $url)) {
			   // make the urls hyper links
		   $t = preg_replace($reg_exUrl, "<a class=\"oembed\" target=\"_blank\"  href=\"".$url[0]."\">".$url[0]."</a> ", $text);
		   return $t;
	
	} else {
	
		   // if no urls in the text just return the text
		   return false;
	
	}

}
function get_urls_in_string($string){
	preg_match_all('/(http|https)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', $string, $links);
    return $links;
}
function get_youtube_videos($string) {

    $ids = array();
	$x= array();
	$t="";
    // find all urls
    preg_match_all('/(http|https)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', $string, $links);

    foreach ($links[0] as $link) {
        if (preg_match('~youtube\.com~', $link)) {
            if (preg_match('/[^=]+=([^?]+)/', $link, $id)) {
				$x[0]="youtube";
				$x[1]=$id[1];
				// Check if url contains parameters to get rid of them
				if($params = strpos($x[1], '&')){
					$x[1]= substr($x[1], 0, stripos($x[1], "&") );
				}
				$x[3]=$link;
                $ids[]=$x;
            }
        }
        if (preg_match('~vimeo\.com~', $link)) {
			preg_match('/vimeo\.com\/([0-9]{1,10})/', $link, $matches);
			//if ($matches){
				$x[0]="vimeo";
				$x[1]=$matches[1];
				$x[3]=$link;
                $ids[]=$x;
         //   }
        }
    }

		foreach ($ids as $id) {
			if($id[0]=="youtube"){
				$t.='<div class="media"><iframe class="youtube-player" type="text/html" width="320" height="240" src="http://www.youtube.com/embed/'.$id[1].'?autoplay=0&rel=0" frameborder="0"></iframe></div>';
			}
			if($id[0]=="vimeo"){
				$t.='<div class="media"><iframe src="http://player.vimeo.com/video/'.$id[1].'?title=0&amp;byline=0&amp;portrait=0" width="320" height="240" frameborder="0"></iframe></div>';
			}
		}
    return $t;
}
function stream_get_post_formatted($post_id){
	$r="";
	global $database_ecologikal, $ecologikal, $GEN_USER_ID;
	$sql="Select * From members_stream where to_user_id=$GEN_USER_ID ";
	$rst = mysql_query($sql, $ecologikal) or die(mysql_error());
	if(mysql_num_rows($rst)){
		$row=mysql_fetch_assoc($rst);
		$r="";
	}
	return r;
}
function members_get_info($field,$user_id=0){

	$r="";
	global $database_ecologikal, $ecologikal, $GEN_USER_ID;
	$months=explode(",",LANG_MONTHS);
	if($user_id==0)$user_id=$GEN_USER_ID;
	$field_=$field;
	$sql="SELECT $field_ FROM miembros WHERE user_id='$user_id'";
	$rst = mysql_query($sql, $ecologikal) or die(mysql_error());
	if(mysql_num_rows($rst)>0){
		$row=mysql_fetch_row($rst);
		$r=$row[0];
	}
	if ($field == 'dob'){
		$date = $r;
		$date = strtotime($date);
		$date = date('d - F - Y',$date);
		return $date;
	}
	return $r;
}
function members_get_user_id($username){
	$sql = "SELECT user_id FROM miembros WHERE usuario = '$username'";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['user_id'];
}
function members_display_profile_url($userid){
	echo _VIEWS_URL_."members/member_profile.php?user_id=$userid";
}
function members_get_profile_url($userid){
	return _VIEWS_URL_."members/member_profile.php?user_id=$userid";
}
/** Update fields value
	@param	:	$field, name of the field in the DB
	@param	:	$user_id, the user id
	@param	:	$newvalue, the new value of the field

**/
function members_set_info($field, $user_id=0, $newvalue){
	$r='';
	global $database_ecologikal, $ecologikal, $GEN_USER_ID;
	
	if ($field == 'email'){
		$sql = "SELECT email FROM miembros WHERE email = '$newvalue'";
		$rst = mysql_query($sql, $ecologikal) or die(mysql_error());
		if(mysql_num_rows($rst)>0){
			echo "Email already in use"; exit();
		}
	}
	if ($field == 'usuario'){
		$sql = "SELECT email FROM miembros WHERE email = '$newvalue'";
		$rst = mysql_query($sql, $ecologikal) or die(mysql_error());
		if(mysql_num_rows($rst)>0){
			echo "Username already in use"; exit();
		}
	}
	if($user_id==0)$user_id=$GEN_USER_ID;
	$sql = "SELECT $field FROM miembros WHERE user_id='$user_id'";
	$rst = mysql_query($sql, $ecologikal) or die(mysql_error());
	if (mysql_num_rows($rst)>0){
		
		//If Field info exists, update values
		$sql = "UPDATE miembros SET $field = '$newvalue' WHERE user_id='$user_id'";
		mysql_real_escape_string($sql);
		$rst = mysql_query($sql, $ecologikal) or die(mysql_error());
	}
}
/*** MEMBER LANGUAGES FUNCTIONS 
All the functions regarding member's language field
***/

// Adds a new language to user
function members_add_language($userid, $langid){
	
		//Add new languages to the DB
		$sql = "INSERT INTO members_languages(user_id, lang_id) VALUES ('$userid', '$langid')";
		mysql_real_escape_string($sql);
		$r = mysql_query($sql) or die(mysql_error());
}
// Deletes the previous list of languages given a user id, this is because AutoSuggest output is always a string with all the lang_ids corresponding to them
function members_delete_language_list($userid){
	$sql = "DELETE FROM members_languages WHERE user_id = '$userid'";
	$r = mysql_query($sql);
}
// Returns an array with the Languages and Levels
function members_get_languages($userid){
	$languages = array();
	$i= 0;
 	$sql = "SELECT lang_id FROM members_languages WHERE user_id='$userid'";
	$rst = mysql_query($sql) or die(mysql_error());
	
	while ($row = mysql_fetch_assoc($rst)){
		$langid = $row['lang_id'];
		$sql = "SELECT language, level, id FROM list_languages WHERE id=$langid";
		$rs = mysql_query($sql) or die(mysql_error());
		$r = mysql_fetch_assoc($rs);
		$language = $r['language'];
		$level = $r['level'];
		$id = $r['id'];
		$languages[$i]= array('Language'=> $language, 'Level'=> $level, 'Id'=> $id);
		$i++;
	}
	return $languages;
}
function members_get_language_list_by_id($userid){
	$languages = array();
	$i= 0;
	$sql = "SELECT lang_id FROM members_languages WHERE user_id='$userid'";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$languageid = $row['lang_id'];
		$languages[$i]= (String)$languageid;
		$i++;
	}
	return $languages;
}
function members_display_language_list($userid){
	$list = '';
	$languages = members_get_language_list_by_id($userid);
	foreach ($languages as $i=> $value){
		$list = $list .$languages[$i].",";
	}
	echo $list;
}
//Returns level and lang name from an id
function members_get_language_info($langid){
	$language = array();
	$sql = "SELECT language, level FROM list_languages WHERE id = '$langid'";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$language['language']= $row['language'];
		$language['level']=$row['level'];
	}
	return $language;
}
// Displays the profile pic in full with
function members_display_profile_pic($user_id){
	$user_dir=members_get_info("hash",$user_id);
	$picurl = _MEMBER_PICS_URL_.$user_dir."/profile/profile.jpg";
	$picpath = _MEMBER_PICS_PATH_.$user_dir."/profile/profile.jpg";
	if(file_exists($picpath)){
		echo "<img src='$picurl'/>";
	}else{
		echo "<img src='"._IMAGES_URL_."avatar.png'/>";
	}
}
// Displays profile thumb
function members_display_profile_thumb($user_id){
	$user_dir=members_get_info("hash",$user_id);
	$picurl = _MEMBER_PICS_URL_.$user_dir."/profile/profile_th.jpg";
	$picpath = _MEMBER_PICS_PATH_.$user_dir."/profile/profile_th.jpg";
	if(file_exists($picpath)){
		echo "<img src='$picurl'/>";
	}else{
		echo "<img src='"._IMAGES_URL_."avatar_mini.png'/>";
	}
}
function members_get_profile_thumb($user_id){
	$user_dir=members_get_info("hash",$user_id);
	$picurl = _MEMBER_PICS_URL_.$user_dir."/profile/profile_th.jpg";
	$picpath = _MEMBER_PICS_PATH_.$user_dir."/profile/profile_th.jpg";
	if(file_exists($picpath)){
		return "<img src='$picurl'/>";
	}else{
		return "<img src='"._IMAGES_URL_."avatar_mini.png'/>";
	}
}
function members_picture($field,$user_id=0){
	$array_fields = array("member_picture_id");
	$r="";
	global $database_ecologikal, $ecologikal, $GEN_USER_ID;
	if($user_id==0)$user_id=$GEN_USER_ID;
	if($field && in_array($field,$array_fields)){

		$sql="SELECT member_picture_id From members_pictures Where user_id='$user_id' ORDER BY member_picture_id DESC Limit 1";
		$rst = mysql_query($sql, $ecologikal) or die(mysql_error());
		if(mysql_num_rows($rst)>0){
			$row=mysql_fetch_assoc($rst);
			$r=$row[0];
		}
	}
	return $r;
}
function member_insert_picture($picture_hash,$desc){

		global $database_ecologikal, $ecologikal, $GEN_USER_ID;

		$sql=sprintf("INSERT INTO members_pictures (date, user_id, hash, description ) Values(now(), $GEN_USER_ID, '$picture_hash',%s);",GetSQLValueString($desc,'text'));
		mysql_real_escape_string($sql);
		$rst = mysql_query($sql, $ecologikal);
		if (mysql_errno()){
			return false;
		}else{
			return true;
		}
}
function member_delete_picture($picture_hash){

		global $database_ecologikal, $ecologikal, $GEN_USER_ID;

		$sql="DELETE FROM members_pictures Where user_id=$GEN_USER_ID And hash='$picture_hash';";
		$rst = mysql_query($sql, $ecologikal);
		if (mysql_errno()){
			return false;
		}else{
			return true;
		}
}

/** MEMBER FLOWER FUNCTIONS
	ADD FUNCTIONS**/
// Adds a new skill to a member
function members_add_skill($userid, $skid, $sklevel, $skdesc){
	$sql= "INSERT INTO member_skills(user_id, skill_id, grade, description) VALUES ('$userid','$skid','$sklevel','$skdesc')";
	mysql_real_escape_string($sql);
	$r = mysql_query($sql) or die(mysql_error());
	members_update_kins($userid, 'skill');
}
function members_delete_skill($userid, $skillid){
	$sql = "DELETE FROM member_skills WHERE user_id = '$userid' AND skill_id='$skillid'";
	$r = mysql_query($sql) or die(mysql_error());
	members_update_kins($userid, 'deleteskill');
}
function members_get_skill_count($userid){
	$sql = "SELECT COUNT(*) AS noskills FROM member_skills WHERE user_id=$userid";
	$r = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_assoc($r);
	return $row['noskills'];
}
function members_get_total_skills($userid){
	$sql = "SELECT COUNT(*) AS noskills FROM member_skills WHERE user_id='$userid'";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $noskills = $row['noskills'];
}
// Returns number of skills by petal
function members_get_no_skills($userid, $petalno){
	$noskills = 0;
	$sql = "SELECT skill_id, grade, description FROM member_skills WHERE user_id = '$userid'";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
 		 $skillid = $row['skill_id'];
		 $skillpetal = members_get_skill_petal($skillid);
		$skill = array();
		if ($skillpetal == $petalno){
			$noskills ++;
		}
	}
	return $noskills;
}
//Returns petal number based on a skill id
function members_get_skill_petal($skillid){
	$sql = "SELECT skill_category_id FROM skills WHERE skill_id='$skillid'";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $skillpetal = $row['skill_category_id'];
}
//Returns the skillname from a skill id
function members_get_skill_name($skillid){
	$sql = "SELECT skill FROM skills WHERE skill_id='$skillid'";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $name = $row['skill'];
}
//Returns an array with all skills in a given petal
function members_get_skills_by_petal($userid, $petalno){
	
	$skills = array();
	$sql = "SELECT skill_id, grade, description FROM member_skills WHERE user_id = '$userid'";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
 		 $skillid = $row['skill_id'];
		 $skillpetal = members_get_skill_petal($skillid);
		$skill = array();
		if ($skillpetal == $petalno){
			$skill['id']=$skillid;
			$skill['name'] = members_get_skill_name($skillid);
			$skill['description'] = $row['description'];
			$skill['grade'] = $row['grade'];
			$skill['petal']= $skillpetal;
			$skill['petalname'] = get_petal_name($skillpetal);
			$skills[] = $skill;
		}
	}
	return $skills;
}
//Returns an array with references of a particular skill
function members_get_skill_ref($userid, $skillid){
	$refs = array();
	$sql = "SELECT user_from, user_to, grade, description FROM member_references WHERE skill_id = '$skillid' AND user_to = '$userid'";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$ref = array();
		$ref['user_from'] = $row['user_from'];
		$ref['grade'] = $row['grade'];
		$ref['description'] = $row['description'];
		$ref['user_avatar'] = members_get_profile_thumb($ref['user_from']);
		$ref['user_name'] = members_get_info('nombre', $ref['user_from']);
		$refs[]= $ref;
	}
	return $refs;
}
function members_get_skill_grade($userid, $skillid){
	
}
// Returns the petal grade
function members_get_petal_grade($userid, $petalno){
	$sum = 0;
	$sql = "SELECT grade, skill_id FROM member_skills WHERE user_id='$userid'";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$grade = $row['grade'];
		$skillid = $row['skill_id'];
		$nopetal = members_get_skill_petal($skillid);
		if ($nopetal == $petalno){
			$sum += $grade;
		}
	}
	if ($sum == 0){
		return null;
	}
	$average = $sum / members_get_no_skills($userid, $petalno);
	$average = round($average);
	return $average;
}
// Returns the average grade of all petals
function members_get_flower_grade($userid){
	$sum = 0;
	$sql = "SELECT grade FROM member_skills WHERE user_id='$userid'";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$grade = $row['grade'];
		$sum += $grade;
	}
	if ($sum == 0){
		return null;
	}
	$average = $sum / members_get_total_skills($userid);
	$average = round($average);
	return $average;
}
/** REFERENCES ***/
//Returns true if a Reference was left from the user, to avoid duplicate references
function members_check_reference($userto, $skillid){
	$userfrom = $_SESSION['user_id'];
	$sql = "SELECT * FROM member_references WHERE user_from = '$userfrom' AND user_to = '$userfrom' AND skill_id = '$skillid'";
	$r = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($r);
	if ($row == null){
		return false;
	}else{
		return true;
	}
	
}
// Adds a reference to a particular skill
function members_add_reference($userto, $userfrom, $skillid, $refdesc, $refgrade){

	$sql = "INSERT INTO member_references(user_to, user_from, skill_id, description, grade) VALUES ('$userto', '$userfrom', '$skillid','$refdesc','$refgrade')";
	mysql_real_escape_string($sql);
	$r = mysql_query($sql) or die(mysql_error());
	members_update_kins($userfrom,'reference');
//	$sql = "SELECT AVG(grade) AS average FROM member_references WHERE user_to = '$userto' AND skill_id='$skillid'";
//	$r = mysql_query($sql) or die(mysql_error());
//	$row = mysql_fetch_assoc($r);
//	$average = $row['average'];
//	$sql = "UPDATE grade FROM member_skills WHERE user_id = '$userto' AND skill_id = '$skillid'";
//	$r = mysql_query($sql) or die(mysql_error());
}

// Returns total number of skills of a user

// GAME FUNCTiONS
/** Adds kins to a member depending on the type of posting
	types: skill(+3), video(+3)
	UPDATE miembros SET $field = '$newvalue' WHERE user_id='$user_id'
**/
function members_update_kins($userid, $type){
	if($type == 'skill'){
		$points = 3;
	}
	if($type == 'reference'){
		$points = 3;
	}
	if($type == 'place'){
		$points = 3;
	}
	if($type == 'video'){
		$points = 1;
	}
	if($type == 'photo'){
		$points = 1;
	}
	if($type == 'deleteskill'){
		$points = -3;
	}
	if($type == 'deletereference'){
		$points = -3;
	}
	$sql="UPDATE miembros SET user_kins = user_kins + $points WHERE user_id = $userid";
	mysql_real_escape_string($sql);
	$r = mysql_query($sql) or die(mysql_error());
}
// Get kins
function members_get_kins($userid){
	$sql= "SELECT user_kins FROM miembros WHERE user_id= $userid";
	$r = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($r);
	$kins = $row['user_kins'];
	return $kins;
}
/** BOND FUNCTIONS **/
function members_send_notification($userfrom, $userto, $message, $type, $itemid = 0){
	if($type == 'message'){
		$sql = "SELECT * FROM notifications WHERE user_from = '$userfrom' AND user_to = '$userto' AND type = 'message' AND status IS NULL ";
		$rst = mysql_query($sql) or die(mysql_error());
		$r = mysql_fetch_assoc($rst);
		if ($r != null){
			exit();
		}
	}
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);
	$sql = "INSERT INTO notifications(user_from, user_to, message, type, time, item_id) VALUES ($userfrom, $userto, '$message', '$type', '$time', $itemid)";
	mysql_real_escape_string($sql);
	mysql_query($sql) or die(mysql_error());
}
// Updates the status of a notification
function members_update_notification_status($userfrom, $userto, $type, $status){
	$sql = "UPDATE notifications SET status='$status' WHERE user_from = $userfrom AND user_to = $userto AND type = '$type' ";
	mysql_real_escape_string($sql);
	mysql_query($sql) or die(mysql_error());
}
function members_update_notification_status_by_id($notifid, $status){
	$sql = "UPDATE notifications SET status='$status' WHERE id = $notifid ";
	mysql_real_escape_string($sql);
	mysql_query($sql) or die(mysql_error());
}
// Gets the status of a notifications
function members_get_notification_status($userfrom,$userto, $type){
	$sql= "SELECT status FROM notifications WHERE user_from = $userfrom AND user_to = $userto AND type = '$type'";
	$rst = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_assoc($rst);
	$status = $row['status'];
	return $status;
}
//Requests a user to be friend
function members_request_friendship($userfrom, $userto, $message){
	$type = 'friendship';
	members_send_notification($userfrom, $userto, $message, $type);
}

function members_add_friend($userfrom, $userto){
	//Adds bond
	if (!members_is_friend($userfrom)){
		$sql = "INSERT INTO member_bonds(user_from, user_to, type) VALUES($userfrom, $userto, 'friendship')";
		mysql_real_escape_string($sql);
		mysql_query($sql) or die(mysql_error());
		//Adds bond back
		$sql = "INSERT INTO member_bonds(user_from, user_to, type) VALUES($userto, $userfrom, 'friendship')";
		mysql_real_escape_string($sql);
		mysql_query($sql) or die(mysql_error());
		// Sends Notification of acceptance
		$usertoname  = members_get_info('nombre', $userto);
		$message = "$usertoname has accepted you as a friend";
		members_send_notification($userto, $userfrom, $message, 'friendship_accept');
		members_update_notification_status($userfrom, $userto,'friendship', 'read');
	}
}
function members_get_friends_in_common($userid){
	$commonfriends = 0;
	$myid = $_SESSION['user_id'];
	$friendsofuser = members_get_friends($userid);
	$myfriends = members_get_friends($myid);
	foreach ($friendsofuser as $x => $value) {
		foreach ($myfriends as $y => $value) {
			if($friendsofuser[$x]['user_id'] == $myfriends[$y]['user_id']){
				$commonfriends++;
			}
		}
	}
	return $commonfriends;
}
// Delete friendship
function members_delete_friend($userto){
	$userfrom = $_SESSION['user_id'];
	$sql = "DELETE FROM member_bonds WHERE user_from = $userfrom AND user_to=$userto";
	mysql_query($sql) or die(mysql_error());
	$sql = "DELETE FROM member_bonds WHERE user_from = $userto AND user_to=$userfrom";
	mysql_query($sql) or die(mysql_error());
	members_delete_request($userfrom, $userto, 'friendship');
	members_delete_request($userto, $userfrom, 'friendship');
}
//Check if session user is friend with profile displayed
function members_is_friend($userto){
	$userfrom = $_SESSION['user_id'];
	$sql = "SELECT * FROM member_bonds WHERE user_from =$userfrom AND user_to = $userto";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if($userto == $userfrom){
		return true;
	}
	if ($row == null){
		return false;
	}else{
		return true;
	}
}
// returns array with member info
function members_get_friends($userid){
	$members = array();
	$sql  = "SELECT user_to FROM member_bonds WHERE user_from = $userid";
	$rst = mysql_query($sql) or die (mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$userid = $row['user_to'];
		$member['user_id']=$userid;
		$member['name'] = members_get_info('nombre', $userid);
		$member['lastname'] = members_get_info('apellido', $userid);
		$member['hash'] = members_get_info('hash', $userid);
		$members[] = $member;
	}
	return $members;
}
//Return True if a friendship request has been sent
function members_check_request($userfrom, $userto, $type){
	$sql = "SELECT id FROM notifications WHERE user_from = $userfrom AND user_to = $userto AND type='$type'";
	$r = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($r);
	if ($row['id'] == null){
		return false;
	}else{
		return true;
	}
}
function members_delete_request($userfrom,$userto, $type){
	$sql = "DELETE FROM notifications WHERE user_from = $userfrom AND user_to = $userto AND type='$type'";
	$r = mysql_query($sql) or die (mysql_error());
}
//Return true if users are friends
function members_are_friends($userfrom, $userto){
	
}
function members_get_notifications($userid){
	$notifications = array();
	$sql = "SELECT *  FROM notifications WHERE user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			$notification['time'] = $row['time'];
			$notification['item_id'] = $row['item_id'];
			$notification['id']= $row['id'];
			$notification['userfrom'] = $row['user_from'];
			$notification['userto'] = $row['user_to'];
			$notification['type'] = $row['type'];
			$notification['message'] = $row['message'];
			$notifications[] = $notification;
	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}
function members_get_community_notifications($userid){
	$sql = "SELECT * FROM notifications WHERE type LIKE 'friendship%' AND user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			$notification['time'] = $row['time'];
			$notification['item_id'] = $row['item_id'];
			$notification['id']= $row['id'];
			$notification['userfrom'] = $row['user_from'];
			$notification['userto'] = $row['user_to'];
			$notification['type'] = $row['type'];
			$notification['message'] = $row['message'];
			$notifications[] = $notification;
	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}
function members_get_media_notifications($userid){
	$sql = "SELECT * FROM notifications WHERE type LIKE 'media%' AND user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			$notification['time'] = $row['time'];
			$notification['item_id'] = $row['item_id'];
			$notification['id']= $row['id'];
			$notification['userfrom'] = $row['user_from'];
			$notification['userto'] = $row['user_to'];
			$notification['type'] = $row['type'];
			$notification['message'] = $row['message'];
			$notifications[] = $notification;
	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}
function members_get_trip_notifications($userid){
	$sql = "SELECT * FROM notifications WHERE type LIKE 'trip%' AND user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			$notification['time'] = $row['time'];
			$notification['item_id'] = $row['item_id'];
			$notification['id']= $row['id'];
			$notification['userfrom'] = $row['user_from'];
			$notification['userto'] = $row['user_to'];
			$notification['type'] = $row['type'];
			$notification['message'] = $row['message'];
			$notifications[] = $notification;
	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}
function members_get_ec_notifications($userid){
	$sql = "SELECT * FROM notifications WHERE type LIKE 'ec%' AND user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			$notification['time'] = $row['time'];
			$notification['item_id'] = $row['item_id'];
			$notification['id']= $row['id'];
			$notification['userfrom'] = $row['user_from'];
			$notification['userto'] = $row['user_to'];
			$notification['type'] = $row['type'];
			$notification['message'] = $row['message'];
			$notifications[] = $notification;
	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}
function members_get_game_notifications($userid){
	$sql = "SELECT * FROM notifications WHERE type LIKE 'game%' AND user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			$notification['time'] = $row['time'];
			$notification['item_id'] = $row['item_id'];
			$notification['id']= $row['id'];
			$notification['userfrom'] = $row['user_from'];
			$notification['userto'] = $row['user_to'];
			$notification['type'] = $row['type'];
			$notification['message'] = $row['message'];
			$notifications[] = $notification;
	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}
function members_get_message_notifications($userid){
	$sql = "SELECT * FROM notifications WHERE type LIKE 'message%' AND user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			$notification['time'] = $row['time'];
			$notification['item_id'] = $row['item_id'];
			$notification['id']= $row['id'];
			$notification['userfrom'] = $row['user_from'];
			$notification['userto'] = $row['user_to'];
			$notification['type'] = $row['type'];
			$notification['message'] = $row['message'];
			$notifications[] = $notification;
	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}







function members_get_unread_community_notifications($userid){
	$sql = "SELECT * FROM notifications WHERE type LIKE 'friend%' AND user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			if ($notification['status'] != 'read'){
				$notification['time'] = $row['time'];
				$notification['item_id'] = $row['item_id'];
				$notification['id']= $row['id'];
				$notification['userfrom'] = $row['user_from'];
				$notification['userto'] = $row['user_to'];
				$notification['type'] = $row['type'];
				$notification['message'] = $row['message'];
				$notifications[] = $notification;
			}

	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}
function members_get_unread_media_notifications($userid){
	$sql = "SELECT * FROM notifications WHERE type LIKE 'media%' AND user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			if ($notification['status'] != 'read'){
				$notification['time'] = $row['time'];
				$notification['item_id'] = $row['item_id'];
				$notification['id']= $row['id'];
				$notification['userfrom'] = $row['user_from'];
				$notification['userto'] = $row['user_to'];
				$notification['type'] = $row['type'];
				$notification['message'] = $row['message'];
				$notifications[] = $notification;
			}

	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}
function members_get_unread_trip_notifications($userid){
	$sql = "SELECT * FROM notifications WHERE type LIKE 'trip%' AND user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			if ($notification['status'] != 'read'){
				$notification['time'] = $row['time'];
				$notification['item_id'] = $row['item_id'];
				$notification['id']= $row['id'];
				$notification['userfrom'] = $row['user_from'];
				$notification['userto'] = $row['user_to'];
				$notification['type'] = $row['type'];
				$notification['message'] = $row['message'];
				$notifications[] = $notification;
			}

	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}
function members_get_unread_ec_notifications($userid){
	$sql = "SELECT * FROM notifications WHERE type LIKE 'ec%' AND user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			if ($notification['status'] != 'read'){
				$notification['time'] = $row['time'];
				$notification['item_id'] = $row['item_id'];
				$notification['id']= $row['id'];
				$notification['userfrom'] = $row['user_from'];
				$notification['userto'] = $row['user_to'];
				$notification['type'] = $row['type'];
				$notification['message'] = $row['message'];
				$notifications[] = $notification;
			}

	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}
function members_get_unread_game_notifications($userid){
	$sql = "SELECT * FROM notifications WHERE type LIKE 'game%' AND user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			if ($notification['status'] != 'read'){
				$notification['time'] = $row['time'];
				$notification['item_id'] = $row['item_id'];
				$notification['id']= $row['id'];
				$notification['userfrom'] = $row['user_from'];
				$notification['userto'] = $row['user_to'];
				$notification['type'] = $row['type'];
				$notification['message'] = $row['message'];
				$notifications[] = $notification;
			}

	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}
function members_get_unread_message_notifications($userid){
	$sql = "SELECT * FROM notifications WHERE type LIKE 'message%' AND user_to = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$notification['status'] = $row['status'];
			if ($notification['status'] != 'read'){
				$notification['time'] = $row['time'];
				$notification['item_id'] = $row['item_id'];
				$notification['id']= $row['id'];
				$notification['userfrom'] = $row['user_from'];
				$notification['userto'] = $row['user_to'];
				$notification['type'] = $row['type'];
				$notification['message'] = $row['message'];
				$notifications[] = $notification;
			}

	}
	if ($notifications == null){
		return null;
	}
	return $notifications;
}
// Boolean function to know if the notification to be displayed is from the user
function members_is_my_notification($notifid){
	$userid = $_SESSION['user_id'];
	$sql = "SELECT user_from FROM notifications WHERE id = $notifid AND user_from = $userid ";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}
function members_count_unread_notifications($userid){
	$sql ="SELECT COUNT(*) AS nonotif FROM notifications WHERE user_to = $userid AND status IS NULL";
	$rst = mysql_query($sql) or die (mysql_error());
	$r = mysql_fetch_assoc($rst);
	return $r['nonotif'];
}
/** MESSAGES **/
function members_send_message($userfrom, $friends, $message){
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);

	// Check for multi-threaded Messages
	if(count($friends)>1){
		$thread_id = members_create_message_thread($userfrom, 'multi');
		// Insert the author message into the DB
		$sql = "INSERT INTO messages(thread_id, user_from, user_id, message, time) VALUES($thread_id, $userfrom, $userfrom, '$message', '$time')";
		mysql_real_escape_string($sql);
		mysql_query($sql) or die (mysql_error());
		//Add user to the thread
		$sql = "INSERT INTO message_thread_members(thread_id, user_id) VALUES($thread_id, $userfrom)";
		mysql_query($sql) or die(mysql_error());
		foreach ($friends as $key => $value) {
			// Add Members to the thread
			$sql = "INSERT INTO message_thread_members(thread_id, user_id) VALUES($thread_id, $friends[$key])";
			mysql_query($sql) or die(mysql_error());
			// Creating the message for all users in the thread
			$sql = "INSERT INTO messages(thread_id, user_from, user_id, message, time) VALUES($thread_id, $userfrom, $friends[$key], '$message', '$time')";
			mysql_real_escape_string($sql);
			mysql_query($sql) or die (mysql_error());
		}
	}else{
		$thread_id = null;
		$sql = "SELECT thread_id FROM message_thread_members WHERE user_id = $userfrom";
		$rst = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_assoc($rst)){
			$userfrom_thread_id = $row['thread_id'];
			if($userfrom_thread_id){
				$sql2 = "SELECT thread_id FROM message_thread_members WHERE user_id = $friends[0] AND thread_id = $userfrom_thread_id ";
				$rst2 = mysql_query($sql2) or die(mysql_error());
				$row2 = mysql_fetch_assoc($rst2);
				echo $thread_id = $row2['thread_id'];
			}
		}
		
		// IF SINGLE THREAD AND NO MESSAGES EXIST
		if ($thread_id == null){
			$thread_id = members_create_message_thread($userfrom, 'single');
			//Add friend to thread members table
			$sql = "INSERT INTO message_thread_members(user_id, thread_id) VALUES($friends[0], $thread_id)";
			mysql_query($sql) or die(mysql_error());
			// Add to userfrom messages table
			$sql = "INSERT INTO message_thread_members(user_id, thread_id) VALUES($userfrom, $thread_id)";
			mysql_query($sql) or die(mysql_error());
			//Add message to user's threads
			$sql = "INSERT INTO messages(thread_id, user_from, user_id, message, time) VALUES($thread_id, $userfrom,  $userfrom, '$message', '$time')";
			mysql_query($sql) or die (mysql_error());	
			$sql = "INSERT INTO messages(thread_id, user_from, user_id, message, time) VALUES($thread_id, $userfrom,  $friends[0], '$message', '$time')";
			mysql_query($sql) or die (mysql_error());
		}else{
			foreach ($friends as $key => $value) {
				// check if thread is single
				$type = members_get_thread_type($thread_id);
				if($type == 'single'){
					$sql2 = "SELECT thread_id FROM message_thread_members WHERE user_id = $friends[0] AND thread_id = $thread_id";
					$rst2 = mysql_query($sql2) or die(mysql_error());
					while ($row2 = mysql_fetch_assoc($rst2)){
						//Add message to user's threads
						$sql = "INSERT INTO messages(thread_id, user_from, user_id, message, time) VALUES($thread_id, $userfrom,  $userfrom, '$message', '$time')";
						mysql_query($sql) or die (mysql_error());
						$sql = "INSERT INTO messages(thread_id, user_from, user_id, message, time) VALUES($thread_id, $userfrom,  $friends[0], '$message', '$time')";
						mysql_query($sql) or die (mysql_error());
					}
				}
			}
		}
	}
}
function members_get_thread_members($thread_id){
	$userid = $_SESSION['user_id'];
	$sql = "SELECT DISTINCT user_id FROM message_thread_members WHERE id = $thread_id AND user_id <> $userid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($rst);

}
function members_create_message_thread($user_id, $type){
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);
	echo $sql = "INSERT INTO message_threads(creator_id, time, type) VALUES($user_id, '$time', '$type')";
	mysql_query($sql) or die(mysql_error());
	return $id = mysql_insert_id();
}
function members_get_thread_creator($thread_id){
	$sql = "SELECT creator_id FROM message_threads WHERE id = $thread_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['creator_id'];
}
function members_get_thread_type($thread_id){
	$sql = "SELECT type FROM message_threads WHERE id = $thread_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['type'];	
}
function members_get_last_thread_message($thread_id){
	$messages = array();
	$sql = "SELECT DISTINCT message, user_from, time FROM messages WHERE time = (SELECT MAX(time) FROM messages WHERE thread_id = $thread_id)";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
    $message['text'] = $row['message'];
    $message['user_from'] = $row['user_from'];
    $message['time'] = $row['time'];
	$messages[] = $message;
	return $messages;
}
function members_get_thread_recipients($thread_id){
	$userid = $_SESSION['user_id'];
	$sql = "SELECT DISTINCT user_id FROM message_thread_members WHERE thread_id = $thread_id AND user_id <> $userid";
	$rst = mysql_query($sql) or die(mysql_error());
	$recipients = array();
	while ($row = mysql_fetch_assoc($rst)) {
		$recipient['user_id'] = $row['user_id'];
		$recipients[] = $recipient;
	}
	if ($recipients) {
		return $recipients;
	}
}
function members_get_thread_messages($thread_id){
	$messages = array();
	$userid = $_SESSION['user_id'];
	$sql = "SELECT DISTINCT message FROM messages WHERE thread_id = $thread_id AND user_id = $userid ORDER BY time desc";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$message['user_from'] = $row['user_from'];
		$message['time'] = $row['time'];
		$message['id']= $row['id'];
		$message['message'] = $row['message'];
		$messages[] = $message;
	}
	if($messages){
		return $messages;
	}
}
function members_get_message_threads($user_id){
	$threads = array();
	$sql = "SELECT DISTINCT thread_id FROM messages WHERE user_id = $user_id ORDER BY time DESC";
	$rst = mysql_query($sql);
	while ($row = mysql_fetch_assoc($rst)){
			$thread['id'] = $row['thread_id'];
			$thread['creator_id'] = members_get_thread_creator($thread['id']);
			// Get all friends the thread goes to
			// Get type of thread
			$thread['type'] = members_get_thread_type($thread['id']);
					/** Get friends if multi, get friend if single
					echo $sql = "SELECT user_id FROM messages WHERE thread_id = ".$thread['id'];

					$rst = mysql_query($sql) or die(mysql_error()); **/
					
			
			
			$lastmessage = members_get_last_thread_message($thread['id']);
			$thread['message'] 			= $lastmessage[0]['text'];
		 	$thread['message_user_id'] 	= $lastmessage[0]['user_id'];
			$thread['user_from']		= $lastmessage[0]['user_from'];
			$thread['message_time'] 	= $lastmessage[0]['time'];
			$thread['recipients'] = members_get_thread_recipients($thread['id']);
			$threads[] = $thread;
	}
	if ($threads == null){
		return null;
	}
	return $threads;
}
function members_delete_message($messageid){
	$sql = "DELETE FROM messages WHERE id = $messageid";
	$r = mysql_query($sql) or die (mysql_error());
}

function members_get_sent_messages(){
	$messages = array();
	$userid = $_SESSION['user_id'];
	$sql = "SELECT DISTINCT user_to FROM messages WHERE user_from = $userid ORDER BY time DESC";
	$rst = mysql_query($sql);
	while ($row = mysql_fetch_assoc($rst)){
			$message['status'] = $row['status'];
			$message['time'] = $row['time'];
			$message['id']= $row['id'];
			$message['userfrom'] = $row['user_from'];
			$message['userto'] = $row['user_to'];
			$message['message'] = $row['message'];
			$messages[] = $message;
	}
	if ($messages == null){
		return null;
	}
	return $messages;
}
function members_are_messages_read($userid){
	$sql = "SELECT id FROM messages WHERE";
}
function members_get_messages(){
	$messages = array();
	$userid = $_SESSION['user_id'];
	$sql = "SELECT DISTINCT user_from, user_to FROM messages WHERE (user_from = $userid OR user_to = $userid) ORDER BY time DESC";
	$rst = mysql_query($sql);
	while ($row = mysql_fetch_assoc($rst)){
			$type= 'received';
			$from = $row['user_from'];
			$to = $row['user_to'];
			if($from == $userid){
				$from = $to;
				$type = 'sent';
			}
			$message['status'] = $row['status'];
			$message['type'] = $type;
			$message['time'] = $row['time'];
			$message['id']= $row['id'];
			$message['userfrom'] = $from;
			$message['userto'] = $to;
			$message['message'] = $row['message'];
			$messages[] = $message;
	}
	if ($messages == null){
		return null;
	}
	return $messages;
}
function members_get_next_messages($from, $lastmessageid){
	$to = $_SESSION['user_id'];
	$sql ="SELECT * FROM messages WHERE ((user_from = $from AND user_to = $to) OR (user_from = $to AND user_to = $from)) AND id < 			$lastmessageid ORDER BY time DESC LIMIT 5";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$message['status'] = $row['status'];
			$message['time'] = $row['time'];
			$message['id']= $row['id'];
			$message['userfrom'] = $row['user_from'];
			$message['userto'] = $row['user_to'];
			$message['message'] = $row['message'];
			$messages[] = $message;
	}
	if ($messages == null){
		return null;
	}
	return $messages;
}
function members_get_messages_from($from){
	$messages = array();
	$to = $_SESSION['user_id'];
	$sql = "SELECT * FROM messages WHERE (user_from = $from AND user_to = $to) OR (user_from = $to AND user_to = $from) ORDER BY time DESC";
	$rst = mysql_query($sql);
	while ($row = mysql_fetch_assoc($rst)){
			$message['status'] = $row['status'];
			$message['time'] = $row['time'];
			$message['id']= $row['id'];
			$message['userfrom'] = $row['user_from'];
			$message['userto'] = $row['user_to'];
			$message['message'] = $row['message'];
			$messages[] = $message;
	}
	if ($messages == null){
		return null;
	}
	return $messages;
}

// MAPS FUNCTIONALITY
function members_update_geolocation($lat, $lng){
	$userid = $_SESSION['user_id'];
	$sql = "UPDATE miembros SET latitude = '$lat', longitude = '$lng' WHERE user_id = $userid";
	mysql_real_escape_string($sql);
	mysql_query($sql);
}
function members_get_geolocation($userid){
	$geolocation = array();
	$sql = "SELECT latitude, longitude FROM miembros WHERE user_id = $userid";
	$r = mysql_query($sql);
	$row = mysql_fetch_assoc($r);
	if ($row != null){
		$geolocation['lat']= $row['latitude'];
		$geolocation['lng']= $row['longitude'];
		return $geolocation;
	}else{
		return null;
	}
}
function members_get_tracking_settings(){
	$userid = $_SESSION['user_id'];
	$sql = "SELECT settings_tracking FROM miembros WHERE user_id = $userid";
	$r = mysql_query($sql);
	$row = mysql_fetch_assoc($r);
	return $row['settings_tracking'];
}
function members_update_tracking_settings($value){
	$userid = $_SESSION['user_id'];
	$sql = "UPDATE miembros SET settings_tracking = $value WHERE user_id = $userid";
	mysql_real_escape_string($sql);
	mysql_query($sql);
}

/** GALLERY FUNCTIONS 
	All functions for member Gallery

**/
function members_add_album($userid, $name, $description){
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);
	$sql = "INSERT INTO member_albums(user_id, name, time, description) VALUES($userid, '$name', '$time', '$description')";
	mysql_real_escape_string($sql);
	mysql_query($sql);
}
function members_get_albums($userid){
	$albums = array();
	$sql = "SELECT * FROM member_albums WHERE user_id = $userid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$album['id'] = $row['id'];
			$album['user_id'] = $row['user_id'];
			$album['name'] = $row['name'];
			$album['description'] = $row['description'];
			$album['time'] = $row['time'];
			$albums[] = $album;
	}
	if ($albums == null){
		return null;
	}
	return $albums;
}
//Returns an html element with picture thumbs wrapped in anchor tag to open a fancybox
function members_display_album_pictures_fancybox($userid, $albumname){
	$hash = members_get_info('hash', $userid);
	$folder = _MEMBER_PICS_PATH_. $hash."/albums/".$albumname."/";
	$folderurl = _MEMBER_PICS_URL_. $hash."/albums/".$albumname."/";
	if(is_dir($folder)){
		$dh = opendir($folder);
		$images = array();
		while (($file = readdir($dh)) !== false) {
			if (preg_match('([^\s]+(\.(?i)(jpg|png|gif|bmp))$)', $file)){
				$images[] = $file;
			}
		        
		}
		foreach ($images as $key => $value) {
			$albumrel = str_replace(" ", "", $albumname);
			$imgdesc = members_get_pic_description($userid, $images[$key]);
			echo "<a href='".$folderurl.$images[$key]."' class='iframe pic' rel='".$albumrel."' title='$albumname - $imgdesc'><img src='".$folderurl."thumbs/".$images[$key]."'></a>";
		}
		closedir($dh);
	}
}
function members_get_picture_id($userid, $albumid, $imgname){
	$sql = "SELECT id FROM member_pictures WHERE album_id = $albumid AND user_id = $userid AND name = '$imgname'";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return $row['id'];
	}else{
		return null;
	}
}
function members_get_album_pictures($userid, $albumname){
	$imagelist = array();
	$albumid = members_get_album_id($userid, $albumname);
	$hash = members_get_info('hash', $userid);
	$folder = _MEMBER_PICS_PATH_. $hash."/albums/".$albumname."/";
	$folderurl = _MEMBER_PICS_URL_. $hash."/albums/".$albumname."/";
	if(is_dir($folder)){
		$dh = opendir($folder);
		$images = array();
		while (($file = readdir($dh)) !== false) {
			if (preg_match('([^\s]+(\.(?i)(jpg|png|gif|bmp))$)', $file)){
				$images[] = $file;
			}
		        
		}
		foreach ($images as $key => $value) {
			$image['name'] = $images[$key];
			$image['url'] = $folderurl.$images[$key];
			$image['id'] = members_get_picture_id($userid, $albumid, $image['name']);
			$imagelist[] = $image;
		}
		closedir($dh);
		return $imagelist;
	}
	
}
function members_get_album_picture_thumbs($userid, $albumname){
	$imagelist = array();
	$albumid = members_get_album_id($userid, $albumname);
	$hash = members_get_info('hash', $userid);
	$folder = _MEMBER_PICS_PATH_. $hash."/albums/".$albumname."/";
	$folderurl = _MEMBER_PICS_URL_. $hash."/albums/".$albumname."/";
	if(is_dir($folder)){
		$dh = opendir($folder);
		$images = array();
		$pic_types = array("jpg", "jpeg", "gif", "png");
		while (($file = readdir($dh)) !== false) {
				if (preg_match('([^\s]+(\.(?i)(jpg|png|gif|bmp))$)', $file)){
					$images[] = $file;
				}
		        
		}
		foreach ($images as $key => $value) {
			$image['name'] = $images[$key];
			$image['id'] = members_get_picture_id($userid, $albumid, $image['name']);
			$image['url'] = $folderurl."thumbs/".$images[$key];
			$imagelist[] = $image;
		}
		closedir($dh);
		
		return $imagelist;
	}
	
}
function members_get_picture_from_id($userid, $picid){
	$sql = "SELECT name, album_id, user_id, description FROM member_pictures WHERE id= $picid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		$image['name'] = $row['name'];
		$image['album_id'] = $row['album_id'];
		$image['user_id'] = $row['user_id'];
		$image['url'] = _MEMBER_PICS_URL_ . members_get_info('hash', $userid) ."/albums/".members_get_album_name($userid, $image['album_id'])."/".$image['name'];
		$image['description']= $row['description'];
		return $image;
	}else{
		return null;
	}
}
function members_get_album_id($userid, $albumname){
	$sql = "SELECT id FROM member_albums WHERE user_id = $userid AND name = '$albumname' ";
	$rst= mysql_query($sql) or die($rst);
	
	$row = mysql_fetch_assoc($rst);
	
	if ($row){
		$id = $row['id'];
		return $id;
	}else{
		return null;
	}
}
function members_get_album_name($userid, $id){
	$sql = "SELECT name FROM member_albums WHERE user_id = $userid AND id = $id ";
	$rst= mysql_query($sql) or die($rst);
	
	$row = mysql_fetch_assoc($rst);
	
	if ($row){
		$name = $row['name'];
		return $name;
	}else{
		return null;
	}
}
function members_add_picture_description($userid, $imgname, $imgdesc, $albumid){
	// Avoid duplicate descriptions
	$sql = "SELECT id FROM member_pictures WHERE user_id =$userid AND name = '$imgname' AND album_id = $albumid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst); 
	if(!$row){ 
		$sql = "INSERT INTO member_pictures(user_id, name, description, album_id) VALUES($userid, '$imgname', '$imgdesc', $albumid)";
		mysql_real_escape_string($sql);
		mysql_query($sql) or die(mysql_error());
	}else{
		$sql = "UPDATE member_pictures SET description = '$imgdesc' WHERE user_id=$userid AND album_id = $albumid AND name = '$imgname' ";
		mysql_real_escape_string($sql);
		mysql_query($sql) or die(mysql_error());
	}
}
function members_pic_has_description($userid, $imgname){
	$sql = "SELECT description FROM member_pictures WHERE user_id = $userid AND name = '$imgname'";
	$rst= mysql_query($sql) or die($rst);
	
	$row = mysql_fetch_assoc($rst);
	
	if ($row){
		return true;
	}else{
		return false;
	}
}
function members_get_prev_pic($userid, $picid){
	$sql = "SELECT id FROM member_pictures WHERE user_id = $userid AND id < $picid ORDER BY id DESC ";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return $row['id'];
	}else{
		return null;
	}
}
function members_get_next_pic($userid, $picid){
	$sql = "SELECT id FROM member_pictures WHERE user_id = $userid AND id > $picid ";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return $row['id'];
	}else{
		return null;
	}
}
function members_get_pic_description($userid, $imgname){
	$sql = "SELECT description FROM member_pictures WHERE user_id = $userid AND name = '$imgname'";
	$rst= mysql_query($sql) or die($rst);
	
	$row = mysql_fetch_assoc($rst);
	
	if ($row){
		return $row['description'];
	}else{
		return null;
	}
}
function members_delete_picture($userid, $albumname, $imgname){
	$albumid = members_get_album_id($userid, $albumname);
	$hash = members_get_info('hash', $userid);
	$folder = _MEMBER_PICS_PATH_. $hash."/albums/".$albumname."/";
	$folderurl = _MEMBER_PICS_URL_. $hash."/albums/".$albumname."/";
	if(is_dir($folder)){
		$dh = opendir($folder);
		$images = array();
		while (($file = readdir($dh)) !== false) {
				if ($file == $imgname){
					
					echo $sql = "DELETE FROM member_pictures WHERE name = '$imgname' AND user_id = $userid AND album_id =$albumid ";
					mysql_query($sql) or die(mysql_error());
					closedir($dh);
					unlink($folder.$file);
					exit();
				}
		        
		}
		closedir($dh);
	}
	
}
function members_delete_album_descriptions($albumid){
	$sql = "DELETE FROM member_pictures WHERE album_id=$albumid";
	mysql_query($sql) or die (mysql_error());
}
function members_delete_album_comments($albumid){
	$sql = "DELETE FROM member_pictures_comments WHERE album_id = $albumid";
	mysql_query($sql) or die(mysql_error());
}
function members_delete_album_tags($albumid){
	$sql = "DELETE FROM member_pictures_people_tags WHERE album_id = $albumid";
	mysql_query($sql) or die(mysql_error());
}
function members_delete_album($userid, $albumid){
		$hash = members_get_info('hash', $userid);
		$albumname = members_get_album_name($userid, $albumid);
		$folder = _MEMBER_PICS_PATH_. $hash."/albums/".$albumname."/";
		$folderthumbs = _MEMBER_PICS_PATH_. $hash."/albums/".$albumname."/thumbs/";
		// REMOVE THUMBS FOLDER
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
		// REMOVE ALBUM FOLDER
		members_delete_album_comments($albumid);
		members_delete_album_descriptions($albumid);
		members_delete_album_tags($albumid);
		echo $sql = "DELETE FROM member_albums WHERE id = $albumid";
		mysql_query($sql) or die(mysql_error());
		
}
function members_get_picture_comments($picid){
	$comments = array();
	$sql = "SELECT * FROM member_pictures_comments WHERE pic_id = $picid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$comment['user_from'] = $row['user_from'];
		$comment['id'] = $row['id'];
		$comment['time'] = $row['time'];
		$comment['message']= $row['message'];
		$comments[] = $comment;
	}
	return $comments;
}
function members_add_picture_comment($userfrom, $picid, $message, $albumid){
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);
	$sql = "INSERT INTO member_pictures_comments(user_from, pic_id, message, time, album_id) VALUES ($userfrom, $picid, '$message', '$time', $albumid)";
	mysql_real_escape_string($sql);
	mysql_query($sql) or die(mysql_error());
}
function members_delete_picture_comment($commentid){
	$sql = "DELETE FROM member_pictures_comments WHERE id = $commentid";
	mysql_query($sql) or die(mysql_error());
}
function members_add_picture_tags($userids, $picid, $album_id){
	// delete previous tags, this avoids extra code to delete each item
	$sql = "DELETE FROM member_pictures_people_tags WHERE pic_id = $picid";
	mysql_query($sql) or die(mysql_error());
	$userfrom = $_SESSION['user_id'];
	foreach ($userids as $key => $value) {
		$friend = $userids[$key];
		$sql = "INSERT INTO member_pictures_people_tags(pic_id, user_id, album_id) VALUES($picid, $friend, $album_id)";
		mysql_real_escape_string($sql);
		mysql_query($sql) or die(mysql_error());
		members_send_notification($userfrom, $friend, 'tagged you in a pic', 'media_pictag', $picid);
	}
}
function members_get_picture_tags($picid){
	$tags = array();
	$sql = "SELECT * FROM member_pictures_people_tags WHERE pic_id = $picid";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$tag['id'] = $row['id'];
			$tag['user_id'] = $row['user_id'];
			$tag['name'] = members_get_info('nombre', $tag['user_id'])." ". members_get_info('apellido', $tag['user_id']);
			$tags[] = $tag;
	}
	if ($tags == null){
		return null;
	}
	return $tags;
}
function members_count_album_pictures($albumid){
	$sql = "SELECT COUNT(*) AS nopics FROM member_pictures WHERE album_id = $albumid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return $row['nopics'];
	}else{
		return null;
	}
}
function members_is_my_comment($commentid){
	$userfrom = $_SESSION['user_id'];
	$sql = "SELECT id FROM member_pictures_comments WHERE id = $commentid AND user_from = $userfrom";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}
function members_albums_get_pic_no($picid, $userid, $albumid){
	$count = 1;
	$sql = "SELECT id FROM member_pictures WHERE user_id = $userid AND album_id = $albumid ";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$id = $row['id'];
		if ($id == $picid){
			return $count;
		}
		$count++;
	}
}
function members_count(){
	$sql = "SELECT COUNT(user_id) AS count FROM miembros";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['count'];
}
function members_count_countries(){
	$sql = "SELECT COUNT(DISTINCT country) AS count FROM miembros";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['count'];
}
function add_place($name, $desc, $cat, $lat, $long, $user){
	$sql = "INSERT INTO place(name, description, category, lat, lng, user_id) VALUES ('$name', '$desc', '$cat', '$lat', '$long', '$user')";
	$r = mysql_query($sql) or die(mysql_error());
	$pid = mysql_insert_id();
	$sql = "INSERT INTO place_people_roles(user_id, place_id, role_id) VALUES ('$user', '$pid', '2')";
	$r = mysql_query($sql) or die(mysql_error());
}
function add_need($name, $desc, $cat, $lat, $long, $user){
	$sql = "INSERT INTO need(name, description, category, lat, lng, user_id) VALUES ('$name', '$desc', '$cat', '$lat', '$long', '$user')";
	$r = mysql_query($sql) or die(mysql_error());
}
function add_article($title, $content, $user, $category, $lat, $lng, $timestamp){
	$sql = "INSERT INTO article(title, content, user_id, category, lat, lng, timestamp) VALUES ('$title', '$content', '$user', '$category', '$lat', '$lng', '$timestamp')";
	$r = mysql_query($sql) or die(mysql_error());
}
function add_idea($idea, $user, $image, $video, $lat, $lng, $timestamp, $category){
	$sql = "INSERT INTO idea(idea, user_id, image, video, lat, lng, timestamp, category) VALUES ('$idea', '$user', '$image', '$video', '$lat', '$lng', '$timestamp', '$category')";
	$r = mysql_query($sql) or die(mysql_error());
}
function add_experience($exp, $user, $place, $lat, $lng){
	$sql = "INSERT INTO place_experiences(experience, user_id, place_id, lat, lng) VALUES ('$exp', '$user', '$place', '$lat', '$lng')";
	$r = mysql_query($sql) or die(mysql_error());
}
function add_work($exp, $user, $need, $lat, $lng){
	$sql = "INSERT INTO need_experiences(experience, user_id, need_id, lat, lng) VALUES ('$exp', '$user', '$need', '$lat', '$lng')";
	$r = mysql_query($sql) or die(mysql_error());
}

function member_add_interest($interest, $user_id) {
	$sql = "INSERT INTO `member_interests` (`user_id`, `int_id`) VALUES ('$user_id', '$interest');";
	$rst = mysql_query($sql) or die (mysql_error());
}

function member_remove_interests ($user_id) {
	$sql = "DELETE FROM `member_interests` WHERE `user_id` = $user_id";
	$rst = mysql_query($sql) or die (mysql_error());
}

function member_get_skill_grading ($skill, $user_id) {
	$sql = "SELECT `grade` FROM `member_skills` WHERE `user_id` = $user_id AND `skill_id` = $skill";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($rst);
	return $row['grade'];
}

function member_get_skill_description ($skill, $user_id) {
	$sql = "SELECT `description` FROM `member_skills` WHERE `user_id` = $user_id AND `skill_id` = $skill";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($rst);
	return $row['description'];
}

function member_delete_skills($user_id = 0) {
	$sql = "DELETE FROM `member_skills` WHERE `user_id` = $user_id";
	$rst = mysql_query($sql) or die (mysql_error());
}


?>