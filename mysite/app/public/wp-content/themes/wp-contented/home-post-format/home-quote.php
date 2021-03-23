<div class="the-post-image">
	<span class="fa fa-quote-right"></span>
	<?php if ( has_post_thumbnail()):
		echo the_post_thumbnail('wpcontented-home-1000'); else: ?>
		<div class="no-featured-image">
			<div class="table">
				<div class="table-cell">
					<?php _e('No Featured Image','wp-contented'); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>

<div class="item-description">
	<div class="the-post-title">
		<h2>
			<a href="<?php the_permalink(); ?>">
			<?php if( class_exists('acf') ):
				echo get_field('wpdevshed_post_format_quote_content'); 
			else: the_title(); endif; ?>
			</a>
		</h2>

		<?php if( class_exists('acf') && get_field('wpdevshed_post_format_quote_source')) : ?> 
			<p class="quote-source"> - <?php echo get_field('wpdevshed_post_format_quote_source'); ?> </p> 
		<?php else: ?>
			<div class="date">
				<?php _e('By ','wp-contented'); ?><?php esc_url(the_author_posts_link()); ?><?php printf( __( ' / <span>%2$s</span> / ', 'wp-contented' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format'))); ?><?php $category_list = get_the_category_list( __( ', ', 'wp-contented' ) ); printf('%s', $category_list); ?>
			</div>
		<?php endif; ?> 
	</div>
	<div class="excerpt"><?php the_excerpt(); ?></div>
</div>