<div class="textblock_liste">
  
  <?php if(have_rows('texte')): ?>
    <div class="texte">
      <?php while(have_rows('texte')): the_row(); ?>
        
        <div class="text small">
          
          <div class="headline <?php the_sub_field('textfarbe'); ?>">
            <?php the_sub_field('headline') ?>
          </div>
          
          <?php the_sub_field('text') ?>
          
        </div>
        
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
  
</div>