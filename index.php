<?php get_header(); ?>

<!--BEGIN: Default Layout-->
<div class="white-section clear-fix" role="main">
	
	<?php if (have_posts()) : // BEGIN THE LOOP ?>

		<?php while (have_posts()) : the_post(); //LOOPING through all the posts, we split onto two lines for clean indentation ?>

			<article class="row" <?php post_class('clear-fix'); ?>> <!--the row class adds the gutter for the content, you can add it to other containers that you want to pad consistantly -->

				<header>
					<h1><?php the_title(); ?></h1>
					<time datetime="<?php the_time('c'); ?>" pubdate="pubdate"><?php the_time('F jS, Y'); ?></time>
					<p>by <?php the_author() ?></p>
				</header>
				
				<div class="entry">
					<?php the_content(); ?>
				</div>
							
				<footer class="post-meta-data">
					<ul class="no-bullet">
						<li class="add-comment"><?php comments_popup_link('Share your comments', '1 Comment', '% Comments'); ?></li>
						<li>Posted in <?php the_category(', ') ?></li>
						<li><?php edit_post_link('[Edit]', '<small>', '</small>'); ?></li>
						<li><?php the_tags('Tags: ', ', ', '<br />'); ?></li>
					</ul>
				</footer>
			
			</article>

		<?php wp_link_pages(); //this allows for multi-page posts ?>
				
		<?php endwhile; //END: looping through all the posts ?>

			<!--BEGIN: Page Nav  ~  if there's a prob with this try moving it out fo the loop -->
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
	
</div>
<!--END: Default Layout-->

<!--BEGIN: Sidebar Main-->
<aside class="sidebar-main">
	<h1>Main Sidebar</h1>
	<?php dynamic_sidebar('sidebar-main'); ?>
</aside>
<!--END: Sidebar Main-->

<?php get_footer(); ?>