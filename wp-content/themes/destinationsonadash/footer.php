<?php
/**
	* The template for displaying the footer
	*
	* Contains the closing of the #content div and all content after
	*
	* @package WordPress
	* @subpackage DestinationsOnADash
	* @since DestinationsOnADash 1.0
*/

	// get 5 most popular posts (based on comments)

	$argsPopularPosts = array(
		'posts_per_page' => '5',
		'orderby' => 'comment_count'
	);

	$the_query_popular_posts = new WP_Query( $argsPopularPosts );


	// get the 5 most used tags (using the in built tag cloud)
	$tagArgs = array(
	    'smallest'                  => 10,
	    'largest'                   => 10,
	    'unit'                      => 'px',
	    'number'                    => 5,
	    'format'                    => 'flat',
	    'separator'                 => "\n",
	    'orderby'                   => 'count',
	    'order'                     => 'DESC',
	    'exclude'                   => '10', // exclude featured
	    'include'                   => null,
	    'topic_count_text_callback' => 'default_topic_count_text',
	    'link'                      => 'view',
	    'taxonomy'                  => 'post_tag',
	    'echo'                      => true
	);

?>

		</div><!-- .site-content -->

		<footer id="colophon" role="contentinfo">

			<div class="row container_footer_logo">
				<div class="footer_logo" style="background-image: url('<?= get_stylesheet_directory_uri(); ?>/dist/icons/logo/DOD-icon.png')"></div>
				<div class="small-6 medium-3 columns footer-area">
					<h6>Continents</h6>
					<a href="/continent/africa">Africa</a>
					<a href="/continent/antarctica">Antarctica</a>
					<a href="/continent/asia">Asia</a>
					<a href="/continent/australia">Australia</a>
					<a href="/continent/europe">Europe</a>
					<a href="/continent/north-america">North America</a>
					<a href="/continent/south-america">South America</a>
				</div>

				<div class="small-6 medium-3 columns footer-area">
					<h6>Categories</h6>
					<a href="/trips">Trips</a>
					<a href="/insights">Insights</a>
					<a href="/eating_ethnic">Eating Ethnic</a>
					<a href="/favorites">Favs</a>
				</div>

				<div class="small-6 medium-3 columns footer-area">
					<?php if ( $the_query_popular_posts->have_posts() ) : ?>

						<h6>Popular Posts</h6>

						<?php while ( $the_query_popular_posts->have_posts() ) : $the_query_popular_posts->the_post(); ?>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php endwhile; ?>

					<?php endif; ?>
				
					<?php wp_reset_postdata(); ?>

				</div>

				<div class="small-6 medium-3 columns footer-area">
					
					<h6>Popular Tags</h6>
					
					<?php wp_tag_cloud($tagArgs); ?>

				</div>

			</div>


			<?php // if ( has_nav_menu( 'primary' ) ) : ?>
				<!-- <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>"> -->
					<?php
						// wp_nav_menu( array(
						// 	'theme_location' => 'primary',
						// 	'menu_class'     => 'primary-menu',
						//  ) );
					?>
				<!-- </nav> --><!-- .main-navigation -->
			<?php // endif; ?>

			<?php // if ( has_nav_menu( 'social' ) ) : ?>
				<!-- <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>"> -->
					<?php
						// wp_nav_menu( array(
						// 	'theme_location' => 'social',
						// 	'menu_class'     => 'social-links-menu',
						// 	'depth'          => 1,
						// 	'link_before'    => '<span class="screen-reader-text">',
						// 	'link_after'     => '</span>',
						// ) );
					?>
				<!-- </nav> --><!-- .social-navigation -->
			<?php // endif; ?>

			<!-- <div class="site-info"> -->
				<?php
					/**
					 * Fires before the twentysixteen footer text for footer customization.
					 *
					 * @since Twenty Sixteen 1.0
					 */
					// do_action( 'twentysixteen_credits' );
				?>
				<!-- <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span> -->
				<!-- <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentysixteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentysixteen' ), 'WordPress' ); ?></a> -->
			<!-- </div> --><!-- .site-info -->
		</footer><!-- .site-footer -->

	</div><!-- .site-inner -->
</div><!-- .site -->

<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/vendor/fastclick.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/vendor/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/main.min.js"></script>

<?php wp_footer(); ?>
</body>
</html>
