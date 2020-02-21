<?php 
/*
** consultant Background image Shortcode
** Version: 1.0.0 
*/


vc_map( array(
	'name'                    => esc_html__( 'Image', 'js_composer' ),
	'base'                    => 'consultant_image',
	'content_element'         => true,
	'show_settings_on_create' => true,
	'category' 				  => esc_html__( 'From consultant', 'js_composer' ),
	'description'             => esc_html__( 'Image', 'js_composer'),
	'params'          => array(
		array(
			'type'        => 'textfield',
			'heading'     => 'Height (in px)',
			'param_name'  => 'height',
			'admin_label' => true,
			'value'       => '',
		),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Image', 'js_composer' ),
			'param_name' => 'lx_image',
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Background size', 'js_composer' ),
			'param_name' => 'size_style_bg',
			'value' => array(
				esc_html__( 'Cover', 'js_composer' ) => '',
				esc_html__( 'Contain', 'js_composer' ) => 'contain',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Repeat image', 'js_composer' ),
			'param_name' => 'repeat_image',
			'value' => array(
				esc_html__( 'No', 'js_composer' ) => '',
				esc_html__( 'Yes', 'js_composer' ) => 'repeat',
			),
			'description' => 'Option "Yes" only small image'
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Position image', 'js_composer' ),
			'param_name' => 'bg_position_image',
			'description' => 'For big resolution image',
			'value' => array(
				esc_html__( 'Left', 'js_composer' ) => '',
				esc_html__( 'Right', 'js_composer' ) => 'right',
				esc_html__( 'Center', 'js_composer' ) => 'center',
			),
		),

		array(
	        'type'        => 'checkbox',
	        'heading'     => esc_html__( 'Enable Overlay', 'js_composer' ),
	        'param_name'  => 'enable_ovarlay',
	        'value'       => '',
	        'dependency'  => array('element'=>'size_style_bg', 'value_not_equal_to'=>'contain'),
	    ),
	    array(
	        'type'        => 'colorpicker',
	        'heading'     => esc_html__( 'Color overlay', 'js_composer' ),
	        'param_name'  => 'color_overlay',
	        'value'       => '',
	        'dependency' => array(
	            'element' => 'enable_ovarlay',
	            'value' => 'true',
	        ),
	    ),
	    array(
	        'type'        => 'checkbox',
	        'heading'     => esc_html__( 'Space left', 'js_composer' ),
	        'param_name'  => 'space_left',
	        'value'       => ''
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

class WPBakeryShortCode_consultant_image extends WPBakeryShortCode{
	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'height' 	=> '',
			'lx_image' 	=> '',
			'size_style_bg' 	=> '',
			'repeat_image' 	=> '',
			'bg_position_image' 	=> '',
			'position_image' 	=> '',
			'animation_scroll' 	=> 'fade-up',
			'duration_animation' 	=> '1000',
			'color_overlay' 	=> '',
			'space_left' 	=> '',
			'el_class'  => '',
			'css'       => ''
		), $atts ) );

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, $this->settings['base'], $atts );
		
		// custum css
		$css_class .= vc_shortcode_custom_css_class( $css, ' ' );

		if($space_left=="true") {
			$space_left="space-left";
		} else {
			$space_left="";
		}

		if(!empty($height)) {
			$height=(float)$height;
		}
	
		


		$src = ( !empty( $lx_image ) && is_numeric( $lx_image ) ) ? wp_get_attachment_url( $lx_image ) : false;
		$output='';
		if(!empty($src)) {
			$output .= '<div class="lx-img-bg '.esc_attr( $space_left ).' '.esc_attr($size_style_bg).' '.esc_attr($repeat_image).' '.esc_attr($bg_position_image).' '.esc_attr($css_class).' '.esc_attr($position_image).' '.$css.'" style="height:'.esc_attr($height).'px; background-image:url('.esc_url($src).');" data-aos="'.$animation_scroll.'" data-aos-duration="'.$duration_animation.'">';
				if(!empty($color_overlay)) {
					$output .='<div class="lx-overlay" style="background-color:'.$color_overlay.'"></div>';
				}
			$output .= '</div>';
		}

		// return output
		return  $output;

	}
}
