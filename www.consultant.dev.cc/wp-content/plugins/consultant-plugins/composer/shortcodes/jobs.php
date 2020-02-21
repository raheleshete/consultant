<?php
/*
 * Jobs Shortcode
 * Version: 1.0.0
 */

vc_map(
    array(
        'name' => esc_html__('Jobs', 'js_composer'),
        'base' => 'consultant_jobs',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'js_composer'),
                'admin_label' => true,
                'value' => '',
                'param_name' => 'title'
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Price', 'js_composer'),
                'admin_label' => true,
                'value' => '',
                'param_name' => 'price'
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Description', 'js_composer'),
                'param_name' => 'desc',
                'value' => '',
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__('Button', 'js_composer'),
                'param_name' => 'link',
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
                'value' => ''
            ),
            /* Design options */
            array(
                'type' => 'css_editor',
                'heading' => esc_html__('CSS box', 'js_composer'),
                'param_name' => 'css',
                'group' => esc_html__('Design options', 'js_composer')
            )
        )
    )
);

class WPBakeryShortCode_consultant_jobs extends WPBakeryShortCode{
    protected function content($atts, $content = null){

        extract(shortcode_atts(array(
            'title' => '',
            'price' => '',
            'desc' => '',
            'link' => '',
            'animation_scroll' => 'fade-up',
            'duration_animation' => '1000',
            'css' => ''
        ), $atts));


        $link = !empty($link) ? vc_build_link($link) : '';

        $class = (!empty($el_class)) ? $el_class : '';
        $class .= vc_shortcode_custom_css_class($css, ' ');

        $output = '';

        $output .= '<div class="lx-jobs ' . esc_attr($class) . '" data-aos="' . esc_attr($animation_scroll) . '" data-aos-duration="' . esc_attr($duration_animation) . '">';
        $output .= '<div class="info-wrap">';
        if (!empty($title)) {
            $output .= '<h3 class="title">' . wp_kses_post($title) . '</h3>';
        }
        if (!empty($price)) {
            $output .= '<span class="price">' . wp_kses_post($price) . '</span>';
        }
        if (!empty($desc)) {
            $output .= '<div class="desc">' . wp_kses_post($desc) . '</div>';
        }
        $output .= '</div>';
        if (!empty($link['url']) && !empty($link['title'])) {
            $output .= '<div class="btn-group">';
            $output .= '<a href="' . esc_url($link['url']) . '" class="btn" target="' . esc_attr($link['target']) . '">' . esc_html($link['title']) . '</a>';
            $output .= '</div>';
        }
        $output .= '</div>';

        return $output;
    }
}