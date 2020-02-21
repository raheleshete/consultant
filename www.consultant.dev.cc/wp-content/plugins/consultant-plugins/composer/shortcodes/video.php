<?php 
/*
** consultant Video Shortcode
** Version: 1.0.0 
*/

vc_map( array(
	'name'                    => esc_html__( 'Video', 'js_composer' ),
	'base'                    => 'consultant_video',
	'content_element'         => true,
	'show_settings_on_create' => true,
	'category' 				  => esc_html__( 'From consultant', 'js_composer' ),
	'description'             => esc_html__( 'Video', 'js_composer'),
	'params'          => array(
		array(
		   'type'        => 'textfield',
		   'heading'     => 'Video Background',
		   'param_name'  => 'bg_video_link',
		   'description' => esc_html__( 'Insert Link video (Youtube, Vimeo)', 'js_composer' ),
	  	),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Autoplay video', 'js_composer' ),
			'param_name' => 'check_autoplay',
		),
		array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Preview video', 'js_composer' ),
            'param_name'  => 'img_bg',
            'dependency'  => array( 'element' => 'check_autoplay', 'value_not_equal_to' => 'true' )
        ),
        array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Show video player controls ', 'js_composer' ),
			'param_name' => 'show_controls',
            'description'  => 'This option work only youtube video.',
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Start video', 'js_composer' ),
			'param_name' => 'playing',
		),
		array(
		   'type'        => 'textfield',
		   'heading'     => 'Number of seconds from the start of the video',
		   'param_name'  => 'start_video',
		   'description' => esc_html__( 'Default value 1. This option work only youtube video.', 'js_composer' ),
		   'dependency'  => array( 'element' => 'playing', 'value' => 'true' )
	  	),
	  	array(
		   'type'        => 'textfield',
		   'heading'     => 'Height video (in px)',
		   'param_name'  => 'height_video',
		   'description' => esc_html__( 'Default value 430', 'js_composer' ),
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

class WPBakeryShortCode_consultant_video extends WPBakeryShortCode{
	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'check_autoplay'       => '',
			'show_controls'       => '',
			'height_video'       => '',
			'bg_video_link'       => '',
			'start_video'       => '1',
			'img_bg'       => '',
			'el_class'       => '',
			'css'       => '',
		), $atts ) );

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, $this->settings['base'], $atts );
		
		// custum css
		$css_class .= vc_shortcode_custom_css_class( $css, ' ' );

		$custom_css_box=substr($css, strlen($css_class)+1);
		$custom_css_box=substr($custom_css_box, 0, strlen($custom_css_box)-1);

		$img_url = ( ! empty( $img_bg ) && is_numeric( $img_bg ) ) ? wp_get_attachment_url( $img_bg ) : '';


		// custum class
		$css_class .= (!empty($el_class)) ? ' '.$el_class : '';
		$output="";
		// output
		if($check_autoplay=='true') {
			$check_autoplay='1';
		} else {
			$check_autoplay='0';
		}

		if($show_controls=='true') {
			$show_controls='1';
		} else {
			$show_controls='0';
		}

		if(!empty($height_video)) {
			$height_video = (int)$height_video;
		}

		$output .= '<div class="lx-video   ' .esc_attr( $css_class ).'" data-autoplay="'.$check_autoplay.'" data-controls="'.$show_controls.'" data-start="'.$start_video.'"  style="'.esc_attr( $custom_css_box.'; height:'.$height_video.'px' ).'" >';
			if(!empty($img_url)) $output .='<div class="preview-video" style="background-image: url('.$img_url .'); '.esc_attr( $custom_css_box ).' "><div class="play-video"><div class="triangle"></div></i></div></div>';
			if (!empty($bg_video_link)) {
				$output .=wp_oembed_get($bg_video_link);
			} 
		$output .= '</div>';


		// return output
		return  $output;

	}
}
