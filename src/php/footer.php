
  <div class="footerWrapper">

    <div class="footer">

      <div class="footerMenu">
        <?php wp_nav_menu( array('theme_location' => 'footerNav', 'container' => '' )); ?>
      </div>

      <div class="address mini">
        <img src="<?php bloginfo('template_directory'); ?>/images/footerLogo.svg" alt="<?php echo get_bloginfo('name'); ?>">
        <p>
          <b>Blei Immobilien & Verwaltung GmbH</b><br/>
          Spiesberg 21/8<br/>
          88279 Amtzell
        </p>
      </div>

      <div class="contact mini">
        <p>
          <b>Kontakt</b><br/>
          +49 (0)7520 94499-70<br/>
          <a href="mailto:info@blei-immobilien.de" title="E-Mail schreiben">info@blei-immobilien.de</a>
        </p>
      </div>

    </div>

  </div>

  <div class="bottomBarWrapper">
    <div class="bottomBar mini">

      <p>© <?php echo date("Y"); ?> Blei Immobilien & Verwaltung GmbH</p>

      <?php wp_nav_menu( array('theme_location' => 'bottomNav', 'container' => '' )); ?>

    </div>
  </div>

  <?php wp_footer(); ?>

  <style media="screen">
    <?php the_field('custom_css'); ?>
  </style>

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/script.js?v=1.0" ></script>

</body>
</html>
