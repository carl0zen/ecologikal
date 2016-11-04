<?php
 	$view = 'messages'; // This is for determining which scripts and css are going to be loaded
	include("../../../header.php"); 
	include(_VIEWS_PATH_."members/sidebar_left.php"); 
	$userid = $_SESSION['user_id']; // This determines the user id of the page being displayed
	if (isset($_GET['messagethread'])){
		$thread_id = $_GET['messagethread'];
	}else{ 
		$thread_id = false;
	}?>
	<script src="<?php echo _JS_URL_ ?>members/messagemain.js"></script>
	<script src="<?php echo _PLUGINS_URL_ ?>jquery.oembed/jquery.oembed.min.js"></script>
	<content>
	<?php if ($thread_id){
			$thread_id;
			$type = members_get_thread_type($thread_id);
		if ($type == 'single') {
			$messages = members_get_thread_messages($thread_id);
			?>
			<h1><div class="ecoicon message"></div>Messages </h1>
			<h2>Messages between</h2>
			<div class="answer">
				<h1><?php echo $thread_id ?></h1>
				<input type="hidden" name="messageto" value="<?php 
					$recipients = members_get_thread_recipients($thread_id); 
					foreach ($recipients as $key1 => $value) {
						$string = $string + $recipients[$key1]['user_id'];
						$string = $string + " ,";
					}
					echo $string = substr($string, 0, -1);

					?>" id="messageto">
				<textarea id="sendmessagesmall"></textarea>
				<button class="green sendmessagesmall">Send Message</button>
			</div>
			<?php 	$messages = members_get_thread_messages($thread_id);
					$x = 0;
					if(count($messages)>9){ $i = 10;}else{$i = count($messages);}
					for ($key = 0; $key < $i ; $key++){
						$message = $messages[$key]['message'];
						$message = nl2br($message);
						$urls = find_url($message);
						$video = get_youtube_videos($message);
						$id = $messages[$key]['id'];
						$from = $messages[$key]['user_from'];
						$time = $messages[$key]['time']; ?>
						<div class="messageitem" <?php if($status === null){ echo "class='unread'";}?> id="<?php echo $id ?>">
							<span class="icon delete deletemessage"></span>
							<input type="hidden" name="messageid" value="<?php echo $id ?>" id="messageid">
							<memberavatar onclick="location.href='<?php members_display_profile_url($from)?>'" class="tiptip" title="<?php echo members_get_info('nombre', $from) . " " . members_get_info('apellido', $from)?>"><?php members_display_profile_thumb($from);?></memberavatar>
							<timeago><abbr class="timeago" title="<?php echo $time ?>"></abbr></timeago>
							<div class="message">
								<?php if($urls){ echo $urls;}else{ echo $message;}?>
							</div>
								<?php 
								if ($video){
									echo $video?>
							    <div id="metaDataholder">
							    	<?php $links = get_urls_in_string($message); ?>
							    	<input type="hidden" name="url" value="<?php echo $links[0][0]; ?>" id="url">
							    </div>
							<?php } ?>

						</div>
					<?php }//END FOREaCH ?>
		<?php 		} // End IF ?>	
			<?php
		}
			?>
		
	<?php
		/** If the param entered is the message inbox
		**/
		if ($_GET['box'] == 'inbox') { ?>
		<h1><div class="ecoicon message"></div>Inbox <button class="green sendmessage iframe tiptip" title="Compose Message" href="<?php echo _VIEWS_URL_ ?>members/sendmessage.php?user_id=<?php echo $members[$key]['user_id'] ?>"><div class="iconic plus" ></div></button>
			
		</h1>
		<?php $msgthreads = members_get_message_threads($userid);
				if ($msgthreads != null){
				foreach ($msgthreads as $key => $value) {?>
					<div class="thread notification expanded <?php if ($msgthreads[$key]['message_status']== null){ echo "unread"; }?>" onclick="location.href='?messagethread=<?php echo $msgthreads[$key]['id'] ?>'">
						<div id="deleteicon" class="pointer tiptip" title="Delete this thread"><span class="ecoicon no"></span></div>
						<input type="hidden" name="creator_id" value="<?php echo $msgthreads[$key]['creator_id'] ?>" id="creator_id">
						<input type="hidden" name="id" value="<?php echo $msgthreads[$key]['id'] ?>" id="id">
						
						<timeago><abbr class="timeago" title="<?php echo $msgthreads[$key]['message_time'];?>"></abbr></timeago>
						<div id="type" >
							<?php if ($msgthreads[$key]['type']=='multi'): ?>
								<span class="ecoicon member"></span>
							<?php endif ?>
							<?php if ($msgthreads[$key]['type']=='single'): ?>
								<span class="ecoicon p2"></span>
							<?php endif ?>
							
							<?php echo $msgthreads[$key]['type']; ?>
						</div>
						
						<div id="recipients">
								<?php $recipients = $msgthreads[$key]['recipients'];
								foreach ($recipients as $key2 => $value): ?>
									<memberavatar class="tiptip" title="<?php echo members_get_info('nombre',$recipients[$key]['user_id']) . ' '. members_get_info('apellido',$recipients[$key2]['user_id']); ?>">
									<a href="<?php echo members_display_profile_url($recipients[$key2]['user_id']) ?>"><?php members_display_profile_thumb($recipients[$key2]['user_id']) ?></a>
									</memberavatar>
							<?php endforeach ?>
						</div>
						<div class="name">
							<?php 
								$norecip = count($recipients);
								if ($norecip > 1){
									$stop = 4;
									$andnomore = $norecip - $stop;
									for ($i= 0; $i < $stop; $i++): ?>
									
									<a href="<?php echo members_display_profile_url($recipients[$i]['user_id']) ?>">
										<?php echo members_get_info('nombre', $recipients[$i]['user_id']); ?>
									</a>,
									
									<?php endfor; 
										if($andnomore == 1){ ?>
											and 1 more friend
										<?php
											
										}else{?>
										and <?php echo $andnomore ?> more friends
									<?php }
								}else{
									$stop = $norecip;?>
										<a href="<?php echo members_display_profile_url($recipients[0]['user_id']) ?>">
											<?php echo members_get_info('nombre', $recipients[0]['user_id']); ?>
										</a>
									<?php
								} ?>
						</div>
						<div class="message"><?php echo $msgthreads[$key]['message']?></div>
					</div>
				
				
				<?php }
				}else{
					echo "<div class='nonewnotifications'>There are no Messages Yet</div>";
				}// End if?>
		<?php } //end userfrom if ?>
	</content>
	<div id="menu">
		<button class="green" onclick="location.href='?box=inbox'">Inbox</button>
	</div>
	<div id="loader"></div>
<script>
	$(document).ready(function(e){
		$('textarea#sendmessagesmall').watermark('Please Type your Message Here').focus();
		// Send Message

		$('button.sendmessagesmall').live('click',function(e){
			message = $(this).parent().find('textarea#sendmessagesmall').val();
		   if (message === ''){
		   		$('textarea#sendmessagesmall').css({'border': '2px solid #992244', 'background':'#B3236C'}).focus();
		   }else{
		   		$('textarea#sendmessagesmall').css({'border': 'none', 'background':'#444'});

				friends = ","+ $('#messageto').val() + ","; // The commas is to comply with autosuggest format so in sendmessage.php the outer elements are not stripped out
				alert(friends);
				$.post(BACKEND_URL+'members/sendmessage.php', { friends: friends, message: message},function(data){
					message = message.replace(/\n/g,'<br />');
					alert(data);
				/**	$('div.messageitem:first')
						.before('<div class="messageitem">'+
									'<memberavatar><img src="'+USER_PIC_THUMB+'"></memberavatar>'+
									'<timeago>'+
										'<abbr class="timeago" title="<?php $time = $_SERVER["REQUEST_TIME"]; echo $time = date(DATE_ATOM); ?>"></abbr>'+
									'</timeago>'+
									'<div class="message"><p>'+message+'</p></div>');
					$('timeago').timeago();
					$('#sendmessagesmall').val('').focus(); **/
				});

		   }
		});
		$('.sendmessage.iframe').fancybox({
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
		
	// Load more messages	
	<?php if(count($messages)>9){
		?>
		function last_message_function() { 
			var ID=$("div.messageitem:last").attr("id");
			$('div#loader').html('<img src="<?php echo _IMAGES_URL_ ?>ajax-loader.gif">Loading...');
			$.post("messages_next.php?last_msg_id="+ID+'&from=<?php echo $_GET["messagethread"] ?>',
			function(data){
				if (data != "") {
					$("div.messageitem:last").after(data); 
					$('.tiptip').tipTip();
				}
				$('div#loader').empty();
			});
		}; 

		$(window).scroll(function(){
			if ($(window).scrollTop() == $(document).height() - $(window).height()){
				last_message_function();
			}
		});	
			
		<?php
	} //End if messages more than 9 ?>
	
		
		
	});
</script>