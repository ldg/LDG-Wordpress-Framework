<?php
/**
* -----------------------------------------------------------------------------------
* 14.0 - Add Editor CSS
* -----------------------------------------------------------------------------------
*/
function ldg_add_editor_styles() {
 // **** add google webfont links ******
 // $font_url = urlencode( 'http://fonts.googleapis.com/css?family=Lato:100,300,400|Patua+One' );
 // add_editor_style( $font_url );
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'ldg_add_editor_styles' );