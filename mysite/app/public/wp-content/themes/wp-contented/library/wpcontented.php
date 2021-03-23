<?php

// remove WP version from scripts
function wpcontented_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

// remove injected CSS for recent comments widget
function wpcontented_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function wpcontented_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function wpcontented_scripts_and_styles() {

  global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

		// modernizr (without media query polyfill)
		wp_register_script( 'wpcontented-modernizr', get_template_directory_uri() . '/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

		// register main stylesheet
		wp_register_style( 'wpcontented-main-stylesheet', get_template_directory_uri() . '/style.css', array(), '', 'all' );
		wp_register_style( 'wpcontented-stylesheet', get_template_directory_uri() . '/library/css/style.min.css', array(), '', 'all' );
		wp_register_style( 'wpcontented-scroll-style', get_template_directory_uri() . '/library/css/jquery.mCustomScrollbar.css', array(), '', 'all' );
		wp_register_style( 'wpcontented-font', get_template_directory_uri() . '/css/font-awesome.css', array(), '', 'all' );
		// ie-only style sheet
		wp_register_style( 'wpcontented-ie-only', get_template_directory_uri() . '/library/css/ie.css', array(), '' );

	    // comment reply script for threaded comments
	    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			  wp_enqueue_script( 'comment-reply' );
	    }

		//adding scripts file in the footer
		wp_register_script( 'wpcontented-js', get_template_directory_uri() . '/library/js/scripts.js', array(), '', true );

		wp_register_script( 'imagesloaded', get_template_directory_uri() . '/library/js/imagesloaded.pkgd.min.js', array(), '', true);
		wp_register_script( 'wpcontented-scroll-js', get_template_directory_uri() . '/library/js/jquery.mCustomScrollbar.concat.min.js', array(), '', true);
		wp_register_script( 'cycle2', get_template_directory_uri() . '/library/js/jquery.cycle2.min.js', array(), '', true );
		wp_register_script( 'cycle2_tile', get_template_directory_uri() . '/library/js/jquery.cycle2.tile.min.js' , array(), '', true);
		wp_register_script( 'cycle2_shuffle', get_template_directory_uri() . '/library/js/jquery.cycle2.shuffle.min.js', array(), '', true );
		wp_register_script( 'cycle2_scrollvert', get_template_directory_uri() . '/library/js/jquery.cycle2.scrollVert.min.js', array(), '', true );
		wp_register_script( 'wpcontented_infinite_scroll', get_template_directory_uri() . '/library/js/jquery.ias.min.js', array(), '', true );
		wp_register_script( 'wpcontented-scripts-home', get_template_directory_uri() . '/library/js/scripts-home.js', array(), '', true );
		// enqueue styles and scripts
		wp_enqueue_style( 'wpcontented-main-stylesheet' );
		wp_enqueue_style( 'wpcontented-stylesheet' );
		wp_enqueue_style( 'wpcontented-scroll-style' );
		wp_enqueue_style( 'wpcontented-font' );
		wp_enqueue_style( 'wpcontented-ie-only' );
		wp_enqueue_script( 'jquery-effects-core ');
		wp_enqueue_script( 'jquery-effects-slide');
		wp_enqueue_script( 'wpcontented-scroll-js' );

		if( is_home() || is_front_page() || is_archive() || is_search() ){  //Is the plugin active?
			wp_enqueue_script( 'wpcontented_infinite_scroll' );
			wp_enqueue_script( 'wp-contented-audio', get_template_directory_uri() . '/js/audio.min.js' , false, false, true);
			wp_enqueue_script( 'wpcontented-audio-2', get_template_directory_uri() . '/library/js/audio.js', array(), '', true );
		}

		wp_enqueue_script( 'wpcontented-js' );

		if ( is_home() && get_theme_mod('wpcontented_slider_area') == '' ){
		wp_enqueue_script( 'imagesloaded' );
		wp_enqueue_script( 'cycle2' );
		wp_enqueue_script( 'cycle2_tile' );
		wp_enqueue_script( 'cycle2_shuffle' );
		wp_enqueue_script( 'cycle2_scrollvert' );
		wp_enqueue_script( 'wpcontented-scripts-home' );
		}

		$wp_styles->add_data( 'wpcontented-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

		
}
/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function wpcontented_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );
	add_editor_style(get_template_directory_uri(). '/library/css/editor-style.css');
	// default thumb size
	set_post_thumbnail_size(125, 125, true);
	add_theme_support( 'custom-header' );
	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',    // background image default
	    'default-color' => 'E3E3E3',    // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// adding post format support
	add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );

} /* end wpcontented theme support */


/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using wpcontented_related_posts(); )
function wpcontented_related_posts() {
	echo '<ul id="wpcontented-related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) {
			$tag_arr = "";
			$tag_arr .= $tag->slug . ',';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
				<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; }
		else { ?>
			<?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'wp-contented' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_postdata();
	echo '</ul>';
} /* end wpcontented related posts function */

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function wpcontented_page_navi() {
  global $wp_query, $paged;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  echo '<nav class="pagination">';
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => '<i class="fa fa-chevron-left"></i>',
    'next_text'    => '<i class="fa fa-chevron-right"></i>',
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3
  ) );
  echo '</nav>';
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function wpcontented_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function wpcontented_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a class="excerpt-read-more" href="'. esc_url(get_permalink($post->ID),'wp-contented') . '" title="'. __( 'Read ', 'wp-contented' ) . get_the_title($post->ID).'">'. __( '[read more]', 'wp-contented' ) .'</a>';
}


/*video*/

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_video',
		'title' => 'Video',
		'fields' => array (
			array (
				'key' => 'field_542906321cdab',
				'label' => __('Embed Video','wp-contented'),
				'name' => 'wpdevshed_post_format_embed_video',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'video',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

/*link*/
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_link',
		'title' => 'Link',
		'fields' => array (
			array (
				'key' => 'field_54290c22892fe',
				'label' => __('Link','wp-contented'),
				'name' => 'wpdevshed_post_format_link_url',
				'type' => 'text',
				'instructions' => 'place url here',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'link',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

/*quote*/
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_quote',
		'title' => 'Quote',
		'fields' => array (
			array (
				'key' => 'field_5428fc13708c4',
				'label' => __('Quote Content','wp-contented'),
				'name' => 'wpdevshed_post_format_quote_content',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_5428fc4e3e3fc',
				'label' => 'Quote Source',
				'name' => 'wpdevshed_post_format_quote_source',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'quote',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_audio',
		'title' => 'Audio',
		'fields' => array (
			array (
				'key' => 'field_542a4c44cc3c2',
				'label' => __('Upload Audio File Here','wp-contented'),
				'name' => 'wpdevshed_post_format_audio_content',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'audio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_status',
		'title' => 'Status',
		'fields' => array (
			array (
				'key' => 'field_542a5b07626a0',
				'label' => __('Insert Short Status Here','wp-contented'),
				'name' => 'wpdevshed_post_format_status_content',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'status',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_chat',
		'title' => 'Chat',
		'fields' => array (
			array (
				'key' => 'field_542a5d28507df',
				'label' => __('Insert Chat Conversation here','wp-contented'),
				'name' => 'wpdevshed_post_format_chat_content',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'chat',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}