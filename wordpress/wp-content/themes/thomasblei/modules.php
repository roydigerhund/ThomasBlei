<div class="modulesWrapper clearfix">
  
  <?php if( have_rows('module') ): ?>
    
    <?php while ( have_rows('module') ) : the_row(); ?>
    
      <?php get_template_part( 'modules/' . get_row_layout() ); ?>
      
    <?php endwhile; ?>
    
  <?php else: ?>
    
    <!-- <h1>Es wurden keine Inhalte gefunden</h1> -->
    
  <?php endif; ?>
  
</div>