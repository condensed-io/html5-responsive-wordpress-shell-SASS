	<!--BEGIN: Footer Section-->
	<footer class="footer white-section clear-fix">

		<!--BEGIN: Row-->
		<div class="row">

			<!--BEGIN: Footer Nav-->
			<nav role="navigation">
				<h1 class="access-hide">Footer Navigation</h1>
				<?php wp_nav_menu(array('menu' => 'footerNav', 'menu_class' => 'nav-footer')); // create the footerNav menu inside Appearance menus and go to town -- for more on menus see: http://templatic.com/news/wordpress-3-0-menu-management ?>
			</nav>
			<!--END: Footer Nav-->

			<!--BEGIN: Optional Contact Info using microformats: http://microformats.org/-->
			<!--div class="vcard">
				<h1 class="org fn">OrgName or Full Name of person - remove one or the other class</h1>
				<p class="adr">
					<span class="street-address"></span><br />
					<span class="locality">City</span>, 
					<span class="region">State</span><br />
					<span class="postal-code">xxxxx</span>		
				</p>
				<p class="tel"></p>
				<p class="email"><a href="mailto:"></a></p>
				<p class="fax"></p>
			</div-->
			<!--END: Contact Info-->
			
			<!--BEGIN: Credits :: Web Design Credit -->
			<article class="credit"><h1>Web Design by <a href="http://www.mimoymima.com" title="web design brooklyn">mimoYmima.com</a></h1></article>
			<!--END: Credits-->
			
			<p class="copyright"><small>&copy; <?php echo date('Y'); ?> <?php bloginfo('name')?></small></p>
			
			<!-- wp_footer hook for Plugins -->
			<?php wp_footer(); ?>

		</div>
		<!--END: Row-->

	</footer>
	<!--END: Footer Section-->

	<!--Javascript Indicator-->
	<div class="js-ind indicator"><a href="http://www.mimoymima.com/help/turning-javascript-on-and-off/" title="You don't have javascript enabled, click here to learn more.">Enable Javascript</a></div>
	<!--Javascript Indicator-->

</body>
</html>