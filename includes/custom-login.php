<?php
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