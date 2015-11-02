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
			<article class="credit"><h1>Web Design by <a href="http://www.mimoymima.com" title="web design brooklyn">mimoYmima.com</a></h1></article>
			<!--END: Credits-->
			
			<p class="copyright"><small>&copy; <?php echo date('Y'); ?> <?php bloginfo('name')?></small></p>

		</div>
		<!--END: Row-->

	</footer>
	<!--END: Footer Section-->

	<!--Javascript Indicator-->
	<div class="js-ind indicator"><a href="http://www.mimoymima.com/help/turning-javascript-on-and-off/" title="You don't have javascript enabled, click here to learn more.">Enable Javascript</a></div>
	<!--Javascript Indicator-->

    <!-- wp_footer hook for Plugins -->
    <?php wp_footer(); ?>
			
</body>
</html>