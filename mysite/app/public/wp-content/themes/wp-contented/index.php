<?php get_header(); ?>
		<div class="front-wrapper">
			<div id="content">
				<div class="wrap">
					<?php if ( get_theme_mod('wpcontented_slider_area') ):
			                    $slider_class = 'slider-hide';
			                    else:
			                    $slider_class = '';
			                    endif;
                	?>
					<div id="slide-wrap" class="<?php echo esc_attr( $slider_class ); ?>">
						<?php 
							$args = array(
							'posts_per_page' => 10,
							'post_status' => 'publish',
							'post__in' => get_option("sticky_posts")
							);
							$fPosts = new WP_Query( $args );
						?>

						<?php if ( $fPosts->have_posts() ) : ?>

						<div class="cycle-slideshow" 
							<?php if ( get_theme_mod('wpcontented_slider_effect') ):
								echo 'data-cycle-fx="' . wp_kses_post( get_theme_mod('wpcontented_slider_effect') ) . '" data-cycle-tile-count="10"';
							else:
								echo 'data-cycle-fx="scrollHorz"';
							endif;
							?> 
							data-cycle-slides="> div.slides" <?php if ( get_theme_mod('wpcontented_slider_timeout') ):
								$slider_timeout = wp_kses_post( get_theme_mod('wpcontented_slider_timeout') );
								echo 'data-cycle-timeout="' . $slider_timeout . '000"';
							else:
								echo 'data-cycle-timeout="5000"';
							endif;
							?> data-cycle-prev="#sliderprev" data-cycle-next="#slidernext">


							<?php while ( $fPosts->have_posts() ) : $fPosts->the_post();  ?>

								<div class="slides">
									<div id="post-<?php the_ID(); ?>" <?php post_class('post-theme'); ?>>

										<?php $image_full = wpcontented_catch_that_image(); $gallery_full = wpcontented_catch_gallery_image_full(); ?>
										
										<?php if ( has_post_thumbnail()): ?>
											<div class="slide-thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( "full" ); ?></a><div class="bg-overlay"></div></div>
										
										<?php elseif(has_post_format('image') && !empty($image_full)):  ?>
											<div class="slide-thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img class="attachment-full" src="<?php echo $image_full; ?>"></a><div class="bg-overlay"></div></div>
										
										<?php elseif(has_post_format('gallery') && !empty($gallery_full)): ?>  
											<div class="slide-thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img class="attachment-full" src="<?php echo $gallery_full; ?>"></a><div class="bg-overlay"></div></div>
										
										<?php else: ?>
											<div class="slide-noimg"><div class="bg-overlay"></div></div>
										<?php endif; ?>

									</div>

									<div class="slide-copy-wrap">
										<div class="table">
											<div class="table-cell"> 
												<div class="slide-copy">
													<h2 class="slide-title">
														<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Read %s', 'wp-contented' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
															<?php the_title(); ?>
														</a>
													</h2>
													<div class="date"><?php _e('By ','wp-contented'); ?><?php the_author_posts_link(); ?><?php printf( __( ' / <span>%2$s</span> / ', 'wp-contented' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format'))); ?><?php $category_list = get_the_category_list( __( ', ', 'wp-contented' ) ); printf('%s', $category_list); ?></div>
													<?php the_excerpt(); ?> 
												</div>
											</div>
										</div>
									</div>

								</div>

							<?php endwhile; ?>

							<div class="slidernav">
								<a id="sliderprev" href="#" title="<?php _e('Previous', 'wp-contented'); ?>"><span class="fa fa-angle-left"></span></a>
								<a id="slidernext" href="#" title="<?php _e('Next', 'wp-contented'); ?>"><span class="fa fa-angle-right"></span></a>
							</div>

						</div>
						<?php endif; ?>

						<?php wp_reset_postdata(); ?>

					</div> <!-- slider-wrap -->
				</div> <!-- wrap -->

				<div class="wrap">	
					<ul class="blog-list" id="blog">
							<?php $args2= array('post__not_in' => get_option( 'sticky_posts' ) ,'paged' => $paged);
							$blogPosts = new WP_Query( $args2 ); ?>
							<?php if ( $blogPosts->have_posts() ) : ?>
							<?php while ( $blogPosts -> have_posts() ) : $blogPosts -> the_post(); 
								$thumb_id = get_post_thumbnail_id();
								$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
								$thumb_url = $thumb_url_array[0]; 
								$image_full = wpcontented_catch_that_image(); 
								$gallery_full = wpcontented_catch_gallery_image_full(); ?>
				  				
				  				<?php if(has_post_format('status')): ?>
				  					<li class="item status-format">
				  				<?php else: ?>
									<li class="item">
								<?php endif; ?>
									<?php get_template_part( 'home-post-format/home', get_post_format() ); ?>
								</li>
			  				<?php endwhile;  ?>

					</ul>

					<div class="sidebar-area">
						<?php if ( is_active_sidebar( 'sidebar2' )): ?>
								<div class="sidebar">
									<?php dynamic_sidebar( 'sidebar2' ); ?>
								</div>
								<?php else: ?>

								<?php
									/*
									 * This content shows up if there are no widgets defined in the backend.
									*/
								?>

								<div class="no-widgets-here">
									<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'wp-contented' );  ?></p>
								</div>

						<?php endif; ?>
					</div>

					<div class="clear"></div>
				</div>

				<div class="pagination">
					<?php next_posts_link( __('Older Entries','wp-contented'), $blogPosts->max_num_pages );?>
				</div>
				<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div> <!-- content -->
		</div><!-- front-wrapper -->

<?php get_footer(); ?>