<div class="icons <?php the_sub_field('stil'); ?> <?php the_sub_field('hintergrund'); ?>">
  
  <div class="content">
    
    <?php if(get_sub_field('overline')): ?>
      <div class="overline">
        <?php the_sub_field('overline'); ?>
      </div>
    <?php endif; ?>
    <div class="headline">
      <?php the_sub_field('headline'); ?>
    </div>
    
    <?php if(have_rows('icons')): ?>
      <div class="icons">
        <?php while(have_rows('icons')): the_row(); ?>
          
          <div class="icon">
            
            <img src="<?php the_sub_field('icon'); ?>" alt="Icon">
            
            <div class="text">
              <?php the_sub_field('text'); ?>
            </div>
            
          </div>
          
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    
  </div>
  
</div>