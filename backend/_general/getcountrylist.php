<?php
header("Content-type: application/json");
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$input = $_GET["q"];
$data = array();
// query your DataBase here looking for a match to $input
$sql = "SELECT * FROM Country WHERE Name LIKE '%$input%'";
mysql_select_db($database_ecologikal, $ecologikal);
$rst = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_assoc($rst)) {
$json = array();
$json['id'] = $row['Code'];
$json['continent'] = $row['Continent'];
$json['value'] = $row['Name'];
$json['localname'] = $row['LocalName'];
$data[] = $json;
}

echo json_encode($data);
?>