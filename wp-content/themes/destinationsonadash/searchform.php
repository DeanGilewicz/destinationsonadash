<?php
/**
 * Template for displaying search forms in DestinationsOnADash
 *
 * @package WordPress
 * @subpackage DestinationsOnADash
 * @since DestinationsOnADash 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<!-- <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'destinationsonadash' ); ?></span> -->
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'destinationsonadash' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'destinationsonadash' ); ?>" />
	</label>
	<button type="submit" class="search-submit button">
		<span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'destinationsonadash' ); ?></span>
	</button>
</form>
