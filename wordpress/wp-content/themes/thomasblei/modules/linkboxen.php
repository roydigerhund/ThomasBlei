<div class="linkboxen">
  
  <?php if(have_rows('boxen')): ?>
    <div class="boxen">
      <?php while(have_rows('boxen')): the_row(); ?>
        
        <?php if ($link = get_sub_field('link')): ?>
          <a class="box <?php the_sub_field('textfarbe'); ?>" href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>">
            <img src="<?php the_sub_field('icon') ?>" alt="<?php echo $link['title'] ?>">
            <span><?php echo $link['title']; ?></span>
          </a>
        <?php endif; ?>
        
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
  
</div>