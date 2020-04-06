<?php
/*
 * This is a custom page for /where-i-stayed - must have "Where I Stayed" page created in admin
*/
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$argsWhereIstayed = array(
		'post_type' => 'post',
		'posts_per_page' => '5',
		'paged' => $paged
	);

	$the_query_where_i_stayed = new WP_Query( $argsWhereIstayed );

?>

<?php get_header(); ?>

<div class="content-area trips">

	<div class="row">

		<div class="medium-12 columns">

			<h1 class="page-title">Where I Stayed</h1>

		</div>

	</div>

	<?php if ( $the_query_where_i_stayed->have_posts() ) : ?>

		<?php while ( $the_query_where_i_stayed->have_posts() ) : $the_query_where_i_stayed->the_post(); ?>

			<?php $postType = get_post_type_object(get_post_type()); ?>

			<article class="post-trips">

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

						<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
						<span class="post-meta-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>

						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>

						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>

					</div>

				</div>

			</article>

		<?php endwhile; ?>

		<?php if ( $the_query_where_i_stayed->max_num_pages > 1 ) : // check if the max number of pages is greater than 1 ?>
		<div class="row">
			<div class="medium-12 columns">
				<nav class="prev-next-posts">
					<div class="prev-posts-link">
						<?php echo get_next_posts_link( 'Older Stays', $the_query_where_i_stayed->max_num_pages ); // display older posts link ?>
					</div>
					<div class="next-posts-link">
						<?php echo get_previous_posts_link( 'Newer Stays' ); // display newer posts link ?>
					</div>
				</nav>
			</div>
		</div>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

	<?php else : ?>

		<!-- <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p> -->
		<p>Coming soon...</p>

	<?php endif; ?>

</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>


