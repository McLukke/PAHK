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
        <li><a class="font-art" href="<?php echo get_home_url()."/about"; ?>">About</a></li>
        <li><a href="<?php echo get_home_url()."/corporates"; ?>">For Corporates</a></li>
        <li><a href="<?php echo get_home_url()."/artists"; ?>">For Artists</a></li>
        <li><a href="<?php echo get_home_url()."/projects"; ?>">Projects</a></li>
        <li><a href="<?php echo get_home_url()."/support"; ?>">Join & Support</a></li>
        <?php $my_current_url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        if ( qtranxf_getLanguage() === "zh" ) { ?>
            <li><a href="<?php echo str_replace("/zh", "/en", $my_current_url ); ?>" hreflang="en" title="English">English</a></li>
        <?php } else { ?>
            <?php if ( strpos($my_current_url,'/en/') !== false ) { ?>
                <li><a href="<?php echo str_replace("/en", "/zh", $my_current_url ); ?>" hreflang="zh" title="Chinese">中文</a></li>
            <?php } else { ?>
                <li><a href="<?php echo str_replace(home_url(), home_url() . "/zh", $my_current_url ); ?>" hreflang="zh" title="Chinese">中文</a></li>
            <?php } ?>
        <?php } ?>
        <li><a href="#"><img class="icon-search" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-search.png"></a></li>
    </ul>
</aside>
