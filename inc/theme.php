<?php

add_filter('wwp_filter_wholesale_price_title_text', 'override_wholesale_text', 10, 1);
 
function override_wholesale_text($wholesaletext) {
    return 'Precio distribuidor:';
}
//@Yoast Seo Support
add_theme_support( 'title-tag' );

add_filter( 'wpseo_metabox_prio', 'jw_filter_yoast_seo_metabox' );
function jw_filter_yoast_seo_metabox() {
	return 'low';
}

//@ACF Json Support
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

//@Register menus
function register_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
    )
  );
}
add_action( 'init', 'register_menus' );

//@Options page

if( function_exists('acf_add_options_sub_page') ) {
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title' 	=> 'Mercadeo',
		'redirect' 		=> false,
		'position' 		=> 20,
		'icon_url' => 'dashicons-images-alt2', // Add this line and replace the second inverted commas with class of the icon you like
		'position' => 7
	
	));
}


// @Adds a very minimal toolbar to TinyEMC WYSIWYG
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
	$toolbars['Very  Simple' ] = array();
	$toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'underline', 'link' );
	return $toolbars;
}


add_action( 'woocommerce_product_data_panels', 'gowp_global_variation_price' );
function gowp_global_variation_price() {
	global $woocommerce;
	?>
		<script type="text/javascript">
			function addVariationLinks() {
				a = jQuery( '<a href="#">Apply to all Variations</a>' );
				b = jQuery( 'input[name^="variable_regular_price"]' );
				a.click( function( c ) {
					d = jQuery( this ).parent( 'label' ).next( 'input[name^="variable_regular_price"]' ).val();
					e = confirm( "Change the price of all variations to " + d + "?" );
					if ( e ) b.val( d ).trigger( 'change' );
					c.preventDefault();
				} );
				b.prev( 'label' ).append( " " ).append( a );
			}
			<?php if ( version_compare( $woocommerce->version, '2.4', '>=' ) ) : ?>
				jQuery( document ).ready( function() {
					jQuery( document ).ajaxComplete( function( event, request, settings ) {
						if ( settings.data.lastIndexOf( "action=woocommerce_load_variations", 0 ) === 0 ) {
							addVariationLinks();
						}
					} );
				} );
			<?php else: ?>
				addVariationLinks();
			<?php endif; ?>
		</script>
	<?php
}

add_action('admin_enqueue_scripts', 'wc_default_variation_stock_quantity');
 
    function wc_default_variation_stock_quantity()
    {
        global $pagenow, $woocommerce;
 
        $default_stock_quantity = 500;
        $screen = get_current_screen();
 
        if ( $pagenow == 'post-new.php' && $screen->post_type == 'product')
        {
            ?>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    if (!jQuery('#_manage_stock').attr('checked')) {
                        jQuery('#_manage_stock').attr('checked', 'checked');
                    }
                    if ('0' === jQuery('#_stock').val()) {
                        jQuery('#_stock').val(<?php echo $default_stock_quantity; ?>);
                    }
                    // if (!jQuery('#_sold_individually').attr('checked')) {
                    //     jQuery('#_sold_individually').attr('checked', 'checked');
                    // }
 
                });
            </script>
            <?php
        }
	}
	
	add_filter( 'woocommerce_product_tabs', 'bbloomer_remove_product_tabs', 98 );
 
function bbloomer_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

function ciprestige_woocommerce_image_dimensions() {
	global $pagenow;
 
	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}
  	$catalog = array(
		'width' 	=> '800',	// px
		'height'	=> '800',	// px
		'crop'		=> 0		// true
	);
	$single = array(
		'width' 	=> '1600',	// px
		'height'	=> '600',	// px
		'crop'		=> 0 		// true
	);
	$thumbnail = array(
		'width' 	=> '120',	// px
		'height'	=> '120',	// px
		'crop'		=> 0 		// false
	);
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}
add_action( 'after_switch_theme', 'ciprestige_woocommerce_image_dimensions', 1 );

