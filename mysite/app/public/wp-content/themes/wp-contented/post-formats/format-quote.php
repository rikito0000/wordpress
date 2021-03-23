<section class="entry-content cf" itemprop="articleBody">
  <?php if( class_exists('acf') ) : ?>
    <blockquote>
    <p class="quote-content"><?php echo get_field('wpdevshed_post_format_quote_content'); ?></p>
    <p class="quote-source">-<?php echo get_field('wpdevshed_post_format_quote_source'); ?></p>
    </blockquote>
  <?php endif; ?>
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