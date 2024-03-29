<?php
/*
 * VC Сolumn Params 
 * Author: UPQODE
 * Author URI: http://upqode.com
 * Version: 1.0.0 
 * Add option for column paddings and margins
 */


function cr_get_row_offset( $pref, $suf, $max = 120, $step = 5 ){
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
        'type' => 'dropdown',
        'heading' => esc_html__( 'Enable Paralax', 'js_composer' ),
        'param_name' => 'lx_enable_paralax',
        'value' => array(
            esc_html__( 'Disbale', 'js_composer' ) => '',
            esc_html__( 'Enable', 'js_composer' ) => 'fixed_bg',
        ),
        'description'       => 'When you scroll page background image remains fixed',
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Desctop margin top', 'js_composer' ),
        'param_name'  => 'desctop_mt',
        'value'       => cr_get_row_offset('marg-md', 't', 150),
        'group'       => 'Responsive Margins'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Desctop margin bottom', 'js_composer' ),
        'param_name'  => 'desctop_mb',
        'value'       => cr_get_row_offset('marg-md', 'b', 150),
        'group'       => 'Responsive Margins',
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Tablets margin top', 'js_composer' ),
        'param_name'  => 'tablets_mt',
        'value'       => cr_get_row_offset('marg-sm', 't'),
        'group'       => 'Responsive Margins'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Tablets margin bottom', 'js_composer' ),
        'param_name'  => 'tablets_mb',
        'value'       => cr_get_row_offset('marg-sm', 'b'),
        'group'       => 'Responsive Margins'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Mobile margin top', 'js_composer' ),
        'param_name'  => 'mobile_mt',
        'value'       => cr_get_row_offset('marg-xs', 't'),
        'group'       => 'Responsive Margins'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Mobile margin bottom', 'js_composer' ),
        'param_name'  => 'mobile_mb',
        'value'       => cr_get_row_offset('marg-xs', 'b'),
        'group'       => 'Responsive Margins'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Desctop padding top', 'js_composer' ),
        'param_name'  => 'desctop_pt',
        'value'       => cr_get_row_offset('padd-md', 't', 150),
        'group'       => 'Responsive Paddings'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Desctop padding bottom', 'js_composer' ),
        'param_name'  => 'desctop_pb',
        'value'       => cr_get_row_offset('padd-md', 'b', 150),
        'group'       => 'Responsive Paddings',
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Tablets padding top', 'js_composer' ),
        'param_name'  => 'tablets_pt',
        'value'       => cr_get_row_offset('padd-sm', 't'),
        'group'       => 'Responsive Paddings'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Tablets padding bottom', 'js_composer' ),
        'param_name'  => 'tablets_pb',
        'value'       => cr_get_row_offset('padd-sm', 'b'),
        'group'       => 'Responsive Paddings'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Mobile padding top', 'js_composer' ),
        'param_name'  => 'mobile_pt',
        'value'       => cr_get_row_offset('padd-xs', 't'),
        'group'       => 'Responsive Paddings'
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => __( 'Mobile padding bottom', 'js_composer' ),
        'param_name'  => 'mobile_pb',
        'value'       => cr_get_row_offset('padd-xs', 'b'),
        'group'       => 'Responsive Paddings'
    ),
);

vc_add_params( 'vc_row', $responsive_classes );
