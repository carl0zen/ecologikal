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
				<?php if ($mode == 'workshops'): ?>
					<p class="fontwhite">Búsqueda Geolocalizada:</p>
					<input type="text" placeholder="busca un lugar" name="search" value="" id="search" style="width:80%">
				<?php endif ?>
				<div id="filters" class="clearfix">
					<p class="fontwhite">Filtros por categoría:</p>
					<div class="filter"><div class="ecoicon fleft ">D</div><span class="text">Todos</span></div>
					<div class="filter p1"><div class="ecoicon fleft ">1</div><span class="text">Construcción</span></div>
					<div class="filter p2"><div class="ecoicon fleft ">2</div><span class="text">Gobierno Comunitario</span></div>
					<div class="filter p3"><div class="ecoicon fleft ">3</div><span class="text">Finanzas & Economía</span></div>
					<div class="filter p4"><div class="ecoicon fleft ">4</div><span class="text">Tierra & Naturaleza</span></div>
					<div class="filter p5"><div class="ecoicon fleft ">5</div><span class="text">Cultura & Educación</span></div>
					<div class="filter p6"><div class="ecoicon fleft ">6</div><span class="text">Tecnología</span></div>
					<div class="filter p7"><div class="ecoicon fleft ">7</div><span class="text">Salud & Espiritualidad</span></div>
					<div class="filter "><div class="ecoicon fleft ">L</div><span class="text">Opinión</span></div>
				</div>

		</div>

		<div id="maincontent" class="fright clearfix">
			<?php if ($mode == 'workshops'){ ?>
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
					<a class="tab" href="?"><span class="ecoicon">#</span>Conocimiento</a></div>
				</div>
				<div class="padding20" style="padding-top:0;">
					<?php if ($map=='true'){ ?>
						<div class="showlist fright" onclick="location.href='?map=false&mode=workshops'"><div class="ecoicon book"></div>Show list</div>

					<?php }else{ ?>
						<div class="showmap fright" onclick="location.href='?map=true&mode=workshops'"><div class="ecoicon marker"></div>Show on map</div>
					<?php } ?>
					<h1><div class="ecoicon fleft margin10r">}</div>Workshops</h1>

					<p>Cerca de <span class="font20 bold location">Monterrey, MX</span> están estos proyectos abiertos</p>

					<?php if ($map=='true'){ ?>
						<div id="map" class="clearfix">
							<iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=42.03917,78.662109&amp;t=m&amp;z=4&amp;output=embed"></iframe><br />
						</div>
					<?php }else{ ?>
					<div id="results">
						<div class="result clearfix">
							<div class="category p1"><div class="ecoicon fleft">1</div></div>
							<div class="proximity">a 10 km</div>
							<div class="button green fright">Book now</div>
							<div class="remmuneration negative fright tiptip" title="Kins you receive for this action"><div class="ecoicon fleft kin "></div>-1800</div>
							<img class="thumb fleft margin10r" src="http://www.greenbler.com/pictures/ecocenters/91/rooms/26//thumbs/p16ip230hs18kdopk1thk1ifrt1q7.jpg" alt="">
							<div class="info">
							<strong>Taller de huertos urbanos</strong>
							en: <strong><a href="#">Casa Semilla</a></strong>
							<p class="dates">Del <strong>20 mayo 2012</strong> al <strong>30 abril 2012</strong></p>
							<p class="description">Te invitamos a ayudarnos como recepcionista en nuestro ecocentro, las tareas van desde contestar el teléfono hasta atender a la gente que viene</p></div>
						</div>
						<!-- result -->
						<div class="result clearfix">
							<div class="category p2"><div class="ecoicon fleft">2</div></div>

							<div class="proximity">a 10 km</div>
							<div class="button green fright">Book now</div>
							<div class="remmuneration negative fright tiptip" title="Kins you receive for this action"><div class="ecoicon fleft kin positive"></div>-1200</div>
							<img class="thumb fleft margin10r" src="http://www.greenbler.com/pictures/ecocenters/91/rooms/26//thumbs/p16ip230hs18kdopk1thk1ifrt1q7.jpg" alt="">
							<div class="info">
							<strong>Taller de huertos urbanos</strong>
							en: <strong><a href="#">Casa Semilla</a></strong>
							<p class="dates">Del <strong>20 mayo 2012</strong> al <strong>30 abril 2012</strong></p>
							<p class="description">Te invitamos a ayudarnos como recepcionista en nuestro ecocentro, las tareas van desde contestar el teléfono hasta atender a la gente que viene</p></div>
						</div>
						<!-- result -->
						<div class="result clearfix">
							<div class="category p3"><div class="ecoicon fleft">3</div></div>

							<div class="proximity">a 10 km</div>
							<div class="button green fright">Book now</div>
							<div class="remmuneration negative fright tiptip" title="Kins you receive for this action"><div class="ecoicon fleft kin positive"></div>-1200</div>
							<img class="thumb fleft margin10r" src="http://www.greenbler.com/pictures/ecocenters/91/rooms/26//thumbs/p16ip230hs18kdopk1thk1ifrt1q7.jpg" alt="">
							<div class="info">
							<strong>Taller de huertos urbanos</strong>
							en: <strong><a href="#">Casa Semilla</a></strong>
							<p class="dates">Del <strong>20 mayo 2012</strong> al <strong>30 abril 2012</strong></p>
							<p class="description">Te invitamos a ayudarnos como recepcionista en nuestro ecocentro, las tareas van desde contestar el teléfono hasta atender a la gente que viene</p></div>
						</div>
						<!-- result -->
						<div class="result clearfix">
							<div class="category p4"><div class="ecoicon fleft">4</div></div>

							<div class="proximity">a 10 km</div>
							<div class="button green fright">Book now</div>
							<div class="remmuneration negative fright tiptip" title="Kins you receive for this action"><div class="ecoicon fleft kin positive"></div>-1200</div>
							<img class="thumb fleft margin10r" src="http://www.greenbler.com/pictures/ecocenters/91/rooms/26//thumbs/p16ip230hs18kdopk1thk1ifrt1q7.jpg" alt="">
							<div class="info">
							<strong>Taller de huertos urbanos</strong>
							en: <strong><a href="#">Casa Semilla</a></strong>
							<p class="dates">Del <strong>20 mayo 2012</strong> al <strong>30 abril 2012</strong></p>
							<p class="description">Te invitamos a ayudarnos como recepcionista en nuestro ecocentro, las tareas van desde contestar el teléfono hasta atender a la gente que viene</p></div>
						</div>
						<!-- result -->
						<div class="result clearfix">
							<div class="category p5"><div class="ecoicon fleft">5</div></div>

							<div class="proximity">a 10 km</div>
							<div class="button green fright">Book now</div>
							<div class="remmuneration negative fright tiptip" title="Kins you receive for this action"><div class="ecoicon fleft kin positive"></div>-1200</div>
							<img class="thumb fleft margin10r" src="http://www.greenbler.com/pictures/ecocenters/91/rooms/26//thumbs/p16ip230hs18kdopk1thk1ifrt1q7.jpg" alt="">
							<div class="info">
							<strong>Taller de huertos urbanos</strong>
							en: <strong><a href="#">Casa Semilla</a></strong>
							<p class="dates">Del <strong>20 mayo 2012</strong> al <strong>30 abril 2012</strong></p>
							<p class="description">Te invitamos a ayudarnos como recepcionista en nuestro ecocentro, las tareas van desde contestar el teléfono hasta atender a la gente que viene</p></div>
						</div>
						<!-- result -->
						<div class="result clearfix">
							<div class="category p6"><div class="ecoicon fleft">6</div></div>

							<div class="proximity">a 10 km</div>
							<div class="button green fright">Book now</div>
							<div class="remmuneration negative fright tiptip" title="Kins you receive for this action"><div class="ecoicon fleft kin positive"></div>-1200</div>
							<img class="thumb fleft margin10r" src="http://www.greenbler.com/pictures/ecocenters/91/rooms/26//thumbs/p16ip230hs18kdopk1thk1ifrt1q7.jpg" alt="">
							<div class="info">
							<strong>Taller de huertos urbanos</strong>
							en: <strong><a href="#">Casa Semilla</a></strong>
							<p class="dates">Del <strong>20 mayo 2012</strong> al <strong>30 abril 2012</strong></p>
							<p class="description">Te invitamos a ayudarnos como recepcionista en nuestro ecocentro, las tareas van desde contestar el teléfono hasta atender a la gente que viene</p></div>
						</div>
						<!-- result -->
						<div class="result clearfix">
							<div class="category p7"><div class="ecoicon fleft">7</div></div>

							<div class="proximity">a 10 km</div>
							<div class="button green fright">Book now</div>
							<div class="remmuneration negative fright tiptip" title="Kins you receive for this action"><div class="ecoicon fleft kin positive"></div>-1200</div>
							<img class="thumb fleft margin10r" src="http://www.greenbler.com/pictures/ecocenters/91/rooms/26//thumbs/p16ip230hs18kdopk1thk1ifrt1q7.jpg" alt="">
							<div class="info">
							<strong>Taller de huertos urbanos</strong>
							en: <strong><a href="#">Casa Semilla</a></strong>
							<p class="dates">Del <strong>20 mayo 2012</strong> al <strong>30 abril 2012</strong></p>
							<p class="description">Te invitamos a ayudarnos como recepcionista en nuestro ecocentro, las tareas van desde contestar el teléfono hasta atender a la gente que viene</p></div>
						</div>
						<!-- result -->
						<div class="width100 br10 load">Load more...</div>
					</div>
					<?php } ?>
				</div>
				<!-- .padding20 -->
			<?php }else{?>
				<div class="clearfix width100">
					<div class="distances width70 fleft" >
						<div id="content-type ">
							<div class="type pics on" title="image">
								<div class="ecoicon  fleft">9</div><div class="text">Imágenes</div>
							</div>
							<div class="type videos" title="video">
								<div class="ecoicon  fleft">;</div><div class="text">Videos</div>
							</div>

							<div class="type ideas" title="idea">
								<div class="ecoicon  fleft">A</div><div class="text">Ideas</div>
							</div>

							<div class="type article" title="article">
								<div class="ecoicon  fleft">S</div><div class="text">Artículos</div>
							</div>
						</div>
					</div>
				<div class="submenu fright">
					<a class="tab" href="?mode=workshops"><span class="ecoicon">}</span>Talleres</a></div>
				</div>
				<div id="subfilters" class="clearfix">
					<a class="subfilter featured fleft on" title="featured">Featured</a>
					<a class="subfilter popularity fleft" title="popular">Most Popular</a>
					<a class="subfilter date fleft" title="recent">Most Recent</a>
					<a class="subfilter commented fleft" title="commented">Most Commented</a>


				</div>
				<div class="padding20" style="padding-top:0;">
					<div>
						<div id="pictures" class="clearfix"></div>
						<div class="width100 br10 load">Load more...</div>
            <div class="loading" id="loader"></div>

					</div>
				</div>
				<!-- .padding20 -->


			<?php } ?>
		</div>
		<!-- maincontent -->
	</div>
</div>
<input type="hidden" id="lf_cat" value=""  />
<input type="hidden" id="lf_type" value=""  />
<input type="hidden" id="lf_subfilter" value="featured"  />
<script>
	$(document).ready(function(e){

		$('#pictures').load('<?=_BACKEND_URL_?>learn_feed.php?subfilter=featured');

		$('.distance').click(function(e){
			$('.distance').removeClass('on');
			$(this).addClass('on');
		});

		$('.star.feature').live('click', function(e){
			$(this).addClass('featured');
			var queryurl = '<?=_BACKEND_URL_;?>members/featurepost.php',
				  id = $(this).parent().find('.post-id').val(),
					type = $(this).parent().find('.post-type').val();
			$.post(queryurl,{ postid: id, type: type }, function(data){ });
		});

		// Filtro por categoria
		$('.filter').live('click', function(){
			var cat = $(this).find('.ecoicon').html(),
					type = $('#lf_type').val(),
					subfilter = $('#lf_subfilter').val();
			$('#lf_cat').val(cat);
			$('#pictures').load('<?=_BACKEND_URL_?>learn_feed.php?cat=' + cat + '&type=' + type + '&subfilter=' + subfilter);
		});

		// Subfiltro
		$('.subfilter').live('click', function(){
			$('.subfilter.on').removeClass('on');
			$(this).addClass('on');
			var cat = $('#lf_cat').val(),
					type = $('#lf_type').val(),
					subfilter = $(this).attr('title');
			$('#lf_subfilter').val(subfilter);
			$('#pictures').load('<?=_BACKEND_URL_?>learn_feed.php?cat=' + cat + '&type=' + type + '&subfilter=' + subfilter);
		});

		// Filtro por tipo de contenido
		$('.type').live('click', function(){
			$('.type.on').removeClass('on');
			$(this).addClass('on');
			var type = $(this).attr('title'),
					cat = $('#lf_cat').val(),
					subfilter = $('#lf_subfilter').val();
			$('#lf_type').val(type);
			$('#pictures').load('<?=_BACKEND_URL_?>learn_feed.php?cat=' + cat + '&type=' + type + '&subfilter=' + subfilter);
		});

		$('.comments').live('click', function(e){

			$('.response').remove();
			i = $(this).parents('.picture-item').find('#no-item').val();
			i = parseInt(i);
			x = $(this).parents('.picture-item').index(); x++;

			if(x%3 != 0){

				if((x+1)%3 === 0){
					x= x+1;
				}else{
					if((x+2)%3 === 0){
						x=x+2;
					}
				}
			}
			count = $('.picture-item').length;
			if(count<x){
				x = count;
			}
			x--;
			$('#pictures .picture-item:eq('+x+')').after('<div class="response"><div class="fright close"><div class="ecoicon fright">J</div></div><div class="comments nodisplay clearfix "></div></div>');

			$('.picture-item').css('opacity','0.5');
			$(this).parents('.picture-item').css('opacity',1);
			$('.close').live('click', function(e){
				$(this).parents('.response').slideUp(200);
				$('.picture-item').css('opacity',1);
			});
			var id = $(this).parent().parent().find('.post-id').val(),
					category = $(this).parent().parent().find('.post-cat').val(),
					type = $(this).parent().parent().find('.post-type').val();
			$('.response .comments').load('<?php echo _VIEWS_URL_ ?>members/showfeedcomments.php?postid=' + id + '&type=' + type + '&category=' + category);
			$('.response').slideDown(200, function(e){
				$('.response .comments').fadeIn(200);
			});
		});

		$('.amplificate a').live('click', function(){
			$(this).toggleClass('active');
			var id = $(this).parent().parent().parent().find('.post-id').val(),
					category = $(this).parent().parent().parent().find('.post-cat').val(),
					type = $(this).parent().parent().parent().find('.post-type').val(),
					count = $(this).parent().parent().parent().find('.amplification .value').html();
			if( $(this).hasClass('active') ){
				count++;
				queryurl = '<?=_BACKEND_URL_;?>members/amplificate.php';
			} else {
				count--;
				queryurl = '<?=_BACKEND_URL_;?>members/deamplificate.php';
			}
			$(this).parent().parent().parent().find('.amplification .value').html(count);
			$.post(queryurl,{ postid: id, category: category, type: type }, function(data){ });
		});

		$('.broadcast a').live('click', function(){
			$(this).addClass('active');
			var id = $(this).parent().parent().parent().find('.post-id').val(),
					category = $(this).parent().parent().parent().find('.post-cat').val(),
					type = $(this).parent().parent().parent().find('.post-type').val(),
					count = $(this).parent().parent().parent().find('.broadcasts .value').html(),
					queryurl = '<?=_BACKEND_URL_;?>members/broadcast.php';
			count++;
			$(this).parent().parent().parent().find('.broadcasts .value').html(count);
			$.post(queryurl,{ postid: id, category: category, type: type }, function(data){ });
		});

		$('.comment a').live('click', function(){
			var id = $(this).parent().parent().parent().find('.post-id').val(),
					category = $(this).parent().parent().parent().find('.post-cat').val(),
					type = $(this).parent().parent().parent().find('.post-type').val();
			$(this).fancybox({ href: '<?=_VIEWS_URL_;?>members/add_post_comment.php?post_id=' + id + '&type=' + type, type: 'iframe', 'width' : 650, 'height': 300, 'overlayShow'	:	true, 'overlayColor'	: '#000',	'bgColor': '#000' });
		});

		$('.picture').live('click', function(){
			var id = $(this).parent().find('.post-id').val(),
					category = $(this).parent().find('.post-cat').val(),
					type = $(this).parent().find('.post-type').val();
			$(this).fancybox({ href: '<?=_VIEWS_URL_;?>view_post.php?post_id=' + id + '&type=' + type + '&category=' + category, type: 'iframe', 'width' : 800, 'height': 500, 'overlayShow'	:	true, 'overlayColor'	: '#000',	'bgColor': '#000' });
		});

		function last_post_function() {
			var ID=$("div.picture-item:last").find(".post-id").val(),
					type = $('#lf_type').val(),
					cat = $('#lf_cat').val(),
					subfilter = $('#lf_subfilter').val();
			$('div#loader').html('<img src="<?php echo _IMAGES_URL_ ?>ajax-loader.gif">Loading...');
			$.post("<?=_BACKEND_URL_?>learn_feed.php?last_post_id="+ID+"&cat="+cat+"&type="+type+"&subfilter="+subfilter,
			function(data){
				if (data != "") {
					$("div.picture-item:last").after(data);
				}
				$('div#loader').empty();
			});
		};

		$(window).scroll(function(){
			if ($(window).scrollTop() == $(document).height() - $(window).height()){
				last_post_function();
			}
		});

	});
</script>
