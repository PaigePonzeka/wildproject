<?php
/**
 * The template for displaying archive pages for the performance pages
 */

get_header();
$section_type = "performance";
$image = get_field('performance_featured_image', 'options');
$featured_image_text = "[" . wp_get_attachment_url( $image['ID'], 'featured-small' ) . " , small], [" .  wp_get_attachment_url( $image['ID'], 'featured-medium' ) . ", medium], [". wp_get_attachment_url( $image['ID'], 'featured-large' )  .", large], [" . wp_get_attachment_url( $image['ID'], 'featured-xlarge' )  .", xlarge]";

$featured = Array(
    'image' => '',
    'title' => "Current Performance"
  );
  include(locate_template('template-parts/featured-image.php'));
?>

<div class="main-container">
  <div class="main-grid">
    <main class="main-content-full-width">
      <?php
        $section_tax = 'current';
        include(locate_template('template-parts/full-posts-section.php'));
      ?>

      <?php
        $section_title = 'Upcoming Performances';
        $section_tax = 'upcoming';
        $button_type = "secondary";
        include(locate_template('template-parts/posts-section.php'));
      ?>

      <?php
        $archive_page = get_page_by_path('Past Performances');
        $callout = Array(
          'cta_text' => 'Click here to View Our Past Performances',
          'url' => get_permalink($archive_page->ID)
        );
        include(locate_template('template-parts/callout.php'));
      ?>
    </main>
  </div>
</div>

<?php get_footer();
