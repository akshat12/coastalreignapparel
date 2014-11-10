<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/ADDONS/PAGE-EXTENSIONS.PHP
// -----------------------------------------------------------------------------
// Addons extensions page output.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Page Output
// =============================================================================

// Page Output
// =============================================================================

function x_addons_page_extensions() { ?>

  <div class="wrap x-addons-extensions">

    <header class="x-addons-header">
      <h2>Extensions</h2>
      <p>Expand the functionality of X to suit your needs via the plugins available below.</p>
    </header>

    <ul class="x-addons-extensions-list" id="x-addons-extensions-list">

      <?php foreach ( TGM_Plugin_Activation::$instance->plugins as $plugin ) : ?>

        <?php

        $url = wp_nonce_url( add_query_arg( array( 'page' => TGM_Plugin_Activation::$instance->menu, 'plugin' => $plugin['slug'], 'plugin_name' => $plugin['name'], 'plugin_source' => $plugin['source'], 'tgmpa-install' => 'install-plugin', ), admin_url( TGM_Plugin_Activation::$instance->parent_url_slug ) ), 'tgmpa-install' );

        if ( x_plugin_exists( $plugin['x_plugin'] ) ) :
          if ( is_plugin_active( $plugin['x_plugin'] ) ) :
            $status         = 'active';
            $status_message = 'Installed &ndash; Active';
          else :
            $status         = 'inactive';
            $status_message = 'Installed &ndash; Inactive';
          endif;
          $button = '<a class="x-addon-button button" href="' . admin_url( 'plugins.php' ) . '">Manage Plugin</a>';
        else :
          $status         = 'not-installed';
          $status_message = 'Not Installed';
          $button         = '<a class="x-addon-button button button-primary" href="' . $url . '">Install Plugin</a>';
        endif;

        ?>

        <li class="x-addons-extension <?php echo $status ?>" id="x-addons-extension-<?php echo $plugin['slug']; ?>">
          <div class="top">
            <img src="<?php echo $plugin['x_logo']; ?>" class="img">
            <div class="info">
              <h4 class="title"><?php echo $plugin['name']; ?></h4>
              <span class="status <?php echo $status ?>"><?php echo $status_message ?></span>
              <p class="desc"><?php echo $plugin['x_description'] ?></p>
              <p class="author">
                <cite>By <?php echo $plugin['x_author']; ?></cite>
              </p>
            </div>
          </div>
          <div class="bottom"><?php echo $button; ?></div>
        </li>

      <?php endforeach; ?>

    </ul>

  </div>

<?php }