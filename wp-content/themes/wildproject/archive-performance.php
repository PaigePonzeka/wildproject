<?php
/**
 * The template for displaying archive pages for the performance pages
 */

get_header(); ?>

<div class="main-container">
  <div class="main-grid">
    <main class="main-content">
      <h1>Performances</h1>
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
          $media = Array(
            'image' => get_the_post_thumbnail($post, 'medium'),
            'title' => get_the_title(),
            'description' => get_the_excerpt(),
            'url' => get_permalink()
          );
          include(locate_template('template-parts/media-object.php'));
        ?>

      <?php endwhile; ?>

      <?php endif; // End have_posts() check. ?>

      <?php /* Display navigation to next/previous pages when applicable */ ?>
      <?php
      if ( function_exists( 'foundationpress_pagination' ) ) :
        foundationpress_pagination();
      elseif ( is_paged() ) :
      ?>
        <nav id="post-nav">
          <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
          <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
        </nav>
      <?php endif; ?>

    </main>
    <?php get_sidebar(); ?>

  </div>
</div>

<?php get_footer();
