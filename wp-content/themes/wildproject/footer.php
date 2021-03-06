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

<footer class="footer">
  <div class="footer-container">
    <div class="footer-social-container"><?php foundationpress_top_bar_l(); ?></div>
    <small>2018 © <a href="http://ponzeka.com" target="_blank">Paige Ponzeka</a> & <i>The wild project</i></small>
  </div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
<!-- Begin Constant Contact Active Forms -->
<script> var _ctct_m = "c7a12af6711bfe0f0af641e422846106"; </script>
<script id="signupScript" src="//static.ctctcdn.com/js/signup-form-widget/current/signup-form-widget.min.js" async defer></script>
<!-- End Constant Contact Active Forms -->
<style>
  .grecaptcha-badge {
    display: none!important;
  }
</style>
</body>
</html>