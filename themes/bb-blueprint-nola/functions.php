<?php

function bb_blueprint_nola_load_css() {
	wp_enqueue_style( 'googl-fonts', 'https://fonts.googleapis.com/css?family=Playfair+Display', false, null, 'all' );
    wp_enqueue_style( 'bb-blueprint-nola', get_stylesheet_directory_uri() . '/style.css', false, null, 'all' );
}

add_action( 'wp_enqueue_scripts', 'bb_blueprint_nola_load_css', 20 );

?>
