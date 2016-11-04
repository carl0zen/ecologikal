<?php
 	$view = 'feeds'; // This is for determining which scripts and css are going to be loaded
	include("header.php");
	$_SESSION['user_hash'] = members_get_info('hash',$_SESSION['user_id']);
	// If a parameter is passed with the user_id then it displays the profile for the user_id passed, if not it means that should display loggedin user profile
	if (isset($_GET['map'])) {
		$map = $_GET['map'];
	}else{
		$map = 'false';
	}

	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}
	if (isset($_GET['user_id']) || isset($_GET['user'])){

		if(isset($_GET['user'])){
			$userid = members_get_user_id($_GET['user']);
		}else{
			$userid = $_GET['user_id'];
		}


		if ($userid == $_SESSION['user_id']){
			$myprofile = true;
		}else{
			$myprofile = false; // flag to not display editable features
		}
	}else{
		$myprofile = true; // flag to allow editable features
		$userid = $_SESSION['user_id'];
	}
	// Check for edit mode ?edit=1 to edit
	if(isset($_GET['edit'])){
		$edit = $_GET['edit'];
	}else{
		$edit =0;
	}

?>

<div class="wrapper">
	<div id="content" class="gamefeed clearfix">
		<div id="leftbar" class="fleft width20 margin20l">
					<p class="fontwhite">Búsqueda de lugares:</p>
					<input type="text" placeholder="teclea un lugar" name="search" value="" id="search" style="width:80%">

		</div>

		<div id="maincontent" class="fright clearfix">
			<?php if ($mode == 'needs'){ ?>
				<div class="clearfix width100">
					<div class="distances width70 fleft" >
						<span class="fleft margin20l"><h3>Filtros de distancia</h3></span>
						<div class="fleft 50 distance">10</div>
						<div class="fleft 50 distance">50</div>
						<div class="fleft 100 distance">100</div>
						<div class="fleft 200 distance">200</div>
						<select class="fleft margin10t">
							<option>km</option>
							<option>miles</option>
						</select>
					</div>
				<div class="submenu fright">
					<a class="tab" href="?"><span class="ecoicon">y</span>Ecozonas</a></div>
				</div>
				<div class="padding20" style="padding-top:0;">
					<?php if ($map=='true'){ ?>
						<div class="showlist fright" onclick="location.href='?map=false&mode=workshops'"><div class="ecoicon book"></div>Show list</div>

					<?php }else{ ?>
						<div class="showmap fright" onclick="location.href='?map=true&mode=workshops'"><div class="ecoicon marker"></div>Show on map</div>
					<?php } ?>
					<h1><div class="ecoicon fleft margin10r">n</div>Necesidades ecosociales</h1>

					<p>Cerca de <span class="font20 bold location">Monterrey, MX</span> existen estos proyectos de restauración ecosocial</p>

					<?php if ($map=='true'){ ?>
						<div id="map" class="clearfix">
							<iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=42.03917,78.662109&amp;t=m&amp;z=4&amp;output=embed"></iframe><br />
						</div>
					<?php }else{ ?>
					<div id="results">
						<?php for ($i=0; $i < 5 ; $i++) { ?>
							<div class="result clearfix">

								<div class="proximity">a 10 km</div>
								<div class="button green fright">Participar</div>
								<memberavatar class="absolute margin-5l tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?> descubrió este lugar"><?php members_display_profile_thumb(61); ?></memberavatar>
								<img class="thumb fleft margin10r" src="http://www.greenbler.com/pictures/ecocenters/91/rooms/26//thumbs/p16ip230hs18kdopk1thk1ifrt1q7.jpg" alt="">
								<div class="info" style="margin-left:70px;">
								<strong><a href="#">Construcción de un huerto para comunidad rural</a></strong>
								<p class="dates">Fecha de publicación <strong>20 mayo 2012</strong> </p>
								<p class="description">Te invitamos a participar en éste proyecto que realizaremos en apoyo de comunidades rurales en la sierra tarahumara para llevar sustentabilidad a sus hogares, Te invitamos a participar en éste proyecto que realizaremos en apoyo de comunidades rurales en la sierra tarahumara para llevar sustentabilidad a sus hogares</p>

								<div class="social-workers">
									<h4>Han trabajado: </h4>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
								</div>
								<div class="social-givers clearfix">
									<h4>Han donado kins: </h4>
									<div class="doner fleft">
										<div class="kins">10</div>
										<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									</div>
									<div class="doner fleft">
										<div class="kins">10</div>
										<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									</div>
									<div class="doner fleft">
										<div class="kins">10</div>
										<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									</div>
									<div class="doner fleft">
										<div class="kins">10</div>
										<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									</div>
									<div class="doner fleft">
										<div class="kins">10</div>
										<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									</div>
								</div>
								<div class="remmuneration positive fright tiptip" title="Ésta acción ha acumulado estos kins" style="margin-left: 547px;margin-top: -23px;"><div class="ecoicon fleft kin positive"></div>0</div>

								</div>
								<div class="maximize"><div class="ecoicon">c</div></div>
							</div>
							<!-- result -->
						<?php
						} ?>



						<div class="width100 br10 load">Load more...</div>
					</div>
					<?php } ?>
				</div>
				<!-- .padding20 -->
			<?php }else{?>
				<div class="clearfix width100">
					<div class="distances width70 fleft" >
						<span class="fleft margin20l"><h3>Filtros de distancia</h3></span>
						<div class="fleft 50 distance">10</div>
						<div class="fleft 50 distance">50</div>
						<div class="fleft 100 distance">100</div>
						<div class="fleft 200 distance">200</div>
						<select class="fleft margin10t">
							<option>km</option>
							<option>miles</option>
						</select>
					</div>
				<div class="submenu fright">
					<a class="tab" href="?mode=needs"><span class="ecoicon">n</span>Necesidades</a></div>
				</div>

				<div class="padding20" style="padding-top:0;">
					<?php if ($map=='true'){ ?>
						<div class="showlist fright" onclick="location.href='?map=false&mode=workshops'"><div class="ecoicon book"></div>Show list</div>

					<?php }else{ ?>
						<div class="showmap fright" onclick="location.href='?map=true&mode=workshops'"><div class="ecoicon marker"></div>Show on map</div>
					<?php } ?>
					<h1><div class="ecoicon fleft margin10r">y</div>Ecozonas</h1>

					<p>Cerca de <span class="font20 bold location">Monterrey, MX</span> hay estas ecozonas que son lugares naturales paradisíacos que necesiten ser protegidas.</p>

					<?php if ($map=='true'){ ?>
						<div id="map" class="clearfix">
							<iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=42.03917,78.662109&amp;t=m&amp;z=4&amp;output=embed"></iframe><br />
						</div>
					<?php }else{ ?>
					<div id="results">
						<?php $maptypes = ec_get_map_types(); ?>
						<?php for ($i=0; $i < 5 ; $i++) { ?>
							<div class="result clearfix">
								<img src="<?php echo _IMAGES_URL_.$maptypes[$i]['icon']; ?>" class="fright margin10l tiptip" title="<?php echo $maptypes[$i]['type']; ?>" alt="">
								<div class="proximity">a 10 km</div>
								<div class="button green fright">He estado aquí</div>
								<memberavatar class="absolute margin-5l tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?> descubrió este lugar"><?php members_display_profile_thumb(61); ?></memberavatar>
								<img class="thumb fleft margin10r" src="http://www.greenbler.com/pictures/ecocenters/91/rooms/26//thumbs/p16ip230hs18kdopk1thk1ifrt1q7.jpg" alt="">
								<div class="info" style="margin-left:70px;">
								<strong><a href="#">Cola de Caballo</a></strong>
								<p class="dates">Fecha de publicación <strong>20 mayo 2012</strong> </p>
								<p class="description" style="min-height:54px;">Cola de caballo es uno de los lugares más bonitos en monterrey, hay una cascada preciosa que cae de 50m , sin duda muy bueno para visitar de fin de semana</p>

								<div class="social-workers">
									<h4>Han visitado: </h4>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
									<a href="<?php echo members_display_profile_url(61); ?>" class="tiptip" title="<?php echo members_get_info('nombre',61) ?> <?php echo members_get_info('apellido',61) ?>"><?php members_display_profile_thumb(61); ?></a>
								</div>

								</div>
								<div class="maximize"><div class="ecoicon">c</div></div>
							</div>
							<!-- result -->
						<?php
						} ?>



						<div class="width100 br10 load">Load more...</div>
					</div>
					<?php } ?>
				</div>
				</div>
				<!-- .padding20 -->


			<?php } ?>
		</div>
		<!-- maincontent -->
	</div>
</div>
<script>
	$(document).ready(function(e){
		var open = false;
		$('.social-workers, .social-givers').hide();
		$('.maximize').click(function(e){
			if (!open) {
				$(this).parent().find('.social-workers, .social-givers').slideDown(200);
				$(this).removeClass('maximize').addClass('minimize').html('<div class="ecoicon">a</div>');
				open = true;
			};


		});
		$('.minimize').live('click',function(e){
			if (open) {
				$(this).parent().find('.social-givers').fadeOut(200, function(e){
					$(this).parent().find('.social-workers').slideUp(200);
				});
				$(this).removeClass('minimize').addClass('maximize').html('<div class="ecoicon">c</div>');
				open = false;
			};

		});

		$('.distance').click(function(e){
			$('.distance').removeClass('on');
			$(this).addClass('on');
		});
		$('.comments').click(function(e){

			$('.response').remove();
			i = $(this).parents('.picture-item').find('#no-item').val();
			i = parseInt(i);

			if(i%3 != 0){

				if((i+1)%3 === 0){
					i= i+1;
				}else{
					if((i+2)%3 === 0){
						i=i+2;
					}
				}
			}
			count = $('.picture-item').length;
			if(count<i){
				i = count;
			}
			i--;
			$('#pictures .picture-item:eq('+i+')').after('<div class="response"><div class="fright close"><div class="ecoicon fright">J</div></div><div class="comments nodisplay clearfix "></div></div>');

			$('.picture-item').css('opacity','0.5');
			$(this).parents('.picture-item').css('opacity',1);
			$('.close').live('click', function(e){
				$(this).parents('.response').slideUp(200);
				$('.picture-item').css('opacity',1);
			});
			$('.response .comments').load('<?php echo _VIEWS_URL_ ?>members/feeds/showcomments.php');
			$('.response').slideDown(200, function(e){
				$('.response .comments').fadeIn(200);
			});
		});
	});
</script>
