<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/dbconnection.php");
$data = '';
$sql = "SELECT * FROM skill_categories";
$rst = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_array($rst)) {
	$data .= '<option value="'.$row['skill_category_id'].'">'.$row['category'].'</option>';
}
echo $data;
?>