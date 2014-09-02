<?php 
/**
*
* comments.php
*
* The template for displaying comments.
*
**/
?>

<?php 
	//prevent the direct opening of the comments.php
	if( ! empty( $_SERVER['SCRIPT-FILENAME']) && basename( $_SERVER['SCRIPT-FILENAME']) == 'comments.php') {
		die( __( 'You cannot access this page directly.', 'lost' ) );
	}
?>

<?php 
	//If the post is password protected, display info text and return.
	if( post_password_required() ) : ?>
		<p>
			<?php  
				_e( 'This post is password protected. Enter the password to view the comments', 'lost' );

				return;
			?>
		</p>
<?php endif; ?>

<!-- Comments area -->
<div class="comments-area" id="comments">
	<?php if( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php 
				printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'Comments title', 'lost' ), number_format_i18n( get_comments_number() ) );
			 ?>
		</h2>
	
	<ol class="comments">
		<?php wp_list_comments(); ?>
	</ol>
		<?php 
			//if the pages are paginated, display the controls
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

			<nav class="comment-nav" role="navigation">
				<p class="comment-nav-prev">
					<?php previous_comments_link( __( '&larr; Older Comments', 'lost' ) ); ?>
				</p>
				<p class="comment-nav-next">
					<?php next_comments_link( __( 'Newer Comments &rarr;', 'lost' ) ); ?>
				</p>
			</nav> <!-- end comment-nav -->
		<?php endif; ?>

		<?php 
			//if comments are closed, display some info text
			if( ! comments_open() && get_comments_number() ) : ?>

			<p class="no-comments">
				<?php _e( 'Comments are closed.', 'lost' ); ?>
			</p>

		<?php endif; ?>
	<?php endif; ?>

	<?php //display the comments form
		comment_form();
	?>

	
</div>
<!-- /#comments.comments-area -->