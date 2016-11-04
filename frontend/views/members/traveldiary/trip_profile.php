	<input type="hidden" name="tripid" value="<?php echo $tripid ?>" id="tripid">
	<div id="profileheader">
		<div id="buttons">
			
			<?php if (members_is_invited_to_trip($_SESSION['user_id'], $tripid)){
					if (!members_is_confirmed_to_trip($_SESSION['user_id'], $tripid)){?>
						<button class="green acceptinvite">Join Trip</div>
						<button class="green leavetrip">Reject</div>
					<?php }else{ ?>
						<button class="green leavetrip">Leave Trip</button>
					<?php }?> 
			<?php }?>
			<?php if (members_is_my_trip($tripid)){?>
				<?php if(members_is_my_trip($tripid) || members_is_confirmed_to_trip($_SESSION['user_id'],$tripid)){?>

					<button class="green addstop tiptip" title="Add Stop"><div class="iconic calendar"></div></button>
				<?php } // End if is my trip or confirmed to trip?>
				<a href="<?php echo _PLUGINS_URL_ ?>jquery.upload.crop/upload_crop_trip.php?command=upload&trip_id=<?php echo $tripid ?>" class="iframe profilepic"></a>
					<button class="green tiptip" title="Change Profile Pic" onclick="$(this).parent().find('a.profilepic').trigger('click');"><div class="iconic image"></div></button>
					
					<a href="<?php echo _VIEWS_URL_?>members/invitefriends.php?itemid=<?php echo $tripid ?>&type=trip" class="iframe invitefriends"></a>
					<button class="green invitefriends tiptip" title="Invite Friends" onclick = "$('a.invitefriends').trigger('click')"><div class="iconic plus"></div></button>
			<?php } ?>
		</div>
		<div id="profileimage">
			<?php tip_display_profile_pic($tripid); ?>
		</div>
		<div id="tripdetails">
			<h2><?php echo $title?></h2>
			<div class="datefrom"><?php echo $datefrom ?></div>
			<div class="address"><?php echo $address ?></div>
			<div class="description"><?php echo $description ?></div>
		</div>
	</div>

	<div id="friendsbar">
		<div id="skills">
			<h2>Skills in this trip</h2>
			<?php $skills = members_get_trip_skills($tripid);
				if($skills){
					foreach ($skills as $key => $value) { 
						$skillname 	= $skills[$key]['name'];
						$skillid 	= $skills[$key]['id'];
						$skillpetal = $skills[$key]['petal'];
						$petalname 	= $skills[$key]['petalname'];
						$petalclass = $skills[$key]['petalclass'];
						?>            
						<div class="skill " >
						<div class="tiptip icon petals p<?php echo $skillpetal-1 ?>" title = "<?php echo $petalname ?>"></div><?php echo $skillname?></div>
			<?php	}// Enf foreach
				} // End if?>
		</div>
		<div id="people">
		<h2>People</h2>
		<h4>Invited</h4>
		<?php $friends = members_get_trip_friends($tripid);
			if($friends){
				foreach ($friends as $key => $value) { 
					if ($friends[$key]['status']== null){
						$name = $friends[$key]['name'];
						$profileurl = $friends[$key]['profileurl'];
						$thumb = $friends[$key]['thumb'];
						?>
					<memberavatar class="tiptip" title="<?php echo $name?>" onclick="location.href='<?php echo $profileurl?>'"><?php echo $thumb?></memberavatar>
			<?php	}// end if status
			}// Enf foreach ?>
		<h4>Confirmed</h4>
		<?php	foreach ($friends as $key => $value) { 
					if ($friends[$key]['status'] == 'confirmed'){
						$name = $friends[$key]['name'];
						$profileurl = $friends[$key]['profileurl'];
						$thumb = $friends[$key]['thumb'];
						?>
						<memberavatar class="tiptip" title="<?php echo $name?>" onclick="location.href='<?php echo $profileurl?>'"><?php echo $thumb?></memberavatar>
		<?php		}// End if status
				}// Enf foreach ?>