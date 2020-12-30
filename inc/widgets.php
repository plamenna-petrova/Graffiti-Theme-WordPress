<?php

/*

@package graffititheme

	========================
		 WIDGET CLASS
	========================
*/

class Graffiti_Profile_Widget extends WP_Widget
{

    //setup the widget name, description, etc...
    public function __construct()
    {

        $widget_ops = array(
            'classname' => 'graffiti-profile-widget',
            'description' => 'Custom Graffiti Profile Widget',
        );
        parent::__construct('graffiti_profile', 'Graffiti Profile', $widget_ops);

    }

    //back-end display of widget
    public function form($instance)
    {

        echo '<p><strong>No options for this widget!</strong><br/>You can control the feels of this Widget from <a href="./admin.php?page=petrova_graffiti">This Page</a></p>';

    }

    //front-end display of widget
    public function widget($args, $instance)
    {

        $picture    = esc_attr( get_option('profile_picture') );
        $firstName  = esc_attr( get_option('first_name') );
        $lastName   = esc_attr( get_option('last_name') );
        $fullName   = $firstName .' '.$lastName;
        $description   = esc_attr( get_option('user_description') );

        $twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
        $facebook_icon = esc_attr( get_option( 'facebook_handler' ) );

        echo $args['before_widget'];
        ?>
        <div class="text-center">
            <div class="image-container">
                <div id="profile-picture-preview" class="profile-picture" style="background-image:url(<?php print $picture; ?>);"></div>
            </div>

            <h1 class="graffiti-username"><?php print $fullName; ?></h1>
            <h2 class="graffiti-description"><?php print $description; ?></h2>
            <div class="icons-wrapper">
                <?php if( !empty( $twitter_icon ) ): ?>
                    <a href="https://twitter.com/<?= $twitter_icon; ?>" target="_blank" class="graffiti-icon-sidebar sunset-icon sunset-twitter"></a>
                <?php endif;
                if( !empty( $facebook_icon ) ): ?>
                    <a href="https://facebook.com/<?= $facebook_icon; ?>" target="_blank" class="graffiti-icon-sidebar sunset-icon sunset-facebook"></a>
                <?php endif; ?>
            </div>
        </div>
        <?php

        echo $args['after_widget'];

    }
}

add_action('widgets_init', function () {
    register_widget('Graffiti_Profile_Widget');
});

/*
   Edit default WordPress widgets
 */

function graffiti_tag_cloud_font_change( $args ) {

   $args['smallest'] = 15;
   $args['largest'] = 15;

   return $args;

}

add_filter( 'widget_tag_cloud_args', 'graffiti_tag_cloud_font_change' );