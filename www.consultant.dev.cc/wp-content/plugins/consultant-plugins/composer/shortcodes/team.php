<?php
/*
** consultant Team Shortcode
** Version: 1.0.0 
*/


vc_map(array(
    'name' => esc_html__('Team', 'js_composer'),
    'base' => 'consultant_teams',
    'as_parent' => array('only' => 'consultant_teams_item'),
    'content_element' => true,
    'show_settings_on_create' => true,
    'category' => esc_html__('From consultant', 'js_composer'),
    'description' => esc_html__('Team shortcode', 'js_composer'),
    'js_view' => 'VcColumnView',
    'params' => array(

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Column', 'js_composer'),
            'param_name' => 'width',
            'value' => array(
                esc_html__('1 column ', 'js_composer') => '1',
                esc_html__('2 columns - 1/6', 'js_composer') => '1/6',
                esc_html__('3 columns - 1/4', 'js_composer') => '1/4',
                esc_html__('4 columns - 1/3', 'js_composer') => '1/3',
            ),
            'description' => esc_html__('Select column width.', 'js_composer'),
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
            'type' => 'checkbox',
            'heading' => esc_html__('Show info on hover', 'js_composer'),
            'param_name' => 'show_info_hover',
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Custom background color info on hover', 'js_composer'),
            'param_name' => 'bg_color_switch',
            'dependency' => array('element' => 'show_info_hover', 'value' => 'true'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Background hover color info', 'js_composer'),
            'param_name' => 'bg_hover_color',
            'dependency' => array('element' => 'bg_color_switch', 'value' => 'true'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'js_composer'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer'),
            'value' => '',
        ),
    ) //end params
));

class WPBakeryShortCode_consultant_teams extends WPBakeryShortCodesContainer{

    protected function content($atts, $content = null){

        extract(shortcode_atts(array(
            'width' => '1',
            'style' => '1',
            'el_class' => '',
            'show_info_hover' => '',
            'bg_hover_color' => '',
            'alignment_info' => '',
            'height_image' => '',
            'animation_scroll' => 'fade-up',
            'duration_animation' => '1000',
            'text_color' => '',
            'round_image' => '',
            'css' => ''
        ), $atts));

        global $consultant_shortcode_items;
        $consultant_shortcode_items = array();

        $width_class = 'content fullpage transition';
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width_class, $this->settings['base'], $atts);

        // custum css
        $css_class .= vc_shortcode_custom_css_class($css, ' ');

        // custum class
        $css_class .= (!empty($el_class)) ? ' ' . $el_class : '';

        // output
        $width_class = array(
            '1' => ' col-xs-12',
            '1/6' => ' col-sm-6 col-xs-12',
            '1/4' => ' col-lg-4 col-sm-6 col-xs-12',
            '1/3' => ' col-md-3 col-sm-6 col-xs-12'
        );
        do_shortcode($content);

        ob_start();
        $align_info = ''; ?>

        <div class="lx-team <?php echo esc_attr($text_color); ?>" data-aos="<?php echo esc_attr($animation_scroll); ?>"
             data-aos-duration="<?php echo esc_attr($duration_animation); ?>">
            <div class="row">

                <?php foreach ($consultant_shortcode_items as $key => $shortcode) {
                    $shortcode_atts = (object)$shortcode['atts'];
                    $src = (!empty($shortcode_atts->image) && is_numeric($shortcode_atts->image)) ? wp_get_attachment_url($shortcode_atts->image) : ''; ?>
                    <div class="<?php echo esc_attr($width_class[$width]); ?>">
                        <div
                            class="lx-team-img s-back-switch <?php echo esc_attr($css_class . ' ' . $alignment_info . ' ' . $height_image . ' ' . $round_image . ' ' . $style); ?>">
                            <?php if (!empty($src)) { ?>
                                <img class="s-img-switch" src="<?php echo esc_url($src); ?>" alt="">
                            <?php }
                            if (!empty($shortcode_atts->align_info)) {
                                $align_info = 'text-' . $shortcode_atts->align_info;
                            }
                            if (!empty($show_info_hover) && $show_info_hover == 'true') {
                                if(!empty($bg_hover_color)){ ?>
                                    <div class=" info-wrap <?php echo esc_attr($align_info); ?>"
                                    style="background-color:<?php echo esc_attr($bg_hover_color); ?>">
                               <?php }else{ ?>
                                    <div class=" info-wrap <?php echo esc_attr($align_info); ?>">
                               <?php }
                               if (!empty($shortcode_atts->title)) { ?>
                                        <h5 class="title"><?php echo esc_html($shortcode_atts->title) ?></h5>
                                    <?php }
                                    if (!empty($shortcode_atts->subtitle)) { ?>
                                        <h6 class="subtitle"><?php echo esc_html($shortcode_atts->subtitle) ?></h6>
                                    <?php }
                                    if (!empty($shortcode_atts->desc)) { ?>
                                        <div class="desc"><?php echo wp_kses_post($shortcode_atts->desc) ?></div>
                                    <?php } ?>

                                    <div class="lx-social-icons">
                                        <?php
                                            if(!empty($shortcode_atts->params_icon)) {
                                                $params_icon = (array)vc_param_group_parse_atts($shortcode_atts->params_icon);
                                            } else {
                                                $params_icon = '';
                                            }
                                            if(!empty($params_icon) && is_array($params_icon)) {
                                                foreach ($params_icon as $icon) {
                                                    // Enqueue needed icon font.
                                                    vc_icon_element_fonts_enqueue($icon['type']);
                                                    $iconClass = $icon['icon_' . $icon['type']] ? esc_attr($icon['icon_' . $icon['type']]) : 'fa fa-facebook-official fa-2x'; ?>

                                                    <a target="_blank" href="<?php echo esc_url($icon['url']); ?>">
                                                        <i class="fa vc_icon_element-icon <?php echo esc_attr($iconClass); ?>"></i>
                                                    </a>

                                                <?php } 
                                            }
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if (empty($show_info_hover)) { ?>
                            <div class="lx-team-info info-wrap <?php echo esc_attr($align_info . ' ' . $alignment_info); ?>">
                                <?php if (!empty($shortcode_atts->title)) { ?>
                                    <h5 class="title"><?php echo esc_html($shortcode_atts->title) ?></h5>
                                <?php }
                                if (!empty($shortcode_atts->subtitle)) { ?>
                                    <h6 class="subtitle"><?php echo esc_html($shortcode_atts->subtitle) ?></h6>
                                <?php }
                                if (!empty($shortcode_atts->desc)) { ?>
                                    <div class="desc"><?php echo wp_kses_post($shortcode_atts->desc) ?></div>
                                <?php } ?>

                                <div class="lx-social-icons">
                                    <?php
                                    if(!empty($shortcode_atts->params_icon)) {
                                        $params_icon = (array)vc_param_group_parse_atts($shortcode_atts->params_icon);
                                    } else {
                                        $params_icon = '';
                                    }
                                    
                                    if(!empty($params_icon) && is_array($params_icon)) {
                                        foreach ($params_icon as $icon) {
                                            // Enqueue needed icon font.
                                            vc_icon_element_fonts_enqueue($icon['type']);
                                            $iconClass = $icon['icon_' . $icon['type']] ? esc_attr($icon['icon_' . $icon['type']]) : 'fa fa-facebook-official fa-2x'; ?>

                                            <a target="_blank" href="<?php echo esc_url($icon['url']); ?>">
                                                <i class="fa vc_icon_element-icon <?php echo esc_attr($iconClass); ?>"></i>
                                            </a>

                                        <?php } 
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}


/* Shortvode Item */

vc_map(array(
    'name' => 'Team item',
    'base' => 'consultant_teams_item',
    'as_child' => array('only' => 'consultant_teams'),
    'content_element' => true,
    'show_settings_on_create' => true,
    'description' => 'Image, title and text',
    'params' => array(

        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Image', 'js_composer'),
            'param_name' => 'image',
        ),
        array(
            'type' => 'textfield',
            'heading' => 'Name',
            'param_name' => 'title',
            'admin_label' => true,
            'value' => '',
        ),
        array(
            'type' => 'textfield',
            'heading' => 'Profession',
            'param_name' => 'subtitle',
            'admin_label' => true,
            'value' => '',
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Description', 'js_composer'),
            'param_name' => 'desc',
            'value' => '',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Align info', 'js_composer'),
            'param_name' => 'align_info',
            'value' => array(
                esc_html__('Left', 'js_composer') => 'left',
                esc_html__('Center', 'js_composer') => 'center',
                esc_html__('Right', 'js_composer') => 'right',
            ),
        ),

        array(
            'type' => 'param_group',
            'heading' => esc_html__('Social icons', 'js_composer'),
            'param_name' => 'params_icon',
            'value' => '',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Icon library', 'js_composer'),
                    'value' => array(
                        __('Font Awesome', 'js_composer') => 'fontawesome',
                        __('Open Iconic', 'js_composer') => 'openiconic',
                        __('Typicons', 'js_composer') => 'typicons',
                        __('Entypo', 'js_composer') => 'entypo',
                        __('Linecons', 'js_composer') => 'linecons',
                    ),
                    'admin_label' => true,
                    'param_name' => 'type',
                    'description' => esc_html__('Select icon library.', 'js_composer'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'js_composer'),
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
                    'description' => esc_html__('Select icon from library.', 'js_composer'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'js_composer'),
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
                    'description' => esc_html__('Select icon from library.', 'js_composer'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'js_composer'),
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
                    'description' => esc_html__('Select icon from library.', 'js_composer'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'js_composer'),
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
                    'heading' => esc_html__('Icon', 'js_composer'),
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
                    'description' => esc_html__('Select icon from library.', 'js_composer'),
                ),
                array(
                    'type' => 'href',
                    'heading' => 'Url',
                    'param_name' => 'url',
                    'admin_label' => true,
                    'value' => '',
                ),
            ),
        ),


        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'js_composer'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer'),
            'value' => '',
        ),
    ) //end params
));


class WPBakeryShortCode_consultant_teams_item extends WPBakeryShortCode
{
    protected function content($atts, $content = null)
    {

        global $consultant_shortcode_items;
        $consultant_shortcode_items[] = array('atts' => $atts, 'content' => $content, 'css_class' => '');
        return;
    }
}





