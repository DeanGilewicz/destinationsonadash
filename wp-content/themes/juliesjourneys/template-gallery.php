<?php
/**
 * Template Name: Gallery Page
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

		<?php
 
			$args = array(
			    'numberposts' => -1, // Using -1 loads all posts
			    'orderby' => 'menu_order', // This ensures images are in the order set in the page media manager
			    'order'=> 'ASC',
			    'post_mime_type' => 'image', // Make sure it doesn't pull other resources, like videos
			    'post_parent' => $post->ID, // Important part - ensures the associated images are loaded
			    'post_status' => null,
			    'post_type' => 'attachment'
			);
			 
			$images = get_children( $args );

		?>
			
		<?php if( $images) : ?>

			<div id="slider">
				<?php foreach( $images as $image ) : ?>
					<img src="<?php echo $image->guid; ?>" alt="<?php echo $image->post_title; ?>" title="<?php echo $image->post_title; ?>" />
				<?php endforeach; ?>
			</div>

		<?php endif; ?>
		
	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
