<div class="header_banner <?php if(!get_sub_field('bild')) echo ' noImage' ?>">

  <div class="image <?php the_sub_field('hoehe'); ?>" style="background-image: url('<?php the_sub_field('bild'); ?>')"></div>

  <div class="contentWrapper">

    <div class="content">

      <div class="overline <?php the_sub_field('headline_farbe'); ?>">
        <?php the_sub_field('overline'); ?>
      </div>

      <div class="headline <?php the_sub_field('headline_farbe'); ?>">
        <?php the_sub_field('headline'); ?>
      </div>

      <?php if (($link = get_sub_field('link')) && get_sub_field('hoehe') == 'gross'): ?>
        <a class="link <?php the_sub_field('headline_farbe'); ?>" href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>">
          <?php echo $link['title']; ?>
        </a>
      <?php endif; ?>

    </div>

    <?php display_breadcrumb(); ?>

  </div>

</div>
