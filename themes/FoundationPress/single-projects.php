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

// grabbing tier2 images
if ($pods->field('tier_2_images') != "") {
	$tier2Array = $pods->field('tier_2_images');
} else {
	$tier2Array = "";
}
$tier2pictures = [];
$tier2captions = [];

if ( $tier2Array != "" ) {
foreach ($tier2Array as $picture) {
	array_push( $tier2pictures, pods_image_url($picture, 'full') );
	array_push( $tier2captions, $picture["post_excerpt"]);
}}

// grab additional images
if ($pods->field('additional_images') != "") {
	$additionalPicsArray = $pods->field('additional_images');
} else {
	$additionalPicsArray = "";
}
$additionalPics = [];
$additionalPicsCaption = [];

if ( $additionalPicsArray != "" ) {
foreach ($additionalPicsArray as $picture) {
	array_push( $additionalPics, pods_image_url($picture, 'full') );
	array_push( $additionalPicsCaption, $picture["post_excerpt"]);
}}

// grab project categories
$project_categories = [];
$project_terms = wp_get_post_terms (get_the_ID(), 'projectcategory');
foreach ($project_terms as $category_term) {
	array_push( $project_categories, $category_term->slug );
} ?>

<div id="project-detail">
	<div class="full-width">
	  <div class="inner-page-banner" style="background-image: url('<?php echo pods_image_url( $pods->field('banner_image'), 'full' ); ?>')">
	    <div class="inner-artwork-overview large-4 large-offset-1 medium-6 medium-offset-1 show-for-medium-up">
	      <h5><?php
					if ( qtranxf_getLanguage() === "zh" && $pods->field('location_zh') != '' ) {
	      		echo $pods->display('location_zh');
	      	} else {
	      		echo $pods->display('location');
	      	}
	      ?></h5>
			<h6><?php echo $pods->display('display_from'); ?> - <?php echo $pods->display('display_until'); ?></h6>
			<h3 class="artist-name"><?php
			if ( qtranxf_getLanguage() === "zh" && $pods->field('artist_name_zh') != '' ) {
				echo $pods->display('artist_name_zh');
			} else {
				echo $pods->display('artist_name');
			}
			?></h3>
	      <h3 class="artwork-name"><?php the_title(); ?></h3>
	    </div>
	    <div class="project-controls">
	      <span class="ui-text-overlay"><?php echo qtranxf_getLanguage() === "zh" ? "更多" : "Next project" ; ?></span>
	      <a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>"><img class="project-controls-button" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-left.png" title="Previous project"></a>
	      <a href="<?php echo get_home_url(); ?>/projects"><img class="project-controls-button" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-grid.png" title="All projects"></a>
	      <a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>"><img class="project-controls-button" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-right.png" title="Next project"></a>
	    </div>
	  </div>
	</div>

	<div class="row">
	  <div class="column large-6 medium-12">

	    <div class="row project-action-bar">
	      <div class="column large-6">
	        <a href="#" class="button cta button-single"><?php echo qtranxf_getLanguage() === "zh" ? "諮詢" : "INQUIRE" ; ?></a>
	      </div>
	      <div class="column large-6">
					<a href="mailto:?subject=I wanted you to see this project by PAHK&amp;body=Check it out at <?php echo the_permalink(); ?>." title="Share by Email">
	        	<img class="social-icons" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-email.png">
	        </a>
	        <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <img class="social-icons" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-facebook.png">
          </a>
	        <span class="ui-text"><?php echo qtranxf_getLanguage() === "zh" ? "分享" : "SHARE" ; ?></span>
	      </div>
	    </div>

	    <div class="row project-metadata">
	      <div class="column large-12 large-offset-0 medium-8 medium-offset-2">
	        <table>
	          <tbody>
	            <tr>
	              <td class="metadata-key"><?php echo qtranxf_getLanguage() === "zh" ? "藝術家" : "Artist" ; ?></td>
	              <td class="metadata-value"><?php
		      				if ( qtranxf_getLanguage() === "zh" && $pods->field('artist_name_zh') != '' ) {
			              	echo $pods->display('artist_name_zh');
			            } else {
			              	echo $pods->display('artist_name');
			            } ?></td>
	            </tr>
	            <tr>
	              <td class="metadata-key"><?php echo qtranxf_getLanguage() === "zh" ? "展期" : "On Display" ; ?></td>
	              <td class="metadata-value"><?php echo $pods->display('display_from'); ?> - <?php echo $pods->display('display_until'); ?></td>
	            </tr>

	            <?php if (qtranxf_getLanguage() === "zh" && $pods->field('materials_zh') != "" ) { ?>
            		<tr>
	            		<td class="metadata-key">媒介</td>
	            		<td class="metadata-value"><?php echo $pods->display('materials_zh'); ?></td>
            		</tr>
	            <?php } else if (qtranxf_getLanguage() != "zh" && $pods->field('materials') != "") { ?>
            		<tr>
	            		<td class="metadata-key">Materials</td>
	            		<td class="metadata-value"><?php echo $pods->display('materials'); ?></td>
            		</tr>
	            <?php } ?>

	            <?php //if ($pods->field('dimensions') != "") { ?>
	            <!-- <tr> -->
	              <!-- <td class="metadata-key"><?php //echo qtranxf_getLanguage() === "zh" ? "尺寸" : "Dimensions" ; ?></td> -->
	              <!-- <td class="metadata-value"><?php //echo $pods->display('dimensions'); ?></td> -->
	            <!-- </tr> -->
	            <?php //} ?>

	            <tr>
	              <td class="metadata-key"><?php echo qtranxf_getLanguage() === "zh" ? "地點" : "Location" ; ?></td>
	              <td class="metadata-value"><?php
	      			if ( qtranxf_getLanguage() === "zh" && $pods->field('location_zh') != '' ) {
	              		echo $pods->display('location_zh');
	              	} else {
	              		echo $pods->display('location');
	              	} ?></td>
	            </tr>
	          </tbody>
	        </table>
	      </div>
	    </div>

	    <div class="row project-description">
	      <div class="column">
	        <h4><?php echo qtranxf_getLanguage() === "zh" ? "關於項目" : "About the project" ; ?></h4>
	        <span class="frame-line">_</span>
	        <p class="project-description-text"><?php
		      	if ( qtranxf_getLanguage() === "zh" ) {
			        echo $pods->field('about_project_zh');
			    } else {
			        echo $pods->field('about_project');
			    }
	        ?></p>
	      </div>          
	      <div class="column">
	        <h4><?php echo qtranxf_getLanguage() === "zh" ? "關於藝術家" : "About the artist" ; ?></h4>
	        <span class="frame-line">_</span>
	        <p class="project-description-text"><?php
		      	if ( qtranxf_getLanguage() === "zh" ) {
		        	echo $pods->field('about_artist_zh');
		        } else {
		        	echo $pods->field('about_artist');
		        }
					?></p>
	      </div>
	    </div>

	    <?php if ( $pods->field('embed_video_link') != '' || $pods->field('embed_video_link') != 'undefined' ) { ?>
		    <div class="project_video">
		    	<?php echo $pods->field('embed_video_link'); ?>
		    </div>
		  <?php } ?>

		  <?php if (qtranxf_getLanguage() != "zh" && $pods->field('copresenters') != "" || 
              	qtranxf_getLanguage() === "zh" && $pods->field('copresenters_zh') != "" || 
              	qtranxf_getLanguage() != "zh" && $pods->field('acknowledge') != "" || 
              	qtranxf_getLanguage() === "zh" && $pods->field('acknowledge_zh') != "") { ?>
	    <div class="row project-metadata project-metadata-footer">
	      <div class="column large-12 large-offset-0 medium-8 medium-offset-2">
	        <table>
	          <tbody>
              <?php if (qtranxf_getLanguage() != "zh" && $pods->field('copresenters') != "" || 
              					qtranxf_getLanguage() === "zh" && $pods->field('copresenters_zh') != "") {
	              $i = 0;
	              $temp_string = "";
	              if (qtranxf_getLanguage() === "zh" && ) {
		              $temp_string = preg_replace( "/\r|\n/", "", $pods->field('copresenters_zh'));
		            } else {
		              $temp_string = preg_replace( "/\r|\n/", "", $pods->field('copresenters'));
		            }
		            echo "<pre>";
		            var_dump($temp_string);
		            echo "hello<br />";
		            print_r($temp_string);
		            echo "</pre>";
	              $copresenters = explode(";", $temp_string);
	              foreach ($copresenters as $copresenter) {
	              	echo "<tr>";
	              	if ($i == 0) {
	              		echo '<td class="metadata-key">';
	              		echo qtranxf_getLanguage() === "zh" ? "委約機構" : "Co-presenters" ;
	              		echo '</td>';
	              	}
	              	echo '<td class="metadata-value">'.$copresenter."</td></tr>";
	              	$i++;
	              } // foreach
	            } // endif ?>

              <?php if (qtranxf_getLanguage() != "zh" && $pods->field('acknowledge') != "" || 
              					qtranxf_getLanguage() === "zh" && $pods->field('acknowledge_zh') != "") {
	              $i = 0;
	              $temp_string = "";
	              if (qtranxf_getLanguage() === "zh") {
	              	$temp_string = preg_replace( "/\r|\n/", "", $pods->field('acknowledge_zh'));
	              } else {
	              	$temp_string = preg_replace( "/\r|\n/", "", $pods->field('acknowledge'));
	              }
	              $acknowledgements = explode(";", $temp_string);
	              foreach ($acknowledgements as $acknowledge) {
	              	echo "<tr>";
	              	if ($i == 0) {
	              		echo '<td class="metadata-key">';
	              		echo qtranxf_getLanguage() === "zh" ? "鳴謝" : "Acknowledge" ;
	              		echo '</td>';
	              	}
	              	echo '<td class="metadata-value">'.$acknowledge."</td></tr>";
	              	$i++;
	              } // foreach
              } // endif ?>

	          </tbody>
	        </table>
	      </div>
	    </div>
	    <?php } ?>
	  	<span class="frame-line">_</span>
			<br>	
		  <?php foreach ($project_categories as $category) {
		  	echo '<div class="project-tags">' . $category . "</div>";
	  	} ?>
	  </div><?php //column for entire left side of page ?>

	  <?php if ( $tier2Array != "") { ?>
	  <div class="column large-6 medium-12">
	    <div class="row project-images-column">
	      <div class="column tier-2-image-column large-offset-0 large-12 medium-10 medium-offset-1">
	      	<?php $counter = 0;
      		foreach ($tier2pictures as $picture) { ?>
		        <div class="tier-2-image">
		        <a href="<?php echo $picture; ?>" rel="lightbox">
		          <img src="<?php echo $picture; ?>" />
		          <?php if ( $tier2captions[$counter] !== 'undefined' || $tier2captions[$counter] !== "" ) { ?>
			          <p class="image-caption"><?php echo $tier2captions[$counter]; ?></p>
			        <?php } ?>
		        </a>
		        </div>
    			<?php $counter++; } ?>
	      </div>
	    </div>
	    <?php } ?>

	    <?php if ( $additionalPicsArray != "" ) { ?>
	    <div class="row project-images-column tier-3">
	      <div class="column large-12 large-offset-0 medium-10 medium-offset-1">
	        <div class="row"><?php $counter = 0;
        		foreach ($additionalPics as $picture) { ?>
        			<div class="column tier-3-image-column small-6">
		            <div class="tier-3-image" style="background-image:url(<?php echo $picture; ?>)"></div>
		          </div>
        		<?php $counter++; } ?>
	        </div>
	      </div>
	    </div>
	    <?php } ?>

	    <div class="project-controls">
	      <a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>"><img class="project-controls-button" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-left.png" title="Previous project"></a>
	      <a href="<?php echo get_home_url(); ?>/projects"><img class="project-controls-button" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-grid.png" title="All projects"></a>
	      <a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>"><img class="project-controls-button" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-right.png" title="Next project"></a>
	      <span class="ui-text"><?php echo qtranxf_getLanguage() === "zh" ? "更多" : "Next project" ; ?></span>
	    </div>

	  </div>
	</div>
</div>

<?php get_footer(); ?>