<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$_SESSION['user_hash'] = members_get_info('hash',$_SESSION['user_id']);
// If a parameter is passed with the user_id then it displays the profile for the user_id passed, if not it means that should display loggedin user profile
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

$temp = array();
$skillarr = array();
// Getting the skills and number array
for ($x=1; $x < 8; $x++) {
	$skillarr[$x]['noskills']= members_get_no_skills($userid, $x);
	$skillarr[$x]['petal']= $x;
}
array_multisort($skillarr);
?>
<script src="<?php echo _PLUGINS_URL_ ?>raphael.js"></script>
<script src="<?php echo _JS_URL_ ?>flower/member_flower.js"></script>
<div class="get">
	<?php
		for ($x=0;$x<7;$x++){
		?>
		<div class="petal">
			<span class="text"><?php echo get_petal_name($skillarr[$x]['petal']);?></span>
			<input type="hidden" class="percent" value="<?php echo members_get_petal_grade($userid, $skillarr[$x]['petal']);?>" />
			<input type="hidden" class="color" value="<?php echo get_petal_color($skillarr[$x]['petal']);?>" />
			<input type="hidden" class="noSkills" value="<?php echo members_get_no_skills($userid, $skillarr[$x]['petal']); ?>" />
		</div>
	<?php }?>
</div><!-- Get-->
<div class="petalslist">
	<div class="petalbuttons">
		<div class="tiptip icon petals p0" id="1" title="My Building Skills"></div>
		<div class="tiptip icon petals p1" id="2" title="My Community Governance Skills"></div>
		<div class="tiptip icon petals p2" id="3" title="My Finance & Economics Skills"></div>
		<div class="tiptip icon petals p3" id="4" title="My Land & Nature Skills"></div>
		<div class="tiptip icon petals p4" id="5" title="My Culture & Education Skills"></div>
		<div class="tiptip icon petals p5" id="6" title="My Tools & Technology Skills"></div>
		<div class="tiptip icon petals p6" id="7" title="My Health & Spirituality Skills"></div>
	</div>
	<div id="skillslist">
		<div id="overview">
			<div id="totalskills" class="tiptip" title="All the skills that <?php echo members_get_info('nombre', $userid); ?> has">
				Overall Grade: <?php echo members_get_flower_grade($userid);?> / 100 in <?php echo members_get_total_skills($userid);?> Skills
			</div>
		</div>
		<?php if($myprofile){?>
				<?php if(members_get_skill_count($userid) == 0){?>

					<button class="green addfirstskill addskill" >Add First Skill</button>

			<?php }else{?>
				<button class="green addskill tiptip" title="Add Skill" ><div class="iconic plus-alt"></div></button>

		<?php 	}//end else
			}//enf if?>
	</div>
	<flower>
		<?php
		for($x=1;$x<8;$x++){
			$petalname = get_petal_name($x);
			$petalclass = get_petal_class($x);
			$skills = members_get_skills_by_petal($userid,$x);
			$noskills = members_get_no_skills($userid, $x);
			$petalgrade = members_get_petal_grade($userid, $x);?>
			<div id="p<?php echo $x?>" class="<?php echo $petalclass ?>" >
				<petalicon></petalicon>
				<span id="petalName"><?php echo $petalname ?></span>
				<span id="noSkills"><?php echo $noskills?> skills</span>
				<span id="percSkills"><?php echo $petalgrade?> % </span>
					<?php foreach ($skills as $i => $value){?>
						<skill>
							<input type="hidden" id="skillid" value="<?php echo $skillid = $skills[$i]['id']?>">
							<name><?php if($myprofile){ echo '<span class="icon delete skill"></span>'; } echo $skills[$i]['name']?></name>
							<grade><?php echo $skills[$i]['grade']?> %</grade>
							<description><?php echo $skills[$i]['description'] ?><span id="showreferences"><span class="ui-icon ui-icon-comment"></span>Show References</span></description>
							<?php $references = members_get_skill_ref($userid, $skillid);
							foreach ($references as $key => $value) { ?>
								<reference>
									<userid><?php echo $references[$key]['user_from'];?></userid>
									<avatar><a href="#"><?php echo $references[$key]['user_avatar'];?></a></avatar>
									<username><?php echo $references[$key]['user_name'];?></username>
									<description><?php echo $references[$key]['description'];?></description>
									<refgrade><?php echo $references[$key]['grade'];?> %</grade>
								</reference>
							<?php	}?>
							<?php
								if(!$myprofile && !members_check_reference($userid, $skillid)){?>
								<button class="green reference tiptip" title="Leave a reference if you know <?php echo members_get_info('nombre',$userid)?>">leave reference</button>
							<?php }?>


						</skill>
					<?php }// End foreach skills ?>
			</div>

		<?php
		}// End Petals For?>
	</flower>
</div><!--Petal list-->
<script>
	$(document).ready(function(e){
		$('.tiptip').tipTip();
		// Add Skills

		queryurl = BACKEND_URL + '_general/getskillslist.php';
		appended = false;
		$('button.addskill').live('click',function(e){
		if (appended == false){
			$(this).parent().append('<input type="text" id="skill">');
			$(this).parent().find('#skill').autoSuggest(queryurl,{
				selectedItemProp: 'value',
				startText: "Type Skill",
				selectedValuesProp: 'id',
				selectionLimit:1,
				limitText: "One Skill at a Time",
				selectionAdded: function(data){

					$('#skillslist').append('<textarea id="skilldescription"></textarea>');
					$('#skilldescription').watermark('Type a description of your skill').focus();
					$('#skillslist').append('<div class="sliderlabel"><span class="hint">Level of proficiency</span><span class="value">0 %</span></div><div id="slider"></div><button class="saveskill green">Save Skill</button>');
					$('#slider').slider({
						range: "min",
						min: 1,
						max: 100,
						slide: function(e,ui){
							$('.sliderlabel span.value').html(ui.value+" %");
						}
					});
				},
				selectionRemoved: function(data){
					$('#skilldescription, #skillslist .watermark, #skillslist li.as-selection-item, #skillslist div.sliderlabel, #skillslist #slider, button.saveskill').remove();
				},
				searchObjProps: "value",
				minChars: 2,
				matchCase: false,
				//Adds country code to the list
				formatList: function(data,elem){
					var cat = data.cat, skill = data.value, catname = data.catname;
					var new_elem = elem.html("<span class='iconsmall petal p"+cat+" tiptip' title='"+catname+"'></span>"+ skill);
					return new_elem;
				}
			}).watermark('Type Skill').focus();
			appended= true;
			}
		});
		// Add Skill
		$('button.saveskill').live('click',function(e){
			skillname = $(this).parent().find('ul li.as-selection-item').text().replace(/^.(\s+)?/, "");
			level = parseInt($('.sliderlabel span.value').html());
			description = $('#skilldescription').val();
			skillid = $('#skillslist input.as-values').val();
			skillid = skillid.replace(",", "");
			skillid = parseInt(skillid);
			if (description === '' || level === 0 || skillid === null){
				if (description == ''){
					$('#skilldescription').css({'border': '2px solid #992244', 'background':'#B3236C'}).focus();
				}else{
					$('#skilldescription').css({'border': 'none', 'background':'#444'})
				}
				if (level === 0){
					alert('Please select a level');
				}
			}else{
				$.post(BACKEND_URL+'members/saveskill.php', { skillid: skillid, desc: description, level:level},function(data){
					window.location.href = "?";
					petalno = parseInt(data);

					$('div#p'+petalno).slideDown(200).find('skill').slideDown(200);
					noskills = $('div#p'+petalno).find('#noskills').html();
					noskills = parseInt(noskills);
					noskills++;
					$('div#p'+petalno).find('noskills').text(noskills+' skills');
					$('div#p'+petalno+' #percSkills').after('<skill style="display: block; "><input type="hidden" id="skillid" value="'+skillid+'"><name><span class="icon delete skill"></span>'+skillname+'</name><grade>'+level+' %</grade><description>'+description+'</description></skill>');
					// UPDATE POINTS

					$('#skilldescription, #slider, .sliderlabel, ul li.as-selection-item, button.saveskill').remove();
					kins = $('#reactionpoints #kinvalue').text();
					kins = parseInt(kins);
					kins= kins + 3;
					$('#reactionpoints #kinvalue').html("<span class='icon kin'></span>"+kins+" kins");
				});
			}
		});
		// Delete Skill

		$('span.icon.delete.skill').click(function(e){
			skillid = $(this).parent().parent().find('input#skillid').val();
			$(this).parent().parent().fadeOut(200).remove();
			$.post(BACKEND_URL+'members/deleteskill.php', { skillid: skillid},function(data){
				$(this).parent().parent().append(data);
			});
		});
		// Leave Reference

		$('button.reference').live('click',function(e){

				$(this).parent().append('<textarea id="reference"></textarea><span class="value greengradient">0 %</span><span class="hintref greengradient">Level of proficiency</span><div id="refslider"></div><button class="green postref">Post Reference</button>');
				$(this).parent().find('#reference').watermark('Please Write your reference here').focus();
				$(this).parent().find('#refslider').slider({
					min: 1,
					max: 100,
					slide: function(e,ui){
						$(this).parent().find('span.value').html(ui.value+" %");
					}
				});
				$(this).live('focus', function () { $(this).unbind('focus');  });
				$(this).slideUp(200);
		});
		$('button.postref').live('click',function(e){
			grade = parseInt($(this).parent().find('span.value').html());
			description = $(this).parent().find('#reference').val();
			skillid = $(this).parent().find('input#skillid').val();
			if (description === '' || grade === 0 || skillid === null){
				if (description == ''){
					$('#reference').css({'border': '2px solid #992244', 'background':'#B3236C'}).focus();
				}else{
					$('#reference').css({'border': 'none', 'background':'#444'})
				}
				if (level === 0){
					alert('Please select a level');
				}
			}else{
				$.post(BACKEND_URL+'members/savereference.php', { userto: USER_ID_VIEWING, skillid: skillid, desc: description, grade:grade},function(data){
				//	$(this).parent().parent().find('#reference, span.value, .hintref, #refslider, button.postref').remove();
					window.location.href = "?user_id="+USER_ID_VIEWING;
				//	$(this).parent().append('<reference><userid>'+USER_ID+'</userid><avatar><img src="'+USER_PIC+'"/></avatar><username>'+USER_NAME+'</username><description>'+description+'</description><refgrade>'+grade+' %</refgrade></reference>');
				/**	petalno = parseInt(data);
					$('div#p'+petalno).slideDown(200).find('skill').slideDown(200);
					noskills = $('div#p'+petalno).find('#noskills').html();
					noskills = parseInt(noskills);
					noskills++;
					$('div#p'+petalno).find('noskills').text(noskills+' skills');
					$('div#p'+petalno+' #percSkills').after('<skill style="display: block; "><input type="hidden" id="skillid" value="'+skillid+'"><name><span class="icon delete skill"></span>'+skillname+'</name><grade>'+level+' %</grade><description>'+description+'</description></skill>'); **/
				});
			}
		});
	});
</script>