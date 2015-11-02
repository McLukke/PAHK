<div class="row page-title">
  <h1 class="strike"><span>Projects</span></h1>
</div>

<div class="row">
  <h4>Filter projects by</h4>
  <div id="filters" class="filter-button-group">
    <a href="#" class="filter-button is-checked" data-filter="*"><?php if (qtranxf_getLanguage() === "zh") {echo "全部";}else{echo "ALL";} ?></a>
    <a href="#" class="filter-button" data-filter=".metal"><?php if (qtranxf_getLanguage() === "zh") {echo "香港";}else{echo "LOCAL";} ?></a>
    <a href="#" class="filter-button" data-filter=".transition"><?php if (qtranxf_getLanguage() === "zh") {echo "國際";}else{echo "INTERNATIONAL";} ?></a>
    <a href="#" class="filter-button" data-filter=".alkali, .alkaline-earth"><?php if (qtranxf_getLanguage() === "zh") {echo "室內";}else{echo "INDOOR";} ?></a>
    <a href="#" class="filter-button" data-filter=":not(.transition)"><?php if (qtranxf_getLanguage() === "zh") {echo "室外";}else{echo "OUTDOOR";} ?></a>
    <a href="#" class="filter-button" data-filter=".metal:not(.transition)"><?php if (qtranxf_getLanguage() === "zh") {echo "掛牆";}else{echo "WALL-MOUNTED";} ?></a>
    <a href="#" class="filter-button" data-filter="numberGreaterThan50"><?php if (qtranxf_getLanguage() === "zh") {echo "立體";}else{echo "FREE-STANDING";} ?></a>
  </div>
</div>

<div class="row">
<div class="isotope">
<?php $params = array ('limit' => -1);
$pods = pods('projects', $params);

if ( have_posts() ) :
while ( have_posts() ) : the_post(); 

  if (has_post_thumbnail()) {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id());
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
    <div class="project-thumbnail-container"><img src="<?php echo $image; ?>" /></div>
    <h5 class="district-name"><?php if ( qtranxf_getLanguage() === "zh" && $pods->field('location_zh') != '' ) {
      echo pods_field_display ('projects', get_the_ID(), 'location_zh');
    } else {
      echo pods_field_display ('projects', get_the_ID(), 'location');
    } ?></h5>

    <h6><?php echo pods_field_display ('projects', get_the_ID(), 'display_from'); ?> -
    <?php echo pods_field_display ('projects', get_the_ID(), 'display_until'); ?></h6>

    <h3 class="artist-name"><?php if ( qtranxf_getLanguage() === "zh" && $pods->field('artist_name_zh') != '' ) {
      echo pods_field_display ('projects', get_the_ID(), 'artist_name_zh');
    } else {
      echo pods_field_display ('projects', get_the_ID(), 'artist_name');
    } ?></h3>

    <h3 class="artwork-name"><?php the_title(); ?></h3>
  </a>

<?php endwhile;
      endif; ?>

</div>
</div>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
	<nav id="post-nav">
		<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
		<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
	</nav>
<?php } ?>