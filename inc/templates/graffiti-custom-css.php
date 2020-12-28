<h1>Graffiti Custom CSS</h1>
<?php settings_errors(); ?>

<form id="save-custom-css-form" method="post" action="options.php" class="graffiti-general-form">
    <?php settings_fields( 'graffiti-custom-css-options' ); ?>
    <?php do_settings_sections( 'petrova_graffiti_css' ); ?>
    <?php submit_button(); ?>
</form>