<?php
	$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
	$wp_load = $absolute_path[0] . 'wp-load.php';
	require_once($wp_load);

	header('Content-type: text/css');
	header('Cache-control: must-revalidate');

	$options = get_option('salient');

	// from [ WP Admin -> Salient -> Accent Color ]
	$accentColor = $options["accent-color"];
	$extraColor1 = $options["extra-color-1"];
	$extraColor2 = $options["extra-color-2"];
	$extraColor3 = $options["extra-color-3"];

	// scrollbar before/after block gap offset (in pixels)
	$scrollerABoffset = 18;

?>

/***************** Scrollbar ******************/

#ascrail2000 {
	background-color: #555;
	width: 16px!important;
	z-index: 100000;
	z-index: 100000!important;
}
#ascrail2000 div {
	background-color: <?php echo $extraColor1 ?> !important;
	background-clip: padding-box;
	border: 0px;
	border-bottom-left-radius: 0 !important;
	border-bottom-right-radius: 0 !important;
	border-top-left-radius: 0 !important;
	border-top-right-radius: 0 !important;
	float: right;
	height: 112px;
	position: relative;
	top: 220px;
	width: 15px;

	/* skew it */
	-webkit-transform: skew(0deg, -20deg);
	-moz-transform: skew(0deg, -20deg);
	-ms-transform: skew(0deg, -20deg);
	-o-transform: skew(0deg, -20deg);
	transform: skew(0deg, -20deg);

	/* grayscale filter, un-did on hover */
	filter: grayscale(100%);
    -webkit-filter: grayscale(100%);  /* For Webkit browsers */
    filter: gray;  /* For IE 6 - 9 */
    transition: all .6s ease;
    -webkit-transition: all .6s ease;  /* Transition for Webkit browsers */
}
#ascrail2000 div:before,
#ascrail2000 div:after {
    content: ' ';
    display: block;
    width: 15px;
    height: 15px;
    position: absolute;
}
#ascrail2000 div:before {
    background-color: <?php echo $options["accent-color"]; ?>;
    top: -<?php echo $scrollerABoffset; ?>px;
}
#ascrail2000 div:after {
    background-color: <?php echo $options["accent-color"]; ?>;
    bottom: -<?php echo $scrollerABoffset; ?>px;
}
#ascrail2000 div:hover,
#ascrail2000 div:active {
	filter: grayscale(0%);
    -webkit-filter: grayscale(0%);
    filter: none;
}

/******************** Nav Icons ********************/
nav [class^="icon-"], nav [class*=" icon-"] {
	background-color: transparent;
	color: inherit;
	display: inline-block;
	font-size: <?php echo ($options['navigation_font_size'] != '-') ? $options['navigation_font_size'] : '15px'; ?>;
	height: auto;
	line-height: inherit;
	max-width: 100%;
	position: relative;
	text-align: center;
	vertical-align: top;
	width: inherit;
	top: 0px;
	word-spacing: 0px;
}
nav a:hover > [class^="icon-"], nav a:hover > [class*=" icon-"] {
	color: <?php echo $options["accent-color"]; ?>;
}




/***************** Image Gray-scaler ***********************/

img.grayscale { 
    filter: grayscale(100%);
    -webkit-filter: grayscale(100%);  /* For Webkit browsers */
    filter: gray;  /* For IE 6 - 9 */
    transition: all .6s ease;
    -webkit-transition: all .6s ease;  /* Transition for Webkit browsers */
}
img.grayscale:hover { 
    filter: grayscale(0%);
    -webkit-filter: grayscale(0%);
    filter: none;
}



/************ FIXES ****************/

/* lists */
.main-content .nectar-fancy-ul ul {
	margin-left: -8px;
	margin-bottom: 30px;
}



/*************** Blog Full Width Headers / Images *************/

div.post-featured-img-full-width {
	background-size: cover;
	background-repeat: no-repeat;
	background-position: 50% 15%;
	display: block;
	margin-bottom: 30px;
	margin-top: -38px;
	width: 100%;
}

div.post-featured-img-full-width .grad {
	position: absolute;
	width: 100%;
	-webkit-box-shadow: inset 0px 0px 300px 1px rgba(0, 0, 0, .8);
	-moz-box-shadow:    inset 0px 0px 300px 1px rgba(0, 0, 0, .8);
	box-shadow:         inset 0px 0px 300px 1px rgba(0, 0, 0, .8);
}
div.post-featured-img-full-width h1 {
	color: #fff;
	font-size: 5em;
	font-weight: 400;
	line-height: 130%;
	padding: 2em 0 .75em;
}
div.post-featured-img-full-width h1 > span {
	background-color: #000;
	background-color: rgba(0, 0, 0, .5);
}

div.container-wrap.std-blog-fullwidth article .container.main-content img {
	display: none;
}