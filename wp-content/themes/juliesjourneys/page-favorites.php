<?php
/*
 * This is a custom page for /favorites - must have page created in admin called Favorites
*/

	$argsFavs = array(
		'post_type' => array('post', 'insights', 'eating_ethnic'),
		'posts_per_page' => '-1',
		'category_name' => 'favorite'
	);

	$the_query_favs = new WP_Query( $argsFavs );

?>

<?php get_header(); ?>

<div class="content-area favs">

	<?php if ( $the_query_favs->have_posts() ) : ?>

		<?php $counter = 0; ?>

		<?php while ( $the_query_favs->have_posts() ) : $the_query_favs->the_post(); ?>

			<?php $postType = get_post_type_object(get_post_type()); ?>

			<?php if ($counter % 2 === 0) : ?>

				<article class="row post-favorite rtl">

					<div class="medium-5 columns">

						<div class="post-meta">
							<span class="post-meta-category">
								<a href="/<?= $postType->labels->name; ?>"><?= $postType->labels->name; ?></a>
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
								<a href="/<?= $postType->labels->name; ?>"><?= $postType->labels->name; ?></a>
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

			<?php wp_reset_postdata(); ?>

	<?php else: ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

	<?php endif; ?>

</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
