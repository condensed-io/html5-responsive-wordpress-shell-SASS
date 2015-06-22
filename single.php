<?php get_header(); ?>

<div class="content-main clear-fix" role="main">
	
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<!--BEGIN: Single Post-->
	<article <?php post_class('clear-fix row'); ?>>
				
		<header>
			<h1><?php the_title(); ?></h1>	
			<time class="meta" datetime="<?php the_time('c'); ?>" pubdate="pubdate"><?php the_time('F jS, Y'); ?></time>
			<p class="meta">by <?php the_author(); ?></p>
		</header>
		
		<div class="entry">
			<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
			<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
		</div>
		
		<!--BEGIN: Post Meta Data-->
		<footer class="post-meta-data">
			<p><?php the_tags('Tags: ', ', ', '<br />'); ?></p>
		</footer>
		<!--END: Post Meta Data-->
		
		<!--BEGIN: Comments-->
		<?php comments_template( '', true ); ?>
		<!--END: Comments-->
			
	</article>
	<!--END: Single Post-->

	<?php wp_link_pages(); //this allows for multi-page posts ?>

<?php endwhile; ?>

<?php else: //ERROR: Nothing Found ?>

	<h2>No posts were found :(</h2>
	
<?php endif; //END: The Loop ?>
		
</div>
<!--END: Content-->

<aside class="sidebar-main">
	<?php dynamic_sidebar('sidebar-main'); ?>
</aside>

<?php get_footer(); ?>