<?php 
	$view = 'member_registration';
	$step = $_SESSION['registration_step'] = 2;
	include("../../../header_nobar.php");
	
		?>
		<div class="wrapper">
			<div id="content" >
				<div class="padding10" id="welcome">
					<a href="members_registration_step3.php" class="button green fright saveskills">Siguiente Paso</a>
					<h1 class="fontwhite">Bienvenido a Ecologikal!</h1>					
					<div class="container margin10t clearfix">
						<h2>¿Para qué eres bueno?</h2>
						<p></p>
						<div class="skills">
							<div class="width40 fleft">
								<div class="petal p1" petalNo="1"><div class="iconwrap"><div class="ecoicon p1 fleft margin10r"></div></div><span class="petalname">Building & Construction				<span class="ecoicon plus"></span></span></div>
								<div class="petal p2" petalNo="2"><div class="iconwrap"><div class="ecoicon p2 fleft margin10r"></div></div><span class="petalname">Community Governance	<span class="ecoicon plus"></span></span></div>
								<div class="petal p3" petalNo="3"><div class="iconwrap"><div class="ecoicon p3 fleft margin10r"></div></div><span class="petalname">Finance & Economics	<span class="ecoicon plus"></span></span></div>
								<div class="petal p4" petalNo="4"><div class="iconwrap"><div class="ecoicon p4 fleft margin10r"></div></div><span class="petalname">Land & Nature				<span class="ecoicon plus"></span></span></div>
								<div class="petal p5" petalNo="5"><div class="iconwrap"><div class="ecoicon p5 fleft margin10r"></div></div><span class="petalname">Culture & Education	<span class="ecoicon plus"></span></span></div>
								<div class="petal p6" petalNo="6"><div class="iconwrap"><div class="ecoicon p6 fleft margin10r"></div></div><span class="petalname">Tools & Technology		<span class="ecoicon plus"></span></span></div>
								<div class="petal p7" petalNo="7"><div class="iconwrap"><div class="ecoicon p7 fleft margin10r"></div></div><span class="petalname">Health & Spirituality<span class="ecoicon plus"></span></span></div>
							</div>              
						</div>
						<div id="skillinput" class="width60 fleft">
							<div class="padder padding30l">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(e){
		
		$('.interest').live('click',function(e){
		
			$(this).remove();
			if(!$('.interest').length > 0){
				$('.saveskills').remove();
				$('.skillslist').remove();
			}
		});
		
		$('.result').live('click',function(e){
			if(!$('#experience').is(':visible')){
				var skillName = $(this).find('.skillName').html();
				$('#skill').after('<div class="formcontainer"><h2>'+skillName+'</h2><textarea id="experience" placeholder="Describe experiencia, fuerzas, áreas de especialidad y lugares donde haz realizado esta actividad"></textarea>'+
				'<p>Select your level of experience: <span class="fright bold explevel nodisplay"></span></p><div id="expslider"></div>'+
				'<a href="#" class="button blue saveskill fright margin20t">save skill</a></div>');
				$('#experience').focus();
				$('#expslider').slider({
					range: "min",
					min: 1,
					max: 4,
					step: 1,
					slide: function(e,ui){
						var level;
						if(ui.value === 1)		{level = 'Beginner'	}
						if(ui.value === 2)		{level = 'Intermediate'	}
						if(ui.value === 3)		{level = 'Advanced'	}
						if(ui.value === 4)		{level = 'Expert'	}
						$('.explevel').html(level).fadeIn();
					}
				});
			}
		});
		$('.petal').click(function(e){
				//to define the autocomplete list to query from
				var petalNo = $(this).attr('petalNo');
				if(!$('#skill').is(':visible')){
					$('#skillinput .padder').append('<input type="text" name="skill" value="" id="skill" placeholder="type in your skill">');
					$('#skill').focus().live('click',function(e){
						if(!$('.list').is(':visible')){
							$(this).after('<ul class="list clearfix nodisplay">'+
								'<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>'+
								'<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>'+
								'<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>'+
								'<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>'+
								'<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>'+
								'<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>'+
								'<li class="result"><span class="people"><span class="number tiptip" title="people liking this"> 100 <span class="ecoicon up"></span></span></span><span class="skillName">Permaculture</span> <span class="ecoicon plus"></span></li>'+
							'</ul>');
							
							
							$('.list').slideDown();
						}
					}).blur(function(e){
						$('.list').slideUp(200,function(e){
							$(this).remove();
						})
					});
					$('.saveskill').live('click',function(e){
						$('.formcontainer').remove();
						$(this).remove();
						$('#experience').remove();
						if(!$('.skillslist').is(':visible')){
							$('#skill').after('<ul class="skillslist interests clearfix"></ul>');
						}
							$('.list').slideUp(200,function(e){
								$(this).remove();
							});
							$('.skillslist').append('<li class="interest"><div class="ecoicon delete"></div>Skill Name <span class="explabel">(Expert)</span></li>');
					
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
					});	
				}
		});
		// Toggle petalname
		$('.petal').click(function(e){
			$('.petal').removeClass('selected');
			$(this).toggleClass('selected');
		});
		
	});
</script>