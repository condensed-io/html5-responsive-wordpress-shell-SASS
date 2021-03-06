<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://ogp.me/ns#">

<head>

	<meta charset="<?php bloginfo( 'charset' ); // lets you change the charset from within wp, defaults to UTF8 ?>" />

	<!--Forces latest IE rendering engine & chrome frame-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php wp_title(''); ?></title>

    <!--SEO meta by Yoast plugin, don't add your own-->

	<!-- favicon & other link Tags -->
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<!--link rel="apple-touch-icon" href="/images/custom_icon.png"/--><!-- 114x114 icon for iphones and ipads -->
	<link rel="copyright" href="#copyright" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--ADD GOOGLE FONTS HERE-->

	<!-- BEGIN: IE Specific Hacks -->
	<!--[if IE 9]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/ie9.css" media="screen" /><![endif]-->
	<!--[if IE 8]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/ie8.css" media="screen" /><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/ie7.css" media="screen" /><![endif]-->
	<!--END: IE Specific Hacks-->

    <!--makes things responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<?php wp_head(); // wp_head hook for Plugins ~ always keep this just before the /head tag ?>

</head>

<body <?php body_class(); // we add to the body classes with a function in functions.php ?>>


<div class="hide"><?php include_once('img/sprite/symbol/svg/sprite.symbol.svg'); //loads the SVG sprite ?></div>

<!--[if lt IE 9]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

	<!--BEGIN: Site Header -->
	<header class="site-header" role="banner">
		<h1 class="site-title"><?php if(!is_front_page() || !is_home()) { wp_title(''); echo " :: "; } ?><a href="/"><?php bloginfo('name'); ?></a></h1>
		
	<!--MAIN NAV: Activate the menu system by going into wpadmin / appearance / menus / and adding a menu named mainNav-->
	<!--To make the menu vertical instead of horizontal remove the menu_class of horiz-list-->
	<nav class="nav-main" role="navigation">
		<h1 class="access-hide">Main Navigation</h1>
		<?php wp_nav_menu(array('menu' => 'mainNav', 'menu_class' => 'horiz-list')); // create the mainNav menu inside Appearance menus and go to town -- for more on menus see: http://templatic.com/news/wordpress-3-0-menu-management ?>
	</nav>
	
	</header>
	<!--END: Site Header-->


