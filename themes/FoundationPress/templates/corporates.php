<?php
/*
Template Name: Corporates
*/
get_header(); ?>

<div id="corporates">

  <div class="row page-title">
    <h1 class="strike"><span><?php echo qtranxf_getLanguage() === "zh" ? "企業合作" : "For Corporates" ; ?></span></h1>
    <span class="subheader"><?php echo qtranxf_getLanguage() === "zh" ? "度身訂造的企業合作" : "TO THE ARTISTICALLY INCLINED. <br> Why PAHK and the partnership process." ; ?></span>
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

<?php // this is the old format, F - F Y

  // echo date_i18n( 'F', strtotime( pods_field_display ('projects', get_the_ID(), 'display_from')) );
  // echo " - ";
  // if (pods_field_display ('projects', get_the_ID(), 'ongoing')) {
  //   echo qtranxf_getLanguage() === "zh" ? "持續" : "Ongoing" ;
  // } else {
  //   if (qtranxf_getLanguage() === "zh") {
  //     echo date_i18n( 'F', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) ) . ".";
  //     $temp = date_i18n( 'Y', strtotime(pods_field_display ('proxjects', get_the_ID(), 'display_until')) );
  //     echo display_chinese_year( $temp );
  //   } else {
  //     echo date_i18n( 'F Y', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) );
  //   }
  // }
?> 
            <h6><?php
              if (qtranxf_getLanguage() === "zh") {
                $temp = date_i18n( 'Y', strtotime(pods_field_display ('proxjects', get_the_ID(), 'display_until')) );
                echo display_chinese_year( $temp );
                echo "." . date_i18n( 'F', strtotime( pods_field_display ('projects', get_the_ID(), 'display_from')) );
              } else {
                echo date_i18n( 'F', strtotime( pods_field_display ('projects', get_the_ID(), 'display_from')) );
              }
              echo " - ";
              if (pods_field_display ('projects', get_the_ID(), 'ongoing')) {
                echo qtranxf_getLanguage() === "zh" ? "持續" : "Ongoing" ;
              } else {
                if (qtranxf_getLanguage() === "zh") {
                  echo date_i18n( 'F', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) );
                } else {
                  echo date_i18n( 'F Y', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) );
                }
              }
            ?></h6>
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

  <div class="card row partner-card">
    <div class="text-section column large-6">
      <h2><?php echo qtranxf_getLanguage() === "zh" ? "企業合作" : "Joint Ventures" ; ?></h2>
      <span class="frame-line">_</span>
      <div class="row partner-info">
        <div class="column">
            <h4 class="blue-header"><span class="letter-list">A.</span><?php echo qtranxf_getLanguage() === "zh" ? "項目運作方式" : "Corporate-initiated art project" ; ?></h4>
        </div>
        <div class="column">
          <p class="primary-desc"><?php echo qtranxf_getLanguage() === "zh" ? "概念與預算" : "The Meet" ; ?></p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered"><?php echo qtranxf_getLanguage() === "zh" ? "你可以透過PAHK實現你項目的概念。無論你想要為你的企業增添藝術氣息、將藝術帶到社區，我們都能提供讓你概念實行的項目。" : "To meet your interest, artistic direction, and timeline" ; ?></p>
          <span class="text-pipe"></span>
          <p class="primary-desc"><?php echo qtranxf_getLanguage() === "zh" ? "方案深化" : "The Proposal" ; ?></p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered"><?php echo qtranxf_getLanguage() === "zh" ? "根據你的概念，PAHK 顧問會為你打造獨一無二的方案，將藝術家的創意帶進你的空間。" : "Artist / artwork selection" ; ?></p>
          <span class="text-pipe"></span>
          <p class="primary-desc"><?php echo qtranxf_getLanguage() === "zh" ? "項目實行/藝術品製作" : "The Work" ; ?></p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered"><?php echo qtranxf_getLanguage() === "zh" ? "PAHK顧問會管理整個項目實行的過程，將項目及藝術品製作的品質保證。" : "Artwork production" ; ?></p>
          <span class="text-pipe"></span>
          <p class="primary-desc"><?php echo qtranxf_getLanguage() === "zh" ? "宣傳" : "The Promotion" ; ?></p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered"><?php echo qtranxf_getLanguage() === "zh" ? "透過多種的平台，PAHK會讓你的項目吸引更多的觀眾。" : "Celebrating artwork via our wide network." ; ?></p>
        </div>
        <div class="column corporate-cta">
          <a href="<?php echo get_home_url(); ?>/support" class="button cta"><?php echo qtranxf_getLanguage() === "zh" ? "立即開始" : "Start conversation" ; ?></a>
          <a href="<?php echo get_home_url(); ?>/projects" class="button cta"><?php echo qtranxf_getLanguage() === "zh" ? "了解更多" : "Learn more" ; ?></a>
        </div>
      </div>
    </div>
    <div class="partner-card-project-right text-section column large-6 show-for-large-up"><?php
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
          <div class="featured-project-vertical" style="background-image:url(<?php echo $jv_banner_image; ?>); ">
            <a href="<?php echo the_permalink(); ?>" class="inner-artwork-overview large-7 large-offset-1 medium-6 medium-offset-1 show-for-medium-up">
              <p class="artwork-quote"><?php echo pods_field_display('projects', get_the_ID(), 'quote') ?></p>
              <h6><?php 
                // old display M - M Y

                // echo date_i18n( 'F', strtotime( pods_field_display ('projects', get_the_ID(), 'display_from')) );
                // echo " - "; 
                // if (pods_field_display ('projects', get_the_ID(), 'ongoing')) {
                //   echo qtranxf_getLanguage() === "zh" ? "持續" : "Ongoing" ;
                // } else {
                //   if (qtranxf_getLanguage() === "zh") {
                //     echo date_i18n( 'F', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) ) . ".";
                //     $temp = date_i18n( 'Y', strtotime(pods_field_display ('proxjects', get_the_ID(), 'display_until')) );
                //     echo display_chinese_year( $temp );
                //   } else {
                //     echo date_i18n( 'F Y', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) );
                //   }
                // }

                if (qtranxf_getLanguage() === "zh") {
                  $temp = date_i18n( 'Y', strtotime(pods_field_display ('proxjects', get_the_ID(), 'display_until')) );
                  echo display_chinese_year( $temp );
                  echo "." . date_i18n( 'F', strtotime( pods_field_display ('projects', get_the_ID(), 'display_from')) );
                } else {
                  echo date_i18n( 'F', strtotime( pods_field_display ('projects', get_the_ID(), 'display_from')) );
                }
                echo " - ";
                if (pods_field_display ('projects', get_the_ID(), 'ongoing')) {
                  echo qtranxf_getLanguage() === "zh" ? "持續" : "Ongoing" ;
                } else {
                  if (qtranxf_getLanguage() === "zh") {
                    echo date_i18n( 'F', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) );
                  } else {
                    echo date_i18n( 'F Y', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) );
                  }
                }
              ?></h6>
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

  <div class="card row partner-card">

    <div class="text-section column large-6 large-push-6">
      <h2><?php echo qtranxf_getLanguage() === "zh" ? "支持藝術" : "Support the art" ; ?></h2>
      <span class="frame-line">_</span>
      <div class="row partner-info">
        <div class="column">
            <h4 class="blue-header"><span class="letter-list">B.</span><?php echo qtranxf_getLanguage() === "zh" ? "贊助與支持" : "Donate & Support" ; ?></h4>
        </div>
        <div class="column">
          <p class="primary-desc"><?php echo qtranxf_getLanguage() === "zh" ? "會面" : "The Meet" ; ?></p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered"><?php echo qtranxf_getLanguage() === "zh" ? "了解PAHK的故事，讓PAHK更了解你想支持的群組。" : "Matching mutual interest" ; ?></p>
          <span class="text-pipe"></span>
          <p class="primary-desc"><?php echo qtranxf_getLanguage() === "zh" ? "方式" : "The Method" ; ?></p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered"><?php echo qtranxf_getLanguage() === "zh" ? "無論你想贊助公共藝術項目、捐贈藝術品讓更多的公眾能夠在社區享受藝術氣息。PAHK能夠跟你一起尋找最適合的方式。" : "Support us by donating money*, artwork or volunteering <br>*Donations are tax deductible." ; ?></p>
        </div>
        <div class="column corporate-cta">
          <a href="<?php echo get_home_url() . "/corporates"; ?>" class="button cta"><?php echo qtranxf_getLanguage() === "zh" ? "了解更多" : "Find out how" ; ?></a>
        </div>
      </div>
    </div>

    <div class="large-pull-6 partner-card-project-left text-section column large-6 show-for-large-up"><?php
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
          <div class="featured-project-vertical" style="background-image:url(<?php echo $support_banner_image; ?>); ">
            <a href="<?php echo the_permalink(); ?>" class="inner-artwork-overview large-7 large-offset-1 medium-6 medium-offset-1 show-for-medium-up">
              <p class="artwork-quote"><?php echo pods_field_display('projects', get_the_ID(), 'quote') ?></p>
              <h6><?php 
                // old display M - M Y

                // echo date_i18n( 'F', strtotime( pods_field_display ('projects', get_the_ID(), 'display_from')) );
                // echo " - ";
                // if (pods_field_display ('projects', get_the_ID(), 'ongoing')) {
                //   echo qtranxf_getLanguage() === "zh" ? "持續" : "Ongoing" ;
                // } else {
                //   if (qtranxf_getLanguage() === "zh") {
                //     echo date_i18n( 'F', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) ) . ".";
                //     $temp = date_i18n( 'Y', strtotime(pods_field_display ('proxjects', get_the_ID(), 'display_until')) );
                //     echo display_chinese_year( $temp );
                //   } else {
                //     echo date_i18n( 'F Y', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) );
                //   }
                // }
              
                if (qtranxf_getLanguage() === "zh") {
                  $temp = date_i18n( 'Y', strtotime(pods_field_display ('proxjects', get_the_ID(), 'display_until')) );
                  echo display_chinese_year( $temp );
                  echo "." . date_i18n( 'F', strtotime( pods_field_display ('projects', get_the_ID(), 'display_from')) );
                } else {
                  echo date_i18n( 'F', strtotime( pods_field_display ('projects', get_the_ID(), 'display_from')) );
                }
                echo " - ";
                if (pods_field_display ('projects', get_the_ID(), 'ongoing')) {
                  echo qtranxf_getLanguage() === "zh" ? "持續" : "Ongoing" ;
                } else {
                  if (qtranxf_getLanguage() === "zh") {
                    echo date_i18n( 'F', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) );
                  } else {
                    echo date_i18n( 'F Y', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) );
                  }
                }
              ?></h6>
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
    <div class="text-section how-it-works column large-10 large-offset-1">
      <h2><?php echo qtranxf_getLanguage() === "zh" ? "為何與PAHK合作?" : "Why PAHK?" ; ?></h2>
      <span class="frame-line">_</span>
      <div class="row explanatory-blocks">
        <div class="column large-4 medium-6 text-center">
          <h4><?php echo qtranxf_getLanguage() === "zh" ? "能觸及的藝術" : "Art for all" ; ?></h4>
          <p><?php echo qtranxf_getLanguage() === "zh" ? "藝術應為每一個人所能觸及, 多年來PAHK與不同類型的機構及企業合作, 將藝術帶到香港的公共以及私有空間。" : "We proactively partner with a range of organizations to bring art to private and public spaces in Hong Kong." ; ?></p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4><?php echo qtranxf_getLanguage() === "zh" ? "獨一無二的項目" : "Tailor-made" ; ?></h4>
          <p><?php echo qtranxf_getLanguage() === "zh" ? "PAHK 顧問會為你打造獨一無二的方案，將藝術家的創意連同你的概念帶進你的空間。" : "Our consultants spark exclusive projects that weaves your vision, artist’s talent and the site’s uniqueness to infuse your space with art." ; ?></p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4><?php echo qtranxf_getLanguage() === "zh" ? "連接香港及國際的平台" : "Local & Global network" ; ?></h4>
          <p><?php echo qtranxf_getLanguage() === "zh" ? "PAHK 的平台鏈接不同的社區, 讓你接觸更多香港及國際的藝術家!" : "We are here to connect you with local and international artist! Our comprehensive database is well-connected to different art industries." ; ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="card row">
    <div class="text-section column">
      <h2><?php echo qtranxf_getLanguage() === "zh" ? "合作機構" : "Client list" ; ?></h2>
      <span class="frame-line">_</span>
      <div class="client-logos column large-8 large-offset-2 medium-10 small-centered text-center"><?php
        $clientLogoArray = $corp_pod->field('client_logos');
        foreach ($clientLogoArray as $logo) { 
          $alt_text = get_post_meta($logo["ID"], '_wp_attachment_image_alt', true); ?>
          <a href="<?php
          if ($alt_text !== "") {
            echo "http://" . $alt_text;
          } else {
            echo "#";
          }?>">
            <img src="<?php echo pods_image_url($logo, 'full') ?>" />
          </a>
        <?php } ?>
      </div>
    </div>
  </div>

</div>
<?php get_footer(); ?>
