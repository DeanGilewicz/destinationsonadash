<?php // THIS IS THE TEMPLATE FOR ROOT

	// set up hero feature img slider

	$argsHomePosts = array(
		'posts_per_page' => '-1',
		'tag' => 'featured'
	);

	$the_query_home = new WP_Query( $argsHomePosts );

	// set up trip params
	// $argsTrip = array(
	// 	'post_type' => 'trips',
	// 	'posts_per_page' => '1',
	// 	'orderby' => 'date'
	// );
	// // set up eating ethnic params
	// $argsFood = array(
	// 	'post_type' => 'eating_ethnic',
	// 	'posts_per_page' => '1',
	// 	'orderby' => 'date'
	// );
	// // set up ideas params
	// $argsIdeas = array(
	// 	'post_type' => 'insights',
	// 	'category_name' => 'my-likes',
	// 	'posts_per_page' => '1',
	// 	'orderby' => 'date'
	// );
	// // set up ideas params
	// $argsIdeas = array(
	// 	'posts_per_page' => '-1',
	// 	'category_name' => 'my-likes',
	// 	'posts_per_page' => '1',
	// 	'orderby' => 'date'
	// );

	// $the_query_trip = new WP_Query( $argsTrip );
	// $the_query_food = new WP_Query( $argsFood );
	// $the_query_ideas = new WP_Query( $argsIdeas );
?>

<?php get_header(); ?>

<!-- begin slider -->

<?php if ( $the_query_home->have_posts() ) : ?>

	<?php $postNum = 0; ?>

	<div class="slider">

		<div class="slides">
		
			<?php while ( $the_query_home->have_posts() ) : $the_query_home->the_post(); ?>
				
				<?php 
					$postNum++;
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
					$url = $thumb['0'];
				?>

				<div class="slide-<?= $postNum; ?> <?= ($postNum == 1) ? 'active' : ''; ?>" style="background-image: url('<?= $url; ?>');">
					<div class="mask"></div>
					<div class="row">
						<div class="medium-12 columns">
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
				<div class="medium-12 columns">

				<?php $postNum = 0; ?>

				<?php while ( $the_query_home->have_posts() ) : $the_query_home->the_post(); ?>

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

<!-- <section class="row categories">
	<div class="medium-4 columns">

		<h2>My Trips</h2>

		<?php if ( $the_query_trip->have_posts() ) : ?>

			<ul>
				<?php while ( $the_query_trip->have_posts() ) : $the_query_trip->the_post(); ?>

				<a href="<?php the_permalink(); ?>">
					<li> 
						<?php echo the_post_thumbnail(); ?>
						<h3><?php echo the_title(); ?></h3>
					</li>
				</a>

				<?php endwhile; ?>
			</ul>

		<a href="/category/travel" class="link-to-cat">See all trips</a>
	
		<?php else: ?>

			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

		<?php endif; ?>
	
		<?php wp_reset_postdata(); ?>

	</div>

	<div class="medium-4 columns">

		<h2>Eating Ethnic</h2>

		<?php if ( $the_query_food->have_posts() ) : ?>
				
			<ul>
				<?php while ( $the_query_food->have_posts() ) : $the_query_food->the_post(); ?>
	
				<a href="<?php the_permalink(); ?>">
					<li> 
						<?php echo the_post_thumbnail(); ?>
						<h3><?php echo the_title(); ?></h3>
					</li>
				</a>

				<?php endwhile; ?>
			</ul>

		<a href="/category/eating-ethnic" class="link-to-cat">See all eats</a>
	
		<?php else: ?>

			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

		<?php endif; ?>
	
		<?php wp_reset_postdata(); ?>

	</div>

	<div class="medium-4 columns">

		<h2>My Likes</h2>

		<?php if ( $the_query_ideas->have_posts() ) : ?>
				
			<ul>
				<?php while ( $the_query_ideas->have_posts() ) : $the_query_ideas->the_post(); ?>
	
				<a href="<?php the_permalink(); ?>">
					<li> 
						<?php echo the_post_thumbnail(); ?>
						<h3><?php echo the_title(); ?></h3>
					</li>
				</a>

				<?php endwhile; ?>
			</ul>

		<a href="/category/my-likes" class="link-to-cat">See all likes</a>
	
		<?php else: ?>

			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

		<?php endif; ?>
	
		<?php wp_reset_postdata(); ?>

	</div>

</section> -->

fix commented out code above

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
