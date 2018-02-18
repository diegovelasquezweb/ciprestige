<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */
?>
  <!doctype html>
  <html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php do_action( 'storefront_before_site' ); ?>
    <div id="page" class="hfeed site">
      <?php do_action( 'storefront_before_header' ); ?>
      <header id="masthead" class="header" role="banner">
        <div class="header__top">
          <div class="container grid">
            <div class="header__contact grid">
              <a href=""><i class="fa fa-envelope"></i><span>CONTACTO</span></a>
              <a href="" class="social--link centerBox"><i class="fa fa-facebook"></i></a>
              <a href="" class="social--link centerBox"><i class="fa fa-instagram"></i></a>
              <a href="" class="catalogo"><i class="fa fa-download "></i><span>Catálogo digital</span></a>
            </div>
            <div class="header__search centerBox">
              <?php echo do_shortcode( '[aws_search_form]' ); ?>
            </div>
            <div class="header__cart centerBox">
              <?php storefront_header_cart(); ?>
            </div>
          </div>
        </div>
        <div class="header__center">
          <div class="container grid">
            <div class="header__logo"><a href="<?= get_home_url() ?>/"><img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png' ?>" alt=""></a></div>
            <div class="header__menu centerBox">
              <ul class="grid--center">
                <li>
                  <a href="<?= get_home_url() ?>/">inicio</a>
                </li>
                <li class="" id="open-submenu">
                  <a  class="" href="<?= get_home_url() ?>/tienda">Tienda</a>
                  <ul class="submenu grid">
                    <div class="submenu__container">
                      <?php
$args = array(
    'orderby'    => 'title',
    'order'      => 'ASC',
    'hide_empty' => true
);
$product_categories = get_terms( 'product_cat', $args );
$count = count($product_categories);
if ( $count > 0 ){
    foreach ( $product_categories as $product_category ) { 
        echo '<li><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a></li>';
    }
} ?>
                    </div>
                    <?php
if( have_rows('publicidad_menu', 'option') ): while ( have_rows('publicidad_menu', 'option') ) : the_row(); ?>
                      <div class="sponsor "><a target="_blank" href="<?php the_sub_field('link_menu', 'option'); ?>"><img src="<?php the_sub_field('imagen_menu', 'option'); ?>" alt=""></a></div>
                        <?php endwhile; endif; ?>
                  </ul>
                </li>
                <li>
                  <a href="<?= get_home_url() ?>/categoria/estudiantes/">Estudiantes</a>
                </li>
                <li>
                  <a href="">Nosotros</a>
                </li>
                <li>
                  <a href="">Distribuidores</a>
                </li>
                <li>
                  <a href="<?= get_home_url() ?>/my-account">Mi cuenta</a>
                </li>
                <li>
                  <a href="">Contacto</a>
                </li>
              </ul>
              </div>
            </div>
          </div>
          <!-- <div class="header__bottom">
			<div class="container">
		<div class="header__search centerBox">
					<?php echo do_shortcode( '[aws_search_form]' ); ?> 
				</div>
				</div>
		</div> -->
      </header>
      <?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 */
	do_action( 'storefront_before_content' ); ?>
        <div id="content" class="site-contentx " tabindex="-1">
          <div class="col-fullx fixed-top">
            <?php
		/**
		 * Functions hooked in to storefront_content_top
		 *
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'storefront_content_top' );