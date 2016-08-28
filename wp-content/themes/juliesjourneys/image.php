<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="row">
				<div class="small-12 columns">

					<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
					?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<header class="entry-header">

								<nav id="image-navigation" class="navigation image-navigation">
									<div class="nav-links">
										<span class="nav-previous"><?php previous_image_link( false, 'Previous Image' ); ?></span>
										<?php the_title( '<span><h1 class="entry-title">', '</h1></span>' ); ?>
										<span class="nav-next"><?php next_image_link( false, 'Next Image' ); ?></span>
									</div><!-- .nav-links -->
									<div>
										<?php 
											// Parent post navigation.
											// print_r($post);
											// $parentPage = get_post($post->post_parent);
											// $parentSlug = $parentPage->post_name;
											// print_r($parentSlug);
											// exit;
											the_post_navigation( array(
											'prev_text' => '<span class="meta-nav">see all photos from</span>
															<span class="post-title">%title</span>',
											'screen_reader_text' => ' '
											) );
										?>

									</div>
								</nav><!-- .image-navigation -->

							</header><!-- .entry-header -->

							<div class="entry-content">

								<div class="entry-attachment">
									<?php
										
										// $image_size = apply_filters( 'twentysixteen_attachment_size', 'large' );

										echo wp_get_attachment_image( get_the_ID(), 'large' );
									?>

									<?php //twentysixteen_excerpt( 'entry-caption' ); ?>

								</div><!-- .entry-attachment -->

								<?php
									the_content();
									// wp_link_pages( array(
									// 	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
									// 	'after'       => '</div>',
									// 	'link_before' => '<span>',
									// 	'link_after'  => '</span>',
									// 	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
									// 	'separator'   => '<span class="screen-reader-text">, </span>',
									// ) );
								?>
							</div><!-- .entry-content -->

							<!-- <footer class="entry-footer"> -->
								<?php //twentysixteen_entry_meta(); ?>
								<?php
									// Retrieve attachment metadata.
									// $metadata = wp_get_attachment_metadata();
									// if ( $metadata ) {
									// 	printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
									// 		esc_html_x( 'Full size', 'Used before full size attachment link.', 'twentysixteen' ),
									// 		esc_url( wp_get_attachment_url() ),
									// 		absint( $metadata['width'] ),
									// 		absint( $metadata['height'] )
									// 	);
									// }
								?>
								<?php
									// edit_post_link(
									// 	sprintf(
									// 		/* translators: %s: Name of current post */
									// 		__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
									// 		get_the_title()
									// 	),
									// 	'<span class="edit-link">',
									// 	'</span>'
									// );
								?>
							<!-- </footer> --><!-- .entry-footer -->
						</article><!-- #post-## -->

						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						// End the loop.
						endwhile;
					?>

				</div>
			</div>	

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
