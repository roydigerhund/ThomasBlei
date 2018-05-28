<?php

  // Breadcrumb
  require_once('includes/breadcrumb.php');
  
  // Custom Options Page
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title' => 'Optionen',
      'post_id' => 'options',
      'update_button'		=> __('Aktualisieren', 'acf'),
      'updated_message'	=> __("Optionen aktualisiert", 'acf'),  
    ));    
  }

  //MENUS
  function register_my_menus() {
    register_nav_menus(
      array(
        'mainNav' => __( 'Main Navigation' ),
        'footerNav' => __( 'Footer Navigation' ),
        'bottomNav' => __( 'Bottom Navigation' ),
      )
    );
  }
  add_action( 'after_setup_theme', 'register_my_menus' );

  function my_wp_nav_menu_objects( $items, $args ) {    
    // loop
    foreach( $items as &$item ) {
      // vars
      $overline = get_field('overline', $item);
      $textfarbe = get_field('textfarbe', $item);
      $bild = get_field('bild', $item);
      // append icon
      if( $bild ) {
        $item->title = "<span class='regSub'>".$item->title."</span><span class='bigSub' style='background-image: url(".$bild.")'><span class='overline ".$textfarbe."'>".$overline."</span><span class='headline ".$textfarbe."'>".$item->title."</span><span class='link ".$textfarbe."'>Erfahren Sie mehr</span></span>";  
      }  
    }
    return $items;
  }
  add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
  
  // WP TITLE
  function theme_functions() {
    add_theme_support( 'title-tag' );  
  }
  add_action( 'after_setup_theme', 'theme_functions' );
  
  // always add title attr to menus
  function add_title_attr($link)
  {
    // you can get the url and link text.
    preg_match("/.*?href=\"?'?(.*?)\"?'?>(.*?)</",$link,$m);
    $url=$m[1];
    $link_text=$m[2];

    return strstr($link,"href",true)." title='" . $link_text . "'" .strstr($link,"href");
  }
  add_filter("walker_nav_menu_start_el","add_title_attr");

  // overwrite default image sizes
  add_image_size( 'thumbnail', 320, 280, true );
  add_image_size( 'medium', 420, 900, false );
  add_image_size( 'large', 9999, 9999, false );

  // LIGHTBOX FOR GALLERYS
  function lightbox_link ($content, $id) {
    $att = get_post( $id );
    $content = preg_replace("/<a/","<a data-lightbox=\"galerie\" title=\"".$att->post_title."\"",$content,1);
    return $content;
  }
  add_filter( 'wp_get_attachment_link', 'lightbox_link', 10, 5);

  // remove gallery inline css
  add_filter( 'use_default_gallery_style', '__return_false' );

  // Disable Emojis
  function disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
      return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
      return array();
    }
  }
  function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
  }
  add_action( 'init', 'disable_wp_emojicons' );
  
  // SVG Support
  function kb_svg ( $svg_mime ){
    $svg_mime['svg'] = 'image/svg+xml';
    return $svg_mime;
  }
  add_filter( 'upload_mimes', 'kb_svg' );

  // Memory Limit Error Fix in Wordpress Editing
  // Active and delete old Revisions, if everything works -> deactivate
  function jb_pre_get_posts( WP_Query $wp_query ) {
    $wp_query->set( 'update_post_meta_cache', false );
  }
  // Only do this for admin
  if ( is_admin() ) {
    // add_action( 'pre_get_posts', 'jb_pre_get_posts' );
  }

  // echo Content helper function
  function displayTwoColumnContent($content) {
    preg_match('/<p>(<img.*fullBG.*src="(.*?)".*>)<\/p>/', $content, $matches);
    if (count($matches) > 1 ) {
      echo '<div class="fullBGWrapper" style="background-image: url(' . $matches[2] . ');">' . $matches[1] . '</div>';
    } else {
      echo $content;
    }
  }

?>
