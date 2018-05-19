<?php
/**
 * The template for displaying archive pages for the performance pages
 */

get_header();
$image = get_field('performance_featured_image', 'options');
$featured_image_text = "";

$featured = Array(
    'image' => $featured_image_text,
    'title' => get_queried_object()->name
  );
  include(locate_template('template-parts/featured-image.php'));
?>

<div class="main-container">
  <div class="main-grid">
    <main class="main-content-full-width">
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
          $button_type = 'secondary';
          include(locate_template('template-parts/featured-item.php'));
        endforeach; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </main>
  </div>
</div>

<?php get_footer(); ?>
