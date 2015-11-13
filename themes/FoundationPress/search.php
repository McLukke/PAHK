<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); 
$params = array ('limit' => -1); 
$pods = pods('projects', $params); ?>

<div class="row page-title">
  <h1 class="strike"><span><?php if (qtranxf_getLanguage() === "zh") {
  		_e( '搜索结果:', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"
  	<?php } else {
  		_e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"
  	<?php } ?>
  </span></h1>
</div>

<div class="row">
<div class="isotope" role="main">

<?php 
// $args = array(
//   'post_type' => 'Projects',
//   'posts_per_page'=>-1,
//   's'=>$s
//   // 'meta_key'=>'display_from',
//   // 'orderby'=>'meta_value',
//   // 'order'=>'desc',
//   // 'meta_query'=>array(
//   //   'relation'=>'OR',
//   //   array(
//   //       'key'=>'artist_name',
//   //       'value'=>$s,
//   //       'compare' => 'LIKE'
//   //   ),
//   //   array(
//   //       'key'=>'artist_name_zh',
//   //       'value'=>$s,
//   //       'compare' => 'LIKE'
//   //   )
//   // )
// );

// add_filter('posts_join','add_join_wpse_99849');
// add_filter('posts_search','alter_search_wpse_99849',1,2);
// $myCompleteSearch = new WP_Query($args);
// remove_filter('posts_join','add_join_wpse_99849');
// remove_filter('posts_search','alter_search_wpse_99849',1,2);

// var_dump($myCompleteSearch->request);
// var_dump($myCompleteSearch->posts);

$titleSearch = new WP_Query(array(
	'post_type' => 'Projects',
	'meta_key'=>'display_from',
  'orderby'=>'meta_value',
  'order'=>'asc',
	'posts_per_page'=>30,
	's'=>$s
));

$artistSearch = new WP_Query(array(
	'post_type' => 'Projects',
	'meta_key'=>'display_from',
  'orderby'=>'meta_value',
  'order'=>'asc',
	'posts_per_page'=>30,
  'meta_query'=>array(
    'relation'=>'OR',
    array(
        'key'=>'artist_name',
        'value'=>$s,
        'compare' => 'LIKE'
    ),
    array(
        'key'=>'artist_name_zh',
        'value'=>$s,
        'compare' => 'LIKE'
    )
  )
));

$completeSearch = $titleSearch->posts + $artistSearch->posts;

if ( count($completeSearch) > 0 ) : 
foreach ($completeSearch as $postObject) {
		if ( has_post_thumbnail( $postObject->ID ) ) {
	    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $postObject->ID ), 'medium' );
	    $image = $image[0];
	  }else{
	    $image = get_bloginfo('template_directory')."/assets/images/black.png";
	  }

	  $class = "";

	  $project_terms = wp_get_post_terms ($postObject->ID, 'projectcategory');
	  foreach ($project_terms as $category_term) {
	    $class = $class . " " . $category_term->slug;
	  } ?>

	  <a href="<?php the_permalink(); ?>" class="grid-item <?php echo $class ?>" data-category="transition">
	    <div class="project-thumbnail-container" style="background-image:url(<?php echo $image; ?>)"></div>
	    <h5 class="district-name"><?php if ( qtranxf_getLanguage() === "zh" && $pods->field('location_zh') != '' ) {
	      echo pods_field_display ('projects', $postObject->ID, 'location_zh');
	    } else {
	      echo pods_field_display ('projects', $postObject->ID, 'location');
	    } ?></h5>
	    <h6><?php 
	      if (qtranxf_getLanguage() === "zh") {
	        echo date_i18n( 'M', strtotime(pods_field_display ('projects', $postObject->ID, 'display_from')) )."月.";
	        $temp = date_i18n( 'Y', strtotime(pods_field_display ('projects', $postObject->ID, 'display_from')) );
	        echo display_chinese_year( $temp );
	      } else {
	        echo date_i18n( 'M Y', strtotime( pods_field_display ('projects', $postObject->ID, 'display_from')) );
	      } ?> - <?php
	      if (pods_field_display ('projects', $postObject->ID, 'ongoing')) {
	        echo qtranxf_getLanguage() === "zh" ? "持續" : "Ongoing" ;
	      } else {
	        if (qtranxf_getLanguage() === "zh") {
	          echo date_i18n( 'M', strtotime(pods_field_display ('projects', $postObject->ID, 'display_until')) )."月.";
	          $temp = date_i18n( 'Y', strtotime(pods_field_display ('projects', $postObject->ID, 'display_until')) );
	          echo display_chinese_year($temp);
	        } else {
	          echo date_i18n( 'M Y', strtotime(pods_field_display ('projects', $postObject->ID, 'display_until')) );
	        }
	      }
	    ?></h6>
	    <h3 class="artist-name"><?php if ( qtranxf_getLanguage() === "zh" && $pods->field('artist_name_zh') != '' ) {
	      echo pods_field_display ('projects', $postObject->ID, 'artist_name_zh');
	    } else {
	      echo pods_field_display ('projects', $postObject->ID, 'artist_name');
	    } ?></h3>

	    <h3 class="artwork-name"><?php echo $postObject->post_title; ?></h3>
	  </a><?php
} // end foreach
else : 
	// echo '<div class="test">';
	// get_template_part( 'content', 'none' );
	// echo '</div>';
	echo "no results found";
endif; 
wp_reset_query();?>
</div>
</div>
<?php
// echo do_shortcode('[ajax_load_more post_type="projects" scroll="true" offset="6" posts_per_page="3" pause="true" pause_override="true" transition="fade" container_type="div" css_classes="isotope"]');
/* Display navigation to next/previous pages when applicable */
if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
  <nav id="post-nav">
    <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
    <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
  </nav>
<?php }
// Restore original Post Data
wp_reset_postdata();
wp_reset_query();
get_footer(); ?>
