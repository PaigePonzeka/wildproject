<?php
  /*
  Template Name: Left Sidebar
  */
  get_header();
  $featured = Array(
    'image' => "[" . get_the_post_thumbnail_url('', 'featured-small' ) . " , small], [" .  get_the_post_thumbnail_url('', 'featured-medium' ) . ", medium], [". get_the_post_thumbnail_url('', 'featured-large' ) .", large], [" . get_the_post_thumbnail_url('', 'featured-xlarge' ) .", xlarge]",
    'title' => get_the_title()
  );
  include(locate_template('template-parts/featured-image.php'));
?>
<div class="main-container">
	<div class="main-grid sidebar-left">
		<main class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		 </main>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
