<?php
/**
 * The template for displaying /eating-ethnic page
 *
 * @package WordPress
 * @subpackage Julies_Journeys
 * @since Julies Journeys 1.0
 */
?>

<?php get_header(); ?>

<div class="content-area eating-ethnic">

	<h1>Eating Ethnic</h1>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php 
				// echo '<pre>';
				// print_r($post);
				// print_r(get_post_meta(get_the_id()));
				$postType = get_post_type_object(get_post_type());
				// print_r($postType);
				// print_r($postType->rewrite['slug']);
				// echo '</pre>'; 
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

					<div class="post-meta">
						<span class="post-meta-category">
							<a href="/<?= strtolower($postType->rewrite['slug']); ?>"><?= $postType->labels->name; ?></a>
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

		<?php echo paginate_links(); ?>

		<?php wp_reset_postdata(); ?>

	<?php else: ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

	<?php endif; ?>

</div>

<?php // get_sidebar( 'content-bottom' ); ?>

<?php get_footer(); ?>
