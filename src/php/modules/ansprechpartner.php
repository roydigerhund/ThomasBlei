<div class="ansprechpartner">
  
  <div class="image">
    <img src="<?php the_sub_Field('bild'); ?>" alt="<?php the_sub_Field('headline'); ?>">
  </div>
  
  <div class="content">
    <div class="overline">
      <?php the_sub_Field('overline'); ?>
    </div>
    <div class="headline">
      <?php the_sub_Field('headline'); ?>
    </div>
    
    <?php the_sub_Field('text'); ?>
    
    <div class="actions">
      <a class="email" href="mailto:<?php the_sub_Field('email'); ?>" title="E-Mail schreiben">E-Mail schreiben</a>
      <a class="phone" href="tel:<?php the_sub_Field('telefon'); ?>" title="<?php the_sub_Field('telefon'); ?>"><?php the_sub_Field('telefon'); ?></a>
    </div>
    
  </div>
  
</div>