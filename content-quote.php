<?php 
/**
*
* content-quote.php
*
* the default template for displaying posts with the quote post format.
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
	</footer>
 </article>