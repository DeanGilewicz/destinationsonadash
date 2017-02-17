<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage DestinationsOnADash
 * @since DestinationsOnADash 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // twentysixteen_excerpt(); ?>

	<?php // twentysixteen_post_thumbnail(); ?>

	<?php 
		$postType = get_post_type_object(get_post_type());
	?>

	<div class="content-area post-single post-single-quote">
		
		<div class="row">

			<div class="small-12 columns">
				
				<div class="post-meta-single-category">
					<a href="/<?= $postType->labels->name; ?>"><?= $postType->labels->name; ?></a>
				</div>
				<div class="post-meta-single-title">
					<a href="<?php the_permalink(); ?>" class="post-title">
						<!-- <h2><?php the_title(); ?></h2> -->
						<h2>...</h2>
					</a>
				</div>
			
			</div>

		</div>

		<div class="row">
			<div class="small-12 columns">
				<div class="container_custom_post_meta">
					<span class="post-meta-date"><span>Posted On:</span> <?php the_date('M j, Y'); ?></span>
				</div>
			</div>
		</div>

		<div class="row container_content">
			<div class="small-12 columns">
				<?php the_content(); ?>
			</div>
		</div>	

		<?php
			// wp_link_pages( array(
			// 	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
			// 	'after'       => '</div>',
			// 	'link_before' => '<span>',
			// 	'link_after'  => '</span>',
			// 	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
			// 	'separator'   => '<span class="screen-reader-text">, </span>',
			// ) );

			// if ( '' !== get_the_author_meta( 'description' ) ) {
			// 	get_template_part( 'template-parts/biography' );
			// }
		?>

	</div><!-- .entry-content -->

	<div class="row entry-footer">
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
