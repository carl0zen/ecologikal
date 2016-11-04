$(document).ready(function(e){

	$("a.fancylink, a.pic").fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'padding'		: 0,
			'speedIn'		:	300, 
			'speedOut'		:	200, 
			'overlayShow'	:	true,
			'width'			: 900,
			'height'		: 500, 
			'overlayColor'	: '#000',
		});
	
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
			ecid = $('#ec_id').val();
			queryurl = BACKEND_URL + 'ecocenters/addalbum.php';
			$.post(queryurl, { albumname : albumname, albumdesc : albumdesc, ecid : ecid}, function(data){
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
										'<a class="iframe addpicstoalbum" href="'+VIEWS_URL+'ecocenters/pictureuploader.php?type=ec_album&albumname='+albumname+'&ec_id=' + ecid + '"></a>'+
										'<button class="green managepictures tiptip" title="Manage Pictures"><span class="ui-icon ui-icon-image"></span></button>'+
										'<a class="iframe managepictures" href="'+VIEWS_URL+'ecocenters/picturedetails.php?type=ec_album&albumname='+albumname+'&ec_id=' + ecid + '"></a>'+
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
			ecid = $('#ec_id').val();
			$.post(BACKEND_URL+'ecocenters/pictures/deletealbum.php', { albumid:albumid, ecid: ecid }, function(data){			});
			$(this).parent().parent().parent().slideUp(200);	
		}
		
	});
	// Slide toggle bars
	$('.gallery h3').click(function(e){
		//$('.albumscontainer').slideToggle(200);
	});

});