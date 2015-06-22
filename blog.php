<?php
/*
Template Name: blog-template
*/

// Simple blog page template 

?>

<?php get_header(); ?>

<!--BEGIN: Default Content Section-->
<div class="blog-listing white-area clear-fix" role="main">

	<h1 class="access-hide">Latest Posts</h1>

	<?php query_posts( array( 'posts_per_page' => 5 ) ); ?>

	<?php if(have_posts()): while(have_posts()): the_post(); ?>

	<article <?php post_class('clear-fix'); ?>>
		<?php the_post_thumbnail('full', array('class' => 'aligncenter')); ?>
		<div class="blog-content row">
			<h1 class="post-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<h2><?php the_time('F j, Y'); ?></h2>
			<p><?php the_excerpt(); ?></p>
			<p><a href="<?php the_permalink(); ?>">Read More</a></p>
		</div>
	</article>

	<?php endwhile; endif; ?>

	<?php // we use the pagenavi plugin for pagination, there's a check here so if it doesn't exist it won't cuase an error
		if(function_exists('wp_pagenavi')) :
		wp_pagenavi();
		wp_reset_postdata(); // avoid errors further down the page
		endif;
	?>

</div>
<!--END: Default Layout-->

<!--BEGIN: Sidebar Main-->
<aside class="sidebar-main">
	<?php dynamic_sidebar('sidebar-main'); ?>
</aside>
<!--END: Sidebar Main-->

<?php get_footer(); ?>


