<?php
/**
 * The template for displaying archive pages for the performance pages
 */

get_header();
$section_type = "gallery";
$image = get_field('gallery_featured_image', 'options');

$featured_image_text = "[" . wp_get_attachment_url( $image['ID'], 'featured-small' ) . " , small], [" .  wp_get_attachment_url( $image['ID'], 'featured-medium' ) . ", medium], [". wp_get_attachment_url( $image['ID'], 'featured-large' )  .", large], [" . wp_get_attachment_url( $image['ID'], 'featured-xlarge' )  .", xlarge]";
$featured = Array(
    'image' => '',
    'title' => "Our Gallery"
  );
  include(locate_template('template-parts/featured-image.php'));
?>

<div class="main-container">
  <div class="main-grid">
    <main class="main-content-full-width">
      <div class="entry-content">
        <?php the_field('gallery_mission_statement', 'options'); ?>
      </div>
      <?php
        $section_title = "Current Gallery";
        $section_tax = 'current';
        include(locate_template('template-parts/full-posts-section.php'));
      ?>

      <?php
        $section_title = 'Upcoming Gallery';
        $section_tax = 'upcoming';
        $button_type = "secondary";
        include(locate_template('template-parts/posts-section.php'));
      ?>

      <?php
        $archive_page = get_page_by_path('Past Galleries');
        $callout = Array(
          'cta_text' => 'View Our Past Exhibits',
          'url' => get_permalink($archive_page->ID)
        );
        include(locate_template('template-parts/callout.php'));
      ?>
    </main>
  </div>
</div>

<?php get_footer();