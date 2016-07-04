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
		<h1 class="page-title"><?php _e( 'Nothing Found', 'twentysixteen' ); ?></h1>
	</div><!-- .page-header -->

	<div class="medium-12 columns page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentysixteen' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<!-- <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentysixteen' ); ?></p> -->
			<p>Sorry, but nothing matched your search for: <span class="term"><?php echo esc_html( get_search_query() ); ?></span></p>
			
			<p>Please try again with some different keywords or check out my latest posts below.</p>
			
			<?php get_search_form(); ?>

			<?php if ( $the_query_latest_posts->have_posts() ) : ?>

				<?php $counter = 0; ?>

				<?php while ( $the_query_latest_posts->have_posts() ) : $the_query_latest_posts->the_post(); ?>
					
					<?php 
						// echo '<pre>';
						$postType = get_post_type_object(get_post_type());
						// print_r($postType);
						// echo '</pre>';
						// $postCats = get_the_category();
						// $postTags = get_the_tags();
						// echo '<pre>'; print_r($postCats);
						// echo '<pre>'; print_r($postTags);
					?>

					<?php if ($counter % 2 === 0) : ?>

						<article class="row home-post ltr">
							<div class="medium-7 medium-push-5 columns">
								<div class="post-meta">
									<span class="post-meta-category">
										<a href="/<?= strtolower(str_replace(" ", "-", $postType->labels->name)); ?>"><?= $postType->labels->name; ?></a>
									</span>
									<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
									<!-- <span class="post-meta-comments"><?php comments_number( '0', '1', '%' ); ?></span> -->
								</div>
								<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>
								<div class="post-excerpt">
									<?php the_excerpt(); ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
							</div>
							<div class="medium-5 medium-pull-7 columns">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('large'); ?>
								</a>
							</div>
						</article>

					<?php else: ?>

						<article class="row home-post rtl">
							<div class="medium-7 columns">
								<div class="post-meta">
									<!-- <span class="post-meta-comments"><?php comments_number( '0', '1', '%' ); ?></span> -->
									<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
									<span class="post-meta-category">
										<a href="/<?= strtolower(str_replace(" ", "-", $postType->labels->name)); ?>"><?= $postType->labels->name; ?></a>
									</span>
								</div>
								<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>
								<div class="post-excerpt">
									<?php the_excerpt(); ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
							</div>
							<div class="medium-5 columns">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('large'); ?>
								</a>
							</div>
						</article>

					<?php endif; ?>

					<?php $counter++; ?>

				<?php endwhile; ?>
				
			<?php else: ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

			<?php endif; ?>

			<?php wp_reset_postdata(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentysixteen' ); ?></p>
			
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
