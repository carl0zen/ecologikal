<?php
	$view = 'member_registration';
	$step = $_SESSION['registration_step'] = 4;
	include("../../../header_nobar.php");
?>

<style>
p#title {
	font-size: 32px;
	font-weight: bold;
	color: #555;
}

.info {
	color: #888;
	font-size: 24px;
}

div#share-buttons {
	text-align: center;
	clear: both;
}

</style>
		<div class="wrapper">
			<div id="content" >
				<div class="padding10">
					<a href="member_profile.php" class="button green font20 fright">Ir a Perfil</a>
					<h1 class="fontwhite">Bienvenido a Ecologikal! </h1>
					<div class='invite-friends container clearfix margin10t'>
						<p id="title">Comienza a crear lazos</p>
						<p class="info">
							Ecologikal es un juego para viajeros que te ofrece vivir experiencias únicas de contacto con la naturaleza. Con nosotros podrás viajar, descubrir lugares, compartir experiencias, aprender y cooperar como voluntario.
						</p>
						<p class="info">
							¡Comparte con tus amigos!
						</p>
						<div id="share-buttons">
							<?
								$url = 'http://www.carlitosway.club/';
								$bitlyurl = make_bitly_url($url);
							 	$twitter = "Juega a viajar por el mundo $bitlyurl #ecologikal #amplificando";
							 	$title = "CarlitosWay.club";

							 	/* Encode */
							 	$twitter = urlencode($twitter);
							 	$url = urlencode($url);
							 	$title = urlencode($title);
							 ?>
							<!-- Facebook -->
							<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?= $url ?>&t=<?php echo $title; ?>"><img src="<?php echo _IMAGES_URL_ ?>facebook.png"></a>
							<!-- StumbleUpon -->
							<a target="_blank" href="http://www.stumbleupon.com/submit?url=<?= $url ?>&title=<?=$title; ?>"><img src="<?php echo _IMAGES_URL_ ?>stumbleupon.png"></a>
							<!-- Twitter -->
							<a target="_blank" href="http://twitter.com/home?status=<?=$twitter?>"><img src="<?php echo _IMAGES_URL_ ?>twitter.png"></a>

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