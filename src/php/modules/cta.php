<div class="cta">

  <div class="text">
    <?php the_sub_field('text'); ?>
  </div>
  
  <?php if ($link = get_sub_field('link')): ?>
    <a class="link <?php the_sub_field('textfarbe'); ?>" href="<?php echo $link['url']; ?>" title="<?php the_sub_field('headline'); ?>" target="<?php echo $link['target']; ?>">
      <?php echo $link['title']; ?>
    </a>
  <?php endif; ?>

</div>