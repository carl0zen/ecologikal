<?php

require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
load_css_files('ecocenter');
load_js_scripts('vacancy');

$ec_id = $_GET['ec_id'];
$user_id = $_SESSION['user_id'];
$myec = people_is_admin($ec_id, $user_id);

 ?>
<div id="iframe">
	<?php if ($myec) { ?>
	<h1>Add New Vacancy</h1>
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

	<input type="text" name="spots" value="" id="spots">
	<input type="text" name="datefrom" value="" id="datefrom">
	<input type="text" name="duration" value="" id="duration">
	<textarea id="description" ></textarea>
	<textarea id="tasks"></textarea>
	<textarea id="recompenses"></textarea>

	<button class="green savevacancy">Save Vacancy</button>
	<?php }else{
		echo "<h1>You are not allowed to be here</h1>";
	} ?>
</div>
</div>

<script>
	$(document).ready(function(e){

		$('#name').watermark('Vacancy Name').focus();
		$('#description').watermark('Vacancy Description');
		$('#spots').watermark('Spots Available');
		$('#datefrom').watermark('From Date').datepicker();
		$('#duration').watermark('Duration in days');
		$('#tasks').watermark('Describe Tasks and Responsibilities of the Volunteer');
		$('#recompenses').watermark('Type the recompenses offered to the volunteer if any.');


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
		$('#duration, #spots').focusout(function(e){
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

		$('button.savevacancy').click(function(e){
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
						spots		 	= $('#spots').val();
						datefrom 		= $('#datefrom').val();
						duration 		= $('#duration').val();

						description 	= $('#description').val();
						tasks 			= $('#tasks').val();
						recompenses		= $('#recompenses').val();
						petal			= $('#petal').val();
						queryurl = BACKEND_URL + 'ecocenters/vacancies/savevacancy.php';


						$.post(queryurl, {
								ec_id:ec_id,
								name:name,
								spots:spots,
								datefrom:datefrom,
								duration:duration,
								description:description,
								tasks:tasks,
								recompenses:recompenses,
								petal:petal
								}, function(data){
										alert(data);
										url = '<?php echo _VIEWS_URL_?>ecocenters/pictureuploader.php?type=vacancy&vacancy_id='+data+'&ec_id='+ec_id;
										window.location.href = url;
						});
						validated = false;
				}

		});
	});
</script>