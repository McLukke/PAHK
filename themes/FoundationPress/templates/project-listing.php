<?php
/*
Template Name: Project Listing
*/
get_header(); ?>

CAROUSEL

<div class="row page-title">
  <h1 class="strike"><span>Projects</span></h1>
</div>

<div class="row">
  <h4>Filter projects by</h4>
  <div id="filters" class="filter-button-group">  <button class="filter-button is-checked" data-filter="*">ALL</button>
    <button class="filter-button" data-filter=".local">LOCAL</button>
    <button class="filter-button" data-filter=".international">INTERNATIONAL</button>
    <button class="filter-button" data-filter=".indoor">INDOOR</button>
    <button class="filter-button" data-filter=".outdoor">OUTDOOR</button>
    <button class="filter-button" data-filter=".wall-mounted">WALL-MOUNTED</button>
    <button class="filter-button" data-filter=".free-standing">FREE-STANDING</button>
  </div>
</div>

<div class="row">
  <div class="isotope">
    <div class="grid-item free-standing international outdoor">
      <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb-art-1.png"></div>
      <h5>Wan Chai</h5>
      <h6>June 2015 - July 2015</h6>
      <h3 class="artist-name">MTR CORPORATION:</h3>
      <h3>Tiara Sculpture Competition</h3>
    </div>
    <div class="grid-item wall-mounted local indoor">
      <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb-art-1.png"></div>
      <h5>Wan Chai</h5>
      <h6>June 2015 - July 2015</h6>
      <h3 class="artist-name">MTR CORPORATION:</h3>
      <h3>Tiara Sculpture Competition</h3>
    </div>
    <div class="grid-item free-standing international outdoor">
      <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb-art-1.png"></div>
      <h5>Wan Chai</h5>
      <h6>June 2015 - July 2015</h6>
      <h3 class="artist-name">MTR CORPORATION:</h3>
      <h3>Tiara Sculpture Competition</h3>
    </div>
    <div class="grid-item free-standing international outdoor">
      <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb-art-1.png"></div>
      <h5>Wan Chai</h5>
      <h6>June 2015 - July 2015</h6>
      <h3 class="artist-name">MTR CORPORATION:</h3>
      <h3>Tiara Sculpture Competition</h3>
    </div>
    <div class="grid-item international free-standing indoor">
      <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb-art-1.png"></div>
      <h5>Wan Chai</h5>
      <h6>June 2015 - July 2015</h6>
      <h3 class="artist-name">MTR CORPORATION:</h3>
      <h3>Tiara Sculpture Competition</h3>
    </div>
    <div class="grid-item international wall-mounted indoor">
      <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb-art-1.png"></div>
      <h5>Wan Chai</h5>
      <h6>June 2015 - July 2015</h6>
      <h3 class="artist-name">MTR CORPORATION:</h3>
      <h3>Tiara Sculpture Competition</h3>
    </div>
    <div class="grid-item international free-standing outdoor">
      <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb-art-1.png"></div>
      <h5>Wan Chai</h5>
      <h6>June 2015 - July 2015</h6>
      <h3 class="artist-name">MTR CORPORATION:</h3>
      <h3>Tiara Sculpture Competition</h3>
    </div>
    <div class="grid-item local wall-mounted-indoor">
      <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb-art-1.png"></div>
      <h5>Wan Chai</h5>
      <h6>June 2015 - July 2015</h6>
      <h3 class="artist-name">MTR CORPORATION:</h3>
      <h3>Tiara Sculpture Competition</h3>
    </div>
    <div class="grid-item international free-standing outdoor">
      <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb-art-1.png"></div>
      <h5>Wan Chai</h5>
      <h6>June 2015 - July 2015</h6>
      <h3 class="artist-name">MTR CORPORATION:</h3>
      <h3>Tiara Sculpture Competition</h3>
    </div>
    <div class="grid-item local outdoor free-standing">
      <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/thumb-art-1.png"></div>
      <h5>Wan Chai</h5>
      <h6>June 2015 - July 2015</h6>
      <h3 class="artist-name">MTR CORPORATION:</h3>
      <h3>Tiara Sculpture Competition</h3>
    </div>
  </div>
</div>

<?php get_footer(); ?>