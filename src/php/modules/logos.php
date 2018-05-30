<div class="logos" style="background-color: <?php the_sub_field('hintergrundfarbe'); ?>">

  <?php if(have_rows('logos')): ?>
    <div class="wrapper">
      <?php while(have_rows('logos')): the_row(); ?>
        
        <div class="logo">
          
          <?php if ($image = get_sub_field('logo')): ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
          <?php endif; ?>        
          
        </div>
        
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

</div>