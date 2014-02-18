<?php

/*
Template Name: home-template
*/

// Simple home page template that doesn't need a loop for content
// Gets content from advanced custom fields plugin, there's an example of how to grab a field below

?>

<?php get_header(); ?>

<div class="light-grey-section hero">
	<div class="row">
		<img class="alignnone size-full" src="<?php the_field('big_splash_image') ?>" alt="beautiful glass doors looking out on a pool" />
		<div class="dark-grey-section">
			<h3><?php //uncomment to use advanced custom fields// the_field( "heading_under_large_image"); ?></h3>
			<p><?php //uncomment to use advanced custom fields// the_field( "text_under_large_image"); ?></p>
		</div>
	</div>
	<!--END: row-->
</div>
<!--END: Light Grey Section-->

<?php get_footer(); ?>