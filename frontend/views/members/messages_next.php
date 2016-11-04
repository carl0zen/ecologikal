<?php require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");
$lastmsgid = $_GET['last_msg_id'];
$from = $_GET['from'];?>
<?php
if (isset($_GET['from'])){
	$messages = members_get_next_messages($from, $lastmsgid);
	foreach ($messages as $key => $value){
		$message = $messages[$key]['message'];
		$urls = find_url($message);
		$video = get_youtube_videos($message);
		$id = $messages[$key]['id'];
		$from = $messages[$key]['userfrom'];
		$to = $messages[$key]['userto'];
		$time = $messages[$key]['time'];
		$status = $messages[$key]['status'];?>
		<div class="messageitem" <?php if($status === null){ echo "class='unread'";}?> id="<?php echo $id ?>">
			<span class="icon delete deletemessage"></span>
			<input type="hidden" name="messageid" value="<?php echo $id ?>" id="messageid">
			<memberavatar onclick="location.href='<?php members_display_profile_url($from)?>'" class="tiptip" title="<?php echo members_get_info('nombre', $from) . " " . members_get_info('apellido', $from)?>"><?php members_display_profile_thumb($from);?></memberavatar>
			<timeago><abbr class="timeago" title="<?php echo $time ?>"></abbr></timeago>
			<div class="message">
				<?php if($urls){ echo $urls;}else{ echo $message;}?>
			</div>
				<?php echo $video?>
		</div>
<?php
	} // End foreach

}//END IF ?>