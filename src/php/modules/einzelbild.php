<div class="einzelbild" style="background-color: <?php the_sub_field('hintergrundfarbe'); ?>">



          <?php if ($image = get_sub_field('bild')): ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
          <?php endif; ?>

</div>
