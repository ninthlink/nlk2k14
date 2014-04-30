<?php 

$options = get_option('salient');

$blog_type = $options['blog_type'];

if($blog_type == null) $blog_type = 'std-blog-fullwidth';

get_header(); 

?>

<?php nectar_page_header(get_option('page_for_posts')); ?>

<div id="goto-butts"></div>

<div class="container-wrap <?php if ( $blog_type == 'std-blog-fullwidth' ) echo 'std-blog-fullwidth'; ?>  <?php echo ( is_single() ? 'single-entry' : 'blog-posts' ); ?>">

	<?php

	if ( $blog_type == 'std-blog-fullwidth' ) {

		if ( is_archive() ) { // for now?
			if ( is_author() ) {
				echo '<div class="post-featured-img-full-width no-img" style="background:' . $options["accent-color"] . ' url(' . get_stylesheet_directory_uri() . '/images/nlkrep.png) repeat 0 0;"></div>';
				/*
						 * Queue the first post, that way we know what author
						 * we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop properly
						 * with a call to rewind_posts().
						 */
						the_post();

						
					?>
		<div class="container blog-header-post-title">
			<h2><span><?php the_author(); ?></span></h2>
		</div>

		<div class="container main-content authdr">

			<div class="row">
				<div class="post-content">

					<div class="content-inner">
						
						<div class="post-header">
						</div><!--/post-header-->
            <div class="post-meta">
							<span class="author-description"><?php if( function_exists('get_avatar') ) { echo get_avatar( get_the_author_meta( 'ID' ), 96 ); } ?>
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<?php the_author_meta( 'description' ); ?>
				<?php endif; ?>
        </span>
        </div>
        </div>
        </div>
        </div>
        </div>
        <?php
					/*
					 * Since we called the_post() above, we need to rewind
					 * the loop back to the beginning that way we can run
					 * the loop properly, in full.
					 */
					rewind_posts();
					
			} else {
				echo '<div class="blog-header-post-title chdr"><h1>';
				if ( is_day() ) :
					printf( __( 'Daily Archives: %s' ), '<span>' . get_the_date() . '</span>' );
				elseif ( is_month() ) :
					printf( __( 'Monthly Archives: %s' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format' ) ) . '</span>' );
				elseif ( is_year() ) :
					printf( __( 'Yearly Archives: %s' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format' ) ) . '</span>' );
				elseif ( is_category() ) :
					printf( __( 'Category Archives: %s' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				else :
					_e( 'Archives', 'twentytwelve' );
				endif;
				echo '</h1></div>';
			}
		}

		// do the blog section with full width header/title

		if(have_posts()) : while(have_posts()) : the_post();

			get_template_part( 'loop', get_post_format() );

		endwhile; endif; ?>

		<div class="container main-content">

			<div class="row">

				<?php nectar_pagination(); ?>

			</div>

		</div>

	<?php }

	else { ?>

	<div class="container main-content">
		
		<?php if(!is_home()) { ?>
			<div class="row">
				<div class="col span_12 section-title blog-title">
					<h1><?php wp_title("",true); ?></h1>
				</div>
			</div>
		<?php } ?>
		
		<div class="row">
			
			<?php

			$masonry_class = null;
			
			//enqueue masonry script if selected
			if($blog_type == 'masonry-blog-sidebar' || $blog_type == 'masonry-blog-fullwidth' || $blog_type == 'masonry-blog-full-screen-width') {
				$masonry_class = 'masonry';
			}
			
			if($blog_type == 'masonry-blog-full-screen-width') {
				$masonry_class = 'masonry full-width-content';
			}
			
			if($blog_type == 'std-blog-sidebar' || $blog_type == 'masonry-blog-sidebar'){
				echo '<div id="post-area" class="col span_9 '.$masonry_class.'">';
			} else {
				echo '<div id="post-area" class="col span_12 col_last '.$masonry_class.'">';
			}
	
				if(have_posts()) : while(have_posts()) : the_post(); ?>
					
					<?php 
		
					if ( floatval(get_bloginfo('version')) < "3.6" ) {
						//old post formats before they got built into the core
						 get_template_part( get_template_directory_uri() . '/includes/post-templates-pre-3-6/entry', get_post_format() ); 
					} else {
						//WP 3.6+ post formats
						 get_template_part( get_template_directory_uri() . '/includes/post-templates/entry', get_post_format() ); 
					} ?>
	
				<?php endwhile; endif; ?>
				
				<?php nectar_pagination(); ?>
				
			</div><!--/span_9-->
			
			<?php  if($blog_type == 'std-blog-sidebar' || $blog_type == 'masonry-blog-sidebar') { ?>
				<div id="sidebar" class="col span_3 col_last">
					<?php get_sidebar(); ?>
				</div><!--/span_3-->
			<?php } ?>
			
		</div><!--/row-->
		
	</div><!--/container-->

	<?php } ?>

</div><!--/container-wrap-->
	
<?php get_footer(); ?>
