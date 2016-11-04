<?php 
	$view = 'member_registration';
	$step = $_SESSION['registration_step'] = 3;
	include("../../../header_nobar.php");
		?>
		<div class="wrapper">
			<div id="content" >
				<div class="padding10">
					<a href="members_registration_step4.php" class="button green font20 fright">Siguiente Paso</a>
					<h1 class="fontwhite">Bienvenido a Ecologikal! </h1>
					<div class='container clearfix margin10t'>
						<h2>Verifica la información de tu perfil</h2>
						<div class="fields width60 fleft">
							
							<table class="fields">
								<tr>
									<td class="field">Nombre</td>
									<td class="value"><span class="ecoicon unlocked"></span>Felix Collado </td>
								</tr>
								<tr>
									<td class="field">Username</td>
									<td class="value"><span class="ecoicon unlocked"></span>flxclls</td>
								</tr>
								<tr>
									<td class="field">Email</td>
									<td class="value"><span class="ecoicon unlocked"></span>flxclld@gmail.com</td>
								</tr>
								<tr>
									<td class="field">Location</td>
									<td class="value"><span class="ecoicon unlocked"></span>Monterrey, Nuevo León</td>
								</tr>
								<tr>
									<td class="field">Date of Birth</td>
									<td class="value"><span class="ecoicon unlocked"></span>02 Aug 1986</td>
								</tr>
								<tr>
									<td class="field">Gender</td>
									<td class="value"><span class="ecoicon unlocked"></span>Male</td>
								</tr>
								<tr>
									<td class="field">Nationality</td>
									<td class="value"><span class="ecoicon unlocked"></span>Mexican</td>
								</tr>
								<tr>
									<td class="field">About me</td>
									<td class="value"><span class="ecoicon unlocked"></span>"Nothing that I can do will change the structure of the universe. But maybe, by raising my voice I can help the greatest of all causes - goodwill among men and peace on earth" Einstein</td>
								</tr>
								<tr>
									<td class="field">Telephone</td>
									<td class="value"><span class="ecoicon unlocked"></span>8117999477</td>
								</tr>
								<tr>
									<td class="field">Website</td>
									<td class="value"><span class="ecoicon unlocked"></span><a href="#">www.simbiotica.mx</a></td>
								</tr>
								<tr>
									<td class="field">Languages</td>
									<td class="value">
										<span class="ecoicon unlocked"></span>
										<div class="language">Spanish (Native)</div>

									</td>
								</tr>
							</table>
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