<?php

// BEGIN: if you are logged into the admin area, show what template someone is using on the top of all pages
//  if (is_user_logged_in()) { add_action('wp_footer', 'show_template'); }
//
//  function show_template() {
//      global $template;
//      print_r($template);
//      //global $wp_taxonomies;
//      //print_r($wp_taxonomies['sections']);
//  }

// // create a new taxonomy called 'Countries'
// function countries_init() {
//   register_taxonomy(
//     'countries',
//     'post',
//     array(
//       'label' => __('Countries'),
//       'sort' => true,
//       'args' => array('orderby' => 'term_order'),
//       'rewrite' => array('slug' => 'countries'),
//     )
//   );
// }
// add_action( 'init', 'countries_init' );


// For Responsive images and thumbnails, removes the width and height from the markup
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


// Add a 'first' and 'last' class to the first and last menu item pulled from custom menus
function add_first_and_last($output) {
    $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
    $output = substr_replace($output, 'class="last-menu-item menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
    return $output;
}
add_filter('wp_nav_menu', 'add_first_and_last');


// Removes tags generated in the WordPress Head that we don't use, you could read up and re-enable them if you think they're needed
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');


// Load jquery
// you can either load the local or google CDN version below by commenting out one or another wp_register_script line function


    function my_init_method() {
        if (!is_admin()) {

            wp_deregister_script( 'jquery' );

            // local copy of jquery
            wp_register_script( 'jquery', '/wp-includes/js/jquery/jquery.js"');

            // google CDN copy of jquery
            //wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
            
            wp_enqueue_script( 'jquery' );
        }
    } 
    add_action('init', 'my_init_method');


// Add theme support
    
if (function_exists('add_theme_support')) {
    
    // Activates menu features
    add_theme_support('menus');
    
    // Activates Featured Image functions
    add_theme_support( 'post-thumbnails' );

}

// Add to the body_class function
function condensed_body_class($classes) {
    global $post;

    // add a class for the name of the page - later might want to remove the auto generated pageid class which isn't very useful
    if( is_page()) {
        $pn = $post->post_name;
        $classes[] = "page_".$pn;
    }

    // add a class for the parent page name
    $post_parent = get_post($post->post_parent);
    $parentSlug = $post_parent->post_name;
    
    if ( is_page() && $post->post_parent ) {
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


// Removes the automatic paragraph tags from the excerpt, we leave it on for the content and have a custom field you can use to turn it off on a page by page basis --> wpautop = false
    remove_filter('the_excerpt', 'wpautop');

// Used to create custom length excerpts
function get_the_custom_excerpt($length){
    return substr( get_the_excerpt(), 0, strrpos( substr( get_the_excerpt(), 0, $length), ' ' ) ).'...';
}

// Register wigetized sidebars, changing the default output from lists to divs

    if ( function_exists('register_sidebar') )

    register_sidebar(array(
        'id' => 'sidebar-main',
        'name' => 'Sidebar: Main',
        'description' => 'The second (secondary) sidebar.',
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

// This function is used to get the slug of the page
    function get_the_slug() {
        global $post;
        if ( is_single() || is_page() ) {
            return $post->post_name;
        } else {
            return "";
        }
    }

    
// To REMOVE unused dashboard widgets you can uncomment the next line and customize /includes/remove.php
// require_once('includes/remove.php');

/*
COMMENT FUNCTIONS:
we usually use LiveFyre, Disqus, or Intense Debate for comments
also jetpack has some kind of commenting plugin that we haven't tried yet
if you're making a site that requires a totally custom comments area,
check this tutorial which has a bunch of functions to customize comments:
http://themeshaper.com/2009/07/01/wordpress-theme-comments-template-tutorial/
*/

?>