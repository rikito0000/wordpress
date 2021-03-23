<?php get_header(); ?>

			<div id="content">
				
				<div id="inner-content" class=" cf">

						<?php 
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0];
							$image_full = wpcontented_catch_that_image(); $gallery_full = wpcontented_catch_gallery_image_full(); 
						?>

						<?php if ( has_post_thumbnail()) : ?>
							<header class="article-header full-top-area" style="background:url('<?php echo esc_url( $thumb_url ); ?>')no-repeat scroll center center / cover  rgba(0, 0, 0, 0);position:relative;">
						
						<?php elseif(has_post_format('gallery') && !empty($gallery_full)) : ?>
						     <header class="article-header full-top-area" style="background:url('<?php echo esc_url( $gallery_full ); ?>')no-repeat scroll center center / cover  rgba(0, 0, 0, 0);position:relative;">
						
						<?php elseif(has_post_format('image') && !empty($image_full)) :  ?>
							<header class="article-header full-top-area" style="background:url('<?php echo esc_url( $image_full ); ?>')no-repeat scroll center center / cover  rgba(0, 0, 0, 0);position:relative;">
						
						<?php else: ?>	
							<header class="article-header full-top-area">
						
						<?php endif; ?>
							
									<div class="bg-overlay"></div>
									<div class="title-wrap">
										<div class="wrap title-wrap-inner">
										<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
										
	                					</div>
	                				</div>
									
							</header> <?php // end article header ?>

				<div id="inner-content" class="wrap cf post-content-single">

							<div id="page-content">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								
									<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
										<section class="entry-content cf" itemprop="articleBody">
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

										
										<div class="after-content-area">
										<?php comments_template(); ?>
										</div>
										<div class="sidebar-area">
										<?php if ( is_active_sidebar( 'sidebar4' )) : ?>
												<div class="sidebar">
												<?php dynamic_sidebar( 'sidebar4' ); ?>
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

									</article>

								<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'wp-contented' ); ?></h1>
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'wp-contented' ); ?></p>
										</header>
									</article>

								<?php endif; ?>

							</div>
						</div>
						

				</div>

			</div>

<?php get_footer(); ?>