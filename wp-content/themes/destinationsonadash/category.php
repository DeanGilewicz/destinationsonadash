<?php
/**
 * The template for displaying /category/[category name]
 *
 * @package WordPress
 * @subpackage DestinationsOnADash
 * @since DestinationsOnADash 1.0
 */

get_header(); ?>

<!-- <div id="primary" class="content-area"> -->
	<!-- <main id="main" class="site-main" role="main"> -->
		<?php
		// Start the loop.
		$counter = 1;
		while ( have_posts() ) : the_post();

			echo 'this is ' . $counter;

			// Include the page content template.
			// get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) {
				// comments_template();
			// }
			$counter++;
			// End of the loop.
		endwhile;
		?>

	<!-- </main> --><!-- .site-main -->

	<?php // get_sidebar( 'content-bottom' ); ?>

<!-- </div> --><!-- .content-area -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
