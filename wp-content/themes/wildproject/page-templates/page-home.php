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

      <div class="grid-x grid-margin-x callout">
        <div class="cell medium-8 large-6 card secondary">
          <!-- Begin Constant Contact Inline Form Code -->
          <div class="ctct-inline-form" data-form-id="d84bde66-c156-4688-9e8b-14ee72c946e9"></div>
          <!-- End Constant Contact Inline Form Code -->
        </div>
        <div class="cell medium-6 large-8">
          <div class="map-embed-container" style="overflow: hidden;">
            <h3>Find Us!</h3>
            <div class="map-container">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.774291494511!2d-73.98549308459476!3d40.7229849793307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2598280a1e541%3A0xd36eca4ecf6d31bb!2sWild+Project!5e0!3m2!1sen!2sus!4v1548986245225" width="400" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        </div>
      </div>

    </main>
  </div>
</div>
<?php get_footer();
