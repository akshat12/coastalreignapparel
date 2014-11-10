<?php

// =============================================================================
// VIEWS/ETHOS/TEMPLATE-BLANK-3.PHP (Container | No Header, No Footer)
// -----------------------------------------------------------------------------
// A blank page for creating unique layouts.
// =============================================================================

?>

<?php x_get_view( 'global', '_header' ); ?>

  <div id="top" class="site">
    <?php x_get_view( 'global', '_slider-revolution-above' ); ?>
    <?php x_get_view( 'global', '_slider-revolution-below' ); ?>
    <div class="x-container-fluid max width main">
      <div class="offset cf">
        <div class="x-main full" role="main">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-wrap entry-content">

              <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
                <?php x_link_pages(); ?>
              <?php endwhile; ?>

            </div>
          </article>
        </div>
      </div>
    </div>
  </div> <!-- end .site -->

  <?php x_get_view( 'global', '_footer', 'scroll-top' ); ?>
<?php x_get_view( 'global', '_footer' ); ?>