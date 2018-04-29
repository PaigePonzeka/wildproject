<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<?php
  $button = Array(
    'show' => get_field('show_footer_cta', 'options'),
    'message' => get_field('footer_cta_message', 'options'),
    'cta_text' => get_field('footer_cta_text', 'options'),
    'cta_url' => empty(get_field('footer_cta_url', 'options')) ? get_field('footer_cta_link', 'options'): get_field('footer_cta_url', 'options')
  );
?>
<?php if (!(empty($button) && $button['show'])): ?>
  <div class="module-button">
    <div class="module-button-wrapper float-center">
      <h5 class=""><?php echo $button['message']; ?></h5>
      <a href="<?php echo $button['cta_url']; ?>" class="button"><?php echo $button['cta_text']; ?></a>
    </div>
  </div>
<?php endif; ?>


<?php if( is_singular('performance') || is_singular('gallery')) : ?>
  <div id="share-bar"></div>
<?php endif; ?>

<footer class="footer">
  <div class="footer-container">
    <small>2018 © <a href="http://ponzeka.com" target="_blank">Paige Ponzeka</a> & <i>The wild project</i></small>
  </div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>