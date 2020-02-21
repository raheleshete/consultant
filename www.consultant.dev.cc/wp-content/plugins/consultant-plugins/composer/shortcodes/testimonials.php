<?php 
/*
** consultant Heading Shortcode
** Version: 1.0.0 
*/


vc_map( array(
	'name'                    => esc_html__( 'Testimonial', 'js_composer' ),
	'base'                    => 'consultant_testimonials',
	'as_parent'               => array('only' => 'consultant_testimonials_item'),
	'content_element'         => true,
	'show_settings_on_create' => true,
	'category' 				  => esc_html__( 'From consultant', 'js_composer' ),
	'description'             => esc_html__( 'Testimonials shortcode', 'js_composer'),
	'js_view'                 => 'VcColumnView',
	'params'          => array(

		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'js_composer'),
			'param_name' => 'style_text',
			'value' => array(
				esc_html__('Dark', 'js_composer') => 'dark',
				esc_html__('Light', 'js_composer') => 'light',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Count slides', 'js_composer' ),
			'param_name' => 'width',
			'value' => array(
				esc_html__( '1 slide', 'js_composer' ) => '1',
				esc_html__( '2 slides', 'js_composer' ) => '2',
				esc_html__( '3 slides', 'js_composer' ) => '3',
				esc_html__( '4 slides', 'js_composer' ) => '4',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Loop', 'js_composer' ),
			'param_name' => 'loop',
			'value' => array(
				esc_html__( 'Yes', 'js_composer' ) => '1',
				esc_html__( 'No', 'js_composer' ) => '0',
			),
			'description' => esc_html__( 'Selecting "Yes" will be repeated slides ', 'js_composer' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Autoplay', 'js_composer' ),
			'param_name' => 'autoplay_switch',
			'value' => array(
				esc_html__( 'No', 'js_composer' ) => '0',
				esc_html__( 'Yes', 'js_composer' ) => '1',
			),
			'description' => esc_html__( 'Slides will change automatically during the selected time seconds', 'js_composer' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Count second autoplay', 'js_composer' ),
			'param_name' => 'autoplay',
			'value' => array(
				esc_html__( 'One', 'js_composer' ) => '1000',
				esc_html__( 'Two', 'js_composer' ) => '2000',
				esc_html__( 'Three', 'js_composer' ) => '3000',
				esc_html__( 'Four', 'js_composer' ) => '4000',
				esc_html__( 'Five', 'js_composer' ) => '5000',
			),
			'dependency' =>  array('element' => 'autoplay_switch', 'value' => '1' ),
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
	) //end params
) );

class WPBakeryShortCode_consultant_testimonials extends WPBakeryShortCodesContainer {

	protected function content( $atts, $content = null) {

		extract( shortcode_atts( array(
			'width'  => '1',
			'style'  => 't-barber',
			'style_text'  => 'dark',
			'autoplay_switch'  => '0',
			'autoplay'  => '1000',
			'loop'  => '1',
			'animation_scroll' 	=> 'fade-up',
			'duration_animation' 	=> '1000',
			'css'       => ''
		), $atts ) );

		global $consultant_shortcode_items;
		$consultant_shortcode_items = array();

		$width_class = 'content fullpage transition';
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width_class, $this->settings['base'], $atts );

		// custum css
		$css_class .= vc_shortcode_custom_css_class( $css, ' ' );

		// custum class
		$css_class .= (!empty($el_class)) ? ' ' . $el_class : '';

		// custum class
		if($autoplay_switch == "0") {
			$autoplay = "0";
		}
		
		$count_md = $width != '1' ? '2' : '1';
		
		do_shortcode( $content );
		ob_start(); ?>

		<div class="swiper-container lx-testimonials-swiper t-consultant clear" data-autoplay="<?php echo esc_attr($autoplay) ?>" data-loop="<?php echo esc_attr($loop) ?>" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="1" data-md-slides="<?php echo esc_attr($count_md); ?>" data-lg-slides="<?php echo esc_attr($width); ?>" data-add-slides="<?php echo esc_attr($width); ?>" data-aos="<?php echo esc_attr( $animation_scroll ); ?>" data-aos-duration="<?php echo esc_attr( $duration_animation ); ?>">
			<div class="swiper-wrapper">
			<?php foreach ($consultant_shortcode_items as $key=>$shortcode) {
				$shortcode_atts = (object) $shortcode['atts']; 
				$src = ( !empty( $shortcode_atts->image ) && is_numeric( $shortcode_atts->image ) ) ? wp_get_attachment_url( $shortcode_atts->image ) : ''; ?>
				<div class="swiper-slide">
					<div class="lx-testimonials <?php echo esc_attr( $css_class . ' ' .$style_text ); ?>">
						<?php if(!empty($src)) { ?>
							<div class="img-wrap s-back-switch">
								<img class="s-img-switch" src="<?php echo esc_url($src); ?>" alt="">
							</div>					
						<?php } ?>
						
						<div class="info-wrap <?php echo esc_attr($style_text); ?>">
							<?php if (! empty($shortcode_atts->desc)) { ?>	
								<div class="desc"><?php echo wp_kses_post($shortcode_atts->desc);  ?></div>
							<?php }
							if (! empty($shortcode_atts->title)) { ?>
								<h3 class="title" ><?php echo esc_html($shortcode_atts->title); ?></h3>
							<?php } ?>
							
						</div>
					</div>
				</div>
				
			<?php } ?>
			</div>
			<div class="pagination <?php echo esc_attr($style_text); ?>"></div>
		 </div>
		
		<?php 

		return  ob_get_clean();
	}

}


/* Shortvode Item */

vc_map( array(
  'name'            => 'Testimonial item',
  'base'            => 'consultant_testimonials_item',
  'as_child' 		=> array('only' => 'consultant_testimonials'),
  'content_element' => true,
  'show_settings_on_create' => true,
  'description'     => 'Image, title and text',
  'params'          => array(

  	array(
		'type' => 'attach_image',
		'heading' => esc_html__( 'Image', 'js_composer' ),
		'param_name' => 'image',
	),
	array(
		'type'        => 'textfield',
		'heading'     => 'Name',
		'param_name'  => 'title',
		'admin_label' => true,
		'value'       => '',
	),
	array(
		'type' => 'textarea',
		'heading' => esc_html__( 'Description', 'js_composer' ),
		'param_name' => 'desc',
		'value' => '',
	),
	
	array(
	 	'type' => 'textfield',
	 	'heading' => esc_html__( 'Extra class name', 'js_composer' ),
	 	'param_name' => 'el_class',
	 	'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
	 	'value' => '',
	 ),
  ) //end params
) );


class WPBakeryShortCode_consultant_testimonials_item extends WPBakeryShortCode{
	protected function content( $atts, $content = null ) {

		global $consultant_shortcode_items;
		$consultant_shortcode_items[] = array( 'atts' => $atts, 'content' => $content, 'css_class' => '');
		return ;
	}
}





