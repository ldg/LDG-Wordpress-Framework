<?php 
/**
*
* header.php
*
* the header for the the theme
*
**/
?>
<?php 
	//get favicon
	$favicon = IMAGES . '/assets/img/icons/favicon.png';

	//get custom touch icon
	$touch_icon = IMAGES . '/assets/img/icons/apple-touch-icon-152x152-precomposed.png';
 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title( '|', true, 'right' ); ?></title> 
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon and Apple Icons -->
        <link rel="shortcut icon" href="<?php echo $favicon; ?>">
        <link rel="apple-touch-icon-precomposed" size="152x152" href="<?php echo $touch_icon; ?>">
		
	<?php wp_head(); ?>
	</head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- HEADER -->
    <header class="site-header" role="banner">
    	<div class="container-fluid header-contents">
    		<div class="row">
    			
    				<nav class="navbar navbar-default" role="navigation">
                      <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#lost-bs-navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="<?php echo home_url(); ?>">
                                    <?php bloginfo('name'); ?>
                                </a>
                        </div>

                            <?php
                                wp_nav_menu( array(
                                    'menu'              => 'primary',
                                    'theme_location'    => 'primary',
                                    'depth'             => 2,
                                    'container'         => 'div',
                                    'container_class'   => 'collapse navbar-collapse',
                                    'container_id'      => 'lost-bs-navbar',
                                    'menu_class'        => 'nav navbar-nav',
                                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                    'walker'            => new wp_bootstrap_navwalker())
                                );
                            ?>
                        </div>
                    </nav>
    			
                </div>

                <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="site-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
                    </div><!--end .site-logo -->
                </div> <!-- end .col-md-12 -->
    		</div>
            </div> <!-- end .container -->
    	</div>
    </header><!-- end header -->

    <!-- MAIN CONTENT AREA -->
    <div class="container">
    	<div class="row">
            <!-- custom header image -->
            <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />	
    
