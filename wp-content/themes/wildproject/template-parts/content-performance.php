<?php
/**
 * For displaying Single Performance Content
 */

$prices = Array();
// check if the repeater field has rows of data
if( have_rows('ticket_prices') ):

  // loop through the rows of data
  while ( have_rows('ticket_prices') ) : the_row();
      array_push($prices, Array(
        'price' => get_sub_field('price'),
        'type' => get_sub_field('type')
      ));
    endwhile;
endif;

$performance = Array(
  'title' => get_the_title(),
  'description' => get_the_content(),
  'pretitle' => get_field('pretitle'),
  'subtitle' => get_field('subtitle'),
  'start-date' => get_field('start_date'),
  'end-date' => get_field('end_date'),
  'cast' => get_field('cast'),
  'ticket-url' => get_field('ticket_url'),
  'prices' => $prices,
  'image' => get_the_post_thumbnail()
  );


?>
<article id="post-<?php the_ID(); ?>" class="performance-article">
  <header class="performance-header">
    <h3><em><?php echo $performance['pretitle']; ?></em></h3>
    <h1>
      <?php echo $performance['title']; ?>
    </h1>
    <h3 class="subheader h5"><?php echo $performance['subtitle']; ?></h3>
  </header>
  <div class="grid-x">
    <div class="cell medium-6 large-8">
      <div class="entry-content performance-description">
        <?php echo apply_filters('the_content', $performance['description']); ?>
      </div>
      <?php if (!empty($performance['prices'])):?>
        Here
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

      <?php if (!empty($performance['ticket-url'])): ?>
        <div class="ticket-container">
          <a class="button secondary" href="<?php echo $performance['ticket-url'];?>">Buy Tickets</a>
        </div>
      <?php endif; ?>

    </div>
    <div class="cell medium-6 large-4">
      <div class="performance-image">
        <?php echo $performance['image']; ?>
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

