<?php
/**
 * Additional functions here so as not to clutter the main functions file.
 *
 */



/**
 * Font Awesome Kit Setup
 *
 * This will add your Font Awesome Kit to the front-end, the admin back-end,
 * and the login screen area.
 */
if (! function_exists('fa_custom_setup_kit') ) {
  function fa_custom_setup_kit($kit_url = '') {
    foreach ( [ 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ] as $action ) {
      add_action(
        $action,
        function () use ( $kit_url ) {
          wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
        }
      );
    }
  }
}

fa_custom_setup_kit('https://kit.fontawesome.com/ee14b561f6.js');



// ADD img-fluid CLASS TO ALL IMAGES
function add_image_responsive_class($content) {
    global $post;
    
    $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
    $replacement = '<img$1class="$2 img-fluid"$3>';
    $content = preg_replace($pattern, $replacement, $content);
    
    return $content;
}
add_filter('the_content', 'add_image_responsive_class');



 // Disable Gutenberg on the back end.
 add_filter( 'use_block_editor_for_post', '__return_false' );
 
 // Disable Gutenberg for widgets.
 add_filter( 'use_widgets_block_editor', '__return_false' );
 
 add_action( 'wp_enqueue_scripts', function() {
     // Remove CSS on the front end.
     wp_dequeue_style( 'wp-block-library' );
 
     // Remove Gutenberg theme.
     wp_dequeue_style( 'wp-block-library-theme' );
 
     // Remove inline global CSS on the front end.
     wp_dequeue_style( 'global-styles' );
 
     // Remove classic-themes CSS for backwards compatibility for button blocks.
     wp_dequeue_style( 'classic-theme-styles' );
 }, 20 );