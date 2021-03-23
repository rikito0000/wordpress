<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">
				<div id="inner-header" class="wrap cf">
					<?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
					if (  get_theme_mod( 'custom_logo' ) ) : ?>
					<p id="logo" class="h1 has-logo"><a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a></p>
					<p class="site-description"><a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php echo get_bloginfo ( 'description' ); ?></a></p>
					<?php else : ?>
					<p id="logo" class="h1"><a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>
					<p class="site-description"><a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php echo get_bloginfo ( 'description' ); ?></a></p>
					<?php endif; ?>
					

					<div class="social-icons">
			            <?php 
			            	if(function_exists('wpcontented_social_icons')):
			            		echo wpcontented_social_icons();
			            	endif;
			            ?>
	                </div> <!-- social -->

                	<div id="main-navigation">
			            <div class="clear"></div>
				        
			            <?php if ( is_active_sidebar( 'sidebar1' )): ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

						<?php else: ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>

						<div class="no-menu-widgets">
							<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'wp-contented' );  ?></p>
						</div>

						<?php endif; ?>
						<div class="margin-bottom"></div>
    				</div>
					<div class="side-nav" id="push"><span class="fa fa-bars"></span><span class="fa fa-times"></span></div>

				</div>

			</header>
