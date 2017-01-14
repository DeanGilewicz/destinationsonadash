<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Julies_Journeys
 * @since Julies Journeys 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">

		<?php
			while ( have_posts() ) : the_post();

			// Include the single post content template.
				get_template_part( 'template-parts/content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

				if ( is_singular( 'attachment' ) ) : ?>

					<div class="row container-single-attachment-nav">
						<div class="medium-12 columns">
						<?php 
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
							) );
						?>
						</div>
					</div>
					
				<?php elseif ( is_singular( 'post' ) ) : // if trips then show trip navigation ?>

					<div class="row container-single-post-nav">
						<div class="medium-12 columns">
							<?php
								// Previous/next post navigation.
								the_post_navigation( array(
									'prev_text'          => '<span class="nav-post-direction">Previous</span>
															 <p class="nav-post-title">%title</p>',
									'next_text'			 => '<span class="nav-post-direction">Next</span>
															 <p class="nav-post-title">%title</p>',
									'in_same_term'       => true,
									'excluded_terms'     => '',
									'taxonomy'           => 'destinations'
								) );
							?>
						</div>
					</div>

				<?php endif;

			// End of the loop.
			endwhile;
		?>

	</main><!-- .site-main -->

	<?php // get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
