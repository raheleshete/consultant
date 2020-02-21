<?php 
/*
** consultant Team Slider Shortcode
** Version: 1.0.0 
*/


vc_map( array(
	'name'                    => esc_html__( 'Team slider', 'js_composer' ),
	'base'                    => 'consultant_team_slider',
	'as_parent'               => array('only' => 'consultant_team_slider_item'),
	'content_element'         => true,
	'show_settings_on_create' => true,
	'category' 				  => esc_html__( 'From consultant', 'js_composer' ),
	'description'             => esc_html__( 'Team sliders shortcode', 'js_composer'),
	'js_view'                 => 'VcColumnView',
	'params'          => array(

		array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Style divider', 'js_composer' ),
	        'param_name'  => 'lx_iconset_dividers',
	        'value'     => 'lx-icons_dividers', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_dividers(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'divider_switcher', 'value' => 'show'),

      	),
      	array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Style text', 'js_composer' ),
			'param_name' => 'style_text',
			'value' => array(
				esc_html__( 'Dark', 'js_composer' ) => '',
				esc_html__( 'Light', 'js_composer' ) => 'light',
			),
		),
      	array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Size title', 'js_composer' ),
			'param_name' => 'style_title',
			'value' => array(
				esc_html__( 'Small', 'js_composer' ) => 'small',
				esc_html__( 'Medium', 'js_composer' ) => 'medium',
				esc_html__( 'Large', 'js_composer' ) => 'large',
				esc_html__( 'Extra Large', 'js_composer' ) => 'x-large',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Size subtitle', 'js_composer' ),
			'param_name' => 'style_subtitle',
			'value' => array(
				esc_html__( 'Small', 'js_composer' ) => 'small',
				esc_html__( 'Medium', 'js_composer' ) => 'medium',
				esc_html__( 'Large', 'js_composer' ) => 'large',
				esc_html__( 'Extra Large', 'js_composer' ) => 'x-large',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Count slides', 'js_composer' ),
			'param_name' => 'count_slides',
			'value' => array(
				esc_html__( '1 slide ', 'js_composer' ) => '1',
				esc_html__( '2 slide ', 'js_composer' ) => '2',
				esc_html__( '3 slide ', 'js_composer' ) => '3',
				esc_html__( '4 slide ', 'js_composer' ) => '4',
				esc_html__( '5 slide ', 'js_composer' ) => '5',
				esc_html__( '6 slide ', 'js_composer' ) => '6',
			),
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Responsive count slides', 'js_composer' ),
			'param_name' => 'resp_slide_switch',
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Count md slides', 'js_composer' ),
			'param_name' => 'md_slides',
			'description' => 'width screen <1199px and >=992px',
			'value' => array(
				esc_html__( '1 slide ', 'js_composer' ) => '1',
				esc_html__( '2 slide ', 'js_composer' ) => '2',
				esc_html__( '3 slide ', 'js_composer' ) => '3',
				esc_html__( '4 slide ', 'js_composer' ) => '4',
			),
			'dependency' =>  array('element' => 'resp_slide_switch', 'value' => 'true' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Count sm slides', 'js_composer' ),
			'param_name' => 'sm_slides',
			'description' => 'width screen <992px and >=768px',
			'value' => array(
				esc_html__( '1 slide ', 'js_composer' ) => '1',
				esc_html__( '2 slide ', 'js_composer' ) => '2',
				esc_html__( '3 slide ', 'js_composer' ) => '3',
				esc_html__( '4 slide ', 'js_composer' ) => '4',
			),
			'dependency' =>  array('element' => 'resp_slide_switch', 'value' => 'true' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Count xs slides', 'js_composer' ),
			'param_name' => 'xs_slides',
			'description' => 'width screen <768px',
			'value' => array(
				esc_html__( '1 slide ', 'js_composer' ) => '1',
				esc_html__( '2 slide ', 'js_composer' ) => '2',
			),
			'dependency' =>  array('element' => 'resp_slide_switch', 'value' => 'true' ),
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

class WPBakeryShortCode_consultant_team_slider extends WPBakeryShortCodesContainer {

	protected function content( $atts, $content = null) {

		extract( shortcode_atts( array(
			'count_slides'  => '1',
			'md_slides'  => '1',
			'sm_slides'  => '1',
			'xs_slides'  => '1',
			'title'  => '',
			'subtitle'  => '',
			'style_text'  => '',
			'animation_scroll' 	=> 'fade-up',
			'duration_animation' 	=> '1000',
			'style_subtitle'  => 'small',
			'lx_iconset_dividers'  => '',
			'style_title'  => 'small',
			'css'       => ''
		), $atts ) );

		global $consultant_shortcode_items;
		$consultant_shortcode_items = array();

		$count_slides_class = 'content fullpage transition';
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $count_slides_class, $this->settings['base'], $atts );

		// custum css
		$css_class .= vc_shortcode_custom_css_class( $css, ' ' );

		// custum class
		$css_class .= (!empty($el_class)) ? ' ' . $el_class : '';


		// custum class
		
		if(empty($md_slides)) {
			$md_slides=3;
		}
		if(empty($sm_slides)) {
			$sm_slides=2;
		}
		if(empty($xs_slides)) {
			$xs_slides=1;
		}
		
		do_shortcode( $content );

		ob_start(); ?>

		<div class="lx-team-slider" data-aos="<?php echo esc_attr( $animation_scroll ); ?>" data-aos-duration="<?php echo esc_attr( $duration_animation ); ?>">
			<div class="row">
				<div class="col-md-5">
					<div class="big-image border"></div>
				</div>
				<div class="col-md-7">
					<div class="wrapper">
						<?php
						$count2 = 0;
						foreach ($consultant_shortcode_items as $key=>$shortcode) {
							$shortcode_atts = (object) $shortcode['atts'];
							$active_info = $count2 == 0 ? 'active' : '';?>
							<div class="info-wrap <?php echo esc_attr($active_info . ' ' . $style_text); ?>">
								<?php if (! empty($shortcode_atts->title)) { ?>		
									<h3 class="title" ><?php echo esc_html($shortcode_atts->title); ?></h3>
								<?php }
								if (! empty($shortcode_atts->subtitle)) { ?>
									<h5 class="subtitle" ><?php echo esc_html($shortcode_atts->subtitle); ?></h5>
								<?php }
								if (! empty($shortcode_atts->desc)) { ?>
									<div class="desc"><?php echo wp_kses_post($shortcode_atts->desc);  ?></div>
								<?php } ?>
							</div>
						<?php
							$count2++;
						} ?>
					</div>

					<div class="swiper-container clear" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="<?php echo esc_attr( $xs_slides ); ?>" data-sm-slides="<?php echo esc_attr( $sm_slides ); ?>" data-md-slides="<?php echo esc_attr($md_slides); ?>" data-lg-slides="<?php echo esc_attr($count_slides); ?>" data-add-slides="<?php echo esc_attr($count_slides); ?>">
						<div class="swiper-wrapper">
						<?php
						$count = 0;
						foreach ($consultant_shortcode_items as $key=>$shortcode) {
							$shortcode_atts = (object) $shortcode['atts']; 
							$src = ( !empty( $shortcode_atts->image ) && is_numeric( $shortcode_atts->image ) ) ? wp_get_attachment_url( $shortcode_atts->image ) : '';
							$active = $count == 0 ? 'swiper-slide-active' : '';
							?>
							<div class="swiper-slide <?php echo esc_attr($active); ?>">
								<div class="lx-team-slider-item <?php echo esc_attr( $css_class ); ?>">

									<?php if(!empty($src)) { ?>
										<div class="img-wrap s-back-switch border">
											<img class="img-team s-img-switch" src="<?php echo esc_url($src); ?>" alt="">
										</div>					
									<?php } ?>

								</div>
							</div>
							
						<?php
						$count++;
						} ?>
						</div>
						<div class="pagination hidden"></div>
					 </div>
				</div>
			</div>
		</div>

		
		
		
		<?php 

		return  ob_get_clean();
	}

}


/* Shortvode Item */

vc_map( array(
  'name'            => 'Team slider item',
  'base'            => 'consultant_team_slider_item',
  'as_child' 		=> array('only' => 'consultant_team_slider'),
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
		'type'        => 'textfield',
		'heading'     => 'Profession',
		'param_name'  => 'subtitle',
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


class WPBakeryShortCode_consultant_team_slider_item extends WPBakeryShortCode{
	protected function content( $atts, $content = null ) {

		global $consultant_shortcode_items;
		$consultant_shortcode_items[] = array( 'atts' => $atts, 'content' => $content, 'css_class' => '');
		return ;
	}
}





