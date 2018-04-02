
<?php get_header(); ?>
<main class="cart">

<div class="container">
<h1><?php the_title(''); ?></h1>
<?php echo do_shortcode('[woocommerce_checkout]'); ?>
</div>
</main>

<?php get_footer(); ?>
