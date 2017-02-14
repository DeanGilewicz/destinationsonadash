<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Julies_Journeys
 * @since Julies Journeys 1.0
 */

// Advanced Custom Fields
$trip_date = get_field('trip_date');
$trip_duration = get_field('trip_duration');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // twentysixteen_excerpt(); ?>

	<?php // twentysixteen_post_thumbnail(); ?>

	<?php 
		// echo '<pre>';
		// print_r($post);
		// print_r(get_post_meta(get_the_id()));
		$postType = get_post_type_object(get_post_type());
		// echo '</pre>'; 
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

</article><!-- #post-## -->
