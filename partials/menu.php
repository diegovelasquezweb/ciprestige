<ul class="grid--center">
                <li class="" id="open-submenu">
                <a href="<?= get_home_url() ?>/">inicio</a>
                  <ul class="submenu grid">
                    <div class="submenu__container">
                    <li>
                  <a href="<?= get_home_url() ?>/nosotros">Nosotros</a>
                </li>
                <li>
                  <a href="<?= get_home_url() ?>/tienda">Tienda</a>
                </li>
                
                <li>
                  <a href="<?= get_home_url() ?>/distribuidores">Distribuidores</a>
                </li>
                <li>
                <a href="">Mi cuenta</a>
                  <!-- <a href="<?= get_home_url() ?>/my-account">Mi cuenta</a> -->
                </li>
                <li>
                  <a class="open-contact">Contacto</a>
                </li>
                    </div>
                    <?php
if( have_rows('publicidad_menu', 'option') ): while ( have_rows('publicidad_menu', 'option') ) : the_row(); ?>
                      <div class="sponsor "><a target="_blank" href="<?php the_sub_field('link_menu', 'option'); ?>"><img src="<?php the_sub_field('imagen_menu', 'option'); ?>" alt=""></a></div>
                        <?php endwhile; endif; ?>
                  </ul>
                </li>
                <?php
$args = array(

);
$product_categories = get_terms( 'product_cat', $args );
$count = count($product_categories);
if ( $count > 0 ){
    foreach ( $product_categories as $product_category ) { 
        echo '<li><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a></li>';
    }
} ?>
    

                
              </ul>