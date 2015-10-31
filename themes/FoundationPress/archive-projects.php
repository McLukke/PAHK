<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

  get_header();


?>

<div class="row page-title">
  <h1 class="strike"><span>Projects</span></h1>
</div>

<div class="row">
  <h4>Filter projects by</h4>
  <div id="filters" class="filter-button-group">
    <a href="#" class="filter-button is-checked" data-filter="*">ALL</a>
    <a href="#" class="filter-button" data-filter=".metal">LOCAL</a>
    <a href="#" class="filter-button" data-filter=".transition">INTERNATIONAL</a>
    <a href="#" class="filter-button" data-filter=".alkali, .alkaline-earth">INDOOR</a>
    <a href="#" class="filter-button" data-filter=":not(.transition)">OUTDOOR</a>
    <a href="#" class="filter-button" data-filter=".metal:not(.transition)">WALL-MOUNTED</a>
    <a href="#" class="filter-button" data-filter="numberGreaterThan50">FREE-STANDING</a>
  </div>
</div>

<?php //if ( !have_posts() ) { _e('Sorry, no results were found.'); } ?>


<div class="row">
<div class="isotope">
<?php
$params = array ('limit' => -1);
$pods = pods('projects', $params);

if ( have_posts() ) :
while ( have_posts() ) : the_post(); 

  if (has_post_thumbnail()) {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id());
    $image = $image[0];
  }else{
    $image = get_bloginfo('template_directory')."/assets/images/black.png";
  } ?>

  <a href="<?php the_permalink(); ?>" class="grid-item <?php echo $class ?>" data-category="transition">
    <div><img src="<?php echo $image; ?>" /></div>
    <?php echo pods_field_display ('projects', get_the_ID(), 'location'); ?>

    <h6><?php echo pods_field_display ('projects', get_the_ID(), 'display_from');    ?> -
    <?php echo pods_field_display ('projects', get_the_ID(), 'display_until');    ?></h6>

    <h3 class="artist-name"><?php echo pods_field_display ('projects', get_the_ID(), 'artist_name'); ?></h3>
  </a>

<?php endwhile; // endwhile
      endif; // endwhile ?>

</div>
</div>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
	<nav id="post-nav">
		<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
		<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
	</nav>
<?php } ?>
<?php get_footer(); ?>
