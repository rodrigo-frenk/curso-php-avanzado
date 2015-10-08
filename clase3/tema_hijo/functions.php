<?php
function theme_name_parent_styles() {
	// Enqueue the parent stylesheet
	wp_enqueue_style( 'theme-name-parent-style', get_template_directory_uri() . '/style.css', array(), '0.1', 'all' );
	// Enqueue the parent rtl stylesheet
	if ( is_rtl() ) {
		wp_enqueue_style( 'theme-name-parent-style-rtl', get_template_directory_uri() . '/rtl.css', array(), '0.1', 'all' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_name_parent_styles' );




include_once 'cpt.php';


?>