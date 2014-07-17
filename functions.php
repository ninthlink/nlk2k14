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
	 wp_enqueue_style("nlk", get_stylesheet_directory_uri() . "/css/dynamic_styles.php", array(), '1.3');
}
add_action('wp_enqueue_scripts', 'nl2k14_styles');


/**
 * Login Page customizations
 */
add_action( 'login_head', 'nlk_custom_login_logo' );
add_filter( 'login_message', 'nlk_custom_login_message' );
add_filter( 'login_headertitle', 'nlk_custom_login_headertitle' );
add_filter( 'login_headerurl', 'nlk_the_url' );

function nlk_custom_login_logo() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/custom-login.css" />';
}
function nlk_custom_login_message() {
	return '<div id="nlk-logo-container"><div id="nlk-logo-animated" class="large"><div id="l1" class="l"></div><div id="l2" class="l"></div><div id="l3" class="l"></div><div id="l4" class="l"></div><div id="t1" class="l"></div><div id="t2" class="l"></div></div></div>';
}
function nlk_custom_login_headertitle() {
	return 'Ninthlink, Inc.';
}
function nlk_the_url() {
    return get_bloginfo( 'url' );
}

/**
 * NLK Loader
 */
function nlk_custom_loader( $size = 'small' ) {
	return '<div id="nlk-logo-container"><div id="nlk-logo-animated" class="' . $size . '"><div id="l1" class="l"></div><div id="l2" class="l"></div><div id="l3" class="l"></div><div id="l4" class="l"></div><div id="t1" class="l"></div><div id="t2" class="l"></div></div></div>';
}

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