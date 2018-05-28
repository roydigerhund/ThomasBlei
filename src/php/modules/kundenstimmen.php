<div class="kundenstimmen" style="background-image: url('<?php the_sub_field('bild'); ?>');" id="<?php echo 'ks' . rand(0,1000); ?>">
  
  <div class="titleWrapper">
    <div class="title">
      <?php the_sub_field('titel') ?>
    </div>
  </div>
  
  <?php if(have_rows('stimmen')): ?>
    <div class="slides">
      <?php $count = 0; while(have_rows('stimmen')): the_row(); $count++; ?>
        
        <div class="slide <?php if($count == 1) echo 'active'; ?>">
          
          <div class="content">
            <blockquote class="white">
              <?php the_sub_field('text') ?>
            </blockquote>
            
            <div class="name white">
              <?php the_sub_field('name') ?>
            </div>
            
            <div class="subline white">
              <?php the_sub_field('subline') ?>
            </div>
            
          </div>
          
        </div>
        
      <?php endwhile; ?>
    </div>
    
    <div class="dots">
      <?php $count = 0; while(have_rows('stimmen')): the_row(); $count++; ?>
        <div class="dot <?php if($count == 1) echo 'active'; ?>"></div>
      <?php endwhile; ?>
    </div>
    
  <?php endif; ?>
  
  
</div>