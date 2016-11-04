<?php 
	$view = 'member_registration';
	$step = $_SESSION['registration_step'] = 1;
	include("../../../header_nobar.php");
		?>
		<div class="wrapper">
			<div id="content" >
				
				<div class="padding10">
					<a class="button green  fright " href="members_registration_step2.php">Siguiente Paso</a>
					<h1 class="fontwhite">Bienvenido a Ecologikal! </h1>
					<div id='cover' class='width100 center'>
						<div id="name" class="tiptip pointer" title="click para cambiar nombre">Felix David Collado 
							<span class="margin10t location tiptip pointer" title="click para editar ubicación">
							<img class="fright margin10l" src="<?php echo _CSS_URL_ ?>images/flags/mx.gif" alt="">
							<span class='fright font20 margin10'>de Monterrey, NL</span>
						</span></div>
						<img src="https://fbcdn-sphotos-a.akamaihd.net/hphotos-ak-ash4/399924_10150551757374704_503039703_8680802_533847833_n.jpg" alt="">
					</div>
					<div class='container clearfix'>
						<h2>Invítanos a conocerte</h2>
						<p>Ecologikal es una red semántica que ofrece contenido a la medida a sus miembros, para poder ofrecerte conocimiento necesitamos conocerte. Añade tus intereses para comenzar el viaje</p>
						<div id="interests" class="clearfix">
							<ul class="interests clearfix">
								<li class="interest "><div class="ecoicon delete"></div>Music / Band</li>
								<li class="interest "><div class="ecoicon delete"></div>Yoga</li>
								<li class="interest "><div class="ecoicon delete"></div>Graphic Design</li>
								<li class="interest "><div class="ecoicon delete"></div>Music / Band</li>
								<li class="interest "><div class="ecoicon delete"></div>Music / Band</li>
								<li class="interest "><div class="ecoicon delete"></div>Music / Band</li>
								<li class="interest "><div class="ecoicon delete"></div>Music / Band</li>
							</ul>
							<input type="text" name="interest" value="" id="interest" class="margin20r" placeholder="write an interest">
							<div id="autocomplete">
								<ul class="list">
									<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>
									<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>
									<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>
									<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>
									<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>
									<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>
								</ul>
							</div>
						</div>
						<div></div>
						
						
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