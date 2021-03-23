<section class="entry-content cf" itemprop="articleBody">
  <?php if( class_exists('acf') ) : ?>
    <?php $audio = get_field('wpdevshed_post_format_audio_content') ?>
    <?php $attr = array(
    'src'      => $audio,
    'loop'     => '',
    'autoplay' => '',
    'preload' => 'none'
    );
    echo wp_audio_shortcode( $attr ); 
    endif; ?>
  <?php

  the_content();


  wp_link_pages( array(
  'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wp-contented' ) . '</span>',
  'after'       => '</div>',
  'link_before' => '<span>',
  'link_after'  => '</span>',
  ) );

  ?>
  <?php if(has_tag()): ?>
    <div class="tag-links">
      <div class="clear"></div>
      <?php _e('TAGS: ','wp-contented'); ?>
      <?php echo get_the_tag_list('',',','');?>
    </div>
  <?php endif; ?>
</section> <?php // end article section ?>
