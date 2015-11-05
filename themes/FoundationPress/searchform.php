<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

//do_action( 'foundationpress_before_searchform' ); ?>

<div class="row page-title">
  <h1 class="strike"><span><?php echo qtranxf_getLanguage() === "zh" ? "Chinese text SEARCH FOR PROJECTS HERE" : "SEARCH FOR PROJECTS HERE" ; ?></span></h1>
</div>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="row collapse">
		<?php do_action( 'foundationpress_searchform_top' ); ?>
		<div class="small-8 columns">
			<?php if (qtranxf_getLanguage() === "zh") { ?>
				<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e( '在此输入搜索词', 'foundationpress' ); ?>">
			<?php } else { ?>
				<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Enter search terms here', 'foundationpress' ); ?>">
			<?php } ?>
		</div>
		<?php do_action( 'foundationpress_searchform_before_search_button' ); ?>
		<div class="small-4 columns">
			<?php if (qtranxf_getLanguage() === "zh") { ?>
				<input type="submit" id="searchsubmit" value="<?php esc_attr_e( '搜索', 'foundationpress' ); ?>" class="prefix button">
			<?php } else { ?>
				<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>" class="prefix button">
			<?php } ?>
		</div>
		<?php do_action( 'foundationpress_searchform_after_search_button' ); ?>
	</div>
</form>
<?php do_action( 'foundationpress_after_searchform' ); ?>