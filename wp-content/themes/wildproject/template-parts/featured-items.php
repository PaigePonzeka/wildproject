<?php if( have_rows('featured_items') ): ?>
  <div class="featured-items">
    <?php if (!empty(get_field('featured_items_title'))): ?>
        <h3><?php the_field('featured_items_title'); ?></h3>
    <?php endif; ?>
    <div class="cards-container">
      <?php while ( have_rows('featured_items') ) : the_row();
          $image = get_sub_field('image');
          $size = [300,200];
          $item_image = null;
          if (!empty($image)) {
            $item_image = wp_get_attachment_image( $image['id'], $size, true, ['class' =>'card-image']);
          }

          $url = get_sub_field('cta_link');
          if (empty($url)) {
            $url = get_sub_field('cta_url');
          }
          $item = Array(
            'url' => $url,
            'cta_text' => get_sub_field('cta_text'),
            'description' => get_sub_field('description'),
            'title' => get_sub_field('title'),
            'image' =>  $item_image
          );
          include(locate_template('template-parts/featured-item.php'));

        ?>
      <?php endwhile; ?>
    </div>
  </div>
  <?php endif;?>