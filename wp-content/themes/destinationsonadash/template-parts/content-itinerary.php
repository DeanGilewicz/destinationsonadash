<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage DestinationsOnADash
 * @since DestinationsOnADash 1.0
 */

// Advanced Custom Fields

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="content-area post-single">
		
		<div class="row">

			<div class="small-12 columns">
				
				<div class="post-meta-single-category">
					<a href="/itineraries">Itineraries</a>
				</div>
				<div class="post-meta-single-title">
					<a href="<?php the_permalink(); ?>" class="post-title">
						<h2><?php the_title(); ?></h2>
					</a>
				</div>
			
			</div>

		</div>

		<div class="row container_content">
			<div class="small-12 columns">
				
				<?php 
					//the_content();
					if( have_rows('location') ):

					 	// loop through the rows of data
					    while ( have_rows('location') ) : the_row();
							// display a sub field value
						?>

							<div class="container_location">
								
								<h3><?php the_sub_field('name'); ?></h3>
								
								<?php        
								if( have_rows('activities') ):
								?>
									<ul>
									<?php 
									while ( have_rows('activities') ) : the_row();
									?>
										<li><?php the_sub_field('activity'); ?></li>
									<?php 
									endwhile;
									?>
									</ul>
								<?php 			
								endif;
								?>

								<?php 
								$image = get_sub_field('image');
								?>	
							
								<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />

							</div>

						<?php			
						endwhile;
					    ?>
					<?php
					else:
					?>
						<p>Please add at least one location</p>
					    
					<?php
					endif;

				?>

			</div>
		</div>

	</div><!-- .entry-content -->

	<div class="row entry-footer">
		<div class="medium-12 columns">
		<?php 
			
			// Get current page URL 
			$doadURL = urlencode( get_permalink() );
	 
			// Get current page title
			$doadTitle = str_replace( ' ', '%20', get_the_title() );
					 
			// Construct sharing URL without using any script
			$twitterURL  = 'https://twitter.com/intent/tweet?text='.$doadTitle.'&amp;url='.$doadURL.'&amp;via=doad';
			$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$doadURL;
	 		 
			// Create sharing buttons
			$socialLinks  = '';
			$socialLinks .= '<div class="container_social_share">';
			$socialLinks .= '<h4>share on</h4> <a class="social_link social_twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
			$socialLinks .= '<a class="social_link social_facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
			$socialLinks .= '</div>';
			
			// Display in template
			echo $socialLinks; 
		?>
		</div>
		<div class="medium-12 columns">
		<?php // twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
		</div>
	</div><!-- .entry-footer -->

</article><!-- #post-## -->
