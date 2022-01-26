<?php 

add_action( 'after_setup_theme', 'register_primary_menu' );
 
function register_primary_menu() {
    register_nav_menu( 'primary', __( 'Primary Menu', 'reason-test' ) );
}

add_theme_support('post-thumbnails', array(
    'post'
));