<?php 
/*
** Vertical Shortcode
** Version: 1.0.0 
*/


vc_map( array(
	'name'                    => esc_html__( 'Services', 'js_composer' ),
	'base'                    => 'consultant_services',
	'as_parent'               => array('only' => 'consultant_text_icon'),
	'content_element'         => true,
	'show_settings_on_create' => true,
	'category' 				  => esc_html__( 'From consultant', 'js_composer' ),
	'description'             => esc_html__( 'Services', 'js_composer'),
	'js_view'                 => 'VcColumnView',
	'params'          => array(

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Design Style', 'js_composer' ),
			'param_name' => 'style',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => 'icon-consultant',
				esc_html__( 'Classic', 'js_composer' ) => 'icon-career',
				esc_html__( 'Modern', 'js_composer' ) => 'icon-consultant modern',
			),
		),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Image', 'js_composer' ),
			'param_name' => 'big_image',
		),
		array(
	        'type'        => 'checkbox',
	        'heading'     => esc_html__( 'Show the small picture instead of a large picture on hover', 'js_composer' ),
	        'param_name'  => 'bg_hover_small',
	        'description'  => 'Only when small pictures instead of icons',
	        'value'       => '',
	    ),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'js_composer' ),
			'param_name' => 'css',
			'group' => esc_html__( 'Design options', 'js_composer' ),
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

class WPBakeryShortCode_consultant_services extends WPBakeryShortCodesContainer {

	protected function content( $atts, $content = null) {

		extract( shortcode_atts( array(
			'big_image'  => '',
			'style'  => 'icon-consultant',
			'bg_hover_small'  => '',
			'animation_scroll' 	=> 'fade-up',
			'duration_animation' 	=> '1000',
			'el_class'  => '',
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


		$src_big = ( !empty( $big_image ) && is_numeric( $big_image ) ) ? wp_get_attachment_url( $big_image ) : false;

		if($bg_hover_small=='true') {
			$bg_hover_small='small-hover';
		}
		

		
		// output
		ob_start();
		
			
		
		?>


			
		<div class="lx-circle-wrapper <?php echo esc_attr( $css_class.' '.$bg_hover_small ) ?>" data-aos="<?php echo esc_attr( $animation_scroll ); ?>" data-aos-duration="<?php echo esc_attr( $duration_animation ); ?>">
			<div class="row">
				<div class="big-circle-wrap">
					<div class="bg-wrap s-back-switch">
						<img class="s-img-switch" src="<?php echo $src_big; ?>" alt="">
					</div>
				</div>
				<div class="small-circle-wrap <?php echo $style; ?>">
					<?php echo do_shortcode( $content );  ?>
				</div>
				
				<?php foreach ($consultant_shortcode_items as $key=>$shortcode) {
					$shortcode_atts = (object) $shortcode['atts'];

					$class_active = (!empty($shortcode_atts->el_class)) ? ' '.$shortcode_atts->el_class : ''; ?>
					<div class="col-md-3">
						<div class="entry-circle">
							<?php if(!empty($shortcode_atts->title)) { ?>
								<p class="title"><?php echo esc_html($shortcode_atts->title) ?></p>
							<?php } ?>
							<?php if(!empty($shortcode_atts->text)) { ?>
								<p class="desc"><?php echo esc_html($shortcode_atts->text) ?></p>
							<?php } ?>
						</div>
						<div class="entry-img">
							<?php $src = ( !empty( $shortcode_atts->icon ) && is_numeric( $shortcode_atts->icon ) ) ? wp_get_attachment_url( $shortcode_atts->icon ) : false; 
								if(!empty($src)) {
							?>
								<img src="<?php echo $src; ?>" alt="" >
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				
			</div>
		</div>

		<?php 
		return  ob_get_clean();
	

	}
}

/* Shortvode Item */

vc_map( array(
  'name'            => 'Service item',
  'base'            => 'consultant_services_item',
  'as_child' 		=> array('only' => 'consultant_services'),
  'content_element' => true,
  'show_settings_on_create' => true,
  'description'     => 'Image, title and text',
  'params'          => array(

  	array(
		'type'        => 'textfield',
		'heading'     => 'Title',
		'param_name'  => 'title',
		'admin_label' => true,
		'value'       => '',
	),
	array(
		'type'        => 'textarea',
		'heading'     => 'Text',
		'param_name'  => 'text',
		'value'       => '',
	),
	array(
		'type' => 'attach_image',
		'heading' => esc_html__( 'Icon', 'js_composer' ),
		'param_name' => 'icon',
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


class WPBakeryShortCode_consultant_services_item extends WPBakeryShortCode{
	protected function content( $atts, $content = null ) {

		global $consultant_shortcode_items;
		$consultant_shortcode_items[] = array( 'atts' => $atts, 'content' => $content, 'css_class' => '');
		return;
	}
}