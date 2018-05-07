<div class="callout">
  <?php if(!empty($callout['description'])):?>
    <p class="text-center"><?php echo $callout['description'];?></p>
  <?php else: ?>
    <p class="text-center"></p>
  <?php endif;?>
  <?php if(!empty($callout['cta_text'] && !empty($callout['url']))):?>
    <p class="text-center">
      <a href="<?php echo $callout['url'];?>" class="text-center button secondary"><?php echo $callout['cta_text'];?></a>
    </p>
  <?php endif; ?>

</div>