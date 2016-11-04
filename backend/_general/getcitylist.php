<?php
header("Content-type: application/json");
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$input = $_GET["q"];
$country = $_GET['country'];
$data = array();
// query your DataBase here looking for a match to $input
$sql = "SELECT Name, District, ID FROM City WHERE Name LIKE '%$input%' AND CountryCode = '$country'";
mysql_select_db($database_ecologikal, $ecologikal);
$rst = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_assoc($rst)) {
$json = array();
$json['id'] = $row['ID'];
$json['district'] = $row['District'];
$json['value'] = $row['Name'];
$data[] = $json;
}

echo json_encode($data);
?>