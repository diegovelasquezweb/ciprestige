    <div id="hero-slider">
      <?php while( have_rows('banner') ): the_row(); 
        $image = get_sub_field('image');
        $tittle = get_sub_field('tittle');
        $description = get_sub_field('description');
        $link = get_sub_field('link');
    ?>
      <div class="hero-slide">
      <?php if( $link ): ?><a href="<?php echo $link; ?>"><?php endif; ?><figure style="background-image: url('<?php echo $image; ?>')"></figure><?php if( $link ): ?></a><?php endif; ?>
          <div class="caption">
            <div class="container relative h100">
            <?php if( $tittle ): ?>
            <div class="banner__caption" data-animation="fadeInRightBig" >
                <h1 data-animation="fadeInRightBig" data-delay="0s"><?php echo $tittle; ?></h1>
                <p data-animation="fadeInRightBig" data-delay="0s"><?php echo $description; ?></p>
                <a data-animation="fadeInRightBig" data-delay="0s" class="btn" href="">Ver más</a>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>