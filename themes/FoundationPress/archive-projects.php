<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();

if ( "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] == get_home_url() || "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] == get_home_url()."/" ) {
	putRevSlider("slider1");
}

require_once('templates/list_projects.php');
// Restore original Post Data
wp_reset_postdata();
wp_reset_query();
get_footer(); ?>
