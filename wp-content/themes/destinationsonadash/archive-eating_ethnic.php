<?php
/**
 * The template for displaying /eating-ethnic page
 *
 * @package WordPress
 * @subpackage DestinationsOnADash
 * @since DestinationsOnADash 1.0
 */
?>

<?php get_header(); ?>

<div class="content-area eating-ethnic">

	<div class="row">

		<div class="medium-12 columns">

			<h1 class="page-title">Eating Ethnic</h1>

		</div>

	</div>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				$postType = get_post_type_object(get_post_type());
			?>

			<article class="post-eating-ethnic">

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

		<?php if ( $wp_query->max_num_pages > 1 ) : // check if the max number of pages is greater than 1 ?>
		<div class="row">
			<div class="medium-12 columns">
				<nav class="prev-next-posts">
					<div class="prev-posts-link">
						<?php echo get_next_posts_link( 'Older Posts', $wp_query->max_num_pages ); // display older posts link ?>
					</div>
					<div class="next-posts-link">
						<?php echo get_previous_posts_link( 'Newer Posts' ); // display newer posts link ?>
					</div>
				</nav>
			</div>
		</div>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

	<?php else: ?>

		<!-- <p><?php //_e( 'Sorry, no posts matched your criteria.' ); ?></p> -->
		<p>Coming soon...</p>

	<?php endif; ?>

</div>

<?php // get_sidebar( 'content-bottom' ); ?>

<?php get_footer(); ?>
