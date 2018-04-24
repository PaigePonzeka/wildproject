<?php if( have_rows('media_objects') ): ?>
  <?php while ( have_rows('media_objects') ) : the_row(); ?>
    <?php
      $image = get_sub_field('image');
      $size = 'medium';

      $media = Array(
        'image' => wp_get_attachment_image( $image['ID'], $size ),
        'title' => get_sub_field('title'),
        'description' => get_sub_field('description')
      );
      include(locate_template('template-parts/media-object.php'));
    ?>

  <?php endwhile; ?>
<?php endif; ?>