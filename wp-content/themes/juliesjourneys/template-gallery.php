<?php
/**
 * Template Name: Gallery Template
 * The template for displaying page gallery
 *
 * @package WordPress
 * @subpackage Julies_Journeys
 * @since Julies Journeys 1.0
 *
 */
?>

<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="row">
			<div class="small-12 columns">

				<?php

					while ( have_posts() ) : the_post(); // Start the loop.

						// Include the page content template.
						// get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						// if ( comments_open() || get_comments_number() ) {
						// 	comments_template();
						// }

						the_content(); // CONTENT SHOWS THE GALLERY

						// $gallery = get_post_gallery( get_the_ID(), false );
						// $galleryImageIds = explode(",", $gallery['ids']);

					endwhile; // End of the loop.

				?>

				<div class="lightbox">

					<div class="lightbox-overlay"></div>

					<div class="lightbox-content">

						<div class="container-lightbox-content">

							<img src="" />

							<div class="lightbox-interaction">
						
								<div class="area-one">
									<span class="previous" style="background-image:url('<?= get_stylesheet_directory_uri(); ?>/dist/icons/icon-arrow-left.svg');"></span>
									<span class="image-comment"></span>
									<span class="next" style="background-image:url('<?= get_stylesheet_directory_uri(); ?>/dist/icons/icon-arrow-right.svg');"></span>
								</div>
								
								<div class="lightbox-x-close button">Close</div>

							</div>

						</div>

					</div>

				</div>

			</div>
		</div>

	</main><!-- .site-main -->

	<?php // get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
