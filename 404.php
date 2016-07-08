<?php get_header(); ?>

<!--Put your sidebars in wherever necessary-->

<!--BEGIN: Content-->
<div class="content-main row" role="main">

		<h1>Keep Searching</h1>
	
		<p>This URL doesn't bring up a web page on our site, if you think there's an error, please <a href="/contact/">tell us about it.</a></p>
	
		<h2>Or Choose A Popular Topic</h2>
		<p><?php wp_tag_cloud(''); ?> </p>

</div>
<!--END: Content-->
	
<?php get_footer(); ?>