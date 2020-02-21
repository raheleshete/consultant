<?php
/*
 * VC Row Params 
 * Author: UPQODE
 * Author URI: http://upqode.com
 * Version: 1.0.0 
 * Add option for row paddings
 */

function cr_get_cell_offset_inner( $pref, $suf, $max = 120, $step = 5 ){
    $ar = array();
    for ($i=0; $i < $max + $step; $i += $step ) { 
        $ar[$i . 'px'] = $pref . '-' . $suf . $i;
    }
    return array_merge(array( 'Default'  => 'none' ), $ar );
}

$responsive_classes = array(
    array(
        'type'        => 'checkbox',
        'heading'     => __( 'Enable Ovarlay', 'js_composer' ),
        'param_name'  => 'enable_ovarlay',
        'value'       => ''
    ),
    array(
        'type'        => 'colorpicker',
        'heading'     => __( 'Color overlay', 'js_composer' ),
        'param_name'  => 'color_ovarlay',
        'value'       => '',
        'dependency' => array(
            'element' => 'enable_ovarlay',
            'value' => 'true',
        ),
    ),
    array(
        'heading'     => __( 'Alignment', 'js_composer' ),
        'type'        => 'dropdown',
        'param_name'  => 'align',
        'value'       => array(
            __( 'Left', 'js_composer' )   => 'left',
            __( 'Center', 'js_composer' ) => 'center',
            __( 'Right', 'js_composer' )  => 'right'
        ),
    ),
    array(
        'type'        => 'checkbox',
        'heading'     => __( 'Alignment small devices', 'js_composer' ),
        'param_name'  => 'resp_align_switch',
        'value'       => ''
    ),
    array(
        'heading'     => __( 'Alignment', 'js_composer' ),
        'type'        => 'dropdown',
        'param_name'  => 'resp_align',
        'value'       => array(
            __( 'Left', 'js_composer' )   => 'left',
            __( 'Center', 'js_composer' ) => 'center',
            __( 'Right', 'js_composer' )  => 'right'
        ),
        'dependency' => array(
            'element' => 'resp_align_switch',
            'value' => 'true',
        ),
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Desctop margin top', 'js_composer' ),
        'param_name'  => 'desctop_mt',
        'value'       => cr_get_cell_offset_inner('marg-md', 't', 300),
        'group'       => 'Responsive Margins'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Desctop margin bottom', 'js_composer' ),
        'param_name'  => 'desctop_mb',
        'value'       => cr_get_cell_offset_inner('marg-md', 'b', 300),
        'group'       => 'Responsive Margins',
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Tablets margin top', 'js_composer' ),
        'param_name'  => 'tablets_mt',
        'value'       => cr_get_cell_offset_inner('marg-sm', 't'),
        'group'       => 'Responsive Margins'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Tablets margin bottom', 'js_composer' ),
        'param_name'  => 'tablets_mb',
        'value'       => cr_get_cell_offset_inner('marg-sm', 'b'),
        'group'       => 'Responsive Margins'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Mobile margin top', 'js_composer' ),
        'param_name'  => 'mobile_mt',
        'value'       => cr_get_cell_offset_inner('marg-xs', 't'),
        'group'       => 'Responsive Margins'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Mobile margin bottom', 'js_composer' ),
        'param_name'  => 'mobile_mb',
        'value'       => cr_get_cell_offset_inner('marg-xs', 'b'),
        'group'       => 'Responsive Margins'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Desctop padding top', 'js_composer' ),
        'param_name'  => 'desctop_pt',
        'value'       => cr_get_cell_offset_inner('padd-md', 't', 300),
        'group'       => 'Responsive Paddings'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Desctop padding bottom', 'js_composer' ),
        'param_name'  => 'desctop_pb',
        'value'       => cr_get_cell_offset_inner('padd-md', 'b', 300),
        'group'       => 'Responsive Paddings',
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Tablets padding top', 'js_composer' ),
        'param_name'  => 'tablets_pt',
        'value'       => cr_get_cell_offset_inner('padd-sm', 't'),
        'group'       => 'Responsive Paddings'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Tablets padding bottom', 'js_composer' ),
        'param_name'  => 'tablets_pb',
        'value'       => cr_get_cell_offset_inner('padd-sm', 'b'),
        'group'       => 'Responsive Paddings'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Mobile padding top', 'js_composer' ),
        'param_name'  => 'mobile_pt',
        'value'       => cr_get_cell_offset_inner('padd-xs', 't'),
        'group'       => 'Responsive Paddings'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Mobile padding bottom', 'js_composer' ),
        'param_name'  => 'mobile_pb',
        'value'       => cr_get_cell_offset_inner('padd-xs', 'b'),
        'group'       => 'Responsive Paddings'
    ),
);

vc_add_params( 'vc_column_inner', $responsive_classes );