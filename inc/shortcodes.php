<?php

/*

@package graffititheme

	============================
		SHORTCODE OPTIONS
	============================
*/

function graffiti_tooltip( $atts, $content = null)
{
    //[tooltip placement="top" title="This is the title"]This is the content[/tooltip]

    //get attribute
    $atts = shortcode_atts(
        array(
            'placement' => 'top',
            'title'     => '',
        ),
        $atts,
        'tooltip'
    );

    $title = ( $atts['title'] == '' ? $content: $atts['title'] );

    // return HTML
    return '<span class="graffiti-tooltip" data-toggle="tooltip" data-placement="'.$atts['placement'].'" title="'.$title.'">'.$content.'</span>';
}

add_shortcode( 'tooltip', 'graffiti_tooltip');

/*
 *
 * [tooltip placement="top" title="This is the title"]This is the content[/tooltip]
 *
*/

