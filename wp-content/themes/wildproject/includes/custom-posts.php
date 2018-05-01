<?php

  function create_custom_performance() {
    create_custom_post_type('Media Article', 'dashicons-analytics', 'Media Articles', 'press');
    create_custom_post_type('Performance', 'dashicons-tickets-alt', '');
    create_custom_post_type('Gallery', 'dashicons-format-gallery', 'Galleries');
    create_custom_post_type('Performance Archive', 'dashicons-format-gallery', 'Performance Archives', 'performance-archives');

    register_archive_taxonomy();
  }


  function create_custom_post_type($name, $icon, $plural, $slug=null) {
    if (empty($plural)) {
      $plural = $name . 's';
    }

    if (empty($slug)) {
      $slug = strtolower($plural);
    }

    $labels = array(
      'name'  => $plural,
      'singular_name' => $name,
      'add_new' => 'Add New '. $name,
      'edit_item' => 'Edit ' . $name,
      'view_item' => 'View ' . $name,
      'add_new_item' => 'Add New ' . $name
      );

     $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => $icon,
        'query_var' => true,
        'rewrite' => array( 'slug' => $slug, 'with_front' => true ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'has_archive' => true,
        'supports' => array(
          'title',
          'editor',
          'thumbnail',
          'author',
          'page-attributes'
        )
      );

    register_post_type(strtolower($name), $args);
    remove_post_type_support( strtolower($name), 'comments' );
  }

  function register_archive_taxonomy() {
    $type = "Year";
    $labels = array(
      'name'                       => _x( $type . 's', 'taxonomy general name', 'textdomain' ),
      'singular_name'              => _x( '', 'taxonomy singular name', 'textdomain' ),
      'search_items'               => __( 'Search ' . $type, 'textdomain' ),
      'popular_items'              => __( 'Popular ' .$type .'s', 'textdomain' ),
      'all_items'                  => __( 'All ' .$type .'s', 'textdomain' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit ' . $type, 'textdomain' ),
      'update_item'                => __( 'Update ' . $type, 'textdomain' ),
      'add_new_item'               => __( 'Add New ' . $type, 'textdomain' ),
      'new_item_name'              => __( 'New ' . $type . ' Name', 'textdomain' ),
      'separate_items_with_commas' => __( 'Separate '. $type .'s with commas', 'textdomain' ),
      'add_or_remove_items'        => __( 'Add or remove types', 'textdomain' ),
      'choose_from_most_used'      => __( 'Choose from the most used types', 'textdomain' ),
      'not_found'                  => __( 'No types found.', 'textdomain' ),
      'menu_name'                  => __( $type . 's', 'textdomain' ),
    );

    $args = array(
      'hierarchical'          => true,
      'labels'                => $labels,
      'show_ui'               => true,
      'show_admin_column'     => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var'             => true,
      'rewrite'               => array( 'slug' => 'performance/archives' , 'with_front' => false ),
    );

    register_taxonomy( 'year', 'performancearchive', $args );
  }



  add_action('init', 'create_custom_performance');
?>