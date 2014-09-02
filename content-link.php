<?php 
/**
*
* content-link.php
*
* the default template for displaying posts with the link post format.
*
**/
 ?>
 <article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
	
	<div class="entry-content">
		<?php 
			the_content( __( 'Continue reading &rarr;', 'lost' ) );
			wp_link_pages();
		?>
	</div> <!-- end .entry-content -->
	<!-- article footer -->
	<footer class="entry-footer">
	<p class="entry-meta">
		<?php 
		//display the post meta info
		lost_post_meta(); 
		?>
	</p>
		<?php 
		//if we have a single page and the author bio exists, display it
		if( is_single() && get_the_author_meta( 'description' ) ) {
			echo '<h2>' . __( 'Written by ', 'lost' ) . get_the_author() . '</h2>';
			echo '<p>' . the_author_meta('description' ) . '</p>';
		}
	 	?>
	</footer>
 </article>