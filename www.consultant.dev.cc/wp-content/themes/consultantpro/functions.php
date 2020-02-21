<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package consultant
 * @since 1.0.0
 */

if ( ! isset( $content_width ) ) {
    $content_width = 1200; /* pixels */
}

defined( 'LX_URI' )  or define( 'LX_URI',  get_template_directory_uri() );
defined( 'T_PATH' ) or define( 'T_PATH', get_template_directory() );
defined( 'F_PATH' ) or define( 'F_PATH', T_PATH . '/inc' ); 

// Framework integration
// ----------------------------------------------------------------------------------------------------
require_once F_PATH . '/custom/actions-config.php';
require_once F_PATH . '/customizer.php';
require_once F_PATH . '/custom-header.php';
require_once F_PATH . '/custom/helper-functions.php';
require_once F_PATH . '/class-tgm-plugin-activation.php';
require_once F_PATH . '/importer/index.php';


require_once T_PATH . '/wp-updates-theme.php';
new WPUpdatesThemeUpdater_2228( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );


// Woocommerce support
if ( class_exists( 'WooCommerce' ) ) {
    require_once T_PATH . '/woocommerce-support.php';
}

if ( ! function_exists('consultant_after_setup' ) ) {
    function consultant_after_setup() {

        load_theme_textdomain( 'consultantpro', get_template_directory() . '/languages' );

        register_nav_menus( 
            array( 
                'primary-menu'  => esc_html__( 'Primary menu', 'consultantpro' ),
                'footer-menu'  => esc_html__( 'Footer menu', 'consultantpro' ),
            )
        );
        
        add_theme_support( 'post-formats', array('video', 'gallery', 'audio', 'quote'));
        add_theme_support( 'custom-header' );
        add_theme_support( 'custom-background' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption' ) );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
    }
}
add_action( 'after_setup_theme', 'consultant_after_setup' );




