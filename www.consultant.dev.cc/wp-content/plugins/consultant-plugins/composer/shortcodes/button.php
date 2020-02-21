<?php
/*
** consultant Button Shortcode
** Version: 1.0.0 
*/

vc_map(array(
    'name' => esc_html__('Button', 'js_composer'),
    'base' => 'consultant_lx_button',
    'content_element' => true,
    'show_settings_on_create' => true,
    'category' => esc_html__('From consultant', 'js_composer'),
    'description' => esc_html__('Link', 'js_composer'),
    'params' => array(

        array(
            'type' => 'vc_link',
            'heading' => 'Link',
            'param_name' => 'lx_link',
            'admin_label' => true,
            'value' => '',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Background color button', 'js_composer'),
            'param_name' => 'lx_bg_color',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color text button', 'js_composer'),
            'param_name' => 'lx_text_color',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Align button', 'js_composer'),
            'param_name' => 'align_button',
            'value' => array(
                esc_html__('Left', 'js_composer') => 'left',
                esc_html__('Center', 'js_composer') => 'center',
                esc_html__('Right', 'js_composer') => 'right',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Size button', 'js_composer'),
            'param_name' => 'size_button',
            'value' => array(
                esc_html__('Large', 'js_composer') => '',
                esc_html__('Small', 'js_composer') => 'small',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Animation on scroll', 'js_composer'),
            'param_name' => 'animation_scroll',
            'group' => 'Animation',
            'value' => array(
                esc_html__('Fade up', 'js_composer') => 'fade-up',
                esc_html__('Flip left', 'js_composer') => 'flip-left',
                esc_html__('Fade zoom in', 'js_composer') => 'fade-zoom-in',
                esc_html__('Fade left', 'js_composer') => 'fade-left',
                esc_html__('Fade right', 'js_composer') => 'fade-right',
                esc_html__('Fade down', 'js_composer') => 'fade-down',
                esc_html__('Fade down left', 'js_composer') => 'fade-down-left',
                esc_html__('Zoom out left', 'js_composer') => 'zoom-out-left',
                esc_html__('Zoom out right', 'js_composer') => 'zoom-out-right',
                esc_html__('Zoom out right', 'js_composer') => 'zoom-out-down',
                esc_html__('Zoom out up', 'js_composer') => 'zoom-out-up',
                esc_html__('Zoom in left', 'js_composer') => 'zoom-in-left',
                esc_html__('Zoom in down', 'js_composer') => 'zoom-in-down',
                esc_html__('Zoom in', 'js_composer') => 'zoom-in',
                esc_html__('No animation', 'js_composer') => 'disable',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Duration animation', 'js_composer'),
            'param_name' => 'duration_animation',
            'group' => 'Animation',
            'value' => array(
                esc_html__('1000', 'js_composer') => '1000',
                esc_html__('2000', 'js_composer') => '2000',
                esc_html__('3000', 'js_composer') => '3000',
            ),
            'dependency' => array('element' => 'animation_scroll', 'value_not_equal_to' => 'disable'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'js_composer'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer'),
            'value' => '',
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box', 'js_composer'),
            'param_name' => 'css',
            'group' => esc_html__('Design options', 'js_composer'),
        ),
    ) //end params
));

class WPBakeryShortCode_consultant_lx_button extends WPBakeryShortCode{
    protected function content($atts, $content = null){

        extract(shortcode_atts(array(
            'style_button' => '',
            'style_btn' => 'btn-bg',
            'lx_link' => '',
            'lx_bg_color' => '',
            'lx_text_color' => '',
            'size_button' => '',
            'animation_scroll' => 'fade-up',
            'duration_animation' => '1000',
            'align_button' => 'left',
            'el_class' => '',
            'css' => ''
        ), $atts));

        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, $this->settings['base'], $atts);

        if (!empty($lx_link)) {
            $lx_link = vc_build_link($lx_link);
        }

        if (!empty($lx_bg_color)) {
            $lx_bg_color = 'background-color:' . $lx_bg_color . '; border-color:' . $lx_bg_color . ';';
        } else {
            $lx_bg_color = '';
        }

        if (!empty($lx_text_color)) {
            $lx_text_color = 'color:' . $lx_text_color . ';';
        } else {
            $lx_text_color = '';
        }

        if (!empty($align_button)) {
            $align_button = 'text-' . $align_button;
        } else {
            $align_button = '';
        }

        // custum css
        $css_class .= vc_shortcode_custom_css_class($css, ' ');

        $output = '';

        $output .= '<div class="lx-btn-wrap ' . esc_attr($align_button . ' ' . $css_class) . '" data-aos="' . esc_attr($animation_scroll) . '" data-aos-duration="' . esc_attr($duration_animation) . '">';
        if (!empty($lx_link['title']) && !empty($lx_link['url'])) {
            $output .= '<a href="' . esc_url($lx_link['url']) . '" class="lx-button consultant ' . esc_attr($style_btn.' ' . $size_button) . '" style="' . esc_attr($lx_bg_color . ' ' . $lx_text_color) . '" target="' . esc_attr($lx_link['target']) . '">' . esc_html($lx_link['title']) . '</a>';
        }
        $output .= '</div>';

        // return output
        return $output;

    }
}
