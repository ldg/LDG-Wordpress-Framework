<?php 
/**
*
* template-full-width.php
*
* Template Name: Full Width Template
*
**/
?>

<?php get_header(); ?>

	<div class="main-content col-md-12" role="main">
		<?php while( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
				<!-- article header -->
				<header class="entry-header">
					<?php 
						/*if the post has a thumbnail and it isn't password protected
						then display the thumbnail*/
						if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<figure class="entry-thumbnail"><?php the_post_thumbnail(); ?></figure>
					<?php endif; ?>

					<h1><?php the_title(); ?></h1>

						
				</header> <!-- end .entry-header -->
				<div class="entry-content">
					<?php 
						the_content();
						wp_link_pages();
					 ?>
				</div> <!-- end .entry-content -->
				<!-- article footer -->
				<footer class="entry-footer">
					<?php 
						//edit link
						if( is_user_logged_in() ) {
							echo '<p>';
							edit_post_link( __( 'Edit', 'lost' ), '<span class="meta-edit">', '</span>' );
							echo '</p>';
						}
					 ?>
				</footer>
			</article>
			<?php comments_template(); ?>
		<?php endwhile; ?>
	</div>
	<!-- /.main-content col-md-12 -->



<?php get_footer(); ?>