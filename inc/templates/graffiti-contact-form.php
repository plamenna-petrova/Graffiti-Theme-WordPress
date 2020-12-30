<h1>Graffiti Contact Form</h1>
<?php settings_errors(); ?>

<p>Use this shortcode to activate the Contact Form inside a Page or Post</p>
<p><code>[contact_form]</code></p>

<form method="post" action="options.php" class="graffiti-general-form">
	<?php settings_fields( 'graffiti-contact-options' ); ?>
	<?php do_settings_sections( 'petrova_graffiti_theme_contact' ); ?>
	<?php submit_button(); ?>
</form>