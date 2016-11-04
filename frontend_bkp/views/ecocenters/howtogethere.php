<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/_config/bootstrap.php');
	load_css_files('howtoget');
	load_js_scripts('howtoget');

	$ec_id = $_GET['ec_id'];
	$user_id = $_SESSION['user_id'];
	$myec = people_is_admin($ec_id, $user_id);

	$by = $_GET['by'];
?>
<style>
	.directions div{
		width:350px;
		padding:10px;
	}
	.editmode:hover{
		background:#222;
		cursor:pointer;
	}
	.editmode span.ui-icon{
		margin-left:330px;
		margin-top:0px;
		position:absolute;

	}
	textarea{
		min-height:200px;
		height:200px;
		width:350px;
		max-width:350px;
	}
</style>

<div id="iframe" class="directions">

	<?php if ($by == 'plane'): ?>
		<h3>Getting here by Plane</h3>

		<div <?php if($myec){echo "class='editmode directions'";}?>><?php $directions = ec_get_directions($ec_id, 'plane');
				if($directions){ echo $directions; }else{ echo "No directions Found"; } ?></div>
	<?php endif ?>
	<?php if ($by == 'bus'): ?>
		<h3>Getting here by Bus</h3>
		<div <?php if($myec){echo "class='editmode directions'";}?>><?php $directions = ec_get_directions($ec_id, 'bus');
				if($directions){ echo $directions; }else{ echo "No directions Found"; } ?></div>
	<?php endif ?>
	<?php if ($by == 'car'): ?>
		<h3>Getting here by Car</h3>
		<div <?php if($myec){echo "class='editmode directions'";}?>><?php $directions = ec_get_directions($ec_id, 'car');
				if($directions){ echo $directions; }else{ echo "No directions Found"; } ?></div>
	<?php endif ?>
</div>
<script>
	<?php if($myec){ ?>
		$('.editmode').click(function(e){
			$('span.ui-icon').remove();
		});
		<?php switch ($by) {
			case 'car':
				$directionsid = 1;
				break;
			case 'plane':
				$directionsid = 2;
				break;
			case 'bus':
				$directionsid = 3;
				break;
		} ?>
		saveurl = BACKEND_URL + 'ecocenters/update_descriptions.php?ec_id=<?php echo $ec_id ?>&dir_id=<?php echo $directionsid ?>';
		$('.editmode').editable( saveurl,{
			name	: 'directions',
			type: 'textarea',
			submit: 'Save',
		});

		$('button.editplane').click(function(e){

		});
		$('.editmode').hover(function(e){
			$(this).prepend('<span class="ui-icon ui-icon-pencil tiptip" title="Click the text to Edit"></span>').find('span.ui-icon').tipTip();
		}, function(e){
			$(this).find('span.ui-icon').remove();
		});
	<?php } ?>
</script>