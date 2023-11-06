<?php get_header(); ?>

<!--BEGIN: sidebar~main-->

<aside class="sidebar-main">
	<h1>Main Sidebar</h1>
	<?php dynamic_sidebar('sidebar-main'); ?>
</aside>

<?php endif; ?>
<!--END: sidebar~main-->

<!--BEGIN: Content-->
<div class="content-main clear-fix" role="main">
	
	<?php if (have_posts()) : ?>
		
		<h1>Posts in <?php single_cat_title(); ?></h1>

		<?php while (have_posts()) : the_post(); ?>

			<!--BEGIN: Post-->
			<article <?php post_class() ?> class="post-<?php the_ID(); ?>">
				
				<h1 class="alt"><a href="<?php the_permalink(); ?>" rel="bookmark" title='Click to read: "<?php strip_tags(the_title()); ?>"'><?php the_title(); ?></a></h1>
				<p>by <?php the_author(); ?></p>
				<p class="post-date"><?php the_time('F jS, Y') ?> &#8212; <?php the_category(', ') ?></p>
				<p><?php the_tags('Topics Covered: ', ', ', '<br />'); ?></p>
				<p><?php the_excerpt("Continue reading &rarr;"); ?></p>

			</article>
			<!--END: Post-->
				
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
<!--END: Content-->

<?php get_footer(); ?>