<?php
/**
	* The template for displaying comments
	*
	* The area of the page that contains both current comments
	* and the comment form.
	*
	* @package WordPress
	* @subpackage JuliesJourneys
	* @since JuliesJourneys 1.0
*/

/*
	* If the current post is protected by a password and
	* the visitor has not yet entered the password we will
	* return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<div class="row">
		<div class="small-12 columns">

			<?php if ( have_comments() ) : ?>

				<?php $comments_number = get_comments_number(); ?>

				<div class="container-comment-area">

					<div class="container-comments-title">
						
						<h2 class="comments-title">
							<?php
								if ( 1 === $comments_number ) {
									printf( _x( 'Comment on %s', 'comments title', 'juliesjourneys' ), get_the_title() );
								} else {
									printf( _x( 'Comments on %s', 'comments title', 'juliesjourneys' ), get_the_title() );	
								}
							?>
						</h2>
						<h6>
							<?php
								if ( 1 === $comments_number ) {
									echo '1 comment';
								} else {
									printf(
										/* translators: 1: number of comments, 2: post title */
										_nx(
											'%1$s comment',
											'%1$s comments',
											$comments_number,
											'comments title',
											'juliesjourneys'
										),
										number_format_i18n( $comments_number ),
										get_the_title()
									);
								}
							?>
						</h6>

					</div>

					<?php the_comments_navigation(); ?>

					<ul class="container-comment-list">
						<?php
							wp_list_comments( array(
								'callback'	  => 'julies_journeys_custom_comments',
								'style'       => 'ul',
								'short_ping'  => true,
								'avatar_size' => 42
							) );
						?>
					</ul><!-- .comment-list -->

					<?php the_comments_navigation(); ?>

				</div>

			<?php endif; // Check for have_comments(). ?>

			<?php
				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
				<p class="no-comments"><?php _e( 'Comments are closed.', 'juliesjourneys' ); ?></p>
			<?php endif; ?>

			<?php

				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? " aria-required='true'" : '' );

				$fields =  array(

					'author' =>
						'<p class="comment-form-author">
							<input id="author" name="author" type="text" placeholder="Name *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
						</p>',

					'email' =>
						'<p class="comment-form-email">
							<input id="email" name="email" type="text" placeholder="Email *" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />
						</p></div>'

					// 'url' =>
					// 	'<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
					// 	'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
					// 	'" size="30" /></p>'
				);

				// Comment form for users to leave a comment
				comment_form( array(
					'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
					'title_reply'        => 'Leave a Comment',
					'title_reply_after'  => '</h2>',
					'comment_field' 	 => '<p class="comment-form-comment">
		    									<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Comment *"></textarea>
		    								</p>',
		    		'comment_notes_after' => '<div class="respond-inputs">',
		    		'fields' => apply_filters( 'comment_form_default_fields', $fields )
				) );
			?>

		</div>

	</div>

</div><!-- .comments-area -->
