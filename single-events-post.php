<?php get_header(); ?>
<main class="news-detail">

<div class="container">
<h1><?php the_title(''); ?></h1>
<figure><img src="<?php the_field('imagen_news'); ?>" alt=""></figure>

<?php the_field('descripcion_news'); ?>
</div>
</main>

<?php get_footer(); ?>
