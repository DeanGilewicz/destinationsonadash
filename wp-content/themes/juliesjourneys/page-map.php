<?php
/*
 * This is a custom page for /map - must have "map" page created in admin
*/

	$argsTrips = array(
		'post_type' => 'post', // post is trip
		'posts_per_page' => '-1'
	);

	$the_query_trips = new WP_Query( $argsTrips );

?>

<?php get_header(); ?>

<div class="content-area map">

	<div class="row">
		<div class="medium-12 columns">

			<?php build_i_world_map(1); ?>

		</div>
	</div>

	<div class="row">
		<div class="medium-12 columns visited">
	
			<?php if ( $the_query_trips->have_posts() ) : ?>

				<?php 
					$array_africa = array();
					$array_antarctica = array();
					$array_asia = array();
					$array_australia = array();
					$array_europe = array();
					$array_north_america = array();
					$array_south_america = array();
				?>

				<?php while ( $the_query_trips->have_posts() ) : $the_query_trips->the_post(); ?>
			
					<?php 
						// $postType = get_post_type_object(get_post_type());
						$continentName = wp_get_post_terms( $post->ID, 'continents', array("fields" => "names") );
						$postDestination = wp_get_post_terms( $post->ID, 'destinations', array("fields" => "names") );
						// echo '<pre>';
						// print_r($continentName);
						// print_r($postDestination);
						// echo '</pre>';
						// exit;

						switch (strtolower($continentName[0])) {
							case 'africa':
								!in_array($postDestination[0], $array_africa) ? array_push($array_africa, $postDestination[0]) : false;
							break;
							case 'antarctica':
								!in_array($postDestination[0], $array_antarctica) ? array_push($array_antarctica, $postDestination[0]) : false;
							break;
							case 'asia':
								!in_array($postDestination[0], $array_asia) ? array_push($array_asia, $postDestination[0]) : false;
							break;
							case 'australia':
								!in_array($postDestination[0], $array_australia) ? array_push($array_australia, $postDestination[0]) : false;
							break;
							case 'europe':
								!in_array($postDestination[0], $array_europe) ? array_push($array_europe, $postDestination[0]) : false;
							break;
							case 'north america':
								!in_array($postDestination[0], $array_north_america) ? array_push($array_north_america, $postDestination[0]) : false;
							break;
							case 'south america':
								!in_array($postDestination[0], $array_south_america) ? array_push($array_south_america, $postDestination[0]) : false;
							break;
						}

					?>

				<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

			<?php else : ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				
			<?php endif; ?>

			<div class="accordion">
				<h4>Africa</h4>
				<div class="accordion-content">
					<?php foreach($array_africa as $african_place_name) : ?>
						<p><?=$african_place_name;?></p>
					<?php endforeach; ?>
				</div>
				<h4>Antarctica</h4>
				<div class="accordion-content">
					<?php foreach($array_antarctica as $antarctica_place_name) : ?>
						<p><?=$antarctica_place_name;?></p>
					<?php endforeach; ?>
				</div>
				<h4>Asia</h4>
				<div class="accordion-content">
					<?php foreach($array_asia as $asia_place_name) : ?>
						<p><?=$asia_place_name;?></p>
					<?php endforeach; ?>
				</div>
				<h4>Australia</h4>
				<div class="accordion-content">
					<?php foreach($array_australia as $australia_place_name) : ?>
						<p><?=$australia_place_name;?></p>
					<?php endforeach; ?>
				</div>
				<h4>Europe</h4>
				<div class="accordion-content">
					<?php foreach($array_europe as $europe_place_name) : ?>
						<p><?=$europe_place_name;?></p>
					<?php endforeach; ?>
				</div>
				<h4>North America</h4>
				<div class="accordion-content">
					<?php foreach($array_north_america as $north_america_place_name) : ?>
						<p><?=$north_america_place_name;?></p>
					<?php endforeach; ?>
				</div>
				<h4>South America</h4>
				<div class="accordion-content">
					<?php foreach($array_south_america as $south_america_place_name) : ?>
						<p><?=$south_america_place_name;?></p>
					<?php endforeach; ?>
				</div>
			</div>
			
		</div>
	</div>



</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>


