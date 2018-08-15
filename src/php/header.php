<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
<meta name="apple-mobile-web-app-capable" content="yes" />

<?php wp_head(); ?>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Droid+Serif:400" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=1.17" type="text/css" media="screen">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-59982420-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-59982420-7', { 'anonymize_ip': true });
</script>
</head>

<body>
    
  <div class="bigSubOverlay"></div>
  
  <div class="infotextOverlay"></div>

	<div class="headerWrapper">
    
    <div class="header">
      
      <a href="/" class="logo" title="<?php echo get_bloginfo('name') . ' – ' . get_bloginfo('description'); ?>">
        <span class="logoWrapper">
          <img src="<?php bloginfo('template_directory'); ?>/images/logo.svg" alt="<?php echo get_bloginfo('name'); ?>">
        </span>
      </a>
      
      <div class="menu <?php the_field('menu_farbe') ?>">
        <div class="menu-icon-wrapper">
          <div class="menu-icon">
            <div class="line-1 no-animation"></div>
            <div class="line-2 no-animation"></div>
            <div class="line-3 no-animation"></div>
          </div>
        </div>
        
        <?php wp_nav_menu( array('theme_location' => 'mainNav', 'menu_class' => '', 'container' => '' )); ?>
      </div>
      
    </div>
    
    <div class="mobileMenu">
      <div class="scrollWrapper">
        <?php wp_nav_menu( array('theme_location' => 'mainNav', 'menu_class' => '', 'container' => '' )); ?>
      </div>
    </div>
		
	</div>
