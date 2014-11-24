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
		* @link http://codex.wordpress.org/Post_Formats
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
		* @link http://codex.wordpress.org/Automatic_Feed_Links
		*
		**/
		add_theme_support('automatic-feed-links' );

		/**
		*
		* add theme support for post thumbnails
		*
		* @link http://codex.wordpress.org/Post_Thumbnails
		*
		**/
		add_theme_support('post-thumbnails' );

		/**
		*
		* Register nav menus
		*
		**/
		register_nav_menus( array(
		    'primary' => __( 'Primary Menu', 'lost' ),
		) );

		/**
		*
		* add support for custom backgrounds
		*
		* @link http://codex.wordpress.org/Custom_Backgrounds
		*
		**/
		$defaults = array(
			'default-color'          => 'ffffff',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => '',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		);
		add_theme_support( 'custom-background', $defaults );

		/**
		*
		* add support for custom header
		*
		* @link http://codex.wordpress.org/Custom_Headers
		*
		**/
		$defaults = array(
			'default-image'          => '',
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => false,
			'uploads'                => true,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => '',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-header', $defaults );
		
		
		
		
	}

	add_action( 'after_setup_theme', 'ldg_setup' );
}