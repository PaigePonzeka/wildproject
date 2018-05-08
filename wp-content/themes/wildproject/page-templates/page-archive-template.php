<?php
/*
Template Name: Archive Page
*/
  get_header();
  $archive_type = get_field('archive_type');
  $archive_alt_type = get_field('archive_alt_type');
  $featured = Array(
    'image' => "[" . get_the_post_thumbnail_url( '', 'featured-small' ) . " , small], [" .  get_the_post_thumbnail_url('', 'featured-medium' ) . ", medium], [". get_the_post_thumbnail_url('', 'featured-large' ) .", large], [" . get_the_post_thumbnail_url('', 'featured-xlarge' ) .", xlarge]",
    'title' => get_the_title()
  );
  include(locate_template('template-parts/featured-image.php'));

?>
<div class="main-container">
  <div class="main-grid">
    <main class="main-content-full-width">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content', 'page' ); ?>
      <?php endwhile; ?>

      <div class="grid-x grid-margin-x archive-list">
        <?php include(locate_template('template-parts/_archive.php')); ?>
        <?php if (!empty($archive_alt_type)):
            $archive_type = $archive_alt_type;
            include(locate_template('template-parts/_archive.php'));
          endif;?>
      </div>
    </main>
  </div>
</div>
<?php get_footer(); ?>