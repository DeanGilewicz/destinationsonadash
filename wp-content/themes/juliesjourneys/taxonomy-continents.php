<?php
/**
 * The template used to display Continents
 * By default it shows all posts related to specific continent
 **/
?>

<?php 

/**
 * Override default to show only trips associated to specific continent 
**/

// taxonomy/slug/post-name
$term =	$wp_query->queried_object;

$args = array(
	'post_type' => 'post',
	'posts_per_page' => '-1',
	'tax_query' => array(
		array(
			'taxonomy' => 'continents',
			'field'    => 'slug',
			'terms'    => $term->name
		)
	)
);

$the_query_destinations = new WP_Query( $args );

// array to check against so only display unique destinations and not duplicates here
$destinationsArray = array();
// array to use to display posts that are unique
$postArray = array();

foreach ($the_query_destinations->posts as $post) {
	// get all post terms for destination taxonomy
	$postTaxonomies = wp_get_post_terms($post->ID, 'destinations');
	// use first obj since only should have one destination
	$destinationName = $postTaxonomies[0]->name;
	// use first obj since only should have one destination
	$destinationSlug = $postTaxonomies[0]->slug;

	// if destination name not currently in array then add it
	// add post obj so can use to display
	if(!in_array($destinationName, $destinationsArray)) {
		$post->destinationLink = $destinationSlug;
		array_push($destinationsArray, $destinationName);
		array_push($postArray, $post);
	}

};

// get total number of modified posts 
$totalPostNum = count($postArray);

?>

<?php get_header(); ?>

<div class="content continent">

	<div class="row">
		
		<div class="medium-12 columns">
			
			<h1 class="continent-title"><?php single_cat_title(); ?></h1>

		</div>

	</div>

	<?php //if ( $the_query_destinations->have_posts() ) : ?>
		
		<div class="row">

			<?php //while ( $the_query_destinations->have_posts() ) : $the_query_destinations->the_post(); ?>

			<?php foreach ($postArray as $modifiedPost) : ?>

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

						<?php 
							// advanced custom fields 
							$customFields = get_fields($modifiedPost->ID);
							if( isset($customFields['trip_flag']) ) { $flag = $customFields['trip_flag']; }							
						?>

						<?php if( isset($flag) ) : ?>

							<a href="/destination/<?php echo $modifiedPost->destinationLink; ?>">
								<img src="<?php echo $flag['url']; ?>" alt="<?php echo $flag['alt']; ?>" />
							</a>

						<?php else: ?>

							<a href="/destination/<?php echo $modifiedPost->destinationLink; ?>">
								<?php the_post_thumbnail('medium'); ?>
							</a>

						<?php endif; ?>

					</div>

			<?php //endwhile; ?>

			<?php endforeach; ?>

			<?php wp_reset_postdata(); ?>

		</div>

	<?php // endif; ?>

</div>

<?php get_footer(); ?>