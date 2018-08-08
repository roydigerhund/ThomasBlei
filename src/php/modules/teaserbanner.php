<div class="teaserbanner">

  <?php if(have_rows('banner')): ?>
    <div class="banners">
      <?php while(have_rows('banner')): the_row(); ?>

        <div class="banner" style="background-image: url('<?php the_sub_field('bild'); ?>')">

          <div class="contentWrapper">

            <div class="content">

              <div class="overline <?php the_sub_field('textfarbe'); ?>">
                <?php the_sub_field('overline') ?>
              </div>
              <h2 class="headline <?php the_sub_field('textfarbe'); ?>">
                <?php the_sub_field('headline') ?>
              </h2>

              <div class="textblocks">
                <div class="text">
                  <p class="<?php the_sub_field('textfarbe'); ?>"><?php the_sub_field('text') ?></p>
                </div>
                <div class="list <?php the_sub_field('textfarbe'); ?>">
                  <?php the_sub_field('liste') ?>
                </div>
              </div>

              <?php if ($link = get_sub_field('link')): ?>
                <a class="link <?php the_sub_field('textfarbe'); ?>" href="<?php echo $link['url']; ?>" title="<?php the_sub_field('headline'); ?>" target="<?php echo $link['target']; ?>">
                  <?php echo $link['title']; ?>
                </a>
              <?php endif; ?>
            </div>

          </div>

        </div>

      <?php endwhile; ?>
    </div>
  <?php endif; ?>

</div>
