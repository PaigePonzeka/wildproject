<?php
/*
Template Name: Columns
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container">
  <div class="main-grid">
    <main class="main-content-full-width">
      <div class="grid-x">
        <div class="cell medium-6 large-4">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', 'page' ); ?>
          <?php endwhile; ?>
        </div>
        <div class="cell medium-6 large-8">
          <?php the_field('right_column'); ?>
        </div>
      </div>

    </main>
  </div>
</div>
<?php get_footer();
