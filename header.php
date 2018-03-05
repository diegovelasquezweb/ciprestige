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
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/assets/images/favicon.png' ?>">
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
              <a class="open-contact"><i class="fa fa-envelope"></i><span>CONTACTO</span></a>
              <a href="" class="social--link centerBox"><i class="fa fa-facebook"></i></a>
              <a href="" class="social--link centerBox"><i class="fa fa-instagram"></i></a>
              <a href="" class="catalogo"><i class="fa fa-download "></i><span>Catálogo digital</span></a>
              <a href="<?= get_home_url() ?>/distribuidores" class="dealers"><i class="fa fa-user "></i><span>Distribuidores</span></a>
    
            </div>
            <div class="header__search centerBox">
              <?php echo do_shortcode( '[aws_search_form]' ); ?>
            </div>
            <a href="" class="header__account grid--center"><i class="fa fa-unlock-alt "></i><span>MI CUENTA</span></a>
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
                <li class="" id="open-submenu">
                <a href="<?= get_home_url() ?>/">inicio</a>
                  <ul class="submenu grid">
                    <div class="submenu__container">
                    <li>
                  <a href="<?= get_home_url() ?>/nosotros">Nosotros</a>
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
    

                
              </ul>
              </div>
            </div>
          </div>

<div class="overlay-contact"></div>
    <section class="contact">
    <h2>Contacto</h2>
    <a class="close-contact">

    <i class="fa fa-close"></i>
    </a>

    <div class="contact-wrapper p-3">

     <div class="contact__item"><span><i class="fa fa-phone"></i></span> <a href="tel:2122262">2122262</a> </div>
     <div class="contact__item"><span><i class="fa fa-whatsapp"></i></span> <a href="tel:2122262">3123505610</a></div>
     <div class="contact__item"><span><i class="fa fa-skype"></i></span> <a href="tel:2122262">mercadeo.ciprestige</a></div>
     <div class="contact__item"><span><i class="fa fa-map-marker"></i></span> <span>Cra 28Bis #51 -98 | Barrio Galerias | Bogotá, Colombia</span></div>
    <div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d591.1456546223661!2d-74.07744113184182!3d4.640741791585452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9bccb9e6547f%3A0x1b72d7bda2d1f788!2sCra.+28+Bis+%2351-98%2C+Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1491859921808" width="350" height="250" frameborder="0" style="border: 0;" allowfullscreen="allowfullscreen"></iframe></div>
    <div class="form">
    <p>Nuestro equipo de ventas esta esperando para ayudarte.</p>
    <?php echo do_shortcode( '  [contact-form-7 id="147" title="Contact form 1"]' ); ?>

  
    </div>
    </div>
    
    </section>
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