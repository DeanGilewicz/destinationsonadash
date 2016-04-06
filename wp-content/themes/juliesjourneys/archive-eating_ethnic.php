<?php
/**
 * The template for displaying /eating-ethnic page
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php get_header(); ?>

<h1>Eating Ethnic</h1>

<?php if ( have_posts() ) : ?>

	<?php $counter = 0; ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php //echo '<pre>'; print_r($post); ?>
		<?php //print_r(get_post_meta(get_the_id())); echo '</pre>'; ?>

		<?php if ($counter % 2 === 0) : ?>

			<article class="row post-favorite rtl">

				<div class="medium-5 columns">

					<div class="post-meta">
						<span class="post-meta-category">
							<a href="/eating-ethnic">Eating Ethnic</a>
						</span>
						<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
						<span class="post-meta-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
					</div>
					<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>
					<div class="post-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>

				</div>

				<div class="medium-7 columns">

					<?php the_post_thumbnail(); ?>

				</div>

			</article>

		<?php else : ?>

			<article class="row post-favorite ltr">

				<div class="medium-7 columns">

					<?php the_post_thumbnail(); ?>

				</div>

				<div class="medium-5 columns">

					<div class="post-meta">
						<span class="post-meta-category">
							<a href="/eating-ethnic">Eating Ethnic</a>
						</span>
						<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
						<span class="post-meta-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
					</div>
					<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>
					<div class="post-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>

				</div>

			</article>

		<?php endif; ?>

			<?php $counter++; ?>

	<?php endwhile; ?>

<?php else: ?>

	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php endif; ?>


	<?php // get_sidebar( 'content-bottom' ); ?>

<!-- </div> --><!-- .content-area -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
