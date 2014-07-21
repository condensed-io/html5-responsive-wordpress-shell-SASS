<?php $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--NOTE: you can't use includes in a 503 document so put your header and footer content in here manually-->

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title><?php bloginfo('name'); ?></title>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
	<!--Forces latest IE rendering engine & chrome frame-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<link rel="copyright" href="#copyright" /> 
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />  
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

	<script type="text/JavaScript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/JavaScript" src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.js"></script>

	<!-- add your 503 (maintenance or coming soon page) styles here -->
	
	<style>

		/* Eric Meyer's Reset CSS v2.0 (http://meyerweb.com/eric/tools/css/reset/) -- http://cssreset.com */ html, body, div, span, applet, object, iframe,h1, h2, h3, h4, h5, h6, p, blockquote, pre,a, abbr, acronym, address, big, cite, code,del, dfn, em, img, ins, kbd, q, s, samp,small, strike, strong, sub, sup, tt, var,b, u, i, center,dl, dt, dd, ol, ul, li,fieldset, form, label, legend,table, caption, tbody, tfoot, thead, tr, th, td,article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary,time, mark, audio, video {	margin: 0;	padding: 0;	border: 0;	font-size: 100%; font: inherit;	vertical-align: baseline; } /* HTML5 display-role reset for older browsers */ article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {	display: block; } body { line-height: 1; } ol, ul { list-style: none; } blockquote, q { quotes: none;}blockquote:before, blockquote:after,q:before, q:after { content: ''; content: none;} table { border-collapse: collapse; border-spacing: 0; }

		html { background: #E0BB2B; color: #333; }
		body { background: #E0BB2B; text-align: center; font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; font-weight: 300; }
		
		/* apply a natural box layout model to all elements - http://paulirish.com/2012/box-sizing-border-box-ftw/ */
		* { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; }
		
		h1 { position: absolute; left: -999em; }

		.content { letter-spacing: .1em; }

		/* size the image */
		.abs-center { max-width: 60%; }

		/* format the address */
		.company-address { position: absolute; bottom: 1em; right: 0; font-size: .8em; }
		.company-address dt, .company-address dd { display: inline-block; margin: 0 1em; }
		.company-address dt:before { content: "\00a9 \0000a0"; }
		.company-address .locality:after { content: ","; }


	</style>



</head>

<body>

	<!--BEGIN: Content -->
	<div class="content-main clear-fix" role="main">

		<!-- coming soon image ~ should be roughly 1000px wide ** don't put the width in the image tag below ** -->
		put your coming soon image here

	</div>
	<!--END: Content-->

</body>

<script>

	// DOCUMENT READY FUNCTION: uses noConflict to work with other libraries
	jQuery(document).ready(function($) {	


	// function to center something in the browser window vertically and horizontally

	jQuery.fn.center = function () {
	    this.css("position","absolute");
	    this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
	    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
	    return this;
	}		 

	// fire it on load
	$(window).load(function() {
			$('.abs-center').center();
	});

	// fire it on resize
	$(window).resize(function() {
			$('.abs-center').center();
	});
	

	});//<--- this is the end of the document ready function don't delete it

</script>

</html>