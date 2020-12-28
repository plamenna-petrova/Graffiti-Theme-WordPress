<h1>Graffiti Sidebar Options</h1>
<?php settings_errors(); ?>
<?php 
	
	$picture = esc_attr( get_option( 'profile_picture' ) );
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	$fullName = $firstName . ' ' . $lastName;
	$description = esc_attr( get_option( 'user_description' ) );
	
?>
<div class="graffiti-sidebar-preview">
	<div class="graffiti-sidebar">
		<div class="image-container">
			<div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
		</div>
		<h1 class="graffiti-username"><?php print $fullName; ?></h1>
		<h2 class="graffiti-description"><?php print $description; ?></h2>
		<div class="icons-wrapper">
			
		</div>
	</div>
</div>

<form id="submitForm" method="post" action="options.php" class="graffiti-general-form">
	<?php settings_fields( 'graffiti-settings-group' ); ?>
	<?php do_settings_sections( 'petrova_graffiti' ); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
</form>