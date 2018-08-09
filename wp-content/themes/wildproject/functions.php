<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */



/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Format comments */
require_once( 'library/class-foundationpress-comments.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/class-foundationpress-top-bar-walker.php' );
require_once( 'library/class-foundationpress-mobile-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );
//
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}

function wpsites_query( $query ) {
if ( $query->is_archive() && $query->is_main_query() && !is_admin() ) {
        $query->set( 'posts_per_page', 200 );
    }
}
add_action( 'pre_get_posts', 'wpsites_query' );


/**
 * Gets performance post details from a postId
 * @param  [integer] $postID the id of a given post
 * @return [type]         [description]
 */
function get_the_performance($postID) {
  $prices = Array();
  // check if the repeater field has rows of data
  if( have_rows('ticket_prices', $postID) ):

    // loop through the rows of data
    while ( have_rows('ticket_prices', $postID) ) : the_row();
        array_push($prices, Array(
          'price' => get_sub_field('price'),
          'type' => get_sub_field('type')
        ));
      endwhile;
  endif;
  $performance = Array(
    'title' => get_the_title($postID),
    'description' => get_the_content($postID),
    'pretitle' => get_field('pretitle', $postID),
    'subtitle' => get_field('subtitle', $postID),
    'start-date' => get_field('start_date', $postID),
    'end-date' => get_field('end_date', $postID),
    'cast' => get_field('cast', $postID),
    'ticket-url' => get_field('ticket_url', $postID),
    'prices' => $prices,
    'image' => get_the_post_thumbnail($postID)
  );

  return $performance;
}

// add Publisher Custom performance Type
require_once( __DIR__ . '/includes/custom-posts.php');
