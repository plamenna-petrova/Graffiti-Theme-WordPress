<?php

/*
	
@package graffititheme
	
	==============================
		THEME CUSTOM POST TYPES
	==============================
*/

$contact = get_option( 'activate_contact' );
if( @$contact == 1 ){

	add_action( 'init', 'graffiti_contact_custom_post_type' );

	//first and last part static
	add_filter( 'manage_graffiti-contact_posts_columns', 'graffiti_set_contact_columns' );
	add_action( 'manage_graffiti-contact_posts_custom_column', 'graffiti_contact_custom_column', 10, 2 );

	add_action( 'add_meta_boxes', 'graffiti_contact_add_meta_box' );
	add_action( 'save_post', 'graffiti_save_contact_email_data' );
}

/* CONTACT CPT */
function graffiti_contact_custom_post_type() {
	$labels = array(
		'name' 				=> 'Messages',
		'singular_name' 	=> 'Message',
		'menu_name'			=> 'Messages',
		'name_admin_bar'	=> 'Message'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 26,
		'menu_icon'			=> 'dashicons-email-alt',
		'supports'			=> array( 'title', 'editor', 'author' )
	);
	
	register_post_type( 'graffiti-contact', $args );
	
}

function graffiti_set_contact_columns( $columns ) {
    $newColumns = array();
    $newColumns['title'] = 'Full Name';
    $newColumns['message'] = 'Message';
    $newColumns['email'] = 'Email';
    $newColumns['date'] = 'Date';
    return $newColumns;
}

function graffiti_contact_custom_column( $column, $post_id ) {

    switch( $column ){

        case 'message' :
            //message column
            echo get_the_excerpt();
            break;
        case 'email' :
            //email column
            $email = get_post_meta( $post_id, '_contact_email_value_key', true );
            echo '<a href="mailto: '.$email.'">'.$email.'</a>';
            break;
    }
}

/* CONTACT META BOXES */

function graffiti_contact_add_meta_box() {
    add_meta_box('contact_email', 'User Email', 'graffiti_contact_email_callback', 'graffiti-contact', 'side' );
}

function graffiti_contact_email_callback( $post ){
    wp_nonce_field('graffiti_save_contact_email_data', 'graffiti_contact_email_meta_box_nonce' );

    $value = get_post_meta($post->ID, '_contact_email_value_key', true );

    echo '<label for="graffiti_contact_email_field">User Email Address: </label>';
    echo '<input type="email" id="graffiti_contact_email_field" name="graffiti_contact_email_field" value="'. esc_attr( $value ) .'" size="25" />';
}

function graffiti_save_contact_email_data( $post_id ){

    if( ! isset( $_POST['graffiti_contact_email_meta_box_nonce'] ) ){
        return;
    }

    if( ! wp_verify_nonce( $_POST['graffiti_contact_email_meta_box_nonce'], 'graffiti_save_contact_email_data' ) ){
        return;
    }

    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
        return;
    }

    if( ! current_user_can( 'edit_post', $post_id) ) {
        return;
    }

    if( ! isset( $_POST['graffiti_contact_email_field'] ) ) {
        return;
    }

    $my_data = sanitize_text_field( $_POST['graffiti_contact_email_field'] );

    update_post_meta($post_id, '_contact_email_value_key', $my_data );
}















