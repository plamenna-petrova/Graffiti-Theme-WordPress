<h1>Graffiti Contact Form</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="graffiti-general-form">
	<?php settings_fields( 'graffiti-contact-options' ); ?>
	<?php do_settings_sections( 'petrova_graffiti_theme_contact' ); ?>
	<?php submit_button(); ?>
</form>