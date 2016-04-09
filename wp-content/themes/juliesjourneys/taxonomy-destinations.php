<?php
/**
 * The template used to display continents
 **/
?>

<?php 

// set up category display params
// $args = array(
// 	'posts_per_page' => '-1'
// );

// $the_query_continents = new WP_Query( $args );

// taxonomy/slug/post-name
$term =	$wp_query->queried_object;

$args = array(
	// 'post_type' => 'post',
	'tax_query' => array(
		array(
			'taxonomy' => 'destination',
			'field'    => 'slug',
			'terms'    => $term->name
		)
	)
);
$query = new WP_Query( $args );

?>

<?php get_header(); ?>

HELLO I AM HERE

<div class="content">

	<div class="row">
		
		<div class="medium-12 columns">
			
			<h1 class="continent-title"><?php single_cat_title(); ?></h1>

		</div>

	</div>

	<?php if ( $query->have_posts() ) : ?>

		<?php 

			$totalPostNum = $wp_query->post_count; ?>
		
		<div class="row">

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php 
					$postType = get_post_type_object(get_post_type());
					// echo '<pre>'; print_r($postType);
				?>

				<?php if ($totalPostNum % 4 === 0) : ?>
				
					<div class="medium-3 columns">

				<?php elseif ($totalPostNum % 3 === 0) : ?>

					<div class="medium-4 columns quote">

				<?php elseif ($totalPostNum % 2 === 0) : ?>
				
					<div class="medium-6 columns">

				<?php else : ?>
				
					<div class="medium-12 columns">

				<?php endif; ?>

						<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>

								<a href="<?php the_permalink(); ?>">

									<div class="bg" style="background-image: url('<?= $src[0]; ?>')"></div>
									<div class="quote-description">
										<a href="/<?= $postType->labels->name; ?>"><?= $postType->labels->name; ?></a>
										<h2><?php the_title(); ?></h2>
										<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
										<div class="post-excerpt">
											<?php the_excerpt(); ?>
										</div>
										<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
										</div>
									<span class="overlay-border"></span>

								</a>

							<?php // the_post_thumbnail('medium'); ?>

								<!-- <div class="post-continent">
									
								</div> -->

					</div>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

		</div>

	<?php endif; ?>

</div>

<?php get_footer(); ?>