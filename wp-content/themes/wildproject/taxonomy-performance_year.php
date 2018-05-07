<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();
?>
<div class="main-container">
  <div class="main-grid">
    <main class="main-content-full-width">
      <h1 class="text-center tax-terms">
        <?php echo get_queried_object()->name;?>
        Performance Archive
      </h1>

    <?php if ( have_posts() ) : ?>
      <div class="cards-container">
        <?php while ( have_posts() ) : the_post(); ?>

          <?php
            $item = Array(
              'title' => get_the_title(),
              'cta_text' => 'View Performance',
              'description' => mb_strimwidth(get_the_excerpt(),0,50),
              'url' => get_the_permalink()
            );
            include(locate_template('template-parts/featured-item.php'));
          ?>
        <?php endwhile; ?>

        <?php else : ?>
          <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; // End have_posts() check. ?>
      </div>
    </main>

  </div>
</div>

<?php get_footer();
