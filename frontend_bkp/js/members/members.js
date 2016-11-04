
$(document).ready(function(e){
	// PRofile Pic
	
		$("a.addpics, a.addpicstoalbum, a.managepictures").livequery(function(e){
				$(this).fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'padding'		: 0,
				'speedIn'		:	300, 
				'speedOut'		:	200, 
				'overlayShow'	:	true,
				'width'			: 800,
				'height'		: 500, 
				'overlayColor'	: '#000',
				'hideOnContentClick': false,
				'onClosed': function() { 
			   			parent.location.reload(true); 
			  		}
			});
		});
			
		$("a.sendmessage").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'padding'		: 0,
				'speedIn'		:	300, 
				'speedOut'		:	200, 
				'overlayShow'	:	true,
				'width'			: 500,
				'height'		: 400, 
				'overlayColor'	: '#000',
				'hideOnContentClick': false,
			});
	//Make Bond
	$('#addfriend').click(function(e){
		$.post(BACKEND_URL+'members/requestfriendship.php', { user_to: USER_ID_VIEWING},function(data){
			
		});
		$(this).parent().append('Friendship Requested');
		$(this).remove();
		
	});
	// ALBUMS 

	$('button.addalbum').live('click',function(e){
		$('.albumscontainer').prepend(' <div class="albuminfo"><span class="iconic x-alt delete close"></span><h4>Album info</h4><input type="text" id="albumname"><textarea id="albumdesc"></textarea><button class="green savealbum">Save Album</button></div>');
		$('#albumname').watermark('Type album name').focus();
		$('#albumdesc').watermark('Type album description');
		$('.albuminfo span.close').click(function(e){
			$(this).parent().remove();
			$('.gallery h3').append('<button class="green addalbum iconspan"><span class="ui-icon ui-icon-plus"></span>Add Album</button>');
		});
		$('button.savealbum').click(function(e){
			albumname = $('#albumname').val();
			albumdesc = $('#albumdesc').val();
			queryurl = BACKEND_URL + 'members/addalbum.php';
			$.post(queryurl, { albumname : albumname, albumdesc : albumdesc}, function(data){
				albumid = parseInt(data);
				datatoappend = '<div class="album">'+
									'<input type="hidden" name="albumid" value="'+albumid+'" id="albumid" />'+
									'<div class="name">'+
										'<h4>'+
										'<span class="icon delete deletealbum"></span>'+albumname+
										'<span class="nopics">'+
											'<span class="ui-icon ui-icon-image"></span>'+
											'0 pictures'+
										'</span>'+
										'<timeago>Just Now</timeago>'+
										'</h4>'+
										
										'<button class="green addpicstoalbum tiptip" title="Add Pictures" ><span class="ui-icon ui-icon-plus"></span></button>'+
										'<a class="iframe addpicstoalbum" href="'+VIEWS_URL+'members/pictureuploader.php?type=member&albumname='+albumname+'"></a>'+
										'<button class="green managepictures tiptip" title="Manage Pictures"><span class="ui-icon ui-icon-image"></span></button>'+
										'<a class="iframe managepictures" href="'+VIEWS_URL+'members/picturedetails.php?type=member&albumname='+albumname+'"></a>'+
									'</div>'+
										'<div class="description">'+albumdesc+'</div>'+
										'<div class="albumpics">No pictures Yet</div>'+
								'</div>';
				$('#profilecontent.gallery .albumscontainer').prepend(datatoappend);
			});
			$('.albuminfo').remove();
			$('.gallery h3').append('<button class="green addalbum">Add Album</button>');
			
		});
		$(this).remove();
	});
	$('button.addpicstoalbum').live('click',function(e){
		$(this).parent().find('a.addpicstoalbum').trigger('click');
	});
	$('button.managepictures').live('click',function(e){
		$(this).parent().find('a.managepictures').trigger('click');
	});
	$('span.deletealbum').live('click',function(e){
		answer = confirm('Are you sure you want to delete album?');
		if (answer){
			albumid = $(this).parent().parent().parent().find('#albumid').val();
			$.post(BACKEND_URL+'members/pictures/deletealbum.php', { albumid:albumid}, function(data){
				alert(data);
			});
			$(this).parent().parent().parent().slideUp(200);	
		}
		
	});
	// Slide toggle bars
	$('.gallery h3').click(function(e){
		//$('.albumscontainer').slideToggle(200);
	});
});