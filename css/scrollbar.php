<?php
header('Content-type: text/css');
require_once('/wp-load.php');
require_once('/wp-includes/post.php');
/* ScrollBar display */


$options = get_option('salient');

	echo '<style id="scrollbar-styles" type="text/css">

	/***************** Scrollbar ******************/

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
	}

	</style>';

?>