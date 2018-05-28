<div class="teaserboxen <?php the_sub_field('layout'); ?>">
  
  <?php if(get_sub_field('headline')): ?>
    <div class="top">
      
      <div class="text">
        <div class="headline">
          <?php the_sub_field('headline'); ?>
        </div>
        <?php if (get_sub_field('subline')): ?>
          <div class="subline">
            <?php the_sub_field('subline'); ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($link = get_sub_field('link')): ?>
        <a class="link" href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>">
          <?php echo $link['title']; ?>
        </a>
      <?php endif; ?>
      
    </div>
  <?php endif; ?>
  
  <?php if(have_rows('boxen')): ?>
    <div class="boxen">
      <?php while(have_rows('boxen')): the_row(); ?>
        
        <div class="box">
          
          <div class="bg" style="background-image: url('<?php the_sub_field('bild'); ?>')"></div>
          
          <div class="content">
            <div>
              <div class="overline <?php the_sub_field('textfarbe'); ?>">
                <?php the_sub_field('overline') ?>
              </div>
              <div class="headline <?php the_sub_field('textfarbe'); ?>">
                <?php the_sub_field('headline') ?>
              </div>
            </div>
            
            <?php if ($link = get_sub_field('link')): ?>
              <a class="fullLink <?php the_sub_field('textfarbe'); ?>" href="<?php echo $link['url']; ?>" title="<?php the_sub_field('headline'); ?>" target="<?php echo $link['target']; ?>"></a>
              <a class="link <?php the_sub_field('textfarbe'); ?>" href="<?php echo $link['url']; ?>" title="<?php the_sub_field('headline'); ?>" target="<?php echo $link['target']; ?>">
                <?php echo $link['title']; ?>
              </a>
            <?php endif; ?>
          </div>
          
        </div>
        
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
  
</div>