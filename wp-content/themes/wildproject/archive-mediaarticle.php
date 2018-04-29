<?php
/**
 * The template for displaying archive
 */

get_header();
query_posts( array(
    'post_type' => array( 'mediaarticle', ),
    'posts_per_page' => -1,
    'paged'=>$paged,
) );
?>

<div class="main-container">
  <div class="main-grid">
    <main class=class="main-content-full-width">
      <h1 class="text-center">Press</h1>
      <?php if ( have_posts() ) : ?>
        <div class="grid-container fluid">
          <ul class="grid-x press-list">
            <?php while ( have_posts() ) : the_post();
              $url = '';
              $isExternal = false;
              if (!empty(get_the_content())) {
                $url = get_the_permalink();
              } else {
                $url = get_field('article_url');
                $isExternal = true;

              }

              $media = Array(
                'image' => get_the_post_thumbnail($post, 'medium'),
                'date' => get_field('media_publish_date'),
                'url' => $url
              );
            ?>
            <li class="press-list-item cell small-3">
              <div class="press-list-item-image">
                <a href="<?php echo $media['url'];?>" <?php if($isExternal){ echo 'target="_blank"';} ?>>
                  <?php echo $media['image']; ?>
                </a>
              </div>
              <div class="press-list-item-date">
                <a href="<?php echo $media['url'];?>" <?php if ($isExternal){ echo 'target="_blank"';} ?>><?php echo $media['date']; ?></a>

              </div>
            </li>
            <?php endwhile; ?>
          </ul>
        </div>
      <?php endif; ?>
    </main>
  </div>
</div>

<?php get_footer();