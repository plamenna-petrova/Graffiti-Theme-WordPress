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

function graffiti_popover( $atts, $content = null)
{
    //[popover title="Popover title" placement="top" trigger="click" content="This is popover content"]This is click able popover[/popover]

    //get attribute
    $atts = shortcode_atts(
        array(
            'placement'     => 'top',
            'title'         => '',
            'trigger'       => 'click',
            'content'       => '',
        ),
        $atts,
        'popover'
    );

    //return HTML
    return '<span class="graffiti-popover" data-toggle="popover" data-placement="'.$atts['placement'].'" data-title="'.$atts['title'].'" data-trigger="'.$atts['trigger'].'" data-content="'.$atts['content'].'">'.$content.'</span>';
}

add_shortcode( 'popover', 'graffiti_popover');

/*
 *
 * [tooltip placement="top" title="This is the title"]This is the content[/tooltip]
 *
*/

