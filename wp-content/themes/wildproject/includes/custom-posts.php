<?php

  function create_custom_performance() {
    create_custom_post_type('Performance', 'dashicons-tickets-alt', '');
    create_custom_post_type('Gallery', 'dashicons-format-gallery', 'Galleries');
  }


  function create_custom_post_type($name, $icon, $plural) {
    if (empty($plural)) {
      $plural = $name . 's';
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
        'rewrite' => array( 'slug' => strtolower($name . 's'), 'with_front' => true ),
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
    /*register_taxonomy(
      'app_category',

      'app',
        array(
          'hierarchical' => true,
          'rewrite' => array( 'slug' => 'products/apps-category', 'with_front' => false )
        )
    );*/
  }


  add_action('init', 'create_custom_performance');
?>