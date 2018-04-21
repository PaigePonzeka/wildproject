<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if ( has_post_thumbnail( $post->ID ) ) : ?>
	<header class="featured-hero" role="banner" data-interchange="[<?php the_post_thumbnail_url( 'featured-small' ); ?>, small], [<?php the_post_thumbnail_url( 'featured-medium' ); ?>, medium], [<?php the_post_thumbnail_url( 'featured-large' ); ?>, large], [<?php the_post_thumbnail_url( 'featured-xlarge' ); ?>, xlarge]">
    <h1 class="entry-title"><?php the_title(); ?></h1>
  </header>
<?php else: ?>
  <header class="entry-header page-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
  </header>
<?php endif; ?>
