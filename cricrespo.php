<?php

/**
 * @package Cricrespo_Test
 * @version 0.1
 */
/*
 * Plugin Name: CricrespoTetst
 * Description: Este plugin modifica los títulos de las entradas.
 * Version: 1.0.0
 * Author: Cricrespo
*/
 
//Change Title
add_filter('pre_get_document_title', 'change_title');

function change_title($title){
  //die(var_dump( $_SERVER['REQUEST_URI']));
  $title = get_the_title(). " -Flat101";
  return $title;
}


//ad link with canonical url
add_filter('wp_head', 'canonical');

function canonical(){
  echo '<link rel="canonical" href="'.$_SERVER['REQUEST_URI'].'">';
}

//ad meta og:image with featured image
add_action( 'wp_head', 'theme_xyz_header_metadata' );

function theme_xyz_header_metadata() {
  $meta = get_the_post_thumbnail();
  echo '<meta name="abc" property="og:image" content="'.$meta.'">';
}

//Disalow crawler 
add_filter('robots_txt', 'addToRoboText');

function addToRoboText($robotext) {
  $additions = "
  # Added by filter in functions
  Disallow: /no-crawlers-url
  ";
  return $robotext . $additions;
}