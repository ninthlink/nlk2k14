<?php

// and then?
function nl2k14_js() {
	if(!is_admin()) {
		wp_enqueue_script( 'nlkjs', get_stylesheet_directory_uri() .'/js/nlk.js', array('jquery'), '0.1', true );
	}
}
add_action( 'wp_print_scripts', 'nl2k14_js' );


function nl2k14_styles() {	
		 wp_register_style("scrollbar-style", get_stylesheet_directory_uri() . "/css/scrollbar.php");
		 wp_enqueue_style('scrollbar-style'); 
}
add_action('wp_enqueue_scripts', 'nl2k14_styles');
