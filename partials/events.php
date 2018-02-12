<h2>noticias y Eventos</h2>
<div class="container grid--start">
<?php
$args = array(
  'post_type'   => 'events-post',
  'post_status' => 'publish',
  'posts_per_page' => 3,
 );
 
$events = new WP_Query( $args );
if( $events->have_posts() ) :
?>
 <?php
      while( $events->have_posts() ) :
        $events->the_post();
        ?>
    <article class="wow fadeIn">
    <a class="block h100" href="<?php the_permalink();  ?>">
    <figure style="background-image: url('<?php the_field('imagen_news'); ?>')">

    </figure>
    <h3><?php the_title();  ?></h3>
    <p><?php the_field('introduccion_news'); ?></p>
    <a class="btn" href="<?php the_permalink();  ?>">Ver más</a>
    </a>
    </article>
    <?php
      endwhile;
      wp_reset_postdata();
    ?>
  </ul>
<?php
endif;
?>
</div>


