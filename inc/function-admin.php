<?php

/*
	
@package graffititheme
	
	========================
		   ADMIN PAGE
	========================
*/

function graffiti_add_admin_page() {
	
	//Generate Graffiti Admin Page
	add_menu_page( 'Graffiti Theme Options', 'Graffiti', 'manage_options', 'petrova_graffiti', 'graffiti_theme_create_page', 'dashicons-randomize', 110 );
	
	//Generate Graffiti Admin Sub Pages
	add_submenu_page( 'petrova_graffiti', 'Graffiti Sidebar Options', 'Sidebar', 'manage_options', 'petrova_graffiti', 'graffiti_theme_create_page' );
	add_submenu_page( 'petrova_graffiti', 'Graffiti Theme Options', 'Theme Options', 'manage_options', 'petrova_graffiti_theme', 'graffiti_theme_support_page' );
	add_submenu_page( 'petrova_graffiti', 'Graffiti Contact Form', 'Contact Form', 'manage_options', 'petrova_graffiti_theme_contact', 'graffiti_contact_form_page' );
	add_submenu_page( 'petrova_graffiti', 'Graffiti CSS Options', 'Custom CSS', 'manage_options', 'petrova_graffiti_css', 'graffiti_theme_settings_page');
	
}
add_action( 'admin_menu', 'graffiti_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'graffiti_custom_settings' );

function graffiti_custom_settings() {
	//Sidebar Options
	register_setting( 'graffiti-settings-group', 'profile_picture' );
	register_setting( 'graffiti-settings-group', 'first_name' );
	register_setting( 'graffiti-settings-group', 'last_name' );
	register_setting( 'graffiti-settings-group', 'user_description' );
	register_setting( 'graffiti-settings-group', 'twitter_handler', 'graffiti_sanitize_twitter_handler' );
	register_setting( 'graffiti-settings-group', 'facebook_handler' );
	register_setting( 'graffiti-settings-group', 'instagram_handler' );
	
	add_settings_section( 'graffiti-sidebar-options', 'Sidebar Option', 'graffiti_sidebar_options', 'petrova_graffiti');
	
	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'graffiti_sidebar_profile', 'petrova_graffiti', 'graffiti-sidebar-options');
	add_settings_field( 'sidebar-name', 'Full Name', 'graffiti_sidebar_name', 'petrova_graffiti', 'graffiti-sidebar-options');
	add_settings_field( 'sidebar-description', 'Description', 'graffiti_sidebar_description', 'petrova_graffiti', 'graffiti-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'graffiti_sidebar_twitter', 'petrova_graffiti', 'graffiti-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'graffiti_sidebar_facebook', 'petrova_graffiti', 'graffiti-sidebar-options');
	add_settings_field( 'sidebar-instagram', 'Instagram handler', 'graffiti_sidebar_instagram', 'petrova_graffiti', 'graffiti-sidebar-options');
	
	//Theme Support Options
	register_setting( 'graffiti-theme-support', 'post_formats' );
	register_setting( 'graffiti-theme-support', 'custom_header' );
	register_setting( 'graffiti-theme-support', 'custom_background' );
	
	add_settings_section( 'graffiti-theme-options', 'Theme Options', 'graffiti_theme_options', 'petrova_graffiti_theme' );
	
	add_settings_field( 'post-formats', 'Post Formats', 'graffiti_post_formats', 'petrova_graffiti_theme', 'graffiti-theme-options' );
	add_settings_field( 'custom-header', 'Custom Header', 'graffiti_custom_header', 'petrova_graffiti_theme', 'graffiti-theme-options' );
	add_settings_field( 'custom-background', 'Custom Background', 'graffiti_custom_background', 'petrova_graffiti_theme', 'graffiti-theme-options' );
	
	//Contact Form Options
	register_setting( 'graffiti-contact-options', 'activate_contact' );
	
	add_settings_section( 'graffiti-contact-section', 'Contact Form', 'graffiti_contact_section', 'petrova_graffiti_theme_contact');
	
	add_settings_field( 'activate-form', 'Activate Contact Form', 'graffiti_activate_contact', 'petrova_graffiti_theme_contact', 'graffiti-contact-section' );

	//Custom CSS Options
    register_setting('graffiti-custom-css-options', 'graffiti_css', 'graffiti_sanitize_custom_css');

    add_settings_section('graffiti-custom-css-section', 'Custom CSS', 'graffiti_custom_css_section_callback', 'petrova_graffiti_css' );

    add_settings_field('custom-css', 'Insert your Custom CSS', 'graffiti_custom_css_callback', 'petrova_graffiti_css', 'graffiti-custom-css-section');
	
}

function graffiti_custom_css_section_callback() {
    echo 'Customize Graffiti Theme with your own CSS';
}

function graffiti_custom_css_callback() {
    $css = get_option('graffiti_css');
    $css = ( empty($css) ? '/* Graffiti Theme Custom Css */' : $css );
    echo '<div id="customCss">'.$css.'</div><textarea id="graffiti_css" name="graffiti_css" style="display:none; visibility:hidden">'.$css.'</textarea>';
}

function graffiti_theme_options() {
	echo 'Activate and Deactivate specific Theme Support Options';
}

function graffiti_contact_section() {
	echo 'Activate and Deactivate the Built-in Contact Form';
}

function graffiti_activate_contact() {
	$options = get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.' /></label>';
}

function graffiti_post_formats() {
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

function graffiti_custom_header() {
	$options = get_option( 'custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}

function graffiti_custom_background() {
	$options = get_option( 'custom_background' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}

// Sidebar Options Functions
function graffiti_sidebar_options() {
	echo 'Customize your Sidebar Information';
}

function graffiti_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
	}
	
}
function graffiti_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}
function graffiti_sidebar_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}
function graffiti_sidebar_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}
function graffiti_sidebar_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}
function graffiti_sidebar_instagram() {
	$instagram = esc_attr( get_option( 'instagram_handler' ) );
	echo '<input type="text" name="instagram_handler" value="'.$instagram.'" placeholder="Instagram handler" />';
}

//Sanitization settings
function graffiti_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

function graffiti_sanitize_custom_css ( $input ){
    $output = esc_textarea( $input );
    return $output;
}

//Template submenu functions
function graffiti_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/graffiti-admin.php' );
}

function graffiti_theme_support_page() {
	require_once( get_template_directory() . '/inc/templates/graffiti-theme-support.php' );
}

function graffiti_contact_form_page() {
	require_once( get_template_directory() . '/inc/templates/graffiti-contact-form.php' );
}

function graffiti_theme_settings_page() {

	require_once( get_template_directory() . '/inc/templates/graffiti-custom-css.php' );

}





