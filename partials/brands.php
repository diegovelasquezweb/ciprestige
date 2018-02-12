<div class="container">
<h2>Nuestras Marcas</h2>
  <div class="brands__slider">
  <?php  while ( have_rows('marcas') ) : the_row(); ?>
    <div class="brands_slider--item centerBox"><img src="<?php the_sub_field('imagen_marcas', 'url'); ?>" alt=""></div>
    <?php endwhile; ?>
  </div>
</div>


