<?php get_header(); ?>

	<div id="content">
		
		<div id="inner-content" class=" cf">
				<?php

				$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'audio', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
				foreach ( $attachments as $k => $attachment ) :
				if ( $attachment->ID == $post->ID )
				break;
				endforeach;

				?>


				<header class="article-header full-top-area">

				<div class="bg-overlay"></div>

				</header> <?php // end article header ?>
				<div id="blog" class="divider-posted">
				<p class="byline vcard blog">

					<?php $source = wp_get_attachment_url( $attachment->ID); ?>
					<?php $attr = array(
					'src'      => $source,
					'loop'     => '',
					'autoplay' => '',
					'preload' => 'none'
					);
				echo wp_audio_shortcode( $attr ); ?>
                    <?php the_title(); ?> / <?php printf( __( 'Posted on <time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'wp-contented' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format'))  ); ?>
                    
        		</p>
        		</div>
				
			<!--<?php get_sidebar(); ?>-->

		</div>

	</div>

<?php get_footer(); ?>
