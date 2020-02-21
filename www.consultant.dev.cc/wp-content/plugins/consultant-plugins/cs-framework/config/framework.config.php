<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings      = array(
    'menu_title' => esc_html__('Theme Options','consultantpro'),
    'menu_type'  => 'add_menu_page',
    'menu_slug'  => 'cs-framework',
    'ajax_save'  => false,
);


// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ----------------------------------------
// General option section
// ----------------------------------------

$options[]      = array(
    'name'        => 'general',
    'title'       => esc_html__('General','consultantpro'),
    'icon'        => 'fa fa-star',
    // begin: fields
    'fields'      => array(

        array(
            'type'    => 'heading',
            'content' => esc_html__('Type site','consultantpro'),
        ),

        array(
          'id'      => 'site_type',
          'type'    => 'select',
          'title'   => 'Site type',
          'options'      => array(
            'multipage'   => 'Multipage',
            'onepage'     => 'Onepage',
          ),
        ),

        array(
          'id'                 => 'favorite_page',
          'type'               => 'select',
          'title'              => 'Select page for one page',
          'options'            => 'page',
          'class'              => 'chosen',
          'attributes'         => array(
            'data-placeholder' => 'Select your favrorite page',
            'multiple'         => 'only-key',
            'style'            => 'width: 200px;'
          ),
          'dependency'   => array( 'site_type', '==', 'onepage' ),
        ),

        array(
          'id'                 => 'order_by',
          'type'               => 'select',
          'title'              => 'Order by pages',
          'options'            => array(
                'none' => 'None',
                'menu_order' => 'Menu Order',
                'ID' => 'ID',
                'date' => 'Date',
                'modified' => 'Modified',
                'title' => 'Title',
                'name' => 'Name',
                'author' => 'Author',
                'rand' => 'Random',
                'type' => 'Type',
                'comment_count' => 'Comment Count',
          ),
          'dependency'   => array( 'site_type', '==', 'onepage' ),
        ),

        array(
          'id'                 => 'order',
          'type'               => 'select',
          'title'              => 'Order pages',
          'options'            => array(
            'ASC' => 'Ascending Order',
            'DESC' => 'Descending Order',
          ),
          'dependency'   => array( 'site_type', '==', 'onepage' ),
        ),

        array(
            'id'      => 'show_sidebar',
            'type'    => 'checkbox',
            'title'   => 'Hide sidebar',
            'label'   => 'yes',
            'desc'   =>  'This option only when deactivated plugin Visual Composer',
            'default' => true
        ),

        array(
            'type'    => 'heading',
            'content' => esc_html__('Preloader','consultantpro'),
        ),

        array(
            'id'             => 'preloader',
            'type'           => 'select',
            'title'          => esc_html__('Preloader','consultantpro'),
            'options'        => array(
                'show'     => esc_html__('show','consultantpro'),
                ''     => esc_html__('hide','consultantpro'),
            ),
        ),

        array(
            'type'    => 'heading',
            'content' => esc_html__('Favicon','consultantpro'),
        ),
        array(
            'id'      => 'favicon',
            'type'    => 'image',
            'title'   => 'Favicon',
            'desc'   => 'Icon should be not more 64x64 pixels and only in format .ico or .png',
        ), 


        //Site logo image
        array(
            'type'    => 'heading',
            'content' => esc_html__('Logo','consultantpro'),
        ),
        array(
            'id'             => 'logotype',
            'type'           => 'select',
            'title'          => esc_html__('Type logo','consultantpro'),
            'options'        => array(
                'text'     => esc_html__('text','consultantpro'),
                'image'     => esc_html__('image','consultantpro'),
            ),
        ),
        array(
            'id'      => 'logo_image',
            'type'    => 'upload',
            'title'   => esc_html__('Site Logo Image','consultantpro'),
            'desc'    => esc_html__('Output image logo.','consultantpro'),
            'default'    => get_template_directory_uri().'/assets/images/logo.png',
            'dependency' => array( 'logotype', '==', 'image' )
        ),
        array(
            'id'          => 'logotext',
            'type'        => 'text',
            'title'       => esc_html__( 'Text logo', 'consultantpro' ),
            'default'     => '',
            'dependency' => array( 'logotype', '==', 'text' )
        ),

        // Header
        array(
            'type'    => 'heading',
            'content' => esc_html__('Header','consultantpro'),
        ),
        array(
            'id'             => 'width_header',
            'type'           => 'select',
            'title'          => esc_html__('Width header','consultantpro'),
            'options'        => array(
                'container'     => esc_html__('Container','consultantpro'),
                'full'     => esc_html__('Full width','consultantpro'),
            ),
        ),


        array(
            'type'    => 'heading',
            'content' => esc_html__( 'Styling headlines', 'consultantpro' ),
        ),

        array(
            'id'              => 'one_title',
            'type'            => 'group',
            'title'           =>  esc_html__( 'Typography Title', 'consultantpro' ),
            'button_title'    => esc_html__( 'Add New', 'consultantpro' ),
            'accordion_title' => esc_html__( 'Add New Styles', 'consultantpro' ),
            // begin: fields
            'fields'      => array(
                // header size
                array(
                    'id'             => 'one_title_tag',
                    'type'           => 'select',
                    'title'          => esc_html__( 'Title Tag', 'consultantpro' ),
                    'options'        => array(
                        'h1'             => esc_html__('H1','consultantpro'),
                        'h2'             => esc_html__('H2','consultantpro'),
                        'h3'             => esc_html__('H3','consultantpro'),
                        'h4'             => esc_html__('H4','consultantpro'),
                        'h5'             => esc_html__('H5','consultantpro'),
                        'h6'             => esc_html__('H6','consultantpro'),
                        'p'             => esc_html__('p','consultantpro'),
                    ),
                ),
                // font family
                array(
                    'id'        => 'one_title_family',
                    'type'      => 'typography',
                    'title'     => esc_html__( 'Font Family', 'consultantpro' ),
                    'default'   => array(
                        'family'  => 'Open Sans',
                        'variant' => 'regular',
                        'font'    => 'google', // this is helper for output
                    ),
                ),
                // font size
                array(
                    'id'          => 'one_title_size',
                    'type'        => 'text',
                    'title'       => esc_html__( 'Font Size (in px)', 'consultantpro' ),
                    'default'     => '',
                ),
                array(
                    'id'          => 'one_title_line_height',
                    'type'        => 'text',
                    'title'       =>  esc_html__( 'Line height (in px)', 'consultantpro' ),
                    'default'     => '',
                ),
                array(
                    'id'          => 'one_title_letter',
                    'type'        => 'text',
                    'title'       => esc_html__( 'Letter spasing (in px)', 'consultantpro' ),
                    'default'     => '',
                    'multilang'     => 'true',
                ),
                // font color
                array(
                    'id'      => 'one_title_color',
                    'type'    => 'color_picker',
                    'title'   => esc_html__( 'Font Color', 'consultantpro' ),
                ),
            ),
        ),
        
    

    ) // end: fields
);


// ----------------------------------------
// Ecommerce
// ----------------------------------------
$eccommerce_theme_options = apply_filters( 'eccommerce_theme_options', array() );
if ( !empty( $eccommerce_theme_options ) ) {
    foreach ( $eccommerce_theme_options as $option ) {
        $options[] = $option;
    }

}

// ----------------------------------------
// Blog option
// ----------------------------------------
$options[]      = array(
    'name'        => 'blog_page',
    'title'       => esc_html__('Blog','consultantpro'),
    'icon'        => 'fa fa-newspaper-o',
    // begin: fields
    'fields'      => array(
        array(
            'id'             => 'width_blog',
            'type'           => 'select',
            'title'          => esc_html__('Width Blog','consultantpro'),
            'options'        => array(
                ''             => esc_html__('Full Width','consultantpro'),
                'two_col'     => esc_html__('two column','consultantpro'),
                'three_col'     => esc_html__('three column','consultantpro'),
            ),
        ),
        array(
            'id'             => 'pager',
            'type'           => 'select',
            'desc'           => 'Pagination is show only when count posts more on number option Setting -> Reading -> Blog pages show at most',
            'title'          => esc_html__('Pager','consultantpro'),
            'options'        => array(
                ''     => esc_html__('Hide','consultantpro'),
                'show'             => esc_html__('Show','consultantpro'),
            ),
        ),
        // show sidebar
        array(
            'id'      => 'blog_sidebar',
            'type'    => 'checkbox',
            'title'   => esc_html__('Show sidebar','consultantpro'),
            'label'   => esc_html__('yes','consultantpro'),
            'default' => true
        ),
        array(
            'id'             => 'style_blog',
            'type'           => 'select',
            'title'          => esc_html__('Style Blog','consultantpro'),
            'options'        => array(
                ''             => esc_html__('Default','consultantpro'),
                'classic'     => esc_html__('Classic','consultantpro'),
            ),
        ),
        array(
            'type'    => 'heading',
            'content' => 'Banner blog',
        ),
        array(
            'id'             => 'banner_blog',
            'type'           => 'select',
            'title'          => esc_html__('Banner Blog','consultantpro'),
            'options'        => array(
                'show'             => esc_html__('Show','consultantpro'),
                'hide'     => esc_html__('Hide','consultantpro'),
            ),
        ),
        array(
            'id'    => 'title_banner',
            'type'    => 'text',
            'title'   => esc_html__('Title banner','consultantpro'),
            'default' => esc_html__('Our Blog','consultantpro'),
            'multilang'     => 'true',
            'dependency' => array( 'banner_blog', '==', 'show' )
        ),
        array(
            'id'    => 'subtitle_banner',
            'type'    => 'textarea',
            'multilang'     => 'true',
            'title'   => esc_html__('Subtitle banner','consultantpro'),
            'default' => esc_html__('Rem ipsum dolor sit amet','consultantpro'),
            'dependency' => array( 'banner_blog', '==', 'show' )
        ),
        array(
            'id'      => 'bg_blog_banner',
            'type'    => 'upload',
            'title'   => esc_html__('Background image','consultantpro'),
            'default'    => '',
            'dependency' => array( 'banner_blog', '==', 'show' )
        ),

        array(
            'type'    => 'heading',
            'content' => esc_html__('Contact form blog','consultantpro'),
        ),
        array(
            'id'             => 'contact_form_blog',
            'type'           => 'select',
            'title'          => esc_html__('Contact form Blog','consultantpro'),
            'options'        => array(
                'show'             => esc_html__('Show','consultantpro'),
                'hide'     => esc_html__('Hide','consultantpro'),
            ),
        ),
        array(
            'id'    => 'bg_color_form',
            'type'  => 'color_picker',
            'title' => esc_html__('Background color form','consultantpro'),
            'dependency' => array( 'contact_form_blog', '==', 'show' )
        ),
        array(
            'id'             => 'choose_form_blog',
            'type'           => 'select',
            'title'          => esc_html__('Contact form Blog','consultantpro'),
            'options'        => array_flip(consultant_get_fd_forms()),
            'desc'        => esc_html__('List forms formidable','consultantpro'),
            'dependency' => array( 'contact_form_blog', '==', 'show' )
        ),
        array(
            'id'    => 'title_form',
            'type'    => 'text',
            'multilang'     => 'true',
            'title'   => esc_html__('Title form','consultantpro'),
            'default' => esc_html__('Connect with Us','consultantpro'),
            'dependency' => array( 'contact_form_blog', '==', 'show' )
        ),
        array(
            'id'    => 'subtitle_form',
            'type'    => 'textarea',
            'multilang'     => 'true',
            'title'   => esc_html__('Subtitle form','consultantpro'),
            'default' => esc_html__('Rem ipsum dolor sit amet','consultantpro'),
            'dependency' => array( 'contact_form_blog', '==', 'show' )
        ),
        array(
            'id'    => 'desc_form',
            'type'    => 'textarea',
            'multilang'     => 'true',
            'title'   => esc_html__('Description form','consultantpro'),
            'default' => '',
            'dependency' => array( 'contact_form_blog', '==', 'show' )
        ),
    ), // end: fields
);



// ----------------------------------------
// SINGLE BLOG POST
// ----------------------------------------

$options[]      = array(
    'name'        => 'single_post',
    'title'       => esc_html__('Single post','consultantpro'),
    'icon'        => 'fa fa-file-text-o',

    // begin: fields
    'fields'      => array(
        array(
            'id'      => 'single_sidebar',
            'type'    => 'checkbox',
            'title'   => esc_html__('Show sidebar','consultantpro'),
            'label'   => esc_html__('Yes','consultantpro'),
            'default' => true
        ),
        array(
            'id'      => 'post_navigation',
            'type'    => 'switcher',
            'title'   => esc_html__('Show pagination on post detail','consultantpro'),
            'label'   => '',
            'default' => 0,
        ),
    ) // end: fields
);


// ----------------------------------------
// Footer option section
// ----------------------------------------
$options[]      = array(
    'name'        => 'footer',
    'title'       => esc_html__('Footer','consultantpro'),
    'icon'        => 'fa fa-copyright',
    // begin: fields
    'fields'      => array(

        array(
            'type'    => 'heading',
            'content' => esc_html__('Logo','consultantpro'),
        ),
        array(
            'id'             => 'footer_logotype',
            'type'           => 'select',
            'title'          => esc_html__('Type logo','consultantpro'),
            'options'        => array(
                'text'     => esc_html__('text','consultantpro'),
                'image'     => esc_html__('image','consultantpro'),
            ),
        ),
        array(
            'id'      => 'footer_logo_image',
            'type'    => 'upload',
            'title'   => esc_html__('Site Logo Image','consultantpro'),
            'desc'    => esc_html__('Output image logo.','consultantpro'),
            'default'    => get_template_directory_uri().'/assets/images/logo.png',
            'dependency' => array( 'footer_logotype', '==', 'image' )
        ),
        array(
            'id'          => 'footer_logotext',
            'type'        => 'text',
            'title'       => esc_html__( 'Text logo', 'consultantpro' ),
            'default'     => 'Consultant',
            'dependency' => array( 'footer_logotype', '==', 'text' )
        ),
        //Footer Text
        array(
            'type'    => 'heading',
            'content' => esc_html__('Footer options','consultantpro'),
        ),
        array(
            'id'       => 'footer_text',
            'type'     => 'wysiwyg',
            'multilang'     => 'true',
            'title'    => esc_html__('Footer copyright','consultantpro'),
            'settings' => array(
                'textarea_rows' => 5,
                'media_buttons' => false,
            ),
        ),
        array(
            'id'       => 'footer_contact',
            'type'     => 'wysiwyg',
            'multilang'     => 'true',
            'title'    => esc_html__('Footer contact info','consultantpro'),
            'settings' => array(
                'textarea_rows' => 5,
                'media_buttons' => false,
            ),
        ),
        array(
            'id'           => 'footer_social',
            'type'         => 'group',
            'title'        => esc_html__('Footer social links','luxemburg'),
            'button_title' => esc_html__('Add New','luxemburg'),
            'fields'       => array(
                array(
                    'id'          => 'footer_social_link',
                    'type'        => 'text',
                    'multilang'     => 'true',
                    'title'       => esc_html__('Text','luxemburg')
                ),
                array(
                    'id'          => 'footer_social_icon',
                    'type'        => 'icon',
                    'link'       => esc_html__('Icon','luxemburg')
                )
            ),
            'default' => array(
                array(
                    'footer_social_link' => 'https://fb.com/',
                    'footer_social_icon' => 'fa fa-facebook'
                ),
                array(
                    'footer_social_link' => 'https://twitter.com/',
                    'footer_social_icon' => 'fa fa-twitter'
                ),
                array(
                    'footer_social_link' => 'https://www.linkedin.com/',
                    'footer_social_icon' => 'fa fa-google-plus'
                ),
            )
        ),

    ) // end: fields
);


// ----------------------------------------
// 404 page
// ----------------------------------------

$options[] = array(
    'name' => 'error_page',
    'title' => esc_html__('404 Page','consultantpro'),
    'icon' => 'fa fa-bolt',

    // begin: fields
    'fields' => array(

        array(
            'id' => 'error_title',
            'type' => 'text',
            'title' => esc_html__('Error Title','consultantpro'),
            'default' => esc_html__('404 ERROR','consultantpro'),
            'multilang' => 'true'
        ),
        array(
            'id' => 'error_subtitle',
            'type' => 'textarea',
            'title' => esc_html__('Error Subtitle','consultantpro'),
            'default' => esc_html__("Sorry! We couldn't find the page you are looking for",'consultantpro'),
            'multilang' => 'true',
        ),
        array(
            'id' => 'error_btn_text',
            'type' => 'text',
            'title' => esc_html__('Error button text','consultantpro'),
            'default' => esc_html__('Go back','consultantpro'),
            'multilang' => 'true',
        ),
        array(
            'id' => '404_image',
            'type' => 'upload',
            'title' => esc_html__('Image background','consultantpro'),
            'desc' => esc_html__('Output image 404.','consultantpro'),
            'default' => '',
        ),
    ) // end: fields
);


// ----------------------------------------
// Custom Css and JavaScript
// ----------------------------------------
$options[]      = array(
    'name'        => 'custom_css',
    'title'       => esc_html__('Custom Css and JavaScript','consultantpro'),
    'icon'        => 'fa fa-paint-brush',
    'fields'      => array(
        array(
            'id'         => 'custom_css_styles',
            'desc'       => esc_html__('Only CSS, without tag &lt;style&gt;.','consultantpro'),
            'type'       => 'textarea',
            'multilang'     => 'true',
            'title'      => esc_html__('Custom css code','consultantpro')
        ),
        array(
            'id'         => 'custom_js_scripts',
            'desc'       => esc_html__('Only JS code, without tag &lt;script&gt;.','consultantpro'),
            'type'       => 'textarea',
            'multilang'     => 'true',
            'title'      => esc_html__('Custom JavaScript code','consultantpro')
        )
    )
);




// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
    'name'     => 'backup_section',
    'title'    => esc_html__('Backup','consultantpro'),
    'icon'     => 'fa fa-shield',

    // begin: fields
    'fields'   => array(

        array(
            'type'    => 'notice',
            'class'   => 'warning',
            'content' => esc_html__('You can save your current options. Download a Backup and Import.','consultantpro'),
        ),

        array(
            'type'    => 'backup',
        ),

    )  // end: fields
);

// ------------------------------
// Documentation                    -
// ------------------------------
$options[]   = array(
    'name'     => 'documentation_section',
    'title'    => esc_html__('Documentation','consultantpro'),
    'icon'     => 'fa fa-info-circle',

    'fields'   => array(

        array(
            'type'    => 'heading',
            'content' => esc_html__('Documentation','consultantpro')
        ),
        array(
            'type'    => 'content',
            'content' => 'To view the documentation, go to <a href="#" target="_blank">documentation page</a>.',
        ),

    )
);

CSFramework::instance( $settings, $options );