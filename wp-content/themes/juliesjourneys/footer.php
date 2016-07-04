<?php
/**
	* The template for displaying the footer
	*
	* Contains the closing of the #content div and all content after
	*
	* @package WordPress
	* @subpackage Julies_Journeys
	* @since JuliesJourneys 1.0
*/

// get 5 most popular posts (by comments)

	$argsPopularPosts = array(
		'posts_per_page' => '5',
		// 'orderby' => 'comments'
	);

	$the_query_popular_posts = new WP_Query( $argsPopularPosts );

// TODO: get 5 most popular tags (by number of mentions for tag)

	$argsPopularTags = array(
		// 'taxonomy' => 'post_tag',
		'posts_per_page' => '5',
		// 'category_name' => 'post_tag',
		// 'orderby' => 'name'
		// 'tax_query' => array(
		// 	array(
		// 		'taxonomy' => 'post_tag'
		// 	)
		// )
	);

	$the_query_popular_tags = new WP_Query( $argsPopularTags );

?>

		</div><!-- .site-content -->

		<footer id="colophon" role="contentinfo">
			
			<div class="row">

				<div class="small-6 medium-3 columns footer-area">
					<h6>Continents</h6>
					<a href="/continent/africa" class="active">Africa</a>
					<a href="/continent/antarctica">Antarctica</a>
					<a href="/continent/asia">Asia</a>
					<a href="/continent/australia">Australia</a>
					<a href="/continent/europe">Europe</a>
					<a href="/continent/north-america">North America</a>
					<a href="/continent/south-america">South America</a>
				</div>

				<div class="small-6 medium-3 columns footer-area">
					<h6>Categories</h6>
					<a href="/trips">trips</a>
					<a href="/insights">insights</a>
					<a href="/eating_ethnic">eating ethnic</a>
					<a href="/favorites">favs</a>
				</div>

			</div>

			<div class="row">

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
					<?php if ( $the_query_popular_tags->have_posts() ) : ?>

						<h6>Popular Tags</h6>

						<?php while ( $the_query_popular_tags->have_posts() ) : $the_query_popular_tags->the_post(); ?>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php endwhile; ?>

					<?php endif; ?>
				
					<?php wp_reset_postdata(); ?>
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
