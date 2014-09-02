<?php 
/**
*
* 404.php
*
* The template for showing 404 pages (not found pages)
*
**/
?>

<?php get_header(); ?>

<div class="container-404">
	
	<h1><?php _e( 'Error 404 - Page Not Found', 'lost'); ?></h1>
	<p><?php _e( 'It looks like nothing was found here, maybe try a search', ('lost')); ?></p>
	<?php get_search_form(); ?>
</div>
<!-- /.container-404 -->

<?php get_footer(); ?>