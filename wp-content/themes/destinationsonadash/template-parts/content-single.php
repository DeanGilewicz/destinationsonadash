<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage DestinationsOnADash
 * @since DestinationsOnADash 1.0
 */

// Advanced Custom Fields
$trip_date = get_field('trip_date');
$trip_duration = get_field('trip_duration');
$galleryImgs = get_field('images');
// echo '<pre>';
// print_r($galleryImgs);
// exit;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // twentysixteen_excerpt(); ?>

	<?php // twentysixteen_post_thumbnail(); ?>

	<?php 
		$postType = get_post_type_object(get_post_type());
	?>

	<div class="content-area post-single">
		
		<div class="row">

			<div class="small-12 columns">
				
				<div class="post-meta-single-category">
					<a href="/<?= $postType->labels->name; ?>"><?= $postType->labels->name; ?></a>
				</div>
				<div class="post-meta-single-title">
					<a href="<?php the_permalink(); ?>" class="post-title">
						<h2><?php the_title(); ?></h2>
					</a>
				</div>
			
			</div>

		</div>

		<div class="row">
			<div class="small-12 columns">
				<div class="container_custom_post_meta">
					<?php if( $trip_date ): ?>
						<span class="post-meta-trip-date"><span>Trip Date:</span> <?php echo $trip_date; ?></span>
					<?php endif; ?>
					<?php if( $trip_duration ): ?>
						<span class="post-meta-trip-duration"><span>Trip Duration:</span> <?php echo $trip_duration; ?> days</span>
					<?php endif; ?>
					<span class="post-meta-date"><span>Posted On:</span> <?php the_date('M j, Y'); ?></span>
				</div>
			</div>
		</div>

		<div class="row container_content">
			<div class="small-12 columns">
				<?php the_content(); ?>
			</div>
		</div>	

		<?php
			// wp_link_pages( array(
			// 	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
			// 	'after'       => '</div>',
			// 	'link_before' => '<span>',
			// 	'link_after'  => '</span>',
			// 	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
			// 	'separator'   => '<span class="screen-reader-text">, </span>',
			// ) );

			// if ( '' !== get_the_author_meta( 'description' ) ) {
			// 	get_template_part( 'template-parts/biography' );
			// }
		?>

	</div><!-- .entry-content -->

	<div class="row entry-footer">
		<div class="medium-12 columns">
		<?php 
			
			// Get current page URL 
			$doadURL = urlencode( get_permalink() );
	 
			// Get current page title
			$doadTitle = str_replace( ' ', '%20', get_the_title() );
					 
			// Construct sharing URL without using any script
			$twitterURL  = 'https://twitter.com/intent/tweet?text='.$doadTitle.'&amp;url='.$doadURL.'&amp;via=doad';
			$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$doadURL;
	 		 
			// Create sharing buttons
			$socialLinks  = '';
			$socialLinks .= '<div class="container_social_share">';
			$socialLinks .= '<h4>share on</h4> <a class="social_link social_twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
			$socialLinks .= '<a class="social_link social_facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
			$socialLinks .= '</div>';
			
			// Display in template
			echo $socialLinks; 
		?>
		</div>
		<div class="medium-12 columns">
		<?php // twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
		</div>
	</div><!-- .entry-footer -->

	<!-- lightbox -->

	<span class="lightbox_additional_images">
		<?php if( $galleryImgs ) : ?>
			<?php foreach($galleryImgs as $galleryImg) : ?>
				<div class="wp-image" data-src="<?php echo $galleryImg['sizes']['medium_large']; ?>" data-alt="<?php echo $galleryImg['alt']; ?>"></div>
			<?php endforeach; ?>
		<?php endif; ?>
	</span>

	<div class="lightbox">
		<div class="lightbox_overlay"></div>
			<div class="lightbox_content">
				<div class="container_lightbox_content">
					<div class="lightbox_interaction">

						<div class="wrapper">
							<span class="previous">Prev</span>
							<span class="lightbox_x_close">Close</span>
							<span class="next">Next</span>
							<img src="" />
							<span class="image_comment"></span>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end lightbox -->

</article><!-- #post-## -->
