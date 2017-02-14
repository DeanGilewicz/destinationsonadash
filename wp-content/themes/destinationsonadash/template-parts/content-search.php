<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<div class="medium-12 columns">
	
	<?php //print_r($post); exit;?>

		<!-- <div class="entry-header"> -->
			<?php // the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<!-- </div> --><!-- .entry-header -->

		<?php // twentysixteen_post_thumbnail(); ?>

		<?php // twentysixteen_excerpt();

			if($post->post_parent) {
				$parentPage = get_post($post->post_parent);
			} else {
				$parentPage = 'none';
			}
			
		?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<?php $postType = get_post_type_object(get_post_type()); ?>

			<article class="found-search-item">

				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>

				<span class="post-meta-category">
					<a href="/<?= strtolower(str_replace(" ", "-", $postType->labels->name)); ?>"><?= $postType->labels->name; ?></a>
				</span>

				<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>

				<div class="post-meta">
					<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
					<span class="post-meta-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
				</div>

				<div class="post-excerpt">
					<?php the_excerpt(); ?>
				</div>
				
				<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>

			</article>

			<div class="entry-footer">
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
			</div><!-- .entry-footer -->

		<?php elseif ( strtolower(get_the_title($parentPage)) ) : ?>

			<?php
				// if post name is gallery then update layout 
				$postType = get_post_type_object(get_post_type());
			?>

			<div class="row">

				<div class="medium-12 columns">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>

				<div class="row">

					<div class="medium-12 columns">

						<div class="post-meta">
							<span class="post-meta-category">
								<a href="/<?= strtolower($postType->labels->name); ?>"><?= $postType->labels->name; ?></a>
							</span>
						</div>

						<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>

						<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
						<span class="post-meta-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>

						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>
						
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>

	 				</div>

	 			</div>

			</div>

			<div class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
							get_the_title()
						),
						'<div class="entry-footer"><span class="edit-link">',
						'</span></div><!-- .entry-footer -->'
					);
				?>
			</div><!-- .entry-footer -->

		<?php else : ?>

			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
						get_the_title()
					),
					'<div class="entry-footer"><span class="edit-link">',
					'</span></div><!-- .entry-footer -->'
				);
			?>

		<?php endif; ?>

	</div>

</article><!-- #post-## -->

