<?php // THIS IS THE TEMPLATE /FAVORITES

	$argsFavs = array(
		'post_type' => array('post', 'insights', 'eating_ethnic'),
		'posts_per_page' => '-1',
		'category_name' => 'favorite'
	);

	$the_query_favs = new WP_Query( $argsFavs );

get_header(); ?>

<?php if ( $the_query_favs->have_posts() ) : ?>

	<div class="row">

		<?php while ( $the_query_favs->have_posts() ) : $the_query_favs->the_post(); ?>

			<?php 
				$postType = get_post_type_object(get_post_type());
				// echo '<pre>'; print_r($postType);
			?>

			<div class="medium-4 columns">

				<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>
				<div class="post-meta">
					<span class="post-meta-category">
						<a href="/<?= $postType->labels->name; ?>"><?= $postType->labels->name; ?></a>
					</span>
					<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
					<span class="post-meta-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
				</div>
				<div class="post-excerpt">
					<?php the_excerpt(); ?>
				</div>
				<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>

			</div>

			<div class="medium-8 columns">

				<?php the_post_thumbnail(); ?>

			</div>

			<?php wp_reset_postdata(); ?>

		<?php endwhile; ?>

	</div>

<?php else: ?>

	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php endif; ?>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
