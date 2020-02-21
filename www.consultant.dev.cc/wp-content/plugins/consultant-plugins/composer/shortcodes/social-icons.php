<?php
/*
 * Social icons Shortcode
 * Version: 1.0.0
 */

function cr_get_row_offset_si( $pref, $suf, $max = 120, $step = 5 ){
    $ar = array();
    for ($i=0; $i < $max + $step; $i += $step ) { 
        $ar[$i . 'px'] = $pref . '-' . $suf . $i;
    }
    return array_merge(array( 'Default'  => 'none' ), $ar );
}

vc_map(
	array(
		'name'        => esc_html__( 'Social icons', 'js_composer' ),
		'base'        => 'consultant_soc_icons',
		'params'      => array(

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Style', 'js_composer' ),
			'param_name' => 'style',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Classic', 'js_composer' ) => 'classic',
			),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Link', 'js_composer' ),
			'param_name' => 'link_switch',
			'value' => array(
				esc_html__( 'link show', 'js_composer' ) => 'link_show',
				esc_html__( 'icons show', 'js_composer' ) => 'icons_show',
				esc_html__( 'show link and icons', 'js_composer' ) => 'all_show',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Alignment', 'js_composer' ),
			'param_name' => 'alignment',
			'description' => 'only when show icons and link',
			'value' => array(
				esc_html__( 'link left icons right', 'js_composer' ) => 'left',
				esc_html__( 'link right icons left', 'js_composer' ) => 'right',
				esc_html__( 'link and icons center', 'js_composer' ) => 'center',
			),
			'dependency' =>  array('element' => 'link_switch', 'value' => 'all_show' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => esc_html__( 'Link', 'js_composer' ),
			'param_name' => 'lx_link',
			'dependency' =>  array('element' => 'link_switch', 'value' => array('link_show', 'all_show') ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Alignment icons', 'js_composer' ),
			'param_name' => 'align_icons',
			'value' => array(
				esc_html__( 'Left', 'js_composer' ) => '',
				esc_html__( 'Center', 'js_composer' ) => 'center',
				esc_html__( 'Right', 'js_composer' ) => 'right',
			),
			'dependency' =>  array('element' => 'link_switch', 'value' => 'icons_show' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Alignment link', 'js_composer' ),
			'param_name' => 'align_link',
			'value' => array(
				esc_html__( 'Left', 'js_composer' ) => '',
				esc_html__( 'Center', 'js_composer' ) => 'center',
				esc_html__( 'Right', 'js_composer' ) => 'right',
			),
			'dependency' =>  array('element' => 'link_switch', 'value' => 'link_show' ),
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
			'type' => 'param_group',
			'heading' => esc_html__( 'Social icons', 'js_composer' ),
			'param_name' => 'params_icon',
			'value' => '',
			'dependency' =>  array('element' => 'link_switch', 'value' => array('icons_show', 'all_show') ),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon library', 'js_composer' ),
					'value' => array(
						__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
						__( 'Open Iconic', 'js_composer' ) => 'openiconic',
						__( 'Typicons', 'js_composer' ) => 'typicons',
						__( 'Entypo', 'js_composer' ) => 'entypo',
						__( 'Linecons', 'js_composer' ) => 'linecons',
					),
					'admin_label' => true,
					'param_name' => 'type',
					'description' => esc_html__( 'Select icon library.', 'js_composer' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'js_composer' ),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-facebook-official fa-2x', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false,
						// default true, display an "EMPTY" icon?
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'fontawesome',
					),
					'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'js_composer' ),
					'param_name' => 'icon_openiconic',
					'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'openiconic',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'openiconic',
					),
					'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'js_composer' ),
					'param_name' => 'icon_typicons',
					'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'js_composer' ),
					'param_name' => 'icon_entypo',
					'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'entypo',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'entypo',
					),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'js_composer' ),
					'param_name' => 'icon_linecons',
					'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'linecons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'linecons',
					),
					'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type'        => 'href',
					'heading'     => 'Url',
					'param_name'  => 'url',
					'admin_label' => true,
					'value'       => '',
				),
			),
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Space left', 'js_composer' ),
			'param_name' => 'left_space',
		),
		/* Design options */
		array(
			'type' 		  => 'css_editor',
			'heading' 	  => esc_html__( 'CSS box', 'js_composer' ),
			'param_name'  => 'css',
			'group' 	  => esc_html__( 'Design options', 'js_composer' )
		),

		array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Desctop margin top', 'js_composer' ),
	        'param_name'  => 'desctop_mt',
	        'value'       => cr_get_row_offset_si('marg-md', 't', 150),
	        'group'       => 'Responsive Margins'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Desctop margin bottom', 'js_composer' ),
	        'param_name'  => 'desctop_mb',
	        'value'       => cr_get_row_offset_si('marg-md', 'b', 150),
	        'group'       => 'Responsive Margins',
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Tablets margin top', 'js_composer' ),
	        'param_name'  => 'tablets_mt',
	        'value'       => cr_get_row_offset_si('marg-sm', 't'),
	        'group'       => 'Responsive Margins'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Tablets margin bottom', 'js_composer' ),
	        'param_name'  => 'tablets_mb',
	        'value'       => cr_get_row_offset_si('marg-sm', 'b'),
	        'group'       => 'Responsive Margins'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Mobile margin top', 'js_composer' ),
	        'param_name'  => 'mobile_mt',
	        'value'       => cr_get_row_offset_si('marg-xs', 't'),
	        'group'       => 'Responsive Margins'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Mobile margin bottom', 'js_composer' ),
	        'param_name'  => 'mobile_mb',
	        'value'       => cr_get_row_offset_si('marg-xs', 'b'),
	        'group'       => 'Responsive Margins'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Desctop padding top', 'js_composer' ),
	        'param_name'  => 'desctop_pt',
	        'value'       => cr_get_row_offset_si('padd-md', 't', 150),
	        'group'       => 'Responsive Paddings'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Desctop padding bottom', 'js_composer' ),
	        'param_name'  => 'desctop_pb',
	        'value'       => cr_get_row_offset_si('padd-md', 'b', 150),
	        'group'       => 'Responsive Paddings',
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Tablets padding top', 'js_composer' ),
	        'param_name'  => 'tablets_pt',
	        'value'       => cr_get_row_offset_si('padd-sm', 't'),
	        'group'       => 'Responsive Paddings'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Tablets padding bottom', 'js_composer' ),
	        'param_name'  => 'tablets_pb',
	        'value'       => cr_get_row_offset_si('padd-sm', 'b'),
	        'group'       => 'Responsive Paddings'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Mobile padding top', 'js_composer' ),
	        'param_name'  => 'mobile_pt',
	        'value'       => cr_get_row_offset_si('padd-xs', 't'),
	        'group'       => 'Responsive Paddings'
	    ),
	    array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Mobile padding bottom', 'js_composer' ),
	        'param_name'  => 'mobile_pb',
	        'value'       => cr_get_row_offset_si('padd-xs', 'b'),
	        'group'       => 'Responsive Paddings'
	    ),
	)
	)
);

class WPBakeryShortCode_consultant_soc_icons extends WPBakeryShortCode{
	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title' 	 => '',
			'price' 	 => '',
			'style' 	 => '',
			'desc' 	 => '',
			'lx_link' 	 => '',
			'params_icon' 	 => '',
			'animation_scroll' 	=> 'fade-up',
			'duration_animation' 	=> '1000',
			'alignment' 	 => 'left',
			'left_space' 	 => '',
			'align' 	 => '',
			'align_icons' 	 => '',
			'align_link' 	 => '',
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
			'css' 		 => ''
		), $atts ) );


		$responsive_classes=$desctop_mt.' '.$desctop_mb.' '.$tablets_mt.''.$tablets_mb.' '.$mobile_mt.' '.$mobile_mb.' '.$desctop_pt.' '.$desctop_pb.' '.$tablets_pt.' '.$tablets_pb.' '.$mobile_pt.' '.$mobile_pb;

		
		$link = vc_build_link( $lx_link );
		$output = '';

		$class  = ( ! empty( $el_class ) ) ? $el_class : '';
		$class .= vc_shortcode_custom_css_class( $css, ' ' );

		if($left_space=="true") {
			$left_space='left-space';
		} else {
			$left_space='';
		}

		if(!empty($align_icons)) {
			$align_icons='text-'.$align_icons;
		}

		if(!empty($align_link)) {
			$align_link='text-'.$align_link;
		}


		if(!empty($link['title']) && !empty($params_icon)) {
			
			if($alignment=="right") {
				$alignments='link-right';
			} elseif($alignment=="center") {
				$alignments='center';
			} elseif($alignment=="left") {
				$alignments='link-left';
			}
		}
		else {
			$alignments='';
		}

		

		$output='<div class="lx-soc-wrapper '.esc_attr( $left_space.' '.$responsive_classes.' '.$class ).'" data-aos="'.$animation_scroll.'" data-aos-duration="'.$duration_animation.'">';
		if(!empty($link)) {
			$output .= '<div class="lx-social-link '.esc_attr( $align_link.' '.$style ) .' '.esc_attr( $alignments ) . '">';
				$output .='<a href="'.esc_attr( $link['url'] ).'" class="link" target="'.$link['target'].'">'.esc_html( $link['title'] ).'</a>';
			$output .= '</div>';
		}
		$output .= '<div class="lx-social-icons '.esc_attr( $align_icons.' '.$style ).' '.esc_attr( $alignments )  . '">';
			$params_icon = (array) vc_param_group_parse_atts( $params_icon );

			foreach ($params_icon as $icon) {
				// Enqueue needed icon font.
				vc_icon_element_fonts_enqueue( $icon['type'] );
				if(!empty($icon["url"])) {
					$url=$icon["url"];
				} else {
					$url='';
				}
				$iconClass = $icon['icon_'.$icon['type']] ? esc_attr( $icon['icon_'.$icon['type']] ) : 'fa fa-facebook-official fa-2x'; 
				
				$output .='<a target="_blank" href="'.esc_url($url).'" >';
					$output .='<i class="fa vc_icon_element-icon '.esc_attr($iconClass).'"></i>';
				$output .='</a>';

			}
			
		$output .= '</div>';
		$output .= '</div>';

		return $output;
		
	}
}