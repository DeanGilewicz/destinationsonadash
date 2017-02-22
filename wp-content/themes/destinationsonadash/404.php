<?php
/**
	* The template for displaying 404 pages (not found)
	* @package WordPress
	* @subpackage DestinationsOnADash
	* @since DestinationsOnADash 1.0
*/

?>

<?php get_header(); ?>

	<div id="primary" class="content-area error-404 not-found">
		<main id="main" class="site-main" role="main">

			<div class="row">
				<div class="columns">

					<h1 class="page-title">Nothing to see here!</h1>

					<p class="no-results-message"><?php _e( 'Oh no, there isn\'t anything at this location. Maybe try a search?', 'destinationsonadash' ); ?></p>

					<?php get_search_form(); ?>

				</div>
			</div>

		</main>
	</div>

<?php get_footer(); ?>
