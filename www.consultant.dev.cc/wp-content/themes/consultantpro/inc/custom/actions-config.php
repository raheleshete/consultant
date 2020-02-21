<?php
/**
 * The template for requried actions hooks.
 *
 * @package consultant
 * @since 1.0.0
 */

add_action( 'widgets_init', 'consultant_register_widgets' );
add_action( 'wp_enqueue_scripts', 'consultant_enqueue_scripts');
add_action( 'tgmpa_register', 'consultant_include_required_plugins' );

/*
 * Register sidebar.
 */
if ( ! function_exists('consultant_register_widgets' ) ) {
	function consultant_register_widgets() {
		// register sidebars
		register_sidebar(
			array(
				'id' 			=> 'sidebar',
				'name' 			=> esc_html__( 'Sidebar' , 'consultantpro'),
				'before_widget' => '<div class="widget %2$s">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 class="title-w">',
				'after_title' 	=> '</h3>',
				'description' 	=> esc_html__( 'Drag the widgets for sidebars.', 'consultantpro')
			)
		);
	}
}


if ( ! function_exists('consultant_fonts_url' ) ) {
	function consultant_fonts_url() {
		$font_url = '';

		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== esc_html_x( 'on', 'Google font: on or off', 'consultantpro' ) ) {
			$font_url = add_query_arg( 'family', urlencode( 'Prompt|Merriweather|Open Sans:400,100,200,300,500,600,700,800,900&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
		}
		return $font_url;

	}
}



/**
* @ return null
* @ param none
* @ loads all the js and css script to frontend
**/
if ( ! function_exists('consultant_enqueue_scripts' ) ) {
	function consultant_enqueue_scripts() {

		// general settings
		if( ( is_admin() ) ) { return; }

		wp_enqueue_script( 'fitvids', 	LX_URI . '/assets/js/jquery.fitvids.js', 		   array( 'jquery' ), false, true );
		
		wp_enqueue_script( 'aos-js', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js', 	   array( 'jquery' ), false, true );
		wp_enqueue_script( 'idangerous-js', LX_URI . '/assets/js/idangerous.swiper.min.js', 	   array( 'jquery' ), false, true );
		wp_enqueue_script( 'magnific-js',   LX_URI . '/assets/js/jquery.countTo.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'pkgd-js',  		LX_URI . '/assets/js/isotope.pkgd.min.js', 	       array( 'jquery' ), false, true );
		wp_enqueue_script( 'equalHeightsPlugin', 	 	LX_URI . '/assets/js/equalHeightsPlugin.js',					   array( 'jquery' ), false, true );
		wp_enqueue_script( 'imagesloaded', 	 	LX_URI . '/assets/js/imagesloaded.pkgd.min.js',					   array( 'jquery' ), false, true );
		wp_enqueue_script( 'lettering', 	 	LX_URI . '/assets/js/jquery.lettering.js',					   array( 'jquery' ), false, true );
		wp_enqueue_script( 'popup', 	 	LX_URI . '/assets/js/jquery.magnific-popup.min.js',					   array( 'jquery' ), false, true );
		wp_enqueue_script( 'textillate', 	 	LX_URI . '/assets/js/textillate.js',					   array( 'jquery' ), false, true );
		wp_enqueue_script( 'consultant-script-js', 	 	LX_URI . '/assets/js/global.js',					   array( 'jquery' ), time(), true );

		// add TinyMCE style
		add_editor_style();

		// including jQuery plugins
		wp_localize_script('jquery-scripts', 'get',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'siteurl' => get_template_directory_uri()
			)
		);

		if (cs_get_option('one_title')) {
		    foreach (cs_get_option('one_title') as $key => $title) {
		        $font_family = $title['one_title_family']['family'];
		        $font_variant = $title['one_title_family']['variant'];
		        if(! empty($font_family) ) wp_enqueue_style( esc_html($font_family), '//fonts.googleapis.com/css?family=' . esc_html($font_family) . ':' . esc_html($font_variant).'' );
		    }
		}

		if ( is_singular() ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// register style
		wp_enqueue_style( 'aos-css',		   'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css' );
		wp_enqueue_style( 'consultant-css',		   LX_URI . '/style.css' );
		wp_enqueue_style( 'bootstrap',	   LX_URI . '/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'swiper',	   LX_URI . '/assets/css/idangerous.swiper.css' );
		wp_enqueue_style( 'magnific',	   LX_URI . '/assets/css/magnific-popup.css' );
		wp_enqueue_style( 'font-awesomes', LX_URI . '/assets/css/font-awesome.min.css' );

		wp_enqueue_style( 'animate', LX_URI . '/assets/css/animate.css' );
		wp_enqueue_style( 'consultant-font-icon', LX_URI . '/assets/css/lx-iconset.css' );
		wp_enqueue_style( 'consultant-fonts', consultant_fonts_url(), array(), '1.0.0' );
		wp_enqueue_style( 'consultant-main-css',	   LX_URI . '/assets/css/style.css',array(), time() );
		wp_enqueue_style( 'consultant-unit-test',	   LX_URI . '/assets/css/unit-test.css', array(), time() );

		wp_enqueue_style( 'consultant-dynamic-css',	admin_url('admin-ajax.php').'?action=consultant_dynamic_css', '', '1.0');




		
      	


		/* Add Custom CSS */
		if (cs_get_option( 'custom_css_styles')) {
			wp_add_inline_style( 'consultant-main-css', cs_get_option( 'custom_css_styles') );
		}

		/* Add Custom JS */
		if (cs_get_option( 'custom_js_scripts')) {
			wp_add_inline_script( 'consultant-main-js', cs_get_option( 'custom_js_scripts') );
		}
	}
}





if ( ! function_exists('load_admin_style' ) ) {
	function load_admin_style() {
	    wp_enqueue_style( 'admijn_css', LX_URI . '/assets/css/lx-iconset.css' );
	}
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );


if ( ! function_exists('consultant_dynamic_css' ) ) {
  function consultant_dynamic_css() {
    require_once get_template_directory() . '/assets/css/custom.css.php';
    wp_die();
  }
}
add_action( 'wp_ajax_nopriv_consultant_dynamic_css', 'consultant_dynamic_css' );
add_action( 'wp_ajax_consultant_dynamic_css', 'consultant_dynamic_css' );

/*
* add icon font to admin
*/
if ( ! function_exists('consultant_regiser_font_pe_icon_7_stroke_icons' ) ) {
	function consultant_regiser_font_pe_icon_7_stroke_icons() {
		wp_enqueue_style( 'pe-icon-7-stroke',  LX_URI . '/assets/css/pe-icon-7-stroke.css' );
	}
}
add_action( 'vc_base_register_admin_css', 'consultant_regiser_font_pe_icon_7_stroke_icons' );

/**
* Include plugins
**/
if ( ! function_exists('consultant_include_required_plugins' ) ) {
	function consultant_include_required_plugins() {

		$plugins = array(


			array(
				'name'     				=> esc_html__( 'Booked', 'consultantpro' ), // The plugin name
				'slug'     				=> 'booked', // The plugin slug (typically the folder name)
				'source'   				=> esc_url('http://download-plugins.viewdemo.co/premium-plugins/booked.zip'), // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> esc_html__( 'Visual Composer', 'consultantpro' ), // The plugin name
				'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
				'source'   				=> esc_url('http://download-plugins.viewdemo.co/premium-plugins/js_composer.zip'), // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> esc_html__( 'vc_gm_addons', 'consultantpro' ), // The plugin name
				'slug'     				=> 'upqode-google-maps', // The plugin slug (typically the folder name)
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> esc_html__( 'Consultant Plugins', 'consultantpro' ), // The plugin name
				'slug'     				=> 'consultant-plugins', // The plugin slug (typically the folder name)
				'source'   				=> esc_url('http://download-plugins.viewdemo.co/consultant/consultant-plugins.zip'), // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '1.0.9', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'					=> esc_html__( 'WooCommerce', 'consultantpro' ),
				'slug'					=> 'woocommerce',
				'required'				=> false,
				'version'				=> '',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> ''
			),
			array(
				'name'					=> esc_html__( 'Formidable', 'consultantpro' ),
				'slug'					=> 'formidable',
				'required'				=> false,
				'version'				=> '',
				'external_url'			=> '',
			),
		);

		// Change this to your theme text domain, used for internationalising strings

		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       		=> 'consultantpro',         			// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'menu'         		=> 'tgmpa-install-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> esc_html__( 'Install Required Plugins', 'consultantpro' ),
				'menu_title'                       			=> esc_html__( 'Install Plugins', 'consultantpro' ),
				'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'consultantpro' ), // %1$s = plugin name
				'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'consultantpro' ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'consultantpro' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'consultantpro' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'consultantpro' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'consultantpro' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'consultantpro' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'consultantpro' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'consultantpro' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'consultantpro' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'consultantpro' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'consultantpro' ),
				'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'consultantpro' ),
				'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'consultantpro' ),
				'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'consultantpro' ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);

		tgmpa( $plugins, $config );
	}
}




/*
 * Check need minimal requirements (PHP and WordPress version)
 */
if ( version_compare( $GLOBALS['wp_version'], '4.3', '<' ) || version_compare( PHP_VERSION, '5.3', '<' ) ) {
	if (!function_exists('consultant_requirements_notice')) {
	    function consultant_requirements_notice()
	    {
	        $message = sprintf( esc_html__( 'ConsultantPro theme needs minimal WordPress version 4.3 and PHP 5.3<br>You are running version WordPress - %s, PHP - %s.<br>Please upgrade need module and try again.', 'consultantpro' ), $GLOBALS['wp_version'], PHP_VERSION );
	        printf( '<div class="notice-warning notice"><p><strong>%s</strong></p></div>', $message );
	    }
	}
    add_action( 'admin_notices', 'consultant_requirements_notice' );
}

