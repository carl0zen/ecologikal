<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/_config/bootstrap.php');
load_css_files('ecocenter');
load_js_scripts('workshop');

$ec_id = $_GET['ec_id'];
$user_id = $_SESSION['user_id'];
$myec = people_is_admin($ec_id, $user_id);

 ?>
<script src="<?php echo _PLUGINS_URL_ ?>tinyeditor/packed.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo _PLUGINS_URL_ ?>tinyeditor/style.css" type="text/css" media="screen" title="no title" charset="utf-8">

<div id="iframe">
	<?php if ($myec) { ?>
	<h1>Add New Workshop</h1>
<div class="form">
	<input type="text" name="name" value="" id="name">
	<select id="petal">
		<option value="null">Select Category</option>
		<?php $petals = get_petals();
		if($petals){
		 	foreach ($petals as $key => $value) { ?>
		 		<option value="<?php echo $petals[$key]['id'] ?>"><?php echo $petals[$key]['name'] ?></option>
			<?php
		 	}//foreach
		}//endif ?>
	</select>
	<input type="text" name="max_capacity" value="" id="max_capacity">
	<input type="text" name="min_allowance" value="" id="min_allowance">
	<input type="text" name="datefrom" value="" id="datefrom">
	<input type="text" name="duration" value="" id="duration">
	Workshop Description
	<textarea id="description" ></textarea>
	<input type="text" name="price" value="" id="price">
	<select id="currency">
		<option value="null">Currency</option>
		<?php $currencies = get_currencies();
			foreach ($currencies as $key => $value) { ?>
				<option value="<?php echo $currencies[$key]['id'] ?>"><?php echo $currencies[$key]['code'] ?> - <?php echo $currencies[$key]['name'] ?></option>
			<?php } ?>
	</select>

	<button class="green saveworkshop">Save Workshop</button>
	<?php }else{
		echo "<h1>You are not allowed to be here</h1>";
	} ?>
</div>
</div>

<script>
	$(document).ready(function(e){
		new TINY.editor.edit('editor',{
			id:'description',
			width:584,
			height:175,
			cssclass:'te',
			controlclass:'tecontrol',
			rowclass:'teheader',
			dividerclass:'tedivider',
			controls:['bold','italic','underline','strikethrough','|','subscript','superscript','|',
					  'orderedlist','unorderedlist','|','outdent','indent','|','leftalign',
					  'centeralign','rightalign','blockjustify','|','unformat','|','undo','redo','n',
					  'size','|','image','hr','link','unlink','|','cut','copy','paste','print'],
			footer:true,
			fonts:['Verdana','Arial','Georgia','Trebuchet MS'],
			xhtml:true,
			cssfile:'style.css',
			bodyid:'editor',
			footerclass:'tefooter',
			toggle:{text:'source',activetext:'wysiwyg',cssclass:'toggle'},
			resize:{cssclass:'resize'}
		});

		$('#name').watermark('Workshop Name').focus();
		$('#price').watermark('Price');
		$('#datefrom').watermark('Datefrom').datepicker();
		$('#duration').watermark('Duration in days');
		$('#max_capacity').watermark('Max Capacity');
		$('#min_allowance').watermark('Minimum People');

		// Validating input fields
		$('input, textarea').focusout(function(e){

			if ($(this).attr('id') != 'min_stay' || $(this).attr('id') != 'price'){
				if ($(this).val() == ''){
					$(this).css({background: '#B3236C', 'border': '2px solid #924'});
					$(this).data("status", "invalid");
				}else{
					$(this).css({background: '#E6E6E6', 'border': '1px solid #999'});
					$(this).data("status", "valid");
				}
			}

		});
		// Validating Integers
		$('#duration, #price, #max_capacity,#max_allowance').focusout(function(e){
			id = $(this).attr('id');
			if ($(this).val() > 0 ){
				$(this).css({background: '#E6E6E6', 'border': '1px solid #999'});
				$(this).data("status", "valid");
			}else{
				$(this).css({background: '#B3236C', 'border': '2px solid #924'});
				$(this).data("status", "invalid");
			}
		});
		// Validating Selects

		$('select').change(function(e){

			if ($(this).val()=='null'){
				$(this).data("status", "invalid");
				$(this).css({background: '#B3236C', 'border': '2px solid #924'});
			}else{
				$(this).data("status", "valid");
				$(this).css({background: '#E6E6E6', 'border': '1px solid #999'});
			}
		});

		$('button.saveworkshop').click(function(e){
			validated = true;
				$('input, textarea, select').each(function(e){
					status = $(this).data('status');
					if (status != 'valid'){
						validated = false;
						$(this).css({background: '#B3236C', 'border': '2px solid #924'});
						$('#roomname').focus();
					}else{
						$(this).css({background: '#E6E6E6', 'border': '1px solid #999'});
					}
				});
				if (validated === true){
						ec_id		 	= <?php echo $ec_id ?>;
						name 			= $('#name').val();
						max_capacity 	= $('#max_capacity').val();
						min_allowance 	= $('#min_allowance').val();
						datefrom 		= $('#datefrom').val();
						duration 		= $('#duration').val();

						description 	= $('#description').val();
						price 			= $('#price').val();
						currency 		= $('#currency').val();
						petal			= $('#petal').val();
						queryurl = BACKEND_URL + 'ecocenters/workshops/saveworkshop.php';


						$.post(queryurl, {
								ec_id:ec_id,
								name:name,
								max_capacity:max_capacity,
								min_allowance:min_allowance,
								datefrom:datefrom,
								duration:duration,
								description:description,
								price:price,
								currency:currency,
								petal:petal
								}, function(data){
										alert(data);
										url = '<?php echo _VIEWS_URL_?>ecocenters/pictureuploader.php?type=workshop&workshop_id='+data+'&ec_id='+ec_id;
										window.location.href = url;
						});
						validated = false;
				}

		});
	});
</script>