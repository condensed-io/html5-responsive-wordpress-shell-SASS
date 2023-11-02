<!doctype html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); // lets you change the charset from within wp, defaults to UTF8 ?>" />

	<title><?php wp_title(''); ?></title>

    <!--SEO meta by Yoast plugin, don't add your own-->

	<!--link rel="apple-touch-icon" href="/images/custom_icon.png"/--><!-- 114x114 icon for iphones and ipads -->
	<link rel="copyright" href="#copyright" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--ADD GOOGLE FONTS HERE-->

	<meta name="viewport" content="width=device-width, initial-scale=1"><!--makes things responsive-->
	<?php wp_head(); // wp_head hook for Plugins ~ always keep this just before the /head tag ?>

</head>

<body <?php body_class(); // we add to the body classes with a function in functions.php ?>>

<div class="hide"><?php // include_once('img/svgsprite.svg'); // if you haver icons, load the SVG sprite -- https://medium.com/@hayavuk/complete-guide-to-svg-sprites-7e202e215d34 ?></div>

<!--[if lt IE 9]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

	<!--BEGIN: Site Header -->
	<header id="masthead" class="site-header">
		<h1 class="site-title"><?php if(!is_front_page() || !is_home()) { wp_title(''); echo " :: "; } ?><a href="/"><?php bloginfo('name'); ?></a></h1>
		
	<!--MAIN NAV: Activate the menu system by going into wpadmin / appearance / menus / and adding a menu named mainNav-->
	<!--NOTE: To make the menu vertical instead of horizontal remove the menu_class of horiz-list-->
	<nav class="nav-main">
		<?php wp_nav_menu(
			array(
				'menu' => 'mainNav',
				'menu_class' => 'horiz-list'
			)
			); // create the mainNav menu inside the wordpress admion in 'Appearance' and go to town ?>
	</nav>
	
	</header>
	<!--END: Site Header-->


