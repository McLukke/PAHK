<?php
/**
 * Template part for off canvas menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<!-- <div class="fixed"> -->
	<nav class="tab-bar">
	  <section class="<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>-small">
	    <a class="<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>-off-canvas-toggle menu-icon" href="#"><span></span></a>
	  </section>
	  <section class="middle tab-bar-section">

	    <h1 class="title">
	      <?php bloginfo( 'name' ); ?>
	    </h1>

	  </section>
	</nav>
<!-- </div> -->

<aside id="aside-bar-section" class="<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>-off-canvas-menu" aria-hidden="true">
    <?php foundationpress_mobile_off_canvas( apply_filters('filter_mobile_nav_position', 'mobile_nav_position') ); ?>
    <ul>
        <li><a class="font-art" href="#">About</a></li>
        <li><a href="#">For Corporates</a></li>
        <li><a href="#">For Artists</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Join & Support</a></li>
        <li><a href="#">中文</a></li>
        <li><a href="#"><img class="icon-search" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-search.png"></a></li>
    </ul>
</aside>
