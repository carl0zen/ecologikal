<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/dbconnection.php");
$data = '';
$sql = "SELECT * FROM cat_places";
$rst = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_array($rst)) {
	$data .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}
echo $data;
?>