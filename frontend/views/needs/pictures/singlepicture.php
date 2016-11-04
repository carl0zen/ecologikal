<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_config/bootstrap.php");?>
<?php if (function_exists('load_js_scripts')){ load_js_scripts('singlepicture');} ?>
<?php if (function_exists('load_css_files')){ load_css_files('singlepicture');} ?>
<style>
	h2 .iconic{
		font-size:30px;
	}
	h4 .iconic{
		font-size:25px;
		margin-right:5px;
	}
	h4{
		margin-bottom:5px;
	}
	div.imagecontainer{
		text-align:center;
		background:#292929;
		width:100%;
		overflow:hidden;
		border:1px solid #333;
	}
	.imagecontainer img{
		box-shadow: 0 0 25px #000;
		-webkit-box-shadow: 0 0 25px #000;
		-moz-box-shadow: 0 0 25px #000;
	}
	div.prev{
		top:82px;
		width:36%;
		min-height:50px;
		position:absolute;
	}
	div.next{
			top:82px;
			width:36%;
			height:300px;
			position:absolute;
			right:0;
			min-height:50px;
	}
	div.next:hover, div.prev:hover{
		cursor:pointer;
	}

	#prevbtn, #nextbtn{
		display:none;
		font-size:50px;
		color:#fff;
		width:100px;
		text-shadow: black 1px 3px 3px;
	}
	#nextbtn{
		float:right;
	}
	div.comments{
		width:65%;
		float:left;
	}
	div.tags {
	width: 34%;
	position: absolute;
	right: 0;
	margin-top: -59px;
	text-align:left;
	}
	.description{
		padding: 10px;
		margin: 10px 0;
		background: #292929;
		border: 1px solid #333;
		font-size: 11px;
		width: 62%;
		font-family:Lucida Grande, Lucida Sans;
	}
	.comment{
		background: #292929;
		padding: 9px;
		font-size: 11px;
		color: #999;
		clear: both;
		padding: 5px;
		min-height: 40px;
		border-bottom:1px solid #333;
	}
	.delete{
		float:right;
		margin-left:10px;
		display:none;
	}
	.comment:hover .delete{
		display:block;
	}
	.comments{
		padding-bottom:15px;
	}
	button{
		margin-bottom:10px;
		float:right;
	}
	input#message{
		width: 385px;
		margin-left: 7px;
	}
	memberavatar{
		margin-right:5px;
	}
	span.picno{
		float: right;
		font-size: 19px;
	}
</style>

<?php
	$type = $_GET['type'];
	$picid = $_GET['picid'];
	$ec_id = $_GET['ec_id'];

	$prevpic = ec_get_prev_pic($ec_id, $picid);
	$nextpic = ec_get_next_pic($ec_id, $picid);

	if ($type == 'ec_album'){

		$picture = ec_get_picture_from_id($ec_id, $picid); ?>
	<div id="iframe">
			<input type="hidden" name="album_id" value="<?php echo $picture['album_id']; ?>" id="album_id">
			<h2><span class="iconic home"></span> <?php echo ec_get_album_name($ec_id, $picture['album_id'])?><span class="picno"><?php echo 	ec_albums_get_pic_no($picid, $ec_id, $picture['album_id']); ?> of <?php echo ec_count_album_pictures($picture['album_id']) ?></span></h2>

			<div class="imagecontainer">
				<?php if($prevpic){ ?>
					<div class="prev" onclick = "location.href='?type=ec_album&picid=<?php echo $prevpic ?>&ec_id=<?php echo $ec_id?>'" >
						<div id="prevbtn" class="iconic arrow-left"></div>
					</div>
				<?php } ?>
				<input type="hidden" name="picid" value="<?php echo $picid?>" id="picid">
				<img src="<?php echo $picture['url'] ?>">
				<?php if($nextpic){ ?>
					<div class="next" onclick = "location.href='?type=ec_album&picid=<?php echo $nextpic ?>&ec_id=<?php echo $ec_id?>'" >
						<div id="nextbtn" class="iconic arrow-right"></div>

					</div><?php } ?>
			</div>
			<div class="picinfo">
				<div class="description"><?php if ($picture['description']){ echo $picture['description'];}else{ //echo "<button class='green adddesc'>Add Desc</button>";
				}?></div>
			</div>
		<div class="comments">
			<?php if(members_is_friend($_SESSION['user_id'])){?>
				<button class="green addcomment">Comment</button>
			<?php }
			$comments = ec_get_picture_comments($picid);
			if ($comments){
				foreach ($comments as $key => $value) {
					$userfrom = $comments[$key]['user_from'];
					$time = $comments[$key]['time'];
					$message = $comments[$key]['message']?>
				<div class="comment">
					<input type="hidden" name="comment_id" value="<?php echo $comments[$key]['id'] ?>" id="comment_id">
					<?php if (members_is_my_comment($comments[$key]['id'])){ ?>
						<span class="icon delete deletecomment"></span>
					<?php } ?>
					<memberavatar><?php members_display_profile_thumb($userfrom)?></memberavatar>
					<timeago><abbr class="timeago" title="<?php echo $time ?>"></timeago>
					<div class="message"><?php echo $message ?></div>
				</div>

		<?php
				}// end foreach

		}?>
		</div>
		<div class="tags">
			<h4><span class="iconic tag"></span>People Tags</h4>
			<div class="peopletags">
				<?php $tags = ec_get_picture_tags($picid);
					if ($tags){ ?>
				<ul class="as-selections" id="tags">

					<?php foreach ($tags as $key => $value) { ?>

						<li class="as-selection-item"><?php echo $tags[$key]['name']?></li>
			<?php			} ?>

				</ul>
				<?php	}?>
			</div>
			<button class="green tagpeople">Tag People</button>
		</div>
	</div>

	<?php }// End if member?>


<script>
$(document).ready(function(e){
	$.fancybox.resize();
	album_id = $('#album_id').val();
	$('.deletecomment').live('click',function(e){
		comment_id = $(this).parent().find('#comment_id').val();
		alert(comment_id);
		queryurl = BACKEND_URL + 'ecocenters/deletepicturecomment.php';
		$.post(queryurl, { comment_id : comment_id}, function(e){
			alert(e);
		});
		$(this).parent().remove();
	});
	$(window).keyup(function(e){
		if (e.keyCode === 37){
			$('div.prev').trigger('click');
		}
		if (e.keyCode === 39){
			$('div.next').trigger('click');
		}
		if (e.keyCode === 13){
			$('button.postcomment, button.addcomment').trigger('click');
		}
	});

	$('div.prev').hover(function(e){
		$(this).find('#prevbtn').fadeToggle(200);
	});
	$('div.next').hover(function(e){
		$(this).find('#nextbtn').fadeToggle(200);
	});

	picheight= $('.imagecontainer img').height();
	$('.prev, .next').css({ height: picheight});
	$('#nextbtn, #prevbtn').css({'margin-top': picheight/2.2});
	// Adding Comments

	$('button.addcomment').click(function(e){

		$(this).parent().prepend('<memberavatar><img src="'+USER_PIC_THUMB+'"></memberavatar><input type="text" id="message"/><button class="green postcomment">Post</button>');
		$('#message').focus();
		$('button.postcomment').click(function(e){
			message = $(this).parent().find('#message').val();
			if (message){
				$('#message').css({background: '#ccc'}).focus();
				picid = $('#picid').val();


				queryurl = BACKEND_URL + 'ecocenters/pictures/savecomment.php';
				$.post(queryurl, {picid:picid, message:message, album_id:album_id}, function(e){
				});
				$(this).after('<div class="comment">'+
					'<input type="hidden" name="comment_id" value="" id="comment_id">'+
						'<span class="icon delete deletecomment"></span>'+
					'<memberavatar><img src="'+USER_PIC_THUMB+'"></memberavatar>'+
					'<timeago>Just Now</timeago>'+
					'<div class="message">'+message+'</div>'+
					'</div>');
				$('#message').val('');
			}else{
				$('#message').css({background: '#ff0044'}).focus();
			}

		});
		$(this).remove();
	});
	// Adding people tag
	$('button.tagpeople').click(function(e){
		$('#tags').remove();
		$(this).after('<input type="text" name="addfriends" value="" id="addfriends"><button class="green savepeople">Save Tags</button>');
		<?php if($tags){ ?>
		selectedData = {items:[
		<?php foreach ($tags as $key => $value) { ?>
			{id: '<?php echo $tags[$key]["user_id"] ?>',
			nombre: '<?php echo $tags[$key]["name"] ?>'},
		<?php } ?>
		]};
		<?php } // end if tags?>

		queryurl = BACKEND_URL + '_general/getfriendslist.php';
		$('#addfriends').autoSuggest(queryurl,{
			selectedItemProp: 'nombre',
			selectedValuesProp: 'id',
			asHtmlID: 'friends',
		<?php if ($tags){ ?>
			preFill: selectedData.items,
		<?php } ?>
			searchObjProps: "nombre",
			startText: "Type Friend Name",
			minChars: 1,
			matchCase: false,
			//Adds country code to the list
			formatList: function(data,elem){
				var pic = data.pic, name = data.nombre;
				var new_elem = elem.html(pic +name);
				return new_elem;
			}
		}).watermark('Type Friend Name').focus();

		$('button.savepeople').click(function(e){
			queryurl = BACKEND_URL + 'ecocenters/pictures/savetags.php?type=people';
			picid = $('#picid').val();
			friends = $('#as-values-friends').val();
			$.post(queryurl, {picid:picid, friends:friends, album_id: album_id}, function(data){
				location.reload(true);
			});
		});

		$(this).remove();
	});
});

</script>

