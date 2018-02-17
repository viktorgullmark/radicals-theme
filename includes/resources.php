<?php
/* Include used scripts */
function rcs_enqueue_css_js(){

    wp_enqueue_style( 'bootstrapCSS', get_template_directory_uri (). '/includes/resources/css/bootstrap.min.css', array(), '4.0.0', 'all' );
    wp_enqueue_style( 'flexsliderCSS', get_template_directory_uri (). '/includes/resources/css/flexslider.css', array('bootstrapCSS'), '1.0.0', 'all' );
    wp_enqueue_style( 'mainCSS', get_template_directory_uri (). '/includes/resources/css/main.css', array('flexsliderCSS'), '1.0.0', 'all' );
    wp_enqueue_style( 'customCSS', get_template_directory_uri (). '/includes/resources/css/custom.css', array(), '1.0.0', 'all' );

    wp_enqueue_script ( 'bootstrapJS', get_template_directory_uri () . '/includes/resources/js/bootstrap.min.js', array('jquery'), '1.0.0', false );
    wp_register_script ( 'mainJS', get_template_directory_uri () . '/includes/resources/js/script.js', array('jquery'), '1.0.0', false );
    wp_enqueue_script ( 'flexsliderJS', get_template_directory_uri () . '/includes/resources/js/jquery.flexslider.js', array('jquery','mainJS' ), '1.0.0', false );
    wp_enqueue_script ( 'mainJS', get_template_directory_uri () . '/includes/resources/js/script.js', array('flexsliderJS'), '1.0.0', false );
    wp_enqueue_script ( 'fontawesomeJS', get_template_directory_uri () . '/includes/resources/js/fontawesome-all.min.js', array(), '1.0.0', false );

    //if (is_page_template('map-page.php'))
    //{
    //    wp_localize_script('mainJS','al_data',array(
    //        'lightobjects' => getAllLightObjects()
    //    ));
    //}
}

function rcs_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri (). '/includes/resources/css/login.css', array(), '1.0', 'all' );
}

function rcs_enqueue_admin_css_js(){
    wp_enqueue_style( 'adminCSS', get_template_directory_uri (). '/includes/resources/css/admin.css', array(), '1.0.0', 'all' );
    wp_enqueue_script('adminJS', get_template_directory_uri () . '/includes/resources/js/adminscript.js', array('jquery', 'jquery-ui-datepicker'), '1.0.0', false);
}


add_action( 'login_enqueue_scripts', 'rcs_login_stylesheet' );
add_action( 'wp_enqueue_scripts', 'rcs_enqueue_css_js' );
add_action('admin_init', 'rcs_enqueue_admin_css_js');