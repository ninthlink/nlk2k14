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
	return nlk_logo_w_avatars( '#f1f1f1' );
	//return '<div id="nlk-logo-container"><div id="nlk-logo-animated" class="large"><div id="l1" class="l"></div><div id="l2" class="l"></div><div id="l3" class="l"></div><div id="l4" class="l"></div><div id="t1" class="l"></div><div id="t2" class="l"></div></div></div>';
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

function get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}

function nlk_logo_w_avatars( $bcolor = '#fff') {
	$args = array(
		'blog_id'      => $GLOBALS['blog_id'],
		'role'         => 'administrator',
		'orderby'      => 'login',
		'order'        => 'ASC',
		'count_total'  => false,
		'fields'       => array('ID', 'display_name', 'user_email'),
		);
	$u = get_users( $args );
	
	foreach ( $u as $k => $v ) {
		if( $u[$k]->ID == 1 ) {
			unset( $u[$k] );
		}
		else {
			$u[$k]->avatar = get_avatar( $v->ID, $size = '100', $default = null );
		}
	}

	// Register the script first.
	wp_register_script( 'nlk_custom_logo', get_stylesheet_directory_uri() . '/js/custom-logo.js', '1.0', true );
	// Now we can localize the script with our data.
	wp_localize_script( 'nlk_custom_logo', 'logo_object', $u );
	// The script can be enqueued now or later.
	wp_enqueue_script( 'nlk_custom_logo' );

	$the_logo = '<style>div#nlk-logo-avatars div { border-color: '. $bcolor .'; }
	div#nlk-logo-avatars { height: 310px; margin: 20px auto; position: relative; width: 200px; }
	div#nlk-logo-avatars div { overflow: hidden; box-sizing: border-box; border-width: 4px; border-style: solid; text-align: center; }
	div#nlk-logo-avatars div#l1 { position: absolute; border-width: 4px 6px 4px 4px; z-index: 5; top: 70px; left: 0px; width: 89px; height: 100px; background-color: darkorange; -webkit-transform: skew(0deg, 30deg);  -moz-transform: skew(0deg, 30deg); transform: skew(0deg, 30deg);}
	div#nlk-logo-avatars div#l2 { position: absolute; border-width: 4px 4px 6px 4px; z-index: 4; top: 0px; left: 37px; width: 100px; height: 90px; background-color: darkorange; -webkit-transform: rotate(-30deg) skew(30deg);  -moz-transform: rotate(-30deg) skew(30deg); transform: rotate(-30deg) skew(30deg);}
	div#nlk-logo-avatars div#l5 { position: absolute; z-index: 3; top: 171px; left: 85px; width: 89px; height: 100px; background-color: darkorange; -webkit-transform: skew(0deg, 150deg);  -moz-transform: skew(0deg, 150deg); transform: skew(0deg, 150deg);}
	div#nlk-logo-avatars div#l4 { position: absolute; z-index: 2; top: 102px; left: 37px; width: 100px; height: 89px; background-color: orange; -webkit-transform: rotate(-30deg) skew(30deg);  -moz-transform: rotate(-30deg) skew(30deg); transform: rotate(-30deg) skew(30deg);}
	div#nlk-logo-avatars div#l3 { position: absolute; border-width: 4px 4px 14px 4px;z-index: 1; top: 22px; left: 85px; width: 89px; height: 100px; background-color: orange; -webkit-transform: skew(0deg, 30deg);  -moz-transform: skew(0deg, 30deg); transform: skew(0deg, 30deg);}
	div#nlk-logo-avatars div img { display: none; margin-left: 50%; left: -50px; position: relative; } </style>
		<div id="nlk-logo-avatars">
			<div id="l1" class="l"></div>
			<div id="l2" class="l"></div>
			<div id="l3" class="l"></div>
			<div id="l4" class="l"></div>
			<div id="l5" class="l"></div>
		</div>';

	return $the_logo;
}
