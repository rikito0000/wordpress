<?php get_header(); ?>

	<div id="content">
		<div id="inner-content" class=" cf">
			
		<div class="wrap">	
		<ul class="blog-list" id="blog">
			<?php if (is_category()) : ?>
						<h1 class="archive-title h2">
							<?php single_cat_title(); ?>
						</h1>

					<?php elseif (is_tag()): ?>
						<h1 class="archive-title h2">
							<?php single_tag_title(); ?>
						</h1>

					<?php elseif (is_author()):
						global $post;
						$author_id = $post->post_author;
					?>
						<h1 class="archive-title h2">

							<?php the_author_meta('display_name', $author_id); ?>

						</h1>
					<?php elseif (is_day()): ?>
						<h1 class="archive-title h2">
							<?php the_time(get_option('date_format')); ?>
						</h1>

					<?php elseif (is_month()): ?>
							<h1 class="archive-title h2">
								 <?php the_time(get_option('date_format')); ?>
							</h1>

					<?php elseif (is_year()): ?>
							<h1 class="archive-title h2">
								<?php the_time(get_option('date_format')); ?>
							</h1>
					<?php endif; ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<?php if(has_post_format('status')): ?>
  				<li class="item status-format">
  				<?php else: ?>
				<li class="item">
				<?php endif; ?>
				<?php get_template_part( 'home-post-format/home', get_post_format() ); ?>
				</li>
  				<?php endwhile;  ?>
  				<?php else: ?>
  				<h3><?php _e( 'Oops, Post Not Found!', 'wp-contented' ); ?></h3>
				<p><?php _e( 'Apologies, but no entries were found.', 'wp-contented' ); ?></p>
  				<?php wp_reset_postdata(); ?>
  				<div class="pagination">
					<?php next_posts_link( __('Older Entries','wp-contented'),'' ); ?>
				</div>
  				<?php endif; ?>

		</ul>
		<div class="sidebar-area">
		<?php if ( is_active_sidebar( 'sidebar5' )): ?>
				<div class="sidebar">
				<?php dynamic_sidebar( 'sidebar5' ); ?>
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
		

		</div>

	</div>

<?php get_footer(); ?>
