<?php
/**
 * Theme functions and definitions.
 */
function mayosis_child_enqueue_styles() {

    wp_enqueue_style( 'mayosis-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'mayosis-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'mayosis_child_enqueue_styles' );