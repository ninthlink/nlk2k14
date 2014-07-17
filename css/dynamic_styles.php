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

/* - - - - - FIXES - - - - - */
	small {
		font-size: .75em !important;
	}
	/* lists :: left align with above content */
	.main-content .nectar-fancy-ul ul {
		margin-left: -8px;
		margin-bottom: 30px;
	}
	/* articles w/ floated content :: adds spacing to bottom of article section (instead of inside post content) */
	div.std-blog-fullwidth article:after {
		content: ' ';
		display: block;
		clear: both;
	}
	div.std-blog-fullwidth article.post {
		margin-bottom: 100px;
	}
	/* single article/post :: move bottom border line to very bottom of article */
	div.std-blog-fullwidth.single article.post {
		border-bottom: 1px solid #DDDDDD;
		padding-bottom: 50px;
		margin-bottom: 50px;
	}
	/* single article/post :: border bottom fix, moved to main article content */
	div.std-blog-fullwidth article.post .content-inner {
		border-bottom: none;
		padding-bottom: 0px;
		margin-bottom: 0px;
	}
	/* gallery fix for non nectar gallery :: center those orange arrow things instead of top right corner */
	.flex-gallery ul.flex-direction-nav {
		left: 50%;
		margin: 0 0 0 -32px !important;
		margin-left: -32px !important;
	}
	/* portfolio details :: removes title bar from portfolio details pages */
	#full_width_portfolio .row.project-title { display: none; }
	/* phone numbers should be links for mobile */
	a[href^="tel"] { color: inherit; text-decoration: none; }

/* - - - - - Scrollbar - - - - - */

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

/* - - - - - Nav Icons - - - - - */
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

/* - - - - - Inputs and Forms - - - - - */
	input[type="text"], input[type="tel"], input[type="email"], textarea {
		background-color: transparent !important;
		border: none;
		border-bottom: 2px solid #c8c8c8 !important;
		box-shadow: none !important;
		box-sizing: border-box;
		font-size: 16px !important;
		margin-bottom: 20px !important;
		-webkit-transition: border .35s;
	}
	input[type="text"]:hover, input[type="tel"]:hover, input[type="email"]:hover, textarea:hover,
	input[type="text"]:focus, input[type="tel"]:focus, input[type="email"]:focus, textarea:focus {
		background-color: transparent !important;
		border-color: <?php echo $options['accent-color']; ?> !important;
	}
	input[type="text"]:hover::-webkit-input-placeholder, input[type="tel"]:hover::-webkit-input-placeholder, input[type="email"]:hover::-webkit-input-placeholder, textarea:hover::-webkit-input-placeholder,
	input[type="text"]:focus::-webkit-input-placeholder, input[type="tel"]:focus::-webkit-input-placeholder, input[type="email"]:focus::-webkit-input-placeholder, textarea:focus::-webkit-input-placeholder {
		color: <?php echo $options['accent-color']; ?> !important;
	}
	input[type="text"]:hover:-moz-placeholder, input[type="tel"]:hover:-moz-placeholder, input[type="email"]:hover:-moz-placeholder, textarea:hover:-moz-placeholder,
	input[type="text"]:focus:-moz-placeholder, input[type="tel"]:focus:-moz-placeholder, input[type="email"]:focus:-moz-placeholder, textarea:focus:-moz-placeholder {
		color: <?php echo $options['accent-color']; ?> !important;
	}
	input[type="text"]:hover::-moz-placeholder, input[type="tel"]:hover::-moz-placeholder, input[type="email"]:hover::-moz-placeholder, textarea:hover::-moz-placeholder,
	input[type="text"]:focus::-moz-placeholder, input[type="tel"]:focus::-moz-placeholder, input[type="email"]:focus::-moz-placeholder, textarea:focus::-moz-placeholder {
		color: <?php echo $options['accent-color']; ?> !important;
	}
	input[type="text"]:hover:-ms-input-placeholder, input[type="tel"]:hover:-ms-input-placeholder, input[type="email"]:hover:-ms-input-placeholder, textarea:hover:-ms-input-placeholder,
	input[type="text"]:focus:-ms-input-placeholder, input[type="tel"]:focus:-ms-input-placeholder, input[type="email"]:focus:-ms-input-placeholder, textarea:focus:-ms-input-placeholder {
		color: <?php echo $options['accent-color']; ?> !important;
	}

	.wpcf7-list-item {
		display: block;
	}
	form label {
		font-size: 16px;
	}
	input[type="submit"] {
		background-color: transparent !important;
		border: 2px solid <?php echo $options['accent-color']; ?> !important;
		border-radius: 2px !important;
		box-shadow: none !important;
		-webkit-box-shadow: none !important;
		-moz-box-shadow: none !important;
		-o-box-shadow: none !important;
		color: <?php echo $options['accent-color']; ?> !important;
		font-family: 'OpenSansBold';
		font-size: 16px !important;
		font-weight: bold;
		opacity: 1 !important;
		padding: 12px 50px !important;
		text-transform: uppercase;
		-moz-transition: all 0.2s linear !important;
		-webkit-transition: all 0.2s linear !important;
		-o-transition: all 0.2s linear !important;
		transition: all 0.2s linear !important;
		-webkit-border-radius: 2px !important;
		-o-border-radius: 2px !important;
	}
	input[type="submit"]:hover {
		background-color: <?php echo $options['accent-color']; ?> !important;
		border: 2px solid <?php echo $options['accent-color']; ?> !important;
		color: #fff !important;
	}

/* - - - - - Image Gray-scaler - - - - - */

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

/* - - - - - Blog Full Width Headers / Images - - - - - */

	/* three-color bar above blog header images */
	.article-color-bar {
		background-color: <?php echo $options['accent-color']; ?>;
		height: 6px;
		position: relative;
		width: 100%;
	}
	.article-color-bar div {
		display: block;
		height: 6px;
		margin: 0 auto;
		padding: 0;
		position: absolute;
		width: 33%;
	}
	.article-color-bar div:first-child {
		background-color: <?php echo $options['extra-color-1']; ?>;
		left: 0;
	}
	.article-color-bar div:last-child {
		background-color: <?php echo $options['extra-color-2']; ?>;
		right: 0;
	}

	/* fix for top header/menu bar */
	div.container-wrap.std-blog-fullwidth {
		margin-top: -93px;
	}

	/* blog full-width header images */
	div.post-featured-img-full-width {
		background-size: cover;
		background-repeat: no-repeat;
		background-position: 50% 27.5%;
		display: block;
		min-height: 480px;
		width: 100%;
	}
	div.post-featured-img-full-width.no-img {
		min-height: 120px;
		height: 180px;
	}

	/* post titles */
	div.blog-header-post-title h1 {
		font-size: 3em;
		font-weight: 400;
		line-height: 130%;
		padding: .5em 0;
	}
	div.blog-header-post-title h1,
	div.blog-header-post-title h2 {
		background-color: #f8f8f8;
		background-color: rgb(248, 248, 248);
		background-color: rgba(248, 248, 248, 1);
		color: #333;
		font-size: 3em;
		font-weight: 400;
		line-height: 130%;
		margin-top: -90px;
		padding: .75em;
		text-align: center;
		border-top: 1px solid <?php echo $options['extra-color-1']; ?>;
		background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $options['extra-color-1']; ?>), to(transparent));
		background-image: -webkit-linear-gradient(<?php echo $options['extra-color-1']; ?>, transparent);
		background-image:
			-moz-linear-gradient(<?php echo $options['extra-color-1']; ?>, transparent),
			-moz-linear-gradient(<?php echo $options['extra-color-1']; ?>, transparent);
		background-image:
			-o-linear-gradient(<?php echo $options['extra-color-1']; ?>, transparent),
			-o-linear-gradient(<?php echo $options['extra-color-1']; ?>, transparent);
		background-image: 
			linear-gradient(<?php echo $options['extra-color-1']; ?>, transparent),
			linear-gradient(<?php echo $options['extra-color-1']; ?>, transparent);
		-moz-background-size: 1px 100%;
		background-size: 1px 100%;
		background-position: 0 0, 100% 0;
		background-repeat: no-repeat;
		-webkit-transition: color .35s;
		-moz-transition: color .35s;
		-ms-transition: color .35s;
		-o-transition: color .35s;
		transition: color .35s;
	}
	div.blog-header-post-title a h2:hover {
		color: <?php echo $options['accent-color']; ?>;
	}
	div.blog-header-post-title.chdr h1 {
		background: #000 !important;
		color: #fff;
		margin: 0;
	}
	@media all and (max-width: 999px) {
		div.blog-header-post-title h1,
		div.blog-header-post-title h2 {
			font-size: 2.5em;
		}
	}

	




div.container-wrap.std-blog-fullwidth.single-entry div.post-featured-img-full-width h1 {
	padding: .5em 0;
}

/*
div.container-wrap.std-blog-fullwidth article .container.main-content img {
	display: none;
}
*/

/* post content */
	div.container-wrap.std-blog-fullwidth .container .post-content,
  div.container-wrap.std-blog-fullwidth article .container .post-content {
		padding: 0 120px;
	}
	@media all and (max-width: 999px) {
		div.container-wrap.std-blog-fullwidth .container .post-content,
		div.container-wrap.std-blog-fullwidth article .container .post-content {
			padding: 0 20px;
		}
	}



div.container-wrap.std-blog-fullwidth article .container .post-content .content-inner {
	border-bottom: none;
}


div.container-wrap.std-blog-fullwidth article .post-header {
	text-align: center;
}

/* post meta */
	div.container-wrap.std-blog-fullwidth article.post .post-meta {
		border-right: none;
		display: block;
		left: inherit;
		margin-bottom: inherit;
		margin-top: 50px;
		position: relative;
		top: inherit;
	}
	div.container-wrap.std-blog-fullwidth img.avatar,
	div.container-wrap.std-blog-fullwidth article.post .post-meta img.avatar {
		position: relative;
		float: left;

		<?php 
		$avatar_border_width = '8px';
		$avatar_border_style = 'solid';
		?>
		border-radius: 999px;

		border-top: <?php echo $avatar_border_width . ' ' . $avatar_border_style . ' ' . $options['accent-color']; ?>;
		border-left: <?php echo $avatar_border_width . ' ' . $avatar_border_style . ' ' . $options['extra-color-1']; ?>;
		border-right: <?php echo $avatar_border_width . ' ' . $avatar_border_style . ' ' . $options['extra-color-2']; ?>;
		border-bottom: <?php echo $avatar_border_width . ' ' . $avatar_border_style . ' ' . $options['extra-color-3']; ?>;

		border: <?php echo $avatar_border_width; ?> solid #c5c5c5;
	}
	div.container-wrap.std-blog-fullwidth .authdr .post-meta span,
	div.container-wrap.std-blog-fullwidth article.post .post-meta span {
		display: inline-block;
		padding: 36px 0 0 10px;
	}
	div.container-wrap.std-blog-fullwidth .authdr .post-meta span {
  	padding: 0;
  }
  div.container-wrap.std-blog-fullwidth .authdr .post-meta span img.avatar {
  	margin: -10px 10px 30px 0;
  }

/* menu scroll cleanup */
#mobile-menu {
	margin-top: 0 !important
}
.container-wrap,
.project-title,
#full_width_portfolio {
	margin-top: 0 !important;
	padding-top: 0 !important;
}
body.page.contact .wpb_row.first-section {
	margin-top: 0 !important
}
/* mobile 1st */
#header-outer {
	padding-top: 10px !important;
	height: 58px;
	min-height: 58px;
}
.admin-bar #header-outer {
	top: 32px !important;
}
#header-outer #mobile-menu {
	position: absolute;
	width: 100%;
	left: 0;
	top: 58px;
}
#header-outer #top {
	position: absolute;
	left: 0;
	bottom: 0;
}
div#header-space {
	display: block !important;
	height: 58px !important;
}
body.home div#header-space {
	display:none !important;
}
body header#top a#toggle-nav {
	color: #999;
	width: auto;
}
@media only screen and (min-width: 1001px) {
	#header-outer {
		padding-top: 20px !important;
		height: 98px;
	}
	div#header-space {
		height: 98px !important;
	}
}