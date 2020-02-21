<?php 
/*
** consultant Calendar Shortcode
** Version: 1.0.0 
*/

vc_map( array(
	'name'                    => esc_html__( 'Calendar', 'js_composer' ),
	'base'                    => 'consultant_calendar',
	'content_element'         => true,
	'show_settings_on_create' => true,
	'category' 				  => esc_html__( 'From consultant', 'js_composer' ),
	'description'             => esc_html__( 'Calendar', 'js_composer'),
	'params'          => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Shortcode calendar', 'js_composer' ),
			'param_name' => 'shortcode_calendar',
			'description' => 'Plugin Booked Appointments should be activated. Default shortcode [booked-calendar]. Example shortcodes Appointments->Settings->Shortcodes',
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Size font', 'js_composer' ),
			'param_name' => 'size_font',
			'value' => array(
				esc_html__( 'small', 'js_composer' ) => '',
				esc_html__( 'large', 'js_composer' ) => 'large_font',
			),
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Style Theme Calendar', 'js_composer' ),
			'param_name' => 'style_theme',
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'value' => '',
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
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'js_composer' ),
			'param_name' => 'css',
			'group' => esc_html__( 'Design options', 'js_composer' ),
		),
	) //end params
) );

class WPBakeryShortCode_consultant_calendar extends WPBakeryShortCode{
	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style'  => 'lx_barber',
			'el_class'   => '',
			'shortcode_calendar'   => '[booked-calendar]',
			'align'     => '',
			'style_theme'     => '',
			'size_font'     => '',
			'animation_scroll' 	=> 'fade-up',
			'duration_animation' 	=> '1000',
			'css'       => ''
		), $atts ) );

		$width_class = ($align != '') ? $align : '';
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width_class, $this->settings['base'], $atts );
		
		// custum css
		$css_class .= vc_shortcode_custom_css_class( $css, ' ' );
		if($style_theme) {
			$style_calendar = 'consultant';
		} else {
			$style_calendar = '';
		}

		// custum class
		$css_class .= (!empty($el_class)) ? ' '.$el_class : '';
		$output="";
		// output
		if(class_exists('booked_plugin')) {
			$output .= '<div class="lx-calendar ' .esc_attr($style_calendar.' '.$size_font).' '. esc_attr( $css_class ) . '" data-aos="'.$animation_scroll.'" data-aos-duration="'.$duration_animation.'" data-style="'.esc_attr($style).'">';
				$output .=do_shortcode($shortcode_calendar);
			$output .= '</div>';
		}
		
		
		// return output
		return  $output;

	}
}
