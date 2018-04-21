<?php if( have_rows('media_objects') ): ?>
  <?php while ( have_rows('media_objects') ) : the_row(); ?>
    <div class="media-object">
      <div class="media-object-section">
        <div class="thumbnail">
          <?php
            $image = get_sub_field('image');
            $size = 'medium'; // (thumbnail, medium, large, full or custom size)
            if( $image ):
              echo wp_get_attachment_image( $image['ID'], $size );
            endif;
          ?>
        </div>
      </div>
      <div class="media-object-section">
        <h4><?php the_sub_field('title'); ?></h4>
        <p><?php the_sub_field('description'); ?></p>
      </div>
    </div>
  <?php endwhile; ?>

<?php endif; ?>