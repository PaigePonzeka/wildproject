<?php
/*
Template Name: Home
*/
  get_header();

  $featured = Array(
    'image' => "[" . get_the_post_thumbnail_url('', 'featured-small' ) . " , small], [" .  get_the_post_thumbnail_url('', 'featured-medium' ) . ", medium], [". get_the_post_thumbnail_url('', 'featured-large' ) .", large], [" . get_the_post_thumbnail_url('', 'featured-xlarge' ) .", xlarge]",
    'title' => ''
  );
  include(locate_template('template-parts/featured-image.php'));
?>
<div class="main-container">

  <div class="main-grid">
    <main class="main-content-full-width">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content', 'page' ); ?>
      <?php endwhile; ?>
      <?php get_template_part( 'template-parts/featured-items'); ?>
      <?php get_template_part( 'template-parts/image-module'); ?>
    </main>
  </div>
</div>
<?php get_footer();
