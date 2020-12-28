<h1>Graffiti Theme Support</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="graffiti-general-form">
	<?php settings_fields( 'graffiti-theme-support' ); ?>
	<?php do_settings_sections( 'petrova_graffiti_theme' ); ?>
	<?php submit_button(); ?>
</form>