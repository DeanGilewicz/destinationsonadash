<?php
/**
 * Template Name: Gallery Page
 * The template for displaying page gallery
 *
 * @package WordPress
 * @subpackage Julies_Journeys
 * @since Julies Journeys 1.0
 *
 */
?>

<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		// echo '<pre>';
		// print_r($post);
		// exit;

		//if ( function_exists( 'envira_gallery' ) ) { envira_gallery( '3430' ); } 
		//if ( function_exists( 'envira_gallery' ) ) { envira_gallery( 'testing', 'slug' ); }
 
			// $args = array(
			//     'numberposts' => -1, // Using -1 loads all posts
			//     'posts_per_page' => 3,
			//     'orderby' => 'menu_order', // This ensures images are in the order set in the page media manager
			//     'order'=> 'ASC',
			//     'post_mime_type' => 'image', // Make sure it doesn't pull other resources, like videos
			//     'post_parent' => $post->ID, // Important part - ensures the associated images are loaded
			//     'post_status' => null,
			//     'post_type' => 'attachment'
			// );
			 
			// $images = get_children( $args );

			// $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			// // the query
			// 	$the_query = new WP_Query( 'cat=1&paged=' . $paged ); 

			// if ( $the_query->have_posts() ) :
			// 	// the loop
			// 		while ( $the_query->have_posts() ) : $the_query->the_post(); 
			// 			echo 'hello';
			// 		 endwhile;

			// 	// next_posts_link() usage with max_num_pages
			// 	next_posts_link( 'Older Entries', $the_query->max_num_pages );
			// 	previous_posts_link( 'Newer Entries' );

			// // clean up after the query and pagination
			// wp_reset_postdata(); 


			// endif;
		?>



		<?php // if( $images) : ?>
			<?php 
			// echo '<pre>';
			// print_r($images);
			// exit;
			?>

			<!-- <div id="slider">
				<?php foreach( $images as $image ) : ?>
					<?php //echo '<pre>;'; print_r($image); exit;?>
					<img src="<?php echo $image->guid; ?>" alt="<?php echo $image->post_title; ?>" title="<?php echo $image->post_title; ?>" />
				<?php endforeach; ?>
			</div -->>
			<?php //previous_posts_link( 'previous' ); ?> 
			<?php //next_posts_link( 'next' ); ?> 

		<?php // endif; ?>


        <?php //$prev_post = get_adjacent_post(false, '', true); ?>
      
        <?php //if( !empty($prev_post) ) : ?>

        <!-- <div class="prev-post">
          <a href="<?= get_permalink($prev_post->ID); ?>" title="<?= $prev_post->post_title; ?>">
            <img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/icons/button-prev.png" alt="previous arrow" />
          </a>
          <p><?= $prev_post->post_title; ?></p>
        </div> -->
          
        <?php //endif; ?>
<!-- 
      </div>
      
      <div class="small-6 columns">
         -->
        <?php //$next_post = get_adjacent_post(false, '', false); ?>
      
        <?php //if( !empty($next_post) ) : ?>
          
          <!-- <div class="next-post">
            <a href="<?= get_permalink($next_post->ID); ?>" title="<?= $next_post->post_title; ?>">
              <img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/icons/button-next.png" alt="next arrow" />
            </a>
            <p><?= $next_post->post_title; ?></p>
          </div> -->

        <?php //endif; ?>
		
	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
