<?php
/*
 * This is a custom page for /gallery - must have page created in admin called Gallery
*/

	$argsGallery = array(
		'post_type' => array('page'),
		'post_parent' => $post->ID,
		'orderby' => 'name',
		'posts_per_page' => '-1'
	);

	$the_query_gallery = new WP_Query( $argsGallery );
	
	$totalPostNum = $the_query_gallery->post_count;
	// echo '<pre>';
	// print_r($the_query_gallery);
	// exit;
?>

<?php get_header(); ?>

<div class="content-area gallery-overview">

	<div class="row">
		
		<div class="medium-12 columns">
			
			<h1 class="gallery-title"><?php the_title(); ?></h1>

		</div>

	</div>

	<?php if ( $the_query_gallery->have_posts() ) : ?>

	<div class="row">

		<?php while ( $the_query_gallery->have_posts() ) : $the_query_gallery->the_post(); ?>

			<?php 
				// $postType = get_post_type_object(get_post_type());
			?>

				<?php if ($totalPostNum % 4 === 0) : ?>
				
					<div class="medium-3 columns end bottom-margin four">

				<?php elseif ($totalPostNum % 3 === 0) : ?>

					<div class="medium-4 columns end bottom-margin three">

				<?php elseif ($totalPostNum % 1 === 0) : ?>
				
					<div class="medium-6 columns end bottom-margin two">

				<?php else : ?>
				
					<div class="medium-6 columns">

				<?php endif; ?>

						<?php 
						// print_r($post);
						// print_r(get_post_meta($post->ID));
						$src = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
						// print_r($src);
						?>

						<a href="<?php the_permalink(); ?>">
							<img src="<?= $src; ?>" class="flag"/>

							<?php // the_post_thumbnail(); ?>

						</a>

					</div>

		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	<?php else: ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

	<?php endif; ?>

	</div>

</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
