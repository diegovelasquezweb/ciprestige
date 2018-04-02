
<?php get_header(); ?>
<main class="cart">

<div class="container b2">
<h1><?php the_title(''); ?></h1>
<?php echo do_shortcode( '[woocommerce_cart]' ); ?>

</div>
</main>

<?php get_footer(); ?>
