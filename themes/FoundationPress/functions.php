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

add_action("archive-projects", "list_post_details");
function list_post_details ($post_id, $class) {
  if (has_post_thumbnail( $post_id ) ) {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id($post_id) );
    $image = $image[0];
  }else{
    $image = get_bloginfo('template_directory')."/assets/images/black.png";
  } ?>

	<div class="element-item <?php echo $class; ?>" data-category="transition">
    <div><img src="<?php echo $image; ?>" /></div>
    <?php the_title('<h5>', '</h5>'); ?>
    <h6><?php echo $pods->display('display_from'); ?> - <?php echo $pods->display('display_until'); ?></h6>
    <h3 class="artist-name"><?php echo $pods->display('artist_name'); ?></h3>
  </div>

<?php } ?>
