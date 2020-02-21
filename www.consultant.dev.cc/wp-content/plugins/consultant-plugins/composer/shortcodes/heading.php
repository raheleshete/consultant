<?php
/*
** consultant Heading Shortcode
** Version: 1.0.0 
*/
function cr_get_row_offset_h($pref, $suf, $max = 120, $step = 5)
{
    $ar = array();
    for ($i = 0; $i < $max + $step; $i += $step) {
        $ar[$i . 'px'] = $pref . '-' . $suf . $i;
    }
    return array_merge(array('Default' => 'none'), $ar);
}

vc_map(array(
    'name' => esc_html__('Headline', 'js_composer'),
    'base' => 'consultant_heading',
    'content_element' => true,
    'show_settings_on_create' => true,
    'category' => esc_html__('From consultant', 'js_composer'),
    'description' => esc_html__('Title and content', 'js_composer'),
    'params' => array(

        array(
            'type' => 'textarea',
            'heading' => 'Title',
            'param_name' => 'title',
            'admin_label' => true,
            'value' => '',
        ),
        array(
            'type' => 'textarea',
            'heading' => 'Subtitle',
            'param_name' => 'subtitle',
            'admin_label' => true,
            'value' => '',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Description', 'js_composer'),
            'param_name' => 'content',
            'value' => '',
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Custom font size description', 'js_composer'),
            'param_name' => 'custom_fz_desc_switch',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Font size description (in px)', 'js_composer'),
            'param_name' => 'fz_description',
            'dependency' => array('element' => 'custom_fz_desc_switch', 'value' => 'true'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Width', 'js_composer'),
            'param_name' => 'width',
            'value' => array(
                esc_html__('Full', 'js_composer') => '1',
                esc_html__('70%', 'js_composer') => '1/8',
                esc_html__('60%', 'js_composer') => '1/7',
                esc_html__('50%', 'js_composer') => '1/6',
                esc_html__('33.3%', 'js_composer') => '1/4',
                esc_html__('25%', 'js_composer') => '1/3',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style text', 'js_composer'),
            'param_name' => 'style_text',
            'value' => array(
                esc_html__('Dark', 'js_composer') => 'dark',
                esc_html__('Light', 'js_composer') => 'light',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Size title', 'js_composer'),
            'param_name' => 'style_title',
            'value' => array(
                esc_html__('Small', 'js_composer') => 'small',
                esc_html__('Medium', 'js_composer') => 'medium',
                esc_html__('Large', 'js_composer') => 'large',
                esc_html__('Extra Large', 'js_composer') => 'x-large',
                esc_html__('Custom', 'js_composer') => 'custom',
            ),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'theme_fonts_title',
            'heading' => esc_html__('Font-family (theme fonts)', 'js_composer'),
            'value' => array(
                esc_html__('No choosen', 'js_composer') => '',
                esc_html__('Prata', 'js_composer') => 'Prata',
                esc_html__('Lato', 'js_composer') => 'Lato',
                esc_html__('Ebrima', 'js_composer') => 'Ebrima',
                esc_html__('Poppins', 'js_composer') => 'Poppins',
                esc_html__('Open Sans', 'js_composer') => 'Open Sans',
                esc_html__('Playball', 'js_composer') => 'Playball',
                esc_html__('RobotoSlab', 'js_composer') => 'RobotoSlab',
                esc_html__('Montserrat', 'js_composer') => 'Montserrat',
                esc_html__('Ubuntu', 'js_composer') => 'Ubuntu',
                esc_html__('CrimsonText', 'js_composer') => 'CrimsonText',
            ),
            'dependency' => array('element' => 'style_title', 'value' => 'custom'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_title_lato',
            'heading' => esc_html__('Style fonts (theme fonts)', 'js_composer'),
            'value' => array(
                esc_html__('regular', 'js_composer') => '400',
                esc_html__('Light', 'js_composer') => '300',
                esc_html__('Bold', 'js_composer') => '700',
                esc_html__('Black', 'js_composer') => '900',
            ),
            'dependency' => array('element' => 'theme_fonts_title', 'value' => 'Lato'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_title_ebrima',
            'heading' => esc_html__('Style fonts', 'js_composer'),
            'value' => array(
                esc_html__('Regular', 'js_composer') => '400',
                esc_html__('Bold', 'js_composer') => '700',
            ),
            'dependency' => array('element' => 'theme_fonts_title', 'value' => 'Ebrima'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_title_poppins',
            'heading' => esc_html__('Font-family (theme fonts)', 'js_composer'),
            'value' => array(
                esc_html__('regular', 'js_composer') => '400',
                esc_html__('Medium', 'js_composer') => '500',
                esc_html__('SemiBold', 'js_composer') => '600',
                esc_html__('Bold', 'js_composer') => '700',
            ),
            'dependency' => array('element' => 'theme_fonts_title', 'value' => 'Poppins'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_title_opsans',
            'heading' => esc_html__('Style fonts', 'js_composer'),
            'value' => array(
                esc_html__('Regular', 'js_composer') => '400',
                esc_html__('Light', 'js_composer') => '300',
            ),
            'dependency' => array('element' => 'theme_fonts_title', 'value' => 'Open Sans'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_title_roboslab',
            'heading' => esc_html__('Style fonts', 'js_composer'),
            'value' => array(
                esc_html__('Regular', 'js_composer') => '400',
                esc_html__('Thin', 'js_composer') => '100',
                esc_html__('Light', 'js_composer') => '300',
                esc_html__('Bold', 'js_composer') => '700',
            ),
            'dependency' => array('element' => 'theme_fonts_title', 'value' => 'RobotoSlab'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_title_montserrat',
            'heading' => esc_html__('Style fonts', 'js_composer'),
            'value' => array(
                esc_html__('Regular', 'js_composer') => '400',
                esc_html__('Thin', 'js_composer') => '100',
                esc_html__('Ultra-light', 'js_composer') => '200',
                esc_html__('Light', 'js_composer') => '300',
                esc_html__('Medium', 'js_composer') => '500',
                esc_html__('Semi-Bold', 'js_composer') => '600',
                esc_html__('Bold', 'js_composer') => '700',
                esc_html__('Extra-Bold', 'js_composer') => '800',
                esc_html__('Black', 'js_composer') => '900',
            ),
            'dependency' => array('element' => 'theme_fonts_title', 'value' => 'Montserrat'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_title_ubuntu',
            'heading' => esc_html__('Style fonts', 'js_composer'),
            'value' => array(
                esc_html__('Regular', 'js_composer') => '400',
                esc_html__('Medium', 'js_composer') => '500',
                esc_html__('Bold', 'js_composer') => '700',
            ),
            'dependency' => array('element' => 'theme_fonts_title', 'value' => 'Ubuntu'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_title_crtext',
            'heading' => esc_html__('Style fonts', 'js_composer'),
            'value' => array(
                esc_html__('Regular', 'js_composer') => '400',
                esc_html__('Bold', 'js_composer') => '700',
            ),
            'dependency' => array('element' => 'theme_fonts_title', 'value' => 'CrimsonText'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Font size title (in px)', 'js_composer'),
            'param_name' => 'font_size_title',
            'value' => '',
            'dependency' => array('element' => 'style_title', 'value' => 'custom'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Letter spacing title (in px)', 'js_composer'),
            'param_name' => 'lets_title',
            'value' => '',
            'dependency' => array('element' => 'style_title', 'value' => 'custom'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Line height title (in px)', 'js_composer'),
            'param_name' => 'lih_title',
            'value' => '',
            'dependency' => array('element' => 'style_title', 'value' => 'custom'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color title', 'js_composer'),
            'param_name' => 'title_color',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Font size subtitle', 'js_composer'),
            'param_name' => 'style_subtitle',
            'value' => array(
                esc_html__('Small', 'js_composer') => 'small',
                esc_html__('Medium', 'js_composer') => 'medium',
                esc_html__('Large', 'js_composer') => 'large',
                esc_html__('Extra Large', 'js_composer') => 'x-large',
                esc_html__('Custom', 'js_composer') => 'custom',
            ),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'theme_fonts_subtitle',
            'heading' => esc_html__('Font-family (theme fonts)', 'js_composer'),
            'value' => array(
                esc_html__('No choosen', 'js_composer') => '',
                esc_html__('Prata', 'js_composer') => 'Prata',
                esc_html__('Lato', 'js_composer') => 'Lato',
                esc_html__('Ebrima', 'js_composer') => 'Ebrima',
                esc_html__('Poppins', 'js_composer') => 'Poppins',
                esc_html__('Open Sans', 'js_composer') => 'Open Sans',
                esc_html__('Playball', 'js_composer') => 'Playball',
                esc_html__('RobotoSlab', 'js_composer') => 'RobotoSlab',
                esc_html__('Montserrat', 'js_composer') => 'Montserrat',
                esc_html__('Ubuntu', 'js_composer') => 'Ubuntu',
                esc_html__('CrimsonText', 'js_composer') => 'CrimsonText',
            ),
            'dependency' => array('element' => 'style_subtitle', 'value' => 'custom'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_subtitle_lato',
            'heading' => esc_html__('Style fonts (theme fonts)', 'js_composer'),
            'value' => array(
                esc_html__('regular', 'js_composer') => '400',
                esc_html__('Light', 'js_composer') => '300',
                esc_html__('Bold', 'js_composer') => '700',
                esc_html__('Black', 'js_composer') => '900',
            ),
            'dependency' => array('element' => 'theme_fonts_subtitle', 'value' => 'Lato'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_subtitle_ebrima',
            'heading' => esc_html__('Style fonts', 'js_composer'),
            'value' => array(
                esc_html__('Regular', 'js_composer') => '400',
                esc_html__('Bold', 'js_composer') => '700',
            ),
            'dependency' => array('element' => 'theme_fonts_subtitle', 'value' => 'Ebrima'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_subtitle_poppins',
            'heading' => esc_html__('Font-family (theme fonts)', 'js_composer'),
            'value' => array(
                esc_html__('regular', 'js_composer') => '400',
                esc_html__('Medium', 'js_composer') => '500',
                esc_html__('SemiBold', 'js_composer') => '600',
                esc_html__('Bold', 'js_composer') => '700',
            ),
            'dependency' => array('element' => 'theme_fonts_subtitle', 'value' => 'Poppins'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_subtitle_opsans',
            'heading' => esc_html__('Style fonts', 'js_composer'),
            'value' => array(
                esc_html__('Regular', 'js_composer') => '400',
                esc_html__('Light', 'js_composer') => '300',
            ),
            'dependency' => array('element' => 'theme_fonts_subtitle', 'value' => 'Open Sans'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_subtitle_roboslab',
            'heading' => esc_html__('Style fonts', 'js_composer'),
            'value' => array(
                esc_html__('Regular', 'js_composer') => '400',
                esc_html__('Thin', 'js_composer') => '100',
                esc_html__('Light', 'js_composer') => '300',
                esc_html__('Bold', 'js_composer') => '700',
            ),
            'dependency' => array('element' => 'theme_fonts_subtitle', 'value' => 'RobotoSlab'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_subtitle_montserrat',
            'heading' => esc_html__('Style fonts', 'js_composer'),
            'value' => array(
                esc_html__('Regular', 'js_composer') => '400',
                esc_html__('Thin', 'js_composer') => '100',
                esc_html__('Ultra-light', 'js_composer') => '200',
                esc_html__('Light', 'js_composer') => '300',
                esc_html__('Medium', 'js_composer') => '500',
                esc_html__('Semi-Bold', 'js_composer') => '600',
                esc_html__('Bold', 'js_composer') => '700',
                esc_html__('Extra-Bold', 'js_composer') => '800',
                esc_html__('Black', 'js_composer') => '900',
            ),
            'dependency' => array('element' => 'theme_fonts_subtitle', 'value' => 'Montserrat'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_subtitle_ubuntu',
            'heading' => esc_html__('Style fonts', 'js_composer'),
            'value' => array(
                esc_html__('Regular', 'js_composer') => '400',
                esc_html__('Medium', 'js_composer') => '500',
                esc_html__('Bold', 'js_composer') => '700',
            ),
            'dependency' => array('element' => 'theme_fonts_subtitle', 'value' => 'Ubuntu'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style_fonts_subtitle_crtext',
            'heading' => esc_html__('Style fonts', 'js_composer'),
            'value' => array(
                esc_html__('Regular', 'js_composer') => '400',
                esc_html__('Bold', 'js_composer') => '700',
            ),
            'dependency' => array('element' => 'theme_fonts_subtitle', 'value' => 'CrimsonText'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Font size subtitle (in px)', 'js_composer'),
            'param_name' => 'font_size_subtitle',
            'value' => '',
            'dependency' => array('element' => 'style_subtitle', 'value' => 'custom'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Letter spacing subtitle (in px)', 'js_composer'),
            'param_name' => 'lets_subtitle',
            'value' => '',
            'dependency' => array('element' => 'style_subtitle', 'value' => 'custom'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Line height subtitle (in px)', 'js_composer'),
            'param_name' => 'lih_subtitle',
            'value' => '',
            'dependency' => array('element' => 'style_subtitle', 'value' => 'custom'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color subtitle', 'js_composer'),
            'param_name' => 'subtitle_color',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Align', 'js_composer'),
            'param_name' => 'align',
            'value' => array(
                esc_html__('Left', 'js_composer') => '',
                esc_html__('Center', 'js_composer') => 'text-center',
                esc_html__('Right', 'js_composer') => 'text-right',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Divider', 'js_composer'),
            'param_name' => 'divider_switcher',
            'value' => array(
                esc_html__('Hide', 'js_composer') => 'hide',
                esc_html__('show', 'js_composer') => 'show',
            ),
            'group' => 'Divider',
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Style divider', 'js_composer'),
            'param_name' => 'lx_iconset_dividers',
            'value' => 'lx-icons_dividers', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_dividers(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'group' => 'Divider',
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'switcher_custom_divider', 'value_not_equal_to' => 'true'),

        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Size divider', 'js_composer'),
            'param_name' => 'divider_size',
            'value' => array(
                esc_html__('Small', 'js_composer') => '',
                esc_html__('Large', 'js_composer') => 'divider_large',
            ),
            'group' => 'Divider',
            'dependency' => array('element' => 'switcher_custom_divider', 'value_not_equal_to' => 'true'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Position divider', 'js_composer'),
            'param_name' => 'divider_position',
            'value' => array(
                esc_html__('After title and subtitle', 'js_composer') => '',
                esc_html__('Before title and subtitle', 'js_composer') => 'before_divider',
            ),
            'group' => 'Divider',
            'dependency' => array('element' => 'switcher_custom_divider', 'value_not_equal_to' => 'true'),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Text divider', 'js_composer'),
            'param_name' => 'text_divider_switcher',
            'group' => 'Divider',
            'dependency' => array('element' => 'switcher_custom_divider', 'value_not_equal_to' => 'true'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text divider', 'js_composer'),
            'param_name' => 'text_divider',
            'group' => 'Divider',
            'dependency' => array('element' => 'text_divider_switcher', 'value' => 'true'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Position text divider', 'js_composer'),
            'param_name' => 'position_text_divider',
            'value' => array(
                esc_html__('After divider', 'js_composer') => '',
                esc_html__('Before divider', 'js_composer') => 'before_text_divider',
            ),
            'group' => 'Divider',
            'dependency' => array('element' => 'text_divider_switcher', 'value' => 'true'),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Custom color divider', 'js_composer'),
            'param_name' => 'custom_color_divider',
            'group' => 'Divider',
            'dependency' => array('element' => 'switcher_custom_divider', 'value_not_equal_to' => 'true'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color divider', 'js_composer'),
            'param_name' => 'divider_color',
            'group' => 'Divider',
            'dependency' => array('element' => 'custom_color_divider', 'value' => 'true'),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Upload custom divider', 'js_composer'),
            'param_name' => 'switcher_custom_divider',
            'group' => 'Divider',
            'value' => 'false',
            'dependency' => array('element' => 'divider_switcher', 'value' => 'show'),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Divider', 'js_composer'),
            'param_name' => 'image_divider',
            'group' => 'Divider',
            'dependency' => array('element' => 'switcher_custom_divider', 'value' => 'true'),
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
            'heading' => esc_html__('Space left', 'js_composer'),
            'param_name' => 'left_space',
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Space right', 'js_composer'),
            'param_name' => 'right_space',
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Space left to width container', 'js_composer'),
            'param_name' => 'lx_space_container',
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
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Desctop margin top', 'js_composer'),
            'param_name' => 'desctop_mt',
            'value' => cr_get_row_offset_h('marg-md', 't', 150),
            'group' => 'Responsive Margins'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Desctop margin bottom', 'js_composer'),
            'param_name' => 'desctop_mb',
            'value' => cr_get_row_offset_h('marg-md', 'b', 150),
            'group' => 'Responsive Margins',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Tablets margin top', 'js_composer'),
            'param_name' => 'tablets_mt',
            'value' => cr_get_row_offset_h('marg-sm', 't'),
            'group' => 'Responsive Margins'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Tablets margin bottom', 'js_composer'),
            'param_name' => 'tablets_mb',
            'value' => cr_get_row_offset_h('marg-sm', 'b'),
            'group' => 'Responsive Margins'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Mobile margin top', 'js_composer'),
            'param_name' => 'mobile_mt',
            'value' => cr_get_row_offset_h('marg-xs', 't'),
            'group' => 'Responsive Margins'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Mobile margin bottom', 'js_composer'),
            'param_name' => 'mobile_mb',
            'value' => cr_get_row_offset_h('marg-xs', 'b'),
            'group' => 'Responsive Margins'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Desctop padding top', 'js_composer'),
            'param_name' => 'desctop_pt',
            'value' => cr_get_row_offset_h('padd-md', 't', 150),
            'group' => 'Responsive Paddings'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Desctop padding bottom', 'js_composer'),
            'param_name' => 'desctop_pb',
            'value' => cr_get_row_offset_h('padd-md', 'b', 150),
            'group' => 'Responsive Paddings',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Tablets padding top', 'js_composer'),
            'param_name' => 'tablets_pt',
            'value' => cr_get_row_offset_h('padd-sm', 't'),
            'group' => 'Responsive Paddings'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Tablets padding bottom', 'js_composer'),
            'param_name' => 'tablets_pb',
            'value' => cr_get_row_offset_h('padd-sm', 'b'),
            'group' => 'Responsive Paddings'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Mobile padding top', 'js_composer'),
            'param_name' => 'mobile_pt',
            'value' => cr_get_row_offset_h('padd-xs', 't'),
            'group' => 'Responsive Paddings'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Mobile padding bottom', 'js_composer'),
            'param_name' => 'mobile_pb',
            'value' => cr_get_row_offset_h('padd-xs', 'b'),
            'group' => 'Responsive Paddings'
        ),
    ) //end params
));

class WPBakeryShortCode_consultant_heading extends WPBakeryShortCode{
    protected function content($atts, $content = null){

        extract(shortcode_atts(array(
            'subtitle' => '',
            'divider_switcher' => 'hide',
            'title' => '',
            'style_title' => 'small',
            'font_size_title' => '',
            'lih_title' => '',
            'lets_title' => '',
            'style_subtitle' => 'small',
            'lx_space_container' => '',
            'left_space' => '',
            'right_space' => '',
            'font_size_subtitle' => '',
            'lih_subtitle' => '',
            'lets_subtitle' => '',
            'subtitle_color' => '',
            'image_divider' => '',
            'title_color' => '',
            'position_text_divider' => '',
            'divider_position' => '',
            'text_divider' => '',
            'divider_size' => '',
            'fz_description' => '',
            'animation_scroll' => 'fade-up',
            'duration_animation' => '1000',
            'lx_iconset_dividers' => '',
            'width' => '1',
            'style_text' => 'dark',
            'theme_fonts_subtitle' => '',
            'style_fonts_subtitle_lato' => '',
            'style_fonts_subtitle_ebrima' => '',
            'style_fonts_subtitle_poppins' => '',
            'style_fonts_subtitle_opsans' => '',
            'style_fonts_subtitle_roboslab' => '',
            'style_fonts_subtitle_montserrat' => '',
            'style_fonts_subtitle_ubuntu' => '',
            'style_fonts_subtitle_crtext' => '',
            'theme_fonts_title' => '',
            'style_fonts_title_lato' => '',
            'style_fonts_title_ebrima' => '',
            'style_fonts_title_poppins' => '',
            'style_fonts_title_opsans' => '',
            'style_fonts_title_roboslab' => '',
            'style_fonts_title_montserrat' => '',
            'style_fonts_title_ubuntu' => '',
            'style_fonts_title_crtext' => '',
            'divider_color' => '',
            'bg_heading_line' => '',
            'bg_heading' => '',
            'el_class' => '',
            'align' => '',
            'desctop_mt' => '',
            'desctop_mb' => '',
            'tablets_mt' => '',
            'tablets_mb' => '',
            'mobile_mt' => '',
            'mobile_mb' => '',
            'desctop_pt' => '',
            'desctop_pb' => '',
            'tablets_pt' => '',
            'tablets_pb' => '',
            'mobile_pt' => '',
            'mobile_pb' => '',
            'css' => ''
        ), $atts));

        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $this->settings['base'], $atts);

        $responsive_classes = $desctop_mt . ' ' . $desctop_mb . ' ' . $tablets_mt . '' . $tablets_mb . ' ' . $mobile_mt . ' ' . $mobile_mb . ' ' . $desctop_pt . ' ' . $desctop_pb . ' ' . $tablets_pt . ' ' . $tablets_pb . ' ' . $mobile_pt . ' ' . $mobile_pb;

        // custum css
        $css_class .= vc_shortcode_custom_css_class($css, ' ');


        //column size
        $width_class = array(
            '1' => ' col-xs-12',
            '1/8' => ' col-md-8 col-xs-12',
            '1/7' => ' col-md-7 col-xs-12',
            '1/6' => ' col-sm-6 col-xs-12',
            '1/4' => ' col-sm-4 col-xs-12',
            '1/3' => ' col-md-3 col-sm-6 col-xs-12'
        );

        $offset = $bg_style = '';
        if ($align == 'text-center' && $width == '1/8') {
            $offset = 'col-md-offset-2';
        }

        $lx_space_container = !empty($lx_space_container) && $lx_space_container == 'true' ? 'left-space-container' : '';
        $left_space = !empty($left_space) && $left_space == 'true' ? 'left-space' : '';
        $right_space = !empty($right_space) && $right_space == 'true' ? 'right-space' : '';
        $bg_style = !empty($bg_heading) ? 'bg_heading' : '';
        $bg_heading_line = !empty($bg_heading_line) ? 'style="background-color:' . esc_attr($bg_heading_line) . ';"' : '';
        $divider_color_attr = !empty($divider_color) ? 'style="color:' . $divider_color . '"' : "";
        $src = (!empty($image_divider) && is_numeric($image_divider)) ? wp_get_attachment_url($image_divider) : false;

        //typography styles
        if (!empty($font_size_title)) {
            $font_size_title = (float)$font_size_title;
            $font_size_title = 'font-size:' . esc_attr($font_size_title) . 'px !important;';
        } else {
            $font_size_title = '';
        }

        if (!empty($lih_title)) {
            $lih_title = (float)$lih_title;
            $lih_title = 'line-height:' . esc_attr($lih_title) . 'px !important;';
        } else {
            $lih_title = '';
        }

        if (!empty($lets_title)) {
            $lets_title = (float)$lets_title;
            $lets_title = 'letter-spacing:' . esc_attr($lets_title) . 'px !important;';
        } else {
            $lets_title = '';
        }

        if (!empty($title_color)) {
            $title_color = 'color:' . esc_attr($title_color) . '!important;';
        } else {
            $title_color = '';
        }

        if (!empty($theme_fonts_subtitle)) {
            if (!empty($style_fonts_subtitle_lato)) {
                $style_fonts_subtitle = $style_fonts_subtitle_lato;
            } elseif (!empty($style_fonts_subtitle_poppins)) {
                $style_fonts_subtitle = $style_fonts_subtitle_poppins;
            } elseif (!empty($style_fonts_subtitle_opsans)) {
                $style_fonts_subtitle = $style_fonts_subtitle_opsans;
            } elseif (!empty($style_fonts_subtitle_roboslab)) {
                $style_fonts_subtitle = $style_fonts_subtitle_roboslab;
            } elseif (!empty($style_fonts_subtitle_montserrat)) {
                $style_fonts_subtitle = $style_fonts_subtitle_montserrat;
            } elseif (!empty($style_fonts_subtitle_ubuntu)) {
                $style_fonts_subtitle = $style_fonts_subtitle_ubuntu;
            } elseif (!empty($style_fonts_subtitle_crtext)) {
                $style_fonts_subtitle = $style_fonts_subtitle_crtext;
            } elseif (!empty($style_fonts_subtitle_ebrima)) {
                $style_fonts_subtitle = $style_fonts_subtitle_ebrima;
            } else {
                $style_fonts_subtitle = "";
            }
            $theme_fonts_subtitle = 'font-family:' . esc_attr($theme_fonts_subtitle) . ', sans-serif !important; font-weight:' . $style_fonts_subtitle . ';';
        } else {
            $theme_fonts_subtitle = '';
        }

        if (!empty($theme_fonts_title)) {
            if (!empty($style_fonts_title_lato)) {
                $style_fonts_title = $style_fonts_title_lato;
            } elseif (!empty($style_fonts_title_poppins)) {
                $style_fonts_title = $style_fonts_title_poppins;
            } elseif (!empty($style_fonts_title_ebrima)) {
                $style_fonts_title = $style_fonts_title_ebrima;
            } elseif (!empty($style_fonts_title_opsans)) {
                $style_fonts_title = $style_fonts_title_opsans;
            } elseif (!empty($style_fonts_title_roboslab)) {
                $style_fonts_title = $style_fonts_title_roboslab;
            } elseif (!empty($style_fonts_title_montserrat)) {
                $style_fonts_title = $style_fonts_title_montserrat;
            } elseif (!empty($style_fonts_title_ubuntu)) {
                $style_fonts_title = $style_fonts_title_ubuntu;
            } elseif (!empty($style_fonts_title_crtext)) {
                $style_fonts_title = $style_fonts_title_crtext;
            } else {
                $style_fonts_title = "";
            }
            $theme_fonts_title = 'font-family:' . esc_attr($theme_fonts_title) . ', sans-serif !important; font-weight:' . $style_fonts_title . ';';
        } else {
            $theme_fonts_title = '';
        }

        if (!empty($font_size_subtitle)) {
            $font_size_subtitle = (float)$font_size_subtitle;
            $font_size_subtitle = 'font-size:' . esc_attr($font_size_subtitle) . 'px !important;';
        } else {
            $font_size_subtitle = '';
        }

        if (!empty($lih_subtitle)) {
            $lih_subtitle = (float)$lih_subtitle;
            $lih_subtitle = 'line-height:' . esc_attr($lih_subtitle) . 'px !important;';
        } else {
            $lih_subtitle = '';
        }

        if (!empty($lets_subtitle)) {
            $lets_subtitle = (float)$lets_subtitle;
            $lets_subtitle = 'letter-spacing:' . esc_attr($lets_subtitle) . 'px !important;';
        } else {
            $lets_subtitle = '';
        }

        if (!empty($subtitle_color)) {
            $subtitle_color = 'color:' . esc_attr($subtitle_color) . '!important;';
        } else {
            $subtitle_color = '';
        }

        if(!empty($theme_fonts_title) || !empty($font_size_title) || !empty($lih_title) || !empty($lets_title) || !empty($title_color)){
            $style_attr_title = 'style="' . $theme_fonts_title . ' ' . $font_size_title . ' ' . $lih_title . ' ' . $lets_title . ' ' . $title_color . '"';
        }else{
            $style_attr_title = '';
        }
        if(!empty($theme_fonts_subtitle) || !empty($font_size_subtitle) || !empty($lih_subtitle) || !empty($lets_subtitle) || !empty($subtitle_color)) {
            $style_attr_subtitle = 'style="' . $theme_fonts_subtitle . ' ' . $font_size_subtitle . ' ' . $lih_subtitle . ' ' . $lets_subtitle . ' ' . $subtitle_color . '"';
        }else{
            $style_attr_subtitle = '';
        }
        if (!empty($fz_description)) {
            $fz_description = (float)$fz_description;
            $fz_description = 'style="font-size:' . $fz_description . 'px; "';
        }else{
            $fz_description = '';
        }


        // custum class
        $css_class .= (!empty($el_class)) ? ' ' . $el_class : '';
        $css_class .= ' ' . $responsive_classes . ' ' . $bg_style . ' ' . $lx_space_container . ' ' . $style_text  . ' ' . $left_space . ' ' . $right_space;

        // output
        $output = "";
        $output .= '<div class="consultant_heading lx_consultant ' . esc_attr($css_class.' '.$align) . '" style="background-color:' . esc_attr($bg_heading) . ';" data-aos="' . esc_attr($animation_scroll) . '" data-aos-duration="' . esc_attr($duration_animation) . '">';


        $output .= '<div class="container-fluid" >';
        $output .= '<div class="row" >';
        $output .= '<div class="' . esc_attr($width_class[$width] . ' ' . $offset) . ' " >';

        if ($divider_switcher == "show" && $divider_position == "before_divider") {

            $output .= '<div class="lx-divider ' . esc_attr($divider_size) . '">';

            if (!empty($text_divider) && $position_text_divider == "before_text_divider") {
                $output .= '<p class="text-divider">' . esc_html($text_divider) . '</p>';
            }

            if ($lx_iconset_dividers) {
                $output .= '<span class="icon ' . esc_attr($lx_iconset_dividers) . '" '. $divider_color_attr .'></span>';
            } else {
                if (!empty($src)) $output .= '<img src="' . esc_url($src) . '" alt="">';
            }

            if (!empty($text_divider) && $position_text_divider == "") {
                $output .= '<p class="text-divider">' . esc_html($text_divider) . '</p>';
            }
            $output .= '</div>';
        }

        if (!empty($title)) {
            $output .= '<h3 class="title ' . esc_attr($style_title) . '" ' . $style_attr_title . '>' . wp_kses_post($title) . '</h3>';
        }
        if (!empty($subtitle)) {
            $output .= '<p class="subtitle ' . esc_attr($style_subtitle) . '" '. $style_attr_subtitle .'>' . wp_kses_post($subtitle) . '</p>';
        }

        if ($divider_switcher == "show" && $divider_position == "") {
            $output .= '<div class="lx-divider ' . esc_attr($divider_size) . '">';
            if (!empty($text_divider) && $position_text_divider == "before_text_divider") {
                $output .= '<p class="text-divider">' . esc_html($text_divider) . '</p>';
            }

            if ($lx_iconset_dividers) {
                $output .= '<span class="icon ' . esc_attr($lx_iconset_dividers) . '" ' . $divider_color_attr . '></span>';
            } else {
                if (!empty($src)) $output .= '<img src="' . esc_url($src) . '" alt="">';
            }

            if (!empty($text_divider) && $position_text_divider == "") {
                $output .= '<p class="text-divider">' . esc_html($text_divider) . '</p>';
            }

            $output .= '</div>';

        }

        if (!empty($content)) $output .= '<div class="desc" '. $fz_description .'>' . wpautop(do_shortcode($content)) . '</div>';

        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';

        // return output
        return $output;

    }
}
