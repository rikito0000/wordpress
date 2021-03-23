			<footer class="footer" role="contentinfo">
				<div id="inner-footer" class="wrap cf">

					<p class="source-org copyright">
						 &#169; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> 
						<span><?php if(is_home()): ?>
						<?php _e('Made using ','wp-contented'); ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wp-contented' ) ); ?>" target="_blank"><?php printf( '%s', 'WordPress' ); ?></a> and <a href="<?php echo esc_url( __( 'https://wordpress.org/themes/wp-contented/', 'wp-contented' ) ); ?>" target="_blank"><?php printf( '%s' , 'Wp Contented' ); ?></a>
						<?php endif; ?>
						</span>
					</p>

				</div>

			</footer>


		<a href="#" class="scrollToTop"><span class="fa fa-caret-square-o-up"></span><?php _e('Back to Top','wp-contented'); ?></a>
		<?php wp_footer(); ?>
	</body>

</html> <!-- end of site. what a ride! -->