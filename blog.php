<?php
/*
Template Name: blog-template
*/

// Simple blog page template 

?>

<?php get_header(); ?>

<!--BEGIN: Default Content Section-->
<div class="white-area clear-fix" role="main">
	<div class="row">

		<h1 class="access-hide">Latest Posts</h1>

		<?php query_posts( array( 'posts_per_page' => 5 ) ); ?>

		<?php if(have_posts()): while(have_posts()): the_post(); ?>

		<article <?php post_class('clear-fix'); ?>>
			<?php the_date('Y-m-d', '<h2>', '</h2>'); ?>
			<h1 class="post-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php the_post_thumbnail('large', array('class' => 'aligncenter')); ?>
			<div class="content"><?php the_excerpt(); ?></div>
			<a href="<?php the_permalink(); ?>">Read More</a>
		</article>

		<?php endwhile; endif; ?>

		<?php // we use the pagenavi plugin for pagination, there's a check here so if it doesn't exist it won't cuase an error
			if(function_exists('wp_pagenavi')) :
			wp_pagenavi();
			wp_reset_postdata(); // avoid errors further down the page
			endif;
		?>

	</div>	
</div>
<!--END: Default Layout-->

<!--BEGIN: Sidebar Main-->
<aside class="sidebar-main">
	<h1>Main Sidebar</h1>
	<?php dynamic_sidebar('sidebar-main'); ?>
</aside>
<!--END: Sidebar Main-->

<?php get_footer(); ?>


