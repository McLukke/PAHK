<?php
/*
Template Name: Artists
*/
get_header(); ?>

<div id="artists">

  <div class="row page-title">
    <h1 class="strike"><span><?php echo qtranxf_getLanguage() === "zh" ? "藝術家徵集" : "For Artists" ; ?></span></h1>
    <span class="subheader"><?php echo qtranxf_getLanguage() === "zh" ? "PAHK提供機會讓本地及國際藝術家在更大的空間發揮創造力" : "TO THE ARTISTICALLY INCLINDED.<br />Why PAHK and the partnership process." ; ?></span>
  </div>

  <div class="row"><?php
    $params = array ('limit' => -1);
    $artist_pod = pods('artistsettings', $params);
    $topArtistID = $artist_pod->display('top_project_id');
    $chosenJoinNetworkID = $artist_pod->display('join_network_id');
    $chosenCallArtistsID = $artist_pod->display('call_artists_id');

    // WP_Query arguments
    $args = array (
      'p' => $topArtistID,
      'post_type' => array( 'projects' ),
    );

    // The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();

        $top_banner_image = $artist_pod->display('top_banner') ? $artist_pod->display('top_banner') : pods_field_display('projects', get_the_ID(), 'banner_image'); ?>
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

  <div class="card row partner-card">
    <div class="text-section column large-6">
      <h2><?php echo qtranxf_getLanguage() === "zh" ? "加入我們" : "JOIN OUR NETWORK" ; ?></h2>
      <span class="frame-line">_</span>
      <div class="row partner-info">
        <div class="column">
            <h4 class="blue-header"><?php echo qtranxf_getLanguage() === "zh" ? "提交作品集及項目意向" : "Join by submitting your portfolio" ; ?></h4>
        </div>
        <div class="column">
          <p class="primary-desc"><?php echo qtranxf_getLanguage() === "zh" ? "使用PDF格式遞交以下資料:" : "With the following information in PDF:" ; ?></p><br>
          <ol class="text-block column large-10 medium-8 small-centered custom-counter">
            <li><?php echo qtranxf_getLanguage() === "zh" ? "三張清晰作品圖片" : "At least 3 high-rest images of artworks (150 dpi, over 2mb)" ; ?></li>
            <li><?php echo qtranxf_getLanguage() === "zh" ? "藝術家簡介" : "Artist statement" ; ?></li>
            <li><?php echo qtranxf_getLanguage() === "zh" ? "項目意向" : "Project ideas" ; ?></li>
            <li><?php echo qtranxf_getLanguage() === "zh" ? "聯絡資料 (電話,電郵)" : "Contact info" ; ?></li>
          </ol>
        </div>

        <div class="column corporate-cta">
          <a href="#" class="button cta"><?php echo qtranxf_getLanguage() === "zh" ? "立刻加入" : "Sign up now" ; ?></a>
          <a href="#" class="button cta"><?php echo qtranxf_getLanguage() === "zh" ? "了解更多" : "Learn more" ; ?></a>
        </div>
      </div>
    </div>
    <div class="partner-card-project-right text-section column large-6 show-for-large-up"><?php
      // WP_Query arguments
      $args = array (
        'p' => $chosenJoinNetworkID,
        'post_type' => array( 'projects' ),
      );

      // The Query
      $query = new WP_Query( $args );

      // The Loop
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          $join_network_banner = $artist_pod->display('join_network_banner') ? $artist_pod->display('join_network_banner') : pods_field_display('projects', get_the_ID(), 'banner_image'); ?>
          <div class="featured-project-vertical" style="background-image: url(<?php echo $join_network_banner; ?>);">
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

  <div class="card row partner-card">
    
    <div class="text-section column large-6 large-push-6">
      <h2><?php echo qtranxf_getLanguage() === "zh" ? "誠徵藝術家" : "Call for Artists" ; ?></h2>
      <span class="frame-line">_</span>
      <div class="row partner-info">
        <div class="column">
            <h4 class="blue-header"><?php echo qtranxf_getLanguage() === "zh" ? "合作流程" : "Timeline" ; ?></h4>
        </div>
        <div class="column">
          <p class="primary-desc"><?php echo qtranxf_getLanguage() === "zh" ? "提案" : "The Proposal" ; ?></p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered"><?php echo qtranxf_getLanguage() === "zh" ? "發揮創意,將你的想像帶進公共空間" : "The start of achieving your goal" ; ?></p>
          <span class="text-pipe"></span>
          <p class="primary-desc"><?php echo qtranxf_getLanguage() === "zh" ? "資源配對" : "The Match" ; ?></p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered"><?php echo qtranxf_getLanguage() === "zh" ? "尋找合適空間及相應贊助夥伴" : "Searching for a partner" ; ?></p>
          <span class="text-pipe"></span>
          <p class="primary-desc"><?php echo qtranxf_getLanguage() === "zh" ? "會面" : "The Meet" ; ?></p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered"><?php echo qtranxf_getLanguage() === "zh" ? "深化提案" : "Artwork discussion" ; ?></p>
          <span class="text-pipe"></span>
          <p class="primary-desc"><?php echo qtranxf_getLanguage() === "zh" ? "藝術品" : "The Work" ; ?></p>
          <p class="secondary-desc column large-8 medium-10 text-center small-centered"><?php echo qtranxf_getLanguage() === "zh" ? "創作過程" : "Artwork production" ; ?></p>
        </div>
        <!-- <div class="column corporate-cta">
          <a href="#" class="button cta">Learn More</a>
        </div> -->
      </div>
    </div>

    <div class="large-pull-6 partner-card-project-left text-section column large-6 show-for-large-up"><?php
      // WP_Query arguments
      $args = array (
        'p' => $chosenCallArtistsID,
        'post_type' => array( 'projects' ),
      );

      // The Query
      $query = new WP_Query( $args );

      // The Loop
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          $call_artists_banner = $artist_pod->display('call_artists_banner') ? $artist_pod->display('call_artists_banner') : pods_field_display('projects', get_the_ID(), 'banner_image'); ?>
          <div class="featured-project-vertical" style="background-image:url(<?php echo $call_artists_banner; ?>)">
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
    <div class="text-section how-it-works column large-10 large-offset-1">
      <h2>Why PAHK?</h2>
      <span class="frame-line">_</span>
      <div class="row explanatory-blocks">
        <div class="column large-4 medium-6 text-center">
          <h4>With full support</h4>
          <p><?php echo qtranxf_getLanguage() === "zh" ? "從創作概念開始, 預算, 批文到項目宣傳, 我們會諮詢各方專家、贊助夥伴與你一同見證藝術品的誕生。" : "From design concept, budgeting, legal issues and marketing. We engage with sponsors, partners and vendors to carve out a new artwork with you!" ; ?></p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4>Live your passion</h4>
          <p><?php echo qtranxf_getLanguage() === "zh" ? "燃點你的創意及才能，讓我們將為你的創意增加收入。" : "Fan your passion into flames, we provide a platform where you can earn an income with your talent." ; ?></p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4><?php echo qtranxf_getLanguage() === "zh" ? "增加曝光率" : "Visibility" ; ?></h4>
          <p><?php echo qtranxf_getLanguage() === "zh" ? "從2005年開始, 我們已與多達100位藝術家合作，與我們攜手將藝術帶到香港不同的角落!" : "We have presented more than a 100 artists since 2005, join our mission to bring art into the city space!" ; ?></p>
        </div>
      </div>
    </div>
  </div>

</div>

<?php get_footer(); ?>
