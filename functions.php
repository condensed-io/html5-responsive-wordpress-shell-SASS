<?php


//// BEGIN: if you are logged into the admin area, show what template someone is using on the top of all pages
   if (is_user_logged_in()) { add_action('wp_footer', 'show_template'); }
   function show_template() {
       global $template;
       print_r($template);
   }


// ::: UTILITY FUNCTIONS :::::::::::::::::::::::::::::::::::::::::::::

    // Gets the URL of the featured image to use as a background
    function getFeaturedURL() {
        $post_image_id = get_post_thumbnail_id($post_to_use->ID);
        if ($post_image_id) {
            $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
            if ($thumbnail) (string)$thumbnail = $thumbnail[0];
        }
        echo $thumbnail;
    }

    // Used to create custom length excerpts
    function get_the_custom_excerpt($length){
        return substr( get_the_excerpt(), 0, strrpos( substr( get_the_excerpt(), 0, $length), ' ' ) ).'...';
    }


    // Function used to see if you are in a post type
    function is_post_type($type){
        global $wp_query;
        if($type == get_post_type($wp_query->post->ID)) return true;
        return false;
    }


// ::: TWEAK SOME WORDPRESS DEFAULTS :::::::::::::::::::::::::::::::::

    // ** For Responsive images and thumbnails, removes the width and height from the markup
    add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
    add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

    function remove_width_attribute( $html ) {
       $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
       return $html;
    }

    // ** Removes tags generated in the WordPress Head that we don't use, you could read up and re-enable them if you think they're needed
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');

    // ** Makes it so you can upload svgs through the Wordpress Uploader - http://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader/
    function cc_mime_types( $mimes ){
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter( 'upload_mimes', 'cc_mime_types' );

    // ** Improves the body_class function
    function condensed_body_class($classes) {
        global $post;

        // add a class for the name of the page - later might want to remove the auto generated pageid class which isn't very useful
        if( is_page()) {
            $pn = $post->post_name;
            $classes[] = "page_".$pn;
        }

        // add a class for the parent page name
        if ( is_page() && $post->post_parent ) {
            $post_parent = get_post($post->post_parent);
            $parentSlug = $post_parent->post_name;
            $classes[] = "parent_".$parentSlug;
        }

        // add class for the name of the custom template used (if any)
        $temp = get_page_template();
        if ( $temp != null ) {
            $path = pathinfo($temp);
            $tmp = $path['filename'] . "." . $path['extension'];
            $tn= str_replace(".php", "", $tmp);
            $classes[] = "template_".$tn;
        }

        return $classes;

    }

    add_filter('body_class', 'condensed_body_class');


    // ** Removes the automatic paragraph tags from the excerpt, we leave it on for the content and have a custom field you can use to turn it off on a page by page basis --> wpautop = false
        remove_filter('the_excerpt', 'wpautop');

/* ::: LOAD SCRIPTS ::::::::::::::::::::::::::::::::: */

    // ** Detect if page is the login page
    function is_login_page() {
        return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
    }


    // Enqueue css -- http://code.tutsplus.com/tutorials/loading-css-into-wordpress-the-right-way--cms-20402
    // Auto cache busting: https://markjaquith.wordpress.com/2009/05/04/force-css-changes-to-go-live-immediately/
    if ( !is_admin() && !is_login_page() ) {

        wp_enqueue_style(
           // handle name
           'theme-styles', 
           // the URI of the stylesheet
           get_stylesheet_directory_uri() . '/style.css', 
           // an array of dependent styles
           null, 
           // dynamic version number. returns file modification time. e.g. ?ver=5546165464654
           filemtime(get_stylesheet_directory() . '/style.css'), 
           // CSS media type
           'screen' 
       );
    }

    function load_my_scripts_yo() {
        if ( !is_admin() && !is_login_page() ) {
            // jQuery
            // To use our local copy (if you don't have an internet connection and you're developing locally) you can uncomment these two lines
                //wp_deregister_script( 'jquery' ); // de-register the default wordpress version of jquery if you are using your own local version
                //wp_register_script( 'jquery', '/wp-includes/js/jquery/jquery.js',null,null,true);
                wp_enqueue_script( 'jquery' );

            // functions
                wp_register_script( 'functions', get_template_directory_uri().'/js/functions.js', array('jquery'),'1.1', true); // version number is for cache busting, true loads this script in the footer
                wp_enqueue_script( 'functions' );

            // modernizr
                wp_register_script( 'modernizr', get_template_directory_uri().'/js/modernizr.custom.js',null,null,false); // keep the last argument as false which loads modernizr in the head
                wp_enqueue_script( 'modernizr' );
        }
    }
    add_action('wp_enqueue_scripts', 'load_my_scripts_yo');




/* ::: ADD THEME SUPPORT ::::::::::::::::::::::::::::::::: */

    if (function_exists('add_theme_support')) {

        // Activates menu features
        add_theme_support('menus');

        // Activates Featured Image functions
        add_theme_support( 'post-thumbnails' );

    }



/* ::: UTILITY ::::::::::::::::::::::::::::::::: */

    // ** CONDITIONAL FUNCTION to determine if a page is a child of another page
    // call it like this: if(tree()=="myPageSlug1"){ echo "Hello World"; }
    function tree(){
      $class = '';
      if( is_page() ) {
      global $post;
          /* Get an array of Ancestors and Parents if they exist */
      $parents = get_post_ancestors( $post->ID );
          /* Get the top Level page->ID count base 1, array base 0 so -1 */
      $id = ($parents) ? $parents[count($parents)-1]: $post->ID;
         /* Get the parent and set the $class with the page slug (post_name) */
      $parent = get_page( $id );
      $class = $parent->post_name;
    }
    return $class;
    }

    // This function is used to get the slug of the page
    function get_the_slug() {
        global $post;
        if ( is_single() || is_page() ) {
            return $post->post_name;
        } else {
            return "";
        }
    }



// REGISTER SIDEBARS - changing the default output from lists to divs

    if ( function_exists('register_sidebar') )

    register_sidebar(array(
        'id' => 'sidebar-main',
        'name' => 'Sidebar: Main',
        'description' => 'The main content sidebar.',
        'before_widget' => '<div class="%1$s widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

    // // if you want to add more just keep adding them like this:
    // register_sidebar(array(
    //     'id' => 'sidebar-footer',
    //     'name' => 'Sidebar: Footer',
    //     'description' => 'Footer sidebar.',
    //     'before_widget' => '<div class="%1$s widget %2$s">',
    //     'after_widget' => '</div>',
    //     'before_title' => '<h4 class="widgettitle">',
    //     'after_title' => '</h4>',
    // ));


// Adds meta box for disableSidebar (according to http://www.mimoymima.com/2010/03/lab/disable-sidebar/)
//require_once('includes/sidebar_metabox.php');

// To REMOVE unused dashboard widgets you can uncomment the next line and customize /includes/remove.php
// require_once('includes/remove.php');


?>