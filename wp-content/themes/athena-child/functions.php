<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    load_child_theme_textdomain( 'athena', get_stylesheet_directory() . '/languages' );
}

?>
