<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

	$argsLatestFivePosts = array(
		// 'post_type' => array('post', 'insights', 'eating_ethnic'),
		'posts_per_page' => '5',
		'orderby' => 'date'
	);

	$the_query_latest_posts = new WP_Query( $argsLatestFivePosts );

?>

<section class="row no-results not-found">
	<div class="medium-12 columns page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found Here', 'destinationsonadash' ); ?></h1>
	</div><!-- .page-header -->

	<div class="medium-12 columns page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentysixteen' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<!-- <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentysixteen' ); ?></p> -->
			<p class="no-results-message">Oh no, we couldn't find anything that matched your search for: <span class="term"><?php echo esc_html( get_search_query() ); ?></span></p>
			
			<p>Try searching again or explore my latest posts...</p>
			
			<?php get_search_form(); ?>


			<!-- begin slider -->

			<?php if ( $the_query_latest_posts->have_posts() ) : ?>

				<?php $postNum = 0; ?>

				<div class="row">
					<div class="medium-12 columns">

						<div class="slider">

							<div class="slides">

								<?php while ( $the_query_latest_posts->have_posts() ) : $the_query_latest_posts->the_post(); ?>

									<?php 
										$postNum++;
										$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
										$url = $thumb['0'];
										$postType = get_post_type_object(get_post_type());
									?>

									<div class="search-slide-<?= $postNum; ?> <?= ($postNum == 1) ? 'active' : ''; ?>">

										<div class="content-of-slide">

											<div class="col-left">
												<a href="/<?= strtolower(str_replace(" ", "-", $postType->labels->name)); ?>" class="post-meta-category"><?= $postType->labels->name; ?></a>
												<span class="post-meta-date"><?php echo get_the_date('M j, Y'); ?></span>
												<h2><?php the_title(); ?></h2>
												<?php the_excerpt(); ?>
												<a class="button mobile-slider" href="<?php the_permalink(); ?>">read more</a>
												<div class="container-nav">
													<button class="button nav" data-nav-direction="back">Back</button>
													<button class="button nav" data-nav-direction="forward">Forward</button>
												</div>
											</div>
											<div class="col-right">
												<img src="<?= $url; ?>"/>
											</div>
										</div>

									</div>

								<?php endwhile; ?>

							</div>

						</div>

					</div>
				</div>

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>

			<!-- end slider -->

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentysixteen' ); ?></p>
			
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- .page-content -->
</section><!-- .no-results -->
