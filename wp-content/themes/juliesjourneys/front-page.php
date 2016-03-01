<?php // THIS IS THE TEMPLATE FOR ROOT

	// begin set up hero img slider feature

	$argsSlider = array(
		'posts_per_page' => '-1',
		'tag' => 'featured'
	);

	$the_query_slider = new WP_Query( $argsSlider );

	// end set up

	// begin set up taxonomy box sections

	$argsTrips = array(
		'posts_per_page' => '1',
		'orderby' => 'date'
	);

	$the_query_trip = new WP_Query( $argsTrips );

	$argsEatingEthnic = array(
		'post_type' => 'eating_ethnic',
		'posts_per_page' => '1',
		'orderby' => 'date'
	);

	$the_query_food = new WP_Query( $argsEatingEthnic );

	$argsInsights = array(
		'post_type' => 'insights',
		'posts_per_page' => '1',
		'orderby' => 'date'
	);

	$the_query_insights = new WP_Query( $argsInsights );

	$argsFavs = array(
		'category_name' => 'favorite',
		'posts_per_page' => '1',
		'orderby' => 'date'
	);

	$the_query_favs = new WP_Query( $argsFavs );

	// end set up

	// begin home posts section

	$argsHomePosts = array(
		'post_type' => array('post', 'insights', 'eating_ethnic'),
		'category_name' => 'home-post',
		'posts_per_page' => '4',
		'orderby' => 'date'
	);

	$the_query_home_posts = new WP_Query( $argsHomePosts );

	// end home posts section

	// begin quote section

	$argsHomeQuotes = array(
		'post_type' => 'quotes',
		'posts_per_page' => '1',
		'orderby' => 'rand'
	);

	$the_query_home_quotes = new WP_Query( $argsHomeQuotes );

	// end quote section

	// begin all latest posts section (not in home-post cat, not in featured tag)

	$argsAllPosts = array(
		'post_type' => array('post', 'insights', 'eating_ethnic'),
		'category__not_in' => '344',
		'tag__not_in' => '10',
		'posts_per_page' => '3',
		'orderby' => 'date'
	);

	$the_query_all_posts = new WP_Query( $argsAllPosts );

	// exit;

	// end all latest posts section

?>

<?php get_header(); ?>

<!-- begin slider -->

<?php if ( $the_query_slider->have_posts() ) : ?>

	<?php $postNum = 0; ?>

	<div class="slider">

		<div class="slides">
		
			<?php while ( $the_query_slider->have_posts() ) : $the_query_slider->the_post(); ?>
				
				<?php 
					$postNum++;
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
					$url = $thumb['0'];
				?>

				<div class="slide-<?= $postNum; ?> <?= ($postNum == 1) ? 'active' : ''; ?>" style="background-image: url('<?= $url; ?>');">
					<div class="mask"></div>
					<div class="row">
						<div class="small-12 columns">
							<div class="content-of-slide">

								<h2><?php the_title(); ?></h2>
								<?php the_excerpt(); ?>
								<a class="button" href="<?php the_permalink(); ?>">See Trip</a>

							</div>
						</div>
					</div>
				</div>

			<?php endwhile; ?>

		</div>

		<div class="progress-of-slides">
			<div class="row">
				<div class="small-12 columns">

				<?php $postNum = 0; ?>

				<?php while ( $the_query_slider->have_posts() ) : $the_query_slider->the_post(); ?>

					<?php $postNum++; ?>

					<div class="progress-btn <?php echo ($postNum == 1) ? 'active' : ''; ?>"><?php the_title(); ?></div>

				<?php endwhile; ?>

				</div>
			</div>
		</div>

	</div>

	<?php wp_reset_postdata(); ?>

<?php endif; ?>

<!-- end slider -->

<!-- begin feature taxonomies / categories -->

<section class="block-1">

	<div class="row">

		<div class="small-3 columns item">

			<?php if ( $the_query_trip->have_posts() ) : ?>

				<?php while ( $the_query_trip->have_posts() ) : $the_query_trip->the_post(); ?>

					<!-- <a href="<?php the_permalink(); ?>"> -->
					<a href="/destinations">

						<?php the_post_thumbnail(); ?>
						<div class="item-description">
							<span>Destinations</span>
							<p>All Posts</p>
						</div>
						<span class="overlay-border"></span>
					</a>

				<?php endwhile; ?>
		
			<?php else: ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

			<?php endif; ?>
		
			<?php wp_reset_postdata(); ?>

		</div>

		<div class="small-3 columns item">

			<?php if ( $the_query_insights->have_posts() ) : ?>

				<?php while ( $the_query_insights->have_posts() ) : $the_query_insights->the_post(); ?>

					<!-- <a href="<?php the_permalink(); ?>"> -->
					<a href="/insights">

						<?php the_post_thumbnail(); ?>
						<div class="item-description">
							<span>Insights</span>
							<p>All Posts</p>
						</div>
						<span class="overlay-border"></span>
					</a>

				<?php endwhile; ?>
		
			<?php else: ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

			<?php endif; ?>
		
			<?php wp_reset_postdata(); ?>

		</div>

		<div class="small-3 columns item">

			<?php if ( $the_query_food->have_posts() ) : ?>

				<?php while ( $the_query_food->have_posts() ) : $the_query_food->the_post(); ?>

					<!-- <a href="<?php the_permalink(); ?>"> -->
					<a href="/eating-ethnic">

						<?php the_post_thumbnail(); ?>
						<div class="item-description">
							<span>Eating Ethnic</span>
							<p>All Posts</p>
						</div>
						<span class="overlay-border"></span>
					</a>

				<?php endwhile; ?>
		
			<?php else: ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

			<?php endif; ?>
		
			<?php wp_reset_postdata(); ?>

		</div>

		<div class="small-3 columns item">

			<?php if ( $the_query_favs->have_posts() ) : ?>

				<?php while ( $the_query_favs->have_posts() ) : $the_query_favs->the_post(); ?>

					<!-- <a href="<?php the_permalink(); ?>"> -->
					<a href="/favorites">

						<?php the_post_thumbnail(); ?>
						<div class="item-description">
							<span>Favs</span>
							<p>All Posts</p>
						</div>
						<span class="overlay-border"></span>
					</a>

				<?php endwhile; ?>
		
			<?php else: ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

			<?php endif; ?>
		
			<?php wp_reset_postdata(); ?>

		</div>

	</div>

</section>

<!-- end begin feature taxonomies / categories -->

<!-- begin selected home posts -->

<section class="block-2">

	<?php if ( $the_query_home_posts->have_posts() ) : ?>

		<?php $counter = 0; ?>

		<?php while ( $the_query_home_posts->have_posts() ) : $the_query_home_posts->the_post(); ?>
			
			<?php 
				$postType = get_post_type_object(get_post_type());
				// echo '<pre>'; print_r($postType);
			?>

			<?php if ($counter % 2 === 0) : ?>

				<article class="row home-post ltr">
					<div class="small-5 columns">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('large'); ?>
						</a>
					</div>
					<div class="small-7 columns">
						<div class="post-meta">
							<span class="post-meta-category">
								<a href="/<?= $postType->labels->name; ?>"><?= $postType->labels->name; ?></a>
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
				</article>

			<?php else: ?>

				<article class="row home-post rtl">
					<div class="small-7 columns">
						<div class="post-meta">
							<!-- <span class="post-meta-comments"><?php comments_number( '0', '1', '%' ); ?></span> -->
							<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
							<span class="post-meta-category">
								<a href="/<?= $postType->labels->name; ?>"><?= $postType->labels->name; ?></a>
							</span>
						</div>
						<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>
						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					</div>
					<div class="small-5 columns">
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

</section>

<!-- end selected home posts -->

<!-- begin quotes section -->

<section class="block-3">

	<div class="row">

		<div class="small-12 columns quote">

			<?php if ( $the_query_home_quotes->have_posts() ) : ?>

				<?php while ( $the_query_home_quotes->have_posts() ) : $the_query_home_quotes->the_post(); ?>

					<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>

					<a href="/quotes">

						<div class="bg" style="background-image: url('<?= $src[0]; ?>')"></div>
						<div class="quote-description">
							<img src="http://placehold.it/60x60?text=ll">
							<p><?php the_date('M j, Y'); ?></p>
							<span><?= get_the_content(); ?></span>
							<p>Author</p>
						</div>
						<span class="overlay-border"></span>

					</a>

				<?php endwhile; ?>
		
			<?php else: ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

			<?php endif; ?>

			<?php wp_reset_postdata(); ?>

		</div>

	</div>

</section>

<!-- end quotes section -->

<!-- begin all latest posts (except chosen as home post) -->

<section class="block-4">

	<?php if ( $the_query_all_posts->have_posts() ) : ?>

		<?php $counter = 0; ?>

		<?php while ( $the_query_all_posts->have_posts() ) : $the_query_all_posts->the_post(); ?>
			
			<?php 
				$postType = get_post_type_object(get_post_type());
				// $postCats = get_the_category();
				// $postTags = get_the_tags();
				// echo '<pre>'; print_r($postCats);
				// echo '<pre>'; print_r($postTags);
			?>

			<?php if ($counter % 2 === 0) : ?>

				<article class="row home-post ltr">
					<div class="small-5 columns">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('large'); ?>
						</a>
					</div>
					<div class="small-7 columns">
						<div class="post-meta">
							<span class="post-meta-category">
								<a href="/<?= $postType->labels->name; ?>"><?= $postType->labels->name; ?></a>
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
				</article>

			<?php else: ?>

				<article class="row home-post rtl">
					<div class="small-7 columns">
						<div class="post-meta">
							<!-- <span class="post-meta-comments"><?php comments_number( '0', '1', '%' ); ?></span> -->
							<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
							<span class="post-meta-category">
								<a href="/<?= $postType->labels->name; ?>"><?= $postType->labels->name; ?></a>
							</span>
						</div>
						<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>
						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					</div>
					<div class="small-5 columns">
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

</section>

<!-- end all latest posts -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
