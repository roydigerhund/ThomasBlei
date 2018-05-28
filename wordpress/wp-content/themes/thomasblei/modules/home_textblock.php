<div class="home_textblock">
  
  <div class="title">
    <?php the_sub_field('titel') ?>
  </div>
  
  <div class="clearfix">
    
    <div class="text">
      <div class="first">
        <?php the_sub_field('inhalt_oben'); ?>
      </div>
      <div class="desktop">
        <div class="second">
          <?php the_sub_field('inhalt_unten'); ?>
        </div>
        
        <?php if ($link = get_sub_field('link')): ?>
          <a class="link" href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>">
            <?php echo $link['title']; ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
    
    <?php if(have_rows('boxen')): ?>
      <div class="boxen">
        <?php while(have_rows('boxen')): the_row(); ?>
          
          <div class="box">
            
            <div class="image">
              <?php if ($image = get_sub_field('bild')): ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
              <?php endif; ?>
            </div>
            
            <div class="content small">
              <?php the_sub_field('inhalt') ?>
            </div>
          </div>
          
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    
    <div class="text tablet">
      <div class="second">
        <?php the_sub_field('inhalt_unten'); ?>
      </div>
      
      <?php if ($link = get_sub_field('link')): ?>
        <a class="link" href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>">
          <?php echo $link['title']; ?>
        </a>
      <?php endif; ?>
    </div>
    
    <?php if ($link = get_sub_field('link')): ?>
      <a class="mobileLink" href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>">
        <?php echo $link['title']; ?>
      </a>
    <?php endif; ?>
    
  </div>
  
</div>