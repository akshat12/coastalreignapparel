<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/TMG/REGISTRATION.PHP
// -----------------------------------------------------------------------------
// Registers the plugins to be included via the TMG Plugin Activation class.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Register Theme Plugins
// =============================================================================

// Register Theme Plugins
// =============================================================================

if ( ! function_exists( 'x_register_theme_plugins' ) ) :
  function x_register_theme_plugins() {

    $plugins = array(
      array(
        'name'               => 'X &ndash; Shortcodes',
        'slug'               => 'x-shortcodes',
        'source'             => X_TEMPLATE_URL . '/framework/plugins/x-shortcodes.zip',
        'required'           => true,
        'version'            => '',
        'force_activation'   => true,
        'force_deactivation' => false,
        'external_url'       => '',
        'x_plugin'           => 'x-shortcodes/x-shortcodes.php',
        'x_author'           => 'Themeco',
        'x_description'      => 'This plugin is required to run X as it includes all of our shortcode functionality, which is tightly integrated into the theme.',
        'x_logo'             => X_TEMPLATE_URL . '/framework/img/global/admin/addons/logo-x-shortcodes.png',
        'x_manage_upgrade'   => false
      ),
      array(
        'name'               => 'Slider Revolution',
        'slug'               => 'revslider',
        'source'             => X_TEMPLATE_URL . '/framework/plugins/revslider.zip',
        'required'           => false,
        'version'            => '4.6.0',
        'force_activation'   => false,
        'force_deactivation' => false,
        'external_url'       => '',
        'x_plugin'           => 'revslider/revslider.php',
        'x_author'           => 'ThemePunch',
        'x_description'      => 'Create responsive sliders with must-see-effects, all while maintaining your search engine optimization.',
        'x_logo'             => X_TEMPLATE_URL . '/framework/img/global/admin/addons/logo-slider-revolution.png',
        'x_manage_upgrade'   => true
      ),
      array(
        'name'               => 'Visual Composer',
        'slug'               => 'js_composer',
        'source'             => X_TEMPLATE_URL . '/framework/plugins/js_composer.zip',
        'required'           => false,
        'version'            => '4.1.3',
        'force_activation'   => false,
        'force_deactivation' => false,
        'external_url'       => '',
        'x_plugin'           => 'js_composer/js_composer.php',
        'x_author'           => 'WPBakery',
        'x_description'      => 'Visual Composer for WordPress is a drag and drop page builder plugin that will save you tons of time working on site content.',
        'x_logo'             => X_TEMPLATE_URL . '/framework/img/global/admin/addons/logo-visual-composer.png',
        'x_manage_upgrade'   => true
      )
    );

    $config = array(
      'domain'           => '__x__',
      'default_path'     => 'tgmpa-install-plugins',
      'parent_menu_slug' => 'themes.php',
      'parent_url_slug'  => 'themes.php',
      'menu'             => 'install-required-plugins',
      'has_notices'      => true,
      'dismissable'      => true,
      'dismiss_msg'      => '',
      'is_automatic'     => true,
      'message'          => '',
      'strings'          => array(
        'page_title'                      => __( 'Install Required Plugins', '__x__' ),
        'menu_title'                      => __( 'Install Plugins', '__x__' ),
        'installing'                      => __( 'Installing Plugin: %s', '__x__' ),
        'oops'                            => __( 'Something went wrong with the plugin API.', '__x__' ),
        'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
        'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
        'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
        'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
        'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
        'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
        'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
        'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
        'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
        'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
        'return'                          => __( 'Return to Required Plugins Installer', '__x__' ),
        'plugin_activated'                => __( 'Plugin activated successfully.', '__x__' ),
        'complete'                        => __( 'All plugins installed and activated successfully. %s', '__x__' ),
        'nag_type'                        => 'updated'
      )
    );

    tgmpa( $plugins, $config );

  }

  add_action( 'tgmpa_register', 'x_register_theme_plugins' );
endif;