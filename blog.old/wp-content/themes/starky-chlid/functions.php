<?php

// enqueue the child theme stylesheet

Function starky_wp_enqueue_child_scripts() {
wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
wp_enqueue_style( 'childstyle' );
}
add_action( 'wp_enqueue_scripts', 'starky_wp_enqueue_child_scripts', 11);
