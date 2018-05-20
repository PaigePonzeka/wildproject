<?php
  $image_module = Array(
    'headline' => get_field('image_module_headline'),
    'link' => get_field('image_module_link'),
    'image' => get_field('image_module_image')
  );
?>

<?php if (get_field('show_image_module')): ?>
  <div class="grid-x image-module">
    <div class="cell large-3 image-module-headline">
      <h3><?php echo $image_module['headline']; ?></h3>
    </div>
    <div class="cell large-8 image-module-image">
      <?php if (!empty($image_module['link'])): ?>
        <a href="<?php echo $image_module['link']; ?>">
      <?php endif; ?>
      <?php if (!empty($image_module['image'])): ?>
        <img class="image-module-image" src="<?php echo $image_module['image']['url']; ?>"/>
      <?php endif; ?>
      <?php if (!empty($link)): ?>
        </a>
      <?php endif; ?>

    </div>
  </div>
<?php endif;?>