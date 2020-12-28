<?php

/*
	
@package graffititheme
	
	==============================
		ADMIN ENQUEUE FUNCTIONS
	==============================
*/

function graffiti_load_admin_scripts( $hook ){
	
	if( 'toplevel_page_petrova_graffiti' == $hook ) {

       // echo $hook;

        wp_register_style('graffiti_admin', get_template_directory_uri() . '/css/graffiti.admin.css', array(), '1.0.0', 'all');
        wp_enqueue_style('graffiti_admin');

        wp_enqueue_media();

        wp_register_script('graffiti-admin-script', get_template_directory_uri() . '/js/graffiti.admin.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('graffiti-admin-script');
    } else if ( 'graffiti_page_petrova_graffiti_css' == $hook ) {

	    wp_enqueue_style('ace', get_template_directory_uri() . '/css/graffiti.ace.css', array(), '1.0.0', 'all');

	    wp_enqueue_script('ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true);
	    wp_enqueue_script('graffiti-custom-css-script', get_template_directory_uri(). '/js/graffiti.custom_css.js', array('jquery'), '1.0.0', true);
    } else { return; }
}
add_action( 'admin_enqueue_scripts', 'graffiti_load_admin_scripts' );

/*
    ==================================
		FRONT-END ENQUEUE FUNCTIONS
	==================================
 * */

function graffiti_load_scripts() {

    wp_enqueue_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css', array(), '4.3.1', 'all');
    wp_enqueue_style('graffiti', get_template_directory_uri(). '/css/graffiti.css', array(), '1.0.0', 'all');
    wp_enqueue_style('sedgwick', 'https://fonts.googleapis.com/css?family=Sedgwick+Ave+Display&display=swap:200,300,500');

    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri(). '/js/jquery.js', false, '3.4.1', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper', get_template_directory_uri(). '/js/popper.js', array('jquery'), '1.14.7', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('graffiti', get_template_directory_uri(). '/js/graffiti.js', array('jquery'), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'graffiti_load_scripts' );