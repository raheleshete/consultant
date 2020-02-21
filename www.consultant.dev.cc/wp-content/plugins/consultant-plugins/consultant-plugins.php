<?php
/*
Plugin Name: Consultant Plugins
Version: 1.0.9
Description: Includes Codestar Framework and Visual Composer Shortcodes
*/

// If theme ConsultantPro inactive
$current_theme = wp_get_theme();

if( $current_theme->get('Name') != 'ConsultantPro' ) {
    return;
}

// add in constant name path
defined( 'EF_ROOT')		or  define( 'EF_ROOT', dirname(__FILE__));

defined( 'T_URI' )      or  define( 'T_URI',  get_template_directory_uri() );
defined( 'T_IMG' )		or 	define(	'T_IMG',	T_URI . '/assets/images' );

defined( 'T_PATH' )     or  define( 'T_PATH', get_template_directory() );
defined( 'FUNC_PATH' )  or  define( 'FUNC_PATH', T_PATH . '/inc' );


require_once EF_ROOT . '/wp-updates-plugin.php';
new WPUpdatesPluginUpdater_1879( 'http://wp-updates.com/api/2/plugin', plugin_basename(__FILE__));



if(!class_exists('consultant_Plugins')) {

	class consultant_Plugins {

		
		public function __construct() { 

			if ( !function_exists( 'is_plugin_active' ) ) {
			  include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
			}

			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

				require_once( WP_PLUGIN_DIR . '/js_composer/js_composer.php');
				// init settings and custom shortcode for visual composer
				add_action('vc_after_init', array($this, 'consultant_init') );
				add_action( 'admin_print_scripts-post.php', array($this, 'vc_enqueue_scripts'), 99);
				add_action( 'admin_print_scripts-post-new.php', array($this, 'vc_enqueue_scripts'), 99);

			}

		}

		//include custom shortcodes
		public function consultant_init() {
			// init vc
			require_once( EF_ROOT .'/composer/init.php');

		}

		//include scripts
		public function vc_enqueue_scripts() {
		  $assets_js = plugins_url('/composer/js', __FILE__);
		  wp_enqueue_script( 'vc-script', $assets_js .'/vc-script.js' ,  array(), '1.0.3', true );
		}

		


	} // end of class

	// ingegration cs framework
	require_once( EF_ROOT .'/cs-framework/cs-framework.php');
	define( 'CS_ACTIVE_FRAMEWORK', true );
	define( 'CS_ACTIVE_METABOX',   true );
	define( 'CS_ACTIVE_SHORTCODE', false );
	define( 'CS_ACTIVE_CUSTOMIZE', false );

	// include functions
	require_once( EF_ROOT .'/includes/functions_plugins.php');
	require_once( EF_ROOT . '/widgets.php');

	new consultant_Plugins;
} // end of class_exists


if ( ! function_exists('wpc_register_post_type_and_tax' ) ) {
	function wpc_register_post_type_and_tax() { 
	  // New Post Type
	  register_post_type( 'news',
	      array(
	        'labels' => array(
	            'name' => esc_html__( 'News', 'consultantpro' ),
	            'singular_name' => esc_html__( 'Item', 'consultantpro' )
	        ),
	        'menu_icon' => 'dashicons-welcome-view-site',
	        'public' => true,
	        'has_archive' => true,
	        'rewrite' => array('slug' => 'news-item'),
	      )
	  );
	  // New Taxonomy
	  register_taxonomy(
	      'news-category',
	      'news',
	      array(
	        'label' => esc_html__( 'Categories', 'consultantpro' ),
	        'rewrite' => array( 'slug' => 'news-category' ),
	        'hierarchical' => true,
	      )
	  );
	  //end of register
	}
}


add_action('init', 'wpc_register_post_type_and_tax' );

/*
 * Portfolio post type.
 */

if ( ! function_exists('register_custom_post_type' ) ) {
	function register_custom_post_type() {

		// $option = apply_filters( 'cs_get_option', get_option( CS_OPTION ) );
		/* Custom slug option */
		$portfolio_url_slug = ( cs_get_option('portfolio_slug') ) ? cs_get_option('portfolio_slug') : 'portfolio-item';
		$portfolio_category_url_slug = ( cs_get_option('portfolio_category_slug') ) ? cs_get_option('portfolio_category_slug') : 'portfolio-category';

	   	$taxonomy_labels                = array(
		    'name'                        => esc_html( 'Category', 'consultantpro' ),
		    'singular_name'               => esc_html( 'Category', 'consultantpro' ),
		    'menu_name'                   => esc_html( 'Categories', 'consultantpro' ),
		    'all_items'                   => esc_html( 'All Categories', 'consultantpro' ),
		    'parent_item'                 => esc_html( 'Parent Category', 'consultantpro' ),
		    'parent_item_colon'           => esc_html( 'Parent Category:', 'consultantpro' ),
		    'new_item_name'               => esc_html( 'New Category Name', 'consultantpro' ),
		    'add_new_item'                => esc_html( 'Add New Category', 'consultantpro' ),
		    'edit_item'                   => esc_html( 'Edit Category', 'consultantpro' ),
		    'update_item'                 => esc_html( 'Update Category', 'consultantpro' ),
		    'separate_items_with_commas'  => esc_html( 'Separate categories with commas', 'consultantpro' ),
		    'search_items'                => esc_html( 'Search categories', 'consultantpro' ),
		    'add_or_remove_items'         => esc_html( 'Add or remove categories', 'consultantpro' ),
		    'choose_from_most_used'       => esc_html( 'Choose from the most used categories', 'consultantpro' ),
	   	);

	   	$taxonomy_rewrite         = array(
		    'slug'                  => $portfolio_category_url_slug,
		    'with_front'            => true,
		    'hierarchical'          => true,
	   	);

	   	$taxonomy_args          = array(
		    'labels'              => $taxonomy_labels,
		    'hierarchical'        => true,
		    'public'              => true,
		    'show_ui'             => true,
		    'show_admin_column'   => true,
		    'show_in_nav_menus'   => true,
		    'query_var'      	  => true,
		    'show_tagcloud'       => true,
		    'rewrite'             => $taxonomy_rewrite,
	   	);
	   	register_taxonomy( 'portfolio-category', array( 'portfolio'), $taxonomy_args );

	   	$taxonomy_labels                = array(
		    'name'                        => esc_html( 'Tag',  'consultantpro' ),
		    'singular_name'               => esc_html( 'Tag', 'consultantpro' ),
		    'menu_name'                   => esc_html( 'Tags', 'consultantpro' ),
		    'all_items'                   => esc_html( 'All Tags', 'consultantpro' ),
		    'parent_item'                 => esc_html( 'Parent Tag', 'consultantpro' ),
		    'parent_item_colon'           => esc_html( 'Parent Tag:', 'consultantpro' ),
		    'new_item_name'               => esc_html( 'New Tag Name', 'consultantpro' ),
		    'add_new_item'                => esc_html( 'Add New Tag', 'consultantpro' ),
		    'edit_item'                   => esc_html( 'Edit Tag', 'consultantpro' ),
		    'update_item'                 => esc_html( 'Update Tag', 'consultantpro' ),
		    'separate_items_with_commas'  => esc_html( 'Separate categories with commas', 'consultantpro' ),
		    'search_items'                => esc_html( 'Search categories', 'consultantpro' ),
		    'add_or_remove_items'         => esc_html( 'Add or remove categories', 'consultantpro' ),
		    'choose_from_most_used'       => esc_html( 'Choose from the most used categories', 'consultantpro' ),
	   	);

	   	$taxonomy_rewrite         = array(
		    'slug'                  => 'portfolio-tag',
		    'with_front'            => true,
		    'hierarchical'          => true,
	   	);

	   	$taxonomy_args          = array(
		    'labels'              => $taxonomy_labels,
		    'hierarchical'        => true,
		    'public'              => true,
		    'show_ui'             => true,
		    'show_admin_column'   => true,
		    'show_in_nav_menus'   => true,
		    'query_var'      	  => true,
		    'show_tagcloud'       => true,
		    'rewrite'             => $taxonomy_rewrite,
	   	);
	   	register_taxonomy( 'portfolio-tag', array( 'portfolio'), $taxonomy_args );

		//Register new post type
	   	$post_type_labels       = array(
		    'name'                => esc_html( 'Portfolio', 'consultantpro' ),
		    'singular_name'       => esc_html( 'Portfolio', 'consultantpro' ),
		    'menu_name'           => esc_html( 'Portfolio', 'consultantpro' ),
		    'parent_item_colon'   => esc_html( 'Parent Portfolio:', 'consultantpro' ),
		    'all_items'           => esc_html( 'All Portfolios', 'consultantpro' ),
		    'view_item'           => esc_html( 'View Portfolio', 'consultantpro' ),
		    'add_new_item'        => esc_html( 'Add New Portfolio', 'consultantpro' ),
		    'add_new'             => esc_html( 'Add New', 'consultantpro' ),
		    'edit_item'           => esc_html( 'Edit Portfolio', 'consultantpro' ),
		    'update_item'         => esc_html( 'Update Portfolio', 'consultantpro' ),
		    'search_items'        => esc_html( 'Search portfolios', 'consultantpro' ),
		    'not_found'           => esc_html( 'No portfolios found', 'consultantpro' ),
		    'not_found_in_trash'  => esc_html( 'No portfolios found in Trash', 'consultantpro' ),
	   	);

	   	$post_type_args         = array(
		    'label'               => 'portfolio',
		    'description'         => 'Portfolio information pages',
		    'labels'              => $post_type_labels,
		    'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', ),
		    'taxonomies'          => array( 'post' ),
		    'hierarchical'        => false,
		    'public'              => true,
		    'show_ui'             => true,
		    'show_in_menu'        => true,
		    'menu_icon'     	  => 'dashicons-format-gallery',
		    'has_archive'         => true,
		    'publicly_queryable'  => true,
		    'rewrite'             => array( 'slug' => $portfolio_url_slug ),
		    'capability_type'     => 'post',
	   	);

	   	register_post_type( 'portfolio', $post_type_args );
	}
}




add_action(	'init', 'register_custom_post_type', 0);





//REGISTER CUSTOM WIDGETS


if ( ! class_exists('Barbeshop_Latest_Posts_Widget' ) ) {
	class Barbeshop_Latest_Posts_Widget extends WP_Widget {
	  public function __construct() {
	    parent::__construct(
	      'latest_posts',
	      esc_html__( 'Consultant latest posts', 'consultantpro' ),
	      array( 'description' => esc_html__( 'Get latest posts', 'consultantpro' ), )
	    );
	  }
	  public function update( $new_instance, $old_instance ) {
	    $instance = array();
	    $instance['title'] = strip_tags( $new_instance['title'] );
	    $instance['count_posts'] = strip_tags( $new_instance['count_posts'] );
	    return $instance;
	  }
	  public function form( $instance ) {
	    $instance['title'] = ( isset( $instance['title'] ) && ! empty( $instance['title'] ) ) ? $instance['title'] : '';
	    $instance['count_posts'] = ( isset( $instance['count_posts'] ) && ! empty( $instance['count_posts'] ) ) ? $instance['count_posts'] : '';
	    ?>
	    <p>
	      <label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'consultantpro' ); ?></label>
	      <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" 
	        name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" 
	        value="<?php echo esc_html( $instance['title'] ); ?>" />
	    </p>
	    <p>
	      <label for="<?php echo esc_html( $this->get_field_id( 'count_posts' ) ); ?>"><?php esc_html_e( 'Count posts', 'consultantpro' ); ?></label>
	      <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'count_posts' ) ); ?>" 
	        name="<?php echo esc_html( $this->get_field_name( 'count_posts' ) ); ?>" type="text" 
	        value="<?php echo esc_html( $instance['count_posts'] ); ?>" />
	    </p>
	    <?php
	  }


	  public function widget( $args, $instance ) {

	    /** This filter is documented in wp-includes/default-widgets.php */
	    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
	    $count_posts = ( ! empty( $instance['count_posts'] ) && is_numeric( $instance['count_posts'] ) ) ? $instance['count_posts'] : 2;

	    echo wp_kses_post( $args['before_widget'] );
	    if ( $title ) {
	      echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
	    }
	        
	    $posts = get_posts( array( 'numberposts' => $count_posts ) );
	    if ( $posts ) {
	      foreach ( $posts as $post ) {
	        $img_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
	        $output  = '<div class="lx-latest-post">';
	        if( ! empty( $img_url ) ) {
	          $output .= '<a href="' . get_permalink( $post->ID ) . '"><div class="lx-img s-back-switch">';
	          $output .= '<img class="s-img-switch" src="' . $img_url . '" alt="">';
	          $output .= '</div></a>';
	        }
	        $output .= '<div class="lx-text">';
	        $output .= '<a class="lx-link" href="' . get_permalink( $post->ID ) . '"><h5>' . $post->post_title . '</h5></a>';
	        $output .= '<span><span class="icon pe-7s-date"></span><span class="date">' . get_the_time( get_option('date_format') ) . '</span></span>';
	        $output .= '</div>';
	        $output .= '</div>';
	        echo wp_kses_post( $output );
	      }
	      
	    }
	    wp_reset_postdata();
	    echo wp_kses_post( $args['after_widget'] );
	  }
	}
}



add_action( 'widgets_init', function() {
  register_widget( 'Barbeshop_Latest_Posts_Widget' );
});




if ( ! class_exists('Consultant_Twitter_Posts_Widget' ) ) {
	class Consultant_Twitter_Posts_Widget extends WP_Widget {
	  public function __construct() {
	    parent::__construct(
	      'twitter_posts',
	      esc_html__( 'Consultant twitter posts', 'consultantpro' ),
	      array( 'description' => esc_html__( 'Get twitter posts', 'consultantpro' ), )
	    );
	  }
	  public function update( $new_instance, $old_instance ) {
	    $instance = array();
	    $instance['twitter_page_id'] = strip_tags( $new_instance['twitter_page_id'] );
	    $instance['title'] = strip_tags( $new_instance['title'] );
	    $instance['count_posts'] = strip_tags( $new_instance['count_posts'] );
	    return $instance;
	  }
	  public function form( $instance ) {
	    $instance['twitter_page_id'] = ( isset( $instance['twitter_page_id'] ) && ! empty( $instance['twitter_page_id'] ) ) ? $instance['twitter_page_id'] : '';
	    $instance['title'] = ( isset( $instance['title'] ) && ! empty( $instance['title'] ) ) ? $instance['title'] : '';
	    $instance['count_posts'] = ( isset( $instance['count_posts'] ) && ! empty( $instance['count_posts'] ) ) ? $instance['count_posts'] : '';
	    ?>
	    <p>
	      <label for="<?php echo esc_html( $this->get_field_id( 'twitter_page_id' ) ); ?>"><?php esc_html_e( 'Twitter page id', 'consultantpro' ); ?></label>
	      <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'twitter_page_id' ) ); ?>" 
	        name="<?php echo esc_html( $this->get_field_name( 'twitter_page_id' ) ); ?>" type="text" 
	        value="<?php echo esc_html( $instance['twitter_page_id'] ); ?>" />
	    </p>
	    <p>
	      <label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'consultantpro' ); ?></label>
	      <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" 
	        name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" 
	        value="<?php echo esc_html( $instance['title'] ); ?>" />
	    </p>
	    <p>
	      <label for="<?php echo esc_html( $this->get_field_id( 'count_posts' ) ); ?>"><?php esc_html_e( 'Count posts', 'consultantpro' ); ?></label>
	      <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'count_posts' ) ); ?>" 
	        name="<?php echo esc_html( $this->get_field_name( 'count_posts' ) ); ?>" type="text" 
	        value="<?php echo esc_html( $instance['count_posts'] ); ?>" />
	    </p>
	    <?php
	  }


	  public function widget( $args, $instance ) {
	  	require_once get_template_directory().'/inc/custom/twitter_widget/GetTweetsInPhp.php';
	    /** This filter is documented in wp-includes/default-widgets.php */
	    $twitter_page_id = apply_filters( 'widget_title', empty( $instance['twitter_page_id'] ) ? '' : $instance['twitter_page_id'], $instance, $this->id_base );
	    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
	    $count_posts = ( ! empty( $instance['count_posts'] ) && is_numeric( $instance['count_posts'] ) ) ? $instance['count_posts'] : 2;

	    echo wp_kses_post( $args['before_widget'] );
	    if ( $title ) {
	      echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
	    }

	    $configs = array(
	      'consumer_key' => cs_get_option('tw_app_id'), 
	      'consumer_secret' => cs_get_option('tw_secret_id'), 
	      'screen_name' => $twitter_page_id,
	      'count' => $count_posts
	    );

	    // Get latest tweets using the function get_tweets
	    $tweets = \Netgloo\GetTweetsInPhp::get_tweets($configs);

	    // print_r($tweets);

	    foreach ($tweets as $tweet) { 
	    	$tweet = (object) $tweet;
		    $output ='<div class="lx-twitter">';
		    	$output .= '<div class="icon">';
		    		$output .= '<span class="fa fa-twitter"></span>';
	    		$output .= '</div>';
	    		$output .= '<div class="post-tweet">';
	    			$output .= $tweet->n_html_text;
				$output .= '</div>';
			$output .= '</div>';
			echo wp_kses_post( $output );
	    }
	    wp_reset_postdata();
	    echo wp_kses_post( $args['after_widget'] );
	  }
	}
}



add_action( 'widgets_init', function() {
  register_widget( 'Consultant_Twitter_Posts_Widget' );
});



if(!class_exists('Barbeshop_Newsletter_Widget')) {
	class Barbeshop_Newsletter_Widget extends WP_Widget {

	    public function __construct() {
	        parent::__construct(
	            'Barbeshop_Newsletter_Widget',
	            esc_html__( 'Newsletter widget', 'consultantpro' ),
	            array( 'classname' => 'newsletter_widget','description' => esc_html__( 'Displays image box with text', 'consultantpro' ), )
	        );
	    }

	    function widget( $args, $instance ) {
	        // Widget output
	        extract($args, EXTR_SKIP);

	        $title = empty($instance['title']) ? ''  : apply_filters('widget_title', $instance['title']);
	        $form_text = ( ! empty( $instance['form_text'] ) ) ? $instance['form_text'] : '';
	        $mailchimp_shortcode = ( ! empty( $instance['mailchimp_shortcode'] ) ) ? $instance['mailchimp_shortcode'] : '';
	        $info_title = ( ! empty( $instance['info_title'] ) ) ? $instance['info_title'] : '';

	        echo esc_html( $args['before_widget'] );
	        if ( $title ) {
	            echo esc_html( $args['before_title'] . $title . $args['after_title'] );
	        }

	        $output = '';

	        $output .= ( ! empty( $form_text ) ) ? '<p>' . $form_text . '</p>' : '';
	        $output .= ( ! empty( $mailchimp_shortcode ) ) ?  do_shortcode( $mailchimp_shortcode ) : '';
	        $output .= ( ! empty( $info_title ) ) ? '<p class="newsletter-desc"> ' . $info_title . '</p>' : '';

	        echo wp_kses_post( $output );

	        echo esc_html( $args['after_widget'] );
	    }

	    function update( $new_instance, $old_instance ) {
	        // Save widget options
	        $instance = $old_instance;
	        $instance['title'] = $new_instance['title'];
	        $instance['form_text'] = $new_instance['form_text'];
	        $instance['mailchimp_shortcode'] = $new_instance['mailchimp_shortcode'];
	        $instance['info_title'] = $new_instance['info_title'];

	        return $instance;
	    }

	    function form( $instance ) {
	        // Output admin widget options form
	        $instance = wp_parse_args( (array) $instance, array(
	                'title' => '',
	                'form_text' => '',
	                'mailchimp_shortcode' => '',
	                'info_title' => '',
	            )
	        );
	        $title = $instance['title'];
	        $form_text = $instance['form_text'];
	        $mailchimp_shortcode = $instance['mailchimp_shortcode'];
	        $info_title = $instance['info_title'];

	        ?>
	        <p>
	            <label for="<?php echo esc_html( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title:','consultantpro'); ?>
	                <input class="widefat" id="<?php echo esc_html( $this->get_field_id('title') ); ?>" name="<?php echo esc_html( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label>
	        </p>
	        <p>
	            <label for="<?php echo esc_html( $this->get_field_id('form_text') ); ?>">
	                <?php esc_html_e( 'Text:','consultantpro'); ?>
	                <textarea class="widefat" id="<?php echo esc_html( $this->get_field_id('form_text') ); ?>" name="<?php echo esc_html( $this->get_field_name('form_text') ); ?>"><?php echo esc_attr($form_text); ?></textarea>
	            </label>
	        </p>
	        <p>
	            <label for="<?php echo esc_html( $this->get_field_id('mailchimp_shortcode') ); ?>">
	                <?php esc_html_e( 'Mailchimp shortcode:','consultantpro'); ?>
	                <textarea class="widefat" id="<?php echo esc_html( $this->get_field_id('mailchimp_shortcode') ); ?>" name="<?php echo esc_html( $this->get_field_name('mailchimp_shortcode') ); ?>"><?php echo esc_attr($mailchimp_shortcode); ?></textarea>
	            </label>
	        </p>
	        <p>
	            <label for="<?php echo esc_html( $this->get_field_id('info_title') ); ?>"><?php esc_html_e( 'Information title:','consultantpro'); ?>
	                <input class="widefat" id="<?php echo esc_html( $this->get_field_id('info_title') ); ?>" name="<?php echo esc_html( $this->get_field_name('info_title') ); ?>" type="text" value="<?php echo esc_attr($info_title); ?>" /></label>
	        </p>
	        <?php
	    }
	}

	
}

add_action( 'widgets_init', function() {
    register_widget( 'Barbeshop_Newsletter_Widget' );
});