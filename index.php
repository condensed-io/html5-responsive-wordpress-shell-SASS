<?php get_header(); ?>

<!--BEGIN: Default Content Section-->
<div class="clear-fix" role="main">
	
	<?php if (have_posts()) : // BEGIN THE LOOP ?>

		<?php while (have_posts()) : the_post(); //LOOPING through all the posts, we split onto two lines for clean indentation ?>

			<article <?php post_class('clear-fix'); ?>>
				
				<h1><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
			
			</article>

		<?php wp_link_pages(); //this allows for multi-page posts ?>
				
		<?php endwhile; else : ?>

		<h2>No posts were found :(</h2>

	<?php endif; //END: The Loop ?>

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