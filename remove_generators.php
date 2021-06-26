<?php

remove_action('wp_head', 'wp_generator');

// Remove WordPress & Woocommerce meta tag generator
remove_action('wp_head', 'wp_generator');
add_filter( 'the_generator', '__return_null' );

// Remove meta generator tag of revslider plugin
add_filter( 'revslider_meta_generator', '__return_empty_string' );

// Remove meta generator tag of wpbakery page visual_composer builder plugin

add_action('wp_head', 'wpboys_remove_vc_metadata', 1);
function wpboys_remove_vc_metadata() {
  if ( class_exists( 'Vc_Manager' ) ) {
    remove_action('wp_head', array(visual_composer(), 'addMetaData'));
  }
}

// Remove meta generator tag of sitepress wpml plugin
if ( !empty ( $GLOBALS['sitepress'] ) ) {
    function wpboys_remove_wpml_generator() {
        remove_action(
            current_filter(),
            array ( $GLOBALS['sitepress'], 'meta_generator_tag' )
        );
    }
    add_action( 'wp_head', 'wpboys_remove_wpml_generator', 0 );
}