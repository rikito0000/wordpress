<?php $thumb_id = get_post_thumbnail_id(); $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true); $thumb_url = $thumb_url_array[0];  ?>
<div class="the-post-image" style="background:url(<?php echo $thumb_url; ?>)no-repeat;background-size:cover;background-position:center;">
<div class="status-content">
	<div class="table">
		<div class="table-cell">
			<?php if( class_exists('acf') ): ?> 
				<p><?php echo get_field('wpdevshed_post_format_status_content'); ?></p> 
			<?php endif; ?>
			<div class="date"><?php _e('By ','wp-contented'); ?><?php esc_url(the_author_posts_link()); ?><?php printf( __( ' / <span>%2$s</span> / ', 'wp-contented' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format'))); ?><?php $category_list = get_the_category_list( __( ', ', 'wp-contented' ) ); printf('%s', $category_list); ?></div>
		</div>
	</div>
</div>
<div class="bg-overlay"></div>
</div>