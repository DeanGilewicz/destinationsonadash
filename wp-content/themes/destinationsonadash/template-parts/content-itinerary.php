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

						$counter = 1;

					 	// loop through the rows of data
					    while ( have_rows('location') ) : the_row();

							if( $counter % 2 === 0 ) :

						?>

							<div class="container_location even">

								<span class="location_number"><?php echo $counter; ?></span>

								<?php 

								// reset image for post
								$image = '';
								// reset name link for post
								$name_link = '';

								$image = get_sub_field('image');

								if( get_sub_field('name_link') ) {
									$name_link = get_sub_field('name_link');
								}

								?>

								<div class="col_left">


									<?php if( $name_link ) : ?>
									<a href="<?php echo $name_link; ?>" class="name_link">
										<h3><?php the_sub_field('name'); ?></h3>
									</a>
									<?php else: ?>
									<h3><?php the_sub_field('name'); ?></h3>
									<?php endif; ?>
									
									<?php        
									if( have_rows('activities') ):
									?>
										<ul>
										<?php 
										while ( have_rows('activities') ) : the_row();
										?>

											<?php
												// reset activity link
												$activity_link = '';

												if( get_sub_field('activity_link') ) {
													$activity_link = get_sub_field('activity_link');
												}
											?>

											<?php if( $activity_link ) : ?>
												<li><a href="<?php echo $activity_link; ?>" class="activity_link"><?php the_sub_field('activity'); ?></a></li>
											<?php else : ?>
												<li><?php the_sub_field('activity'); ?></li>
											<?php endif; ?>
											
										<?php 
										endwhile;
										?>
										</ul>
									<?php 			
									endif;
									?>
								</div>

								<div class="col_right">
									<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
								</div>
								
							</div>


							<?php 
							else: 
							?>

							<div class="container_location odd">

								<span class="location_number"><?php echo $counter; ?></span>

								<?php

								// reset image for post
								$image = '';
								// reset name link for post
								$name_link = '';

								$image = get_sub_field('image');

								if( get_sub_field('name_link') ) {
									$name_link = get_sub_field('name_link');
								}

								?>

								<div class="col_left">
									<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
								</div>

								<div class="col_right">
									<?php if( $name_link ) : ?>
									<a href="<?php echo $name_link; ?>" class="name_link">
										<h3><?php the_sub_field('name'); ?></h3>
									</a>
									<?php else: ?>
									<h3><?php the_sub_field('name'); ?></h3>
									<?php endif; ?>
									<?php        
									if( have_rows('activities') ):
									?>
										<ul>
										<?php 
										while ( have_rows('activities') ) : the_row();
										?>

											<?php
												// reset activity link
												$activity_link = '';

												if( get_sub_field('activity_link') ) {
													$activity_link = get_sub_field('activity_link');
												}
											?>

											<?php if( $activity_link ) : ?>
												<li><a href="<?php echo $activity_link; ?>" class="activity_link"><?php the_sub_field('activity'); ?></a></li>
											<?php else : ?>
												<li><?php the_sub_field('activity'); ?></li>
											<?php endif; ?>

										<?php 
										endwhile;
										?>
										</ul>
									<?php 			
									endif;
									?>
								</div>
								
							</div>

							<?php 
							endif;
							?>

							<?php
							$counter++;
							?>

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
