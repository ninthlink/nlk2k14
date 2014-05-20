<?php

add_action( 'after_setup_theme', 'nl2k14_setup' );
if ( ! function_exists( 'nl2k14_setup' ) ):
function nl2k14_setup() {
	// and
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');
	
	add_filter('body_class','nl2k14_bodyclass');
}
endif;
// and then?
function nl2k14_js() {
	if(!is_admin()) {
		wp_register_script( 'scrollupforwhat', get_stylesheet_directory_uri() .'/js/jquery.scrollupforwhat.min.js', array('jquery'), '1.2', true );
		wp_enqueue_script( 'nlkjs', get_stylesheet_directory_uri() .'/js/nlk.js', array('jquery', 'scrollupforwhat'), '0.2', true );
	}
}
add_action( 'wp_print_scripts', 'nl2k14_js' );


function nl2k14_styles() {	
	 wp_enqueue_style("nlk", get_stylesheet_directory_uri() . "/css/dynamic_styles.php", array(), '1.2');
}
add_action('wp_enqueue_scripts', 'nl2k14_styles');


function post_image_src() {
	// get src of first image in post or featured image if any
	if ( !$post_id )
		global $post;
	preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $post->post_content, $matches );
	if ( isset( $matches ) )
		$image = $matches[1][0];
	if ( $matches[1][0] ) {
		return $matches[1][0];
	}
	else {
		return false;
	}
}


add_action('do_google_tag_manager', 'google_tag_manager_container');

function google_tag_manager_container() {

	$str = <<<GTM
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TVJ3T8"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TVJ3T8');</script>
	<!-- End Google Tag Manager -->
GTM;
	
	echo $str;
}

function google_tag_manager() {
	do_action('do_google_tag_manager');
}

add_action('pre_option_image_default_link_type', 'always_link_images_to_none');
function always_link_images_to_none() {
	return 'none';
}

function nl2k14_bodyclass($classes) {
	if(is_page(5678)) $classes[] = 'contact';
	return $classes;
}