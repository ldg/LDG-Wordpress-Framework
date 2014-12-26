<?php
/**
* -----------------------------------------------------------------------------------
* 10.0 - Load the custom scripts for the theme
* -----------------------------------------------------------------------------------
*/
if( ! function_exists( 'lost_scripts' ) ) {
	function lost_scripts() {
		//support for pages with threaded comments
		if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		//register scripts
		wp_register_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', array('jquery'), false, true );
		wp_register_script( 'lost-custom-js', SCRIPTS . '/custom.js', array( 'jquery' ), false, true );
		//load the scripts
		wp_enqueue_script( 'bootstrap-js' );
		wp_enqueue_script( 'lost-custom-js' );
		//load stylesheets
		wp_enqueue_style( 'font-awesome', THEMEROOT . '/assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'lost-main', THEMEROOT . '/assets/css/main.min.css' );

	}

	add_action( 'wp_enqueue_scripts', 'lost_scripts' );
}