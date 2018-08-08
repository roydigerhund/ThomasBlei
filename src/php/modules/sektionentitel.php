<div class="sektionentitel" id="<?php the_sub_field('id'); ?>">

  <div class="image">
    <div class="imageWrapper">
      <img src="<?php the_sub_field('bild'); ?>" alt="<?php the_sub_field('headline'); ?>">

      <?php if (get_sub_field('infotext')): ?>
        <div class="infoicon" style="right: <?php the_sub_field('info_pos_x'); ?>%; top: <?php the_sub_field('info_pos_y'); ?>%;">
          <svg width="8px" height="22px" viewBox="0 0 8 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Artboard-2" transform="translate(-21.000000, -14.000000)" fill="#FFFFFF">
                <path d="M25.7746649,18.9 C27.4996649,18.9 28.2996649,17.8 28.3246649,16.45 C28.3496649,15.5 27.6746649,14.5 26.3996649,14.5 C24.8496649,14.5 23.9246649,15.575 23.8496649,16.875 C23.7996649,17.9 24.7246649,18.9 25.7746649,18.9 M25.7996649,32.5 L27.3496649,21.35 L26.6996649,21.05 L21.8746649,21.7 L21.6746649,22.775 L23.0746649,23.525 C22.4496649,28.2 21.9996649,31.75 21.7246649,33.675 C21.5496649,34.725 22.4246649,35.5 24.1246649,35.5 C26.2246649,35.5 27.3996649,34.1 27.6746649,33.725 L27.3496649,32.875 C26.7746649,33.275 26.4996649,33.425 26.2246649,33.425 C25.8496649,33.425 25.6996649,33.1 25.7996649,32.5" id="info"></path>
              </g>
            </g>
          </svg>
        </div>
        <div class="sectionInfotext">
          <div class="triangle"></div>
          <?php the_sub_field('infotext'); ?>
        </div>
      <?php endif; ?>
    </div>

  </div>

  <h2 class="text">
    <b><?php the_sub_field('headline'); ?></b>
    <?php the_sub_field('subline'); ?>
  </h2>

</div>
