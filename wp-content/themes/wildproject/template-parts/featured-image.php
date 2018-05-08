<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if (empty($no_title)):
  if ( !empty($featured['image']) ) : ?>
  	<header class="featured-hero" role="banner" data-interchange="<?php echo $featured['image']; ?>">
      <h1 class="entry-title"><?php echo $featured['title']; ?></h1>
    </header>
  <?php elseif (!empty($featured['title'])): ?>
    <header class="entry-header page-header">
      <h1 class="entry-title text-center"><?php echo $featured['title']; ?></h1>
    </header>
  <?php endif; ?>
<?php endif;
