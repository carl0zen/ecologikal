<?
	/* Load config */
	require_once($_SERVER['DOCUMENT_ROOT']."/_config/dbconnection.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/backend/functions.php");

	/* Retrieve and print list in options format */
	$countryText = $_POST['country'];

	$countries = get_countries_list();
	foreach ($countries as $country) {
		?><option <?=$selected?> value="<?=$country['text']?>"><?=$country['text']?></option><?
	}
?>