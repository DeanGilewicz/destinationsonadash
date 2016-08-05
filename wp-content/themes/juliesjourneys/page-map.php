<?php
/*
 * This is a custom page for /map - must have "map" page created in admin
*/

/***************************************

AFRICA // 52

- Algeria
- Angola
- Botswana
- Burkina Faso
- Burundi
- Cabo Verde
- Cameroon
- Central African Republic
- Chad
- Comoros
- Congo
- Côte d'Ivoire
- Democratic Republic of the Congo
- Djibouti
- Egypt
- Equatorial Guinea
- Eritrea
- Ethiopia
- Gabon
- Gambia
- Ghana
- Guinea-Bissau
- Kenya
- Lesotho
- Liberia
- Libya
- Madagascar
- Malawi
- Mali
- Mauritania
- Mauritius
- Morocco
- Mozambique
- Namibia
- Niger
- Nigeria
- Rwanda
- Sao Tome and Principe
- Senegal
- Seychelles
- Sierra Leone
- Somalia
- South Africa
- South Sudan
- Sudan
- Swaziland
- Togo
- Tunisia
- Uganda
- United Republic of Tanzania
- Zambia
- Zimbabwe



ANTARCTICA // 1

- antarctica



ASIA // 47

- Afghanistan
- Armenia
- Azerbaijan
- Bahrain
- Bangladesh
- Bhutan
- Brunei Darussalam
- Cambodia
- China
- Cyprus
- Democratic People's Republic of Korea
- Georgia
- India
- Indonesia
- Iran (Islamic Republic of)
- Iraq
- Israel
- Japan
- Jordan
- Kazakhstan
- Kuwait
- Kyrgyzstan
- Lao People's Democratic Republic
- Lebanon
- Malaysia
- Maldives
- Mongolia
- Myanmar
- Nepal
- Oman
- Pakistan
- Philippines
- Qatar
- Republic of Korea
- Saudi Arabia
- Singapore
- Sri Lanka
- Syrian Arab Republic
- Tajikistan
- Thailand
- Timor-Leste
- Turkey
- Turkmenistan
- United Arab Emirates
- Uzbekistan
- Viet Nam
- Yemen



AUSTRALIA // 15

- Australia
- Fiji
- Guinea
- Kiribati
- Marshall Islands
- Micronesia (Federated States of)
- Nauru
- New Zealand
- Palau
- Papua New Guinea
- Samoa
- Solomon Islands
- Tonga
- Tuvalu
- Vanuatu



EUROPE // 43

- Andorra
- Austria
- Belarus
- Belgium
- Bosnia and Herzegovina
- Bulgaria
- Croatia
- Czech Republic
- Denmark
- Estonia
- Finland
- France
- Germany
- Greece
- Hungary
- Iceland
- Ireland
- Italy
- Latvia
- Liechtenstein
- Lithuania
- Luxembourg
- Malta
- Monaco
- Montenegro
- Netherlands
- Norway
- Poland
- Portugal
- Republic of Moldova
- Romania
- Russian Federation
- San Marino
- Serbia
- Slovakia
- Slovenia
- Spain
- Svalbard and Jan Mayen
- Sweden
- Switzerland
- The former Yugoslav Republic of Macedonia
- Ukraine
- United Kingdom



NORTH AMERICA / 24

- Antigua and Barbuda
- Bahamas
- Barbados
- Belize
- Canada
- Costa Rica
- Cuba
- Dominica
- Dominican Republic
- El Salvador
- Greenland
- Grenada
- Guatemala
- Haiti
- Honduras
- Jamaica
- Mexico
- Nicaragua
- Panama
- Saint Kitts and Nevis
- Saint Lucia
- Saint Vincent and the Grenadines
- Trinidad and Tobago
- United States of America



SOUTH AMERICA / 12

- Argentina
- Bolivia
- Brazil
- Chile
- Colombia
- Ecuador
- Guyana
- Paraguay
- Peru
- Suriname
- Uruguay
- Venezuela (Bolivarian Republic of)


TOTAL // 194


**********************************/

	$totalCountriesToVisit = 194;


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

			
			<?php 
				$totalCountriesVisited = count($array_africa) + 
									     count($array_antarctica) + 
									     count($array_asia) + 
									     count($array_australia) +
									     count($array_europe) +
									     count($array_north_america) +
									     count($array_south_america); 
			?>

			<p>I have been to <?= $totalCountriesVisited; ?> out of <?= $totalCountriesToVisit; ?> countries - that's <?= round(($totalCountriesVisited / $totalCountriesToVisit ) * 100) . '%';?></p>


			<div class="accordion">
				<h4>Africa <span><?php echo round((count($array_africa) / 52 ) * 100) . '%';?></span></h4>  
				<div class="accordion-content">
					<?php foreach($array_africa as $african_place_name) : ?>
						<p><?=$african_place_name;?></p> 
					<?php endforeach; ?>
				</div>
				<h4>Antarctica <span><?php echo round((count($array_antarctica) / 1 ) * 100) . '%';?></span></h4>
				<div class="accordion-content">
					<?php foreach($array_antarctica as $antarctica_place_name) : ?>
						<p><?=$antarctica_place_name;?></p>
					<?php endforeach; ?>
				</div>
				<h4>Asia <span><?php echo round((count($array_asia) / 47 ) * 100) . '%';?></span></h4>
				<div class="accordion-content">
					<?php foreach($array_asia as $asia_place_name) : ?>
						<p><?=$asia_place_name;?></p>
					<?php endforeach; ?>
				</div>
				<h4>Australia <span><?php echo round((count($array_australia) / 15 ) * 100) . '%';?></span></h4>
				<div class="accordion-content">
					<?php foreach($array_australia as $australia_place_name) : ?>
						<p><?=$australia_place_name;?></p>
					<?php endforeach; ?>
				</div>
				<h4>Europe <span><?php echo round((count($array_europe) / 43 ) * 100) . '%';?></span></h4>
				<div class="accordion-content">
					<?php foreach($array_europe as $europe_place_name) : ?>
						<p><?=$europe_place_name;?></p>
					<?php endforeach; ?>
				</div>
				<h4>North America <span><?php echo round((count($array_north_america) / 24 ) * 100) . '%';?></span></h4>
				<div class="accordion-content">
					<?php foreach($array_north_america as $north_america_place_name) : ?>
						<p><?=$north_america_place_name;?></p>
					<?php endforeach; ?>
				</div>
				<h4>South America <span><?php echo round((count($array_south_america) / 12 ) * 100) . '%';?></span></h4>
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


