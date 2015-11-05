<?php
/*
Template Name: About
*/

get_header(); ?>

<?php get_template_part( 'parts/featured-image' ); ?>

<div id="about">
  <div class="row page-title">
    <h1 class="strike"><span><?php echo qtranxf_getLanguage() === "zh" ? "關於PAHK" : "ABOUT PAHK" ; ?></span></h1>
  </div>

  <div class="row"><?php
    $params = array ('limit' => -1);
    $aboutpod = pods('aboutsettings', $params);
    $chosenID = $aboutpod->display('post_id');

    // WP_Query arguments
    $args = array (
      'p' => $chosenID,
      'post_type' => array( 'projects' ),
    );

    // The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();

        $about_banner_image = $aboutpod->display('banner_image') ? $aboutpod->display('banner_image') : pods_field_display('projects', get_the_ID(), 'banner_image'); ?>
        <div class="inner-page-banner" style="background-image:url(<?php echo $about_banner_image; ?>)">
          <a href="<?php echo the_permalink(); ?>" class="inner-artwork-overview large-4 large-offset-1 medium-6 medium-offset-1 show-for-medium-up">
            <h5><?php if ( qtranxf_getLanguage() === "zh" && pods_field_display ('projects', get_the_ID(), 'location_zh') != '' ) {
                echo pods_field_display ('projects', get_the_ID(), 'location_zh');
              } else {
                echo pods_field_display ('projects', get_the_ID(), 'location');
              } ?></h5>
            <h6><?php 
              echo date_i18n( 'F', strtotime( pods_field_display ('projects', get_the_ID(), 'display_from')) );
            ?> - <?php
              echo date_i18n( 'F Y', strtotime(pods_field_display ('projects', get_the_ID(), 'display_until')) );
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

  <div class="card row">
    <div class="text-section column">
      <h2>Welcome to PAHK</h2>
      <span class="subheader">The leading public art promoting organization in Hong Kong</span>
      <span class="frame-line">_</span>
      <p class="text-block column large-6 medium-8 text-center small-centered">Public Art Hong Kong (PAHK) is a non-profit organization funded by the Y.K.Pao Foundation with an aim to nurture and promote public art in Hong Kong. It was incorporated in 2005 with the Hong Kong Arts Centre as its executing organization. PAHK wishes to create an interactive relationship among the artwork, site and audience and intends to reflect public interests while featuring Hong Kong as a vibrant cultural city.</p>
    </div>
    <div class="column medium-6">
      <h4 class="subheader-strike"><span><?php echo qtranxf_getLanguage() === "zh" ? "企業項目" : "Corporate projects" ; ?></span></h4>
      <a href="<?php echo get_home_url(); ?>/corporates" class="button cta"><?php echo qtranxf_getLanguage() === "zh" ? "與PAHK合作" : "Partner with PAHK" ; ?></a>
    </div>
    <div class="column medium-6">
      <h4 class="subheader-strike"><span><?php echo qtranxf_getLanguage() === "zh" ? "徵集藝術家" : "Call for artists" ; ?></span></h4>
      <a href="<?php echo get_home_url(); ?>/artists" class="button cta"><?php echo qtranxf_getLanguage() === "zh" ? "提交項目意向" : "Proposal Submissions" ; ?></a>
    </div>
  </div>

  <div class="card row">
    <div class="text-section column">
      <h2><?php echo qtranxf_getLanguage() === "zh" ? "董事会会议员" : "Board of Councillors" ; ?></h2>
      <span class="frame-line">_</span>
      <div class="row">
        <div class="column large-6 large-centered text-center">
          <p><?php
          $board_string = $aboutpod->display('councillors');
          $board = explode(";", $board_string);
          foreach ($board as $member) {
            echo $member;
          } ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="card row">
    <div class="text-section column">
      <h2><?php echo qtranxf_getLanguage() === "zh" ? "使命" : "Mission" ; ?></h2>
      <span class="frame-line">_</span>
      <ol class="text-block column large-6 medium-8 small-centered custom-counter">
        <li><?php echo qtranxf_getLanguage() === "zh" ? "藝術應為每一個人所能觸及，而非受局限於博物館、畫廊及私人收藏；" : "Art should be accessible to everyone rather than being confined within the walls of museums, galleries and private collections;" ; ?></li>
        <li><?php echo qtranxf_getLanguage() === "zh" ? "為公共空間注入生氣，鏈接不同社區，建立社群精神及賦予社區身分；" : "To breathe life to public space and bring people of the community together, creating communal spirit and identity;" ; ?></li>
        <li><?php echo qtranxf_getLanguage() === "zh" ? "反映社會價值及文化發展觀念；" : "To reflect the value of the society and its conscience of cultural development;" ; ?></li>
        <li><?php echo qtranxf_getLanguage() === "zh" ? "基於香港可用於藝術發展的空間有限，香港公共藝術提供機會讓本地藝術家在更大的空間發揮創造力；" : "PAHK gives opportunities to Hong Kong artists to think and create in terms of large space which otherwise is not feasible within their own small and confined studio;" ; ?></li>
        <li><?php echo qtranxf_getLanguage() === "zh" ? "向外界展示香港不僅是一個經濟繁榮的城市，也充斥著對藝術和文化的追求。" : "To showcase to the world that Hong Kong is not only thriving economically but also throbbing with artistic pursuits." ; ?></li>
      </ol>
    </div>
  </div>

  <div class="card row">
    <div class="text-section how-it-works column large-10 large-offset-1">
      <h2><?php echo qtranxf_getLanguage() === "zh" ? "PAHK如何運作" : "How it works" ; ?></h2>
      <span class="frame-line">_</span>
      <div class="row explanatory-blocks">
        <div class="column large-4 medium-6 text-center">
          <h4><?php echo qtranxf_getLanguage() === "zh" ? "藝術顧問諮詢" : "Art Consultancy" ; ?></h4>
          <p><?php echo qtranxf_getLanguage() === "zh" ? "PAHK顧問為合作機構提供一站式項目管理服務。建立獨特的項目，將藝術帶到你的空間。透過給予政府和商業機構諮詢服務，配以合適的藝術作品或委約方案，於特定的公共場地實踐公共藝術計劃。" : "Our consultants are experts in creating distinctive projects with you from start to finish, bringing art into your space, promoting public art in a diversified form." ; ?></p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4><?php echo qtranxf_getLanguage() === "zh" ? "藝術收藏" : "Artwork Acquisition" ; ?></h4>
          <p><?php echo qtranxf_getLanguage() === "zh" ? "PAHK與許多本地新興藝術家共同合作。我們的顧問會依據你的概念選擇合適的藝術品，並負責探索、管理以及安裝的過程。" : "We work closely with emerging artists in Hong Kong. Our  consultants select original artworks based on your preference, coordinating the selection, acquisition, and installation of the artwork." ; ?></p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4><?php echo qtranxf_getLanguage() === "zh" ? "藝術品委託" : "Artwork Commission" ; ?></h4>
          <p><?php echo qtranxf_getLanguage() === "zh" ? "與PAHK一同經歷將一個藝術概念實現的過程。我們的顧問與你一同委託藝術家創作配合你的空間及概念的藝術品。諮詢各方技術專家，以保障作品裝置的安全、穩固和維修事宜。" : "We enable you to experience the excitement of bringing an art concept to life. Our consultants work with you to commission artists to create an artwork that interact visually with the environment of your space as well as your vision." ; ?></p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4><?php echo qtranxf_getLanguage() === "zh" ? "導賞團" : "Docent Tours" ; ?></h4>
          <p><?php echo qtranxf_getLanguage() === "zh" ? "為了讓公眾可從多角度瞭解公共藝術，香港藝術中心的導賞員帶領參加者探索公共藝術製作過程以及香港藝術中心一些不為人知的故事。" : "Art education is important to us. Together with our partner we offer specially designed free docent tours for you to enjoy the artistic journey and behind-the-scene stories at the Hong Kong Arts Centre." ; ?></p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4><?php echo qtranxf_getLanguage() === "zh" ? "享受公共空間" : "Playing with Space" ; ?></h4>
          <p><?php echo qtranxf_getLanguage() === "zh" ? "我們樂於為公共空間注入生氣，鏈接不同社區，建立社群精神及賦予社區身分。" : "We enjoy breathing life to public space and bring people of the community together; proactively, we commission talented artist to create new art for our space and interesting spaces in Hong Kong." ; ?></p>
        </div>
        <div class="column large-4 medium-6 text-center">
          <h4><?php echo qtranxf_getLanguage() === "zh" ? "度身訂造" : "Tailor Made" ; ?></h4>
          <p><?php echo qtranxf_getLanguage() === "zh" ? "PAHK是公共藝術的宣傳者及中介者，提供策劃方針、專業藝術知識和技術團隊，以及定期更新的公共藝術資料庫。我們的洞察力，知識與經驗，成就了我們專業的水平，策劃與社區產生對話、與當代產生共鳴的公共藝術項目。" : "It’s the insight, knowledge together with experience that give us the expertise in curating public art project that speak to the people and resonate with the contemporary." ; ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="card row">
    <div class="text-section">
      <h2><?php echo qtranxf_getLanguage() === "zh" ? "執行機構" : "Executing Organization" ; ?></h2>
      <span class="frame-line">_</span>
      <h4 class="text-center"><?php echo qtranxf_getLanguage() === "zh" ? "香港艺术中心" : "Hong Kong Arts Center" ; ?></h4>
    </div>
  </div>
</div>

<?php // Restore original Post Data
wp_reset_postdata();

get_footer(); ?>
