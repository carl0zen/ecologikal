<?php
$feed ='meet';
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
					<p class="fontwhite">Busca a un amigo:</p>
					<input type="text" placeholder="Escribe su nombre" name="search" value="" id="search" style="width:80%">
						<div id="filters" class="clearfix">
							<p class="fontwhite">Filtros por categoría:</p>
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

					<?php if ($map=='true'){ ?>
						<a class="tab" href="?mode=needs"><span class="ecoicon">_</span>Show List</a></div>
						
					<?php }else{ ?>
						<a class="tab" href="?mode=needs"><span class="ecoicon marker"></span>Show Map</a></div>
					<?php } ?>
				</div>

				<div class="padding20 clearfix " style="padding-top:0;">
					
					<h1><div class="ecoicon fleft margin10r">y</div>Búsqueda de econautas</h1>
					
					<p>Cerca de <span class="font20 bold location">Monterrey, MX</span> están estas personas que poseen habilidades. Usa los filtros de la izquierda para buscar por categoría.</p>
					
					<?php if ($map=='true'){ ?>
						<div id="map" class="clearfix">
							<iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=42.03917,78.662109&amp;t=m&amp;z=4&amp;output=embed"></iframe><br />
						</div>
					<?php }else{ ?>
						<?php $members = get_all_members();
								$x = 0;
								for ($key = 0; $key < 15 ; $key++){ 
								$requested = members_check_request($_SESSION['user_id'], $members[$key]['user_id'], 'friendship');
								if ($members[$key]['user_id']!= $_SESSION['user_id']){ ?>
								<div class="result clearfix" id ="<?php echo $members[$key]['user_id'] ?>" >
										<div class="proximity" style="margin-top: 43px;border-radius:3px 3px 0 0;">a 10 km</div>
									<input type="hidden" name="user_id" value="<?php echo $members[$key]['user_id']?>" id="user_id">
									<memberavatar  onclick="location.href='<?php members_display_profile_url($members[$key]['user_id']) ?>'"><?php members_display_profile_thumb($members[$key]['user_id'])?></memberavatar>
									<name class="fleft" ><a href="<?php members_display_profile_url($members[$key]['user_id']) ?>"><?php echo $members[$key]['nombre']. ' ' . $members[$key]['apellido']?></a> 
										<span class="friendsincommon"><?php echo members_get_friends_in_common($members[$key]['user_id'])?> friends in common</span>
									</name>
									<?php $flag = members_get_info("country",$members[$key]['user_id']); 
									if($flag){ ?>
										<div class="flag tiptip" title="<?php echo members_get_info('country', $members[$key]['user_id']); ?>">
											<?php display_country_flag($flag); ?>
										</div>

									


									<div class="buttons social-actions fright">
										<?php if (!members_is_friend($members[$key]['user_id']) && $requested == false && $members[$key]['user_id'] != $_SESSION['user_id']){ ?>
												<a href="#" class="button green addfriend"><span class="ecoicon">=</span></a>

										<?php }
										if($requested && !members_is_friend($members[$key]['user_id'])){ ?>
												<span class="requested fright absolute">Friendship Requested</span>
										<?php	} ?>
										<?php if(members_is_friend($members[$key]['user_id'])){ ?>
												<a class="button reen deletebond tiptip" title="Delete from friends"><span class="ecoicon">H</span></a>
										<?php }?>
										<a class="button green sendmessage tiptip" href="#" title="Send Message" onclick="$(this).parent().find('a.sendmessage').trigger('click')"><span class="ecoicon">U</span></button>
										<a href="<?php echo _VIEWS_URL_ ?>members/sendmessage.php?user_id=<?php echo $members[$key]['user_id'] ?>" class="iframe sendmessage" class="iframe sendmessage"></a>
										
									</div><!--Buttons-->
									<div class="reputation  ">
										<div class="amplification tiptip clearfix" title="Amplificación"><div class="ecoicon fleft">X</div>100</div>
										<div class="resonance tiptip clearfix" title="Resonancia"><div class="ecoicon fleft">T</div>190</div>
									</div>
									
									<?php } ?>
										<?php $totalskills = members_get_total_skills($members[$key]['user_id']);
											if ($totalskills > 0){ ?>
											<div class="flower clearfix">
									<?php
											for($x=1; $x <8 ; $x++){ 
												$noskills = members_get_no_skills($members[$key]['user_id'], $x);
												if($noskills != 0){
													$percskills = $noskills/$totalskills*100;?>
													<div class="tiptip fright" style="height:7px;background:<?php echo get_petal_color($x);?>;width:<?php echo $percskills ?>% "title="<?php echo members_get_no_skills($members[$key]['user_id'],$x)?> skills <br> <h2><?php echo members_get_petal_grade($members[$key]['user_id'], $x);?>%</h2>"></div>
											<?php	} // End if
											} //END for ?>
											</div>
										<?php } // End if?>
								</div>	<!--member-->
						<?php	}//End if
							} // End Foreach?>
							<div class="loading" id="loader"></div>
					<?php } ?>
				</div>
				</div>
				<!-- .padding20 -->
				

		</div>
		<!-- maincontent -->
	</div>
</div>

<script>

// jQUERY 
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
		$('a.sendmessage').fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'padding'		: 0,
				'speedIn'		:	300, 
				'speedOut'		:	200, 
				'overlayShow'	:	true,
				'width'			: 500,
				'height'		: 350, 
				'overlayColor'	: '#000',
			});
		function last_member_funtion() { 
			var ID=$("div.member:last").attr("id");
			$('div#loader').html('<img src="<?php echo _IMAGES_URL_ ?>ajax-loader.gif">Loading...');
			$.post("memberdata.php?last_member_id="+ID,
			function(data){
				if (data != "") {
					$("div.member:last").after(data); 
					$('.tiptip').tipTip();
				}
				$('div#loader').empty();
			});
		}; 

		$(window).scroll(function(){
			if ($(window).scrollTop() == $(document).height() - $(window).height()){
				last_member_funtion();
			}
		});

		$('div.member .addfriend').live('click',function(e){
			USER_ID_VIEWING = $(this).parent().parent().find('input#user_id').val();

			$.post(BACKEND_URL+'members/requestfriendship.php', { user_to: USER_ID_VIEWING},function(data){
			});
			$(this).parent().prepend('<span class="requested">Friendship Request Sent</span>');
			$(this).remove();
		});

		$('div.member .deletebond').live('click',function(e){
			USER_ID_VIEWING = $(this).parent().parent().find('input#user_id').val();
			$.post(BACKEND_URL+'members/deletefriend.php', { user_id: USER_ID_VIEWING},function(data){
			});
			$(this).parent().prepend('<span class="requested">Friend Deleted</span>');
			$(this).remove();
		});
	});
</script>
