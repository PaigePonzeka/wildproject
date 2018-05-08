<?php

  function create_custom_posts() {
    create_custom_media_article();
    create_custom_performance();
    create_custom_gallery();
    create_custom_performance_archive();
    create_custom_gallery_archive();

    register_performance_archive_taxonomy();
    register_gallery_archive_taxonomy();
    register_performance_taxonomy();
    register_gallery_taxonomy();
  }

  function create_custom_media_article() {
    $plural = 'Media Articles';
    $name = 'Media Article';
    $icon = "dashicons-analytics";
    $slug = 'press';

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
        ),
      );

    register_post_type(strtolower($name), $args);
    remove_post_type_support( strtolower($name), 'comments' );
  }

  function create_custom_performance() {
    $plural = 'Performances';
    $name = 'Performance';
    $icon = "dashicons-tickets-alt";
    $slug = strtolower($plural);

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
        'taxonomies'  => array( 'category' ),
        'hierarchical' => false,
        'menu_position' => null,
        'has_archive' => true,
        'supports' => array(
          'title',
          'editor',
          'thumbnail',
          'author',
          'page-attributes'
        ),
      );

    register_post_type(strtolower($name), $args);
    remove_post_type_support( strtolower($name), 'comments' );
  }



  function create_custom_gallery() {
    $plural = 'Galleries';
    $name = 'Gallery';
    $icon = "dashicons-format-gallery";
    $slug = strtolower($plural);

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
        'taxonomies'  => array( 'category' ),
        'has_archive' => true,
        'supports' => array(
          'title',
          'editor',
          'thumbnail',
          'author',
          'page-attributes'
        ),
      );

    register_post_type(strtolower($name), $args);
    remove_post_type_support( strtolower($name), 'comments' );
  }

  function create_custom_performance_archive() {
    $plural = 'Performance Archives';
    $name = 'Performance Archive';
    $icon = "dashicons-tickets";
    $slug = 'performance-archives';

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
        ),
      );
    register_post_type(strtolower($name), $args);
    remove_post_type_support( strtolower($name), 'comments' );
  }

  function create_custom_gallery_archive() {
    $plural = 'Gallery Archives';
    $name = 'Gallery Archive';
    $icon = "dashicons-format-gallery";
    $slug = 'gallery-archives';

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
        ),
      );
    register_post_type(strtolower($name), $args);
    remove_post_type_support( strtolower($name), 'comments' );
  }

  function register_performance_archive_taxonomy() {
    $labels = array(
      'name'                       => _x( 'Years', 'taxonomy general name', 'textdomain' ),
      'singular_name'              => _x( 'Year', 'taxonomy singular name', 'textdomain' ),
      'search_items'               => __( 'Search Year', 'textdomain' ),
      'popular_items'              => __( 'Popular Years', 'textdomain' ),
      'all_items'                  => __( 'All Years', 'textdomain' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit Year', 'textdomain' ),
      'update_item'                => __( 'Update Year', 'textdomain' ),
      'add_new_item'               => __( 'Add New Year', 'textdomain' ),
      'new_item_name'              => __( 'New Year Name', 'textdomain' ),
      'separate_items_with_commas' => __( 'Separate years with commas', 'textdomain' ),
      'add_or_remove_items'        => __( 'Add or remove years', 'textdomain' ),
      'choose_from_most_used'      => __( 'Choose from the most used years', 'textdomain' ),
      'not_found'                  => __( 'No years found.', 'textdomain' ),
      'menu_name'                  => __( 'Years', 'textdomain' ),
    );

    $args = array(
      'hierarchical'          => true,
      'labels'                => $labels,
      'show_ui'               => true,
      'show_admin_column'     => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var'             => true,
      'rewrite'               => array( 'slug' => 'past-performances', 'with_front' => false ),
    );

    register_taxonomy( 'performance_year', 'performancearchive', $args );

  }

  function register_gallery_archive_taxonomy() {
    $labels = array(
      'name'                       => _x( 'Years', 'taxonomy general name', 'textdomain' ),
      'singular_name'              => _x( 'Year', 'taxonomy singular name', 'textdomain' ),
      'search_items'               => __( 'Search Year', 'textdomain' ),
      'popular_items'              => __( 'Popular Years', 'textdomain' ),
      'all_items'                  => __( 'All Years', 'textdomain' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit Year', 'textdomain' ),
      'update_item'                => __( 'Update Year', 'textdomain' ),
      'add_new_item'               => __( 'Add New Year', 'textdomain' ),
      'new_item_name'              => __( 'New Year Name', 'textdomain' ),
      'separate_items_with_commas' => __( 'Separate years with commas', 'textdomain' ),
      'add_or_remove_items'        => __( 'Add or remove years', 'textdomain' ),
      'choose_from_most_used'      => __( 'Choose from the most used years', 'textdomain' ),
      'not_found'                  => __( 'No years found.', 'textdomain' ),
      'menu_name'                  => __( 'Years', 'textdomain' ),
    );

    $args = array(
      'hierarchical'          => true,
      'labels'                => $labels,
      'show_ui'               => true,
      'show_admin_column'     => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var'             => true,
      'rewrite'               => array( 'slug' => 'past-galleries', 'with_front' => false ),
    );

    register_taxonomy( 'gallery_year', 'galleryarchive', $args );
  }

  function register_performance_taxonomy() {
    $labels = array(
      'name'                       => _x( 'Years', 'taxonomy general name', 'textdomain' ),
      'singular_name'              => _x( 'Year', 'taxonomy singular name', 'textdomain' ),
      'search_items'               => __( 'Search Year', 'textdomain' ),
      'popular_items'              => __( 'Popular Years', 'textdomain' ),
      'all_items'                  => __( 'All Years', 'textdomain' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit Year', 'textdomain' ),
      'update_item'                => __( 'Update Year', 'textdomain' ),
      'add_new_item'               => __( 'Add New Year', 'textdomain' ),
      'new_item_name'              => __( 'New Year Name', 'textdomain' ),
      'separate_items_with_commas' => __( 'Separate years with commas', 'textdomain' ),
      'add_or_remove_items'        => __( 'Add or remove years', 'textdomain' ),
      'choose_from_most_used'      => __( 'Choose from the most used years', 'textdomain' ),
      'not_found'                  => __( 'No years found.', 'textdomain' ),
      'menu_name'                  => __( 'Years', 'textdomain' ),
    );

    $args = array(
      'hierarchical'          => true,
      'labels'                => $labels,
      'show_ui'               => true,
      'show_admin_column'     => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var'             => true,
      'rewrite'               => array( 'slug' => 'past-performance', 'with_front' => false ),
    );

    register_taxonomy( 'year_performance', 'performance', $args );
  }

  function register_gallery_taxonomy() {
    $labels = array(
      'name'                       => _x( 'Years', 'taxonomy general name', 'textdomain' ),
      'singular_name'              => _x( 'Year', 'taxonomy singular name', 'textdomain' ),
      'search_items'               => __( 'Search Year', 'textdomain' ),
      'popular_items'              => __( 'Popular Years', 'textdomain' ),
      'all_items'                  => __( 'All Years', 'textdomain' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit Year', 'textdomain' ),
      'update_item'                => __( 'Update Year', 'textdomain' ),
      'add_new_item'               => __( 'Add New Year', 'textdomain' ),
      'new_item_name'              => __( 'New Year Name', 'textdomain' ),
      'separate_items_with_commas' => __( 'Separate years with commas', 'textdomain' ),
      'add_or_remove_items'        => __( 'Add or remove years', 'textdomain' ),
      'choose_from_most_used'      => __( 'Choose from the most used years', 'textdomain' ),
      'not_found'                  => __( 'No years found.', 'textdomain' ),
      'menu_name'                  => __( 'Years', 'textdomain' ),
    );

    $args = array(
      'hierarchical'          => true,
      'labels'                => $labels,
      'show_ui'               => true,
      'show_admin_column'     => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var'             => true,
      'rewrite'               => array( 'slug' => 'past-gallery', 'with_front' => false ),
    );

    register_taxonomy( 'year_gallery', 'gallery', $args );
  }


  add_action('init', 'create_custom_posts');
?>