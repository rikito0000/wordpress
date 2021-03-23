<?php get_header(); ?>

			<div id="content">
				
				<div id="inner-content" class=" cf">
						<?php 
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0];
							$image_full = wpcontented_catch_that_image(); 
							$gallery_full = wpcontented_catch_gallery_image_full(); 
						?>

						<?php if ( has_post_thumbnail()): ?>
							<header class="article-header full-top-area" style="background-image:url('<?php echo esc_url($thumb_url); ?>');background-size:cover;background-position:center;position:relative;">
						
						<?php elseif(has_post_format('gallery') && !empty($gallery_full)): ?>
						    <header class="article-header full-top-area" style="background-image:url('<?php echo esc_url($gallery_full); ?>');background-size:cover;background-position:center;position:relative;">
						
						<?php elseif(has_post_format('image') && !empty($image_full)): ?>
							<header class="article-header full-top-area" style="background-image:url('<?php echo esc_url($image_full); ?>');background-size:cover;background-position:center;position:relative;">
						
						<?php else: ?>	
							<header class="article-header full-top-area">
						<?php endif; ?>

								<div class="bg-overlay"></div>

								<div class="title-wrap">
									<div class="wrap title-wrap-inner">
										<h1 class="entry-title single-title"><?php the_title(); ?></h1>
										<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
											<div class="date">
												<?php _e('By ','wp-contented'); ?><?php the_author_posts_link(); ?><?php printf( __( ' / <span>%2$s</span> / ', 'wp-contented' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format'))); ?><?php $category_list = get_the_category_list( __( ', ', 'wp-contented' ) ); printf( '%s', $category_list); ?>
											</div>
										<?php endwhile; ?><?php endif; ?> 
										<?php wp_reset_postdata(); ?>
									</div>
								</div>
							</header> <?php // end article header ?>
               	</div>					
			</div>

				<div class="wrap cf post-content-single">
					<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
							<?php get_template_part( 'post-formats/format', get_post_format() ); ?>

							<?php if ( get_theme_mod('wpcontented_author_bio') ):
			                    $author_class = 'author-hide';
			                    else:
			                    $author_class = '';
			                    endif;
                			?>

			                <?php if ( get_theme_mod('wpcontented_related_posts') ):
			                     $related_class = 'related-hide';
			                    else :
			                    $related_class = '';
			                    endif;
			                ?>

			                <?php if ( get_theme_mod('wpcontented_post_widget_area') ):
			                    $widget_class = 'widget-hide';
			                    else :
			                    $widget_class = '';
			                    endif;
			                ?>

		               <div class="next-prev-post">
			                  <div class="prev">
			                    <?php previous_post_link('<span>'. __('PREVIOUS POST','wp-contented') . '</span> &larr; %link'); ?>
			                  </div>
			                  <div class="next">
			                  <?php next_post_link('<span>'. __('NEXT POST','wp-contented') . '</span> %link &rarr;'); ?>
			                  </div>
			                  <div class="clear"></div>
		                </div> <!-- next-prev-post -->

		                <div class="after-content-area <?php echo esc_attr( $widget_class ); ?>">
			                <footer class="article-footer <?php echo esc_attr( $author_class ); ?>">
			                  <h3 class="section-title"><?php _e('About Author ','wp-contented'); ?></h3>
			                  <div class="avatar">
			                  	<?php echo get_avatar( get_the_author_meta( 'ID' ) , 150 ); ?>
			                  </div>
			                  <div class="info">
				                  <p class="author"><?php the_author(); ?></p>
				                  <p class="author-desc"> 
				                  	<?php if (function_exists('wpcontented_author_excerpt')): 
				                  		echo wpcontented_author_excerpt(); 
				                  	endif; ?> 
				                  </p>
			                  </div>
			                  <div class="clear"></div>
			                </footer> <?php // end article footer ?>

		                	<?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID) ) ); ?>
		                    <?php if (!empty($related)): ?>
			                    <div class="related posts <?php echo esc_attr( $related_class ); ?>">
				                    <h3 class="section-title"><?php _e('Related Posts ','wp-contented'); ?></h3>
				                    <ul> 
					                    <?php if( $related ): foreach( $related as $post ) { ?>
					                    <?php setup_postdata($post); ?>

					                            <li>
					                              <div class="related-image">
						                              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
						                                <?php $image_thumb = wpcontented_catch_that_image_thumb(); $gallery_thumb = wpcontented_catch_gallery_image_thumb(); 
						                                if ( has_post_thumbnail()):
						                                	the_post_thumbnail('thumb-image-300by300');  
						                                elseif(has_post_format('gallery') && !empty($gallery_thumb)): 
						                                	echo $gallery_thumb; 
						                                elseif(has_post_format('image') && !empty($image_thumb)): 
						                                	echo $image_thumb; 
						                                else: ?>
						                                <?php $blank = IMAGES . '/blank.jpg'; ?>
						                                <img src="<?php echo esc_url($blank); ?>">
						                                <?php endif; ?>
						                              </a>
					                              </div>

					                              <div class="related-info">
					                                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					                                  <?php echo wpcontented_excerpt(40); ?>
					                              </div>
					                               
					                            </li>
					                    
					                    		<?php } endif; wp_reset_postdata(); ?>
					                     		
				                      </ul>
				                      <div class="clear"></div>

			                     </div>
		                     	<?php endif; ?>
		               

		                		<?php comments_template(); ?>

		             	</div>

						<div class="sidebar-area <?php echo esc_attr( $widget_class ); ?>">
							<?php if ( is_active_sidebar( 'sidebar3' )): ?>
								<div class="sidebar">
									<?php dynamic_sidebar( 'sidebar3' ); ?>
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

              		</article> <?php // end article ?>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'wp-contented' ); ?></h1>
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'wp-contented' ); ?></p>
									</header>
							</article>

						<?php endif; ?>

					</div>

				</div>



<?php get_footer(); ?>