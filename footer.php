	<!--BEGIN: Footer Section-->
	<footer class="footer white-area clear-fix">

		<!--BEGIN: Row-->
		<div class="row">

			<!--BEGIN: Footer Nav-->
			<nav role="navigation">
				<h1 class="access-hide">Footer Navigation</h1>
				<?php wp_nav_menu(array('menu' => 'footerNav', 'menu_class' => 'nav-footer horiz-list')); // create the footerNav menu inside Appearance menus and go to town -- for more on menus see: http://templatic.com/news/wordpress-3-0-menu-management ?>
			</nav>
			<!--END: Footer Nav-->
			
			<!--BEGIN: Credits :: Web Design Credit -->
			<article class="credit"><h1>Branding & Design by <a <?php if ( is_front_page() && is_home() ) : ?>rel="nofollow"<?php endif;?> href="https://condensed.io" title="branding for startups">condensed.io</a></h1></article>
			<!--END: Credits-->
			
			<p id="copyright" class="copyright"><small>&copy; <?php echo date('Y'); ?> <?php bloginfo('name')?></small></p>

		</div>
		<!--END: Row-->

	</footer>
	<!--END: Footer Section-->

    <!-- wp_footer hook for Plugins -->
    <?php wp_footer(); ?>
    
</body>
</html>