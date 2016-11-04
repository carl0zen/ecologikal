<script src="<?=_JS_URL_?>members/sidebar_left.js" type="text/javascript" charset="utf-8"></script>
<style>
	#mainmenu #notificationlist{
		left:55px;
		z-index:100000;
		
	}
	.notification{
		min-height:50px;
	}
	nomessages {
	z-index: 1000000;
	position: relative;
	position: absolute;
	margin-left: -19px;
	margin-top: 1px;
	}
</style>

<leftbar>
	<div id="mainmenu">
		<div id="community" class="iconcontainer">
			<div onClick="location.href='<?php echo _ROOT_URL_."membersdir.php" ?>'" <?php 
				$notifications = members_get_unread_community_notifications($_SESSION['user_id']); 
				if (!$notifications){ ?>
				class="icon community tiptip" title="Community"
			<?php }else{ ?>
				class="icon community"
			<?php
			} ?> >
			</div>
			<?php
				if($notifications){ ?>
					<nomessages><?php echo count($notifications); ?></nomessages>
					<div id="notificationlist">
					<?php foreach ($notifications as $key => $value): ?>
						
							<div class="notification" >
								<input type="hidden" name="userfrom" value="<?php echo $notifications[$key]['userfrom'] ?>" id="userfrom">
								<input type="hidden" name="userto" value="<?php echo $notifications[$key]['userto'] ?>" id="userto">
								<input type="hidden" name="id" value="<?php echo $notifications[$key]['id'] ?>" id="id">
								<memberavatar onClick="location.href='<?php echo members_display_profile_url($notifications[$key]['userfrom']) ?>'"><?php members_display_profile_thumb($notifications[$key]['userfrom'])?></memberavatar>
								<div class="message">
									<a href="<?php echo _VIEWS_URL_?>members/member_profile.php?user_id=<?php echo $notifications[$key]['userfrom'] ?>"><?php echo members_get_info('nombre',$notifications[$key]['userfrom']); ?></a>
								<?php echo $notifications[$key]['message'];?></div>
								<timeago><abbr class="timeago" title="<?php echo $notifications[$key]['time'];?>"></abbr></timeago>
								<?php if ($notifications[$key]['type']=='friendship'): ?>
										<button class="green accept">Accept</button><button class="green reject">Reject</button>
								<?php endif ?>
							</div>
						
					<?php endforeach ?>
					<div class="viewall">
						<a href="<?php echo _VIEWS_URL_?>members/notifications/communitynotifications.php">View All Notifications</a>
					</div>
					</div> 
					
			<?php } ?>
		</div>
		
		
		
		<div id="media" class="iconcontainer">
			<div <?php 
				$notifications = members_get_unread_media_notifications($_SESSION['user_id']); 
				if (!$notifications){ ?>
				class="icon media tiptip" title="Multimedia"
			<?php }else{ ?>
				class="icon media"
			<?php
			} ?> >
			</div>
				<?php
					if($notifications){ ?>
						<nomessages><?php echo count($notifications); ?></nomessages>
						<div id="notificationlist">
						<?php foreach ($notifications as $key => $value): ?>

								<div class="notification">
									<input type="hidden" name="userfrom" value="<?php echo $notifications[$key]['userfrom'] ?>" id="userfrom">
									<input type="hidden" name="userto" value="<?php echo $notifications[$key]['userto'] ?>" id="userto">
									<input type="hidden" name="id" value="<?php echo $notifications[$key]['id'] ?>" id="id">
									<memberavatar><?php members_display_profile_thumb($notifications[$key]['userfrom'])?></memberavatar>
									<div class="message">
										<a href="<?php echo _VIEWS_URL_?>members/member_profile.php?user_id=<?php echo $notifications[$key]['userfrom'] ?>"><?php echo members_get_info('nombre',$notifications[$key]['userfrom']); ?></a>
									<?php echo $notifications[$key]['message'];?>
									</div>
									<timeago><abbr class="timeago" title="<?php echo $notifications[$key]['time'];?>"></abbr></timeago>
								</div>


						<?php endforeach ?>
						<div class="viewall">
							<a href="<?php echo _VIEWS_URL_?>members/notifications/medianotifications.php">View All Notifications</a>
						</div>
						</div>

				<?php } ?>
		</div>
			
		<div id="ecocenters" class="iconcontainer">
			<div onClick="location.href='<?php echo _ROOT_URL_."ecocentersdir.php" ?>'" <?php 
				$notifications = members_get_unread_ec_notifications($_SESSION['user_id']); 
				if (!$notifications){ ?>
				class="icon travel tiptip" title="Ecocenters"
			<?php }else{ ?>
				class="icon travel"
			<?php
			} ?> >
			</div>
				<?php
					if($notifications){?>
						<nomessages><?php echo count($notifications); ?></nomessages>
						<div id="notificationlist">
						<?php foreach ($notifications as $key => $value): ?>

								<div class="notification" onclick="location.href='<?php echo ec_get_url($notifications[$key]['item_id']) ?>'">
									<input type="hidden" name="userfrom" value="<?php echo $notifications[$key]['userfrom'] ?>" id="userfrom">
									<input type="hidden" name="userto" value="<?php echo $notifications[$key]['userto'] ?>" id="userto">
									<input type="hidden" name="id" value="<?php echo $notifications[$key]['id'] ?>" id="id">
									<memberavatar><?php members_display_profile_thumb($notifications[$key]['userfrom'])?></memberavatar>
									<div class="message">
										<a href="<?php echo _VIEWS_URL_?>members/member_profile.php?user_id=<?php echo $notifications[$key]['userfrom'] ?>"><?php echo members_get_info('nombre',$notifications[$key]['userfrom']); ?></a>
									<?php echo $notifications[$key]['message'];?>
									</div>
									<timeago><abbr class="timeago" title="<?php echo $notifications[$key]['time'];?>"></abbr></timeago>
								</div>


						<?php endforeach ?>
						<div class="viewall">
							<a href="<?php echo _VIEWS_URL_?>members/notifications/ecocenternotifications.php">View All Notifications</a>
						</div>
						</div>
				<?php } ?>
		</div>
			
		
		<div id="game" class="iconcontainer">
			<div onClick="location.href='<?php echo _ROOT_URL_."maingame.php" ?>'" <?php 
				$notifications = members_get_unread_game_notifications($_SESSION['user_id']); 
				if (!$notifications){ ?>
				class="icon tree tiptip" title="The Game"
			<?php }else{ ?>
				class="icon tree"
			<?php
			} ?> >
			</div>
				<?php
					if($notifications){?>
						<nomessages><?php echo count($notifications); ?></nomessages>
						<div id="notificationlist">
						<?php foreach ($notifications as $key => $value): ?>

								<div class="notification">
									<input type="hidden" name="userfrom" value="<?php echo $notifications[$key]['userfrom'] ?>" id="userfrom">
									<input type="hidden" name="userto" value="<?php echo $notifications[$key]['userto'] ?>" id="userto">
									<input type="hidden" name="id" value="<?php echo $notifications[$key]['id'] ?>" id="id">
									<memberavatar><?php members_display_profile_thumb($notifications[$key]['userfrom'])?></memberavatar>
									<div class="message">
										<a href="<?php echo _VIEWS_URL_?>members/member_profile.php?user_id=<?php echo $notifications[$key]['userfrom'] ?>"><?php echo members_get_info('nombre',$notifications[$key]['userfrom']); ?></a>
									<?php echo $notifications[$key]['message'];?>
									</div>
									<timeago><abbr class="timeago" title="<?php echo $notifications[$key]['time'];?>"></abbr></timeago>
								</div>


						<?php endforeach ?>
						<div class="viewall">
							<a href="<?php echo _VIEWS_URL_?>members/notifications/gamenotifications.php">View All Notifications</a>
						</div>
						</div>
				<?php } ?>
		</div>
		
		
		<div id="trips" class="iconcontainer">
			<div onClick="location.href='<?php echo _VIEWS_URL_."members/traveldiary.php" ?>'"
			<?php 
				$notifications = members_get_unread_trip_notifications($_SESSION['user_id']); 
				if (!$notifications){ ?>
				class="icon travel tiptip" title="Trips"
			<?php }else{ ?>
				class="icon travel"
			<?php
			} ?> >
			</div>
			<?php if($notifications){?>
					<nomessages><?php echo count($notifications); ?></nomessages>
					<div id="notificationlist">
					<?php foreach ($notifications as $key => $value): ?>
						
							<div class="notification">
								<input type="hidden" name="userfrom" value="<?php echo $notifications[$key]['userfrom'] ?>" id="userfrom">
								<input type="hidden" name="userto" value="<?php echo $notifications[$key]['userto'] ?>" id="userto">
								<input type="hidden" name="id" value="<?php echo $notifications[$key]['id'] ?>" id="id">
								<memberavatar><?php members_display_profile_thumb($notifications[$key]['userfrom'])?></memberavatar>
								<div class="message">
									<a href="<?php echo _VIEWS_URL_?>members/member_profile.php?user_id=<?php echo $notifications[$key]['userfrom'] ?>"><?php echo members_get_info('nombre',$notifications[$key]['userfrom']); ?></a>
								<?php echo $notifications[$key]['message'];?>
								</div>
								<timeago><abbr class="timeago" title="<?php echo $notifications[$key]['time'];?>"></abbr></timeago>
							</div>
							
						
					<?php endforeach ?>
					<div class="viewall">
						<a href="<?php echo _VIEWS_URL_?>members/notifications/tripnotifications.php">View All Notifications</a>
					</div>
					</div>
			<?php } ?>
		</div>
		
		
			
		
	</div>
	
</leftbar>
<script>
	$(document).ready(function(e){
		$('#mainmenu .community').click(function(e){
		});
		$('#notificationlist .notification').click(function(e){
			e.preventDefault();
		});
	});
</script>