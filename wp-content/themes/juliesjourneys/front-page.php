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

	// begin favs section

	$argsFavsSection = array(
		'category_name' => 'favorite',
		'posts_per_page' => '2',
		'orderby' => 'date'
	);

	$the_query_favs_section = new WP_Query( $argsFavsSection );

	// end favs section

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
							<span class="heading_font">Destinations</span>
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
							<span class="heading_font">Insights</span>
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
							<span class="heading_font">Eating Ethnic</span>
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
							<span class="heading_font">Favs</span>
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

<!-- begin favs -->

<section class="block-2">

	<?php if ( $the_query_favs_section->have_posts() ) : ?>

		<?php while ( $the_query_favs_section->have_posts() ) : $the_query_favs_section->the_post(); ?>

			<article class="row favorite">
				<div class="small-5 columns">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="small-7 columns">
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
				</div>

			</article>

		<?php endwhile; ?>
		
	<?php else: ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

	<?php endif; ?>

	<?php wp_reset_postdata(); ?>

</section>

<!-- end favs -->

<section>

	<div class="medium-12 columns">
		<div class="primary">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article <?php post_class( 'added-custom-post-class' ); ?>>

	                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	                <h2><?= get_the_excerpt(); ?></h2>

	                <ul class="post-meta no-bullet">
						<li class="author">
							<span class="wp_jj-avatar small">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 24); ?>
							</span>
								by <?php the_author_posts_link(); ?>
						</li>
						<!-- <li class="cat">in <?php the_category( ' ' ); ?></li>
						<li class="date">on <?php the_time('F j, Y'); ?></li> -->
	                </ul>

	                <?php if ( get_the_post_thumbnail() ) : ?>

						<div class="img-container">
							<?php the_post_thumbnail('large'); ?>
						</div>

					<?php endif; ?>

				</article>

			<?php endwhile; else : ?>

				<p><?php _e( 'Sorry, no pages found.' ); ?></p>

			<?php endif; ?>

		</div>
	</div>	

</section>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
