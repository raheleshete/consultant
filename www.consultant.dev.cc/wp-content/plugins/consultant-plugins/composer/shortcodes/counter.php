<?php
/*
 * Counter Shortcode
 * Version: 1.0.0
 */

vc_map(
	array(
		'name'        => esc_html__( 'Counter', 'js_composer' ),
		'base'        => 'consultant_counter',
		'params'      => array(

			array(
				'heading' 	  => esc_html__( 'Style', 'js_composer' ),
				'type' 		  => 'dropdown',
				'param_name'  => 'style_counter',
				'value' 	  => array(
				esc_html__( 'default', 'js_composer' ) => '',
				esc_html__( 'consultantpro', 'js_composer' )   => 'consultantpro',
				esc_html__( 'tutor', 'js_composer' )   => 'tutor',
				esc_html__( 'guitar', 'js_composer' )   => 'guitar',
				esc_html__( 'stuff', 'js_composer' )   => 'staff',
				esc_html__( 'computers', 'js_composer' )   => 'computers',
				esc_html__( 'mobiles', 'js_composer' )   => 'mobiles',
				esc_html__( 'cello', 'js_composer' )   => 'cello',
				esc_html__( 'piano', 'js_composer' )   => 'piano',
				)
			),
			array(
				'heading' 	  => esc_html__( 'Style text', 'js_composer' ),
				'type' 		  => 'dropdown',
				'param_name'  => 'style_text',
				'value' 	  => array(
				esc_html__( 'Dark', 'js_composer' ) => '',
				esc_html__( 'Light', 'js_composer' )   => 'light',
				)
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__( 'Title', 'js_composer' ),
				'admin_label' => true,
				'value'       => '',
				'param_name'  => 'title'
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Count', 'js_composer' ),
				'param_name'  => 'count',
				'value'       => '',
				'description' => esc_html__( 'Only numbers from 0.', 'js_composer' )
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Animation speed', 'js_composer' ),
				'param_name'  => 'speed',
				'value'       => '',
				'description' => esc_html__( 'Miliseconds (1 sec. = 1000 msec.). By default 1000 msec. - 1 second.', 'js_composer' ),
				'dependency' =>  array('element' => 'animation', 'value' => 'animation' ),
			),
			array(
				'heading' 	  => esc_html__( 'Icon counter', 'js_composer' ),
				'type' 		  => 'dropdown',
				'param_name'  => 'icon_counter',
				'value' 	  => array(
				esc_html__( 'hide', 'js_composer' ) => 'hide',
				esc_html__( 'show', 'js_composer' )   => 'show',
				),
				'dependency' =>  array('element' => 'style_counter', 'value' => 'tutor' ),
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Icon', 'js_composer' ),
				'param_name' => 'icon',
				'dependency' =>  array('element' => 'icon_counter', 'value' => 'show' ),
			),
			array(
				'heading' 	  => esc_html__( 'Block align', 'js_composer' ),
				'type' 		  => 'dropdown',
				'param_name'  => 'align',
				'value' 	  => array(
				esc_html__( 'Left', 'js_composer' )   => '',
				esc_html__( 'Center', 'js_composer' ) => 'center',
				esc_html__( 'Right', 'js_composer' )  => 'right'
				),
			),
			array(
				'heading' 	  => esc_html__( 'Alignment', 'js_composer' ),
				'type' 		  => 'dropdown',
				'param_name'  => 'alignment',
				'value' 	  => array(
				esc_html__( 'Icon left - text right', 'js_composer' )   => '',
				esc_html__( 'Icon right - text left', 'js_composer' ) => 'right',
				esc_html__( 'Icon top - text bottom', 'js_composer' )  => 'top'
				),
				'dependency' =>  array('element' => 'icon_counter', 'value' => 'show' ),
			),
			array(
				'heading' 	  => esc_html__( 'Animate numbers on scroll', 'js_composer' ),
				'type' 		  => 'dropdown',
				'param_name'  => 'animation',
				'value' 	  => array(
					esc_html__( 'Enable', 'js_composer' )   => 'animation',
					esc_html__( 'Disable', 'js_composer' ) => 'disable')
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
				'type' 		  => 'textfield',
				'heading' 	  => esc_html__( 'Extra class name', 'js_composer' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
				'value' 	  => ''
			),
			/* Design options */
			array(
				'type' 		  => 'css_editor',
				'heading' 	  => esc_html__( 'CSS box', 'js_composer' ),
				'param_name'  => 'css',
				'group' 	  => esc_html__( 'Design options', 'js_composer' )
			)
		)
	)
);

class WPBakeryShortCode_consultant_counter extends WPBakeryShortCode{
	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title' 	 => '',
			'count' 	 => '',
			'style_counter' 	 => '',
			'style_text' 	 => '',
			'speed' 	 => '',
			'animation' 	 => 'animation',
			'icon_counter'   => 'hide',
			'icon'   => '',
			'animation_scroll' 	=> 'fade-up',
			'duration_animation' 	=> '1000',
			'alignment'   => '',
			'el_class'   => '',
			'align' 	 => '',
			'css' 		 => ''
		), $atts ) );

		if($animation=="disable") {
			$number = $count;
		} else {
			$number=0;
		}
		
		$src = ( !empty( $icon ) && is_numeric( $icon ) ) ? wp_get_attachment_url( $icon ) : '';

		$output = '';
		$speed  = ( ! empty( $speed ) && is_numeric( $speed ) ) ? $speed : 1000;

		$class  = ( ! empty( $el_class ) ) ? $el_class : '';
		$class .= vc_shortcode_custom_css_class( $css, ' ' );
		$class .= ' text-' . $align;
		$output .= '<div class="wpc-counter '. esc_attr( $style_text ).' '. esc_attr($alignment) .' '. esc_attr($style_counter).' ' . esc_attr($animation) . esc_attr($class) . '" data-aos="'.esc_attr( $animation_scroll ).'" data-aos-duration="'.esc_attr( $duration_animation ).'">';
		if($icon_counter == "show" && !empty($src)) $output .='<div class="icon-wrap-counter"><img src="'.esc_url($src).'" alt=""></div>';
		$output .= '<div class="text-wrap">';
		$output .= '<p class="counter" data-to="' . esc_attr($count) . '" data-speed="' . esc_attr($speed) . '">'.esc_html($number).'</p>';
		$output .= ( ! empty( $title ) ) ? '<p class="title">' . wp_kses_post($title) . '</p>' : '';
		

		$output .= '</div>';
		$output .= '</div>';


		return $output;
	}
}