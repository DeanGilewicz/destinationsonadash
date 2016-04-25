<?php
/**
 * The template for displaying /insights page
 *
 * @package WordPress
 * @subpackage Julies_Journeys
 * @since Julies Journeys 1.0
 */
?>

<?php get_header(); ?>

<div class="content-area insights">

	<h1>Insights</h1>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php 
				// echo '<pre>';
				// print_r($post);
				// print_r(get_post_meta(get_the_id()));
				$postType = get_post_type_object(get_post_type());
				// print_r($postType);
				// echo '</pre>'; 
			?>

			<article class="post-insight">

				<div class="row">

					<div class="medium-12 columns">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					</div>

				</div>

				<div class="row">

					<div class="post-meta">
						<span class="post-meta-category">
							<a href="/<?= strtolower($postType->labels->name); ?>"><?= $postType->labels->name; ?></a>
						</span>
					</div>

					<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>

					<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
					<span class="post-meta-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>

					<div class="post-excerpt">
						<?php the_excerpt(); ?>
					</div>
					
					<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>

	 			</div>

			</article>

		<?php endwhile; ?>

		<?php if ( $wp_query->max_num_pages > 1 ) : // check if the max number of pages is greater than 1 ?>
			<nav class="prev-next-posts">
				<div class="prev-posts-link">
					<?php echo get_next_posts_link( 'Older Entries', $wp_query->max_num_pages ); // display older posts link ?>
				</div>
				<div class="next-posts-link">
					<?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>
				</div>
			</nav>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

	<?php else: ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

	<?php endif; ?>

</div>

<?php // get_sidebar( 'content-bottom' ); ?>

<?php get_footer(); ?>
