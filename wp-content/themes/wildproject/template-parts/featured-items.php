<?php if( have_rows('featured_items') ): ?>
  <div class="featured-items">
    <?php if (!empty(get_field('featured_items_title'))): ?>
        <h3><?php the_field('featured_items_title'); ?></h3>
    <?php endif; ?>
    <div class="cards-container">
      <?php while ( have_rows('featured_items') ) : the_row();?>
        <?php
          $url = empty(get_sub_field('cta_link') ? get_sub_field('cta_url') : get_sub_field('cta_text') )
        ?>
        <div class="card">
          <?php
            $image = get_sub_field('image');
            $size = [300,200]; // (thumbnail, medium, large, full or custom size)
            if( $image ): ?>
              <div class="card-image-container">
                <?php echo wp_get_attachment_image( $image['id'], $size, true, ['class' =>'card-image'] ); ?>
              </div>
            <?php endif;?>

          <div class="card-content">
            <?php if (!empty(get_sub_field('title'))): ?>
              <h4><?php the_sub_field('title');?></h4>
            <?php endif; ?>


            <?php if (!empty(get_sub_field('description'))): ?>
              <p><?php the_sub_field('description');?></p>
            <?php endif; ?>

            <?php if (!empty(get_sub_field('cta_text') && !empty($url))): ?>
              <a class="button hollow" href="<?php echo $url;?>"><?php the_sub_field('cta_text');?></a>
            <?php endif; ?>

          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
  <?php endif;?>