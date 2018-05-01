<div class="card">
  <?php
    if( !empty($item['image']) ): ?>
      <div class="card-image-container">
        <?php echo $item['image']; ?>
      </div>
    <?php endif;?>

  <div class="card-content">
    <?php if (!empty($item['title'])): ?>
      <h4><?php echo $item['title'];?></h4>
    <?php endif; ?>

    <?php if(!empty($item['start_date'])):?>
      <h5 class="date">
        <?php echo $item['start_date']; ?>
        <?php if (!empty($item['end_date'])): ?>
          - <?php echo $item['end_date']; ?>
        <?php endif; ?>
      </h5>
    <?php endif; ?>

    <?php if (!empty($item['description'])): ?>
      <p><?php echo $item['description'];?></p>
    <?php endif; ?>

  </div>
  <?php if (!empty($item['cta_text']) && !empty($item['url'])): ?>
      <a class="button " href="<?php echo $item['url'];?>"><?php echo $item['cta_text'];?></a>
    <?php endif; ?>
</div>
