<?php

/* ScrollBar display */

function scrollbar_styles() {

	$options = get_option('salient');

	echo '/***************** Scrollbar ******************/

	#ascrail2000 {
		background-color: #555;
		width: 16px!important;
		z-index: 100000;
		z-index: 100000!important;
	}
	#ascrail2000 div {
		background-color: '.$options["accent-color"].';
		background-clip: padding-box;
		border: 0px;
		border-bottom-left-radius: 6px;
		border-bottom-right-radius: 6px;
		border-top-left-radius: 6px;
		border-top-right-radius: 6px;
		float: right;
		height: 112px;
		position: relative;
		top: 220px;
		width: 15px;
	}';



}

add_action('wp_head', 'scrollbar_styles');

?>