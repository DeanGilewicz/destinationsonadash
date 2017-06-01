<?php
/**
 * The template for displaying /itineraries page
 *
 * @package WordPress
 * @subpackage DestinationsOnADash
 * @since DestinationsOnADash 1.0
 */
?>

<?php get_header(); ?>

<div class="content-area itineraries">

	<div class="row">
		
		<div class="medium-12 columns">
			
			<h1 class="page-title">Itineraries</h1>

		</div>

	</div>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php 
				$postType = get_post_type_object(get_post_type());
			?>

			<article class="post-itinerary">

				<div class="row">

					<div class="medium-12 columns">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					</div>

				</div>

				<div class="row">

					<div class="medium-12 columns">

						<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>

						<span class="post-meta-date"><?php echo get_the_date('M j, Y'); ?></span>
						<span class="post-meta-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>

						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>

						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>

					</div>

				</div>

			</article>

		<?php endwhile; ?>

		<?php echo paginate_links(); ?>

		<?php wp_reset_postdata(); ?>

	<?php else: ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

	<?php endif; ?>

</div>

<?php // get_sidebar( 'content-bottom' ); ?>

<?php get_footer(); ?>