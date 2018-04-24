<div class="media-object">
  <div class="media-object-section">
    <div class="thumbnail">
      <?php
        echo $media['image'];
      ?>
    </div>
  </div>
  <div class="media-object-section">
    <h4><?php echo $media['title']; ?></h4>
    <p><?php echo $media['description']; ?></p>
    <?php if (!empty($media['url'])): ?>
      <footer class="media-object-footer">
        <a class="button secondary" href="<?php echo $media['url'];?>">Learn More</a>
      </footer>
    <?php endif;?>
  </div>
</div>