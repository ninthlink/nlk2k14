<?php

// and then?
function nl2k14_js() {
	if(!is_admin()) {
		wp_enqueue_script( 'nlkjs', get_stylesheet_directory_uri() .'/js/nlk.js', array('jquery'), '0.1', true );
	}
}
add_action( 'wp_print_scripts', 'nl2k14_js' );


function nl2k14_styles() {	
		 wp_register_style("dynamic-styles", get_stylesheet_directory_uri() . "/css/dynamic_styles.php");
		 wp_enqueue_style('dynamic-styles'); 
}
add_action('wp_enqueue_scripts', 'nl2k14_styles');

function image_by_scan( $args = array() ) {
	if ( !$post_id )
		global $post;
	preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $post->post_content, $matches );
	if ( isset( $matches ) ) $image = $matches[1][0];
	if ( $matches[1][0] ) {
		//return array( 'image' => $image );
		print_r($matches);
	}
	else {
		return false;
	}
}