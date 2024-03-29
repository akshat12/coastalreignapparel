<?php

// =============================================================================
// FUNCTIONS/ENQUEUE/SCRIPTS.PHP
// -----------------------------------------------------------------------------
// Enqueue all scripts for X - Shortcodes.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Register and Enqueue Site Scripts
// =============================================================================

// Register and Enqueue Site Scripts
// =============================================================================

function x_shortcodes_enqueue_site_scripts() {

  wp_register_script( 'x-shortcodes-site-head', X_SHORTCODES_URL . '/js/dist/site/x-shortcodes-head.min.js', array( 'jquery' ), NULL, false );
  wp_register_script( 'x-shortcodes-site-body', X_SHORTCODES_URL . '/js/dist/site/x-shortcodes-body.min.js', array( 'jquery' ), NULL, true );
  wp_register_script( 'vendor-ilightbox',       X_SHORTCODES_URL . '/js/dist/site/vendor-ilightbox.min.js',  array( 'jquery' ), NULL, true );
  wp_register_script( 'vendor-google-maps',     'https://maps.googleapis.com/maps/api/js?sensor=false',      array( 'jquery' ), NULL, true );

  wp_enqueue_script( 'x-shortcodes-site-head' );
  wp_enqueue_script( 'x-shortcodes-site-body' );

  if ( x_has_shortcode( 'lightbox' ) ) {
    wp_enqueue_script( 'vendor-ilightbox' );
  }

}

add_action( 'wp_enqueue_scripts', 'x_shortcodes_enqueue_site_scripts' );