<?php get_header(); ?>
<main class="home">
  <section class="banner">
    <?php get_template_part( 'partials/home-banner' ); ?>
  </section>
  <section class="featured">
  <?php get_template_part( 'partials/home-featured' ); ?>
  </section>
  <section class="parallax">
  <?php get_template_part( 'partials/parallax' ); ?>
  </section>
  <section class="events">
  <?php get_template_part( 'partials/events' ); ?>
  </section>
  <section class="brands">
  <?php get_template_part( 'partials/brands' ); ?>
  </section>
  <section class="newsletter">
  <?php get_template_part( 'partials/newsletter' ); ?>
  </section>
</main>
<?php get_footer(); ?>