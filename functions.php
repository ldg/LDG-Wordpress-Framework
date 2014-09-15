<?php 
/**
*functions.php
*
*Lost Dog Framework's functions and definitions
*/

// ini_set('display_errors',1); 
//  error_reporting(E_ALL);


/**
* ----------------------------------------------------------------------
* 1.0 - Define Constants
* ----------------------------------------------------------------------
*/
define('THEMEROOT', get_stylesheet_directory_uri() );
define('IMAGES', THEMEROOT . '/assets/img' );
define('SCRIPTS', THEMEROOT . '/assets/js' );
define('FRAMEWORK', get_template_directory() . '/assets/framework' );


/**
* ----------------------------------------------------------------------
* 2.0 - Load the framework
* ----------------------------------------------------------------------
*/
require_once( FRAMEWORK . '/init.php');


/**
* -----------------------------------------------------------------------
* 3.0 - Setting up the content width value based on the theme's design
* -----------------------------------------------------------------------
*/
if( ! isset( $content_width ) ) {
	$content_width = 800;
}


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

/**
* -----------------------------------------------------------------------------------
* 5.0 - Display the meta information for a single post
* -----------------------------------------------------------------------------------
*/
if( ! function_exists( 'lost_post_meta' ) ) {
	function lost_post_meta() {
		echo '<ul class="list-inline entry-meta">';

		if( get_post_type() === 'post' ) {
			//if the post is sticky
			if( is_sticky() ) {
				echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'lost') . '</li>';
			}

			//Get the post author
			printf(
				'<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
				);

			//Get the date
			echo '<li class="meta-date">' .  get_the_date()  . '</li>';

			//The categories
			$category_list = get_the_category_list( ', ');
			if($category_list) {
				echo '<li class="meta-categories">' . $category_list . '</li>';
			}

			//The tags
			$tag_list = get_the_tag_list(' ', ', ');
			if($tag_list) {
				echo '<li class="meta-tags">' . $tag_list . '</li>';
			}

			//comments link
			if( comments_open() ) {
				echo '<li>';
				echo '<span class="meta-reply">';
				comments_popup_link( __( 'Leave a Comment', 'lost' ), __( 'One comment so far', 'lost' ), __( 'View all % comments', 'lost') );
				echo '</span>';
				echo '</li>';
			}

			//edit link
			if( is_user_logged_in() ) {
				echo '<li>';
				edit_post_link( __( 'Edit', 'lost' ), '<span class="meta-edit">', '</span>' );
				echo '</li>';
			}
		}
	}
}

/**
* -----------------------------------------------------------------------------------
* 6.0 - Display navigation to the next/previous posts
* -----------------------------------------------------------------------------------
*/
if( ! function_exists( 'lost_paging_nav' )) {
	function lost_paging_nav() { ?>
	<ul>
		<?php if( get_previous_posts_link() ) :?>
			<li class="next">
				<?php previous_posts_link( __( 'Newer Posts &rarr;', 'lost') ); ?>
			</li>
		<?php endif; ?>
		<?php if( get_next_posts_link() ) :?>
			<li class="previous">
				<?php next_posts_link( __( '&larr; Older Posts', 'lost') ); ?>
			</li>
		<?php endif; ?>
	</ul> <?php

	}
}

/**
* -----------------------------------------------------------------------------------
* 7.0 - Register the widget areas
* -----------------------------------------------------------------------------------
*/
if( ! function_exists( 'lost_widget_init' ) ) {
	function lost_widget_init() {
		if( function_exists( 'register_sidebar' ) ) {
			
			register_sidebar(
				array(
						'name' => __( 'Main Widget Area', 'lost' ),
						'id' => 'sidebar-1',
						'description' => __( 'Appears on posts and pages', 'lost'),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div><!-- end .widget -->',
						'before_title' => '<h5 class="widget-title">',
						'after_title' => '</h5>',
					)
				);

		register_sidebar(
				array(
						'name' => __( 'Footer Widget Area', 'lost' ),
						'id' => 'sidebar-2',
						'description' => __( 'Appears on the footer', 'lost'),
						'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
						'after_widget' => '</div><!-- end .widget -->',
						'before_title' => '<h5 class="widget-title">',
						'after_title' => '</h5>',
					)
			);
		}
	}

	add_action( 'widgets_init', 'lost_widget_init' );
}

/**
* -----------------------------------------------------------------------------------
* 8.0 - Incude the generated css in the header
* -----------------------------------------------------------------------------------
*/
if( ! function_exists( 'lost_load_wp_head') ) {
	function lost_load_wp_head() {
		//get logo2
		$logo = IMAGES . '/logo.png';
		$logo_retina = IMAGES . '/logo@2x.png';
		//logo size
		$logo_size = getimagesize( $logo );
		?>
		
		<!-- Logo CSS -->
		<style type="text/css">
			.site-logo a {
				background: transparent url( <?php echo $logo; ?> ) 0 0 no-repeat;
				width: <?php echo $logo_size[0] ?>px;
				height: <?php echo $logo_size[1] ?>px;
				display: inline-block;
			}

			@media only screen and (-webkit-min-device-pixel-ratio: 1.5),
			only screen and (-moz-min-device-pixel-ratio: 1.5),
			only screen and (-o-min-device-pixel-ratio: 3/2),
			only screen and (min-device-pixel-ratio: 1.5) {
				.site-logo a {
				background: transparent url( <?php echo $logo_retina; ?> ) 0 0 no-repeat;
				background-size: <?php echo $logo_size[0]; ?>px <?php echo $logo_size[1]; ?>px;
				}
			}



		</style>
		
		<?php
	}

	add_action( 'wp_head', 'lost_load_wp_head' );
}
/**
* -----------------------------------------------------------------------------------
* 9.0 - Enable the bootstrap nav walker
* -----------------------------------------------------------------------------------
*/
require_once('wp_bootstrap_navwalker.php');

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
		wp_enqueue_style( 'lost-main', THEMEROOT . '/assets/css/main.css' );

	}

	add_action( 'wp_enqueue_scripts', 'lost_scripts' );
}

/**
* -----------------------------------------------------------------------------------
* 11.0 - add support for 250x250 thumbs
* -----------------------------------------------------------------------------------
*/
function my_image_sizes($sizes) {
    $addsizes = array(
        "square-large" => __( "Large square image")
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}

/**
* -----------------------------------------------------------------------------------
* 12.0 - limit the word count in excerpts
* -----------------------------------------------------------------------------------
*/
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

/**
* -----------------------------------------------------------------------------------
* 13.0 - Customize the Wordpress login
* -----------------------------------------------------------------------------------
*/
function al_login_log() { 
		$logo = get_stylesheet_directory_uri() . '/assets/img/login_logo.png';
		//logo size
		$logo_size = getimagesize( $logo );
	?>
    <style type="text/css">
    	body.login { background-color: #f4eedc; color: #847E6E;}
    	body.login div#login form#loginform { 
    		border-radius: 8px; 
    		background-color: #E9DEBE; 
    		box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); 
    		padding-left: 30px;
    		padding-right: 30px;
    		width: 250px;
    	}
    	body.login div#login form#loginform input {
    		border-radius: 8px;
    		border: 1px solid #E9DEBE;
    		padding: 8px;
    	}
        body.login div#login h1 a {
            background: transparent url( <?php echo $logo; ?> ) 0 0 no-repeat;;
            width: <?php echo $logo_size[0] ?>px;
			height: <?php echo $logo_size[1] ?>px;
            padding-bottom: 0px;
        }
        body.login div#login form#loginform p.submit input#wp-submit {
        	padding: 0px 12px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'al_login_log' );

/**
* -----------------------------------------------------------------------------------
* 14.0 - Add Editor CSS
* -----------------------------------------------------------------------------------
*/
function al_add_editor_styles() {
 // **** add google webfont links ******
 // $font_url = urlencode( 'http://fonts.googleapis.com/css?family=Lato:100,300,400|Patua+One' );
 // add_editor_style( $font_url );
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'al_add_editor_styles' );

/**
* -----------------------------------------------------------------------------------
* 15.0 - Include plugin activation
* -----------------------------------------------------------------------------------
*/

include('includes/plugin_activation.php');

