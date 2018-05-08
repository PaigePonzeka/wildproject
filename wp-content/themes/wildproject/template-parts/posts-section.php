<?php
  global $post;
  $args = array(
    'posts_per_page' => 6,
    'category_name' => $section_tax,
    'post_type' => $section_type
  );
  $posts = get_posts( $args );?>
<?php if (!empty($posts)): ?>
  <div class="post-section">
    <h3 class="post-section-title text-center"><?php echo $section_title; ?></h3>
    <div class="cards-container">
      <?php foreach( $posts as $post ) :
        setup_postdata($post);
        $item_image = get_the_post_thumbnail($post, 'medium');
          $item = Array(
            'url' => get_permalink(),
            'cta_text' => 'Learn More',
            //'description' => get_the_excerpt(),
            'title' => get_the_title(),
            'image' =>  $item_image,
            'start_date' => get_field('start_date'),
            'end_date' => get_field('end_date')
          );
          include(locate_template('template-parts/featured-item.php'));
       endforeach; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
<?php endif; ?>