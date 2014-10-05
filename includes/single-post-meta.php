<?php
/**
* -----------------------------------------------------------------------------------
* 5.0 - Display the meta information for a single post
* -----------------------------------------------------------------------------------
*/
if( ! function_exists( 'lost_post_meta' ) ) {
	function lost_post_meta() {
		echo '<ul class="list-inline entry-meta">';

		if( get_post_type() === 'post' ) {
			//if the post is sticky
			if( is_sticky() ) {
				echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'lost') . '</li>';
			}

			//Get the post author
			printf(
				'<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
				);

			//Get the date
			echo '<li class="meta-date">' .  get_the_date()  . '</li>';

			//The categories
			$category_list = get_the_category_list( ', ');
			if($category_list) {
				echo '<li class="meta-categories">' . $category_list . '</li>';
			}

			//The tags
			$tag_list = get_the_tag_list(' ', ', ');
			if($tag_list) {
				echo '<li class="meta-tags">' . $tag_list . '</li>';
			}

			//comments link
			if( comments_open() ) {
				echo '<li>';
				echo '<span class="meta-reply">';
				comments_popup_link( __( 'Leave a Comment', 'lost' ), __( 'One comment so far', 'lost' ), __( 'View all % comments', 'lost') );
				echo '</span>';
				echo '</li>';
			}

			//edit link
			if( is_user_logged_in() ) {
				echo '<li>';
				edit_post_link( __( 'Edit', 'lost' ), '<span class="meta-edit">', '</span>' );
				echo '</li>';
			}
		}
	}
}