<?php 
/**
*
* category.php
*
* The template for displaying the category pages.
*
**/
?>

<?php get_header(); ?>
	
	<div class="main-content col-md-8" role="main">
		<?php if( have_posts() ) : ?>
			<header class="page-header">
				<h1>
					<?php 
					printf( __( 'Category Archives for &quot;%s&quot;', 'lost'), single_cat_title( '', false ) ); 
					?>
				</h1>
				
				<?php // Show an optional category description
				 if( category_description() ) {
				 	echo '<p>' . category_description() . '</p>';
				 	} ?>

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