<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<!-- <meta charset="utf-8" /> -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="profile" href="http://gmpg.org/xfn/11"> -->
	<?php // if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<!-- <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> -->
	<?php // endif; ?>

	<title><?php wp_title('|', true, 'right'); bloginfo( 'name' )?></title>
    <!-- <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Pacifico|Oswald' /> -->
    <link rel="stylesheet" type='text/css' href="<?= get_stylesheet_directory_uri(); ?>/dist/css/vendor/normalize.min.css" />
    <link rel="stylesheet" type='text/css' href="<?= get_stylesheet_directory_uri(); ?>/dist/css/vendor/foundation.min.css" />
    <link rel="stylesheet" type='text/css' href="<?= get_stylesheet_directory_uri(); ?>/dist/css/main.min.css" />
    <!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/vendor/modernizr.js"></script> -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<div class="site-inner">

		<!-- <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a> -->
		<header>

			<div class="row header-top">

				<div class="medium-6 columns">

					<a href="/">Julies Journeys</a>

				</div>

				<div class="medium-6 columns">

					<a href="/about">About</a> 

					<a href="/gallery">Gallery</a>

					<a href="/map">Map</a>

					<a href="">F</a>

					<form role="search" method="GET" id="header-search-form" action="<?= esc_url( home_url( '/' ) ); ?>">
						<input id="header-search-field" type="search" placeholder="Search" value="<?= get_search_query(); ?>" name="s" title="Search For" />
						<!-- <button type="submit" id="header-search-submit">
							<img src="http://placehold.it/15x15?text=i" />
						</button> -->
						<span id="header-search-icon">
							<img src="http://placehold.it/12x12?text=i" />
						</span>
					</form>

				</div>

			</div>

			<div class="row header-bottom">

				<ul class="small-12 columns header-continents">

					<?php 
					// print_r(get_bloginfo());
					// exit;
					?>
					<li class="active <?php // if match page then give active class ?>">
						<a href="/continent/africa">
							<span>Africa</span>
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/africa.png" class="icon_africa" />
							<span>Go</span>
						</a>
					</li>

					<li class="<?php // if match page then give active class ?>">
						<a href="/continent/antarctica">
							<span>Antarctica</span>
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/antarctica.png" class="icon_antarctica" />
							<span>Go</span>
						</a>
					</li>

					<li class="<?php // if match page then give active class ?>">
						<a href="/continent/asia">
							<span>Asia</span>
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/asia.png" class="icon_asia" />
							<span>Go</span>
						</a>
					</li>

					<li class="<?php // if match page then give active class ?>">
						<a href="/continent/australia">
							<span>Australia</span>
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/australia.png" class="icon_australia" />
							<span>Go</span>
						</a>
					</li>

					<li class="<?php // if match page then give active class ?>">
						<a href="/continent/europe">
							<span>Europe</span>
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/europe.png" class="icon_europe" />
							<span>Go</span>
						</a>
					</li>

					<li class="<?php // if match page then give active class ?>">
						<a href="/continent/north-america">
							<span class="text_long">N. America</span>
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/north_america.png" class="icon_north_america" />
							<span>Go</span>
						</a>
					</li>

					<li class="<?php // if match page then give active class ?>">
						<a href="/continent/south-america">
							<span class="text_long">S. America</span>
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/south_america.png" class="icon_south_america" />
							<span>Go</span>
						</a>
					</li>

				</ul>

			</div>
		<!-- <header id="masthead" class="site-header" role="banner"> -->
			<!-- <div class="site-header-main"> -->
				<!-- <div class="site-branding"> -->
					<?php // if ( is_front_page() && is_home() ) : ?>
						<!-- <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> -->
					<?php // else : ?>
						<!-- <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p> -->
					<?php // endif;

					// $description = get_bloginfo( 'description', 'display' );
					// if ( // $description || is_customize_preview() ) : ?>
						<!-- <p class="site-description"><?php echo $description; ?></p> -->
					<?php // endif; ?>
				<!-- </div> --><!-- .site-branding -->

				<?php //if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
					<!-- <button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'twentysixteen' ); ?></button> -->

					<!-- <div id="site-header-menu" class="site-header-menu"> -->
						<?php // if ( has_nav_menu( 'primary' ) ) : ?>
							<!-- <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>"> -->
								<?php
									// wp_nav_menu( array(
									// 	'theme_location' => 'primary',
									// 	'menu_class'     => 'primary-menu',
									//  ) );
								?>
							<!-- </nav> --><!-- .main-navigation -->
						<?php // endif; ?>

						<?php // if ( has_nav_menu( 'social' ) ) : ?>
							<!-- <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentysixteen' ); ?>"> -->
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
					<!-- </div> --><!-- .site-header-menu -->
				<?php // endif; ?>
			<!-- </div> --><!-- .site-header-main -->

			<?php // if ( get_header_image() ) : ?>
				<?php
					/**
					 * Filter the default twentysixteen custom header sizes attribute.
					 *
					 * @since Twenty Sixteen 1.0
					 *
					 * @param string $custom_header_sizes sizes attribute
					 * for Custom Header. Default '(max-width: 709px) 85vw,
					 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
					 */
					// $custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
				<!-- <div class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a> -->
				<!-- </div> --><!-- .header-image -->
			<?php // endif; // End header image check. ?>

		</header><!-- .site-header -->

		<div id="content" class="site-content">
