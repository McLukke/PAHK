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
                <li><a class="font-art" href="#">About</a></li>
                <li><a href="#">For Corporates</a></li>
                <li><a href="#">For Artists</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Join & Support</a></li>
                <li><a href="#">中文</a></li>
                <li><a href="#"><img class="icon-search" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-search.png"></a></li>
            </ul>
        </section>
    </nav>
</div>
