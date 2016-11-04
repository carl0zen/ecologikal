<?php 
	$view = 'member_registration';
	$step = $_SESSION['registration_step'] = 2;
	include("../../../header_nobar.php");

	/* Get skills by petal */
	$skills = array();
	for ($petalNo = 1; $petalNo <= 7; $petalNo++) {
		$petalSkills = get_skills_by_petal($petalNo);
		$skill = array();
		
		foreach ($petalSkills as $petalSkill) {
			if (!$petalSkill['userlikes']) {
				$html = '<li id="'.$petalSkill['id'].'#'.$petalSkill['skill'].'" class="result"><span class="people"><span class="number tiptip" title="people liking this">'.$petalSkill['likes'].'<span class="ecoicon up"></span></span></span><span class="skillName">'.$petalSkill['skill'].'</span> <span class="ecoicon plus"></span></li>';
				$skill[] = $html;
			}
		}
		
		$skills[] = $skill;
	}
?>
		<div class="wrapper">
			<div id="content" >
				<div class="padding10" id="welcome">
					<a href="javascript:saveInfo()" class="button green fright saveskills">Siguiente Paso</a>
					<h1 class="fontwhite">Bienvenido a Ecologikal!</h1>					
					<div class="container margin10t clearfix">
						<h2>¿Para qué eres bueno?</h2>
						<p></p>
						<div class="skills">
							<div class="width40 fleft">
								<div class="petal p1"  petalNo="1">
									<div class="iconwrap">
									<div class="ecoicon p1 fleft margin10r"></div></div><span class="petalname">Building & Construction				<span class="ecoicon plus"></span></span></div>
								<div class="petal p2" petalNo="2"><div class="iconwrap"><div class="ecoicon p2 fleft margin10r"></div></div><span class="petalname">Community Governance<span class="ecoicon plus"></span></span></div>
								<div class="petal p3" petalNo="3"><div class="iconwrap"><div class="ecoicon p3 fleft margin10r"></div></div><span class="petalname">Finance & Economics<span class="ecoicon plus"></span></span></div>
								<div class="petal p4" petalNo="4"><div class="iconwrap"><div class="ecoicon p4 fleft margin10r"></div></div><span class="petalname">Land & Nature<span class="ecoicon plus"></span></span></div>
								<div class="petal p5" petalNo="5"><div class="iconwrap"><div class="ecoicon p5 fleft margin10r"></div></div><span class="petalname">Culture & Education	<span class="ecoicon plus"></span></span></div>
								<div class="petal p6" petalNo="6"><div class="iconwrap"><div class="ecoicon p6 fleft margin10r"></div></div><span class="petalname">Tools & Technology<span class="ecoicon plus"></span></span></div>
								<div class="petal p7" petalNo="7"><div class="iconwrap"><div class="ecoicon p7 fleft margin10r"></div></div><span class="petalname">Health & Spirituality<span class="ecoicon plus"></span></span></div>
							</div>              
						</div>
						<div id="skillinput" class="width60 fleft">
							<div class="padder padding30l">
								
								<input id="input-skill" style="display: none"/>
						<?
							/* Print each hidden list */
							foreach ($skills as $key => $skill) {
								?><ul id="list-p<?=$key+1?>" class="list clearfix" style="width:99%;display:none">
									<?=implode('', $skill)?>
								</ul><?
							}
						?>	
							<div id="skill-form" class="formcontainer" style="display: none">
									<h2 id="skill-name"></h2>
									<textarea id="experience" placeholder="Describe experiencia, fuerzas, áreas de especialidad y lugares donde haz realizado esta actividad"></textarea>
									<p>
										Select your level of experience: <span class="fright bold explevel">Beginner</span>
									</p>
									<div id="expslider"></div>
									<a id="save-skill" class="button blue saveskill fright margin20t">Save skill</a>
								</div>
							</div>
						</div>
						<ul id="current-skills" class="skillslist interests clearfix">
					<?
						/* Get all skills */
						$skills = get_skills();
						
						function level ($grade) {
							if ($grade <= 25) {
								return 'Beginner';
							} else if ($grade <= 50) {
								return 'Intermediate';
							} else if ($grade <= 75) {
								return 'Advanced';
							} else {
								return 'Expert';
							}
						}
						
						foreach ($skills as $skill) {
							if ($skill['userlikes']) {
								echo '<li id="'.$skill['id'].','.member_get_skill_grading ($skill['id'], $_SESSION['user_id']).'" class="interest" style="padding-left: 17px; "><div class="ecoicon delete" style="display: none; "></div>'.$skill['skill'].'<span class="explabel">('.level(member_get_skill_grading($skill['id'], $_SESSION['user_id'])).')</span><div id="'.$skill['id'].'-description" style="display:none">'.member_get_skill_description($skill['id'], $_SESSION['user_id']).'</div></li>';
							}
						}
					?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		

		
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(e){
	
		list = Array();
	<?
		foreach ($skills as $key => $skill) {
			?>
				list.push(['<?= implode("','", $skill) ?>']);
			<?
		}
	?>
		
		$('.interest').live('click',function(e){
		
			$(this).remove();
			if(!$('.interest').length > 0){
				$('.saveskills').remove();
				$('.skillslist').remove();
			}
		});
		
		/* A function that shows current list and skill input */
		showCurrentList = function (petal) {
			/* Hide all lists, show current list */
			$('#input-skill').val('Type in skill').show();
			$('#input-skill').select();
			$('.list').css('display', 'none');
			$('#list-p' + petal).slideDown(300);			
			/* Restart filtering */
			filterBySearch("");
		};
		
		$('.petal').click(function(e){
				//to define the autocomplete list to query from
				petalNo = $(this).attr('petalNo');
				
				/* Show current list */
				showCurrentList(petalNo);
				
		});
		// Toggle petalname
		$('.petal').click(function(e){
			$('.petal').removeClass('selected');
			$(this).toggleClass('selected');
		});
		
		/* Init .result action */
		$('.result').click(function (evt) {
			/* Get the id, and the value */
			var element = this;
			var id = this.id.split('#');
			var value = id[1];
			id = id[0];
			
			/* Hide input-skill, and all .list */
			$('#input-skill').css('display', 'none');
			$('.list').css('display', 'none');
			/* Show formcontainer */
			$('#skill-name').html(value);
			$('#skill-form').show();
			$('#experience').focus();
			
			/* Start slider */
			var level = 'Beginner';
			var numericLevel = 25;
			var explevel;
			$('#expslider').slider({
				range: "min",
				min: 1,
				max: 4,
				step: 1,
				slide: function(e,ui){
					if(ui.value === 1)		{level = 'Beginner'; numericLevel = 25}
					if(ui.value === 2)		{level = 'Intermediate'; numericLevel = 50}
					if(ui.value === 3)		{level = 'Advanced'; numericLevel = 75}
					if(ui.value === 4)		{level = 'Expert'; numericLevel = 100}
					explevel = $('.explevel');
					$('.explevel').html(level).fadeIn();
				}
			});
			
			/* Save skill function */
			$('#save-skill').click(function () {
				var htmlContent = '<li id="'+id+','+numericLevel+'" class="interest" style="padding-left: 17px; "><div class="ecoicon delete" style="display: none; "></div>'+value+'<span class="explabel">('+level+')</span><div id="'+id+'-description" style="display:none">'+$('#experience').val()+'</div></li>';
				
				/* Restart content in skill-form, and hide */
				$('#skill-form').hide();
				$('#skill-name').html('');
				$('#experience').val('');
				$('#expslider').slider({
					value: 1
				});
				$(explevel).html('Beginner');
				
				/* Show input-skill and current .list again */
				showCurrentList(petalNo);
				
				/* Append htmlContent */
				$('#current-skills').append($(htmlContent));
				
				/* Remove from .list */
				$(element).remove();
			});
		});
		
		// Add filter
		$('#input-skill').val('Type in skill');
		$('#input-skill').click(function (evt) {
			$('#input-skill').select();
		});
		$('#input-skill').keyup(function (evt) {
			var currentValue = $('#input-skill').val();
			filterBySearch(currentValue);
			
		});
		
		/* A function that filters all results */
		filterBySearch = function (currentValue) {
			/* Hide all results */
			$('.result').css('display', 'none');
			
			/* Show the results that match search */
			var results = $('.result');
			for (i = 0; i < results.length; i++) {
				if (results[i].innerText.toLowerCase().indexOf(currentValue.toLowerCase()) > -1) {
					results[i].style.display = "";
				}
			}
		};
		
		/* A function that saves the info */
		saveInfo = function () {
			/* Get all the interest */
			var interests = $('.interest');
			var ids = Array();
			var grades = Array();
			var descriptions = Array();
			
			/* For each interest, get info */
			for (i = 0; i < interests.length; i++) {
				var interest = interests[i];
				
				/* Current id and grade */
				var id = interest.id.split(',');
				var grade = id[1];
				id = id[0];
				
				/* Get current description */
				var description = $('#' + id + '-description').html();
				
				ids.push(id);
				grades.push(grade);
				descriptions.push(description);
			}
			
			/* Send info */
			$.post(
				BACKEND_URL + 'members/saveregistrationinfo.php',
				{
					step: 2,
					ids: ids,
					grades: grades,
					descriptions: descriptions
				},
				function (data) {
					document.location = "members_registration_step3.php";
				}
			);
		};
	});
</script>