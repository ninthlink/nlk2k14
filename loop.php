<?php

$options = get_option('salient');

$blog_type = $options['blog_type']; 

$use_excerpt = (!empty($options['blog_auto_excerpt']) && $options['blog_auto_excerpt'] == '1') ? 'true' : 'false'; 

global $layout;

$extra_class = '';

$src = false;

// get image from post, if any
if ( has_post_thumbnail() ) {
	$src = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
} // check if the post has a Post Thumbnail assigned to it.

$output = '';



// Blog page
if( !is_single() ): ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<!--div class="article-color-bar"><div></div><div></div><div></div></div-->

		<?php
		
		
		// generate top header/title banner output code
		$output .= '<div class="post-featured-img-full-width ' . ( $src ? 'w-img' : 'no-img' ) . '" style="';
		if ( $src ) { $output .= 'background-image:url(\'' . $src . '\');'; }
		else { $output .= 'background:' . $options["accent-color"] . ' url(' . get_stylesheet_directory_uri() . '/images/nlkrep.png) repeat 0 0;'; }
		$output .= '"></div>';
		?>

		<?php print($output); ?>

		<div class="container blog-header-post-title">
			<a href="<?php echo get_permalink(); ?>"><h2 class="entry-title"><span><?php echo get_the_title(); ?></span></h2></a>
		</div>

		<div class="container main-content">

			<div class="row">
				<div class="post-content">

					<div class="content-inner">
						
						<div class="post-header">
						</div><!--/post-header-->

						<?php 

							//if no excerpt is set
							global $post;
							if(empty( $post->post_excerpt ) && $use_excerpt != 'true') {
								the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>'); 
							}
							//excerpt
							else {
								echo '<div class="excerpt">';
									the_excerpt();
								echo '</div>';
								echo '<a class="more-link" href="' . get_permalink() . '"><span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) .'</span></a>';
							}

						?>
							
					</div><!--/content-inner-->

					<div class="post-meta <?php echo $extra_class; ?>">

							<?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?>

							<span class="meta-author"><?php the_author_posts_link(); ?></span><span class="meta-space">&nbsp;|&nbsp;</span><span class="meta-date"><?php the_time('M d'); ?></span>
										
					</div><!--/post-meta-->

				</div><!--/post-content-->

			</div>

		</div>
			
	</article><!--/article-->

<?php endif; ?>