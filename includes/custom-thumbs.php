<?php
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