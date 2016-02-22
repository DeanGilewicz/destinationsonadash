<?php // custom taxonomies here

	function create_continents_hierarchical_taxonomy() {

		// translations part for GUI

		$labels = array(
			'name' => _x( 'Continents', 'taxonomy general name' ),
			'singular_name' => _x( 'Continent', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Continents' ),
			'all_items' => __( 'All Continents' ),
			'parent_item' => __( 'Parent Continent' ),
			'parent_item_colon' => __( 'Parent Continent:' ),
			'edit_item' => __( 'Edit Continent' ), 
			'update_item' => __( 'Update Continent' ),
			'add_new_item' => __( 'Add New Continent' ),
			'new_item_name' => __( 'New Continent Name' ),
			'menu_name' => __( 'Continents' ),
		);

		// register taxonomy

		register_taxonomy('continents', array('post'),
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'continent' ),
		));
	}

	add_action( 'init', 'create_continents_hierarchical_taxonomy', 0 );

?>