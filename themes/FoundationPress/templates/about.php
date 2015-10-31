<?php
/*
Template Name: About
*/
get_header();

$params = array ('limit' => -1);
$aboutpod = pods('aboutsettings', $params);
$chosenID = $aboutpod->display('post_id');
?>

<?php get_template_part( 'parts/featured-image' ); ?>

<div id="about">
  <div class="row page-title">
    <h1 class="strike"><span>ABOUT PAHK</span></h1>
  </div>

  <div class="row">
    <div class="inner-page-banner">
      <div class="inner-artwork-overview large-4 large-offset-1 medium-6 medium-offset-1 show-for-medium-up">
      <?php // WP_Query arguments
      $args = array (
        'p'                      => $chosenID,
        'post_type'              => array( 'projects' ),
      );

      // The Query
      $query = new WP_Query( $args );

      // The Loop
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post(); ?>

        <h5><?php  ?></h5>
        <h6><?php echo pods_field_display ('projects', get_the_ID(), 'display_from'); ?> - <?php echo pods_field_display ('projects', get_the_ID(), 'display_until'); ?></h6>
        <h3 class="artist-name"><?php  ?></h3>
        <h3 class="artwork-name"><?php //the_title(); ?></h3>
        <?php } // endwhile
      } else {
        echo "We were not able to find your desired display post. Please login to add the ID number of the post you would like to display.";
      } ?>
      </div>
    </div>
  </div>

  <div class="card row">
    <div class="text-section column">
      <h2>Welcome to PAHK</h2>
      <span class="subheader">The leading public art promoting organization in Hong Kong</span>
      <span class="frame-line">_</span>
      <p class="text-block column large-6 medium-8 text-center small-centered">Public Art Hong Kong (PAHK) is a non-profit organization funded by the Y.K.Pao Foundation with an aim to nurture and promote public art in Hong Kong. It was incorporated in 2005 with the Hong Kong Arts Centre as its executing organization. PAHK wishes to create an interactive relationship among the artwork, site and audience and intends to reflect public interests while featuring Hong Kong as a vibrant cultural city.</p>
    </div>
    <div class="column medium-6">
      <h4 class="subheader-strike"><span>Corporate projects</span></h4>
      <a href="<?php echo get_home_url(); ?>/corporates" class="button cta">Partner with PAHK</a>
    </div>
    <div class="column medium-6">
      <h4 class="subheader-strike"><span>Call for artists</span></h4>
      <a href="<?php echo get_home_url(); ?>/artists" class="button cta">Proposal Submissions</a>
    </div>
  </div>

  <div class="card row">
    <div class="text-section column">
      <h2>Board of Councillors</h2>
      <span class="frame-line">_</span>
      <div class="row">
        <div class="column large-6 large-centered text-center">
          <p><?php echo $aboutpod->display('councillors'); ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="card row">
    <div class="text-section column">
      <h2>Mission</h2>
      <span class="frame-line">_</span>
      <ol class="text-block column large-6 medium-8 small-centered custom-counter">
        <li>Art should be accessible to everyone rather than being confined within the walls of museums, galleries and private collections;</li>
        <li>To breathe life to public space and bring people of the community together, creating communal spirit and identity;</li>
        <li>To reflect the value of the society and its conscience of cultural development;</li>
        <li>PAHK gives opportunities to Hong Kong artists to think and create in terms of large space which otherwise is not feasible within their own small and confined studio; </li>
        <li>To showcase to the world that Hong Kong is not only thriving economically but also throbbing with artistic pursuits. </li>
      </ol>
    </div>
  </div>

  <div class="card row">
    <div class="text-section how-it-works column large-10 large-offset-1">
      <h2>How it works</h2>
      <span class="frame-line">_</span>
      <div class="row explanatory-blocks">
        <div class="column large-4 medium-6 text-center">
          <h4>Art Consultancy</h4>
          <p>Our consultants are experts in creating distinctive projects with you from start to finish, bringing art into your space, promoting public art in a diversified form. </p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4>Artwork Acquisition</h4>
          <p>We work closely with emerging artists in Hong Kong. Our  consultants select original artworks based on your preference, coordinating the selection, acquisition, and installation of the artwork.</p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4>Artwork Commission</h4>
          <p>We enable you to experience the excitement of bringing an art concept to life. Our consultants work with you to commission artists to create an artwork that interact visually with the environment of your space as well as your vision.</p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4>Docent Tours</h4>
          <p>Art education is important to us. Together with our partner we offer specially designed free docent tours for you to enjoy the artistic journey and behind-the-scene stories at the Hong Kong Arts Centre.</p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4>Playing with Space</h4>
          <p>We enjoy breathing life to public space and bring people of the community together; proactively, we commission talented artist to create new art for our space and interesting spaces in Hong Kong.</p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4>Tailor Made</h4>
          <p>It’s the insight, knowledge together with experience that give us the expertise in curating public art project that speak to the people and resonate with the contemporary.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="card row">
    <div class="text-section">
      <h2>Executing Organization</h2>
      <span class="frame-line">_</span>
      <h4 class="text-center">Hong Kong Arts Center</h4>
    </div>
  </div>
</div>

<?php // Restore original Post Data
wp_reset_postdata();

get_footer(); ?>
