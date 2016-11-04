<?php

require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
load_css_files('volunteerings');
load_js_scripts('volunteerings');

$ec_id = $_GET['ec_id'];
$user_id = $_SESSION['user_id'];
$myec = people_is_admin($ec_id, $user_id);

 ?>
<div id="iframe">
	<?php if ($myec) { ?>
	<h1>Add New Vacancy</h1>
	<input type="text" name="name" value="" id="name">
	<select id="capacity">
		<option value="null">Capacity</option>
		<?php for ($x=1; $x < 70; $x++) {
			echo "<option value='$x'>$x</option>";
		} ?>
	</select>
	<select id="roomtype">
		<option value="null">Type of Room</option>
		<option value="shared">Shared Room</option>
		<option value="private">Private Room</option>
		<option value="camping">Camping Ground</option>
	</select>
	<textarea id="description" ></textarea>
	<input type="text" name="price" value="" id="price">
	<select id="currency">
		<option value="null">Currency</option>
		<?php $currencies = get_currencies();
			foreach ($currencies as $key => $value) { ?>
				<option value="<?php echo $currencies[$key]['id'] ?>"><?php echo $currencies[$key]['code'] ?> - <?php echo $currencies[$key]['name'] ?></option>
			<?php } ?>
	</select>
	<input type="text" name="min_stay" value="" id="min_stay">
	<button class="green saveroom">Save Room</button>
	<?php }else{
		echo "<h1>You are not allowed to be here</h1>";
	} ?>
</div>

<script>
	$(document).ready(function(e){

		$('#roomname').watermark('Room Name').focus();
		$('#description').watermark('Room Description');
		$('#price').watermark('Price');
		$('#min_stay').watermark('Min Stay Nights');

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
		// Validating Selects
		$('#min_stay, #price').focusout(function(e){
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

		$('button.saveroom').click(function(e){
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
						ec_id = <?php echo $ec_id ?>;
						name = $('#roomname').val();
						capacity = $('#capacity').val();
						type = $('#roomtype').val();
						description = $('#description').val();
						price = $('#price').val();
						currency = $('#currency').val();
						min_stay = $('#min_stay').val();

						queryurl = BACKEND_URL + 'ecocenters/bookings/saveroom.php';
						$.post(queryurl, {
								ec_id: ec_id,
								name:name,
								capacity:capacity,
								type:type,
								description:description,
								price:price,
								currency:currency,
								min_stay: min_stay
								}, function(data){
									url = '<?php echo _VIEWS_URL_ ?>ecocenters/pictureuploader.php?type=room&room_id='+data+'&ec_id='+ec_id;
									window.location.href = url;
						});
						validated = false;
				}

		});
	});
</script>