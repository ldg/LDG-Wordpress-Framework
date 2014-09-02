<?php 
/**
*
* content.php
*
* the default template for displaying content.
*
**/
 ?>
 <article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
	<header class="entry-header">
		<?php 
			/*if the post has a thumbnail and it isn't password protected
			then display the thumbnail*/
			if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<figure class="entry-thumbnail"><?php the_post_thumbnail(); ?></figure>
		<?php endif; ?>
		<?php /*If it is a single page, display the title
				Else, we display the title in a link*/ 
				if(is_single() ) : ?>
				<h1><?php the_title(); ?></h1>
			<?php else : ?>
				<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php endif; ?>

			<p class="entry-meta">
				<?php 
				//display the post meta info
				lost_post_meta(); 
				?>

			</p>
	</header> <!-- end .entry-header -->
	<div class="entry-content">
		<?php 
			if( is_search() ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading &rarr;', 'lost' ) );
				wp_link_pages();
			}
		 ?>
	</div> <!-- end .entry-content -->
	<!-- article footer -->
	<footer class="entry-footer">
		<?php 
			//if we have a single page and the author bio exists, display it
			if( is_single() && get_the_author_meta( 'description' ) ) {
				echo '<h2>' . __( 'Written by ', 'lost' ) . get_the_author() . '</h2>';
				echo '<p>' . the_author_meta('description' ) . '</p>';
			}
		 ?>
	</footer>
 </article>