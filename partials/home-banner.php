    <div id="hero-slider">
      <?php while( have_rows('banner') ): the_row(); 
        $image = get_sub_field('image');
        $tittle = get_sub_field('tittle');
        $description = get_sub_field('description');
        $link = get_sub_field('link');
    ?>
      <div class="hero-slide">
      <?php if( $link ): ?><a target="_blank" href="<?php echo $link; ?>"><?php endif; ?><figure style="background-image: url('<?php echo $image; ?>')"></figure><?php if( $link ): ?></a><?php endif; ?>
          <div class="caption">
            <div class="container relative h100">
            <?php if( $tittle ): ?>
            <div class="banner__caption" data-animation="fadeInRightBig" >
                <h2 data-animation="fadeIn" data-delay=".5s"><?php echo $tittle; ?></h2>
                <p data-animation="fadeIn" data-delay=".5s"><?php echo $description; ?></p>
                <?php if( $link ): ?> <a data-animation="fadeIn" data-delay=".5s" class="btn--white " target="_blank" href="<?php echo $link; ?>">Ver más</a><?php endif; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endwhile; ?>

    </div>
   