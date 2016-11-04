<?php 
	$view = 'member_registration';
	$step = $_SESSION['registration_step'] = 4;
	include("../../../header_nobar.php");
		?>
		<div class="wrapper">
			<div id="content" >
				<div class="padding10">
					<a href="member_profile.php" class="button green font20 fright">Ir a Perfil</a>
					<h1 class="fontwhite">Bienvenido a Ecologikal! </h1>
					<div class='container clearfix margin10t'>
						<h2>Empieza a crear lazos</h2>
						<div class="width25 fleft">
							<a href="#" class="button blue">Comparte</a>
						</div>
				
					</div>
				</div>
				
			</div>
		</div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(e){
				$('.interest').hover(function(e){
				$(this).find('.delete').fadeIn(100);

				$(this).stop().animate({
						'padding-left':'25px'
				});
			},function(e){
				$(this).find('.delete').fadeOut(100);

				$(this).stop().animate({
						'padding-left':'17px'
				});
			});
			/** Show autocomplete**/
			$('#interest').click(function(e){

					$('#autocomplete').slideDown(200);
			});
			//Delete interest item
			$('.interest').click(function(e){
				$(this).remove();
			});

	});
</script>