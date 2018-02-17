<?php

//load all files
require_once('helpers.php');
require_once('hooks.php');
require_once('resources.php');
//require_once('shortcode.php');

require_once('post-type/page-post-type.php');
require_once('post-type/news-post-type.php');
require_once('post-type/players-post-type.php');

/* Add stuff to theme  */
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' ); //We do not provide a hard coded <title> tag in our header and expect wordpress to provide one for us
add_theme_support( 'html5', array('search-form',	'comment-form','comment-list','gallery','caption')); // Switch default core markup for search form, comment form, and comments to output valid HTML5.
add_theme_support( 'menus' );

/* Remove unwanted links from the head */
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');

/* Remove auto P */
//remove_filter( 'the_content', 'wpautop' );