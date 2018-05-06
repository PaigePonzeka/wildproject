<?php
/*
Template Name: Archive Page
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container">

  <div class="main-grid">
    <main class="main-content-full-width">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content', 'page' ); ?>
      <?php endwhile; ?>
      <?php
        // Get all term ID's in a given taxonomy
        $taxonomy = 'performance_year';
        $taxonomy_terms = get_terms( $taxonomy, array(
            'hide_empty' => 0
        ) ); ?>
        <div class="grid-x grid-margin-x archive-list">
        <?php foreach($taxonomy_terms as $taxonomy_term):?>
          <div class="cell medium-6 large-4">
            <a href="<?php echo get_term_link($taxonomy_term); ?>">
              <?php echo $taxonomy_term->name; ?>
            </a>
          </div>
        <?php endforeach;?>
      </div>
    </main>
  </div>
</div>
<?php get_footer(); ?>