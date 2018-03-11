
<?php get_header(); ?>
<main class="dealers">

<div class="container">
<h1><?php the_title(''); ?></h1>
<?php the_field('description'); ?>
<div class="grid">
<div class="form register">
    <h2>Registro</h2>
    <?php echo do_shortcode( '[contact-form-7 id="207" title="Distribuidores"]' ); ?>
    </div>
    <div class="form login">
        <h2>Login</h2>
        
        <?php echo do_shortcode( '[woocommerce_my_account]' ); ?>
    </div>
</div>


</div>
</main>

<?php get_footer(); ?>