<?php

//This is only used to include the includes/functions.php
require_once('includes/init.php');


function admin_menu_remove()
{
    remove_menu_page('edit.php');
    remove_menu_page( 'edit-comments.php' );
}
function custom_remove_section( $wp_customize ) {
    $wp_customize->remove_section( 'custom_css' );
    $wp_customize->remove_section( 'nav_menus' );
    $wp_customize->remove_section( 'background_image' );
    $wp_customize->remove_section( 'colors' );
    $wp_customize->remove_section( 'static_front_page' );
}

add_action('admin_menu', 'admin_menu_remove');
add_action( 'customize_register', 'custom_remove_section', 20 );

add_filter('wp_mail_smtp_custom_options', function( $phpmailer ) {
    $phpmailer->SMTPOptions = array(
		'ssl' => array(
			'verify_peer'       => false,
			'verify_peer_name'  => false,
			'allow_self_signed' => true
		)
	);
	
    return $phpmailer;
} );