<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row page-title">
  <h1 class="strike"><span><?php if (qtranxf_getLanguage() === "zh") {
  		_e( '搜索结果:', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"
  	<?php } else {
  		_e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"
  	<?php } ?>
  </span></h1>
</div>

<?php if ( have_posts() ) : 
		$params = array ('limit' => -1);
		$pods = pods('projects', $params); ?>
		<div class="row">
		<div class="isotope" role="main"><?php
		while ( have_posts() ) : the_post(); 
			// get_template_part( 'content', get_post_format() );

			if (has_post_thumbnail()) {
		    $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
		    $image = $image[0];
		  }else{
		    $image = get_bloginfo('template_directory')."/assets/images/black.png";
		  }

		  $class = "";

		  $project_terms = wp_get_post_terms (get_the_ID(), 'projectcategory');
		  foreach ($project_terms as $category_term) {
		    $class = $class . " " . $category_term->slug;
		  } ?>

		  <a href="<?php the_permalink(); ?>" class="grid-item <?php echo $class ?>" data-category="transition">
		    <div class="project-thumbnail-container" style="background-image:url(<?php echo $image; ?>)"></div>
		    <h5 class="district-name"><?php if ( qtranxf_getLanguage() === "zh" && $pods->field('location_zh') != '' ) {
		      echo pods_field_display ('projects', get_the_ID(), 'location_zh');
		    } else {
		      echo pods_field_display ('projects', get_the_ID(), 'location');
		    } ?></h5>
		    <h6><?php 
		      if (qtranxf_getLanguage() === "zh") {
		        echo date_i18n( 'M', strtotime(pods_field_display ('projects', get_the_ID(), 'display_from')) )."月.";
		        $temp = date_i18n( 'Y', strtotime(pods_field_display ('projects', get_the_ID(), 'display_from')) );
		        echo display_chinese_year( $temp );
		      } else {
		        echo date_i18n( 'M Y', strtotime( pods_field_display ('projects', get_the_ID(), 'display_from')) );
		      } ?> - <?php
		      if (pods_field_display ('projects', get_the_ID(), 'ongoing')) {
		        echo qtranxf_getLanguage() === "zh" ? "持續" : "Ongoing" ;
		      } else {
		        if (qtranxf_getLanguage() === "zh") {
		          echo date_i18n( 'M', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) )."月.";
		          $temp = date_i18n( 'Y', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) );
		          echo display_chinese_year($temp);
		        } else {
		          echo date_i18n( 'M Y', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) );
		        }
		      }
		    ?></h6>
		    <h3 class="artist-name"><?php if ( qtranxf_getLanguage() === "zh" && $pods->field('artist_name_zh') != '' ) {
		      echo pods_field_display ('projects', get_the_ID(), 'artist_name_zh');
		    } else {
		      echo pods_field_display ('projects', get_the_ID(), 'artist_name');
		    } ?></h3>

		    <h3 class="artwork-name"><?php the_title(); ?></h3>
		  </a><?php
		endwhile; ?>
		</div>
		</div>
	<?php else : 
		// echo '<div class="test">';
		get_template_part( 'content', 'none' );
		// echo '</div>';
	endif; 


$my_query = new WP_Query('artist_name='.$s);
if (!empty($my_query->posts)) :
while ($my_query->have_posts()) : $my_query->the_post();
	echo "found name";
endwhile;
endif;

$my_query = new WP_Query('artist_name_zh='.$s);
if (!empty($my_query->posts)) :
while ($my_query->have_posts()) : $my_query->the_post();
	echo "found Chinese name";
endwhile;
endif;


	// echo do_shortcode('[ajax_load_more post_type="projects" scroll="true" offset="6" posts_per_page="3" pause="true" pause_override="true" transition="fade" container_type="div" css_classes="isotope"]');
	get_footer(); 
?>
