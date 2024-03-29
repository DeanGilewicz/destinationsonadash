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
	<!-- yeost seo -->
	<title><?php wp_title(''); ?></title>
	<!-- <title><?php wp_title('|', true, 'right'); bloginfo( 'name' )?></title> -->
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Pacifico|Oswald' />
    <link rel="stylesheet" type='text/css' href="<?= get_stylesheet_directory_uri(); ?>/dist/css/vendor/normalize.min.css" />
    <link rel="stylesheet" type='text/css' href="<?= get_stylesheet_directory_uri(); ?>/dist/css/vendor/foundation.min.css" />
    <link rel="stylesheet" type='text/css' href="<?= get_stylesheet_directory_uri(); ?>/dist/css/main.min.css" />
	<?php wp_head(); ?>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-92077314-1', 'auto');
		ga('send', 'pageview');

	</script>
</head>

<body <?php body_class(); ?>>

<?php

	$related_continent = '';

	$related_africa 		= has_term('africa', 'continents');
	$related_antarctica 	= has_term('antarctica', 'continents');
	$related_asia 			= has_term('asia', 'continents');
	$related_australia 		= has_term('australia', 'continents');
	$related_europe 		= has_term('europe', 'continents');
	$related_north_america 	= has_term('north-america', 'continents');
	$related_south_america 	= has_term('south-america', 'continents');

?>

<div id="page" class="site">
	<div class="site-inner">

		<!-- <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a> -->
		<header>

			<div class="row container_header_top">

				<div class="columns logo_stacked">

					<a href="/">
						<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/logo/DOD-stacked.png" alt="destinations on a dash logo" />
					</a>

				</div>

				<div class="columns">

					<div class="container_icons">

						<!-- <a href="/">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/icon-twitter.svg" alt="twitter icon"/>
						</a> -->

						<!-- <a href="/">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/icon-pinterest.svg" alt="pinterest icon"/>
						</a> -->

						<a href="https://www.facebook.com/destinationsonadash" target="_blank" rel="noopener noreferrer" title="facebook" class="icon_facebook">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/icon-facebook.svg" alt="facebook icon" />
						</a><!--

					 --><a href="https://www.instagram.com/destinationsonadash/" target="_blank" rel="noopener noreferrer" title="instagram" class="icon_instagram">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/icon-instagram.svg" alt="instagram icon" />
						</a><!--

					 --><span class="icon_search" title="search">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/icon-search.svg" alt="search icon" id="js-header-search-icon" />
						</span><!--

					 --><span id="js-hamburger" class="icon_hamburger">
							<span></span>
							<span></span>
							<span></span>
						</span><!--

					 --><a href="/about" class="icon_plane_nav" title="about">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/icon_plane.svg" class="icon_plane" alt="plane icon" />
						</a><!--

					 --><a href="/map" class="icon_globe_nav" title="map">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/icon_globe.svg" class="icon_globe" alt="globe icon" />
						</a>

					</div>

					<div class="columns logo_long">

						<a href="/">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/logo/DOD-long.png" alt="destinations on a dash logo" />
						</a>

					</div>

				</div>

			</div>

			<div class="row header_search">

				<div class="columns">

					<form role="search" method="GET" action="<?= esc_url( home_url( '/' ) ); ?>">
						<input id="header-search-field" type="search" placeholder="Search" value="<?= get_search_query(); ?>" name="s" title="Search For" />
					</form>

				</div>

			</div>

			<div class="row header_bottom">

				<ul class="small-12 columns container_sub_menu">

					<?php
					// print_r(get_bloginfo());
					// exit;
					?>

					<li class="sub_menu_about">
						<a href="/about">
							<div class="container_img">
								<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/icon_plane.svg" class="icon_plane" alt="plane icon" />
							</div><!--
							--><div class="container_title">
								<span>About</span>
							</div>
						</a>
					</li>

					<li class="sub_menu_map">
						<a href="/map">
							<div class="container_img">
								<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/icon_globe.svg" class="icon_globe" alt="globe icon" />
							</div><!--
							--><div class="container_title">
								<span>Map</span>
							</div>
						</a>
					</li>

					<!-- <li>
						<a href="/gallery">Gallery</a>
					</li> -->

					<li class="<?php if( $related_africa ) { echo 'active'; } ?>">
						<a href="/continent/africa">
							<div class="container_img">
								<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/africa.png" class="icon_africa" alt="african continent icon" />
							</div><!--
							--><div class="container_title">
								<span>Africa</span>
							</div>
						</a>
					</li><!--

				 --><li class="<?php if( $related_antarctica ) { echo 'active'; } ?>">
						<a href="/continent/antarctica">
							<div class="container_img">
								<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/antarctica.png" class="icon_antarctica" alt="antarctica continent icon" />
							</div><!--
							--><div class="container_title">
								<span>Antarctica</span>
							</div>
						</a>
					</li><!--

				 --><li class="<?php if( $related_asia ) { echo 'active'; } ?>">
						<a href="/continent/asia">
							<div class="container_img">
								<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/asia.png" class="icon_asia" alt="asia continent icon" />
							</div><!--
						 --><div class="container_title">
								<span>Asia</span>
							</div>
						</a>
					</li><!--

				 --><li class="<?php if( $related_australia ) { echo 'active'; } ?>">
						<a href="/continent/australia">
							<div class="container_img">
								<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/australia.png" class="icon_australia" alt="australia continent icon" />
							</div><!--
						 --><div class="container_title">
								<span>Australia</span>
							</div>
						</a>
					</li><!--

				 --><li class="<?php if( $related_europe ) { echo 'active'; } ?>">
						<a href="/continent/europe">
							<div class="container_img">
								<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/europe.png" class="icon_europe" alt="europe continent icon" />
							</div><!--
						 --><div class="container_title">
								<span>Europe</span>
							</div>
						</a>
					</li><!--

				 --><li class="<?php if( $related_north_america ) { echo 'active'; } ?>">
						<a href="/continent/north-america">
							<div class="container_img">
								<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/north_america.png" class="icon_north_america" alt="north american continent icon" />
							</div><!--
						 --><div class="container_title">
								<span>N. America</span>
							</div>
						</a>
					</li><!--

				 --><li class="<?php if( $related_south_america ) { echo 'active'; } ?>">
						<a href="/continent/south-america">
							<div class="container_img">
								<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/continents/south_america.png" class="icon_south_america" alt="south american continent icon" />
							</div><!--
						 --><div class="container_title">
								<span>S. America</span>
							</div>
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
