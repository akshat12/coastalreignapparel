<?php

// =============================================================================
// SHORTCODES.PHP
// -----------------------------------------------------------------------------
// Shortcodes for X.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Dropcap
//   02. Horizontal Rule
//   03. Gap
//   04. Clear
//   05. Highlight
//   06. Quotes
//       a. Blockquote
//       b. Pullquote
//   07. Alert
//   08. Maps
//       a. Embed
//       b. Google Map
//       c. Google Map Marker
//   09. Skill Bar
//   10. Code
//   11. Buttons
//   12. Icons
//   13. Block Grid
//       a. Grid
//       b. Grid Item
//   14. Images
//   15. Icon List
//       a. List
//       b. List Item
//   16. Popovers and Tooltips
//   17. Text Columns
//   18. Responsive Video
//       a. Video Player
//       b. Video Embed
//   19. Accordion
//       a. Accordion
//       b. Accordion Item
//   20. Tabbed Content
//       a. Tab Nav
//       b. Tab Nav Item
//       c. Tabs
//       d. Tab
//   21. Responsive Visibility
//   22. Content Columns
//   23. Responsive Slider
//       a. Slider
//       b. Slide
//   24. Protected Content
//   25. Recent Posts
//   26. Audio
//       a. Audio Player
//       b. Audio Embed
//   27. Responsive Pricing Table
//   28. Callout
//   29. Promo
//   30. Responsive Lightbox
//   31. Post Author
//   32. Prompt
//   33. Content Band
//   34. Entry Share
//   35. Table of Contents
//       a. Container
//       b. Item
//   36. Custom Headline
//   37. Social Icons
//   38. Container
//   39. Feature Headline
//   40. Responsive Text
//   41. Search
//   42. Counter
// =============================================================================

// Dropcap
// =============================================================================

function x_shortcode_dropcap( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-dropcap ' . esc_attr( $class ) : 'x-dropcap';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
    
  $output = "<span {$id} class=\"{$class}\" {$style}>{$content}</span>";
  
  return $output;
}

add_shortcode( 'dropcap', 'x_shortcode_dropcap' );



// Horizontal Rule
// =============================================================================

function x_shortcode_hr( $atts ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-hr ' . esc_attr( $class ) : 'x-hr';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
    
  $output = "<hr {$id} class=\"{$class}\" {$style}>";
  
  return $output;
}

add_shortcode( 'line', 'x_shortcode_hr' );



// Gap
// =============================================================================

function x_shortcode_gap( $atts ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
    'size'  => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-gap ' . esc_attr( $class ) : 'x-gap';
  $style = ( $style != '' ) ? $style : '';
  $size  = ( $size  != '' ) ? "margin: {$size} 0 0 0;" : 'margin: 0;';
    
  $output = "<hr {$id} class=\"{$class}\" style=\"{$style}{$size}\">";
  
  return $output;
}

add_shortcode( 'gap', 'x_shortcode_gap' );



// Clear
// =============================================================================

function x_shortcode_clear( $atts ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-clear ' . esc_attr( $class ) : 'x-clear';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
    
  $output = "<hr {$id} class=\"{$class}\" {$style}>";
  
  return $output;
}

add_shortcode( 'clear', 'x_shortcode_clear' );



// Highlight
// =============================================================================

function x_shortcode_highlight( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
    'type'  => ''

  ), $atts ) );

  $id    = ( $id    != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != ''     ) ? 'x-highlight ' . esc_attr( $class ) : 'x-highlight';
  $style = ( $style != ''     ) ? 'style="' . $style . '"' : '';
  $type  = ( $type  == 'dark' ) ? ' dark' : '';
    
  $output = "<mark {$id} class=\"{$class}{$type}\" {$style}>{$content}</mark>";
  
  return $output;
}

add_shortcode( 'highlight', 'x_shortcode_highlight' );



// Quotes
// =============================================================================

//
// 1. Blockquote.
// 2. Pullquote.
//

function x_shortcode_blockquote( $atts, $content = null ) { // 1
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
    'cite'  => '',
    'type'  => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-blockquote ' . esc_attr( $class ) : 'x-blockquote';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $cite  = ( $cite  != '' ) ? '<cite class="x-cite">' . $cite . '</cite>' : '';
  switch ( $type ) {
    case 'right' :
      $type = ' right-text';
      break;
    case 'center' :
      $type = ' center-text';
      break;
    default :
      $type = '';
  }
    
  $output = "<blockquote {$id} class=\"{$class}{$type}\" {$style}>" . do_shortcode( $content ) . $cite . "</blockquote>";
  
  return $output;
}

add_shortcode( 'blockquote', 'x_shortcode_blockquote' );


function x_shortcode_pullquote( $atts, $content = null ) { // 2
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
    'cite'  => '',
    'type'  => 'right'
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-blockquote x-pullquote ' . esc_attr( $class ) : 'x-blockquote x-pullquote';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $cite  = ( $cite  != '' ) ? '<cite class="x-cite">' . $cite . '</cite>' : '';
  $type  = ( $type  != '' ) ? ' ' . $type : '';
    
  $output = "<blockquote {$id} class=\"{$class}{$type}\" {$style}>" . do_shortcode( $content ) . $cite . "</blockquote>";
  
  return $output;
}

add_shortcode( 'pullquote', 'x_shortcode_pullquote' );



// Alert
// =============================================================================

function x_shortcode_alert( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'      => '',
    'class'   => '',
    'style'   => '',
    'type'    => '',
    'heading' => '',
    'close'   => ''
  ), $atts ) );

  $id      = ( $id      != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class   = ( $class   != '' ) ? 'x-alert ' . esc_attr( $class ) : 'x-alert';
  $style   = ( $style   != '' ) ? 'style="' . $style . '"' : '';
  $type    = ( $type    != '' ) ? ' x-alert-' . $type : '';
  $heading = ( $heading != '' ) ? $heading = '<h6 class="h-alert">' . $heading . '</h6>' : $heading = '';
  if ( $close == 'true' ) {
    $close = ' fade in';
    $close_btn = '<button type="button" class="close" data-dismiss="alert">&times;</button>';
  } else {
    $close = ' x-alert-block';
    $close_btn = '';
  }
    
  $output = "<div {$id} class=\"{$class}{$type}{$close}\" {$style}>{$close_btn}{$heading}" . do_shortcode( $content ) . "</div>";
  
  return $output;
}

add_shortcode( 'alert', 'x_shortcode_alert' );



// Maps
// =============================================================================

//
// 1. Embed.
// 2. Google map.
// 3. Google map marker.
//

function x_shortcode_map( $atts, $content = null ) { // 1
  extract( shortcode_atts( array(
    'id'           => '',
    'class'        => '',
    'style'        => '',
    'no_container' => ''
  ), $atts ) );

  $id           = ( $id           != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class        = ( $class        != ''     ) ? 'x-map ' . esc_attr( $class ) : 'x-map';
  $style        = ( $style        != ''     ) ? 'style="' . $style . '"' : '';
  $no_container = ( $no_container == 'true' ) ? '' : ' with-container';
    
  $output = "<div {$id} class=\"{$class}{$no_container}\" {$style}><div class=\"x-map-inner\">{$content}</div></div>";
  
  return $output;
}

add_shortcode( 'map', 'x_shortcode_map' );


function x_shortcode_google_map( $atts, $content = null ) { // 2
  extract( shortcode_atts( array(
    'class'        => '',
    'style'        => '',
    'lat'          => '',
    'lng'          => '',
    'drag'         => '',
    'zoom'         => '',
    'zoom_control' => '',
    'height'       => '',
    'hue'          => '',
    'no_container' => ''
  ), $atts ) );

  $class        = ( $class        != ''     ) ? 'x-map x-google-map ' . esc_attr( $class ) : 'x-map x-google-map';
  $style        = ( $style        != ''     ) ? 'style="' . $style . '"' : '';
  $lat          = ( $lat          != ''     ) ? $lat : '40.7056308';
  $lng          = ( $lng          != ''     ) ? $lng : '-73.9780035';
  $drag         = ( $drag         == 'true' ) ? 'data-map-drag="true"' : '';
  $zoom         = ( $zoom         != ''     ) ? $zoom : '12';
  $zoom_control = ( $zoom_control == 'true' ) ? 'data-map-zoom-control="true"' : '';
  $height       = ( $height       != ''     ) ? 'style="padding-bottom: ' . $height . ';"' : '';
  $hue          = ( $hue          != ''     ) ? 'data-map-hue="' . $hue . '"' : '';
  $no_container = ( $no_container == 'true' ) ? '' : ' with-container';

  wp_enqueue_script( 'vendor-google-maps' );

  static $count = 0; $count++;

  $output = "<div id=\"x-google-map-{$count}\" class=\"{$class}{$no_container}\" {$style}><div id=\"x-google-map-inner-{$count}\" class=\"x-map-inner x-google-map-inner\" {$height} data-map-lat=\"{$lat}\" data-map-lng=\"{$lng}\" data-map-zoom=\"{$zoom}\" {$zoom_control} {$drag} {$hue}></div>" . do_shortcode( $content ) . "</div>";
  
  return $output;
}

add_shortcode( 'google_map', 'x_shortcode_google_map' );


function x_shortcode_google_map_marker( $atts ) { // 3
  extract( shortcode_atts( array(
    'lat'   => '',
    'lng'   => '',
    'info'  => '',
    'image' => '',
  ), $atts ) );

  $lat   = ( $lat   != '' ) ? $lat : '40.7056308';
  $lng   = ( $lng   != '' ) ? $lng : '-73.9780035';
  $info  = ( $info  != '' ) ? 'data-map-marker-info="' . $info . '"' : '';
  $image = ( $image != '' ) ? $image : '';

  if ( is_numeric( $image ) ) {
    $image_info = wp_get_attachment_image_src( $image, 'full' );
    $image      = 'data-map-marker-image="' . $image_info[0] . '"';
  } else if ( $image == '' ) {
    $image = '';
  } else {
    $image = 'data-map-marker-image="' . $image . '"';
  }

  $output = "<div class=\"x-google-map-marker\" style=\"position: absolute; visibility: hidden;\" data-map-marker-lat=\"{$lat}\" data-map-marker-lng=\"{$lng}\" {$info} {$image}></div>";
  
  return $output;
}

add_shortcode( 'google_map_marker', 'x_shortcode_google_map_marker' );



// Skill Bar
// =============================================================================

function x_shortcode_skill_bar( $atts ) {
  extract( shortcode_atts( array(
    'id'       => '',
    'class'    => '',
    'style'    => '',
    'heading'  => '',
    'bar_text' => '',
    'percent'  => ''
  ), $atts ) );

  $id       = ( $id       != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class    = ( $class    != '' ) ? 'x-skill-bar ' . esc_attr( $class ) : 'x-skill-bar';
  $style    = ( $style    != '' ) ? ' ' . $style : '';
  $heading  = ( $heading  != '' ) ? '<h6 class="h-skill-bar">' . $heading . '</h6>' : '';
  $bar_text = ( $bar_text != '' ) ? $bar_text : '';
  $percent  = ( $percent  != '' ) ? $percent : '';

  
  if ( $bar_text != '' ) {
    $output = "{$heading}<div {$id} class=\"{$class}\" data-percentage=\"{$percent}\"><div class=\"bar\" style=\"{$style}\"><div class=\"percent\">{$bar_text}</div></div></div>";
  } else {
    $output = "{$heading}<div {$id} class=\"{$class}\" data-percentage=\"{$percent}\"><div class=\"bar\" style=\"{$style}\"><div class=\"percent\">{$percent}</div></div></div>";
  }

  return $output;
}

add_shortcode( 'skill_bar', 'x_shortcode_skill_bar' );



// Code
// =============================================================================

function x_shortcode_code( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-code ' . esc_attr( $class ) : 'x-code';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
    
  $output = "<pre {$id} class=\"{$class}\" {$style}><code>{$content}</code></pre>";
  
  return $output;
}

add_shortcode( 'code', 'x_shortcode_code' );



// Buttons
// =============================================================================

function x_shortcode_button( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'               => '',
    'class'            => '',
    'style'            => '',
    'type'             => '',
    'shape'            => '',
    'size'             => '',
    'float'            => '',
    'block'            => '',
    'circle'           => '',
    'icon_only'        => '',
    'href'             => '',
    'title'            => '',
    'target'           => '',
    'info'             => '',
    'info_place'       => '',
    'info_trigger'     => '',
    'info_content'     => '',
    'lightbox_thumb'   => '',
    'lightbox_video'   => '',
    'lightbox_caption' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? ' ' . esc_attr( $class ) : '';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $type  = ( $type  != '' ) ? ' x-btn-' . $type : '';
  $shape = ( $shape != '' ) ? ' x-btn-' . $shape : '';
  $size  = ( $size  != '' ) ? ' x-btn-' . $size : '';
  switch ( $float ) {
    case 'left' :
      $float = ' alignleft';
      break;
    case 'right' :
      $float = ' alignright';
      break;
    default :
      $float = '';
  }
  $block            = ( $block            == 'true'  ) ? ' x-btn-block' : '';
  $icon_only        = ( $icon_only        == 'true'  ) ? ' x-btn-icon-only' : '';
  $href             = ( $href             != ''      ) ? $href : '#';
  $title            = ( $title            != ''      ) ? 'title="' . $title . '"' : '';
  $target           = ( $target           == 'blank' ) ? 'target="_blank"' : '';
  $info             = ( $info             != ''      ) ? 'data-toggle="' . $info . '"' : '';
  $info_place       = ( $info_place       != ''      ) ? 'data-placement="' . $info_place . '"' : '';
  $info_trigger     = ( $info_trigger     != ''      ) ? 'data-trigger="' . $info_trigger . '"' : '';
  $info_content     = ( $info_content     != ''      ) ? 'data-content="' . $info_content . '"' : '';
  $lightbox_thumb   = ( $lightbox_thumb   != ''      ) ? $lightbox_thumb : '';
  $lightbox_video   = ( $lightbox_video   == 'true'  ) ? ', width: 1080, height: 608' : '';
  $lightbox_caption = ( $lightbox_caption != ''      ) ? 'data-caption="' . $lightbox_caption . '"' : '';

  if ( is_numeric( $lightbox_thumb ) ) {
    $lightbox_thumb_info = wp_get_attachment_image_src( $lightbox_thumb, 'full' );
    $lightbox_thumb      = $lightbox_thumb_info[0];
  }

  if ( $lightbox_video != '' ) {
    $lightbox_options = "data-options=\"thumbnail: '" . $lightbox_thumb . "'{$lightbox_video}\"";
  } else {
    $lightbox_options = "data-options=\"thumbnail: '" . $lightbox_thumb . "'\"";
  }

  if ( $circle == 'true' ) {
    $output = "<div {$id} class=\"x-btn-circle-wrap{$size}{$block}{$float}\" {$style}><a class=\"x-btn{$class}{$type}{$shape}{$size}{$block}{$icon_only}\" href=\"{$href}\" {$title} {$target} {$info} {$info_place} {$info_trigger} {$info_content} {$lightbox_caption} {$lightbox_options}>" . do_shortcode( $content ) . "</a></div>";
  } else {
    $output = "<a {$id} class=\"x-btn{$class}{$type}{$shape}{$size}{$block}{$float}{$icon_only}\" {$style} href=\"{$href}\" {$title} {$target} {$info} {$info_place} {$info_trigger} {$info_content} {$lightbox_caption} {$lightbox_options}>" . do_shortcode( $content ) . "</a>";
  }
  
  return $output;
}

add_shortcode( 'button', 'x_shortcode_button' );



// Icons
// =============================================================================

function x_shortcode_icon( $atts ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
    'type'  => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-icon ' . esc_attr( $class ) : 'x-icon';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $type  = ( $type  != '' ) ? ' x-icon-' . $type : '';
    
  $output = "<i {$id} class=\"{$class}{$type}\" {$style}></i>";
  
  return $output;
}

add_shortcode( 'icon', 'x_shortcode_icon' );



// Block Grid
// =============================================================================

//
// 1. Grid.
// 2. Grid item.
//

function x_shortcode_block_grid( $atts, $content = null ) { // 1
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
    'type'  => ''
  ), $atts ) );

  $id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class  = ( $class != '' ) ? 'x-block-grid ' . esc_attr( $class ) : 'x-block-grid';
  $style  = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $type   = ( $type  != '' ) ? ' ' . $type : '';

  $output = "<ul {$id} class=\"{$class}{$type}\" {$style}>" . do_shortcode( $content ) . "</ul>";
  
  return $output;
}

add_shortcode( 'block_grid', 'x_shortcode_block_grid' );


function x_shortcode_block_grid_item( $atts, $content = null ) { // 2
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-block-grid-item ' . esc_attr( $class ) : 'x-block-grid-item';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
    
  $output = "<li {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</li>";
  
  return $output;
}

add_shortcode( 'block_grid_item', 'x_shortcode_block_grid_item' );



// Images
// =============================================================================

function x_shortcode_image( $atts ) {
  extract( shortcode_atts( array(
    'id'               => '',
    'class'            => '',
    'style'            => '',
    'type'             => '',
    'float'            => '',
    'src'              => '',
    'alt'              => '',
    'link'             => '',
    'href'             => '',
    'title'            => '',
    'target'           => '',
    'info'             => '',
    'info_place'       => '',
    'info_trigger'     => '',
    'info_content'     => '',
    'lightbox_thumb'   => '',
    'lightbox_video'   => '',
    'lightbox_caption' => ''
  ), $atts ) );

  $id               = ( $id               != ''      ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class            = ( $class            != ''      ) ? 'x-img ' . esc_attr( $class ) : 'x-img';
  $style            = ( $style            != ''      ) ? 'style="' . $style . '"' : '';
  $type             = ( $type             != ''      ) ? ' x-img-' . $type : '';
  $float            = ( $float            != ''      ) ? ' ' . $float : '';
  $src              = ( $src              != ''      ) ? $src : 'http://bit.ly/1i39aq7';
  $alt              = ( $alt              != ''      ) ? 'alt="' . $alt . '"' : '';
  $link             = ( $link             == 'true'  ) ? 'true' : '';
  $link_class       = ( $link             == 'true'  ) ? ' x-img-link' : '';
  $href             = ( $href             != ''      ) ? $href : $src;
  $title            = ( $title            != ''      ) ? 'title="' . $title . '"' : '';
  $target           = ( $target           == 'blank' ) ? 'target="_blank"' : '';
  $info             = ( $info             != ''      ) ? 'data-toggle="' . $info . '"' : '';
  $info_place       = ( $info_place       != ''      ) ? 'data-placement="' . $info_place . '"' : '';
  $info_trigger     = ( $info_trigger     != ''      ) ? 'data-trigger="' . $info_trigger . '"' : '';
  $info_content     = ( $info_content     != ''      ) ? 'data-content="' . $info_content . '"' : '';
  $lightbox_thumb   = ( $lightbox_thumb   != ''      ) ? $lightbox_thumb : $src;
  $lightbox_video   = ( $lightbox_video   == 'true'  ) ? ', width: 1080, height: 608' : '';
  $lightbox_caption = ( $lightbox_caption != ''      ) ? 'data-caption="' . $lightbox_caption . '"' : '';

  if ( is_numeric( $src ) ) {
    $src_info = wp_get_attachment_image_src( $src, 'full' );
    $src      = $src_info[0];
  }

  if ( is_numeric( $href ) ) {
    $href_info = wp_get_attachment_image_src( $href, 'full' );
    $href      = $href_info[0];
  }

  if ( is_numeric( $lightbox_thumb ) ) {
    $lightbox_thumb_info = wp_get_attachment_image_src( $lightbox_thumb, 'full' );
    $lightbox_thumb      = $lightbox_thumb_info[0];
  }

  if ( $lightbox_video != '' ) {
    $lightbox_options = "data-options=\"thumbnail: '" . $lightbox_thumb . "'{$lightbox_video}\"";
  } else {
    $lightbox_options = "data-options=\"thumbnail: '" . $lightbox_thumb . "'\"";
  }

  if ( $link == 'true' ) {
    $output = "<a {$id} class=\"{$class}{$link_class}{$type}{$float}\" {$style} href=\"{$href}\" {$title} {$target} {$info} {$info_place} {$info_trigger} {$info_content} {$lightbox_caption} {$lightbox_options}><img src=\"{$src}\" {$alt}></a>";
  } else {
    $output = "<img {$id} class=\"{$class}{$type}{$float}\" {$style} src=\"{$src}\" {$alt}>";
  }
  
  return $output;
}

add_shortcode( 'image', 'x_shortcode_image' );



// Icon List
// =============================================================================

//
// 1. List.
// 2. List item.
//

function x_shortcode_icon_list( $atts, $content = null ) { // 1
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-ul-icons ' . esc_attr( $class ) : 'x-ul-icons';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';

  $output = "<ul {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</ul>";
  
  return $output;
}

add_shortcode( 'icon_list', 'x_shortcode_icon_list' );


function x_shortcode_icon_list_item( $atts, $content = null ) { // 2
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
    'type'  => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-li-icon ' . esc_attr( $class ) : 'x-li-icon';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $type  = ( $type  != '' ) ? ' x-icon-' . $type : '';

  $output = "<li {$id} class=\"{$class}\" {$style}><i class=\"{$type}\"></i>" . do_shortcode( $content ) . "</li>";
  
  return $output;
}

add_shortcode( 'icon_list_item', 'x_shortcode_icon_list_item' );



// Popovers and Tooltips
// =============================================================================

function x_shortcode_extra( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'           => '',
    'class'        => '',
    'style'        => '',
    'href'         => '',
    'title'        => '',
    'target'       => '',
    'info'         => '',
    'info_place'   => '',
    'info_trigger' => '',
    'info_content' => ''
  ), $atts ) );

  $id           = ( $id           != ''      ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class        = ( $class        != ''      ) ? 'x-extra ' . esc_attr( $class ) : 'x-extra';
  $style        = ( $style        != ''      ) ? 'style="' . $style . '"' : '';
  $href         = ( $href         != ''      ) ? $href : '#';
  $title        = ( $title        != ''      ) ? 'title="' . $title . '"' : '';
  $target       = ( $target       == 'blank' ) ? 'target="_blank"' : '';
  $info         = ( $info         != ''      ) ? 'data-toggle="' . $info . '"' : '';
  $info_place   = ( $info_place   != ''      ) ? 'data-placement="' . $info_place . '"' : '';
  $info_trigger = ( $info_trigger != ''      ) ? 'data-trigger="' . $info_trigger . '"' : '';
  $info_content = ( $info_content != ''      ) ? 'data-content="' . $info_content . '"' : '';

  $output = "<a {$id} class=\"{$class}\" {$style} href=\"{$href}\" {$title} {$target} {$info} {$info_place} {$info_trigger} {$info_content}>" . do_shortcode( $content ) . "</a>";
  
  return $output;
}

add_shortcode( 'extra', 'x_shortcode_extra' );



// Text Columns
// =============================================================================

function x_shortcode_columnize( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-columnize ' . esc_attr( $class ) : 'x-columnize';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';

  $output = "<div {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</div>";
  
  return $output;
}

add_shortcode( 'columnize', 'x_shortcode_columnize' );



// Responsive Video
// =============================================================================

//
// 1. Video Player.
// 2. Video Embed.
//

function x_shortcode_responsive_video_player( $atts ) { // 1
  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'style'         => '',
    'type'          => '',
    'm4v'           => '',
    'ogv'           => '',
    'poster'        => '',
    'hide_controls' => '',
    'autoplay'      => '',
    'no_container'  => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-responsive-video x-responsive-video-shortcode player ' . esc_attr( $class ) : 'x-responsive-video x-responsive-video-shortcode player';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  switch ( $type ) {
    case '5:3' :
      $type = ' five-by-three';
      break;
    case '5:4' :
      $type = ' five-by-four';
      break;
    case '4:3' :
      $type = ' four-by-three';
      break;
    case '3:2' :
      $type = ' three-by-two';
      break;
    default :
      $type = '';
  }
  $m4v           = ( $m4v           != ''     ) ? $m4v : '';
  $ogv           = ( $ogv           != ''     ) ? $ogv : '';
  $poster        = ( $poster        != ''     ) ? $poster : '';
  $hide_controls = ( $hide_controls == 'true' ) ? $hide_controls : '';
  $autoplay      = ( $autoplay      == 'true' ) ? '.jPlayer("play")' : '';
  $no_container  = ( $no_container  == 'true' ) ? '' : ' with-container';

  static $count = 0; $count++;

  if ( is_numeric( $poster ) ) {
    $poster_info = wp_get_attachment_image_src( $poster, 'full' );
    $poster      = $poster_info[0];
  }

  if ( $hide_controls == 'true' ) {
    $controls = '';
  } else {
    $controls = '<div class="jp-controls-container jp-controls-container-video">'
                . "<div id=\"jp_interface_video_embed_shortcode_{$count}\" class=\"jp-interface\">"
                  . '<ul class="jp-controls">'
                    . '<li><a href="#" class="jp-play" tabindex="1" title="Play"><span>Play</span></a></li>'
                    . '<li><a href="#" class="jp-pause" tabindex="1" title="Pause"><span>Pause</span></a></li>'
                  . '</ul>'
                  . '<div class="jp-progress-container">'
                    . '<div class="jp-progress">'
                      . '<div class="jp-seek-bar">'
                        . '<div class="jp-play-bar"></div>'
                      . '</div>'
                    . '</div>'
                  . '</div>'
                . '</div>'
              . '</div>';
  }

  $output = '<script>'
            . 'jQuery(document).ready(function($){'
              . 'if($().jPlayer) {'
                . "$('#x_jplayer_video_embed_shortcode_{$count}').jPlayer({"
                  . 'ready: function () {'
                    . "$(this).jPlayer('setMedia', {"
                      . ( ( $m4v    != '' ) ? "m4v: '{$m4v}'," : '' )
                      . ( ( $ogv    != '' ) ? "ogv: '{$ogv}'," : '' )
                      . ( ( $poster != '' ) ? "poster: '{$poster}'" : '' )
                    . '})' . ( ( $autoplay != '' ) ? $autoplay : '' ) . ';'
                  . '},'
                  . 'size: {'
                    . "width: '100%',"
                    . "height: '100%'"
                  . '},'
                  . "swfPath: '" . get_template_directory_uri() . "/framework/js/src/site/vendor/jplayer',"
                  . "cssSelectorAncestor: '#jp_interface_video_embed_shortcode_{$count}',"
                  . "supplied: '" . ( ( $m4v != '' ) ? 'm4v' : '' ) . ( ( $ogv != '' ) ? ' ogv' : '' ) . "'"
                . '});'
                  
                . "$('#x_jplayer_video_embed_shortcode_{$count}').bind($.jPlayer.event.playing, function(event) {"
                  . "$(this).add('#jp_interface_video_embed_shortcode_{$count}').hover( function() {"
                    . "$('#jp_interface_video_embed_shortcode_{$count}').stop().animate({ opacity: 1 }, 400);"
                  . "}, function() {"
                    . "$('#jp_interface_video_embed_shortcode_{$count}').stop().animate({ opacity: 0 }, 400);"
                  . '});'
                . '});'
                  
                . "$('#x_jplayer_video_embed_shortcode_{$count}').bind($.jPlayer.event.pause, function(event) {"
                  . "$('#x_jplayer_video_embed_shortcode_{$count}').add('#jp_interface_video_embed_shortcode_{$count}').unbind('hover');"
                  . "$('#jp_interface_video_embed_shortcode_{$count}').stop().animate({ opacity: 1 }, 400);"
                . '});'
              . '}'
            . '});'
          . '</script>'

          . "<div {$id} class=\"{$class}{$type}{$no_container}\" {$style}>"
            . '<div class="x-responsive-video-inner">'
              . "<div id=\"x_jplayer_video_embed_shortcode_{$count}\" class=\"jp-jplayer jp-jplayer-video\"></div>"
              . $controls
            . '</div>'
          . '</div>';
  
  return $output;
}

add_shortcode( 'x_video_player', 'x_shortcode_responsive_video_player' );


function x_shortcode_responsive_video_embed( $atts, $content = null  ) { // 2
  extract( shortcode_atts( array(
    'id'           => '',
    'class'        => '',
    'style'        => '',
    'type'         => '',
    'no_container' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-responsive-video x-responsive-video-shortcode embed ' . esc_attr( $class ) : 'x-responsive-video x-responsive-video-shortcode embed';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  switch ( $type ) {
    case '5:3' :
      $type = ' five-by-three';
      break;
    case '5:4' :
      $type = ' five-by-four';
      break;
    case '4:3' :
      $type = ' four-by-three';
      break;
    case '3:2' :
      $type = ' three-by-two';
      break;
    default :
      $type = '';
  }
  $no_container = ( $no_container == 'true' ) ? '' : ' with-container';

  static $count = 0; $count++;

  $output = "<div {$id} class=\"{$class}{$no_container}\" {$style}><div class=\"x-responsive-video-inner{$type}\">{$content}</div></div>";
  
  return $output;
}

add_shortcode( 'x_video_embed', 'x_shortcode_responsive_video_embed' );



// Accordion
// =============================================================================

//
// 1. Accordion.
// 2. Accordion item.
//

function x_shortcode_accordion( $atts, $content = null ) { // 1
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-accordion ' . esc_attr( $class ) : 'x-accordion';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';

  $output = "<div {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</div>";
  
  return $output;
}

add_shortcode( 'accordion', 'x_shortcode_accordion' );


function x_shortcode_accordion_item( $atts, $content = null ) { // 2
  extract( shortcode_atts( array(
    'id'        => '',
    'class'     => '',
    'style'     => '',
    'parent_id' => '',
    'title'     => '',
    'open'      => ''
  ), $atts ) );

  $id        = ( $id        != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class     = ( $class     != ''     ) ? 'x-accordion-group ' . esc_attr( $class ) : 'x-accordion-group';
  $style     = ( $style     != ''     ) ? 'style="' . $style . '"' : '';
  $parent_id = ( $parent_id != ''     ) ? 'data-parent="#' . $parent_id . '"' : '';
  $title     = ( $title     != ''     ) ? $title : 'Make Sure to Set a Title';
  $open      = ( $open      == 'true' ) ? 'collapse in' : 'collapse';

  static $count = 0; $count++;
  
  if ( $open == 'collapse in' ) {

    $output = "<div {$id} class=\"{$class}\" {$style}>"
              . '<div class="x-accordion-heading">'
                . "<a class=\"x-accordion-toggle\" data-toggle=\"collapse\" {$parent_id} href=\"#collapse-{$count}\">{$title}</a>"
              . '</div>'
              . "<div id=\"collapse-{$count}\" class=\"accordion-body {$open}\">"
                . '<div class="x-accordion-inner">'
                  . do_shortcode( $content )
                . '</div>'
              . '</div>'
            . '</div>';

  } else {

    $output = "<div {$id} class=\"{$class}\" {$style}>"
              . '<div class="x-accordion-heading">'
                . "<a class=\"x-accordion-toggle collapsed\" data-toggle=\"collapse\" {$parent_id} href=\"#collapse-{$count}\">{$title}</a>"
              . '</div>'
              . "<div id=\"collapse-{$count}\" class=\"accordion-body {$open}\">"
                . '<div class="x-accordion-inner">'
                  . do_shortcode( $content )
                . '</div>'
              . '</div>'
            . '</div>';

  }
  
  return $output;
}

add_shortcode( 'accordion_item', 'x_shortcode_accordion_item' );



// Tabbed Content
// =============================================================================

//
// 1. Tab nav.
// 2. Tab nav item.
// 3. Tabs.
// 4. Tab.
//

function x_shortcode_tab_nav( $atts, $content = null ) { // 1
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
    'type'  => '',
    'float' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-nav x-nav-tabs ' . esc_attr( $class ) : 'x-nav x-nav-tabs';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $type  = ( $type  != '' ) ? ' ' . $type : '';
  $float = ( $float != '' ) ? ' ' . $float : ' top';

  $output = "<ul {$id} class=\"{$class}{$type}{$float}\" {$style}>" . do_shortcode( $content ) . "</ul>";
  
  return $output;
}

add_shortcode( 'tab_nav', 'x_shortcode_tab_nav' );


function x_shortcode_tab_nav_item( $atts ) { // 2
  extract( shortcode_atts( array(
    'id'     => '',
    'class'  => '',
    'style'  => '',
    'title'  => '',
    'active' => ''
  ), $atts ) );

  $id     = ( $id     != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class  = ( $class  != ''     ) ? 'x-nav-tabs-item ' . esc_attr( $class ) : 'x-nav-tabs-item';
  $style  = ( $style  != ''     ) ? 'style="' . $style . '"' : '';
  $title  = ( $title  != ''     ) ? $title : 'Make Sure to Set a Title';
  $active = ( $active == 'true' ) ? ' active' : '';

  static $count = 0; $count++;

  $output = "<li {$id} class=\"{$class}{$active}\" {$style}><a href=\"#tab-{$count}\" data-toggle=\"tab\">{$title}</a></li>";
  
  return $output;
}

add_shortcode( 'tab_nav_item', 'x_shortcode_tab_nav_item' );


function x_shortcode_tabs( $atts, $content = null ) { // 3
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-tab-content ' . esc_attr( $class ) : 'x-tab-content';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';

  $output = "<div {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</div>";
  
  return $output;
}

add_shortcode( 'tabs', 'x_shortcode_tabs' );


function x_shortcode_tab( $atts, $content = null ) { // 4
  extract( shortcode_atts( array(
    'class'  => '',
    'style'  => '',
    'active' => ''
  ), $atts ) );

  $class  = ( $class  != ''     ) ? 'x-tab-pane fade in ' . esc_attr( $class ) : 'x-tab-pane fade in';
  $style  = ( $style  != ''     ) ? 'style="' . $style . '"' : '';
  $active = ( $active == 'true' ) ? ' fade in active' : '';

  static $count = 0; $count++;

  $output = "<div id=\"tab-{$count}\" class=\"{$class}{$active}\" {$style}>" . do_shortcode( $content ) . "</div>";
  
  return $output;
}

add_shortcode( 'tab', 'x_shortcode_tab' );



// Responsive Visibility
// =============================================================================

function x_shortcode_responsive_visibility( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'     => '',
    'class'  => '',
    'style'  => '',
    'type'   => '',
    'inline' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-visibility ' . esc_attr( $class ) : 'x-visibility';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $type  = ( $type  != '' ) ? ' x-' . $type : '';
  
  ( $inline == 'true' ) ? $output = "<span {$id} class=\"{$class}{$type}\" {$style}>" . do_shortcode( $content ) . "</span>" : $output = "<div {$id} class=\"{$class}{$type}\" {$style}>" . do_shortcode( $content ) . "</div>";

  return $output;
}

add_shortcode( 'visibility', 'x_shortcode_responsive_visibility' );



// Content Columns
// =============================================================================

function x_shortcode_content_columns( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'                    => '',
    'class'                 => '',
    'style'                 => '',
    'type'                  => '',
    'last'                  => '',
    'fade'                  => '',
    'fade_animation'        => '',
    'fade_animation_offset' => ''
  ), $atts ) );

  $id                    = ( $id                    != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class                 = ( $class                 != ''     ) ? 'x-column ' . esc_attr( $class ) : 'x-column';
  $style                 = ( $style                 != ''     ) ? $style : '';
  $type                  = ( $type                  != ''     ) ? ' ' . $type : '';
  $last                  = ( $last                  == 'true' ) ? ' last' : '';
  $fade_animation        = ( $fade_animation        != ''     ) ? $fade_animation : 'in';
  $fade_animation_offset = ( $fade_animation_offset != ''     ) ? $fade_animation_offset : '45px';

  if ( $fade == 'true' ) {
    $fade = 'data-fade="true" data-fade-animation="' . $fade_animation . '"';
    switch ( $fade_animation ) {
      case 'in' :
        $fade_animation_offset = '';
        break;
      case 'in-from-top' :
        $fade_animation_offset = ' top: -' . $fade_animation_offset . ';';
        break;
      case 'in-from-left' :
        $fade_animation_offset = ' left: -' . $fade_animation_offset . ';';
        break;
      case 'in-from-right' :
        $fade_animation_offset = ' right: -' . $fade_animation_offset . ';';
        break;
      case 'in-from-bottom' :
        $fade_animation_offset = ' bottom: -' . $fade_animation_offset . ';';
        break;
    }
  } else {
    $fade                  = '';
    $fade_animation_offset = '';
  }

  if ( $last == ' last' ) {
    $output = "<div {$id} class=\"{$class}{$type}{$last}\" style=\"{$style}{$fade_animation_offset}\" {$fade}>" . do_shortcode( $content ) . "</div>"
            . '<hr class="x-clear">';
  } else {
    $output = "<div {$id} class=\"{$class}{$type}{$last}\" style=\"{$style}{$fade_animation_offset}\" {$fade}>" . do_shortcode( $content ) . "</div>";
  }

  return $output;
}

add_shortcode( 'column', 'x_shortcode_content_columns' );



// Responsive Slider
// =============================================================================

//
// 1. Slider
// 2. Slide
//

function x_shortcode_responsive_slider( $atts, $content = null ) { // 1
  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'style'         => '',
    'animation'     => '',
    'slide_time'    => '',
    'slide_speed'   => '',
    'slideshow'     => '',
    'random'        => '',
    'control_nav'   => '',
    'prev_next_nav' => '',
    'no_container'  => ''
  ), $atts ) );

  static $count = 0; $count++;

  $id            = ( $id            != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class         = ( $class         != ''     ) ? "x-flexslider-shortcode-container " . esc_attr( $class ) : "x-flexslider-shortcode-container";
  $style         = ( $style         != ''     ) ? 'style="' . $style . '"' : '';
  $animation     = ( $animation     == 'fade' ) ? 'fade' : 'slide';
  $slide_time    = ( $slide_time    != ''     ) ? $slide_time : '7000';
  $slide_speed   = ( $slide_speed   != ''     ) ? $slide_speed : '600';
  $slideshow     = ( $slideshow     == 'true' ) ? $slideshow : 'false';
  $random        = ( $random        == 'true' ) ? $random : 'false';
  $control_nav   = ( $control_nav   == 'true' ) ? $control_nav : 'false';
  $prev_next_nav = ( $prev_next_nav == 'true' ) ? $prev_next_nav : 'false';
  $no_container  = ( $no_container  == 'true' ) ? '' : ' with-container';

  $output = "<div class=\"{$class}{$no_container}\">"
            . "<div {$id} class=\"x-flexslider x-flexslider-shortcode x-flexslider-shortcode-{$count}\" {$style}>"
              . '<ul class="x-slides">'
                . do_shortcode( $content )
              . '</ul>'
            . '</div>'
          . '</div>'
          . '<script>'
            . 'jQuery(window).load(function() {'
              . "jQuery('.x-flexslider-shortcode-{$count}').flexslider({"
                . "selector       : '.x-slides > li',"
                . "prevText       : '<i class=\"x-icon-chevron-left\"></i>',"
                . "nextText       : '<i class=\"x-icon-chevron-right\"></i>',"
                . "animation      : '{$animation}',"
                . "controlNav     : {$control_nav},"
                . "directionNav   : {$prev_next_nav},"
                . "slideshowSpeed : {$slide_time},"
                . "animationSpeed : {$slide_speed},"
                . "slideshow      : {$slideshow},"
                . "randomize      : {$random},"
                . 'pauseOnHover   : true,'
                . 'useCSS         : true,'
                . 'touch          : true,'
                . 'video          : true,'
                . 'smoothHeight   : true,'
                . "easing         : 'easeInOutExpo'"
              . '});'
            . '});'
          . '</script>';
  
  return $output;
}

add_shortcode( 'slider', 'x_shortcode_responsive_slider' );


function x_shortcode_responsive_slide( $atts, $content = null ) { // 2
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-slide ' . esc_attr( $class ) : 'x-slide';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';

  $output = "<li {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</li>";
  
  return $output;
}

add_shortcode( 'slide', 'x_shortcode_responsive_slide' );



// Protected Content
// =============================================================================

function x_shortcode_protected( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts ) );

  GLOBAL $user_login;

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-protect ' . esc_attr( $class ) : 'x-protect';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  
  if ( is_user_logged_in() ) {
    $output = do_shortcode( $content );
  } else {
    $output = "<div {$id} class=\"{$class}\" {$style}>"
              . '<form action="' . esc_url( site_url( 'wp-login.php' ) ) . '" method="post" class="mbn">'
                . '<h6 class="h-protect man">' . esc_html__( 'Restricted Content Login', '__x__' ) . '</h6>'
                . '<div><label>' . esc_html__( 'Username', '__x__' ) . '</label><input type="text" name="log" id="log" value="' . esc_attr( $user_login ) . '" /></div>'
                . '<div><label>' . esc_html__( 'Password', '__x__' ) . '</label><input type="password" name="pwd" id="pwd" /></div>'
                . '<div><input type="submit" name="submit" value="' . esc_html__( 'Login', '__x__' ) . '" class="x-btn x-btn-protect" /></div>'
                . '<input type="hidden" name="redirect_to" value="' . esc_url( get_permalink() ) . '">'
              . '</form>'
            . '</div>';
  }
  
  return $output;
}

add_shortcode( 'protect', 'x_shortcode_protected' );



// Recent Posts
// =============================================================================

function x_shortcode_recent_posts( $atts ) {
  extract( shortcode_atts( array(
    'id'          => '',
    'class'       => '',
    'style'       => '',
    'type'        => '',
    'count'       => '',
    'category'    => '',
    'offset'      => '',
    'orientation' => '',
    'no_image'    => '',
    'fade'        => ''
  ), $atts ) );

  $id            = ( $id          != ''          ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class         = ( $class       != ''          ) ? 'x-recent-posts cf ' . esc_attr( $class ) : 'x-recent-posts cf';
  $style         = ( $style       != ''          ) ? 'style="' . $style . '"' : '';
  $type          = ( $type        == 'portfolio' ) ? 'x-portfolio' : 'post';
  $count         = ( $count       != ''          ) ? $count : 3;
  $category      = ( $category    != ''          ) ? $category : '';
  $category_type = ( $type        == 'post'      ) ? 'category_name' : 'portfolio-category';
  $offset        = ( $offset      != ''          ) ? $offset : 0;
  $orientation   = ( $orientation != ''          ) ? ' ' . $orientation : ' horizontal';
  $no_image      = ( $no_image    == 'true'      ) ? $no_image : '';
  $fade          = ( $fade        == 'true'      ) ? $fade : 'false';

  $output = "<div {$id} class=\"{$class}{$orientation}\" {$style} data-fade=\"{$fade}\">";

    $q = new WP_Query( array(
      'orderby'          => 'date',
      'post_type'        => "{$type}",
      'posts_per_page'   => "{$count}",
      'offset'           => "{$offset}",
      "{$category_type}" => "{$category}"
    ) );

    if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post();

      if ( $no_image == 'true' ) {
        $image_output       = '';
        $image_output_class = 'no-image';
      } else {
        $image_output       = '<div class="x-recent-posts-img">' . get_the_post_thumbnail( get_the_ID(), 'entry-' . x_get_option( 'x_stack', 'integrity' ) . '-cropped', NULL ) . '</div>';
        $image_output_class = 'with-image';
      }

      $output .= '<a class="x-recent-post' . $count . ' ' . $image_output_class . '" href="' . get_permalink( get_the_ID() ) . '" title="' . esc_attr( sprintf( __( 'Permalink to: "%s"', '__x__' ), the_title_attribute( 'echo=0' ) ) ) . '">'
                 . '<article id="post-' . get_the_ID() . '" class="' . implode( ' ', get_post_class() ) . '">'
                   . '<div class="entry-wrap">'
                     . $image_output
                     . '<div class="x-recent-posts-content">'
                       . '<h3 class="h-recent-posts">' . get_the_title() . '</h3>'
                       . '<span class="x-recent-posts-date">' . get_the_date() . '</span>'
                     . '</div>'
                   . '</div>'
                 . '</article>'
               . '</a>';

    endwhile; endif; wp_reset_postdata();
  
  $output .= '</div>';

  return $output;
}

add_shortcode( 'recent_posts', 'x_shortcode_recent_posts' );



// Audio
// =============================================================================

//
// 1. Audio player.
// 2. Audio embed.
//

function x_shortcode_audio_player( $atts ) { // 1
  extract( shortcode_atts( array(
    'id'     => '',
    'class'  => '',
    'style'  => '',
    'mp3'    => '',
    'oga'    => ''
  ), $atts ) );

  $id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class  = ( $class != '' ) ? 'x-audio player ' . esc_attr( $class ) : 'x-audio player';
  $style  = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $mp3    = ( $mp3   != '' ) ? $mp3 : '';
  $oga    = ( $oga   != '' ) ? $oga : '';

  static $count = 0; $count++;

  $output = '<script>'
            . 'jQuery(document).ready(function($){'
              . 'if($().jPlayer) {'
                . "$('#x_jplayer_audio_embed_shortcode_{$count}').jPlayer({"
                  . 'ready: function () {'
                    . "$(this).jPlayer('setMedia', {"
                      . ( ( $mp3 != '' ) ? "mp3: '{$mp3}'," : '' )
                      . ( ( $oga != '' ) ? "oga: '{$oga}'," : '' )
                    . '});'
                  . '},'
                  . 'size: {'
                    . "width: '100%',"
                    . "height: '100%'"
                  . '},'
                  . "swfPath: '" . get_template_directory_uri() . "/framework/js/src/site/vendor/jplayer',"
                  . "cssSelectorAncestor: '#jp_interface_audio_embed_shortcode_{$count}',"
                  . "supplied: '" . ( ( $mp3 != '' ) ? 'mp3' : '' ) . ( ( $oga != '' ) ? ' oga' : '' ) . "'"
                . '});'
              . '}'
            . '});'
          . '</script>'

          . "<div {$id} class=\"{$class}\" {$style}>"
            . "<div id=\"x_jplayer_audio_embed_shortcode_{$count}\" class=\"jp-jplayer jp-jplayer-audio\"></div>"
            . "<div class=\"jp-controls-container jp-controls-container-audio\">"
              . "<div id=\"jp_interface_audio_embed_shortcode_{$count}\" class=\"jp-interface\">"
                . '<ul class="jp-controls">'
                  . '<li><a href="#" class="jp-play" tabindex="1"><span>Play</span></a></li>'
                  . '<li><a href="#" class="jp-pause" tabindex="1"><span>Pause</span></a></li>'
                . '</ul>'
                . '<div class="jp-progress-container">'
                  . '<div class="jp-progress">'
                    . '<div class="jp-seek-bar">'
                      . '<div class="jp-play-bar"></div>'
                    . '</div>'
                  . '</div>'
                . '</div>'
              . '</div>'
            . '</div>'
          . '</div>';
  
  return $output;
}

add_shortcode( 'x_audio_player', 'x_shortcode_audio_player' );


function x_shortcode_audio_embed( $atts, $content = null ) { // 2
  extract( shortcode_atts( array(
    'id'     => '',
    'class'  => '',
    'style'  => ''
  ), $atts ) );

  $id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class  = ( $class != '' ) ? 'x-audio embed ' . esc_attr( $class ) : 'x-audio embed';
  $style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

  static $count = 0; $count++;

  $output = "<div {$id} class=\"{$class}\" {$style}>{$content}</div>";
  
  return $output;
}

add_shortcode( 'x_audio_embed', 'x_shortcode_audio_embed' );



// Responsive Pricing Table
// =============================================================================

//
// 1. Pricing Table.
// 2. Pricing Table Column.
//

function x_shortcode_pricing_table( $atts, $content = null ) { // 1
  extract( shortcode_atts( array(
    'id'      => '',
    'class'   => '',
    'style'   => '',
    'columns' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-pricing-table cf ' . esc_attr( $class ) : 'x-pricing-table cf';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  switch ( $columns ) {
    case '1' :
      $columns = ' one-column';
      break;
    case '2' :
      $columns = ' two-columns';
      break;
    case '3' :
      $columns = ' three-columns';
      break;
    case '4' :
      $columns = ' four-columns';
      break;
    case '5' :
      $columns = ' five-columns';
      break;
    default :
      $columns = '';
  }

  $output = "<div {$id} class=\"{$class}{$columns}\" {$style}>" . do_shortcode( $content ) . "</div>";
  
  return $output;
}

add_shortcode( 'pricing_table', 'x_shortcode_pricing_table' );


function x_shortcode_pricing_table_column( $atts, $content = null ) { // 2
  extract( shortcode_atts( array(
    'id'           => '',
    'class'        => '',
    'style'        => '',
    'featured'     => '',
    'featured_sub' => '',
    'title'        => '',
    'currency'     => '',
    'price'        => '',
    'interval'     => ''
  ), $atts ) );

  $id           = ( $id    != ''        ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class        = ( $class != ''        ) ? 'x-pricing-column ' . esc_attr( $class ) : 'x-pricing-column';
  $style        = ( $style != ''        ) ? 'style="' . $style . '"' : '';
  $featured     = ( $featured == 'true' ) ? ' featured' : '';
  $featured_sub = ( $featured_sub != '' ) ? ' <span>' . $featured_sub . '</span>' : '';
  $title        = ( $title != ''        ) ? $title : '';
  $currency     = ( $currency != ''     ) ? $currency : '';
  $price        = ( $price != ''        ) ? $price : '';
  $interval     = ( $interval != ''     ) ? $interval : '';

  $output = "<div {$id} class=\"{$class}{$featured}\" {$style}>"
            . '<h2 class="man">'
              . $title
              . $featured_sub
            . '</h2>'
            . '<div class="x-pricing-column-info">'
              . "<h3 class=\"x-price\">{$currency}{$price}</h3>"
              . "<span>{$interval}</span>"
              . do_shortcode( $content )
            . '</div>'
          . '</div>';
  
  return $output;
}

add_shortcode( 'pricing_table_column', 'x_shortcode_pricing_table_column' );



// Callout
// =============================================================================

function x_shortcode_callout( $atts ) {
  extract( shortcode_atts( array(
    'id'          => '',
    'class'       => '',
    'style'       => '',
    'type'        => '',
    'title'       => '',
    'message'     => '',
    'button_text' => '',
    'button_icon' => '',
    'circle'      => '',
    'href'        => '',
    'target'      => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-callout ' . esc_attr( $class ) : 'x-callout';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  switch ( $type ) {
    case 'center' :
      $type = ' center-text';
      break;
    case 'right' :
      $type = ' right-text';
      break;
    default :
      $type = '';
  }
  $title       = ( $title       != ''      ) ? $title : 'Enter Your Text';
  $message     = ( $message     != ''      ) ? $message : 'Don\'t forget to enter in your text.';
  $button_text = ( $button_text != ''      ) ? $button_text : 'Enter Your Text';
  $button_icon = ( $button_icon != ''      ) ? '<i class="x-icon-' . $button_icon . '"></i>' : '';
  $href        = ( $href        != ''      ) ? $href : '#';
  $target      = ( $target      == 'blank' ) ? 'target="_blank"' : '';

  if ( $circle == 'true' ) {
    $button = "<div class=\"x-btn-circle-wrap mbn\"><a href=\"{$href}\" class=\"x-btn x-btn-x-large\" title=\"{$button_text}\" {$target}>{$button_icon}{$button_text}</a></div>";
  } else {
    $button = "<a href=\"{$href}\" class=\"x-btn\" title=\"{$button_text}\" {$target}>{$button_icon}{$button_text}</a>";
  }

  $output = "<div {$id} class=\"{$class}{$type}\" {$style}>"
            . "<h2 class=\"h-callout\">{$title}</h2>"
            . "<p class=\"p-callout\">{$message}</p>"
            . $button
          . '</div>';
  
  return $output;
}

add_shortcode( 'callout', 'x_shortcode_callout' );



// Promo
// =============================================================================

function x_shortcode_promo( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
    'image' => '',
    'alt'   => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-promo ' . esc_attr( $class ) : 'x-promo';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $image = ( $image != '' ) ? $image : '';
  $alt   = ( $alt   != '' ) ? 'alt="' . $alt . '"' : '';

  if ( is_numeric( $image ) ) {
    $image_info = wp_get_attachment_image_src( $image, 'full' );
    $image      = $image_info[0];
  }

  $output = "<div {$id} class=\"{$class}\" {$style}>"
            . '<div class="x-promo-image-wrap">'
              . "<img src=\"{$image}\" {$alt}/>"
            . '</div>'
            . '<div class="x-promo-content">'
              . do_shortcode( $content )
            . '</div>'
          . "</div>";
  
  return $output;
}

add_shortcode( 'promo', 'x_shortcode_promo' );



// Responsive Lightbox
// =============================================================================

function x_shortcode_lightbox( $atts ) {
  extract( shortcode_atts( array(
    'selector'     => '',
    'deeplink'     => '',
    'opacity'      => '',
    'prev_scale'   => '',
    'prev_opacity' => '',
    'next_scale'   => '',
    'next_opacity' => '',
    'orientation'  => '',
    'thumbnails'   => ''
  ), $atts ) );

  $selector     = ( $selector     != ''     ) ? $selector : '.x-img-link';
  $deeplink     = ( $deeplink     == 'true' ) ? $deeplink : '';
  $opacity      = ( $opacity      != ''     ) ? $opacity : '0.85';
  $prev_scale   = ( $prev_scale   != ''     ) ? $prev_scale : '0.85';
  $prev_opacity = ( $prev_opacity != ''     ) ? $prev_opacity : '0.65';
  $next_scale   = ( $next_scale   != ''     ) ? $next_scale : '0.85';
  $next_opacity = ( $next_opacity != ''     ) ? $next_opacity : '0.65';
  $orientation  = ( $orientation  != ''     ) ? $orientation : 'horizontal';
  $thumbnails   = ( $thumbnails   == 'true' ) ? $thumbnails : '';

  static $count = 0; $count++;

  $output = "<script id=\"x-responsive-lightbox-{$count}\">"
            . 'jQuery(document).ready(function(){'
              . "jQuery('{$selector}').iLightBox({"
                . "skin: 'light',"
                . ( ( $deeplink == 'true' ) ? "linkId: 'gallery-image'," : '' )
                . 'overlay: {'
                  . "opacity: {$opacity},"
                  . 'blur: true'
                . '},'
                . 'styles: {'
                  . "prevScale: {$prev_scale},"
                  . "prevOpacity: {$prev_opacity},"
                  . "nextScale: {$next_scale},"
                  . "nextOpacity: {$next_opacity}"
                . '},'
                . "path: '{$orientation}',"
                . 'controls: {'
                  . 'thumbnail: ' . ( ( $thumbnails == 'true' ) ? $thumbnails : 'false' )
                . '}'
              . '});'
            . '});'
          . '</script>';
  
  X_Script_Buffer::append( $output );
}

add_shortcode( 'lightbox', 'x_shortcode_lightbox' );



// Post Author
// =============================================================================

function x_shortcode_post_author( $atts ) {
  extract( shortcode_atts( array(
    'id'        => '',
    'class'     => '',
    'style'     => '',
    'title'     => '',
    'author_id' => ''
  ), $atts ) );

  $id        = ( $id        != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class     = ( $class     != '' ) ? 'x-author-box cf ' . esc_attr( $class ) : 'x-author-box cf';
  $style     = ( $style     != '' ) ? 'style="' . $style . '"' : '';
  $title     = ( $title     != '' ) ? $title : __( 'About the Author', '__x__' );
  $author_id = ( $author_id != '' ) ? $author_id : get_the_author_meta( 'ID' );

  $description  = get_the_author_meta( 'description', $author_id );
  $display_name = get_the_author_meta( 'display_name', $author_id );
  $facebook     = get_the_author_meta( 'facebook', $author_id );
  $twitter      = get_the_author_meta( 'twitter', $author_id );
  $googleplus   = get_the_author_meta( 'googleplus', $author_id );

  $facebook_output   = ( $facebook )   ? "<a href=\"{$facebook}\" class=\"x-author-social\" title=\"Visit the Facebook Profile for {$display_name}\" target=\"_blank\"><i class=\"x-icon-facebook-square\"></i> Facebook</a>" : '';
  $twitter_output    = ( $twitter )    ? "<a href=\"{$twitter}\" class=\"x-author-social\" title=\"Visit the Twitter Profile for {$display_name}\" target=\"_blank\"><i class=\"x-icon-twitter-square\"></i> Twitter</a>" : '';
  $googleplus_output = ( $googleplus ) ? "<a href=\"{$googleplus}\" class=\"x-author-social\" title=\"Visit the Google+ Profile for {$display_name}\" target=\"_blank\"><i class=\"x-icon-google-plus-square\"></i> Google+</a>" : '';

  $output = "<div {$id} class=\"{$class}\" {$style}>"
            . "<h6 class=\"h-about-the-author\">{$title}</h6>"
            . get_avatar( $author_id, 180 )
            . '<div class="x-author-info">'
              . "<h4 class=\"h-author mtn\">{$display_name}</h4>"
                . $facebook_output
                . $twitter_output
                . $googleplus_output
              . "<p class=\"p-author mbn\">{$description}</p>"
            . '</div>'
          . '</div>';
  
  return $output;
}

add_shortcode( 'author', 'x_shortcode_post_author' );



// Prompt
// =============================================================================

function x_shortcode_prompt( $atts ) {
  extract( shortcode_atts( array(
    'id'          => '',
    'class'       => '',
    'style'       => '',
    'type'        => '',
    'title'       => '',
    'message'     => '',
    'button_text' => '',
    'button_icon' => '',
    'circle'      => '',
    'href'        => '',
    'target'      => ''
  ), $atts ) );

  $id          = ( $id          != ''      ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class       = ( $class       != ''      ) ? 'x-prompt ' . esc_attr( $class ) : 'x-prompt';
  $style       = ( $style       != ''      ) ? 'style="' . $style . '"' : '';
  $type        = ( $type        != ''      ) ? $type : '';
  $title       = ( $title       != ''      ) ? $title : 'Enter Your Text';
  $message     = ( $message     != ''      ) ? $message : 'Don\'t forget to enter in your text.';
  $button_text = ( $button_text != ''      ) ? $button_text : 'Enter Your Text';
  $button_icon = ( $button_icon != ''      ) ? '<i class="x-icon-' . $button_icon . '"></i>' : '';
  $href        = ( $href        != ''      ) ? $href : '#';
  $target      = ( $target      == 'blank' ) ? 'target="_blank"' : '';

  if ( $circle == 'true' ) {
    $button = "<div class=\"x-btn-circle-wrap x-btn-block mbn\"><a href=\"{$href}\" class=\"x-btn x-btn-block\" title=\"{$button_text}\" {$target}>{$button_icon}{$button_text}</a></div>";
  } else {
    $button = "<a href=\"{$href}\" class=\"x-btn x-btn-block\" title=\"{$button_text}\" {$target}>{$button_icon}{$button_text}</a>";
  }

  if ( $type == 'right' ) {

    $output = "<div {$id} class=\"{$class} message-right\" {$style}>"
              . '<div class="x-prompt-section x-prompt-section-button">'
                . $button
              . '</div>'
              . '<div class="x-prompt-section x-prompt-section-message">'
                . "<h2 class=\"h-prompt\">{$title}</h2>"
                . "<p class=\"p-prompt\">{$message}</p>"
              . '</div>'
            . '</div>';

  } else {

    $output = "<div {$id} class=\"{$class} message-left\" {$style}>"
              . '<div class="x-prompt-section x-prompt-section-message">'
                . "<h2 class=\"h-prompt\">{$title}</h2>"
                . "<p class=\"p-prompt\">{$message}</p>"
              . '</div>'
              . '<div class="x-prompt-section x-prompt-section-button">'
                . $button
              . '</div>'
            . '</div>';

  }
  
  return $output;
}

add_shortcode( 'prompt', 'x_shortcode_prompt' );



// Content Band
// =============================================================================

function x_shortcode_content_band( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'class'           => '',
    'style'           => '',
    'border'          => '',
    'bg_color'        => '',
    'bg_pattern'      => '',
    'bg_image'        => '',
    'bg_video'        => '',
    'bg_video_poster' => '',
    'no_margin'       => '',
    'padding_top'     => '',
    'padding_bottom'  => '',
    'inner_container' => '',
    'parallax'        => ''
  ), $atts ) );

  $class = ( $class != '' ) ? 'x-content-band ' . esc_attr( $class ) : 'x-content-band';
  $style = ( $style != '' ) ? ' ' . $style : '';
  switch ( $border ) {
    case 'top' :
      $border = ' border-top';
      break;
    case 'left' :
      $border = ' border-left';
      break;
    case 'right' :
      $border = ' border-right';
      break;
    case 'bottom' :
      $border = ' border-bottom';
      break;
    case 'vertical' :
      $border = ' border-top border-bottom';
      break;
    case 'horizontal' :
      $border = ' border-left border-right';
      break;
    case 'all' :
      $border = ' border-top border-left border-right border-bottom';
      break;
    default :
      $border = '';
  }
  $bg_color         = ( $bg_color        != ''     ) ? $bg_color : 'transparent';
  $bg_pattern       = ( $bg_pattern      != ''     ) ? $bg_pattern : '';
  $bg_pattern_class = ( $bg_pattern      != ''     ) ? ' bg-pattern' : '';
  $bg_image         = ( $bg_image        != ''     ) ? $bg_image : '';
  $bg_image_class   = ( $bg_image        != ''     ) ? ' bg-image' : '';
  $bg_video         = ( $bg_video        != ''     ) ? $bg_video : '';
  $bg_video_poster  = ( $bg_video_poster != ''     ) ? $bg_video_poster : '';
  $bg_video_class   = ( $bg_video        != ''     ) ? ' bg-video' : '';
  $no_margin        = ( $no_margin       == 'true' ) ? ' man' : '';
  $padding_top      = ( $padding_top     != ''     ) ? ' padding-top: ' . $padding_top . ';' : '';
  $padding_bottom   = ( $padding_bottom  != ''     ) ? ' padding-bottom: ' . $padding_bottom . ';' : '';
  switch ( $inner_container ) {
    case 'true' :
      $container_start = '<div class="x-container-fluid max width">';
      $container_end   = '</div>';
      break;
    default :
      $container_start = '';
      $container_end   = '';
  }
  $parallax       = ( $parallax == 'true' ) ? $parallax : '';
  $parallax_class = ( $parallax == 'true' ) ? ' parallax' : '';

  if ( is_numeric( $bg_video_poster ) ) {
    $bg_video_poster_info = wp_get_attachment_image_src( $bg_video_poster, 'full' );
    $bg_video_poster      = $bg_video_poster_info[0];
  }

  if ( is_numeric( $bg_image ) ) {
    $bg_image_info = wp_get_attachment_image_src( $bg_image, 'full' );
    $bg_image      = $bg_image_info[0];
  }

  if ( is_numeric( $bg_pattern ) ) {
    $bg_pattern_info = wp_get_attachment_image_src( $bg_pattern, 'full' );
    $bg_pattern      = $bg_pattern_info[0];
  }

  static $count = 0; $count++;

  if ( $bg_video != '' ) {

    $output = "<div id=\"x-content-band-{$count}\" class=\"{$class}{$bg_video_class}{$border}{$no_margin}\" style=\"{$padding_top}{$padding_bottom}{$style}\">"
              . $container_start . do_shortcode( $content ) . $container_end
            . '</div>'
            . "<script> jQuery(function(){ var BV = new jQuery.BigVideo(); BV.init(); if ( Modernizr.touch ) { BV.show('{$bg_video_poster}'); jQuery('#big-video-image').css({ 'max-width' : 'none', 'position' : 'relative', 'left' : '-50%' }); } else { BV.show('{$bg_video}', { ambient : true }); } }); </script>";

  } elseif ( $bg_image != '' ) {

    $output = "<div id=\"x-content-band-{$count}\" class=\"{$class}{$bg_image_class}{$parallax_class}{$border}{$no_margin}\" style=\"background-image: url({$bg_image}); background-color: {$bg_color};{$padding_top}{$padding_bottom}{$style}\">"
              . $container_start . do_shortcode( $content ) . $container_end
            . '</div>';

  } elseif ( $bg_pattern != '' ) {

    $output = "<div id=\"x-content-band-{$count}\" class=\"{$class}{$bg_pattern_class}{$parallax_class}{$border}{$no_margin}\" style=\"background-image: url({$bg_pattern}); background-color: {$bg_color};{$padding_top}{$padding_bottom}{$style}\">"
              . $container_start . do_shortcode( $content ) . $container_end
            . '</div>';

  } else {

    $output = "<div id=\"x-content-band-{$count}\" class=\"{$class}{$border}{$no_margin}\" style=\"background-color: {$bg_color};{$padding_top}{$padding_bottom}{$style}\">"
              . $container_start . do_shortcode( $content ) . $container_end
            . '</div>';

  }
  
  return $output;
}

add_shortcode( 'content_band', 'x_shortcode_content_band' );



// Entry Share
// =============================================================================

function x_shortcode_entry_share( $atts ) {
  extract( shortcode_atts( array(
    'id'          => '',
    'class'       => '',
    'style'       => '',
    'title'       => '',
    'facebook'    => '',
    'twitter'     => '',
    'google_plus' => '',
    'linkedin'    => '',
    'pinterest'   => '',
    'reddit'      => '',
    'email'       => ''
  ), $atts ) );

  $share_url        = urlencode( get_permalink() );
  $share_title      = urlencode( get_the_title() );
  $share_source     = urlencode( get_bloginfo( 'name' ) );
  $share_content    = urlencode( get_the_excerpt() );
  $share_media_info = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
  $share_media      = $share_media_info[0];

  $id          = ( $id          != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class       = ( $class       != ''     ) ? 'x-entry-share ' . esc_attr( $class ) : 'x-entry-share';
  $style       = ( $style       != ''     ) ? 'style="' . $style . '"' : '';
  $title       = ( $title       != ''     ) ? $title : __( 'Share this Post', '__x__' );
  $facebook    = ( $facebook    == 'true' ) ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Facebook', '__x__' ) . "\" onclick=\"window.open('http://www.facebook.com/sharer.php?u={$share_url}&amp;t={$share_title}', 'popupFacebook', 'width=650, height=270, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-icon-facebook-square\"></i></a>" : '';
  $twitter     = ( $twitter     == 'true' ) ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Twitter', '__x__' ) . "\" onclick=\"window.open('https://twitter.com/intent/tweet?text={$share_title}&amp;url={$share_url}', 'popupTwitter', 'width=500, height=370, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-icon-twitter-square\"></i></a>" : '';
  $google_plus = ( $google_plus == 'true' ) ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Google+', '__x__' ) . "\" onclick=\"window.open('https://plus.google.com/share?url={$share_url}', 'popupGooglePlus', 'width=650, height=226, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-icon-google-plus-square\"></i></a>" : '';
  $linkedin    = ( $linkedin    == 'true' ) ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on LinkedIn', '__x__' ) . "\" onclick=\"window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url={$share_url}&amp;title={$share_title}&amp;summary={$share_content}&amp;source={$share_source}', 'popupLinkedIn', 'width=610, height=480, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-icon-linkedin-square\"></i></a>" : '';
  $pinterest   = ( $pinterest   == 'true' ) ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Pinterest', '__x__' ) . "\" onclick=\"window.open('http://pinterest.com/pin/create/button/?url={$share_url}&amp;media={$share_media}&amp;description={$share_title}', 'popupPinterest', 'width=750, height=265, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-icon-pinterest-square\"></i></a>" : '';
  $reddit      = ( $reddit      == 'true' ) ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Reddit', '__x__' ) . "\" onclick=\"window.open('http://www.reddit.com/submit?url={$share_url}', 'popupReddit', 'width=875, height=450, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-icon-reddit-square\"></i></a>" : '';
  $email       = ( $email       == 'true' ) ? "<a href=\"mailto:?subject=" . get_the_title() . "&amp;body=" . __( 'Hey, thought you might enjoy this! Check it out when you have a chance:', '__x__' ) . " " . get_permalink() . "\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share email\" title=\"" . __( 'Share via Email', '__x__' ) . "\"><span><i class=\"x-icon-envelope-square\"></i></span></a>" : '';

  $output = "<div {$id} class=\"{$class}\" {$style}>"
            . '<p>' . $title . '</p>'
            . '<div class="x-share-options">'
              . $facebook . $twitter . $google_plus . $linkedin . $pinterest . $reddit . $email
            . '</div>'
          . '</div>';
  
  return $output;
}

add_shortcode( 'share', 'x_shortcode_entry_share' );



// Table of Contents
// =============================================================================

//
// 1. Container.
// 2. Item.
//

function x_shortcode_toc_container( $atts, $content = null ) { // 1
  extract( shortcode_atts( array(
    'id'      => '',
    'class'   => '',
    'style'   => '',
    'type'    => '',
    'columns' => '',
    'title'   => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-toc ' . esc_attr( $class ) : 'x-toc';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $type  = ( $type  != '' ) ? ' ' . $type : '';
  switch ( $columns ) {
    case '1' :
      $columns = ' one-column';
      break;
    case '2' :
      $columns = ' two-columns';
      break;
    case '3' :
      $columns = ' three-columns';
      break;
    default :
      $columns = '';
  }
  $title = ( $title != '' ) ? $title : __( 'Table of Contents', '__x__' );

  $output = "<div {$id} class=\"{$class}{$type}{$columns}\" {$style}><h4 class=\"h-toc\">{$title}</h4><ul class=\"unstyled cf\">" . do_shortcode( $content ) . '</ul></div>';
  
  return $output;
}

add_shortcode( 'toc', 'x_shortcode_toc_container' );


function x_shortcode_toc_item( $atts ) { // 2
  extract( shortcode_atts( array(
    'id'     => '',
    'class'  => '',
    'style'  => '',
    'title'  => '',
    'page'   => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-toc-item ' . esc_attr( $class ) : 'x-toc-item';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $title = ( $title != '' ) ? $title : '';
  switch ( $page ) {
    case 0 :
      $page = '';
      break;
    case 1 :
      $page = '';
      break;
    default :
      $page = $page . '/';
      $page = ( get_the_ID() == get_option('page_on_front') ) ? 'page/' . $page . '/' : $page . '/';
  }

  $link = esc_url( get_permalink() );

  $output = "<li {$id} class=\"{$class}\" {$style}><a href=" . $link . $page . " title=\"Go to {$title}\">" . $title . '</a></li>';
  
  return $output;
}

add_shortcode( 'toc_item', 'x_shortcode_toc_item' );



// Custom Headline
// =============================================================================

function x_shortcode_custom_headline( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'         => '',
    'class'      => '',
    'style'      => '',
    'type'       => '',
    'level'      => '',
    'looks_like' => '',
    'accent'     => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'h-custom-headline ' . esc_attr( $class ) : 'h-custom-headline';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  switch ( $type ) {
    case 'right' :
      $type = ' right-text';
      break;
    case 'center' :
      $type = ' center-text';
      break;
    default :
      $type = '';
  }
  $level      = ( $level      != ''     ) ? $level : 'h2';
  $looks_like = ( $looks_like != ''     ) ? ' ' . $looks_like : '';
  $accent     = ( $accent     == 'true' ) ? ' ' . 'accent' : '';

  $output = "<{$level} {$id} class=\"{$class}{$type}{$looks_like}{$accent}\" {$style}><span>" . do_shortcode( $content ) . "</span></{$level}>";
  
  return $output;
}

add_shortcode( 'custom_headline', 'x_shortcode_custom_headline' );



// Social Icons
// =============================================================================

function x_shortcode_social_icon( $atts ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
    'type'  => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-social ' . esc_attr( $class ) : 'x-social';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  $type  = ( $type  != '' ) ? ' x-social-' . $type : '';
    
  $output = "<i {$id} class=\"{$class}{$type}\" {$style}></i>";
  
  return $output;
}

add_shortcode( 'social', 'x_shortcode_social_icon' );



// Container
// =============================================================================

function x_shortcode_content_container( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'         => '',
    'class'      => '',
    'style'      => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-container-fluid max width ' . esc_attr( $class ) : 'x-container-fluid max width';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';

  $output = "<div {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</div>";
  
  return $output;
}

add_shortcode( 'container', 'x_shortcode_content_container' );



// Feature Headline
// =============================================================================

function x_shortcode_feature_headline( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'         => '',
    'class'      => '',
    'style'      => '',
    'type'       => '',
    'level'      => '',
    'looks_like' => '',
    'icon'       => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'h-feature-headline ' . esc_attr( $class ) : 'h-feature-headline';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';
  switch ( $type ) {
    case 'right' :
      $type = ' right-text';
      break;
    case 'center' :
      $type = ' center-text';
      break;
    default :
      $type = '';
  }
  $level      = ( $level      != '' ) ? $level : 'h2';
  $looks_like = ( $looks_like != '' ) ? ' ' . $looks_like : '';
  $icon       = ( $icon       != '' ) ? '<i class="x-icon-' . $icon . '"></i>' : '';

  $output = "<{$level} {$id} class=\"{$class}{$type}{$looks_like}\" {$style}><span>{$icon}" . do_shortcode( $content ) . "</span></{$level}>";
  
  return $output;
}

add_shortcode( 'feature_headline', 'x_shortcode_feature_headline' );



// Responsive Text
// =============================================================================

function x_shortcode_responsive_text( $atts ) {
  extract( shortcode_atts( array(
    'selector'    => '',
    'compression' => '',
    'min_size'    => '',
    'max_size'    => ''
  ), $atts ) );

  $selector    = ( $selector    != '' ) ? $selector : '';
  $compression = ( $compression != '' ) ? $compression : '1.2';
  $min_size    = ( $min_size    != '' ) ? $min_size : '';
  $max_size    = ( $max_size    != '' ) ? $max_size : '';

  $options = '';

  if ( $min_size == '' && $max_size == '' ) {
    $options .= "({$compression});";
  } else if ( $min_size != '' && $max_size == '' ) {
    $options .= "({$compression}, { minFontSize: '{$min_size}' });";
  } else if ( $min_size == '' && $max_size != '' ) {
    $options .= "({$compression}, { maxFontSize: '{$max_size}' });";
  } else if ( $min_size != '' && $max_size != '' ) {
    $options .= "({$compression}, { minFontSize: '{$min_size}', maxFontSize: '{$max_size}' });";
  }

  static $count = 0; $count++;

  $output = "<script id=\"x-responsive-text-{$count}\">"
            . "jQuery('{$selector}').fitText" . $options
          . '</script>';

  X_Script_Buffer::append( $output );
}

add_shortcode( 'responsive_text', 'x_shortcode_responsive_text' );



// Search
// =============================================================================

function x_shortcode_search( $atts ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'x-search-shortcode ' . esc_attr( $class ) : 'x-search-shortcode';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';

  $output = "<div {$id} class=\"{$class}\" {$style}>" . get_search_form( false ) . '</div>';
  
  return $output;
}

add_shortcode( 'search', 'x_shortcode_search' );



// Text Output
// =============================================================================

function x_shortcode_text( $atts, $content = null ) {

  $output = do_shortcode( wpautop( $content ) );

  return $output;

}

add_shortcode( 'text_output', 'x_shortcode_text' );



// Counter
// =============================================================================

function x_shortcode_counter( $atts ) {
  extract( shortcode_atts( array(
    'id'         => '',
    'class'      => '',
    'style'      => '',
    'num_color'  => '',
    'num_start'  => '',
    'num_end'    => '',
    'num_speed'  => '',
    'num_prefix' => '',
    'num_suffix' => '',
    'text_color' => '',
    'text_above' => '',
    'text_below' => ''
  ), $atts ) );

  $id         = ( $id         != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class      = ( $class      != '' ) ? 'x-counter ' . esc_attr( $class ) : 'x-counter';
  $style      = ( $style      != '' ) ? 'style="' . $style . '"' : '';
  $num_color  = ( $num_color  != '' ) ? 'style="color: ' . $num_color . ';"' : '';
  $num_start  = ( $num_start  != '' ) ? $num_start : 0;
  $num_end    = ( $num_end    != '' ) ? $num_end : 0;
  $num_speed  = ( $num_speed  != '' ) ? $num_speed : 1500;
  $num_prefix = ( $num_prefix != '' ) ? '<span class="prefix">' . $num_prefix . '</span>' : '';
  $num_suffix = ( $num_suffix != '' ) ? '<span class="suffix">' . $num_suffix . '</span>' : '';
  $text_color = ( $text_color != '' ) ? 'style="color: ' . $text_color . ';"' : '';
  $text_above = ( $text_above != '' ) ? '<span class="text-above" ' . $text_color . '>' . $text_above . '</span>' : '';
  $text_below = ( $text_below != '' ) ? '<span class="text-below" ' . $text_color . '>' . $text_below . '</span>' : '';
    
  $output = "<div {$id} class=\"{$class}\" {$style} data-num-end=\"{$num_end}\" data-num-speed=\"{$num_speed}\">"
            . $text_above
            . "<div class=\"number-wrap w-h\" {$num_color}>"
              . $num_prefix
              . "<span class=\"number\">{$num_start}</span>"
              . $num_suffix
            . '</div>'
            . $text_below
          . '</div>';
  
  return $output;
}

add_shortcode( 'counter', 'x_shortcode_counter' );



// Raw Output
// =============================================================================

//
// 1. Remove any new lines already in there.
// 2. Remove all <p> tags.
// 3. Replace <br> with \n.
// 4. Replace </p> with \n\n.
//

function x_shortcode_raw( $atts, $content = null ) {

  $content = str_replace( '\n', '', $content );                               // 1
  $content = str_replace( '<p>', '', $content );                              // 2
  $content = str_replace( array('<br />', '<br>', '<br/>'), '\n', $content ); // 3
  $content = str_replace( '</p>', '\n\n', $content );                         // 4

  $output = do_shortcode( $content );

  return $output;

}

add_shortcode( 'raw_output', 'x_shortcode_raw' );