<?php
/**
* -----------------------------------------------------------------------
* 4.0 - Set up theme defaults and register various supported features
* -----------------------------------------------------------------------
*/
if ( ! function_exists( 'ldg_setup') ) {
	function ldg_setup() {
		
		/**
		*
		* Make theme available for translation
		*
		**/
		$lang_dir = THEMEROOT . '/lang';
		load_theme_textdomain( 'lost', $lang_dir );

		/**
		*
		* add theme support
		*
		**/
		add_theme_support('post-formats',
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio'
				) 
			);
		/**
		*
		* add support for automatic feed links
		*
		**/
		add_theme_support('automatic-feed-links' );

		/**
		*
		* add theme support for post thumbnails
		*
		**/
		add_theme_support('post-thumbnails' );

		/**
		*
		* Register nav menus
		*
		**/
		// register_nav_menus( 
		// 	array(
		// 		'main-menu' => __( 'Main Menu', 'lost')

		// 		) 
		// 	);
		register_nav_menus( array(
		    'primary' => __( 'Primary Menu', 'lost' ),
		) );
		
	}

	add_action( 'after_setup_theme', 'ldg_setup' );
}