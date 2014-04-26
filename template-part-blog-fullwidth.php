<?php

$options = get_option('salient');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php

	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			$src = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	}

	else {
		$src = post_image_src();
	}

	if( !is_single() ) {  echo '<a href="' . get_permalink() . '">'; }

	if ( $src ) {
		echo '<div class="post-featured-img-full-width" style="background-image:url(\'' . $src . '\');">';
	}
	else {
		echo '<div class="post-featured-img-full-width" style="background-color:' . $options["accent-color"] . ';">';
	}

	echo '<div class="grad"></div>';
	echo '<div class="container"><h1 class="entry-title"><span>' . get_the_title() . '</span></h1></div>';
	echo '</div>';

	if( !is_single() ) {  echo'</a>'; }
 
	?>

	<div class="container main-content">

		<div class="row">

			<div class="post-content">
				
				<?php if( !is_single() ) { ?>
					
					<?php
					
					global $layout;
					 
					$extra_class = '';
					if (!has_post_thumbnail()) $extra_class = 'no-img'; 
					?>
					
					<div class="post-meta <?php echo $extra_class; ?>">
						
						<?php $options = get_option('salient'); 
						$blog_type = $options['blog_type']; 
						
						$use_excerpt = (!empty($options['blog_auto_excerpt']) && $options['blog_auto_excerpt'] == '1') ? 'true' : 'false'; 
						?>
						
						<div class="date">
							<?php 
							if(
							$blog_type == 'masonry-blog-sidebar' && substr( $layout, 0, 3 ) != 'std' || 
							$blog_type == 'masonry-blog-fullwidth' && substr( $layout, 0, 3 ) != 'std' || 
							$blog_type == 'masonry-blog-full-screen-width' && substr( $layout, 0, 3 ) != 'std' || 
							$layout == 'masonry-blog-sidebar' || $layout == 'masonry-blog-fullwidth' || $layout == 'masonry-blog-full-screen-width') {
								echo get_the_date();
							}
							else { ?>
							
								<span class="month"><?php the_time('M'); ?></span>
								<span class="day"><?php the_time('d'); ?></span>
								<?php $options = get_option('salient'); 
								if(!empty($options['display_full_date']) && $options['display_full_date'] == 1) {
									echo '<span class="year">'. get_the_time('Y') .'</span>';
								}
							} ?>
						</div><!--/date-->
						
						<div class="nectar-love-wrap">
							<?php if( function_exists('nectar_love') ) nectar_love(); ?>
						</div><!--/nectar-love-wrap-->	
									
					</div><!--/post-meta-->
					
				<?php } ?>
				
				<div class="content-inner">
					
					<?php if( !is_single() ) { ?>
						<div class="post-header">
							<span class="meta-author"><?php echo __('By', NECTAR_THEME_NAME); ?> <?php the_author_posts_link(); ?></span> <span class="meta-category">| <?php the_category(', '); ?></span> <span class="meta-comment-count">| <a href="<?php comments_link(); ?>">
							<?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a></span>
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
					
					<?php } ?>
					
				   
					<?php 
					if(is_single()){
						//on the single post page display the content
						the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>'); 
					} ?>
					
					<?php $options = get_option('salient');
						if( $options['display_tags'] == true ){
							 
							if( is_single() && has_tag() ) {
							
								echo '<div class="post-tags"><h4>Tags: </h4>'; 
								the_tags('','','');
								echo '<div class="clear"></div></div> ';
								
							}
						}
					?>
						
				</div><!--/content-inner-->
				
			</div><!--/post-content-->

		</div>

	</div>
		
</article><!--/article-->
