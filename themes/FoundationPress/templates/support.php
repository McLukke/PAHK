<?php
/*
Template Name: Support
*/
get_header(); ?>

<div id="support">

  <div class="row page-title">
    <h1 class="strike"><span><?php echo qtranxf_getLanguage() === "zh" ? "加入及支持" : "SUPPORT" ; ?></span></h1>
  </div>

  <div class="card row">
    <div class="text-section column large-10 large-offset-1">
      <h2><?php echo qtranxf_getLanguage() === "zh" ? "香港公共藝術" : "Public Art Hong Kong" ; ?></h2>
      <span class="subheader"><?php echo qtranxf_getLanguage() === "zh" ? "一個非牟利組織，旨於推廣公共藝術在香港的發展" : "is a nonprofit organization that relies on various funding sources for public art programmes" ; ?></span>
      <span class="frame-line">_</span>
      <p class="text-block column large-6 medium-8 text-center small-centered"><?php echo qtranxf_getLanguage() === "zh" ? "支持香港公共藝術!是你的支持讓我們持續將公共藝術帶到不同的地方。你可以從以下四種方式支持我們:" : "YES for supporting Public Arts Hong Kong! Your great help ensures that we have the resources needed to present outstanding programmes and enriching educational projects. To support us through any of the four ways below,  please email:" ; ?></p>
      <a href="#" class="button cta button-single">support@publicart.org.hk</a>


      <div class="row explanatory-block">
        <div class="column large-4 medium-4 text-center">
          <img class="block-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-support-fund.png">
          <div class="explanatory-text">
            <h4><span class="letter-list">A.</span><?php echo qtranxf_getLanguage() === "zh" ? "全年基金" : "Annual fund" ; ?></h4>
            <p><?php echo qtranxf_getLanguage() === "zh" ? "你的捐助能夠幫助PAHK更長遠的發展。根據香港稅務條例，只要你於該財政年度之總捐款額達港幣一百元或以上，你的捐款便可以憑收據申請扣減稅項。" : "Your tax-deductible gift supports all of PAHK’s activities." ; ?></p>
          </div>
        </div>
        <div class="column large-4 medium-4 text-center">
          <img class="block-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-support-gift.png">
          <div class="explanatory-text">
            <h4><span class="letter-list">B.</span><?php echo qtranxf_getLanguage() === "zh" ? "藝術品捐助" : "Send a gift" ; ?></h4>
            <p><?php echo qtranxf_getLanguage() === "zh" ? "透過你的捐助，PAHK將最好的公共藝術帶到世界不同各地。" : "Your generous donations make it possible for PAHK to continue presenting the very best public art to the world." ; ?></p>
          </div>
        </div>
        <div class="column large-4 medium-4 text-center">
          <img class="block-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-support-volunteer.png">
          <div class="explanatory-text">
            <h4><span class="letter-list">C.</span><?php echo qtranxf_getLanguage() === "zh" ? "義工參與" : "Volunteer" ; ?></h4>
            <p><?php echo qtranxf_getLanguage() === "zh" ? "PAHK 過去與許多優秀的義工合作，推動更多元的公共藝術節目和藝術教育。" : "PAHK relies on the skills and expertise of committed and energetic volunteers, thank you so much for walking this journey with us." ; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row page-title">
    <h1 class="strike"><span><?php echo qtranxf_getLanguage() === "zh" ? "合作" : "Connect" ; ?></span></h1>
  </div>

  <div class="card row">
    <div class="text-section column large-10 large-offset-1">
      <div class="row explanatory-block explanatory-block-2">
        <div class="column large-4 large-offset-0 medium-8 medium-offset-2 text-center">
          <img class="block-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-support-corporates.png">
          <div class="explanatory-text">
            <h4><?php echo qtranxf_getLanguage() === "zh" ? "企業" : "Corporates" ; ?></h4>
            <p><?php echo qtranxf_getLanguage() === "zh" ? "洽詢PAHK客戶支援團隊，與我們分享你的新想法! 讓PAHK深入研究, 帶給你驚喜!" : "We are excited to kick-start our project with you, let us know your thoughts, we will be in touch very soon." ; ?></p>
            <div>
              <a href="#" class="button cta inner-button">corporates@publicart.org.hk</a>
            </div>
          </div>
        </div>
        <div class="column large-4 large-offset-0 medium-8 medium-offset-2 text-center">
          <img class="block-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-support-artists.png">
          <div class="explanatory-text">
            <h4><?php echo qtranxf_getLanguage() === "zh" ? "藝術家" : "Artists" ; ?></h4>
            <p><?php echo qtranxf_getLanguage() === "zh" ? "我們迫不及待欣賞你的作品！將你的作品集及項目想法電郵給我們，有合適的機會時，我們立刻聯絡你。" : "We can’t wait to see your work! Send us your ideas and portfolio and we will contact you when an opportunity arise!" ; ?></p>
            <div>
              <a href="#" class="button cta inner-button">artists@publicart.org.hk</a>
            </div>
          </div>
        </div>       
        <div class="column large-4 large-offset-0 medium-8 medium-offset-2 text-center">
          <img class="block-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-support-inquire.png">
          <div class="explanatory-text">
            <h4><?php echo qtranxf_getLanguage() === "zh" ? "諮詢" : "Inquiries" ; ?></h4>
            <p><?php echo qtranxf_getLanguage() === "zh" ? "有任何問題，請立刻聯絡PAHK客戶支援團隊。" : "Got questions? <br> Let us know." ; ?></p>
            <div>
              <a href="#" class="button cta inner-button inner-button-3">info@publicart.org.hk</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php get_footer(); ?>