<div class="close-modal close-menuMobile">
<i class="fa fa-close"></i>
</div>
<li>
    <a href="<?= get_home_url() ?>/">inicio</a>
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

               <div class="separator"></div>
          
                    <li>
                  <a href="<?= get_home_url() ?>/nosotros"><i class="fa fa-users" aria-hidden="true"></i> Nosotros</a>
                </li>
                <li>
               <a href="" class="catalogo"><i class="fa fa-download "></i> Catálogo digital</a> 
               </li>
                <li>
                  <a href="<?= get_home_url() ?>/tienda"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Tienda</a>
                </li>
                
                <li>
                  <a href="<?= get_home_url() ?>/distribuidores"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Distribuidores</a>
                </li>
                <li>
                <a href=""><i class="fa fa-user" aria-hidden="true"></i> Mi cuenta</a>
                  <!-- <a href="<?= get_home_url() ?>/my-account">Mi cuenta</a> -->
                </li>
         

               <!-- <li> 	<a href="">Politica de Garantías</a>       </li>
               <li>	<a href="">Política de Calidad</a>       </li>
               <li>	<a href="">Política de tratamiento de datos</a>       </li> -->
               <li>
                  <a href="<?= get_home_url() ?>/cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Carrito de compras</a>
                </li>
               <li>
                  <a class="open-contact"><i class="fa fa-envelope" aria-hidden="true"></i> Contacto</a>
                </li>
                <div class="social">
Síguenos en:

                   <div class="grid--start">

<a href="" class="social--link centerBox"><i class="fa fa-facebook"></i></a>
<a href="" class="social--link centerBox m-l-2"><i class="fa fa-instagram"></i></a>
</div>
                </div>
             