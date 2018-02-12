<h2>Productos Destacados</h2>
<div class="container grid--start">


  <?php
$args = array(
	'posts_per_page' => -1,
	'post_type'      => 'product',
	'post_status'    => 'publish',
	'tax_query'      => array(
		array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => 'featured',
			'operator' => 'IN',
			),
		)  
);
$featured_product = new WP_Query( $args );
if ( $featured_product->have_posts() ) : 
echo '';
while ( $featured_product->have_posts() ) : $featured_product->the_post();
$post_thumbnail_id     = get_post_thumbnail_id();
$product_thumbnail     = wp_get_attachment_image_src($post_thumbnail_id, $size = 'shop-feature');
$product_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
?>
    <div class="product product--feautured wow fadeInUp">
      <a href="<?php the_permalink();?>">
			<img src="<?php echo $product_thumbnail[0];?>" alt="<?php echo $product_thumbnail_alt;?>">
            <h3 class="woocommerce-loop-product__title"><?php the_title();?></h3>
            <?php 
                global $product;
                if ($product->is_type( 'simple' )) { ?>
              

    
                <?php } ?>
                <?php 
                if($product->product_type=='variable') {
                    $available_variations = $product->get_available_variations();
$count = count($available_variations)-1;
                    $variation_id=$available_variations[$count]['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
                    $variable_product1= new WC_Product_Variation( $variation_id );
                    $regular_price = $variable_product1 ->regular_price;
                    $sales_price = $variable_product1 ->sale_price;
                    }
                ?>
        <div class="price">
        <?php echo $product->get_price_html(); ?>

        </div>
            
           <?php if($product->is_on_sale()) : ?>
<div class="sale--tag">Oferta</div>
<?php endif; ?>
			<div class="btn">Ver Producto</div>
		</a>
        </div>
    <?php  endwhile; echo '';endif; wp_reset_query(); ?>
    </div>