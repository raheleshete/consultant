<?php 
/*
 * Gallery Shortcode
 * Author: Foxthemes
 * Version: 1.0.0 
 */

vc_map( array(
    'name'            => esc_html__( 'Gallery', 'js_composer' ),
    'base'            => 'portfolio_gallery',
    'description'     => esc_html__( 'Gallery list', 'js_composer' ),
    'params'          => array(
    	
      	array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Style gallery', 'js_composer' ),
	        'param_name'  => 'style_gallery',
	        'value'       => array(
	          	'Grid'  	=> 'grid',
	          	'Masonry'  	=> 'masonry',
	        ),   
      	),
      	array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Animation popup', 'js_composer' ),
	        'param_name'  => 'animation_popup',
	        'value'       => array(
	          	'Zoom'  	=> 'mfp-zoom-in',
	          	'Newspaper'  	=> 'mfp-newspaper',
	          	'Horizontal move'  	=> 'mfp-move-horizontal',
	          	'Move from top'  	=> 'mfp-move-from-top',
	          	'Move from top'  	=> 'mfp-move-from-top',
	          	'3d unfold'  	=> 'mfp-3d-unfold',
	          	'Zoom-out'  	=> 'mfp-zoom-out',
	        ),   
      	),
      	array(
			'type' => 'attach_images',
			'heading' => esc_html__( 'Upload Images', 'js_composer' ),
			'param_name' => 'gallary_images',
		),
      	array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Column', 'js_composer' ),
			'param_name' => 'width',
			'value' => array(
				esc_html__( '2 columns - 1/6', 'js_composer' ) => '1/6',
				esc_html__( '3 columns - 1/4', 'js_composer' ) => '1/4',
				esc_html__( '4 columns - 1/3', 'js_composer' ) => '1/3',
			),
			'description' => esc_html__( 'Select column width.', 'js_composer' ),
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
    )
));

class WPBakeryShortCode_portfolio_gallery extends WPBakeryShortCode{

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style' 	   => 'nogutter2',
			'gstyle' 	   => 'p_barber',
			'width' 	   => '1/6',
			'type'		   => 'gallery',
			'subtitle' 	   => '',
			'gallary_images' 	   => '',
			'animation_scroll' 	=> 'fade-up',
			'duration_animation' 	=> '1000',
			'hover' 	   => '',
			'style_gallery' 	   => 'grid',
			'show_content' 	   => '',
			'animation_popup' 	   => 'mfp-zoom-in',
			'show_date' 	   => '',
			'animation'	   => 'enable'
		), $atts ) );


	    $animation = ( $animation == 'enable' ) ? 'animation' : '';
	    $output	   = '';

	    $style_page='lx-gallery';
	    if($style_gallery=='masonry') {
	    	$item_gallery='item';
	    	$masonry_gallery='izotope-container';
	    } else {
	    	$item_gallery=$masonry_gallery='';
	    }

	    if($width=='1/6') {
			$width_style="two_col";
		} elseif($width=='1/4') {
			$width_style="three_col";
		} else {
			$width_style="four_col";
		}


		$width_class = array(
			'1/6' => ' col-sm-6 col-xs-12 no-padding-xs',
			'1/4' => ' col-md-4 col-sm-6 col-xs-12 no-padding-xs',
			'1/3' => ' col-lg-3 col-md-4 col-sm-6 col-xs-12 no-padding-xs'
		);


	    $grid_style = 'popup-gallery';

	    $date_format='d.m.Y';

    	$output .= '<div class=" '.esc_attr( $width_style ).' '.esc_attr( $masonry_gallery ).' '.esc_attr( $style_gallery ).' '.esc_attr($style_page).' '. esc_attr($gstyle) .' ' .esc_attr($animation).'" data-aos="'.esc_attr( $animation_scroll ).'" data-aos-duration="'.esc_attr( $duration_animation ).'">';

		if($gallary_images) {
			
    		$gallary_images = explode( ',', $gallary_images );
			$gallary_images = array_slice($gallary_images, 0, count($gallary_images));

    		foreach ($gallary_images as $i => $image) {
    			$attachment_title = get_the_title($image);

    			$img = wp_get_attachment_image_src( $image, 'full');
    			
    			$output .= '<div class=" '.esc_attr( $item_gallery ).' '. esc_attr( $width_class[$width] ) .'" >';
	    			$output .='<a href="'.esc_attr( $img[0] ).'" data-effect="'.esc_attr( $animation_popup ).'"><div class="gallery-item s-back-switch">';
	    				$output .='<img class="s-img-switch" alt="image" src="' . esc_attr( $img[0] ) . '" />';
		    				$output .='<div class="wrap-info">';
		    					if(!empty($attachment_title)) {
		    						$output .='<p class="title">'.esc_html( $attachment_title ).'</p>';
		    					}
		    				$output .= '</div>';
	    			$output .= '</div></a>';
    			$output .= '</div>';
    		}

		
		}
 	  

		$output .= '</div>';
		

		// end output
	    return  $output;
	    
	} // end function content
}
