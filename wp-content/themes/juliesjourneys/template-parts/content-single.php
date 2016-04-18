<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Julies_Journeys
 * @since Julies Journeys 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // twentysixteen_excerpt(); ?>

	<?php // twentysixteen_post_thumbnail(); ?>

	<?php 
		// echo '<pre>';
		// print_r($post);
		// print_r(get_post_meta(get_the_id()));
		$postType = get_post_type_object(get_post_type());
		// echo '</pre>'; 
	?>

	<div class="content-area post-single">
		
		<div class="row">

			<div class="small-12 columns">
				
				<div class="post-meta-single-category">
					<a href="/<?= $postType->labels->name; ?>"><?= $postType->labels->name; ?></a>
				</div>
				<div class="post-meta-single-title">
					<a href="<?php the_permalink(); ?>" class="post-title">
						<h2><?php the_title(); ?></h2>
					</a>
				</div>
			
			</div>

		</div>

		<div class="row">
			<div class="small-12 columns">
				<span class="post-meta-date"><?php the_date('M j, Y'); ?></span>
				<span class="post-meta-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
			</div>
		</div>

		<div class="row">
			<div class="small-12 columns sharebox">
				
				<a class="sharebox_btn heading_font" href="javascript:void(0);">
					Share
				</a>

				<div class="sharebox_links">
					<a class="social_link facebook" href="http://www.facebook.com/sharer.php?u=http://demo.evatheme.com/wp/voyager/demo/gallery-post-format-with-featured-images/&amp;t=Welcome to St-Yzans" title="Facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook"></i></a>
					<a class="social_link twitter" href="http://twitter.com/home?status=Welcome to St-Yzans http://demo.evatheme.com/wp/voyager/demo/gallery-post-format-with-featured-images/" title="Twitter" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter"></i></a>
					<a class="social_link linkedin" href="https://www.linkedin.com/cws/share?url=http://demo.evatheme.com/wp/voyager/demo/gallery-post-format-with-featured-images/&amp;title=Welcome to St-Yzans&amp;summary=Luxury e-retail giants Net-a-Porter and Yoox are combining companies, Yoox Group announced this morning. The all-share deal comes after rumors that Amazon was interested in buying Net-a-Porter. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Donec pede justo, fringilla vel, aliquet nec, […]" title="Linkedin Share" data-image="http://demo.evatheme.com/wp/voyager/demo/wp-content/uploads/2014/09/post22.jpg" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-linkedin"></i></a><script type="in/share" data-url="http://demo.evatheme.com/wp/voyager/demo/gallery-post-format-with-featured-images/" data-counter="right"></script>
					<a class="social_link google-plus" href="http://plus.google.com/share?url=http://demo.evatheme.com/wp/voyager/demo/gallery-post-format-with-featured-images/&amp;title=Welcome+to+St-Yzans" title="Google+" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
				</div>

			</div>
		</div>

		<div class="row container-content">
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

	<footer class="row entry-footer">
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
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
