<?php 

$classes = "";
if (get_sub_field('titel')) $classes .= " tt";
if (get_sub_field('bild')) $classes .= " bg";
if (get_sub_field('hintergrund')) $classes .= " fbg";
if (get_sub_field('vertikal_zentrieren')) $classes .= " cvt";

?>

<div class="zweispaltiger_inhalt <?php echo $classes; ?>" style="background-image: url(<?php the_sub_field('bild'); ?>); background-color: <?php the_sub_field('hintergrund'); ?>;">
  
  <div class="content <?php if (get_sub_field('mobile_reverse')) echo "reverse"; ?> <?php the_sub_field('layout'); ?> <?php the_sub_field('textfarbe'); ?>">
    
    <?php if (get_sub_field('titel')): ?>
      <div class="title">
        <?php the_sub_field('titel'); ?>
      </div>
      <div class="clearfix"></div>
    <?php endif; ?>
    
    <?php if (get_sub_field('mobile_reverse')): ?>
      <div class="right">
        <?php displayTwoColumnContent(get_sub_field('inhalt_rechts')); ?>
      </div>
      
      <div class="left">
        <?php displayTwoColumnContent(get_sub_field('inhalt_links')); ?>
      </div>
    <?php else: ?>
      <div class="left">
        <?php displayTwoColumnContent(get_sub_field('inhalt_links')); ?>
      </div>
      
      <div class="right">
        <?php displayTwoColumnContent(get_sub_field('inhalt_rechts')); ?>
      </div>
    <?php endif; ?>
    
  </div>
  
  <?php if(get_sub_field('bild')): ?>
    <style>
    @media (max-width: 850px) {
      .zweispaltiger_inhalt {
        background-position: <?php the_sub_field('background_posx_mobile'); ?> top;
        background-size: <?php the_sub_field('background_width_mobile'); ?> auto;
      }
    }
    </style>
  <?php endif; ?>
  
</div>