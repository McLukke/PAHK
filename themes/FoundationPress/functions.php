<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add desktop menu walker */
require_once( 'library/menu-walker.php' );

/** Add off-canvas menu walker */
require_once( 'library/offcanvas-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Add protocol relative theme assets */
require_once( 'library/protocol-relative-theme-assets.php' );

// THIS IS WHAT ALLOWS FRONT PAGE TO SHOW ARCHIVE PAGES
add_action("pre_get_posts", "custom_front_page");
function custom_front_page($wp_query){
    //Ensure this filter isn't applied to the admin area
    if(is_admin()) {
        return;
    }

    if($wp_query->get('page_id') == get_option('page_on_front')):

        $wp_query->set('post_type', 'projects');
        $wp_query->set('page_id', ''); //Empty

        //Set properties that describe the page to reflect that
        //we aren't really displaying a static page
        $wp_query->is_page = 0;
        $wp_query->is_singular = 0;
        $wp_query->is_post_type_archive = 1;
        $wp_query->is_archive = 1;

    endif;

}

function display_chinese_year ($input_year) {
    $year_array = str_split($input_year);
    $year_zh = "";
    $temp = "";
    foreach ($year_array as $number) {
        switch ($number) {
            case "0":
                $year_zh = $year_zh."零";
                break;
            case "1":
                $year_zh = $year_zh."一";
                break;
            case "2":
                $year_zh = $year_zh."二";
                break;
            case "3":
                $year_zh = $year_zh."三";
                break;
            case "4":
                $year_zh = $year_zh."四";
                break;
            case "5":
                $year_zh = $year_zh."五";
                break;
            case "6":
                $year_zh = $year_zh."六";
                break;
            case "7":
                $year_zh = $year_zh."七";
                break;
            case "8":
                $year_zh = $year_zh."八";
                break;
            case "9":
                $year_zh = $year_zh."九";
                break;
        }
    }
    return $year_zh;
}


?>