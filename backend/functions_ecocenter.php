<?php
function ec_display_profile_pic($ecid){
	$picurl = _PICS_URL_.'ecocenters/'.$ecid."/profile/profile.jpg";
	$picpath = _PICS_PATH_.'ecocenters/'.$ecid."/profile/profile.jpg";
	if(file_exists($picpath)){
		echo "<img src='$picurl'/>";
	}else{
		echo "<img src='"._IMAGES_URL_."avatar.png'/>";
	}
}
function ec_display_profile_thumb($ecid){
	$picurl = _PICS_URL_.'ecocenters/'.$ecid."/profile/profile_th.jpg";
	$picpath = _PICS_PATH_.'ecocenters/'.$ecid."/profile/profile_th.jpg";
	if(file_exists($picpath)){
		echo "<img src='$picurl'/>";
	}else{
		echo "<img src='"._IMAGES_URL_."avatar.png'/>";
	}
}
function ec_register($userid, $latitude, $longitude, $name, $year, $desc, $address, $status, $type, $phone, $landsize, $units, $foodgrown, $meals, $alcohol, $tobacco, $restrictions, $website){
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);
	
	$sql= "INSERT INTO ecocenters(user_id, latitude, longitude, name, year, description, address, status, type, phone, land_size, units, food_grown, shared_meals, alcohol, tobacco, restrictions, website, approved, membersince, membtype) VALUES($userid, '$latitude', '$longitude', '$name', $year, '$desc', '$address', '$status', '$type', '$phone', $landsize, '$units', '$foodgrown', '$meals', '$alcohol', '$tobacco', '$restrictions', '$website', 'Pending', '$time', 'free')";
	mysql_query($sql) or die(mysql_error());
}
/** Update fields value
	@param	:	$field, name of the field in the DB
	@param	:	$user_id, the user id
	@param	:	$newvalue, the new value of the field

**/
function ec_set_info($field, $ec_id=0, $newvalue){
	$sql = "SELECT $field FROM ecocenters WHERE id_centro='$ec_id'";
	$rst = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($rst)>0){
		
		//If Field info exists, update values
		$sql = "UPDATE ecocenters SET $field = '$newvalue' WHERE id_centro='$ec_id'";
		mysql_real_escape_string($sql);
		$rst = mysql_query($sql) or die(mysql_error());
	}
}

function ec_get_id($name, $latitude, $longitude){
	$result = mysql_query("SHOW TABLE STATUS LIKE 'ecocenters'");
	$row = mysql_fetch_array($result);
	$ec_id = $row['Auto_increment'] -1;
	mysql_free_result($result);
	return $ec_id;
}
function ec_get_name($ec_id){
	$sql = "SELECT name FROM ecocenters WHERE id_centro = $ec_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return $row['name'];
	}else{
		return 'none';
	}
}
function ec_get_url($ec_id){
	return _VIEWS_URL_."ecocenters/profile.php?ec_id=".$ec_id;
}
//Adds Services to Ecocenters

function ec_add_service($ec_id, $serviceid){
	$sql = "SELECT service_id FROM ecocenter_services_available WHERE service_id = '$serviceid' AND id_centro = '$ec_id' ";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
	 	$sql = "INSERT INTO ecocenter_services_available(service_id, id_centro) VALUES('$serviceid', '$ec_id' )";
		mysql_query($sql) or die(mysql_error());
	}
}
function ec_get_service_name($serviceid){
	$sql = "SELECT service FROM cat_services_available WHERE id = $serviceid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['service'];
}
function ec_get_activity_name($activityid){
	$sql = "SELECT activity FROM cat_activities WHERE id = $activityid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['activity'];
}
function ec_get_dietary_pr_name($dietary_practice){
	$sql = "SELECT dietary_practice FROM cat_dietary_practice WHERE id = $dietary_practice";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['dietary_practice'];
}
function ec_get_spiritual_pr_name($spiritualityid){
	$sql = "SELECT spiritual_practice FROM cat_spiritual_practice WHERE id = $spiritualityid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['spiritual_practice'];
}
function ec_get_role_name($role_id){
	$sql = "SELECT name FROM cat_ecocenter_roles WHERE id = $role_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['name'];
}
function ec_get_orientation_name($orientation_id){
	$sql = "SELECT orientation FROM cat_orientations WHERE id = $orientation_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['orientation'];
}


/// GETTERS FOR ECOCENTER's ITEMS
function ec_get_services($ec_id){
	$services = array();
	$sql = "SELECT id, service_id FROM ecocenter_services_available WHERE id_centro = $ec_id";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$service['id'] = $row['service_id'];
		$service['name'] = ec_get_service_name($service['id']);
		$services[] = $service;
	}
	return $services;
}
function ec_get_activities($ec_id){
	$activities = array();
	$sql = "SELECT id, activity_id FROM ecocenter_activities WHERE id_centro = $ec_id";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$activity['id'] = $row['activity_id'];
		$activity['name'] = ec_get_activity_name($activity['id']);
		$activities[] = $activity;
	}
	return $activities;
}
function ec_get_dietary_practices($ec_id){
	$dietary_practices = array();
	$sql = "SELECT id, dietary_practice_id FROM ecocenter_dietary_practice WHERE id_centro = $ec_id";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$dietary_practice['id'] = $row['dietary_practice_id'];
		$dietary_practice['name'] = ec_get_dietary_pr_name($dietary_practice['id']);
		$dietary_practices[] = $dietary_practice;
	}
	return $dietary_practices;
}
function ec_get_orientations($ec_id){
	$orientations = array();
	$sql = "SELECT id, orientation_id FROM ecocenter_orientations WHERE id_centro = $ec_id";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$orientation['id'] = $row['orientation_id'];
		$orientation['name'] = ec_get_orientation_name($orientation['id']);
		$orientations[] = $orientation;
	}
	return $orientations;
}
function ec_get_spiritual_practices($ec_id){
	$spiritual_prs = array();
	$sql = "SELECT id, spiritual_pr_id FROM ecocenter_spiritual_practice WHERE id_centro = $ec_id";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$spiritual_pr['id'] = $row['spiritual_pr_id'];
		$spiritual_pr['name'] = ec_get_spiritual_pr_name($spiritual_pr['id']);
		$spiritual_prs[] = $spiritual_pr;
	}
	return $spiritual_prs;
}
//Adds Activities to Ecocenters
function ec_add_activity($ec_id, $activityid){
	$sql = "SELECT activity_id FROM ecocenter_activities WHERE activity_id = $activityid AND id_centro = $ec_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
		$sql = "INSERT INTO ecocenter_activities(activity_id, id_centro) VALUES($activityid, $ec_id)";
		mysql_query($sql) or die(mysql_error());
	}
}
//Add Diet
function ec_add_diet_item($ec_id, $dietid){
	$sql = "SELECT dietary_practice_id FROM ecocenter_dietary_practice WHERE dietary_practice_id = $dietid AND id_centro = $ec_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
		$sql = "INSERT INTO ecocenter_dietary_practice(dietary_practice_id, id_centro) VALUES($dietid, $ec_id)";
		mysql_query($sql) or die(mysql_error());
	}
}
//Add Spiritual Practices
function ec_add_spiritual_practice($ec_id, $spiritual_pr_id){
	$sql = "SELECT spiritual_pr_id FROM ecocenter_spiritual_practice WHERE spiritual_pr_id = $spiritual_pr_id AND id_centro = $ec_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
		$sql = "INSERT INTO ecocenter_spiritual_practice(spiritual_pr_id, id_centro) VALUES($spiritual_pr_id, $ec_id)";
		mysql_query($sql) or die(mysql_error());
	}
}
//Add Orientation
function ec_add_orientation($ec_id, $orientation_id){
	$sql = "SELECT orientation_id FROM ecocenter_orientations WHERE orientation_id = $orientation_id AND id_centro = $ec_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
		$sql = "INSERT INTO ecocenter_orientations(orientation_id, id_centro) VALUES($orientation_id, $ec_id)";
		mysql_query($sql) or die(mysql_error());
	}
}
function ec_get_cat_activities(){
	$activities = array();
	$sql = "SELECT * FROM cat_activities";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$activity['id'] =$row['id'];
		$activity['name'] = $row['activity'];
		$activities[] = $activity;
	}
	return $activities;
}
function ec_get_cat_ec_roles(){
	$roles = array();
	$sql = "SELECT * FROM cat_ecocenter_roles";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$role['id'] =$row['id'];
		$role['name'] = $row['activity'];
		$roles[] = $role;
	}
	return $roles;
}
function ec_get_cat_services(){
	$services = array();
	$sql = "SELECT * FROM cat_services_available";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$service['id'] =$row['id'];
		$service['name'] = $row['service'];
		$services[] = $service;
	}
	return $services;
}

function ec_get_cat_spiritual_practices(){
	$spirituality = array();
	$sql = "SELECT * FROM cat_spiritual_practice";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$spiritual['id'] =$row['id'];
		$spiritual['name'] = $row['spiritual_practice'];
		$spirituality[] = $spiritual;
	}
	return $spirituality;
}

function ec_get_cat_orientation(){
	$orientations = array();
	$sql = "SELECT * FROM cat_orientations";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$orientation['id'] =$row['id'];
		$orientation['name'] = $row['orientation'];
		$orientations[] = $orientation;
	}
	return $orientations;
}
function ec_get_cat_dietary_practice(){
	$diets = array();
	$sql = "SELECT * FROM cat_dietary_practice";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$diet['id'] =$row['id'];
		$diet['name'] = $row['dietary_practice'];
		$diets[] = $diet;
	}
	return $diets;
}
// Getters

function ec_get_info($field,$ec_id=0){

	$r="";
	$field_=$field;
	$sql="SELECT $field_ FROM ecocenters WHERE id_centro='$ec_id'";
	$rst = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($rst)>0){
		$row=mysql_fetch_row($rst);
		$r=$row[0];
	}
	return $r;
}

// Directions
function ec_add_directions($ec_id, $directionid, $description){
	$sql = "SELECT id FROM ecocenter_directions WHERE id_centro = $ec_id AND direction_id = $directionid";
	$rst = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row) {
		$sql = "UPDATE ecocenter_directions SET directions = '$description' WHERE id_centro = $ec_id AND direction_id = $directionid";
		mysql_query($sql) or die(mysql_error());
	}else{
		$sql = "INSERT INTO ecocenter_directions(id_centro, direction_id, directions) VALUES($ec_id, $directionid, '$description' )";
		mysql_query($sql) or die(mysql_error());
	}
}
function ec_get_directions($ec_id, $type){
	if ($type=='car'){
		$directionid=1;
	}
	if ($type=='plane'){
		$directionid=2;
	}
	if ($type=='bus'){
		$directionid = 3;
	}
	$sql = "SELECT directions FROM ecocenter_directions WHERE id_centro = $ec_id AND direction_id = $directionid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row) {
		return $row['directions'];
	}else {
		return null;
	}
}
// Member functions

function ec_get_member_ecocenters($userid){
	$ecocenters = array();
	$sql = "SELECT * FROM ecocenter_people_roles WHERE user_id = $userid";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$ecocenter['id'] = $row['id_centro'];
		$ecocenter['name'] = ec_get_info('name',$ecocenter['id']);
		$ecocenter['description'] = ec_get_info('description',$ecocenter['id']);
		$ecocenter['address'] = ec_get_info('address',$ecocenter['id']);
		$ecocenter['role_id']= $row['role_id'];
		$ecocenter['rolename']= ec_get_role_name($row['role_id']);
		$ecocenters[] = $ecocenter;
	}
	return $ecocenters;
}

// BOOKING SYSTEM FUNCTIONS
function bookings_get_room_id($ec_id, $name, $capacity, $type, $description){
	$sql = "SELECT id FROM ecocenter_bookings_rooms WHERE id_centro = $ec_id AND name = '$name' AND type = '$type' AND description = '$description'";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['id'];
}

function bookings_add_room($ec_id, $name, $capacity, $type, $description, $price, $currency, $minstay){
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);
	$sql = "INSERT INTO ecocenter_bookings_rooms(id_centro, name, capacity, type, description, price, currency_id, min_stay, time) VALUES($ec_id, '$name', $capacity, '$type', '$description', $price, '$currency', $minstay, '$time')";
	mysql_query($sql) or die(mysql_error());
	$room_id = bookings_get_room_id($ec_id, $name, $capacity, $type, $description);
	echo $room_id;
}

function bookings_get_rooms($ec_id){
	$rooms = array();
	$sql = "SELECT * FROM ecocenter_bookings_rooms WHERE id_centro = $ec_id ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$room['id'] = $row['id'];
		$room['name']= $row['name'];
		$room['description'] = $row['description'];
		$room['capacity'] = $row['capacity'];
		$room['type'] = $row['type'];
		$room['price'] = $row['price'];
		$room['currency_id'] = $row['currency_id'];
		$room['min_stay'] = $row['min_stay'];
		$room['is_available'] = $row['is_available'];
		$rooms[] = $room;
		
	}
	return $rooms;
}
function bookings_update_room_status($ec_id, $room_id, $is_available){
	$sql = "UPDATE ecocenter_bookings_rooms SET is_available = '$is_available' WHERE id_centro = $ec_id AND id = $room_id ";
	mysql_query($sql) or die(mysql_error());
}
function bookings_is_room_available($ec_id, $room_id){
	$sql = "SELECT is_available FROM ecocenter_bookings_rooms WHERE id_centro = $ec_id AND id = $room_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if($row){
		return $row['is_available'];
	}else{
		return null;
	}
	
}
function bookings_get_room_pictures($ec_id, $room_id){
	$imagelist = array();
	$folder = _PICS_PATH_. "ecocenters/".$ec_id."/rooms/".$room_id."/";
	$folderurl = _PICS_URL_. "ecocenters/".$ec_id."/rooms/".$room_id."/";
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
			$image['thumb']=$folderurl."/thumbs/". $images[$key];
			$imagelist[] = $image;
		}
		closedir($dh);
		return $imagelist;
	}	
}
function bookings_delete_room($ec_id, $room_id){

		$folder = _PICS_PATH_. "ecocenters/".$ec_id."/rooms/".$room_id."/";
		$folderthumbs = _PICS_PATH_. "ecocenters/".$ec_id."/rooms/".$room_id."/thumbs/";
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
		$sql = "DELETE FROM ecocenter_bookings_rooms WHERE id_centro = $ec_id AND id = $room_id";
		mysql_query($sql) or die(mysql_error());
}

// PLACES

function ec_get_map_types(){
	$maptypes = array();
	$sql = "SELECT * FROM cat_map_types";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)) {
		$maptype['id'] = $row['id'];
		$maptype['type'] = $row['type_en'];
		$maptype['icon'] = $row['icon'];
		$maptypes[] = $maptype;
	}
	return $maptypes;
}
function ec_get_type_name($typeid){
	$sql = "SELECT type_en FROM cat_map_types WHERE id = $typeid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['type_en'];
}
function ec_get_map_icon($type){
	$sql = "SELECT icon FROM cat_map_types WHERE id = $type";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['icon'];
}

function ec_save_place($ec_id, $name, $type, $description, $lat, $lng){
	$sql = "INSERT INTO ecocenter_places(id_centro, title, description, type_id, latitude, longitude) VALUES($ec_id, '$name', '$description', $type, '$lat', '$lng')";
	mysql_query($sql) or die(mysql_error());
}
function ec_delete_place($placeid){
	$sql = "DELETE FROM ecocenter_places WHERE id = $placeid";
	mysql_query($sql) or die(mysql_error());
}
function ec_get_place_id($ec_id, $lat, $lng){
	$sql = "SELECT id FROM ecocenter_places WHERE latitude = '$lat' AND longitude = '$lng' AND id_centro = $ec_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['id'];
}
function ec_get_places($ec_id){
	$places = array();
	$sql = "SELECT * FROM ecocenter_places WHERE id_centro = $ec_id";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
		$place['title'] = $row['title'];
		$place['description'] = $row['description'];
		$place['type'] = $row['type_id'];
		$place['lat'] = $row['latitude'];
		$place['lng'] = $row['longitude'];
		$place['icon'] = ec_get_map_icon($place['type']);
		$place['id'] = ec_get_place_id($ec_id, $place['lat'], $place['lng']);
		$places[] = $place;
		
	}
	return $places;
}

// WORKSHOPS
function workshops_add_new($ec_id, $name, $maxcapacity, $minallowance, $description, $datefrom, $duration, $price, $currency, $petal){
	$datefrom = strtotime($datefrom);
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);
	$sql = "INSERT INTO ecocenter_workshops(id_centro, name, max_capacity, min_allowance, description, price, currency_id, datefrom, duration, time, petal_id) VALUES($ec_id, '$name', $maxcapacity, $minallowance, '$description', $price, '$currency',FROM_UNIXTIME($datefrom), $duration, '$time', $petal)";
	mysql_query($sql) or die(mysql_error());
}
function workshops_get($workshop_id){
	$sql = "SELECT * FROM ecocenter_workshops WHERE id = $workshop_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row) {
		$workshop['id'] 			= $row['id'];
		$workshop['name']			= $row['name'];
		$workshop['description'] 	= $row['description'];
		$workshop['max_capacity'] 	= $row['max_capacity'];
		$workshop['min_allowance'] 	= $row['min_allowance'];
		$workshop['datefrom'] 		= $row['datefrom'];
		$workshop['duration'] 		= $row['duration'];
		$workshop['price'] 			= $row['price'];
		$workshop['currency_id'] 	= $row['currency_id'];
		$workshop['currency'] 		= get_currency_name($workshop['currency_id']);
		$workshop['petal_id'] 		= $row['petal_id'];
		$workshop['petal'] 			= get_petal_name($workshop['petal_id']);
		$workshop['is_available'] 	= $row['is_available'];
		return $workshop;
	}else{
		return null;
	}
}
function workshops_edit($workshop_id, $name, $maxcapacity, $minallowance, $description, $datefrom, $duration, $price, $currency, $petal){
	$sql = "UPDATE ecocenter_workshops SET name = '$name', max_capacity = $maxcapacity, min_allowance = $minallowance, description = '$description', datefrom = FROM_UNIXTIME($datefrom), duration = $duration, price = $price, currency_id = $currency, petal_id = $petal WHERE id = $workshop_id";
	mysql_query($sql) or die(mysql_error());
}
function workshop_get_id($ec_id, $name, $description, $datefrom){
	$datefrom = strtotime($datefrom);
	$sql ="SELECT id FROM ecocenter_workshops WHERE id_centro = $ec_id AND name = '$name' AND description = '$description' AND datefrom = FROM_UNIXTIME($datefrom)";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['id'];
}
function workshops_get_all($ec_id){
	$workshops = array();
	$sql = "SELECT * FROM ecocenter_workshops WHERE id_centro = $ec_id ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$workshop['id'] 			= $row['id'];
		$workshop['name']			= $row['name'];
		$workshop['description'] 	= $row['description'];
		$workshop['max_capacity'] 	= $row['max_capacity'];
		$workshop['min_allowance'] 	= $row['min_allowance'];
		$workshop['datefrom'] 		= $row['datefrom'];
		$workshop['duration'] 		= $row['duration'];
		$workshop['price'] 			= $row['price'];
		$workshop['currency_id'] 	= $row['currency_id'];
		$workshop['currency'] 		= get_currency_name($workshop['currency_id']);
		$workshop['petal_id'] 		= $row['petal_id'];
		$workshop['petal'] 			= get_petal_name($workshop['petal_id']);
		$workshop['is_available'] 	= $row['is_available'];
		$workshops[] 				= $workshop;
		
	}
	return $workshops;
}
function workshops_get_pictures($ec_id, $workshop_id){
	$imagelist = array();
	$folder = _PICS_PATH_. "ecocenters/".$ec_id."/workshops/".$workshop_id."/";
	$folderurl = _PICS_URL_. "ecocenters/".$ec_id."/workshops/".$workshop_id."/";
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
			$image['thumb']=$folderurl."/thumbs/". $images[$key];
			$imagelist[] = $image;
		}
		closedir($dh);
		return $imagelist;
	}
}
function workshops_is_available($ec_id, $workshop_id){
	$sql = "SELECT is_available FROM ecocenter_workshops WHERE id_centro = $ec_id AND id = $workshop_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if($row){
		return $row['is_available'];
	}else{
		return null;
	}
}
function workshops_delete($ec_id, $workshop_id){
	$folder = _PICS_PATH_. "ecocenters/".$ec_id."/workshops/".$workshop_id."/";
	$folderthumbs = _PICS_PATH_. "ecocenters/".$ec_id."/workshops/".$workshop_id."/thumbs/";
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
	$sql = "DELETE FROM ecocenter_workshops WHERE id_centro = $ec_id AND id = $workshop_id";
	mysql_query($sql) or die(mysql_error());
}
function workshops_update_status($ec_id, $workshop_id, $is_available){
	$sql = "UPDATE ecocenter_workshops SET is_available = '$is_available' WHERE id_centro = $ec_id AND id = $workshop_id ";
	mysql_query($sql) or die(mysql_error());
}
// VOLUNTEER VACANCIES
function vacancies_add_new($ec_id, $name, $spots, $description, $datefrom, $duration, $tasks, $recompenses, $petal){
	$datefrom = strtotime($datefrom);
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);
	$sql = "INSERT INTO ecocenter_vacancies(id_centro, name, spots, description, tasks, recompenses, datefrom, duration, time, petal_id) VALUES($ec_id, '$name', $spots, '$description', '$tasks', '$recompenses',FROM_UNIXTIME($datefrom), $duration, '$time', $petal)";
	mysql_query($sql) or die(mysql_error());
}
function vacancy_get_id($ec_id, $name, $description, $datefrom){
	$datefrom = strtotime($datefrom);
	$sql ="SELECT id FROM ecocenter_vacancies WHERE id_centro = $ec_id AND name = '$name' AND description = '$description' AND datefrom = FROM_UNIXTIME($datefrom)";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $row['id'];
}
function vacancies_get_all($ec_id){
	$vacancies = array();
	$sql = "SELECT * FROM ecocenter_vacancies WHERE id_centro = $ec_id ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$vacancy['id'] 				= $row['id'];
		$vacancy['name']			= $row['name'];
		$vacancy['description'] 	= $row['description'];
		$vacancy['spots'] 			= $row['spots'];
		$vacancy['datefrom'] 		= $row['datefrom'];
		$vacancy['duration'] 		= $row['duration'];
		$vacancy['tasks'] 			= $row['tasks'];
		$vacancy['recompenses'] 	= $row['recompenses'];
		$vacancy['petal_id'] 		= $row['petal_id'];
		$vacancy['is_available']	= $row['is_available'];
		$vacancy['petal'] 			= get_petal_name($vacancy['petal_id']);
		$vacancies[] 				= $vacancy;
		
	}
	return $vacancies;
}
function vacancies_get_pictures($ec_id, $vacancy_id){
	$imagelist = array();
	$folder = _PICS_PATH_. "ecocenters/".$ec_id."/vacancies/".$vacancy_id."/";
	$folderurl = _PICS_URL_. "ecocenters/".$ec_id."/vacancies/".$vacancy_id."/";
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
			$image['thumb']=$folderurl."/thumbs/". $images[$key];
			$imagelist[] = $image;
		}
		closedir($dh);
		return $imagelist;
	}
}
function vacancies_is_available($ec_id, $vacancy_id){
	$sql = "SELECT is_available FROM ecocenter_vacancies WHERE id_centro = $ec_id AND id = $vacancy_id";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if($row){
		return $row['is_available'];
	}else{
		return null;
	}
}
function vacancies_delete($ec_id, $vacancy_id){
	$folder = _PICS_PATH_. "ecocenters/".$ec_id."/vacancies/".$vacancy_id."/";
	$folderthumbs = _PICS_PATH_. "ecocenters/".$ec_id."/vacancies/".$vacancy_id."/thumbs/";
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
	$sql = "DELETE FROM ecocenter_vacancies WHERE id_centro = $ec_id AND id = $vacancy_id";
	mysql_query($sql) or die(mysql_error());
}
function vacancies_update_status($ec_id, $vacancy_id, $is_available){
	$sql = "UPDATE ecocenter_vacancies SET is_available = '$is_available' WHERE id_centro = $ec_id AND id = $vacancy_id ";
	mysql_query($sql) or die(mysql_error());
}
// PEOPLE
// Return true if admin
function people_is_admin($ec_id, $userid){
	$sql = "SELECT id FROM ecocenter_people_roles WHERE id_centro = $ec_id AND user_id = $userid AND role_id = 1";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}
function people_is_follower($ec_id, $userid){
	$sql = "SELECT id FROM ecocenter_people_roles WHERE id_centro = $ec_id AND user_id = $userid AND role_id = 3";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}
function people_set_admin($ec_id, $userid){
	$sql = "SELECT id FROM ecocenter_people_roles WHERE id_centro = $ec_id AND user_id = $userid AND role_id = 1";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
		$sql = "INSERT INTO ecocenter_people_roles(id_centro, user_id, role_id) VALUES($ec_id, $userid, 1)";
		mysql_query($sql) or die(mysql_error());
	}
}
function people_set_settler($ec_id, $userid){
	$sql = "SELECT id FROM ecocenter_people_roles WHERE id_centro = $ec_id AND user_id = $userid AND role_id = 2";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
		$sql = "INSERT INTO ecocenter_people_roles(id_centro, user_id, role_id) VALUES($ec_id, $userid, 2)";
		mysql_query($sql) or die(mysql_error());
	}
}
function people_set_follower($ec_id, $userid){
	
	$sql = "SELECT id FROM ecocenter_people_roles WHERE id_centro = $ec_id AND user_id = $userid AND role_id = 3";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
		$sql = "INSERT INTO ecocenter_people_roles(id_centro, user_id, role_id) VALUES($ec_id, $userid, 3)";
		mysql_query($sql) or die(mysql_error());
	}
}
function people_set_visitor($ec_id, $userid){
	$sql = "SELECT * FROM ecocenter_people_roles WHERE id_centro = $ec_id AND user_id = $userid AND role_id = 4";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if(!$row){
		$sql = "INSERT INTO ecocenter_people_roles(id_centro, user_id, role_id) VALUES($ec_id, $userid, 4)";
		mysql_query($sql) or die(mysql_error());
	}
}
function people_get_admins($ec_id){
	$admins = array();
	$sql = "SELECT * FROM ecocenter_people_roles WHERE id_centro = $ec_id AND role_id = 1";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$admin['id'] = $row['user_id'];
		$admin['name'] = members_get_info('nombre', $admin['id'])." ".members_get_info('apellido', $row['user_id']);
		$admin['description'] = $row['description'];
		$admins[] = $admin;
	}
	return $admins;
}
function people_get_settlers($ec_id){
	$settlers = array();
	$sql = "SELECT * FROM ecocenter_people_roles WHERE id_centro = $ec_id AND role_id = 2";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$settler['id'] = $row['user_id'];
		$settler['name'] = members_get_info('nombre', $admin['id']);
		$settler['description'] = $row['description'];
		$settlers[] = $settler;
	}
	return $settlers;
}
function people_get_followers($ec_id){
	$followers = array();
	$sql = "SELECT * FROM ecocenter_people_roles WHERE id_centro = $ec_id AND role_id = 3";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$follower['id'] = $row['user_id'];
		echo $follower['name'] = members_get_info('nombre', $admin['id']);
		$follower['description'] = $row['description'];
		$followers[] = $follower;
	}
	return $followers;	
}
function people_get_visitors($ec_id){
	$visitors = array();
	$sql = "SELECT * FROM ecocenter_people_roles WHERE id_centro = $ec_id AND role_id = 4";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$visitor['id'] = $row['user_id'];
		$visitor['name'] = members_get_info('nombre', $admin['id']);
		$visitor['description'] = $row['description'];
		$visitors[] = $visitor;
	}
	return $visitors;	
}
function people_get_ecotravelers($ec_id){
	$ecotravelers = array();
	$sql = "SELECT * FROM ecocenter_people_roles WHERE id_centro = $ec_id AND role_id = 5";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$ecotraveler['id'] = $row['user_id'];
		$ecotraveler['name'] = members_get_info('nombre', $admin['id']);
		$ecotraveler['description'] = $row['description'];
		$ecotravelers[] = $ecotraveler;
	}
	return $ecotravelers;	
}
function people_get_volunteers($ec_id){
	$volunteers = array();
	$sql = "SELECT * FROM ecocenter_people_roles WHERE id_centro = $ec_id AND role_id = 6";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$volunteer['id'] = $row['user_id'];
		$volunteer['name'] = members_get_info('nombre', $admin['id']);
		$volunteer['description'] = $row['description'];
		$volunteers[] = $volunteer;
	}
	return $volunteers;	
}

function people_unfollow($ec_id, $user_id){
	$sql = "DELETE FROM ecocenter_people_roles WHERE id_centro = $ec_id AND user_id = $user_id AND role_id = 3";
	mysql_query($sql) or die(mysql_error());
}

/** GALLERY FUNCTIONS 
	All functions for member Gallery

**/
function ec_add_album($scid, $name, $description){
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);
	$sql = "INSERT INTO ecocenter_albums(sc_id, name, time, description) VALUES($scid, '$name', '$time', '$description')";
	mysql_real_escape_string($sql);
	mysql_query($sql);
}
function ec_get_albums($scid){
	$albums = array();
	$sql = "SELECT * FROM ecocenter_albums WHERE sc_id = $scid ORDER BY time DESC";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$album['id'] = $row['id'];
			$album['ec_id'] = $row['sc_id'];
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
function ec_display_album_pictures_fancybox($scid, $albumname){
	$folder = _SC_PICS_PATH_. $scid."/albums/".$albumname."/";
	$folderurl = _SC_PICS_URL_. $scid."/albums/".$albumname."/";
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
			$imgdesc = ec_get_pic_description($scid, $images[$key]);
			echo "<a href='".$folderurl.$images[$key]."' class='iframe pic' rel='".$albumrel."' title='$albumname - $imgdesc'><img src='".$folderurl."thumbs/".$images[$key]."'></a>";
		}
		closedir($dh);
	}
}
function ec_get_picture_id($scid, $albumid, $imgname){
	$sql = "SELECT id FROM ecocenter_pictures WHERE album_id = $albumid AND sc_id = $scid AND name = '$imgname'";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return $row['id'];
	}else{
		return null;
	}
}
function ec_get_album_pictures($scid, $albumname){
	$imagelist = array();
	$albumid = ec_get_album_id($scid, $albumname);
	$folder = _SC_PICS_PATH_. $scid."/albums/".$albumname."/";
	$folderurl = _SC_PICS_URL_. $scid."/albums/".$albumname."/";
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
			$image['id'] = ec_get_picture_id($scid, $albumid, $image['name']);
			$imagelist[] = $image;
		}
		closedir($dh);
		return $imagelist;
	}
	
}
function ec_get_album_picture_thumbs($scid, $albumname){
	$imagelist = array();
	$albumid = ec_get_album_id($scid, $albumname);
	$folder = _SC_PICS_PATH_. $scid."/albums/".$albumname."/";
	$folderurl = _SC_PICS_URL_. $scid."/albums/".$albumname."/";
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
			$image['id'] = ec_get_picture_id($scid, $albumid, $image['name']);
			$image['url'] = $folderurl."thumbs/".$images[$key];
			$imagelist[] = $image;
		}
		closedir($dh);
		
		return $imagelist;
	}
	
}
function ec_get_picture_from_id($scid, $picid){
	$sql = "SELECT * FROM ecocenter_pictures WHERE id = $picid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		$image['name'] = $row['name'];
		$image['album_id'] = $row['album_id'];
		$image['sc_id'] = $row['sc_id'];
		$image['url'] = _SC_PICS_URL_ . $scid ."/albums/".ec_get_album_name($scid, $image['album_id'])."/".$image['name'];
		$image['description']= $row['description'];
		return $image;
	}else{
		return null;
	}
}
function ec_get_album_id($scid, $albumname){
	$sql = "SELECT id FROM ecocenter_albums WHERE sc_id = $scid AND name = '$albumname' ";
	$rst= mysql_query($sql) or die(mysql_error()); 
	
	$row = mysql_fetch_assoc($rst);
	
	if ($row){
		$id = $row['id'];
		return $id;
	}else{
		return null;
	}
}
function ec_get_album_name($scid, $id){
	$sql = "SELECT name FROM ecocenter_albums WHERE sc_id = $scid AND id = $id ";
	$rst= mysql_query($sql) or die(mysql_error());
	
	$row = mysql_fetch_assoc($rst);
	
	if ($row){
		$name = $row['name'];
		return $name;
	}else{
		return null;
	}
}
function ec_add_picture_description($scid, $imgname, $imgdesc, $albumid){
	// Avoid duplicate descriptions
	$sql = "SELECT id FROM ecocenter_pictures WHERE sc_id = $scid AND name = '$imgname' AND album_id = $albumid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst); 
	if(!$row){ 
		$sql = "INSERT INTO ecocenter_pictures(sc_id, name, description, album_id) VALUES($scid, '$imgname', '$imgdesc', $albumid)";
		mysql_real_escape_string($sql);
		mysql_query($sql) or die(mysql_error());
	}else{
		$sql = "UPDATE ecocenter_pictures SET description = '$imgdesc' WHERE sc_id = $scid AND album_id = $albumid AND name = '$imgname' ";
		mysql_real_escape_string($sql);
		mysql_query($sql) or die(mysql_error());
	}
}
function ec_pic_has_description($scid, $imgname){
	$sql = "SELECT description FROM ecocenter_pictures WHERE sc_id = $scid AND name = '$imgname'";
	$rst= mysql_query($sql);

	$row = mysql_fetch_assoc($rst);
	if ($row){
		return true;
	}else{
		return false;
	}
}
function ec_get_prev_pic($scid, $picid){
	$sql = "SELECT id FROM ecocenter_pictures WHERE sc_id = $scid AND id < $picid ORDER BY id DESC ";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return $row['id'];
	}else{
		return null;
	}
}
function ec_get_next_pic($scid, $picid){
	$sql = "SELECT id FROM ecocenter_pictures WHERE sc_id = $scid AND id > $picid ";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return $row['id'];
	}else{
		return null;
	}
}
function ec_get_pic_description($scid, $imgname){
	$sql = "SELECT description FROM ecocenter_pictures WHERE sc_id = $scid AND name = '$imgname'";
	$rst= mysql_query($sql) or die(mysql_error());
	
	$row = mysql_fetch_assoc($rst);
	
	if ($row){
		return $row['description'];
	}else{
		return null;
	}
}
function ec_delete_picture($scid, $albumname, $imgname){
	$albumid = ec_get_album_id($scid, $albumname);
	$folder = _SC_PICS_PATH_. $scid."/albums/".$albumname."/";
	$folderurl = _SC_PICS_URL_. $scid."/albums/".$albumname."/";
	if(is_dir($folder)){
		$dh = opendir($folder);
		$images = array();
		while (($file = readdir($dh)) !== false) {
				if ($file == $imgname){
					
					echo $sql = "DELETE FROM ecocenter_pictures WHERE name = '$imgname' AND sc_id = $scid AND album_id =$albumid ";
					mysql_query($sql) or die(mysql_error());
					closedir($dh);
					unlink($folder.$file);
					exit();
				}
		        
		}
		closedir($dh);
	}
	
}
function ec_delete_album_descriptions($albumid){
	$sql = "DELETE FROM ecocenter_pictures WHERE album_id=$albumid";
	mysql_query($sql) or die (mysql_error());
}
function ec_delete_album_comments($albumid){
	$sql = "DELETE FROM ecocenter_pictures_comments WHERE album_id = $albumid";
	mysql_query($sql) or die(mysql_error());
}
function ec_delete_album_tags($albumid){
	$sql = "DELETE FROM ecocenter_pictures_people_tags WHERE album_id = $albumid";
	mysql_query($sql) or die(mysql_error());
}
function ec_delete_album($scid, $albumid){
		$albumname = ec_get_album_name($scid, $albumid);
		$folder = _SC_PICS_PATH_. $scid."/albums/".$albumname."/";
		$folderthumbs = _SC_PICS_URL_. $scid."/albums/".$albumname."/thumbs/";
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
		ec_delete_album_comments($albumid);
		ec_delete_album_descriptions($albumid);
		ec_delete_album_tags($albumid);
		$sql = "DELETE FROM ecocenter_albums WHERE id = $albumid";
		mysql_query($sql) or die(mysql_error()); 
}
function ec_get_picture_comments($picid){
	$comments = array();
	$sql = "SELECT * FROM ecocenter_pictures_comments WHERE pic_id = $picid ORDER BY time DESC";
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
function ec_add_picture_comment($userfrom, $picid, $message, $albumid){
	$time = $_SERVER['REQUEST_TIME'];
	$time = date(DATE_ATOM);
	$sql = "INSERT INTO ecocenter_pictures_comments(user_from, pic_id, message, time, album_id) VALUES ($userfrom, $picid, '$message', '$time', $albumid)";
	mysql_real_escape_string($sql);
	mysql_query($sql) or die(mysql_error());
}
function ec_delete_picture_comment($commentid){
	$sql = "DELETE FROM ecocenter_pictures_comments WHERE id = $commentid";
	mysql_query($sql) or die(mysql_error());
}
function ec_add_picture_tags($userids, $picid, $album_id){
	// delete previous tags, this avoids extra code to delete each item
	$sql = "DELETE FROM ecocenter_pictures_people_tags WHERE pic_id = $picid";
	mysql_query($sql) or die(mysql_error());
	$userfrom = $_SESSION['user_id'];
	foreach ($userids as $key => $value) {
		$friend = $userids[$key];
		$sql = "INSERT INTO ecocenter_pictures_people_tags(pic_id, user_id, album_id) VALUES($picid, $friend, $album_id)";
		mysql_real_escape_string($sql);
		mysql_query($sql) or die(mysql_error());
		members_send_notification($userfrom, $friend, 'tagged you in a pic', 'media_pictag', $picid);
	}
}
function ec_get_picture_tags($picid){
	$tags = array();
	$sql = "SELECT * FROM ecocenter_pictures_people_tags WHERE pic_id = $picid";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$tag['id'] = $row['id'];
			$tag['sc_id'] = $row['sc_id'];
			$tag['name'] = members_get_info('nombre', $tag['user_id'])." ". members_get_info('apellido', $tag['sc_id']);
			$tags[] = $tag;
	}
	if ($tags == null){
		return null;
	}
	return $tags;
}
function ec_count_album_pictures($albumid){
	$sql = "SELECT COUNT(*) AS nopics FROM ecocenter_pictures WHERE album_id = $albumid";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	if ($row){
		return $row['nopics'];
	}else{
		return null;
	}
}
function ec_albums_get_pic_no($picid, $scid, $albumid){
	$count = 1;
	$sql = "SELECT id FROM ecocenter_pictures WHERE sc_id = $scid AND album_id = $albumid ";
	$rst = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($rst)){
		$id = $row['id'];
		if ($id == $picid){
			return $count;
		}
		$count++;
	}
}

?>