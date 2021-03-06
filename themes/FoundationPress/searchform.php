<div id="search-form">

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
	  <h1 class="strike"><span><?php echo qtranxf_getLanguage() === "zh" ? "Chinese text SEARCH" : "SEARCH" ; ?></span></h1>
	</div>

	<div class="row">
		<div class="card column large-11 large-centered medium-11 medium-centered small-11 small-centered">
			<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
				<div class="row collapse">

					<?php do_action( 'foundationpress_searchform_top' ); ?>

					<div class="small-11 small-centered medium-6 columns">
						<div>
						<img class="icon-search search-bar" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-search.png"></div>
						<?php if (qtranxf_getLanguage() === "zh") { ?>
							<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e( '在此输入搜索词', 'foundationpress' ); ?>">
						<?php } else { ?>
							<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Find artists and works by name.', 'foundationpress' ); ?>">
						<?php } ?>
					</div>

					<?php do_action( 'foundationpress_searchform_before_search_button' ); ?>
					
					<div class="hide">
						<?php if (qtranxf_getLanguage() === "zh") { ?>
							<input type="submit" id="searchsubmit" value="<?php esc_attr_e( '搜索', 'foundationpress' ); ?>" class="prefix button">
						<?php } else { ?>
							<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>" class="prefix button">
						<?php } ?>
					</div>
					<?php do_action( 'foundationpress_searchform_after_search_button' ); ?>

				</div>
			</form>
		</div>
	</div>

	<?php //do_action( 'foundationpress_after_searchform' ); ?>

</div>