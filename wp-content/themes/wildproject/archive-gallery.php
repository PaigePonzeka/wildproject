<?php
/**
 * The template for displaying archive pages for the performance pages
 */

get_header(); ?>

<div class="main-container">
  <div class="main-grid">
    <main class=class="main-content-full-width">
      <h1>Galleries</h1>
      <div class="featured-items all-performances">
        <div class="cards-container">
          <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post();
              $item_image = get_the_post_thumbnail($post, 'medium');

              $item = Array(
                'url' => get_permalink(),
                'cta_text' => 'Learn More',
                'description' => get_the_excerpt(),
                'title' => get_the_title(),
                'image' =>  $item_image
              );
              include(locate_template('template-parts/featured-item.php'));

            ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </main>
  </div>
</div>

<?php get_footer();