// mYm Functions v 1.5 - brent@mimoymima.com
// last edited: Nov 27, 2011


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

//  // site preloader -- also uncomment the div in the header and the css style for #preloader
//  $(window).load(function(){
//  	$('#preloader').fadeOut('slow',function(){$(this).remove();});
//  });
	
// //-----Select Linker -- To use, add the class LinkSelect to your form -- by mimoYmima.com
// 	$('.link-select select').change(function(){ 
// 		var LinkTo = $('.link-select select').val();
// 		top.location.href = LinkTo;
// 	});

//-----Show and Hide Stuff
	$(".toggle")
		.addClass('make-link') // make headings look like links
		.addClass('header-hidden')
		.click(function(){
	        var $this = $(this);
	        if( $this.is('.header-shown') ) {
	                $this.next().slideToggle('normal');
	                $this.removeClass('header-shown');
	                $this.addClass('header-hidden');
	        }
	        else {
	                $this.next().slideToggle('normal');
	                $this.removeClass('header-hidden');
	                $this.addClass('header-shown');
	        }
	        return false;
	});


//-----Make a link with the class of popup open in a new window
	$('.popup').attr('target', '_blank');


	
});//<--- this is the end of the document ready function don't delete it

