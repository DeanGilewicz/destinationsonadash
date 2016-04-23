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

		<div class="row">
			<div class="small-12 columns">


				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					// get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) {
					// 	comments_template();
					// }
					the_content();
					// End of the loop.
				endwhile;
				?>

			</div>
		</div>

	</main><!-- .site-main -->

	<?php // get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>


<?php 

/* if looking to include a lightbox


<?php

// News & Ideas (Posts) Template

$news_gallery = get_field('news_gallery');

?>

<div class="content">

	<div class="row">
		<div class="medium-12 columns">
			
			<?php include_once("inc/bread-duplicate.php"); ?>

		</div>
	</div>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<div class="row">

			<div class="small-12 medium-12 large-6 columns">
				<h1><?php the_title();?></h1>
				<p>Studio: </p>
				<p>Tags: <?php the_tags(); ?></p>
				<p>By: <?php the_author(); ?></p>
				
				<?php the_content();?>
				
				<?php if( $news_gallery ): ?>

					<div class="container-gallery">

					<?php foreach( $news_gallery as $image ): ?>

						<img src="<?= $image['sizes']['thumbnail']; ?>" alt="<?= $image['alt']; ?>" />

		        	<?php endforeach; ?>

		        	</div>

		        	<div class="lightbox">

						<div class="lightbox-overlay"></div>

						<div class="lightbox-content">

							<div class="container-lightbox-content">

								<img src="" />

								<div class="lightbox-interaction">
									
									<div class="area-one">
										<span class="previous" style="background-image:url('<?= get_stylesheet_directory_uri(); ?>/dist/images/icons/lightbox-prev-arrow.png');"></span>
										<span class="image-comment"></span>
										<span class="next" style="background-image:url('<?= get_stylesheet_directory_uri(); ?>/dist/images/icons/lightbox-next-arrow.png');"></span>
									</div>
									
									<div class="lightbox-x-close button">Close</div>

								</div>

							</div>

						</div>

					</div>

				<?php endif; ?>
			</div>

			<div class="small-12 medium-12 large-6 columns sidebar">
				<?php include_once("sidebar-news-ideas-single.php"); ?>
			</div>

		</div>

		<div class="row">
			
			<div class="small-6 columns">
				
				<?php $prev_post = get_adjacent_post(false, '', true); ?>
			
				<?php if( !empty($prev_post) ) : ?>

				<div class="prev-post">
					<a href="<?= get_permalink($prev_post->ID); ?>" title="<?= $prev_post->post_title; ?>">
						<img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/icons/button-prev.png" alt="previous arrow" />
					</a>
					<p><?= $prev_post->post_title; ?></p>
				</div>
					
				<?php endif; ?>

				<?php // previous_post_link(); ?>

			</div>
			
			<div class="small-6 columns">
				
				<?php $next_post = get_adjacent_post(false, '', false); ?>
			
				<?php if( !empty($next_post) ) : ?>
					
					<div class="next-post">
						<a href="<?= get_permalink($next_post->ID); ?>" title="<?= $next_post->post_title; ?>">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/icons/button-next.png" alt="next arrow" />
						</a>
						<p><?= $next_post->post_title; ?></p>
					</div>

				<?php endif; ?>

				<?php // next_post_link(); ?>

			</div>

		</div>

		<?php endwhile; else: endif;?>

</div>

*/
