// JavaScript Document
var current_gallery_page=0;
var mouse_is_inside=true;
var PetalActualNo=0
function randomString() {
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	var string_length = 20;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}
	return randomstring;
}

function load_html( target, url){
	var content;
	$(target).append("<div id='loader'><div class='loadericon'></div> Cargando...</div>");
	$.get(url, function(data){
		$(target).html("");
		$(target).html(data);
		$(target).slideDown(600);
	});
}
function is_int(value){ 
  if((parseFloat(value) == parseInt(value)) && !isNaN(value)){
      return true;
  } else { 
      return false;
  } 
}
function updateTips( t, type ) {
	tips = $( ".validateTips" );
	if(type){
		tips.removeClass( "ui-state-error" );
		tips.addClass( "ui-state-highlight" );
		t='<span style="position:absolute;margin-top:5px;" class="ui-icon ui-icon-alert"></span>'+t;
	}else{
		tips.removeClass( "ui-state-highlight" );
		tips.addClass( "ui-state-error" );
		t='<span style="position:absolute;margin-top:5px;" class="ui-icon ui-icon-info"></span>'+t;
	}
	tips.html( t ).fadeIn(100);setTimeout(function() {tips.fadeOut(1500 );	}, 2000 );
}

function checkLength( o, m, min, max ) {
	if ( o.val().length > max || o.val().length < min ) {
		o.addClass( "ui-state-error" );
//		updateTips( "Length of " + n + " must be between " + min + " and " + max + ".",0 );
		updateTips( m,0 );
		return false;
	} else {
		return true;
	}
}

function checkRegexp( o, regexp, n ) {
	if ( !( regexp.test( o.val() ) ) ) {
		o.addClass( "ui-state-error" );
		updateTips( n,0);
		return false;
	} else {
		return true;
	}
}

String.parseJSON  = (function (s) {

  var m = {
    '\b': '\\b',
    '\t': '\\t',
    '\n': '\\n',
    '\f': '\\f',
    '\r': '\\r',
    '"' : '\\"',
    '\\': '\\\\'
  };

  s.parseJSON = function (filter) {
     /*
           Reason: Why this function is useful?
     */
    // Parsing happens in three stages. In the first stage, we run the text against
    // a regular expression which looks for non-JSON characters. We are especially
    // concerned with '()' and 'new' because they can cause invocation, and '='
    // because it can cause mutation. But just to be safe, we will reject all
    // unexpected characters.

    try {
      if (/^("(\\.|[^"\\\n\r])*?"|[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t])+?$/.test(this)) {

          // In the second stage we use the eval function to compile the text into a
          // JavaScript structure. The '{' operator is subject to a syntactic ambiguity
          // in JavaScript: it can begin a block or an object literal. We wrap the text
          // in parens to eliminate the ambiguity.

          var j = eval('(' + this + ')');

          // In the optional third stage, we recursively walk the new structure, passing
          // each name/value pair to a filter function for possible transformation.

          if (typeof filter === 'function') {

            function walk(k, v) {
              if (v && typeof v === 'object') {
                for (var i in v) {
                  if (v.hasOwnProperty(i)) {
                    v[i] = walk(i, v[i]);
                  }
                }
              }
              return filter(k, v);
            }

            j = walk('', j);
          }
          return j;
        }
      } catch (e) {

  // Fall through if the regexp test fails.

      }
      throw new SyntaxError("parseJSON: filter failed");
    };
  }
) (String.prototype);
// End public domain parseJSON block

function SyntaxError(e)
{
 alert(e);
}
function explode (delimiter, string, limit) {
    // http://kevin.vanzonneveld.net
    // +     original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +     improved by: kenneth
    // +     improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +     improved by: d3x
    // +     bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // *     example 1: explode(' ', 'Kevin van Zonneveld');
    // *     returns 1: {0: 'Kevin', 1: 'van', 2: 'Zonneveld'}
    // *     example 2: explode('=', 'a=bc=d', 2);
    // *     returns 2: ['a', 'bc=d']
    var emptyArray = {
        0: ''
    };

    // third argument is not required
    if (arguments.length < 2 || typeof arguments[0] == 'undefined' || typeof arguments[1] == 'undefined') {
        return null;
    }

    if (delimiter === '' || delimiter === false || delimiter === null) {
        return false;
    }

    if (typeof delimiter == 'function' || typeof delimiter == 'object' || typeof string == 'function' || typeof string == 'object') {
        return emptyArray;
    }

    if (delimiter === true) {
        delimiter = '1';
    }

    if (!limit) {
        return string.toString().split(delimiter.toString());
    }
    // support for limit argument
    var splitted = string.toString().split(delimiter.toString());
    var partA = splitted.splice(0, limit - 1);
    var partB = splitted.join(delimiter.toString());
    partA.push(partB);
    return partA;
}
function equalHeight(group) {
	var tallest = 0;
	group.each(function() {
		var thisHeight = $(this).height();
		if(thisHeight > tallest) {
			tallest = thisHeight;
		}
	});
	group.height(tallest);
}
function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    } 
}
(function($) {

	$.fn.charCount = function(options){
	  
		// default configuration properties
		var defaults = {	
			allowed: 140,		
			warning: 25,
			css: 'counter',
			counterElement: 'span',
			cssWarning: 'warning',
			cssExceeded: 'exceeded',
			counterText: ''
		}; 
			
		var options = $.extend(defaults, options); 
		
		function calculate(obj){
			var count = $(obj).val().length;
			var available = options.allowed - count;
			if(available <= options.warning && available >= 0){
				$(obj).next().addClass(options.cssWarning);
			} else {
				$(obj).next().removeClass(options.cssWarning);
			}
			if(available < 0){
				$(obj).next().addClass(options.cssExceeded);
			} else {
				$(obj).next().removeClass(options.cssExceeded);
			}
			$(obj).next().html(options.counterText + available);
		};
				
		this.each(function() {  			
			$(this).after('<'+ options.counterElement +' class="' + options.css + '">'+ options.counterText +'</'+ options.counterElement +'>');
			calculate(this);
			$(this).keyup(function(){calculate(this)});
			$(this).change(function(){calculate(this)});
		});
	  
	};

})(jQuery);
$.fn.focusNextTextareaField = function() {
    return this.each(function() {
        var fields = $(this).parents('form:eq(0),body').find('textarea');
        var index = fields.index( this );
        if ( index > -1 && ( index + 1 ) < fields.length ) {
            fields.eq( index + 1 ).focus();
        }
        return false;
    });
};
$(document).ready(function(e){
	//TOOLBAR ICONS
	$.watermarker.setDefaults({ color: '#ccc'});
	$('#login_form input').watermark();
	
	$('.tiptip').tipTip();
	
	//MAIN MENU ICON ANIMATION
	$('#mainmenu .icon').hover(function(e){
	//	if (!$(this).hasClass('selected')){
			$(this).stop().animate({ 'margin-left': '5px'},100);
	//	}
	},function(e){
		$(this).animate({ 'margin-left': '0px'});
	});
	$("a.post").fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	300, 
			'speedOut'		:	200, 
			'overlayShow'	:	true,
			'width'			: 400,
			'height'		: 500, 
			'overlayColor'	: '#000',
			'bgColor': '#000'
		});
	
	// Notifications
	
	$('div#notifications').hover(function(e){
		$(this).parent().find('#notificationlist').slideToggle(100);
	});
	//Accept Friendship
	$('button.accept').click(function(e){
		userfrom = $(this).parent().parent().find('input#userfrom').val();
		userto = $(this).parent().parent().find('input#userto').val();
		
		$.post(BACKEND_URL+'members/addfriend.php', { user_to: userto, user_from: userfrom},function(data){
		
		});
		// NOTE: Cant figure out how to acces it in the $.post success function
		$(this).parent().parent().remove();
		nomessages = $('nomessages').html();
		$('nomessages').html(nomessages-1);
	});
	//DELETE FRIEND
	$('button.deletefriend').click(function(e){
		user_id = $(this).parent().find('input#user_id').val();

		$.post(BACKEND_URL+'members/deletefriend.php', { user_id: user_id},function(data){
		});
		// NOTE: Cant figure out how to acces it in the $.post success function
		$(this).remove();
		
	});
	$("abbr.timeago").livequery(function () { $(this).timeago(); });
	width = $(window).width()-200;
	$('a.pic').fancybox({
		'padding'		: 0,
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	300, 
		'speedOut'		:	200, 
		'overlayShow'	:	true,
		'width'			: width,
		'height'		: 900, 
		'overlayColor'	: '#000',
		'bgColor': '#000',
	});
	$("a.profilepic").fancybox({
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