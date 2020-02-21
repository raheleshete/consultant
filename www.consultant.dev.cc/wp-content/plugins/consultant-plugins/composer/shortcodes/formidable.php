<?php 
/*
** consultant Formidable Shortcode
** Version: 1.0.0 
*/

vc_map( array(
	'name'                    => esc_html__( 'Formidable', 'js_composer' ),
	'base'                    => 'consultant_formidable',
	'content_element'         => true,
	'show_settings_on_create' => true,
	'category' 				  => esc_html__( 'From consultant', 'js_composer' ),
	'description'             => esc_html__( 'Forms', 'js_composer'),
	'params'          => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Select Form', 'js_composer' ),
			'param_name' => 'form',
			'value' => consultant_get_fd_forms()
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Form width', 'js_composer' ),
			'param_name' => 'width',
			'value' => array(
				esc_html__( 'full', 'js_composer' ) => '1',
				esc_html__( '80%', 'js_composer' ) => '1/10',
				esc_html__( '65%', 'js_composer' ) => '1/8',
				esc_html__( '50%', 'js_composer' ) => '1/6',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Style form', 'js_composer' ),
			'param_name' => 'style_form',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => 'career',
				esc_html__( 'Consultant (light style only for dark background)', 'js_composer' ) => 'consultant',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Animation on scroll', 'js_composer' ),
			'param_name' => 'animation_scroll',
			'group'       => 'Animation',
			'value' => array(
				esc_html__( 'Fade up', 'js_composer' ) => 'fade-up',
				esc_html__( 'Flip left', 'js_composer' ) => 'flip-left',
				esc_html__( 'Fade zoom in', 'js_composer' ) => 'fade-zoom-in',
				esc_html__( 'Fade left', 'js_composer' ) => 'fade-left',
				esc_html__( 'Fade right', 'js_composer' ) => 'fade-right',
				esc_html__( 'Fade down', 'js_composer' ) => 'fade-down',
				esc_html__( 'Fade down left', 'js_composer' ) => 'fade-down-left',
				esc_html__( 'Zoom out left', 'js_composer' ) => 'zoom-out-left',
				esc_html__( 'Zoom out right', 'js_composer' ) => 'zoom-out-right',
				esc_html__( 'Zoom out right', 'js_composer' ) => 'zoom-out-down',
				esc_html__( 'Zoom out up', 'js_composer' ) => 'zoom-out-up',
				esc_html__( 'Zoom in left', 'js_composer' ) => 'zoom-in-left',
				esc_html__( 'Zoom in down', 'js_composer' ) => 'zoom-in-down',
				esc_html__( 'Zoom in', 'js_composer' ) => 'zoom-in',
				esc_html__( 'No animation', 'js_composer' ) => 'disable',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Duration animation', 'js_composer' ),
			'param_name' => 'duration_animation',
			'group'       => 'Animation',
			'value' => array(
				esc_html__( '1000', 'js_composer' ) => '1000',
				esc_html__( '2000', 'js_composer' ) => '2000',
				esc_html__( '3000', 'js_composer' ) => '3000',
			),
			'dependency' =>  array('element' => 'animation_scroll', 'value_not_equal_to' => 'disable'),
		),
		
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'value' => '',
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'js_composer' ),
			'param_name' => 'css',
			'group' => esc_html__( 'Design options', 'js_composer' ),
		),
	) //end params
) );

class WPBakeryShortCode_consultant_formidable extends WPBakeryShortCode{
	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'width'  => '1',
			'form'  => '',
			'style_form'  => 'career',
			'animation_scroll' 	=> 'fade-up',
			'duration_animation' 	=> '1000',
			'el_class'  => '',
			'css'       => ''
		), $atts ) );


		$width_class = array(
			'1' => ' col-xs-12',
			'1/6' => ' col-sm-6 col-sm-offset-3 col-xs-12',
			'1/8' => ' col-xs-12 col-sm-8 col-sm-offset-2',
			'1/10' => ' col-xs-12 col-sm-10 col-sm-offset-1',
		);

		if($width=="1/6") {
			$width_form="half";
		} else {
			$width_form="";
		}
 
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $this->settings['base'], $atts );
		
		// custum css
		$css_class .= vc_shortcode_custom_css_class( $css, ' ' );

		// custum class
		$css_class .= (!empty($el_class)) ? ' '.$el_class : '';
		$output="";
		// output
		if(!empty($form)) {
			$output .= '<div class="lx-formidable '.esc_attr( $style_form ).' '. esc_attr($width_class[$width]) .' '.esc_attr($width_form) .' '.esc_attr( $css_class ). '" data-aos="'.esc_attr( $animation_scroll ).'" data-aos-duration="'.esc_attr( $duration_animation ).'">';
				$output .= do_shortcode(esc_html('[formidable id='.$form.']'));
			$output .= '</div>';
		}
		$output .='<div class="test ' . esc_attr($form) . '"></div>';

		// return output
		return  $output;

	}
}
