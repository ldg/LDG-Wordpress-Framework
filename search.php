<?php 
/**
*
* search.php
*
* The template for displaying the search results.
*
**/
?>

<?php get_header(); ?>
	
	<div class="main-content col-md-8" role="main">
		<?php if( have_posts() ) : ?>
			<header class="page-header">
				<h1>
					<?php 
					printf( __( 'Search Results for &quot;%s&quot;', 'lost'), get_search_query() ); 
					?>
				</h1>
				

			</header>
			<?php while( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php lost_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
	</div>
	<!-- /.main-content col-md-8 -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>