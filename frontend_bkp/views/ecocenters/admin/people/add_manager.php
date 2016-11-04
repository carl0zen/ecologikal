<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/_config/bootstrap.php');
load_css_files('ecocenter');
load_js_scripts('people');

$ec_id = $_GET['ec_id'];
$user_id = $_SESSION['user_id'];
$myec = people_is_admin($ec_id, $user_id);

 ?>
<div id="iframe">
	<?php if ($myec) { ?>
	<h1>Add Managers</h1>
	<div class="form">
		<input type="text" name="addfriends" value="" id="addfriends">

		<button class="green savemanager">Save Manager</button>
		<?php }else{
			echo "<h1>You are not allowed to be here</h1>";
		} ?>
	</div>
</div>

<script>
	$(document).ready(function(e){
		queryurl = BACKEND_URL + '_general/getfriendslist.php';
		$('#addfriends').autoSuggest(queryurl,{
			selectedItemProp: 'nombre',
			selectedValuesProp: 'id',
			asHtmlID: 'friends',
			searchObjProps: "nombre",
			startText: "Type Friend Name",
			minChars: 1,
			matchCase: false,
			//Adds country code to the list
			formatList: function(data,elem){
				var pic = data.pic, name = data.nombre;
				var new_elem = elem.html(pic +name);
				return new_elem;
			}
		}).watermark('Type Friend Name');

		$('button.savemanager').click(function(e){
						ec_id		 	= <?php echo $ec_id ?>;
						friends = $('#as-values-friends').val();


						queryurl = BACKEND_URL + 'ecocenters/people/savemanagers.php';

						$.post(queryurl, {
								ec_id:ec_id,
								friends:friends
								}, function(data){
									window.parent.location.reload(true);
						});

		});
	});
</script>