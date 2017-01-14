<?php
/*
 * This is a custom page for /favorites - must have page created in admin called Favorites
*/
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$argsFavs = array(
		'post_type' => array('post', 'insights', 'eating_ethnic'),
		'posts_per_page' => '5',
		'category_name' => 'favorite',
		'paged' => $paged
	);

	$the_query_favs = new WP_Query( $argsFavs );

?>

<?php get_header(); ?>

<div class="content-area favs">

	<div class="row">
		
		<div class="medium-12 columns">
			
			<h1 class="page-title">Favorites</h1>

		</div>

	</div>

	<?php if ( $the_query_favs->have_posts() ) : ?>

		<?php $counter = 0; ?>

		<?php while ( $the_query_favs->have_posts() ) : $the_query_favs->the_post(); ?>

			<?php $postType = get_post_type_object(get_post_type()); ?>

			<?php if ($counter % 2 === 0) : ?>

				<article class="row post-favorite ltr">
					<div class="medium-7 medium-push-5 columns">
						<div class="post-meta">
							<span class="post-meta-category">
								<a href="/<?= strtolower(str_replace(" ", "-", $postType->labels->name)); ?>"><?= $postType->labels->name; ?></a>
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
					<div class="medium-5 medium-pull-7 columns">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					</div>
					<span class="divider"></span>
				</article>

			<?php else : ?>

				<article class="row post-favorite rtl">
					<div class="medium-7 columns">
						<div class="post-meta">
							<span class="post-meta-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
							<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
							<span class="post-meta-category">
								<a href="/<?= strtolower(str_replace(" ", "-", $postType->labels->name)); ?>"><?= $postType->labels->name; ?></a>
							</span>
						</div>
						<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>
						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					</div>
					<div class="medium-5 columns">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					</div>
					<span class="divider"></span>
				</article>

			<?php endif; ?>

			<?php $counter++; ?>

		<?php endwhile; ?>

			<?php if ( $the_query_favs->max_num_pages > 1 ) : // check if the max number of pages is greater than 1 ?>
				<nav class="prev-next-posts">
					<div class="prev-posts-link">
						<?php echo get_next_posts_link( 'Older Entries', $the_query_favs->max_num_pages ); // display older posts link ?>
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

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
