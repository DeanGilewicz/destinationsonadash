<?php
/**
 * The template used to display continents
 **/
?>

<?php 

// taxonomy/slug/post-name
// $term =	$wp_query->queried_object;

// $args = array(
// 	'tax_query' => array(
// 		array(
// 			'taxonomy' => 'destination',
// 			'field'    => 'slug',
// 			'terms'    => $term->name
// 		)
// 	)
// );

// $query = new WP_Query( $args );

?>

<?php get_header(); ?>

<div class="content destination">

	<div class="row">
		
		<div class="medium-12 columns">
			
			<h1 class="continent-title"><?php single_cat_title(); ?></h1>

		</div>

	</div>

	<?php if ( have_posts() ) : ?>

		<?php $counter = 0; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php 
					$postType = get_post_type_object(get_post_type());
					// echo '<pre>'; print_r($postType);
				?>

				<?php if ($counter % 2 === 0) : ?>

					<article class="row post-destination rtl">

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

					<article class="row post-destination ltr">

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

	<?php else: ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

	<?php endif; ?>

	<?php wp_reset_postdata(); ?>

</div>

<?php get_footer(); ?>