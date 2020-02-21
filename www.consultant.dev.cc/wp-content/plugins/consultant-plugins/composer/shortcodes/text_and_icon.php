<?php
/*
** consultant Heading Shortcode
** Version: 1.0.0 
*/

vc_map(array(
    'name' => esc_html__('Text and icon', 'js_composer'),
    'base' => 'consultant_text_icon',
    'content_element' => true,
    'show_settings_on_create' => true,
    'category' => esc_html__('From consultant', 'js_composer'),
    'description' => esc_html__('Text and icon', 'js_composer'),
    'params' => array(
        array(
            'type' => 'textarea',
            'heading' => 'Title',
            'param_name' => 'title',
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
            'heading' => esc_html__('Text after description', 'js_composer'),
            'param_name' => 'text_after_switch',
            'value' => '',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Enter text after description', 'js_composer'),
            'param_name' => 'text_after_desc',
            'description' => 'Use tag sup and sub for pricing',
            'dependency' => array('element' => 'text_after_switch', 'value' => 'true'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style colors', 'js_composer'),
            'param_name' => 'style_block',
            'value' => array(
                esc_html__('Dark', 'js_composer') => '',
                esc_html__('Light', 'js_composer') => 'light',
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Upload custom icon', 'js_composer'),
            'param_name' => 'custom_icon_check',
            'value' => ''
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon library', 'js_composer'),
            'value' => array(
                esc_html__('Sculptor', 'js_composer') => 'sculptor',
                esc_html__('Designer', 'js_composer') => 'designer',
                esc_html__('Tatoo', 'js_composer') => 'tatoo',
                esc_html__('Guitar', 'js_composer') => 'guitar',
                esc_html__('Arhitecture', 'js_composer') => 'arhitecture',
                esc_html__('Career', 'js_composer') => 'career',
                esc_html__('Spa', 'js_composer') => 'spa',
                esc_html__('Flat', 'js_composer') => 'flat',
                esc_html__('Tutor', 'js_composer') => 'tutor',
                esc_html__('Stuff', 'js_composer') => 'stuff',
                esc_html__('Mobiles', 'js_composer') => 'mobiles',
                esc_html__('Computers', 'js_composer') => 'computers',
                esc_html__('Appliances', 'js_composer') => 'appliances',
                esc_html__('Consultant', 'js_composer') => 'consultantpro',
                esc_html__('Cello', 'js_composer') => 'cello',
                esc_html__('Accordion', 'js_composer') => 'accordion',
                esc_html__('Piano', 'js_composer') => 'piano',
                esc_html__('Poll cleaning', 'js_composer') => 'pool_cleaning',
                esc_html__('Lawyer', 'js_composer') => 'lawyer',
            ),
            'admin_label' => true,
            'param_name' => 'type',
            'description' => esc_html__('Select icon library.', 'js_composer'),
            'dependency' => array('element' => 'custom_icon_check', 'value_not_equal_to' => 'true'),
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
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_sculptor',
            'value' => 'lx-icons_sculptor', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_sculptor(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'sculptor'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_tatoo',
            'value' => 'lx-icons_tatoo', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_tatoo(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'tatoo'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_guitar',
            'value' => 'lx-icons_guitar', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_guitar(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'guitar'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_arhitecture',
            'value' => 'lx-icons_arhitecture', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_arhitecture(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'arhitecture'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_designer',
            'value' => 'lx-icons_designer', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_designer(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'designer'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_career',
            'value' => 'lx-icons_career', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_career(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'career'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_spa',
            'value' => 'lx-icons_spa', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_spa(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'spa'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_flat',
            'value' => 'lx-icons_flat', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_flat(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'flat'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_tutor',
            'value' => 'lx-icons_tutor', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_tutor(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'tutor'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_stuff',
            'value' => 'lx-icons_stuff', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_stuff(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'stuff'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_mobiles',
            'value' => 'lx-icons_mobiles', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_mobiles(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'mobiles'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_computers',
            'value' => 'lx-icons_computers', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_computers(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'computers'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_appliance',
            'value' => 'lx-icons_appliance', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_appliance(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'appliances'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_consultant',
            'value' => 'lx-icons_consultant', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_consultant(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'consultantpro'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_cello',
            'value' => 'lx-icons_cello', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_cello(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'cello'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_piano',
            'value' => 'lx-icons_piano', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_piano(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'piano'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_accordion',
            'value' => 'lx-icons_accordion', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_accordion(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'accordion'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_poll_cleaning',
            'value' => 'lx-icons_poll_cleaning', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_pool_cleaning(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'pool_cleaning'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Iconset', 'js_composer'),
            'param_name' => 'lx_iconset_lawyer',
            'value' => 'lx-icons_lawyer', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'lx-icons',
                'source' => consultant_iconset_lawyer(),
                'iconsPerPage' => 100, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'js_composer'),
            'dependency' => array('element' => 'type', 'value' => 'lawyer'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Size icon', 'js_composer'),
            'param_name' => 'size_icon',
            'value' => array(
                esc_html__('Default', 'js_composer') => '',
                esc_html__('Small', 'js_composer') => 'small_icon',
            ),
            'dependency' => array('element' => 'custom_icon_check', 'value_not_equal_to' => 'true'),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Custom icon', 'js_composer'),
            'param_name' => 'custom_icon',
            'value' => '',
            'dependency' => array('element' => 'custom_icon_check', 'value' => 'true'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Background position for custom icon', 'js_composer'),
            'param_name' => 'icon_output',
            'value' => array(
                esc_html__('Cover', 'js_composer') => 'bg_icon',
                esc_html__('Contain', 'js_composer') => 'image',
            ),
            'dependency' => array('element' => 'custom_icon_check', 'value' => 'true'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style icon', 'js_composer'),
            'param_name' => 'icon_style',
            'value' => array(
                esc_html__('Default', 'js_composer') => '',
                esc_html__('Round', 'js_composer') => 'rounded',
            ),
            'dependency' => array('element' => 'custom_icon_check', 'value' => 'true'),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Label icon', 'js_composer'),
            'param_name' => 'label_icon_check',
            'value' => '',
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Link block', 'js_composer'),
            'param_name' => 'link_icon_check',
            'value' => '',
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('Custom link', 'js_composer'),
            'param_name' => 'custom_link_icon',
            'description' => 'This option use only for cutom link all block. Link text is hidden.',
            'dependency' => array('element' => 'link_icon_check', 'value' => 'true'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text label', 'js_composer'),
            'param_name' => 'text_label_icon',
            'description' => 'Use tag sup and sub for pricing',
            'dependency' => array('element' => 'label_icon_check', 'value' => 'true'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Output label text', 'js_composer'),
            'param_name' => 'text_label_switch',
            'value' => array(
                esc_html__('After icon', 'js_composer') => 'text_after_icon',
                esc_html__('Before icon', 'js_composer') => 'text_before_icon',
            ),
            'dependency' => array('element' => 'label_icon_check', 'value' => 'true'),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Text background icon', 'js_composer'),
            'param_name' => 'bg_text_check',
            'value' => '',
            'dependency' => array('element' => 'custom_icon_check', 'value' => 'true'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text background icon', 'js_composer'),
            'param_name' => 'text_bg_icon',
            'dependency' => array('element' => 'bg_text_check', 'value' => 'true'),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Hover Action Block', 'js_composer'),
            'param_name' => 'hover_action',
            'value' => '',
            'group' => esc_html__('Hovers', 'js_composer'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Background hover color', 'js_composer'),
            'param_name' => 'bg_hover_color',
            'dependency' => array('element' => 'hover_action', 'value' => 'true'),
            'group' => esc_html__('Hovers', 'js_composer'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title hover', 'js_composer'),
            'param_name' => 'title_hover',
            'value' => '',
            'dependency' => array('element' => 'hover_action', 'value' => 'true'),
            'group' => esc_html__('Hovers', 'js_composer'),
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Subtitle hover', 'js_composer'),
            'param_name' => 'subtitle_hover',
            'value' => '',
            'dependency' => array('element' => 'hover_action', 'value' => 'true'),
            'group' => esc_html__('Hovers', 'js_composer'),
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Description hover', 'js_composer'),
            'param_name' => 'desc_hover',
            'value' => '',
            'dependency' => array('element' => 'hover_action', 'value' => 'true'),
            'group' => esc_html__('Hovers', 'js_composer'),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Hover Action Icon', 'js_composer'),
            'param_name' => 'hover_action_icon',
            'value' => '',
            'group' => esc_html__('Hovers', 'js_composer'),
            'dependency' => array('element' => 'hover_action', 'value_not_equal_to' => 'true'),
            'description' => esc_html__('Only for alignment block "Text Bottom - Icon Top" or "Text Top - Icon Bottom"', 'js_composer'),

        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Background hover color icon', 'js_composer'),
            'param_name' => 'bg_hover_color_icon',
            'dependency' => array('element' => 'hover_action_icon', 'value' => 'true'),
            'group' => esc_html__('Hovers', 'js_composer'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title hover icon', 'js_composer'),
            'param_name' => 'title_hover_icon',
            'value' => '',
            'dependency' => array('element' => 'hover_action_icon', 'value' => 'true'),
            'group' => esc_html__('Hovers', 'js_composer'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Subtitle hover icon', 'js_composer'),
            'param_name' => 'subtitle_hover_icon',
            'value' => '',
            'dependency' => array('element' => 'hover_action_icon', 'value' => 'true'),
            'group' => esc_html__('Hovers', 'js_composer'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Font style title', 'js_composer'),
            'param_name' => 'style_title',
            'value' => array(
                esc_html__('Small', 'js_composer') => 'small',
                esc_html__('Medium', 'js_composer') => 'medium',
                esc_html__('Large', 'js_composer') => 'large',
                esc_html__('Extra Large', 'js_composer') => 'x_large',
                esc_html__('Custom', 'js_composer') => 'custom',
            ),
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
            'heading' => esc_html__('Alignment text', 'js_composer'),
            'param_name' => 'align',
            'value' => array(
                esc_html__('Left', 'js_composer') => 'text_left',
                esc_html__('Center', 'js_composer') => 'text_center',
                esc_html__('Right', 'js_composer') => 'text_right',
            ),
            'group' => esc_html__('Alignment', 'js_composer'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Alignment icon', 'js_composer'),
            'param_name' => 'align_icon',
            'value' => array(
                esc_html__('Left', 'js_composer') => 'icon_left',
                esc_html__('Center', 'js_composer') => 'icon_center',
                esc_html__('Right', 'js_composer') => 'icon_right',
            ),
            'group' => esc_html__('Alignment', 'js_composer'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Alignment block', 'js_composer'),
            'param_name' => 'align_block',
            'value' => array(
                esc_html__('Text Bottom - Icon Top', 'js_composer') => 'section_top',
                esc_html__('Text Top - Icon Bottom', 'js_composer') => 'section_bottom',
                esc_html__('Text Left - Icon Right', 'js_composer') => 'section_left',
                esc_html__('Text Right - Icon Left', 'js_composer') => 'section_right',
            ),
            'group' => esc_html__('Alignment', 'js_composer'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Block border', 'js_composer'),
            'param_name' => 'block_border',
            'value' => array(
                esc_html__('None', 'js_composer') => 'none',
                esc_html__('Rectangle', 'js_composer') => 'rectangle',
                esc_html__('Round', 'js_composer') => 'round',
            ),
            'group' => esc_html__('Borders', 'js_composer'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Border style', 'js_composer'),
            'param_name' => 'border_style',
            'value' => array(
                esc_html__('Line', 'js_composer') => 'solid',
                esc_html__('Dash', 'js_composer') => 'dashed',
            ),
            'dependency' => array('element' => 'block_border', 'value_not_equal_to' => 'none'),
            'group' => esc_html__('Borders', 'js_composer'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Border color', 'js_composer'),
            'param_name' => 'border_color',
            'dependency' => array('element' => 'block_border', 'value_not_equal_to' => 'none'),
            'group' => esc_html__('Borders', 'js_composer'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Border size', 'js_composer'),
            'param_name' => 'border_size',
            'dependency' => array('element' => 'block_border', 'value_not_equal_to' => 'none'),
            'group' => esc_html__('Borders', 'js_composer'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon border', 'js_composer'),
            'param_name' => 'icon_border',
            'value' => array(
                esc_html__('None', 'js_composer') => 'none',
                esc_html__('Rectangle', 'js_composer') => 'rectangle',
                esc_html__('Round', 'js_composer') => 'round',
            ),
            'group' => esc_html__('Borders', 'js_composer'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Border style icon', 'js_composer'),
            'param_name' => 'border_style_icon',
            'value' => array(
                esc_html__('Line', 'js_composer') => 'solid',
                esc_html__('Dash', 'js_composer') => 'dashed',
            ),
            'dependency' => array('element' => 'icon_border', 'value_not_equal_to' => 'none'),
            'group' => esc_html__('Borders', 'js_composer'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Border color icon', 'js_composer'),
            'param_name' => 'border_color_icon',
            'dependency' => array('element' => 'icon_border', 'value_not_equal_to' => 'none'),
            'group' => esc_html__('Borders', 'js_composer'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Border size icon', 'js_composer'),
            'param_name' => 'border_size_icon',
            'dependency' => array('element' => 'icon_border', 'value_not_equal_to' => 'none'),
            'group' => esc_html__('Borders', 'js_composer'),
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


class WPBakeryShortCode_consultant_text_icon extends WPBakeryShortCode{
    protected function content($atts, $content = null){

        extract(shortcode_atts(array(
            'title' => '',
            'style_block' => '',
            'custom_link_icon' => '',
            'style_title' => 'small',
            'custom_icon' => '',
            'font_size_title' => '',
            'lih_title' => '',
            'icon_style' => '',
            'lets_title' => '',
            'title_color' => '',
            'bg_hover_color' => '',
            'title_hover' => '',
            'subtitle_hover' => '',
            'desc_hover' => '',
            'align_icon' => 'icon_left',
            'align_block' => 'section_top',
            'block_border' => 'none',
            'border_style' => '',
            'border_color' => '',
            'border_size' => '0',
            'icon_border' => 'none',
            'border_style_icon' => 'solid',
            'icon_output' => 'bg_icon',
            'border_color_icon' => '',
            'border_size_icon' => '',
            'hover_action_icon' => '',
            'hover_action' => '',
            'text_after_desc' => '',
            'link_icon_check' => '',
            'size_icon' => '',
            'bg_hover_color_icon' => '',
            'title_hover_icon' => '',
            'subtitle_hover_icon' => '',
            'label_icon_check' => '',
            'text_bg_icon' => '',
            'animation_scroll' => 'fade-up',
            'duration_animation' => '1000',
            'text_label_switch' => 'text_after_icon',
            'text_label_icon' => '',
            'all_style_block' => '',
            'type' => '',
            'lx_iconset_barber' => '',
            'lx_iconset_sculptor' => '',
            'lx_iconset_consult' => '',
            'lx_iconset_flat' => '',
            'lx_iconset_arhitecture' => '',
            'lx_iconset_career' => '',
            'lx_iconset_designer' => '',
            'lx_iconset_tutor' => '',
            'lx_iconset_tatoo' => '',
            'lx_iconset_spa' => '',
            'lx_iconset_guitar' => '',
            'lx_iconset_stuff' => '',
            'lx_iconset_mobiles' => '',
            'lx_iconset_computers' => '',
            'lx_iconset_appliance' => '',
            'lx_iconset_consultant' => '',
            'lx_iconset_cello' => '',
            'lx_iconset_accordion' => '',
            'lx_iconset_piano' => '',
            'lx_iconset_poll_cleaning' => '',
            'lx_iconset_lawyer' => '',
            'el_class' => '',
            'align' => 'text_left',
            'css' => ''
        ), $atts));

        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $this->settings['base'], $atts);
        $lx_iconset_consult = substr($lx_iconset_consultant, 9, strlen($lx_iconset_consultant) - 1);
        $lx_iconset_flat = substr($lx_iconset_flat, 9, strlen($lx_iconset_flat) - 1);
        $lx_iconset_tutor = substr($lx_iconset_tutor, 9, strlen($lx_iconset_tutor) - 1);

        $src = (!empty($custom_icon) && is_numeric($custom_icon)) ? wp_get_attachment_url($custom_icon) : '';

        // custum css
        $css_class .= vc_shortcode_custom_css_class($css, ' ');
        $border_icon = $border_block = $block_align = $icon_aligment = "";
        if ($align_block == "section_left") {
            $block_align = "left";
            $icon_aligment = "right";
        } elseif ($align_block == "section_right") {
            $block_align = "right";
            $icon_aligment = "left";
        }

        $border_icon = $icon_border != "none" ? "border" : '';
        $border_block = $block_border != "none" ? "border" : '';
        $style_text_bg = !empty($text_bg_icon) ? 'bg-text-style' : '';
        $border_size = $block_border == "none" ? "" : $border_size;


        $output = '';
        // custum class
        $css_class .= (!empty($el_class)) ? ' ' . $el_class : '';
        // output

        if(!empty($border_block) && (!empty($border_style) || !empty($border_color) || !empty($border_size))){
            $border_style = 'style="';
            $border_style .= !empty($border_style) ? 'border-style: ' . esc_attr($border_style) . ';' : '';
            $border_style .= !empty($border_color) ? 'border-color: ' . esc_attr($border_color) . ';' : '';
            $border_style .= !empty($border_size) ? 'border-width: ' . esc_attr($border_size) . 'px;' : '';
            $border_style .= '"';
        }else{
            $border_style = '';
        }


        if(!empty($border_icon) && (!empty($border_size_icon) || !empty($border_style_icon) || !empty($border_color_icon))){
            $border_style_icon_attr = 'style="';
            $border_style_icon_attr .= !empty($border_size_icon) ? 'border-width:' . esc_attr($border_size_icon) . 'px ' : '';
            $border_style_icon_attr .= !empty($border_style_icon) ? 'border-style: ' .esc_attr($border_style_icon) . ' ' : '';
            $border_style_icon_attr .= !empty($border_color_icon) ? 'border-color: ' .esc_attr($border_color_icon) . '' : '';
            $border_style_icon_attr .= '" ';
        } else {
            $border_style_icon_attr = '';
        }

        $bg_hover_color = !empty($bg_hover_color) ? 'style="background-color:' . esc_attr($bg_hover_color) .'"' : '';

        $output .= '<div class="lx-text-icon lx_consultant ' . esc_attr($align_block.' '.$all_style_block . ' ' . $style_text_bg . ' ' . $css_class . ' ' . $style_block . ' ' . $border_block . ' ' . $block_border . ' ' . $border_style) . '" '. $border_style .'  data-aos="' . $animation_scroll . '" data-aos-duration="' . $duration_animation . '">';
        if (!empty($link_icon_check) && $link_icon_check == 'true') {
            $custom_link_icon = vc_build_link( $custom_link_icon );
            $target_link = (!empty($custom_link_icon["target"]))? 'target='.$custom_link_icon["target"]: '';
            $output .= '<a href="'.$custom_link_icon['url'].'" '.$target_link.' class="link-block"></a>';
        }
        if (!empty($hover_action) && $hover_action == 'true') {
            $output .= '<div class="hover-info" '. $bg_hover_color .'>';
            $output .= '<div class="lx-v-align">';
            if (!empty($title_hover)) $output .= '<p class="title-hover">' . wp_kses_post($title_hover) . '</p>';
            if (!empty($subtitle_hover)) $output .= '<p class="subtitle-hover">' . wp_kses_post($subtitle_hover) . '</p>';
            if (!empty($desc_hover)) $output .= '<p class="desc-hover">' . wp_kses_post($desc_hover) . '</p>';
            $output .= '</div>';
            $output .= '</div>';
        }
        if ($align_block != "section_bottom") {
            $output .= '<div class="wrap-icon ' . esc_attr($size_icon . ' ' . $border_icon . ' ' . $align_icon . ' ' . $icon_aligment . ' ' . $icon_border . ' ' . $border_style_icon) . '" ' . $border_style_icon_attr . '>';
            if (!empty($hover_action_icon) && $hover_action_icon == 'true') {
                $output .= '<div class="hover-info-icon" style="background-color:' . esc_attr($bg_hover_color_icon) . '" >';
                $output .= '<div class="lx-v-align">';
                if (!empty($title_hover_icon)) $output .= '<p class="title-hover">' . wp_kses_post($title_hover_icon) . '</p>';
                if (!empty($subtitle_hover_icon)) $output .= '<p class="subtitle-hover">' . wp_kses_post($subtitle_hover_icon) . '</p>';
                $output .= '</div>';
                $output .= '</div>';
            }

            if (!empty($text_label_icon) && $text_label_switch == 'text_before_icon') {
                $output .= '<p class="text-icon ' . esc_attr($text_label_switch) . '">' . wp_kses_post($text_label_icon) . '</p>';
            }

            if (!empty($src)) {
                if ($icon_output == 'bg_icon') {
                    $output .= '<div class="icon s-back-switch ' . esc_attr($icon_style . ' ' . $icon_output) . '">';
                    $output .= '<img src="' . esc_url($src) . '" alt="" data-s-hidden="1" class="s-img-switch" >';
                    $output .= '</div>';
                    $output .= '<span class="overlay ' . esc_attr($icon_style) . '"></span>';
                } else {
                    $output .= '<img src="' . esc_url($src) . '" alt="" class="icon" >';
                }
                if (!empty($text_bg_icon)) {
                    $output .= '<p class="bg-text">' . wp_kses_post($text_bg_icon) . '</p>';
                }
            } else {
                if ($type == 'barber') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_barber) . '" ></span>';
                } elseif ($type == 'sculptor' || $type == '') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_sculptor) . '" ></span>';
                } elseif ($type == 'designer') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_designer) . '" ></span>';
                } elseif ($type == 'tatoo') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_tatoo) . '" ></span>';
                } elseif ($type == 'guitar') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_guitar) . '" ></span>';
                } elseif ($type == 'arhitecture') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_arhitecture) . '" ></span>';
                } elseif ($type == 'career') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_career) . '" ></span>';
                } elseif ($type == 'spa') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_spa) . '" ></span>';
                } elseif ($type == 'stuff') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_stuff) . '" ></span>';
                } elseif ($type == 'mobiles') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_mobiles) . '" ></span>';
                } elseif ($type == 'appliances') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_appliance) . '" ></span>';
                } elseif ($type == 'computers') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_computers) . '" ></span>';
                } elseif ($type == 'cello') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_cello) . '" ></span>';
                } elseif ($type == 'piano') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_piano) . '" ></span>';
                } elseif ($type == 'accordion') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_accordion) . '" ></span>';
                } elseif ($type == 'pool_cleaning') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_poll_cleaning) . '" ></span>';
                } elseif ($type == 'lawyer') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_lawyer) . '" ></span>';
                } elseif ($type == 'consultantpro') {
                    $output .= '<img src="' . get_template_directory_uri() . '/assets/images/iconset/consultant/' . esc_attr($lx_iconset_consult) . '.png" alt="" class="icon" >';
                } elseif ($type == 'flat') {
                    $output .= '<img src="' . get_template_directory_uri() . '/assets/images/iconset/flat/' . esc_attr($lx_iconset_flat) . '.png" alt="" class="icon" >';
                } elseif ($type == 'tutor') {
                    $output .= '<img src="' . get_template_directory_uri() . '/assets/images/iconset/tutor/' . esc_attr($lx_iconset_tutor) . '.png" alt="" class="icon" >';
                }
            }
            if (!empty($text_label_icon) && $text_label_switch == 'text_after_icon') {
                $output .= '<p class="text-icon ' . esc_attr($text_label_switch) . '">' . wp_kses_post($text_label_icon) . '</p>';
            }

            $output .= '</div>';


            if (!empty($font_size_title)) {
                $font_size_title = (float)$font_size_title;
            }

            if (!empty($lets_title)) {
                $lets_title = (float)$lets_title;
            }

            if (!empty($lih_title)) {
                $lih_title = (float)$lih_title;
            }

            if(!empty($font_size_title) || !empty($lih_title) || !empty($lets_title) || !empty($title_color)){
                $style_title_attr = 'style="';
                $style_title_attr .= !empty($font_size_title) ? 'font-size: ' . esc_attr($font_size_title) . 'px;' : '';
                $style_title_attr .= !empty($lih_title) ? 'line-height: ' . esc_attr($lih_title) . 'px;' : '';
                $style_title_attr .= !empty($lets_title) ? 'letter-spacing: ' . esc_attr($lets_title) . 'px;' : '';
                $style_title_attr .= !empty($title_color) ? 'color: ' . esc_attr($title_color) : '';
                $style_title_attr .= '"';
            }else{
                $style_title_attr = '';
            }

            $output .= '<div class="wrap-text ' . esc_attr($align . ' ' . $block_align) . ' text-xs-center">';
            if (!empty($title)) {
                $output .= '<h3 class="title ' . esc_attr($style_title) . '" '. $style_title_attr .'>' . wp_kses_post($title) . '</h3>';
            }

            if (!empty($content)) $output .= '<div class="desc">' . wpautop(do_shortcode($content)) . '</div>';
            if (!empty($text_after_desc)) {
                $output .= '<p class="text-after-desc">' . wp_kses_post($text_after_desc) . '</p>';
            }
            $output .= '</div>';
        }
        if ($align_block == "section_bottom") {
            $output .= '<div class="wrap-text ' . esc_attr($align . ' ' . $block_align) . ' text-xs-center">';
            if (!empty($title)) {
                $output .= '<h3 class="title ' . esc_attr($style_title) . '" '. $style_title_attr .'>' . esc_html($title) . '</h3>';
            }

            if (!empty($content)) $output .= '<div class="desc">' . wpautop(do_shortcode($content)) . '</div>';
            $output .= '</div>';
            $output .= '<div class="wrap-icon ' . esc_attr($size_icon . ' ' . $border_icon . ' ' . $align_icon . ' ' . $icon_aligment . ' ' . $icon_border . ' ' . $border_style_icon) . '" data-hover-icon="' . esc_attr($bg_hover_color_icon) . '" style="border: ' . esc_attr($border_size_icon) . 'px solid' . esc_attr($border_color_icon) . '">';

            if (!empty($hover_action_icon) && $hover_action_icon == 'true') {
                $output .= '<div class="hover-info-icon" style=background-color:' . esc_attr($bg_hover_color_icon) . '>';
                $output .= '<div class="lx-v-align">';
                if (!empty($title_hover_icon)) $output .= '<p class="title-hover">' . esc_html($title_hover_icon) . '</p>';
                if (!empty($subtitle_hover_icon)) $output .= '<p class="subtitle-hover">' . esc_html($subtitle_hover_icon) . '</p>';
                $output .= '</div>';
                $output .= '</div>';
            }

            if (!empty($src)) {
                if ($icon_output == 'bg_icon') {
                    $output .= '<div class="icon s-back-switch ' . esc_attr($icon_style . ' ' . $icon_output) . '">';
                    $output .= '<img src="' . esc_url($src) . '" alt="" data-s-hidden="1" class="s-img-switch" >';
                    $output .= '</div>';
                    $output .= '<span class="overlay ' . esc_attr($icon_style) . '"></span>';
                } else {
                    $output .= '<img src="' . esc_url($src) . '" alt="" class="icon" >';
                }
                if (!empty($text_bg_icon)) {
                    $output .= '<p class="bg-text">' . wp_kses_post($text_bg_icon) . '</p>';
                }
            } else {
                if ($type == 'barber') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_barber) . '" ></span>';
                } elseif ($type == 'sculptor') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_sculptor) . '" ></span>';
                } elseif ($type == 'designer') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_designer) . '" ></span>';
                } elseif ($type == 'tatoo') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_tatoo) . '" ></span>';
                } elseif ($type == 'guitar') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_guitar) . '" ></span>';
                } elseif ($type == 'arhitecture') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_arhitecture) . '" ></span>';
                } elseif ($type == 'career') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_career) . '" ></span>';
                } elseif ($type == 'spa') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_spa) . '" ></span>';
                } elseif ($type == 'stuff') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_stuff) . '" ></span>';
                } elseif ($type == 'mobiles') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_mobiles) . '" ></span>';
                } elseif ($type == 'appliances') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_appliance) . '" ></span>';
                } elseif ($type == 'computers') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_computers) . '" ></span>';
                } elseif ($type == 'cello') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_cello) . '" ></span>';
                } elseif ($type == 'piano') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_piano) . '" ></span>';
                } elseif ($type == 'accordion') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_accordion) . '" ></span>';
                } elseif ($type == 'pool_cleaning') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_poll_cleaning) . '" ></span>';
                } elseif ($type == 'lawyer') {
                    $output .= '<span class="icon ' . esc_attr($lx_iconset_lawyer) . '" ></span>';
                } elseif ($type == 'consultantpro') {
                    $output .= '<img src="' . get_template_directory_uri() . '/assets/images/iconset/consultant/' . esc_attr($lx_iconset_consult) . '.png" alt="" class="icon" >';
                } elseif ($type == 'flat') {
                    $output .= '<img src="' . get_template_directory_uri() . '/assets/images/iconset/flat/' . esc_attr($lx_iconset_flat) . '.png" alt="" class="icon" >';
                } elseif ($type == 'tutor') {
                    $output .= '<img src="' . get_template_directory_uri() . '/assets/images/iconset/tutor/' . esc_attr($lx_iconset_tutor) . '.png" alt="" class="icon" >';
                }
            }
            if (!empty($text_label_icon)) {
                $output .= '<p class="text-icon">' . wp_kses_post($text_label_icon) . '</p>';
            }
            $output .= '</div>';
        }


        $output .= '</div>';


        // return output
        return $output;

    }
}
