<?php
  $taxonomy_terms = get_terms( $archive_type, array(
      'hide_empty' => 0
  ) ); ?>

    <?php foreach($taxonomy_terms as $taxonomy_term):?>
      <div class="cell medium-6 large-4">
        <a href="<?php echo get_term_link($taxonomy_term); ?>">
          <?php echo $taxonomy_term->name; ?>
        </a>
      </div>
    <?php endforeach;?>
