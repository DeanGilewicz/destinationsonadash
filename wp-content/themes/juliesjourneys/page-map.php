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

	if ( $the_query_trips->have_posts() ) :

		$array_africa = array();
		$array_antarctica = array();
		$array_asia = array();
		$array_australia = array();
		$array_europe = array();
		$array_north_america = array();
		$array_south_america = array();

		while ( $the_query_trips->have_posts() ) : $the_query_trips->the_post();
			
			// $postType = get_post_type_object(get_post_type());
			$continentName = wp_get_post_terms( $post->ID, 'continents', array("fields" => "names") );
			$postDestination = wp_get_post_terms( $post->ID, 'destinations', array("fields" => "all") );
			
			// echo '<pre>';
			// print_r($continentName);
			// print_r($postDestination[0]);
			// print_r(get_the_permalink());
			// echo '</pre>';
			// exit;

			$object = new stdClass();
			$object->name = $postDestination[0]->name;
			$object->link = '/destination/' . $postDestination[0]->slug;
			
			switch (strtolower($continentName[0])) {
				case 'africa':
					$exits = false;
					foreach ($array_africa as $destination) {
						if ($postDestination[0]->name === $destination->name) {
							$exits = true;
							break;
						}
					}
					if (!$exits) {
						array_push($array_africa, $object);
					}
					// !in_array($postDestination[0]->name, $array_africa) ? array_push($array_africa,$object) : false;
				break;
				case 'antarctica':
					$exits = false;
					foreach ($array_antarctica as $destination) {
						if ($postDestination[0]->name === $destination->name) {
							$exits = true;
							break;
						}
					}
					if (!$exits) {
						array_push($array_antarctica, $object);
					}
					// !in_array($postDestination[0]->name, $array_antarctica) ? array_push($array_north_america, $object) : false;
				break;
				case 'asia':
					$exits = false;
					foreach ($array_asia as $destination) {
						if ($postDestination[0]->name === $destination->name) {
							$exits = true;
							break;
						}
					}
					if (!$exits) {
						array_push($array_asia, $object);
					}
					// !in_array($postDestination[0]->name, $array_asia) ? array_push($array_north_america, $object) : false;
				break;
				case 'australia':
					$exits = false;
					foreach ($array_australia as $destination) {
						if ($postDestination[0]->name === $destination->name) {
							$exits = true;
							break;
						}
					}
					if (!$exits) {
						array_push($array_australia, $object);
					}
					// !in_array($postDestination[0]->name, $array_australia) ? array_push($array_north_america, $object) : false;
				break;
				case 'europe':
					$exits = false;
					foreach ($array_europe as $destination) {
						if ($postDestination[0]->name === $destination->name) {
							$exits = true;
							break;
						}
					}
					if (!$exits) {
						array_push($array_europe, $object);
					}
					// !in_array($postDestination[0]->name, $array_europe) ? array_push($array_north_america, $object) : false;
				break;
				case 'north america':
					$exits = false;
					foreach ($array_north_america as $destination) {
						if ($postDestination[0]->name === $destination->name) {
							$exits = true;
							break;
						}
					}
					if (!$exits) {
						array_push($array_north_america, $object);
					}
					// !in_array($postDestination[0]->name, $array_north_america) ? array_push($array_north_america, $object) : false;
				break;
				case 'south america':
					$exits = false;
					foreach ($array_south_america as $destination) {
						if ($postDestination[0]->name === $destination->name) {
							$exits = true;
							break;
						}
					}
					if (!$exits) {
						array_push($array_south_america, $object);
					}
					// !in_array($postDestination[0]->name, $array_south_america) ? array_push($array_north_america, $object) : false;
				break;
			}

		endwhile;

		wp_reset_postdata();

		else : ?>

			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				
	<?php endif;

	$totalCountriesVisited = count($array_africa) + 
						     count($array_antarctica) + 
						     count($array_asia) + 
						     count($array_australia) +
						     count($array_europe) +
						     count($array_north_america) +
						     count($array_south_america);
?>

<?php get_header(); ?>

<div class="content-area map">

	<div class="row">
		<div class="medium-12 columns total">

			<!-- <h4>So far I have been to <?= $totalCountriesVisited; ?> out of <?= $totalCountriesToVisit; ?> countries <span>Total <?= round(($totalCountriesVisited / $totalCountriesToVisit ) * 100) . '%';?></span></h4> -->
			<!-- <h4>So far I have been to <?= $totalCountriesVisited; ?> countries</h4> -->
			<h4>Countries I have visited</h4>

		</div>
	</div>

	<div class="row">
		<div class="medium-12 columns the-map">

			<?php build_i_world_map(1); ?>

		</div>
	</div>

	<div class="row">
		<div class="visited">
	
			<div class="accordion">
				<h4>Africa <span><?= round((count($array_africa) / 52 ) * 100) . '%';?></span></h4>  
				<div class="accordion-content active">
					<?php foreach($array_africa as $african_destination) : ?>
						<p><a href="<?= $african_destination->link; ?>"><?= $african_destination->name; ?></a></p> 
					<?php endforeach; ?>
				</div>
				<h4>Antarctica <span><?= round((count($array_antarctica) / 1 ) * 100) . '%';?></span></h4>
				<div class="accordion-content">
					<?php foreach($array_antarctica as $antarctica_destination) : ?>
						<p><a href="<?= $antarctica_destination->link; ?>"><?= $antarctica_destination->name ;?></a></p>
					<?php endforeach; ?>
				</div>
				<h4>Asia <span><?= round((count($array_asia) / 47 ) * 100) . '%';?></span></h4>
				<div class="accordion-content">
					<?php foreach($array_asia as $asia_destination) : ?>
						<p><a href="<?= $asia_destination->link; ?>"><?= $asia_destination->name ;?></a></p>
					<?php endforeach; ?>
				</div>
				<h4>Australia <span><?= round((count($array_australia) / 15 ) * 100) . '%';?></span></h4>
				<div class="accordion-content">
					<?php foreach($array_australia as $australia_destination) : ?>
						<p><a href="<?= $australia_destination->link; ?>"><?= $australia_destination->name ;?></a></p>
					<?php endforeach; ?>
				</div>
				<h4>Europe <span><?= round((count($array_europe) / 43 ) * 100) . '%';?></span></h4>
				<div class="accordion-content">
					<?php foreach($array_europe as $europe_destination) : ?>
						<p><a href="<?= $europe_destination->link; ?>"><?= $europe_destination->name ;?></a></p>
					<?php endforeach; ?>
				</div>
				<h4>North America <span><?= round((count($array_north_america) / 24 ) * 100) . '%';?></span></h4>
				<div class="accordion-content">
					<?php foreach($array_north_america as $north_america_destination) : ?>
						<p><a href="<?= $north_america_destination->link; ?>"><?= $north_america_destination->name ;?></a></p>
					<?php endforeach; ?>
				</div>
				<h4>South America <span><?= round((count($array_south_america) / 12 ) * 100) . '%';?></span></h4>
				<div class="accordion-content">
					<?php foreach($array_south_america as $south_america_destination) : ?>
						<p><a href="<?= $south_america_destination->link; ?>"><?= $south_america_destination->name ;?></a></p>
					<?php endforeach; ?>
				</div>
			</div>
			
		</div>
	</div>



</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>


