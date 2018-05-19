
<div class="media-object grid-x">
  <div class="media-object-section medium-5 large-3 cell">
    <div class="thumbnail">
      <?php
        echo $media['image'];
      ?>
    </div>
  </div>
  <div class="media-object-section medium-7 large-9 cell">
    <h4><?php echo $media['title']; ?></h4>
    <p><?php echo $media['description']; ?></p>
    <?php if (!empty($media['url'])): ?>
      <footer class="media-object-footer">
        <a class="button secondary" href="<?php echo $media['url'];?>">Learn More</a>
      </footer>
    <?php endif;?>
  </div>
</div>