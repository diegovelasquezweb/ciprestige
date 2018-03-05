
<?php get_header(); ?>
<main class="nosotros">

<div class="container">
<h1><?php the_title(''); ?></h1>
<figure>
<img src="<?php the_field('image_nosotros'); ?>" alt="">

</figure>
<?php the_field('descripcion_nosotros'); ?>

</div>
</main>

<?php get_footer(); ?>