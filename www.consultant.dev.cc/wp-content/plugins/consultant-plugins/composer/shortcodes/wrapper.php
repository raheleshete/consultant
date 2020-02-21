<?php 
/*
** Banner Shortcode
** Version: 1.0.0 
*/

function cr_get_row_offset_sh( $pref, $suf, $max = 120, $step = 5 ){
    $ar = array();
    for ($i=0; $i < $max + $step; $i += $step ) { 
        $ar[$i . 'px'] = $pref . '-' . $suf . $i;
    }
    return array_merge(array( 'Default'  => 'none' ), $ar );
}


vc_map( array(
	'name'                    => esc_html__( 'Banner', 'js_composer' ),
	'base'                    => 'consultant_main',
	'as_parent'               => array('only' => 'consultant_heading, consultant_testimonials, consultant_formidable, consultant_calendar, vc_row, consultant_lx_button, vc_empty_space, consultant_image, consultant_counter'),
	'content_element'         => true,
	'show_settings_on_create' => true,
	'category' 				  => esc_html__( 'From consultant', 'js_composer' ),
	'description'             => esc_html__( 'Main shortcode', 'js_composer'),
	'js_view'                 => 'VcColumnView',
	'params'          => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Style background', 'js_composer' ),
			'value' => array(
				esc_html__( 'Transparent', 'js_composer' ) => '',
				esc_html__( 'Background color', 'js_composer' ) => 'bg_lx_color',
				esc_html__( 'Background image', 'js_composer' ) => 'bg_image',
			),
			'admin_label' => true,
			'param_name' => 'style_bg',
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Width content banner', 'js_composer' ),
			'value' => array(
				esc_html__( 'Container', 'js_composer' ) => 'container',
				esc_html__( 'Full width', 'js_composer' ) => 'fullwidth',
			),
			'admin_label' => true,
			'param_name' => 'width',
			'description' => 'Full width only when row option \'Row stretch\' choosen stretch row and content',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background color', 'js_composer' ),
			'param_name' => 'bg_lx_color',
			'dependency' =>  array('element' => 'style_bg', 'value' => 'bg_lx_color' ),
		),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Background image', 'js_composer' ),
			'param_name' => 'bg_image_lx',
			'dependency' =>  array('element' => 'style_bg', 'value' => 'bg_image' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Position background image', 'js_composer' ),
			'param_name' => 'bg_position',
			'value' => array(
				esc_html__( 'Center', 'js_composer' ) => 'bg_center',
				esc_html__( 'Left', 'js_composer' ) => 'bg_left',
				esc_html__( 'Right', 'js_composer' ) => 'bg_right',
			),
			'admin_label' => true,
			'dependency' =>  array('element' => 'style_bg', 'value' => 'bg_image' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Enable paralax effect', 'js_composer' ),
			'param_name' => 'check_paralax',
			'dependency' =>  array('element' => 'style_bg', 'value' => 'bg_image' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Enable overlay', 'js_composer' ),
			'param_name' => 'check_overlay',
			'dependency' =>  array('element' => 'style_bg', 'value' => 'bg_image' ),
		),
		
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Overlay', 'js_composer' ),
			'param_name' => 'overlay',
			'dependency' =>  array('element' => 'check_overlay', 'value' => 'true' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Enable shadow', 'js_composer' ),
			'param_name' => 'check_shadow',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Color shadow', 'js_composer' ),
			'param_name' => 'color_shadow',
			'dependency' =>  array('element' => 'check_shadow', 'value' => 'true' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Space left and right', 'js_composer' ),
			'param_name' => 'check_spaces',
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Width shadow', 'js_composer' ),
			'param_name' => 'shadow_width',
			'dependency' =>  array('element' => 'check_shadow', 'value' => 'true' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Space left', 'js_composer' ),
			'param_name' => 'left_space',
		),
		array(
            'type' => 'checkbox',
            'heading' => esc_html__('Space left to width container', 'js_composer'),
            'param_name' => 'lx_space_container',
        ),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'js_composer' ),
			'param_name' => 'css',
			'group' => esc_html__( 'Design options', 'js_composer' ),
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
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Desctop margin top', 'js_composer' ),
	        'param_name'  => 'desctop_mt',
	        'value'       => cr_get_row_offset_sh('marg-md', 't', 150),
	        'group'       => 'Responsive Margins'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Desctop margin bottom', 'js_composer' ),
	        'param_name'  => 'desctop_mb',
	        'value'       => cr_get_row_offset_sh('marg-md', 'b', 150),
	        'group'       => 'Responsive Margins',
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Tablets margin top', 'js_composer' ),
	        'param_name'  => 'tablets_mt',
	        'value'       => cr_get_row_offset_sh('marg-sm', 't'),
	        'group'       => 'Responsive Margins'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Tablets margin bottom', 'js_composer' ),
	        'param_name'  => 'tablets_mb',
	        'value'       => cr_get_row_offset_sh('marg-sm', 'b'),
	        'group'       => 'Responsive Margins'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Mobile margin top', 'js_composer' ),
	        'param_name'  => 'mobile_mt',
	        'value'       => cr_get_row_offset_sh('marg-xs', 't'),
	        'group'       => 'Responsive Margins'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Mobile margin bottom', 'js_composer' ),
	        'param_name'  => 'mobile_mb',
	        'value'       => cr_get_row_offset_sh('marg-xs', 'b'),
	        'group'       => 'Responsive Margins'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Desctop padding top', 'js_composer' ),
	        'param_name'  => 'desctop_pt',
	        'value'       => cr_get_row_offset_sh('padd-md', 't', 150),
	        'group'       => 'Responsive Paddings'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Desctop padding bottom', 'js_composer' ),
	        'param_name'  => 'desctop_pb',
	        'value'       => cr_get_row_offset_sh('padd-md', 'b', 150),
	        'group'       => 'Responsive Paddings',
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Tablets padding top', 'js_composer' ),
	        'param_name'  => 'tablets_pt',
	        'value'       => cr_get_row_offset_sh('padd-sm', 't'),
	        'group'       => 'Responsive Paddings'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Tablets padding bottom', 'js_composer' ),
	        'param_name'  => 'tablets_pb',
	        'value'       => cr_get_row_offset_sh('padd-sm', 'b'),
	        'group'       => 'Responsive Paddings'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Mobile padding top', 'js_composer' ),
	        'param_name'  => 'mobile_pt',
	        'value'       => cr_get_row_offset_sh('padd-xs', 't'),
	        'group'       => 'Responsive Paddings'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Mobile padding bottom', 'js_composer' ),
	        'param_name'  => 'mobile_pb',
	        'value'       => cr_get_row_offset_sh('padd-xs', 'b'),
	        'group'       => 'Responsive Paddings'
	    ),
	) //end params
) );

class WPBakeryShortCode_consultant_main extends WPBakeryShortCodesContainer {

	protected function content( $atts, $content = null) {

		extract( shortcode_atts( array(
			'style_bg'  => '',
			'bg_lx_color'  => '',
			'width'     => 'container',
			'bg_image_lx'  => '',
			'overlay'   => '',
			'lx_space_container'   => '',
			'left_space'   => '',
			'animation_scroll' 	=> 'fade-up',
			'duration_animation' 	=> '1000',
			'bg_position'   => 'bg_center',
			'check_paralax'   => '',
			'color_shadow'   => '',
			'check_spaces'   => '',
			'shadow_width'   => '',
			'desctop_mt'   => '',
			'desctop_mb'   => '',
			'tablets_mt'   => '',
			'tablets_mb'   => '',
			'mobile_mt'   => '',
			'mobile_mb'   => '',
			'desctop_pt'   => '',
			'desctop_pb'   => '',
			'tablets_pt'   => '',
			'tablets_pb'   => '',
			'mobile_pt'   => '',
			'mobile_pb'   => '',
			'el_class'  => '',
			'css'       => ''
		), $atts ) );

		$lx_space_container = !empty($lx_space_container) && $lx_space_container == 'true' ? 'left-space-container' : '';
		$responsive_classes=$desctop_mt.' '.$desctop_mb.' '.$tablets_mt.''.$tablets_mb.' '.$mobile_mt.' '.$mobile_mb.' '.$desctop_pt.' '.$desctop_pb.' '.$tablets_pt.' '.$tablets_pb.' '.$mobile_pt.' '.$mobile_pb;
		global $consultant_shortcode_items;
		$consultant_shortcode_items = array();

		$width_class = '';
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width_class, $this->settings['base'], $atts );

		$css_class .= vc_shortcode_custom_css_class( $css, ' ' );

		if($left_space=="true") {
			$left_space="left-space";
		}
		



		// custum class
		$css_class .= (!empty($el_class)) ? ' ' . $el_class : '';


		$src = ( !empty( $bg_image_lx ) && is_numeric( $bg_image_lx ) ) ? wp_get_attachment_url( $bg_image_lx ) : false;

		if($check_spaces=='true') {
			$check_spaces='spaces-l-r';
		} else {
			$check_spaces='';
		}
		
		// output
		ob_start();
		if($check_paralax=='true') {
			$paralax='bg_fixed';
		} else {
			$paralax='';
		}



		
		?>
			
			<?php if(!empty($style_bg) && $style_bg=="bg_image") { ?>
			<div class="lx-main-wrapper image-wrapper <?php echo esc_attr($lx_space_container.' '.$left_space.' '.$bg_position.' '.$paralax.' '.$responsive_classes.' '.$check_spaces.' '.$css_class); ?>" style="background-image: url(<?php echo esc_attr( $src ); ?>); ?>; box-shadow: 0 3px <?php echo esc_attr($shadow_width.'px '.$color_shadow.'; '); ?> " data-aos="<?php echo esc_attr( $animation_scroll ); ?>" data-aos-duration="<?php echo esc_attr( $duration_animation ); ?>">
			<?php } elseif(!empty($style_bg) && $style_bg=="bg_lx_color") { ?>
			<div class="lx-main-wrapper <?php echo esc_attr( $lx_space_container.' '.$left_space.' '.$responsive_classes.' '.$check_spaces.' '.$css_class ); ?>" style="background-color: <?php echo esc_attr( $bg_lx_color ); ?>; ?>; box-shadow: 0 3px <?php echo esc_attr($shadow_width.'px '.$color_shadow.'; '); ?>" data-aos="<?php echo esc_attr( $animation_scroll ); ?>" data-aos-duration="<?php echo esc_attr( $duration_animation ); ?>">
			<?php } else { ?>
			<div class="lx-main-wrapper <?php echo esc_attr( $lx_space_container.' '.$left_space.' '.$responsive_classes.' '.$check_spaces.'; '.$css_class ); ?>" style="box-shadow: 0 3px <?php echo esc_attr($shadow_width.'px '.$color_shadow); ?>;" data-aos="<?php echo esc_attr( $animation_scroll ); ?>" data-aos-duration="<?php echo esc_attr( $duration_animation ); ?>">
			<?php } ?>

				<?php if(!empty($overlay)) { ?>
					<div class="lx-overlay" style="background-color: <?php echo esc_attr( $overlay ); ?>;"></div>
				<?php } ?>
				<?php if($width=="container") { ?>
				<div class="container">
				<?php } ?>
					

						<?php echo do_shortcode( $content ); ?>

					

				<?php if($width=="container") { ?>
				</div>
				<?php } ?>

			</div>

		<?php 
		return  ob_get_clean();
	}

}

/* Shortvode Item */

vc_map( array(
  'name'            => 'Item',
  'base'            => 'consultant_main_item',
  'as_child' 		=> array('only' => 'consultant_vertical_slider'),
  'content_element' => true,
  'show_settings_on_create' => true,
  'description'     => 'Image, title and text',
  'params'          => array(

	
  ) //end params
) );


class WPBakeryShortCode_consultant_main_item extends WPBakeryShortCode{
	protected function content( $atts, $content = null ) {

		global $consultant_shortcode_items;
		$consultant_shortcode_items[] = array( 'atts' => $atts, 'content' => $content, 'css_class' => '');
		return;
	}
}