<?php
/*
 * This is a custom page for /trips - must have page created in admin called Trips
*/

	$argsTrips = array(
		'post_type' => array('post'),
		'posts_per_page' => '-1'
	);

	$the_query_trips = new WP_Query( $argsTrips );

?>

<?php get_header(); ?>

<div id="primary" class="content-area">

	<?php if ( $the_query_trips->have_posts() ) : ?>

		<?php while ( $the_query_trips->have_posts() ) : $the_query_trips->the_post(); ?>
			<?php 
				$postType = get_post_type_object(get_post_type());
				// echo '<pre>'; print_r($postType);
			?>
			<article class="row post-trips rtl">

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
			
		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	<?php else : ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	
	<?php endif; ?>

</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>


