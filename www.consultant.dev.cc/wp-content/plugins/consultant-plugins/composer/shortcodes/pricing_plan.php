<?php
/**
 * Plan shortcode
 *
 * @package consultant
 * @since 1.0.0
 *
 */


// ==========================================================================================
// PLAN
// ==========================================================================================

vc_map( array(
	'name'						=> esc_html__( 'Pricing Package', 'consultantpro' ),
	'base'						=> 'consultant_plan_wrapper',
	'description'				=> 'Plan',
	'category'					=> 'Custom Content',
	'as_parent'					=> array( 'only' => 'consultant_plan' ),
	'content_element'			=> true,
	'category' 				  => esc_html__( 'From consultant', 'js_composer' ),
	'show_settings_on_create'	=> true,
	'params'					=> array(

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Style', 'js_composer' ),
			'param_name' => 'style_pricing',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Classic', 'js_composer' ) => 'classic',
			),
			'description' => esc_html__( 'Select style.', 'js_composer' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Dark/light style', 'js_composer' ),
			'param_name' => 'style_dark_light',
			'value' => array(
				esc_html__( 'Dark', 'js_composer' ) => '',
				esc_html__( 'Light', 'js_composer' ) => 'light',
			),
			'description' => esc_html__( 'Select style.', 'js_composer' ),
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
			'heading' => esc_html__( 'Columns gap', 'js_composer' ),
			'param_name' => 'gap',
			'dependency' => array('element'=>'style_pricing','value'=>'classic'),
			'value' => array(
				esc_html__( 'Yes', 'js_composer' ) => '',
				esc_html__( 'No', 'js_composer' ) => 'no-padding',
			),
			'description' => esc_html__( 'Only style classic.', 'js_composer' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Divider', 'js_composer' ),
			'param_name' => 'divider',
			'value' => array(
				esc_html__( 'Hide', 'js_composer' ) => '',
				esc_html__( 'Show', 'js_composer' ) => 'show',
			),
			'description' => esc_html__( 'Between icon and title. For style default and modern show only desktop and tablets device.', 'js_composer' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Position price', 'js_composer' ),
			'param_name' => 'pos_price',
			'value' => array(
				esc_html__( 'After title', 'js_composer' ) => '',
				esc_html__( 'After List of conditions', 'js_composer' ) => 'bottom',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Alignment text', 'js_composer' ),
			'param_name' => 'alignment_text',
			'value' => array(
				esc_html__( 'Left', 'js_composer' ) => 'left',
				esc_html__( 'Center', 'js_composer' ) => 'center',
				esc_html__( 'Right', 'js_composer' ) => 'right',
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
			'param_name'	=> 'el_class',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Extra class name', 'consultantpro' ),
			'description'	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'consultantpro' ),
		),
	),
	'js_view' => 'VcColumnView'
) );

class WPBakeryShortCode_consultant_plan_wrapper extends WPBakeryShortCodesContainer {

	protected function content( $atts, $content = null) {

		extract( shortcode_atts( array(
			'width'				=> '1/6',
			'gap'			=> '',
			'style_dark_light'			=> '',
			'style_pricing'			=> '',
			'style'		        => '',
			'divider'		        => '',
			'pos_price'		        => '',
			'animation_scroll' 	=> 'fade-up',
			'duration_animation' 	=> '1000',
			'alignment_block'		        => '',
			'alignment_text'		        => 'left',
		), $atts ) );



		$width_class = array(
			'1/6' => ' col-sm-6 col-xs-12',
			'1/4' => ' col-sm-4 col-xs-12',
			'1/3' => ' col-md-3 col-sm-6 col-xs-12'
		);

		



		global $consultant_shortcode_items;
		$consultant_shortcode_items = array();


		$output  = '';

		
			$output .= do_shortcode( $content );

		$alignment_text='text-'.$alignment_text;

		$divider_left="";
		if(!empty($divider) && $divider=="show") {
			$divider_left="modern-divider";
		}
		$output .='<div class="lx-pricing '.esc_attr( $style_pricing.' '.$divider_left ).'" data-aos="'.esc_attr( $animation_scroll ).'" data-aos-duration="'.esc_attr( $duration_animation ).'">';
		$output .='<div class="row">';
		foreach ($consultant_shortcode_items as $key=>$shortcode) {
			$shortcode_atts = (object) $shortcode['atts'];
			// print_r($shortcode_atts);
			$class_active = (!empty($shortcode_atts->el_class)) ? ' '.$shortcode_atts->el_class : '';
			if(!empty($shortcode_atts->lx_iconset_consult)) {
				$lx_iconset_consult=substr($shortcode_atts->lx_iconset_consult,9,strlen($shortcode_atts->lx_iconset_consult)-1);
			}
			if(!empty($shortcode_atts->lx_iconset_flat)) {
				$lx_iconset_flat=substr($shortcode_atts->lx_iconset_flat,9,strlen($shortcode_atts->lx_iconset_flat)-1);
			}
			if(!empty($shortcode_atts->lx_iconset_tutor)) {
				$lx_iconset_tutor=substr($shortcode_atts->lx_iconset_tutor,9,strlen($shortcode_atts->lx_iconset_tutor)-1);
			}
			

			$src = ( !empty( $shortcode_atts->image ) && is_numeric( $shortcode_atts->image ) ) ? wp_get_attachment_url( $shortcode_atts->image ) : false;
			if(isset($shortcode_atts->active) && $shortcode_atts->active=="true") {
				$active_item = "active";
			} else {
				$active_item = "";
			}
			$description = "";
			if(!empty($shortcode_atts->description)) $description = $shortcode_atts->description;
			if(!empty($shortcode_atts->button)) {
				$button = vc_build_link( $shortcode_atts->button );
			} else {
				$button = "";
			}
			
			
			$output .="<div class='".esc_attr( $gap.' '.$width_class[$width] )."'>";
			$output .= '<div class="lx-plans-wrap price-entry ' .esc_attr( $alignment_text." ".$style." ".$active_item." ". $class_active." ".$style_dark_light ) . '">';

			if(!empty($shortcode_atts->type)) {
				$icon_type=$shortcode_atts->type;
			} else {
				$icon_type="";
			}

			
			$output .= '<div class="icon-group ">';
			if(!empty($src)) {
				$output .='<img src="'.esc_url( $src ).'" alt="">';
			} else {
 
				if($icon_type=='sculptor') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_sculptor).'" ></span>'; 
				}
				elseif($icon_type=='designer') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_designer).'" ></span>'; 
				}
				elseif($icon_type=='') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_barber).'" ></span>'; 
				}
				elseif($icon_type=='tatoo') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_tatoo).'" ></span>'; 
				}
				elseif($icon_type=='guitar') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_guitar).'" ></span>'; 
				}
				elseif($icon_type=='arhitecture') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_arhitecture).'" ></span>'; 
				}
				elseif($icon_type=='career') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_career).'" ></span>'; 
				}
				elseif($icon_type=='spa') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_spa).'" ></span>'; 
				}
				elseif($icon_type=='stuff') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_stuff).'" ></span>'; 
				}
				elseif($icon_type=='mobiles') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_mobiles).'" ></span>'; 
				}
				elseif($icon_type=='appliances') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_appliance).'" ></span>'; 
				}
				elseif($icon_type=='computers') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_computers).'" ></span>'; 
				}
				elseif($icon_type=='consultantpro') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_consultant).'" ></span>'; 
				}
				elseif($icon_type=='cello') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_cello).'" ></span>'; 
				}
				elseif($icon_type=='piano') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_piano).'" ></span>'; 
				}
				elseif($icon_type=='accordion') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_accordion).'" ></span>'; 
				}
				elseif($icon_type=='pool_cleaning') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_poll_cleaning).'" ></span>'; 
				}
				elseif($icon_type=='lawyer') {
					$output .='<span class="icon '.esc_attr($shortcode_atts->lx_iconset_lawyer).'" ></span>'; 
				}
				elseif($icon_type=='consultantpro') {
					$output .='<img src="'.get_template_directory_uri().'/assets/images/iconset/consultant/'.$lx_iconset_consult.'.png" alt="" class="icon" >';
				}
				elseif($icon_type=='flat') {
					$output .='<img src="'.get_template_directory_uri().'/assets/images/iconset/flat/'.$lx_iconset_flat.'.png" alt="" class="icon" >';
				}
				elseif($icon_type=='tutor') {
					$output .='<img src="'.get_template_directory_uri().'/assets/images/iconset/tutor/'.$lx_iconset_tutor.'.png" alt="" class="icon" >';
				} else {
					$output .='<img src="'.get_template_directory_uri().'/assets/images/icon-11.png" alt="" class="icon" >';
				}
			}
			$output .= '	</div>';

			if(!empty($divider) && $divider=="show" && $style_pricing=="classic") {
				$output .='<div class="divider "></div>';
			}

			$output .= '	<div class="info-group '.$icon_type.'">';
			if(!empty($shortcode_atts->title)) {
				$output .= '				<h3 class="title">' . esc_textarea( $shortcode_atts->title ) . '</h3>';
			}

			if(!empty($shortcode_atts->period)) {
				$period='<span>' . wp_kses_post( $shortcode_atts->period ) . '</span>';
			} else {
				$period="";
			}


			if ( !empty( $shortcode_atts->conditions ) ) {
				$conds = explode( "\n", $shortcode_atts->conditions );

				if(!empty($shortcode_atts->price) && $pos_price=="") {
					$output .= '				<div class="price">' . wp_kses_post( $shortcode_atts->price . $period ) .'</div>';
				}

				$output .='<div class="list">';
				foreach ($conds as $cond) {
					$output .= ( trim( $cond ) ) ? '<div class="item">' . wp_kses_post( $cond ) . '</div>' : '';
				}
				$output .='</div>';

				if(!empty($shortcode_atts->price) && $pos_price=="bottom") {
					$output .= '				<div class="price">' . wp_kses_post( $shortcode_atts->price . $period ) .'</div>';
				}

			}
			if(!empty($button)) {
				$output .= '				<a class="link" href="' . esc_url( $button['url'] ) . '"' . ( $button['target'] ? ' target="' . esc_attr( $button['target'] ) . '"' : '' ) . ' ">' . esc_textarea( $button['title'] ) . '</a>';	
			}
			$output .= '	</div>';
			$output .= '</div>';
			$output .= '</div>';
			

		}

		$output .='</div>';
		$output .= '</div>';
		

		
		

		return $output;
	}
}




vc_map( array(
	'name'				=> esc_html__( 'Plan', 'consultantpro' ),
	'base'				=> 'consultant_plan',
	'category'			=> 'Custom Content',
	'icon'				=> 'icon-wpb-toggle-small-expand',
	'as_child'			=> array( 'only' => 'consultant_plan_wrapper' ),
	'description'		=> esc_html__( 'Plan', 'consultantpro' ),
	'params'			=> array(
		array(
			'param_name'	=> 'title',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Title', 'consultantpro' ),
			'admin_label'	=> true,
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon library', 'js_composer' ),
			'value' => array(
				__( 'Barber', 'js_composer' ) => 'barber',
				__( 'Sculptor', 'js_composer' ) => 'sculptor',
				__( 'Designer', 'js_composer' ) => 'designer',
				__( 'Tatoo', 'js_composer' ) => 'tatoo',
				__( 'Guitar', 'js_composer' ) => 'guitar',
				__( 'Arhitecture', 'js_composer' ) => 'arhitecture',
				__( 'Career', 'js_composer' ) => 'career',
				__( 'Spa', 'js_composer' ) => 'spa',
				__( 'Consultant', 'js_composer' ) => 'consultantpro',
				__( 'Flat', 'js_composer' ) => 'flat',
				__( 'Tutor', 'js_composer' ) => 'tutor',
				__( 'Stuff', 'js_composer' ) => 'stuff',
				__( 'Mobiles', 'js_composer' ) => 'mobiles',
				__( 'Computers', 'js_composer' ) => 'computers',
				__( 'Appliances', 'js_composer' ) => 'appliances',
				__( 'Consultant', 'js_composer' ) => 'consultantpro',
				__( 'Cello', 'js_composer' ) => 'cello',
				__( 'Accordion', 'js_composer' ) => 'accordion',
				__( 'Piano', 'js_composer' ) => 'piano',
				__( 'Poll cleaning', 'js_composer' ) => 'pool_cleaning',
				__( 'Lawyer', 'js_composer' ) => 'lawyer',
			),
			'admin_label' => true,
			'param_name' => 'type',
			'description' => esc_html__( 'Select icon library.', 'js_composer' ),
			'dependency' =>  array('element' => 'custom_icon_check', 'value_not_equal_to' => 'true' ),
		),

		array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_barber',
	        'value'     => 'lx-icons_barber', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_barber(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'barber' ),

      	),
      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_sculptor',
	        'value'     => 'lx-icons_sculptor', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_sculptor(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'sculptor' ),

      	),
      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_tatoo',
	        'value'     => 'lx-icons_tatoo', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_tatoo(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'tatoo' ),

      	),

      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_guitar',
	        'value'     => 'lx-icons_guitar', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_guitar(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'guitar' ),

      	),

      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_arhitecture',
	        'value'     => 'lx-icons_arhitecture', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_arhitecture(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'arhitecture' ),

      	),

		array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_designer',
	        'value'     => 'lx-icons_designer', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_designer(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'designer' ),

      	),

		array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_career',
	        'value'     => 'lx-icons_career', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_career(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'career' ),

      	),

		array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_spa',
	        'value'     => 'lx-icons_spa', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_spa(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'spa' ),

      	),

      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_consult',
	        'value'     => 'lx-icons_consultant', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_consultant(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'consultantpro' ),

      	),

      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_flat',
	        'value'     => 'lx-icons_flat', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_flat(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'flat' ),

      	),


      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_tutor',
	        'value'     => 'lx-icons_tutor', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_tutor(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'tutor' ),

      	),


      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_stuff',
	        'value'     => 'lx-icons_stuff', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_stuff(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'stuff' ),

      	),

      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_mobiles',
	        'value'     => 'lx-icons_mobiles', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_mobiles(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'mobiles' ),

      	),

      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_computers',
	        'value'     => 'lx-icons_computers', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_computers(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'computers' ),

      	),


      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_appliance',
	        'value'     => 'lx-icons_appliance', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_appliance(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'appliances' ),

      	),


      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_consultant',
	        'value'     => 'lx-icons_consultant', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_consultant(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'consultantpro' ),

      	),

      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_cello',
	        'value'     => 'lx-icons_cello', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_cello(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'cello' ),

      	),


      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_piano',
	        'value'     => 'lx-icons_piano', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_piano(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'piano' ),

      	),


      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_accordion',
	        'value'     => 'lx-icons_accordion', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_accordion(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'accordion' ),

      	),


      	array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_poll_cleaning',
	        'value'     => 'lx-icons_poll_cleaning', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_pool_cleaning(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'pool_cleaning' ),

      	),


		array(
	        'type'      => 'iconpicker',
	        'heading'     => esc_html__( 'Iconset', 'js_composer' ),
	        'param_name'  => 'lx_iconset_lawyer',
	        'value'     => 'lx-icons_lawyer', // default value to backend editor admin_label
	        'settings'    => array(
	          'emptyIcon'    => false, // default true, display an "EMPTY" icon?
	          'type'       => 'lx-icons',
	          'source'     => consultant_iconset_lawyer(),
	          'iconsPerPage' => 100, // default 100, how many icons per/page to display
	        ),
	        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
	        'dependency' =>  array('element' => 'type', 'value' => 'lawyer' ),

      	),

      	array(
	        'type'        => 'checkbox',
	        'heading'     => esc_html__( 'Upload custom icon', 'js_composer' ),
	        'param_name'  => 'custom_icon_check',
	        'value'       => ''
	    ),
		array(
			'type'			=> 'attach_image',
			'param_name'	=> 'image',
			'heading'		=> esc_html__('Image', 'consultantpro'),
			'dependency' =>  array('element' => 'custom_icon_check', 'value' => 'true' ),
		),
		array(
			'param_name'	=> 'conditions',
			'type'			=> 'textarea',
			'heading'		=> esc_html__( 'List of conditions (optional)', 'consultantpro' ),
			'description'	=> esc_html__( 'You can use tag &lt;b&gt;&lt;/b&gt; for bold text', 'consultantpro' ),
		),
		array(
			'param_name'	=> 'price',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Price', 'consultantpro' ),
			'description'	=> esc_html__( 'You can use tag &lt;b&gt;&lt;/b&gt; for bold text', 'consultantpro' ),
		),
		array(
			'param_name'	=> 'period',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Period', 'consultantpro' ),
		),
		array(
			'param_name'	=> 'button',
			'type'			=> 'vc_link',
			'heading'		=> esc_html__( 'Button', 'consultantpro' ),
		),
		array(
			'type'			=> 'checkbox',
			'param_name'	=> 'active',
			'heading'		=> esc_html__( 'Active item', 'consultantpro' ),
		),
		array(
			'param_name'	=> 'el_class',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Extra class name', 'consultantpro' ),
			'description'	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'consultantpro' ),
			'admin_label'	=> true,
		),
	)

) );



class WPBakeryShortCode_consultant_plan extends WPBakeryShortCode{
	protected function content( $atts, $content = null ) {

		global $consultant_shortcode_items;
		$consultant_shortcode_items[] = array( 'atts' => $atts, 'content' => $content, 'css_class' => '');
		return;
	}
}