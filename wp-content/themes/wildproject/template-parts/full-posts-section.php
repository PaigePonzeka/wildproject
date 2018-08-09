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
    <div class="cards-container">
      <?php foreach( $posts as $post ) :
        setup_postdata($post);
        include(locate_template('template-parts/content-performance.php'));
       endforeach; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
<?php endif; ?>