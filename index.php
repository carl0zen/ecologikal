
<?php require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ecologikal</title>

		<?php if (function_exists('load_css_files')){ $view= "index";load_css_files($view);} ?>
		<?php if (function_exists('load_js_scripts')){ load_js_scripts($view);$js_loaded=true;} ?>

    </head>
<body>
	<?php
			 include(_ROOT_PATH_."login/login_form.php");
			?>
	<div id="header">
		<div class="wrapper">
			<span id="logo" class="fleft pointer"></span>

				<div id="mainmenu">
					<div id="whoarewe" class="iconcontainer" onClick="location.href='about/aboutus.php'">
						<div class="ecoicon heart"></div>
						<span class="text">¿Quiénes somos?</span>
					</div>
					<div id="privacy" class="iconcontainer">
						<div class="ecoicon heart"></div>
						<span class="text">Política de Privacidad</span>
					</div>
					<div id="dharma" class="iconcontainer">
						<div class="ecoicon heart"></div>
						<span class="text">Términos y Condiciones</span>
					</div>
					<div id="dharma" class="iconcontainer">
						<div class="ecoicon heart"></div>
						<span class="text">Acerca de nosotros</span>
					</div>
				</div>
			<div id="topmenu" class="fleft width90">
				<a href="#" class="item play">
					<div class="ecoicon kin"></div><span class=" text">Juega</span>
				</a>
				<a href="#" class="item travel">
					<div class="ecoicon backpack"></div><span class="text">Viaja</span>
				</a>
				<a href="#" class="item discover">
					<div class="ecoicon flag"></div><span class=" text">Descubre</span>
				</a>
				<a href="#" class="item learn">
					<div class="ecoicon book"></div><span class=" text">Aprende</span>
				</a>
				<a href="#" class="item meet">
					<div class="ecoicon chat"></div><span class=" text">Conoce</span>
				</a>
				<a href="#" class="item cooperate">
					<div class="ecoicon tree"></div><span class=" text">Coopera</span>
				</a>

				<div class="fright">
					<a href="#" id="login_btn" >
						<div class="ecoicon" id="login_btn">M</div><span class=" text"> Login</span>
					</a>
				</div>
			</div>

		</div>
	</div>
	<div id="social">
		<a href="http://www.facebook.com/ecologikal" target="_blank" class="tiptip" title="Síguenos en facebook"><img src="<?php echo _IMAGES_URL_ ?>icon_facebook.png" alt=""></a>
		<a href="http://www.twitter.com/ecologikal" target="_blank" class="tiptip" title="Sigue la conversación"><img src="<?php echo _IMAGES_URL_ ?>icon_twitter.png" alt=""></a>
		<a href="http://www.stumbleupon.com/submit?url=http://www.ecologikal.net&title=Ecologikal, una red Eco + Social" target="_blank" class="tiptip" title="Compártenos en Stumble Upon"><img src="<?php echo _IMAGES_URL_ ?>icon_stumble.png" alt=""></a>
		<img src="<?php echo _IMAGES_URL_ ?>icon_vimeo.png" alt="">

	</div>
		<div class="wrapper">
				<div class="fb-like fright " data-href="http://facebook.com/ecologikal" data-send="false" data-width="450" data-show-faces="true" data-font="lucida grande"></div>
			<div id="registration-form">
				<div class="padding10">
					<div class="title clearfix"><div class="text fleft margin10l">Únete a una red <span class="cgreen">Eco</span> <span class="cblue">+</span> <span class="cpink">Social</span></div></div>
						<fieldset class="clearfix">
							<input type="text" name="miembro_forma_registro_email" id="miembro_forma_registro_email"  class="text ui-widget-content ui-corner-all" title="Email" placeholder="E-mail"/>
							<input name="miembro_forma_registro_usuario" type="text" class="text ui-widget-content ui-corner-all" id="miembro_forma_registro_usuario" title="Username" placeholder="Nombre de usuario"/>
							<input name="miembro_forma_registro_comando" type="hidden" id="miembro_forma_registro_comando" value="agregar_miembro" />

				    	<input type="password" name="miembro_forma_registro_contrasena" id="miembro_forma_registro_contrasena" class="text ui-widget-content ui-corner-all" title="Password" placeholder="Contraseña"/>
							<div class="tos">Al oprimir el botón Registrar estas aceptando que haz leído y aceptado nuestros <a href="#" target="_blank">Términos y condiciones</a> y nuestra <a href="#" target="_blank">Política de privacidad</a></div>

						</fieldset>
						<div class="version fleft">Versión <a class="tiptip" title="primera versión de prueba, que con tu ayuda y feedback mejorará continuamente">BETA</a> 1.0</div>
						<button class="green register fright">Únete</a>

				</div>
			</div>
			<img src="<?php echo _IMAGES_URL_ ?>logoindex.png" class="absolute" id="logoindex" alt="">
			<div id="slider">
				<img src="<?php echo _IMAGES_URL_ ?>imagen1.jpg" alt="Portada">
				<img src="<?php echo _IMAGES_URL_ ?>imagen1.jpg" alt="Portada">
				<img src="<?php echo _IMAGES_URL_ ?>imagen1.jpg" alt="Portada">
				<img src="<?php echo _IMAGES_URL_ ?>imagen1.jpg" alt="Portada">
				<img src="<?php echo _IMAGES_URL_ ?>imagen1.jpg" alt="Portada">
			</div>
			<div id="nav"></div>
			<div class="width100 clearfix blocks margin20t">
				<div class="width33 fleft">
					<div class="margin10 tline greenc">
						<h2><div class="ecoicon cgreen">y</div>Misión</h2>
						<p>Nuestra misión es facilitar la conexión a un movimiento de conciencia para la <strong class="cgreen">protección</strong> del <strong class="cblue">planeta</strong> a través de la tecnología.</p>

					</div>
				</div>
				<div class="width33 fleft ">
					<div class="tline pink margin10">
						<h2><div class="ecoicon cpink">O</div>Nuestro movimiento</h2>
						<p>Internet nos da las herramientas para organizarnos eficientemente,
					¿Qué tal si utilizamos esa <strong class="cblue">interconectividad</strong> para involucrarnos <strong class="cpink">acción</strong> <strong class="cyellow">social</strong> y <strong class="cgreen">ecológica</strong>?</p>
					<a class="button fright">Otros movimientos</a>
					</div>
				</div>
				<div class="width33 fleft">
					<div class="tline blue margin10">
						<h2><div class="ecoicon cblue">2</div>¿Quiénes Somos?</h2>
					<p>Sabemos que la <strong class="corange">cooperación</strong> es la clave del éxito, es por esto que hemos desarrollado ésta plataforma con el propósito de aportar nuestras <strong class="cblue">habilidades</strong> a este movimiento mundial de conciencia <strong class="cgreen">ecológica</strong>. <a href="#" class="button fontwhite fright margin20">El equipo</a></p>
					</div>
				</div>
			</div>
			<div class="clearfix width50 fleft blocks">
				<div class="margin10l margin10r tline orange">
					<h2><div class="ecoicon margin-10t corange">&</div>Organizaciones aliadas</h2>
					<a href="http://gen.ecovillage.org" target="_blank" class="ally"><img src="<?php echo _IMAGES_URL_ ?>logo_gen.png" class="fleft" alt=""></a>
				</div>
			</div>
			<div class="clearfix width50 fleft blocks">
				<div class="margin10l margin10r tline purple">
					<h2><div class="ecoicon margin-10t cpurple">;</div>Multimedia</h2>
					<a class="intro videolink" href="http://vimeo.com/17348288"><img src="<?php echo _IMAGES_URL_ ?>video.png" alt=""></a>
					<a class="comunidad videolink" href="http://vimeo.com/22419543"><img src="<?php echo _IMAGES_URL_ ?>video2.png" alt=""></a>

				</div>
			</div>
			<div id="footer" style="border-top:1px solid #ccc;" class="width100 clearfix margin20t">
				<div class="footermenu fright"><a href="#">Nosotros</a><a href="#">Aliados</a><a href="#">Términos</a><a href="#">Privacidad</a> </div>
				<div class="margin10t margin30b"><img src="<?php echo _IMAGES_URL_ ?>logofooter.png" class="fleft" alt=""><div class="text fleft">José Alvarado 1797, Col. Jardín Español, Monterrey, México</div></div>

			</div>
			<div class="clearfix block play ">
				<div class="title cyellow fright">Jugar</div>

				<div class="ecoicon fleft cyellow kin" style="font-size:195px;"></div>
				<p class="subtext fright">
					Los <strong class="cyellow">KINS</strong> (Sol en maya) son nuestra <strong class="cyellow">MONEDA ECOSOCIAL</strong> y te servirán para realizar <strong class="cpink">ACCIONES</strong> dentro del juego. Recuerda que al <strong class="cblue">INVERTIR</strong> en esta moneda, estás invirtiendo en <strong class="cgreen">SUSTENTABILIDAD</strong>

				</p>
				<div class="width100 clearfix info">
					<div class="padding30">
						<div class="width50 fleft">
							<div class="width100 clearfix text">Los kins te servirán para:</div>
							<ul>
								<li><div class="ecoicon">F</div><div class="text">Reservar alojamiento</div></li>
								<li><div class="ecoicon">S</div><div class="text">Reservar cursos y talleres</div></li>
								<li><div class="ecoicon">l</div><div class="text">Comprar eco-productos</div></li>

							</ul>
						</div>
						<div class="width50 fright">
							<div class="width100 clearfix text">Puedes obtener kins de la siguiente forma:</div>
							<ul>
								<li><div class="ecoicon">1</div><div class="text">Cooperando como voluntario</div></li>

								<li><div class="ecoicon">s</div><div class="text">Organizando grupos de viaje</div></li>
								<li><div class="ecoicon">{</div><div class="text">Comprándolos en línea</div></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix block travel">
				<div class="title cpink fleft">Viajar</div>

				<div class="ecoicon cpink margin30r" style="font-size:196px;float:right!important;">t</div>
				<p class="subtext fleft taright">
					Podrás planear tus viajes a través del <strong class="cblue">DIARIO DE VIAJE</strong>, invitar a tus amigos a viajar contigo a <strong class="cgreen">ECOCENTROS</strong> que son lugares fantásticos que te primitirán vivir una <strong class="cpink">EXPERIENCIA</strong> única de contacto con la <strong class="cgreen">NATURALEZA</strong>.
				</p>
				<div class="width100 clearfix info">
					<div class="padding30">
						<div class="width50 fleft">
							<div class="width100 clearfix text">Hay ecocentros para todos los gustos:</div>
							<ul>
								<li><div class="ecoicon">R</div><div class="text">Eco-hoteles</div></li>
								<li><div class="ecoicon">t</div><div class="text">Eco-hostales</div></li>
								<li><div class="ecoicon">q</div><div class="text">Eco-aldeas</div></li>

							</ul>
						</div>
						<div class="width50 fright">

						</div>
					</div>
				</div>
			</div>
			<div class="clearfix block discover">
				<div class="title cpurple fright">Descubrir</div>

				<div class="ecoicon fleft cpurple flag" style="font-size:195px;margin-left:20px;"></div>
				<p class="subtext fright">
					Conoces alguna cascada, río, lago, etc... Podrás compartir tus <strong class="cgreen">ECOZONAS</strong> para que la comunidad de Ecologikal se encargue de <strong class="cpink">PROTEGERLAS</strong> y levantar la voz acerca <strong class="corange">NECESIDADES</strong> para generar <strong class="cgreen">ACCIÓN ECOSOCIAL</strong>
				</p>
				<div class="width100 clearfix info">
					<div class="padding30">
						<div class="width50 fleft">
							<div class="width100 clearfix text">Puedes descubrir:</div>
							<ul>
								<li><div class="ecoicon">y</div><div class="text">Ecozconas</div></li>
								<li><div class="ecoicon">n</div><div class="text">Necesidades ecosociales</div></li>

							</ul>
						</div>
						<div class="width50 fright">

						</div>
					</div>
				</div>
			</div>
			<div class="clearfix block learn">
				<div class="title cblue fleft">Aprender	</div>

				<div class="ecoicon cblue book margin30r" style="font-size:196px;float:right!important;"></div>
				<p class="subtext fleft taright">
					Creemos firmemente que el nuestro tiempo en línea debe ser usado <strong class="cblue">PRODUCTIVAMENTE</strong> es por esto que todo el contenido <strong class="cgreen">COMPARTIDO</strong> por nuestra comunidad debe ser <strong class="cpink">ÚTIL</strong> para todos.
				</p>
				<div class="width100 fleft clearfix info center">
					<div class="padding30" style="padding-top:">
						<p>La comunidad compartirá conocimiento en las siguientes categorías</p>
						<div class="clearfix petals">
							<div class="ecoicon tiptip" title="Construcción">1</div>
							<div class="ecoicon tiptip" title="Gobierno comunitario">2</div>
							<div class="ecoicon tiptip" title="Finanzas & Economía">3</div>
							<div class="ecoicon tiptip" title="Tierra & Naturaleza">4</div>
							<div class="ecoicon tiptip" title="Cultura & Educación">5</div>
							<div class="ecoicon tiptip" title="Herramientas & Tecnología">6</div>
							<div class="ecoicon tiptip" title="Salud & Espiritualidad">7</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix block meet">
				<div class="title corange fright">Conocer	</div>

				<div class="ecoicon fleft corange " style="font-size:195px;margin-left:20px;">K</div>
				<p class="subtext fright">
					Podrás conocer gente que comparte tus intereses e incluso <strong class="cpink">HABILIDADES</strong>. Esto con la finalidad de crear <strong class="cblue">LAZOS DE COOPERACIÓN</strong> entre todos los miembros de la <strong class="cgreen">COMUNIDAD</strong>.

				</p>
				<div class="width100 clearfix info">
					<div class="padding30">
						<div class="width50 fleft">
							<div class="width100 clearfix text">Puedes conocer gente que:</div>
							<ul>
								<li><div class="ecoicon marker"></div><div class="text">Se encuentre cerca de ti</div></li>
								<li><div class="ecoicon">D</div><div class="text">Posea habilidades específicas</div></li>

							</ul>
						</div>

					</div>
				</div>
			</div>
			<div class="clearfix block cooperate">
				<div class="title cgreen fleft">Cooperar	</div>

				<div class="ecoicon margin30r cgreen" style="font-size:190px;float:right!important;">u</div>
				<p class="subtext fleft taright">
					Como <strong class="cgreen">VOLUNTARIO</strong> podrás viajar a ecocentros donde te <strong class="cblue">NECESITEN</strong>. A través de tu <strong class="cpink">FLOR DE HABILIDADES</strong> podrás compartir lo que <strong class="cgreen">SABES HACER</strong>. Esto te abrirá muchas puertas
				</p>
				<div class="width100 clearfix info">
					<div class="padding30">
						<div class="width50 fleft">
							<div class="width100 clearfix text">Puedes aplicar en 2 modalidades:</div>
							<ul>
								<li><div class="ecoicon">1</div><div class="text">Voluntariado tradicional</div></li>
								<li><div class="ecoicon">D</div><div class="text">Voluntariado experto</div></li>


							</ul>
						</div>
						<div class="width50 fright">
						</div>
					</div>
				</div>
			</div>

		</div>

	</div><!--Wrapper Index -->

<?php //	include(_VIEWS_PATH_."_registration/member_reg.php");
?>
<script type="text/javascript">
document.write('<scr' + 'ipt src="' + document.location.protocol + '//fby.s3.amazonaws.com/fby.js?100"></scr' + 'ipt>');
</script>
<script src="_plugins/cycle.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
FBY.showTab({id: '2551', position: 'left', color: '#DC0F65'});
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=147283031981372";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
	$(document).ready(function(e){
			$(".videolink").click(function() {
						$.fancybox({
							'padding'		: 0,
							'autoScale'		: false,
							'transitionIn'	: 'none',
							'transitionOut'	: 'none',
							'title'			: this.title,
							'width'			: 900,
							'height'		: 510,
							'href'			: this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1'),
							'type'			: 'swf',
							'swf'			:{'allowfullscreen':'true',
												'title'			:'false'}
						});

						return false;
					});

		$('#miembro_forma_registro_email').focus();
		$('#slider').cycle({ fx: 'fade', speed: 800, timeout: 0, pager: '#nav',
			pagerAnchorBuilder: function(idx, slide) {
				return '<a href="#" class="ecoicon cblue">$</a>';
			}
		});
		$('.register').click(function(E){

			var bValid = true;
			allFields.removeClass( "ui-state-error" );
			if(name.val()==name.attr("title"))name.val('');
			if(email.val()==email.attr("title"))email.val('');
			bValid = bValid && checkLength( name, "EL nombre de usuario debe contener minimo 3 y maximo 16 caracteres", 3, 16 );

			bValid = bValid && checkLength( password, "Por favor introduce un password", 5, 16 );
			bValid = bValid && checkLength( email, "Por favor introduce tu email", 6, 80 );

			bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "El nombre de usuario debe incluir los siguientes caracteres a-z, 0-9, underscores, y empezar con una letra." );
			// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
			bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
			bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "ejemplo. juan.perez@ecologikal.net" );

			if ( bValid ) {
			//
				var miembro_forma_registro_usuario=$("#miembro_forma_registro_usuario").val();
				var miembro_forma_registro_contrasena=$("#miembro_forma_registro_contrasena").val();
				var miembro_forma_registro_email=$("#miembro_forma_registro_email").val();
				var miembro_forma_registro_comando=$("#miembro_forma_registro_comando").val();
				var dataString = 'miembro_forma_registro_usuario='+ miembro_forma_registro_usuario +
					'&miembro_forma_registro_contrasena=' + miembro_forma_registro_contrasena +
					'&miembro_forma_registro_email='+miembro_forma_registro_email+
					'&miembro_forma_registro_comando='+miembro_forma_registro_comando;
				$.ajax({
					type: "POST",
					url: "<?php echo _BACKEND_URL_?>_registration/memberdata.php",
					data: dataString,
					success: function(msg) {
						if(msg==true){
								var url='<?php echo _VIEWS_URL_ ?>members/member_profile.php';
								//$('a.selectaccount').trigger('click');
								//$('#forma_registro').append('<a class="iframe selectaccount" href="'+url+'"></a>')
								//	.find('a.selectaccount').trigger('click');
								$(location).attr('href',url);
							//$('#miembro_forma_registro_error').html("Logged").hide().fadeIn(500, function(){});
						}else{
							updateTips(msg,0);
						}
					}
				 });
			}
		});
			var name = $( "#miembro_forma_registro_usuario" ),
				email = $( "#miembro_forma_registro_email" ),
				password = $( "#miembro_forma_registro_contrasena" ),
				allFields = $( [] ).add( name ).add( email ).add( password );
				$('#reg').click(function(e){
					alert('yes');
				});

		$('#logo').hover(function(e){
			$('#mainmenu').slideDown(300);
		});
		$('#mainmenu').hover(function(e){
		}, function(e){
			$(this).slideUp(300);
		});
		$("#topmenu .item.play").click(function() {
			$('.block.play').slideDown(200);
		 });

		$("#topmenu .item.travel").click(function() {
		     $('html, body').animate({
		         scrollTop: $(".block.travel").offset().top-70
		     }, 300);
		 });

		$("#topmenu .item.discover").click(function() {
		     $('html, body').animate({
		         scrollTop: $(".block.discover").offset().top-70
		     }, 300);
		 });

		$("#topmenu .item.learn").click(function() {
		     $('html, body').animate({
		         scrollTop: $(".block.learn").offset().top-70
		     }, 300);
		 });

		$("#topmenu .item.cooperate").click(function() {
		     $('html, body').animate({
		         scrollTop: $(".block.cooperate").offset().top-70
		     }, 300);
		 });
		$("#topmenu .item.meet").click(function() {
		     $('html, body').animate({
		         scrollTop: $(".block.meet").offset().top-70
		     }, 300);
		 });




	});
</script>