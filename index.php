<?php get_header(); ?>

<!--BEGIN: sidebar~main-->
<?php // to disable this sidebar on a page by page basis just add a custom field to your page or post of disableSidebar = true
$disableSidebar = get_post_meta($post->ID, 'disableSidebar', $single = true);
if ($disableSidebar !== 'true'): ?>

<aside class="sidebar-main">
	<h1>Main Sidebar</h1>
	<?php dynamic_sidebar('sidebar-main'); ?>
</aside>

<?php endif; ?>
<!--END: sidebar~main-->

<!--BEGIN: content div-->
<section class="main-content clear-fix" role="main">

	<h1 class="access-hide">Latest Posts</h1>
	
	<?php if (have_posts()) : // BEGIN THE LOOP ?>

		<?php while (have_posts()) : the_post(); //LOOPING through all the posts, we split onto two lines for clean indentation ?>

			<article <?php post_class('clear-fix'); ?>>
				
				<h1><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
			
			</article>

		<?php wp_link_pages(); //this allows for multi-page posts ?>
				
		<?php endwhile; //END: looping through all the posts ?>

			<!--BEGIN: Page Nav-->
			<?php if ( $wp_query->max_num_pages > 1 ) : // if there's more than one page turn on pagination ?>
				<nav class="page-nav">
		        	<h1 class="hide">Page Navigation</h1>
			        <ul class="clear-fix">
				        <li class="next-link"><?php next_posts_link('Next Page') ?></li>
				        <li class="prev-link"><?php previous_posts_link('Previous Page') ?></li>
			        </ul>
		        </nav>
			<?php endif; ?>
			<!--END: Page Nav-->
			
	<?php else : ?>

		<h2>No posts were found :(</h2>

	<?php endif; //END: The Loop ?>
	
</section>
<!--END: content div-->

<?php get_footer(); ?>