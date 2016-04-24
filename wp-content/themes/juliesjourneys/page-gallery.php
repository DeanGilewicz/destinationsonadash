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
				
					<div class="medium-3 columns bottom-margin">

				<?php elseif ($totalPostNum % 3 === 0) : ?>

					<div class="medium-4 columns bottom-margin">

				<?php elseif ($totalPostNum % 1 === 0) : ?>
				
					<div class="medium-6 columns end bottom-margin">

				<?php else : ?>
				
					<div class="medium-6 columns">

				<?php endif; ?>

						<?php // $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>

						<a href="<?php the_permalink(); ?>">

							<img src="http://placehold.it/500x300?text=flag"/>

						</a>

						<?php // the_post_thumbnail('medium'); ?>

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
