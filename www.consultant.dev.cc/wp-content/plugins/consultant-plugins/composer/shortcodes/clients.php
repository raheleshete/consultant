<?php
/**
 * Clients shortcode
 * version 1.0.0
 */

vc_map(array(
    'name' => esc_html__('Clients', 'foxhost'),
    'base' => 'consultant_clients',
    'description' => 'Clients section',
    'category' => 'Custom Content',
    'as_parent' => array('only' => 'consultant_client'),
    'content_element' => true,
    'category' => esc_html__('From consultant', 'js_composer'),
    'show_settings_on_create' => true,
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Slider', 'js_composer'),
            'param_name' => 'slider',
            'value' => array(
                esc_html__('yes', 'js_composer') => '',
                esc_html__('no', 'js_composer') => 'no',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Opacity image', 'js_composer'),
            'param_name' => 'opacity_img',
            'value' => array(
                esc_html__('No opacity', 'js_composer') => '',
                esc_html__('Opacity 0.9', 'js_composer') => 'op0-9',
                esc_html__('Opacity 0.8', 'js_composer') => 'op0-8',
                esc_html__('Opacity 0.7', 'js_composer') => 'op0-7',
                esc_html__('Opacity 0.6', 'js_composer') => 'op0-6',
                esc_html__('Opacity 0.5', 'js_composer') => 'op0-5',
                esc_html__('Opacity 0.4', 'js_composer') => 'op0-4',
                esc_html__('Opacity 0.3', 'js_composer') => 'op0-3',
                esc_html__('Opacity 0.2', 'js_composer') => 'op0-2',
                esc_html__('Opacity 0.1', 'js_composer') => 'op0-1',
            ),
            'dependency' => array('element' => 'slider', 'value_not_equal_to' => 'no'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Arrow slider', 'js_composer'),
            'param_name' => 'arrows',
            'value' => array(
                esc_html__('hide', 'js_composer') => '',
                esc_html__('show', 'js_composer') => 'show',
            ),
            'dependency' => array('element' => 'slider', 'value_not_equal_to' => 'no'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Space arrow', 'js_composer'),
            'param_name' => 'space_arrow',
            'value' => array(
                esc_html__('no', 'js_composer') => 'no',
                esc_html__('yes', 'js_composer') => 'space-arrow',
            ),
            'dependency' => array('element' => 'arrows', 'value' => 'show'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Divider slides', 'js_composer'),
            'param_name' => 'divider',
            'value' => array(
                esc_html__('hide', 'js_composer') => '',
                esc_html__('show', 'js_composer') => 'divider',
            ),
            'dependency' => array('element' => 'slider', 'value_not_equal_to' => 'no'),
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
            'heading' => 'Count slides',
            'param_name' => 'limit',
            'admin_label' => true,
            'value' => '',
            'dependency' => array('element' => 'slider', 'value_not_equal_to' => 'no'),
        ),
        array(
            'param_name' => 'el_class',
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'foxhost'),
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'foxhost'),
        ),
    ),
    'js_view' => 'VcColumnView'
));


vc_map(array(
    'name' => esc_html__('Client', 'foxhost'),
    'base' => 'consultant_client',
    'content_element' => true,
    'as_child' => array('only' => 'consultant_clients'),
    'params' => array(
        array(
            'param_name' => 'image',
            'type' => 'attach_image',
            'heading' => esc_html__('Image', 'foxhost'),
        ),
        array(
            'param_name' => 'el_class',
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'foxhost'),
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'foxhost')
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_consultant_clients extends WPBakeryShortCodesContainer{
    }
}
if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_consultant_client extends WPBakeryShortCode{
    }
}


function consultant_clients($atts, $content = '', $id = ''){

    extract(shortcode_atts(array(
        'slider' => '',
        'space_arrow' => '',
        'opacity_img' => '',
        'limit' => '',
        'arrows' => '',
        'divider' => '',
        'animation_scroll' => 'fade-up',
        'duration_animation' => '1000',
        'el_class' => '',
    ), $atts));

    if (empty($limit)) {
        $limit = 3;
    }
        $arrows_show = !empty($arrows) && $arrows == 'show' ? 'show-arrow' : '';


    if (!empty($slider) && $slider == "no") {
        $clients_wrapper = '<div class="lx-clients-container no-slider">';
    } else {
        $clients_wrapper = '<div class="lx-clients-container swiper-container ' . esc_attr($divider . ' ' . $arrows_show . ' ' . $opacity_img . ' ' . $space_arrow) . '" data-autoplay="0" data-loop="0" data-speed="500" data-add-slides="6" data-slides-per-view="responsive" data-xs-slides="2" data-sm-slides="2" data-md-slides="3" data-lg-slides="' . esc_attr($limit) . '">';
    }

    $class = (!empty($el_class)) ? ' ' . esc_attr($el_class) : '';

    $output = '';
    $output .= '<div class="block' . esc_attr($class) . '" data-aos="' . esc_attr($animation_scroll) . '" data-aos-duration="' . esc_attr($duration_animation) . '"> ';
        $output .= '<div class="container">';
            $output .= $clients_wrapper;
                $output .= $slider != "no" ? '<div class="swiper-wrapper">' : '';
                     $output .= do_shortcode($content);
                $output .= $slider != "no" ? '</div>' : '';
                $output .= $slider != "no" ? '<div class="pagination hidden"></div>' : '';
            if ($arrows == 'show') {
                $output .= '<div class="arrow-wrap swiper-arrow-left"><span class="arrow icon-arrow-left"></span></div>';
                $output .= ' <div class="arrow-wrap swiper-arrow-right"><span class="arrow icon-arrow_right"></span></div>';
            }
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</div>';

    return $output;
}

add_shortcode('consultant_clients', 'consultant_clients');


function consultant_client($atts, $content = '', $id = ''){

    extract(shortcode_atts(array(
        'description' => '',
        'image' => '',
        'el_class' => '',
    ), $atts));

    $output = '';
    $el_class = (!empty($el_class)) ? ' ' . esc_attr($el_class) : '';
    $src = (!empty($image) && is_numeric($image)) ? wp_get_attachment_url($image) : false;

    if ($src) {
        $output .= '<div class="swiper-slide s-back-switch '. esc_attr($el_class) .'">';
            $output .= '<img class="s-img-switch" src="' . esc_url($src) . '"  alt=""/>';
        $output .= '</div>';
    }

    return $output;
}

add_shortcode('consultant_client', 'consultant_client');