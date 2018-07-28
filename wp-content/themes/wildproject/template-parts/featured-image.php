<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
 $featured['slideshow_images'] = Array();
 if (have_rows('featured_images')) {
  // loop through the rows of data
    while ( have_rows('featured_images') ) : the_row();

      $featured_image = Array(
        'image' => get_sub_field('image'),
        'text' => get_sub_field('text')
      );
      array_push($featured['slideshow_images'], $featured_image);
    endwhile;
 }
?>
<?php if(!empty($featured['slideshow_images'])): ?>
  <header class="featured-hero slideshow">
    <div class="split-slideshow">
      <div class="slideshow">
        <div class="slider">
          <?php foreach($featured['slideshow_images'] as $fImage): ?>
            <div class="item">
              <img src="<?php echo $fImage['image']; ?>" />
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="slideshow-text">
        <?php foreach($featured['slideshow_images'] as $fImage): ?>
          <div class="item">
            <?php echo $fImage['text']; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </header>
<?php else: ?>
  <?php if (empty($no_title)):
  if ( !empty($featured['image']) ) : ?>
    <header class="featured-hero" role="banner" data-interchange="<?php echo $featured['image']; ?>">
      <?php if(!empty($featured['title'])): ?>): ?>
        <h1 class="entry-title"><?php echo $featured['title']; ?></h1>
      <?php endif; ?>
    </header>
  <?php elseif (!empty($featured['title'])): ?>
    <header class="entry-header page-header">
      <h1 class="entry-title text-center"><?php echo $featured['title']; ?></h1>
    </header>
  <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>
