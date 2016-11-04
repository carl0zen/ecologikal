<?php
 	$view = 'memberdir'; // This is for determining which scripts and css are going to be loaded
	include("header.php"); 
	include(_VIEWS_PATH_."members/sidebar_left.php");
	
?>
<content>
	<div id="members">
		
	</div>

	


	<h1><div class="icon community title"></div>Community</h1>
	<?php $members = get_all_members();
			$x = 0;
			for ($key = 0; $key < 15 ; $key++){ 
			$requested = members_check_request($_SESSION['user_id'], $members[$key]['user_id'], 'friendship');
			if ($members[$key]['user_id']!= $_SESSION['user_id']){ ?>
			<div class="member" id ="<?php echo $members[$key]['user_id'] ?>" >
				<input type="hidden" name="user_id" value="<?php echo $members[$key]['user_id']?>" id="user_id">
				<memberavatar onclick="location.href='<?php members_display_profile_url($members[$key]['user_id']) ?>'"><?php members_display_profile_thumb($members[$key]['user_id'])?></memberavatar>
				<name><a href="<?php members_display_profile_url($members[$key]['user_id']) ?>"><?php echo $members[$key]['nombre']. ' ' . $members[$key]['apellido']?></a> 
					<span class="friendsincommon"><?php echo members_get_friends_in_common($members[$key]['user_id'])?> friends in common</span>
				</name>
				<?php $flag = members_get_info("country",$members[$key]['user_id']); 
				if($flag){ ?>
				<location>
					<div class="flag">
						<?php display_country_flag($flag); ?>
					</div>
					<span class='countrytext'><?php echo members_get_info('country', $members[$key]['user_id']); ?></span>
				</location>
				<?php } ?>
					<?php $totalskills = members_get_total_skills($members[$key]['user_id']);
						if ($totalskills > 0){ ?>
						<div class="flower">
				<?php
						for($x=1; $x <8 ; $x++){ 
							$noskills = members_get_no_skills($members[$key]['user_id'], $x);
							if($noskills != 0){
								$percskills = $noskills/$totalskills*100;?>
								<div class="tiptip " style="background:<?php echo get_petal_color($x);?>;width:<?php echo $percskills ?>% "title="<?php echo members_get_no_skills($members[$key]['user_id'],$x)?> skills <br> <h2><?php echo members_get_petal_grade($members[$key]['user_id'], $x);?>%</h2>"></div>
						<?php	} // End if
						} //END for ?>
						</div>
					<?php } // End if?>
					
				
				<div id="reactionpoints" class="tiptip" title="Kin Balance (Alternative Currency)"><span class="icon kinsmall"></span><?php echo $members[$key]['user_kins']?></div>
				<div class="buttons">
					<?php if (!members_is_friend($members[$key]['user_id']) && $requested == false && $members[$key]['user_id'] != $_SESSION['user_id']){ ?>
							<button class="green addfriend iconspan"><span class="ui-icon ui-icon-plus"></span></button>

					<?php }
					if($requested && !members_is_friend($members[$key]['user_id'])){ ?>
							<span class="requested">Friendship Requested</span>
					<?php	} ?>
					<?php if(members_is_friend($members[$key]['user_id'])){ ?>
							<button class="green deletebond tiptip" title="Delete from friends"><span class="ui-icon ui-icon-close"></span></button>
					<?php }?>
					<button class="green sendmessage tiptip" title="Send Message" onclick="$(this).parent().find('a.sendmessage').trigger('click')"><span class="ui-icon ui-icon-mail-closed"></span></button>
					<a href="<?php echo _VIEWS_URL_ ?>members/sendmessage.php?user_id=<?php echo $members[$key]['user_id'] ?>" class="iframe sendmessage" class="iframe sendmessage"></a>
				</div><!--Buttons-->
			</div>	<!--member-->
	<?php	}//End if
		} // End Foreach?>
		<div class="loading" id="loader"></div>
	
</content>
<div id="stats">
	<h2>Stats</h2>
	<h3>Econauts</h3>
	<span class="number"><?php echo members_count() ?> members in <?php echo members_count_countries() ?> countries</span>
	<h3>Friendships</h3>
	<span class="number"><?php echo get_total_friendships(); ?></span>
</div>

<?php include("footer.php"); ?>
<script>

$(document).ready(function(e){
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