<?php
/**
 * For displaying Single Performance Content
 */
  $performance = get_the_performance(get_the_ID());
  ?>
  <article id="post-<?php the_ID(); ?>" class="performance-article">
  <header class="performance-header">
    <h3><em><?php echo $performance['pretitle']; ?></em></h3>
    <h1>
      <?php echo $performance['title']; ?>
    </h1>
    <h3 class="subheader h5"><?php echo $performance['subtitle']; ?></h3>
    <?php if(is_singular('performance') || is_post_type_archive('performance')): ?>
      <a href="https://web.ovationtix.com/trs/cal/621?sitePreference=normal" target="blank"><em>For All Performances see our full calendar</em></a>
    <?php endif; ?>
    <?php if(!empty($performance['start-date'])): ?>
      <h5 class="performance-date">
        <?php echo $performance['start-date']; ?>
      <?php if(!empty($performance['end-date'])): ?>
        - <?php echo $performance['end-date']; ?>
      <?php endif; ?>
      </h5>
    <?php endif; ?>
    <?php include(locate_template('template-parts/social-share.php')); ?>
    <div style="width: 400px; margin: 20px auto;"><?php include(locate_template('template-parts/performance/ticket.php')); ?></div>

  </header>
  <div class="grid-x">
    <div class="cell medium-6 large-8">
      <div class="entry-content performance-description">
        <?php echo apply_filters('the_content', $performance['description']); ?>
      </div>
      <?php if (!empty($performance['prices'])):?>
        <ul class="performance-tickets">
          <?php foreach($performance['prices'] as $ticket):?>
            <li class="performance-ticket">
              <?php echo $ticket['type']; ?>
              <?php if (!empty($ticket['price'])): ?>
                :<em>$<?php echo $ticket['price']; ?></em>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>


    </div>
    <div class="cell medium-6 large-4">
      <div class="performance-image">
        <?php echo $performance['image']; ?>
      </div>
      <div class="performance-sidebar-ticket">
        <?php include(locate_template('template-parts/performance/ticket.php')); ?>

      </div>
    </div>
  </div>
  <?php if (!empty($performance['cast'])): ?>
    <div class="grid-x performance-cast">
      <div class="cell callout">
        <?php echo $performance['cast']; ?>
      </div>
    </div>
  <?php endif; ?>

  <footer>
    <?php
      wp_link_pages(
        array(
          'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
          'after'  => '</p></nav>',
        )
      );
    ?>
    <?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
  </footer>
</article>


<?php ?>