<?php
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * CSFramework Metabox Config
 *
 * @since 1.0
 * @version 1.0
 *
 */
$metaboxes        = array();



//PORTFOLIO


$metaboxes[]      = array(
    'id'            => '_custom_portfolio_options',
    'title'         => esc_html__('Custom Options','consultantpro'),
    'post_type'     => 'portfolio', // or post or CPT
    'context'       => 'side',
    'priority'      => 'default',
    'sections'      => array(

        // begin section

        array(
            'name'      => 'portfolio_client_info',
            'title'     => esc_html__('Client','consultantpro'),
            'fields'    => array(
                array(
                    'id'    => 'portfolio_client',
                    'type'  => 'text',
                    'title' => esc_html__('Client','consultantpro'),
                ),
            ),
        ),
    ),
);



//LOGO OPTIONS


$metaboxes[]      = array(
    'id'            => '_custom_logo_options',
    'title'         => esc_html__('Logo Options','consultantpro'),
    'post_type'     => 'page', // or post or CPT
    'context'       => 'side',
    'priority'      => 'high',
    'sections'      => array(

        // begin section

        array(
            'name'      => 'custom_page_logo',
            'title'     => esc_html__('Custom logo for page','consultantpro'),
            'fields'    => array(
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
                    'id'      => 'logo_image_custom',
                    'type'    => 'upload',
                    'title'   => esc_html__('Site Logo Image','consultantpro'),
                    'desc'    => esc_html__('Output image logo.','consultantpro'),
                    'dependency' => array( 'logotype', '==', 'image' )
                ),
                array(
                    'id'          => 'logotext_custom',
                    'type'        => 'text',
                    'title'       => esc_html__( 'Text logo', 'consultantpro' ),
                    'default'     => '',
                    'dependency' => array( 'logotype', '==', 'text' )
                ),
            ),
        ),
    ),
);





CSFramework_Metabox::instance( $metaboxes );