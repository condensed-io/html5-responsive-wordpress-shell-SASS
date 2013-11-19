// mYm Functions v 2 - brent@mimoymima.com
// last edited: Nov 10, 2013


// fix for ipad resizing content on orientation change -- updated version of jeremy keith's fix
// useful for making responsive sites, if your site isn't responsive you can remove this bit of code
(function(doc) {

	var addEvent = 'addEventListener',
	type = 'gesturestart',
	qsa = 'querySelectorAll',
	scales = [1, 1],
	meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];

	function fix() {
		meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
		doc.removeEventListener(type, fix, true);
	}

	if ((meta = meta[meta.length - 1]) && addEvent in doc) {
		fix();
		scales = [0.25, 1.6];
		doc[addEvent](type, fix, true);
	}

}(document));


// DOCUMENT READY FUNCTION: uses noConflict to work with other libraries
jQuery(document).ready(function($) {



/* ::: SHOW AND HIDE ::::::::::::::::::::::::::::::::: */

	$(".toggle")
		.addClass('make-link') // make headings look like links
		.addClass('header-hidden')
		.click(function(){
			var $this = $(this);
			if( $this.is('.header-shown') ) {
				$this.next().slideToggle('normal');
				$this.removeClass('header-shown');
				$this.addClass('header-hidden');
			} else {
				$this.next().slideToggle('normal');
				$this.removeClass('header-hidden');
				$this.addClass('header-shown');
			}
		return false;
	});



/* ::: MOBILE NAV ::::::::::::::::::::::::::::::::: */

//uncomment these lines to use//////////	$(function() {
//uncomment these lines to use//////////		var mobileBtn = $('.icon-list');
//uncomment these lines to use//////////		var menu = $('.topnav-links');
//uncomment these lines to use//////////		//unused// var menuHeight  = menu.height();
//uncomment these lines to use//////////		$(mobileBtn).on('click', function(e) {
//uncomment these lines to use//////////			e.preventDefault();
//uncomment these lines to use//////////			menu.slideToggle();
//uncomment these lines to use//////////		});
//uncomment these lines to use//////////	});
//uncomment these lines to use//////////
//uncomment these lines to use//////////	// If the browser size gets bigger than 500px make the nav visible again
//uncomment these lines to use//////////	$(window).resize(function(){
//uncomment these lines to use//////////		var w = $(window).width();
//uncomment these lines to use//////////		var menu = $('.topnav-links');
//uncomment these lines to use//////////		if(w > 900 && menu.is(':hidden')) {
//uncomment these lines to use//////////			menu.css( "display", "block" );
//uncomment these lines to use//////////		}
//uncomment these lines to use//////////	});



/* ::: STICKY NAV ::::::::::::::::::::::::::::::::: */
	
//uncomment these lines to use//////////	// Check the initial position of the sticky header
//uncomment these lines to use//////////	var stickyNavTop = $('.sticky').offset().top;
//uncomment these lines to use//////////
//uncomment these lines to use//////////    $(window).bind('scroll', function() { // try this instead: $(window).scroll(function(){
//uncomment these lines to use//////////		if ($(window).scrollTop() > stickyNavTop) {
//uncomment these lines to use//////////			$('.sticky').addClass('fixed');
//uncomment these lines to use//////////		}
//uncomment these lines to use//////////		else {
//uncomment these lines to use//////////			$('.sticky').removeClass('fixed');
//uncomment these lines to use//////////		}
//uncomment these lines to use//////////    });



/* ::: SCROLL TO ELEMENTS ::::::::::::::::::::::::::::::::: */

// L I N K //  http://andrewhenderson.me/tutorial/jquery-sticky-sidebar/
	
//uncomment these lines to use//////////	// selector for the links you want to activate
//uncomment these lines to use//////////	// the links need to have a hash that leads to an element on the page with the same ID (which is how you probably makred it up right)
//uncomment these lines to use//////////	$('.topnav-links a').click(function(){
//uncomment these lines to use//////////	
//uncomment these lines to use//////////		var el = $(this).attr('href');
//uncomment these lines to use//////////		var elWrapped = $(el);
//uncomment these lines to use//////////		
//uncomment these lines to use//////////		scrollToDiv(elWrapped,40);
//uncomment these lines to use//////////		return false;
//uncomment these lines to use//////////		
//uncomment these lines to use//////////	});
//uncomment these lines to use//////////		
//uncomment these lines to use//////////	function scrollToDiv(element,navheight){
//uncomment these lines to use//////////		
//uncomment these lines to use//////////		var offset = element.offset();
//uncomment these lines to use//////////		var offsetTop = offset.top;
//uncomment these lines to use//////////		var totalScroll = offsetTop-navheight;
//uncomment these lines to use//////////		
//uncomment these lines to use//////////		$('body,html').animate({
//uncomment these lines to use//////////		scrollTop: totalScroll
//uncomment these lines to use//////////		}, 500);
//uncomment these lines to use//////////	
//uncomment these lines to use//////////	}



/* ::: MOVE LABELS INTO INPUTS IN FORMS ::::::::::::::::::::::::::::::::: */

	// target gform fields and mailchimp fields (you can add more)
	// there's probably a better way to do this, try rewriting this script one day
	
	$('ul[id*=gform_fields] li, .mc-field-group').each(function(){

		var el = $(this),
			field = el.find('input, textarea'),
			label = el.find('label'),
			labelText = el.find('label').text();

		label.hide();
		field.attr('placeholder', labelText);

	});



/* ::: POPUP LINKS ::::::::::::::::::::::::::::::::: */
	$('.popup').attr('target', '_blank');



	
});//<--- this is the end of the document ready function don't delete it

