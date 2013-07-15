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

<!--BEGIN: Content-->
<div class="content-main" role="main">
	
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); //BEGIN: The Loop ?>

			<!--BEGIN: Post-->
			<article <?php post_class() ?>>
				
				<header>
					<h1><?php the_title(); ?></h1>
					<time datetime="<?php the_time('c'); ?>" pubdate="pubdate"><?php the_time('F jS, Y'); ?></time>
					<p>by <?php the_author() ?></p>
				</header>
				
				<div class="entry">
					<?php the_content("Continue reading " . the_title('', '', false)); ?>
				</div>
						
			</article>
			<!--END: Post-->

			<?php wp_link_pages(); //this allows for multi-page posts ?>

		<?php endwhile; ?>		
			
		<?php else : ?>

			<h2>No posts were found :(</h2>

	<?php endif; //END: The Loop ?>

			<!--BEGIN: Page Nav-->
				<nav id="page-nav">
		        	<h1 class="hide">Page Navigation</h1>
			        <ul class="clear-fix">
				        <li class="next-link"><?php next_post_link('%link', 'Next Blog Post', TRUE); ?></li>
				        <li class="prev-link"> <?php previous_post_link('%link', 'Previous Blog Post', TRUE); ?></li>
			        </ul>
		        </nav>
			<!--END: Page Nav-->


</div>
<!--END: Content-->

<?php get_footer(); ?>