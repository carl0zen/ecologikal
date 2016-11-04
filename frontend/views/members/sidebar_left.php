<script src="<?=_JS_URL_?>members/sidebar_left.js" type="text/javascript" charset="utf-8"></script>


	<div id="mainmenu" class="nodisplay">
		<div id="dharma" class="iconcontainer">
			<?php
				$notifications = members_get_unread_trip_notifications($_SESSION['user_id']);
			 	if($notifications){?>
			<span class="nomessages"><?php echo count($notifications);?></span>
			<div class="ecoicon heart"></div>
			<span class="text">Dharma</span>
			<div id="notificationlist">
				<div class="header">Friendship Requests</div>
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
			
			<?php }else{
				echo "</div>";
			}?>
		</div>
		<div id="friends" class="iconcontainer">
				<?php
					$notifications = members_get_unread_trip_notifications($_SESSION['user_id']);
				 	if($notifications){?>
				<span class="nomessages">1<?php echo count($notifications);?></span>
				<div class="ecoicon addfriend"></div>
				<span class="text">Friendships</span>
				

			
					<div id="notificationlist">
						<div class="header">Friendship Requests</div>
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
					
					<?php }else{
						echo "</div>";
					}?>
		</div>
		
		
		
		<div id="media" class="iconcontainer">
			<div class="width100">
				<div class="ecoicon media"></div>
				<?php
					$notifications = members_get_unread_trip_notifications($_SESSION['user_id']);
				 	if($notifications){?>
				<span class="nomessages fright"><?php echo count($notifications);?></span>
				<span class="text">Media Tags</span>

			</div>
			
					<div id="notificationlist">
						<div class="header">Picture Tags</div>
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

						<?php }else{
							echo "</div>";
						}?>
		</div>
			
		<div id="ecocenters" class="iconcontainer">
			<div class="width100">
				<div class="ecoicon ecocenter"></div>
				<span class="text">Ecocenter Feeds</span>
				<?php
					$notifications = members_get_unread_ec_notifications($_SESSION['user_id']);
				 	if($notifications){?>
				<span class="nomessages fright"><?php echo count($notifications);?></span>
			</div>
			
					<div id="notificationlist">
						<div class="header">My Ecocenters Updates</div>
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
				<?php }else{
					echo "</div>";
				}?>
		</div>
			
		
		
		
		<div id="trips" class="iconcontainer">
			<div class="width100">
				<?php
					$notifications = members_get_unread_trip_notifications($_SESSION['user_id']);
				 	if($notifications){?>
				<span class="nomessages fright"><?php echo count($notifications);?></span>
				<div class="ecoicon backpack"></div>
				<span class="text">Trip Updates</span>
				
			</div>
			
					<div id="notificationlist">
						<div class="header">Trip Notifications</div>
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
	
<script>
	$(document).ready(function(e){
		$('#mainmenu .community').click(function(e){
		});
		$('#notificationlist .notification').click(function(e){
			e.preventDefault();
		});
	});
</script>