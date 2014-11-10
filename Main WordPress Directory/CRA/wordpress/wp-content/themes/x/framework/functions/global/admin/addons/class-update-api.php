<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/ADDONS/CLASS-UPDATE-API.PHP
// -----------------------------------------------------------------------------
// The update API for X and related plugins.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Update API
// =============================================================================

// Update API
// =============================================================================

class X_Update_API {

  //
  // Holds a copy of itself so it can be referenced by the class name.
  //

  private static $instance;


  //
  // The update URL base.
  //

  private static $update_url = 'http://theme.co/x/member/wp-admin/admin-ajax.php?action=autoupdates';


  //
  // Adds a reference of this object to $instance and adds hooks.
  //

  public function __construct() {

    self::$instance = $this;

    add_action( 'init', array( $this, 'init' ) );

  }


  //
  // This class setup instantiates the theme and plugin updaters based on
  // WordPress permissions.
  //

  public function init() {

    if ( current_user_can( 'update_plugins' ) ) {
      new X_Plugin_Updater;
    }

    if ( current_user_can( 'update_themes' ) ) {
      new X_Theme_Updater;
    }

  }


  //
  // Request information from the remote update API. The $args input is an
  // array of parameters to send or override.
  //

  public static function remote_request( $args ) {
    
    $name    = x_addons_get_api_key_option_name();
    $api_key = strip_tags( get_option( $name ) );
    
    ( $api_key == '' ) ? $api_key = 'unverified' : false;

    $url = add_query_arg(
      wp_parse_args( $args, array(
        'api-key' => $api_key,
        'siteurl' => urlencode( network_site_url() )
      )
    ), self::$update_url );

    $request = wp_remote_get( $url );

    $data = json_decode( $request['body'], true );


    //
    // Key was good but is now invalid (revoked).
    //

    if ( $api_key != '' && $data['code'] == 3 ) {
      delete_option( $name );
    }
    
    return $data;

  }


  //
  // Override the API key so we can test one specifically.
  //

  public static function validate_key( $key ) {
    return self::remote_request( array( 'api-key' => strip_tags( $key ), 'product' => 'x-the-theme' ) );
  }


  //
  // Retrieve remote product.
  //

  public static function get_product( $slug ) {
    return self::remote_request( array( 'product' => $slug ) );
  }


  //
  // Shortcut to retrieve X remote data.
  //

  public static function get_x_theme() {
    return self::get_product( 'x-the-theme' );
  }


  //
  // Shortcut to retrieve X - Shortcodes data. 
  //

  public static function get_x_shortcodes() {
    return self::get_product( 'x-shortcodes' );
  }


  //
  // Links to the validation page (output when an update is available and if a
  // user has not yet validated their purchase).
  //

  public static function get_validation_html_theme_main() {
    return '<a href="' . x_addons_get_link_home() . '">Validate X to enable automatic updates</a>';
  }

  public static function get_validation_html_theme_updates() {
    return '<a href="' . x_addons_get_link_home() . '">Validate X to enable automatic updates</a>';
  }

  public static function get_validation_html_plugin_main() {
    return '<a href="' . x_addons_get_link_home() . '">Validate X to enable automatic updates</a>.';
  }

  public static function get_validation_html_plugin_updates() {
    return '<a href="' . x_addons_get_link_home() . '">Validate X to enable automatic updates (go to "Addons" &gt; "Home" to learn more)</a>.';
  }

}

new X_Update_API;