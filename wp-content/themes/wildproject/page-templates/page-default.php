<?php
/*
Template Name: Default
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container">

  <div class="main-grid">
    <main class="main-content-full-width">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content', 'page' ); ?>
      <?php endwhile; ?>
      <?php get_template_part( 'template-parts/featured-items'); ?>

      <?php get_template_part( 'template-parts/media-objects'); ?>

      <?php get_template_part( 'template-parts/bottom-page-content'); ?>
    </main>
  </div>
</div>
<?php get_footer();