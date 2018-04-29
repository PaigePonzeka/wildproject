<?php
  $media = Array(
    'title' => get_the_title(),
    'date' => get_field('media_publish_date'),
    'author' => get_field('media_author'),
    'image' => get_the_post_thumbnail(),
    'url' => get_field('article_url'),
    'content' => get_the_content()
  );
?>

<article id="post-<?php the_ID(); ?>" class="media-article">
  <h1 class="text-center media-article-title">
    <?php if(!empty($media['url'])): ?>
      <a href="<?php echo $media['url']; ?>"><?php echo $media['title']; ?></a>
    <?php else: ?>
      <?php echo $media['title']; ?>
    <?php endif; ?>
  </h1>
  <div class="media-article-image"><?php echo $media['image']; ?></div>
  <?php if (!empty($media['author'])): ?>
    <h4 class="media-article-author">by <?php echo $media['author']; ?></h4>
  <?php endif; ?>
  <?php if (!empty($media['content'])): ?>
    <div class="media-article-content">
      <?php echo $media['content']; ?>
    </div>
  <?php endif; ?>
  <?php if(!empty($media['url'])): ?>
    <div class="media-article-link">
      <a href="<?php echo $media['url']; ?>" target="_blank" class="button secondary">Read the Full Article</a>
    </div>
  <?php endif; ?>


</article>