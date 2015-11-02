<?php
/*
Template Name: Corporates
*/
get_header(); ?>

<div id="corporates">

  <div class="row page-title">
    <h1 class="strike"><span>For Corporates</span></h1>
    <span class="subheader">TO THE ARTISTICALLY INCLINED. <br> Why PAHK and the partnership process.</span>
  </div>

  <div class="row"><?php
    $params = array ('limit' => -1);
    $corp_pod = pods('corporatessettings', $params);
    $chosenTopID = $corp_pod->display('top_project_id');
    $chosenJVID = $corp_pod->display('jv_project_id');
    $chosenSupportID = $corp_pod->display('support_id');

    // WP_Query arguments
    $args = array (
      'p' => $chosenTopID,
      'post_type' => array( 'projects' ),
    );

    // The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();

        $top_banner_image = $corp_pod->display('top_banner') ? $corp_pod->display('top_banner') : pods_field_display('projects', get_the_ID(), 'banner_image'); ?>
        <div class="inner-page-banner" style="background-image:url(<?php echo $top_banner_image; ?>)">
          <a href="<?php echo the_permalink(); ?>" class="inner-artwork-overview large-4 large-offset-1 medium-6 medium-offset-1 show-for-medium-up">
            <p class="artwork-quote"><?php echo pods_field_display('projects', get_the_ID(), 'quote') ?></p>
            <h6><?php echo pods_field_display ('projects', get_the_ID(), 'display_from'); ?> - <?php echo pods_field_display ('projects', get_the_ID(), 'display_until'); ?></h6>
            <h3 class="artist-name"><?php if ( qtranxf_getLanguage() === "zh" && pods_field_display ('projects', get_the_ID(), 'artist_name_zh') != '' ) {
                echo pods_field_display ('projects', get_the_ID(), 'artist_name_zh');
              } else {
                echo pods_field_display ('projects', get_the_ID(), 'artist_name');
              }
            ?></h3>
            <h3 class="artwork-name"><?php the_title(); ?></h3>
          </a>
        </div>
      <?php } // endwhile
    } else {
      echo "We were not able to find your desired display post. Please login to add the ID number of the post you would like to display.";
    } ?>
  </div>


  <div class="card row">
    <div class="text-section column large-6">
      <h2>Joint Ventures</h2>
      <span class="frame-line">_</span>
      <div class="row partner-info">
        <div class="column">
            <h4 class="blue-header"><span class="letter-list">A.</span>Corporate-initiated art project</h4>
        </div>
        <div class="column">
          <p class="primary-desc">The Meet</p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered">To meet your interest, artistic direction, and timeline</p>
          <span class="text-pipe"></span>
          <p class="primary-desc">The Proposal</p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered">Artist / artwork selection</p>
          <span class="text-pipe"></span>
          <p class="primary-desc">The Work</p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered">Artwork production</p>
          <span class="text-pipe"></span>
          <p class="primary-desc">The Promotion</p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered">Celebrating artwork via our wide network.</p>
        </div>
        <div class="column corporate-cta">
          <a href="<?php echo get_home_url(); ?>/support" class="button cta">Start conversation</a>
          <a href="<?php echo get_home_url(); ?>/projects" class="button cta">Learn more</a>
        </div>
      </div>
    </div>
    <div class="text-section column large-6 show-for-large-up"><?php
      // WP_Query arguments
      $args = array (
        'p' => $chosenJVID,
        'post_type' => array( 'projects' ),
      );

      // The Query
      $query = new WP_Query( $args );

      // The Loop
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          $jv_banner_image = $corp_pod->display('jv_banner') ? $corp_pod->display('jv_banner') : pods_field_display('projects', get_the_ID(), 'banner_image'); ?>
          <div class="featured-project-vertical">
            <img src="<?php echo $jv_banner_image; ?>" />    
            <a href="<?php echo the_permalink(); ?>" class="inner-artwork-overview large-7 large-offset-1 medium-6 medium-offset-1 show-for-medium-up">
              <p class="artwork-quote"><?php echo pods_field_display('projects', get_the_ID(), 'quote') ?></p>
              <h6><?php echo pods_field_display ('projects', get_the_ID(), 'display_from'); ?> - <?php echo pods_field_display ('projects', get_the_ID(), 'display_until'); ?></h6>
              <h3 class="artist-name"><?php if ( qtranxf_getLanguage() === "zh" && pods_field_display ('projects', get_the_ID(), 'artist_name_zh') != '' ) {
                  echo pods_field_display ('projects', get_the_ID(), 'artist_name_zh');
                } else {
                  echo pods_field_display ('projects', get_the_ID(), 'artist_name');
                }
              ?></h3>
              <h3 class="artwork-name"><?php the_title(); ?></h3>
            </a>
          </div>
        <?php } // endwhile
      } else {
        echo "We were not able to find your desired display post. Please login to add the ID number of the post you would like to display.";
      } ?>
    </div>
  </div>

  <div class="card row">
    <div class="text-section column large-6 show-for-large-up"><?php
      // WP_Query arguments
      $args = array (
        'p' => $chosenSupportID,
        'post_type' => array( 'projects' ),
      );

      // The Query
      $query = new WP_Query( $args );

      // The Loop
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          $support_banner_image = $corp_pod->display('support_banner') ? $corp_pod->display('support_banner') : pods_field_display('projects', get_the_ID(), 'banner_image'); ?>
          <div class="featured-project-vertical">
            <img src="<?php echo $support_banner_image; ?>" />    
            <a href="<?php echo the_permalink(); ?>" class="inner-artwork-overview large-7 large-offset-1 medium-6 medium-offset-1 show-for-medium-up">
              <p class="artwork-quote"><?php echo pods_field_display('projects', get_the_ID(), 'quote') ?></p>
              <h6><?php echo pods_field_display ('projects', get_the_ID(), 'display_from'); ?> - <?php echo pods_field_display ('projects', get_the_ID(), 'display_until'); ?></h6>
              <h3 class="artist-name"><?php if ( qtranxf_getLanguage() === "zh" && pods_field_display ('projects', get_the_ID(), 'artist_name_zh') != '' ) {
                  echo pods_field_display ('projects', get_the_ID(), 'artist_name_zh');
                } else {
                  echo pods_field_display ('projects', get_the_ID(), 'artist_name');
                }
              ?></h3>
              <h3 class="artwork-name"><?php the_title(); ?></h3>
            </a>
          </div>
        <?php } // endwhile
      } else {
        echo "We were not able to find your desired display post. Please login to add the ID number of the post you would like to display.";
      } ?>
    </div>
    <div class="text-section column large-6">
      <h2>Support the art</h2>
      <span class="frame-line">_</span>
      <div class="row partner-info">
        <div class="column">
            <h4 class="blue-header"><span class="letter-list">B.</span>Donate &amp; Support</h4>
        </div>
        <div class="column">
          <p class="primary-desc">The Meet</p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered">Matching mutual interest</p>
          <span class="text-pipe"></span>
          <p class="primary-desc">The Method</p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered">Support us by donating money*, artwork or volunteering <br>*Donations are tax deductible.</p>
        </div>
        <div class="column corporate-cta">
          <a href="<?php echo get_home_url() . "/corporates"; ?>" class="button cta">Find out how</a>
        </div>
      </div>
    </div>
  </div>

  <div class="card row">
    <div class="text-section how-it-works column large-10 large-offset-1">
      <h2>Why PAHK?</h2>
      <span class="frame-line">_</span>
      <div class="row explanatory-blocks">
        <div class="column large-4 medium-6 text-center">
          <h4>Art for all</h4>
          <p>We proactively partner with a range of organizations to bring art to private and public spaces in Hong Kong.</p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4>Tailor-made</h4>
          <p>Our consultants spark exclusive projects that weaves your vision, artist’s talent and the site’s uniqueness to infuse your space with art.</p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4>Local &amp; Global network</h4>
          <p>We are here to connect you with local and international artist! Our comprehensive database is well-connected to different art industries.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="card row">
    <div class="text-section">
      <h2>Client list</h2>
      <span class="frame-line">_</span>
      <div class="client-logos column large-8 large-offset-2"><?php
        $clientLogoArray = $corp_pod->field('client_logos');
        $numOfLogos = count($clientLogoArray);
        $logosArray = [];

        foreach ($clientLogoArray as $logo) { ?>
          <img src="<?php echo pods_image_url($logo, 'full') ?>" />
        <?php } ?>
      </div>
    </div>
  </div>

</div>
<?php get_footer(); ?>
