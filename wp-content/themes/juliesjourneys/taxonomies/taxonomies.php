<?php // custom taxonomies here

	function create_destinations_hierarchical_taxonomy() {

		// translations part for GUI

		$labels = array(
			'name' => _x( 'Destinations', 'taxonomy general name' ),
			'singular_name' => _x( 'Destination', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Destinations' ),
			'all_items' => __( 'All Destinations' ),
			'parent_item' => __( 'Parent Destination' ),
			'parent_item_colon' => __( 'Parent Destination:' ),
			'edit_item' => __( 'Edit Destination' ), 
			'update_item' => __( 'Update Destination' ),
			'add_new_item' => __( 'Add New Destination' ),
			'new_item_name' => __( 'New Destination Name' ),
			'menu_name' => __( 'Destinations' ),
		);

		// register taxonomy

		register_taxonomy('destinations', array('post'),
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'destination' ),
		));
	}

	add_action( 'init', 'create_destinations_hierarchical_taxonomy', 0 );

?>