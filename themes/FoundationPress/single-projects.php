<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();

$pods = pods('projects', get_the_id() );

?>

<div id="project-detail">
	<div class="full-width">
	  <div class="inner-page-banner" style="background-image: url('<?php
	  	$thumbnail = pods_image(
	  		$pods->field('banner_image'), 'thumbnail', 0, true
			);

			echo $thumbnail;
	  ?>')">
	    <div class="inner-artwork-overview large-4 large-offset-1 medium-6 medium-offset-1 show-for-medium-up">
	      <h5><?php echo $pods->display('location'); ?></h5>
    		<h6><?php echo $pods->display('display_from'); ?> - <?php echo $pods->display('display_until'); ?></h6>
    		<h3 class="artist-name"><?php echo $pods->display('artist_name'); ?></h3>
	      <h3 class="artwork-name"><?php the_title(); ?></h3>
	    </div>
	    <div class="project-controls">
	      <span class="ui-text-overlay">Next project</span>
	      <a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>"><img class="project-controls-button" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-left.png" title="Previous project"></a>
	      <a href="#"><img class="project-controls-button" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-grid.png" title="All projects"></a>
	      <a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>"><img class="project-controls-button" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-right.png" title="Next project"></a>
	    </div>
	  </div>
	</div>

	<div class="row">
	  <div class="column large-6 medium-12">

	    <div class="row project-action-bar">
	      <div class="column large-6">
	        <a href="#" class="button cta button-single">INQUIRE</a>
	      </div>
	      <div class="column large-6">
	        <a href="#"><img class="social-icons" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-email.png"></a>
	        <a href="#"><img class="social-icons" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-facebook.png"></a>
	        <span class="ui-text">SHARE</span>
	      </div>
	    </div>

	    <div class="row project-metadata">
	      <div class="column large-12 large-offset-0 medium-8 medium-offset-2">
	        <table>
	          <tbody>
	            <tr>
	              <td class="metadata-key">Artist</td>
	              <td class="metadata-value"><?php echo $pods->display('artist_name'); ?></td>
	            </tr>
	            <tr>
	              <td class="metadata-key">On Display</td>
	              <td class="metadata-value"><?php echo $pods->display('display_from'); ?> - <?php echo $pods->display('display_until'); ?></td>
	            </tr>
	            <tr>
	              <td class="metadata-key">Materials</td>
	              <td class="metadata-value"><?php echo $pods->display('materials'); ?></td>
	            </tr>
	            <tr>
	              <td class="metadata-key">Dimensions</td>
	              <td class="metadata-value"><?php echo $pods->display('dimensions'); ?></td>
	            </tr>
	            <tr>
	              <td class="metadata-key">Location</td>
	              <td class="metadata-value"><?php echo $pods->display('location'); ?></td>
	            </tr>
	          </tbody>
	        </table>
	      </div>
	    </div>

	    <div class="row project-description">
	      <div class="column">
	        <h4>About the project</h4>
	        <span class="frame-line">_</span>
	        <p class="project-description-text">
	          <?php echo $pods->field('about_project'); ?>
	        </p>
	      </div>          
	      <div class="column">
	        <h4>About the artist</h4>
	        <span class="frame-line">_</span>
	        <p class="project-description-text">
	          <?php echo $pods->field('about_artist'); ?>
	        </p>
	      </div>
	    </div>

	    <div class="row project-metadata project-metadata-footer">
	      <div class="column large-12 large-offset-0 medium-8 medium-offset-2">
	        <table>
	          <tbody>
	            <tr>
	              <td class="metadata-key">Co-presenters</td>
	              <td class="metadata-value"><?php echo $pods->field('copresenters'); ?></td>
	            </tr>
	            <tr>
	              <td class="metadata-key">Acknowledgments</td>
	              <td class="metadata-value"><?php echo $pods->field('acknowledge'); ?></td>
	            </tr>
	          </tbody>
	        </table>
	        <span class="frame-line">_</span>
	      </div>
	    </div>
	  </div>

	  <div class="column large-6 medium-12">

	    <div class="row project-images-column">
	      <div class="column tier-2-image-column large-offset-0 large-12 medium-10 medium-offset-1">
	        <div class="tier-2-image">
	          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tier-2-img-1.jpg">
	          <p class="image-caption">Title piece No. 1  •  Detailed look</p>
	        </div>
	        <div class="tier-2-image">
	          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tier-2-img-2.jpg">
	          <p class="image-caption">Title piece No. 1  •  Detailed look</p>
	        </div>
	        <div class="tier-2-image">
	          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tier-2-img-3.jpg">
	          <p class="image-caption">Title piece No. 1  •  Detailed look</p>
	        </div>
	      </div>
	    </div>

	    <div class="row project-images-column tier-3">
	      <div class="column large-12 large-offset-0 medium-10 medium-offset-1">
	        <div class="row">
	          <div class="column tier-3-image-column small-6">
	            <div class="tier-3-image">
	              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tier-3-img.jpg">
	            </div>
	          </div>
	          <div class="column tier-3-image-column small-6">
	            <div class="tier-3-image">
	              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tier-3-img.jpg">
	            </div>
	          </div>
	          <div class="column tier-3-image-column small-6">
	            <div class="tier-3-image">
	              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tier-3-img.jpg">
	            </div>
	          </div>
	          <div class="column tier-3-image-column small-6">
	            <div class="tier-3-image">
	              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tier-3-img.jpg">
	            </div>
	          </div>
	          <div class="column tier-3-image-column small-6">
	            <div class="tier-3-image">
	              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tier-3-img.jpg">
	            </div>
	          </div>
	          <div class="column tier-3-image-column small-6">
	            <div class="tier-3-image">
	              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tier-3-img.jpg">
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <div class="project-controls">
	      <a href="#"><img class="project-controls-button" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-left.png" title="Previous project"></a>
	      <a href="#"><img class="project-controls-button" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-grid.png" title="All projects"></a>
	      <a href="#"><img class="project-controls-button" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-right.png" title="Next project"></a>
	      <span class="ui-text">Next project</span>
	    </div>

	  </div>
	</div>
</div>

<?php get_footer(); ?>