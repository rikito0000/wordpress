<?php /* Template Name: Featured Page */ ?>
<?php get_header(); ?>

			<?php
				$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
				$thumb_url = $thumb_url_array[0];
				$image_full = wpcontented_catch_that_image(); $gallery_full = wpcontented_catch_gallery_image_full(); 
			?>

			<div id="content">
				
				<div id="inner-content" class="">

				<div id="inner-content" class="wrap cf post-content-single" style="background-image:url('<?php echo esc_url( $thumb_url ); ?>');">

							<div id="page-content">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								
									<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
										<section class="entry-content cf" itemprop="articleBody">
											<h1 class="featured-page-title"><?php the_title(); ?></h1>
											<?php

												the_content();

												wp_link_pages( array(
													'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wp-contented' ) . '</span>',
													'after'       => '</div>',
													'link_before' => '<span>',
													'link_after'  => '</span>',
												) );
											?>
										</section> <?php // end article section ?>

									</article>

								<?php endwhile; ?>

								<?php endif; ?>

							</div>
							<div class="bg-overlay"></div>
				</div>
				<?php if ( is_active_sidebar( 'featured-page-1' ) || is_active_sidebar( 'featured-page-2' ) || is_active_sidebar( 'featured-page-3' ) || is_active_sidebar( 'featured-page-4' ) ) : ?>
				<div class="featured-widgets wrap">
					<div class="featured-widgets-item">
						<?php dynamic_sidebar( 'featured-page-1' ); ?>
					</div>
					<div class="featured-widgets-item">
						<?php dynamic_sidebar( 'featured-page-2' ); ?>
					</div>
					<div class="featured-widgets-item">
						<?php dynamic_sidebar( 'featured-page-3' ); ?>
					</div>
					<div class="featured-widgets-item">
						<?php dynamic_sidebar( 'featured-page-4' ); ?>
					</div>
				</div>
				<?php endif; ?>
				</div>

			</div>

<?php get_footer(); ?>