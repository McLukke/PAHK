<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<div class="fixed">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area top-bar-<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>">
            <li class="name">
                <a href="<?php echo home_url(); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-pahk-transparent.png"></a>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
            <?php foundationpress_top_bar_l(); ?>
            <?php foundationpress_top_bar_r(); ?>
            <ul class="right">
                <li><a class="font-art" href="<?php echo get_home_url()."/about" ?>">About</a></li>
                <li><a href="<?php echo get_home_url()."/corporates" ?>">For Corporates</a></li>
                <li><a href="<?php echo get_home_url()."/artists" ?>">For Artists</a></li>
                <li><a href="<?php echo get_home_url()."/projects" ?>">Projects</a></li>
                <li><a href="<?php echo get_home_url()."/support" ?>">Join & Support</a></li>
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
        </section>
    </nav>
</div>
