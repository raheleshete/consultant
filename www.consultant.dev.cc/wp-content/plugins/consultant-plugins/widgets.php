<?php


//REGISTER CUSTOM WIDGETS


if ( ! class_exists('Consultant_Latest_Posts_Widget' ) ) {
	class Consultant_Latest_Posts_Widget extends WP_Widget {
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
  register_widget( 'Consultant_Latest_Posts_Widget' );
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
	    $instance['tw_app_id'] = strip_tags( $new_instance['tw_app_id'] );
	    $instance['tw_secret_id'] = strip_tags( $new_instance['tw_secret_id'] );
	    $instance['twitter_page_id'] = strip_tags( $new_instance['twitter_page_id'] );
	    $instance['title'] = strip_tags( $new_instance['title'] );
	    $instance['count_posts'] = strip_tags( $new_instance['count_posts'] );
	    return $instance;
	  }
	  public function form( $instance ) {
	    $instance['tw_app_id'] = ( isset( $instance['tw_app_id'] ) && ! empty( $instance['tw_app_id'] ) ) ? $instance['tw_app_id'] : '';
	    $instance['tw_secret_id'] = ( isset( $instance['tw_secret_id'] ) && ! empty( $instance['tw_secret_id'] ) ) ? $instance['tw_secret_id'] : '';
	    $instance['twitter_page_id'] = ( isset( $instance['twitter_page_id'] ) && ! empty( $instance['twitter_page_id'] ) ) ? $instance['twitter_page_id'] : '';
	    $instance['title'] = ( isset( $instance['title'] ) && ! empty( $instance['title'] ) ) ? $instance['title'] : '';
	    $instance['count_posts'] = ( isset( $instance['count_posts'] ) && ! empty( $instance['count_posts'] ) ) ? $instance['count_posts'] : '';
	    ?>
	    <p>
	      <label for="<?php echo esc_html( $this->get_field_id( 'tw_app_id' ) ); ?>"><?php esc_html_e( 'Twitter API Key', 'consultantpro' ); ?></label>
	      <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'tw_app_id' ) ); ?>" 
	        name="<?php echo esc_html( $this->get_field_name( 'tw_app_id' ) ); ?>" type="text" 
	        value="<?php echo esc_html( $instance['tw_app_id'] ); ?>" />
	    </p>
	    <p>
	      <label for="<?php echo esc_html( $this->get_field_id( 'tw_secret_id' ) ); ?>"><?php esc_html_e( 'Twitter API Secret', 'consultantpro' ); ?></label>
	      <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'tw_secret_id' ) ); ?>" 
	        name="<?php echo esc_html( $this->get_field_name( 'tw_secret_id' ) ); ?>" type="text" 
	        value="<?php echo esc_html( $instance['tw_secret_id'] ); ?>" />
	    </p>
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
	  	require_once EF_ROOT .'/includes/twitter_widget/GetTweetsInPhp.php';
	    /** This filter is documented in wp-includes/default-widgets.php */
	    $tw_app_id = apply_filters( 'widget_title', empty( $instance['tw_app_id'] ) ? '' : $instance['tw_app_id'], $instance, $this->id_base );
	    $tw_secret_id = apply_filters( 'widget_title', empty( $instance['tw_secret_id'] ) ? '' : $instance['tw_secret_id'], $instance, $this->id_base );
	    $twitter_page_id = apply_filters( 'widget_title', empty( $instance['twitter_page_id'] ) ? '' : $instance['twitter_page_id'], $instance, $this->id_base );
	    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
	    $count_posts = ( ! empty( $instance['count_posts'] ) && is_numeric( $instance['count_posts'] ) ) ? $instance['count_posts'] : 2;

	    echo wp_kses_post( $args['before_widget'] );
	    if ( $title ) {
	      echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
	    }

	    $configs = array(
	      'consumer_key' => $tw_app_id, 
	      'consumer_secret' => $tw_secret_id, 
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


class Instagram_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'instagram_widget',
            esc_html__( 'Instagram Widget', 'trill' ),
            array( 'classname' => 'widget-instagram','description' => esc_html__( 'Get latest photos', 'trill' ), )
        );
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['user_name'] = strip_tags( $new_instance['user_name'] );
        $instance['count_photos'] = strip_tags( $new_instance['count_photos'] );
        return $instance;
    }

    public function form( $instance ) {
        $instance['title'] = ( isset( $instance['title'] ) && ! empty( $instance['title'] ) ) ? $instance['title'] : '';
        $instance['user_name'] = ( isset( $instance['user_name'] ) && ! empty( $instance['user_name'] ) ) ? $instance['user_name'] : '';
        $instance['count_photos'] = ( isset( $instance['count_photos'] ) && ! empty( $instance['count_photos'] ) ) ? $instance['count_photos'] : '';
        ?>
        <p>
            <label for="<?php print $this->get_field_id( 'title' ); ?>">
                <?php esc_html_e( 'Title', 'trill' ); ?>
            </label>
            <input class="widefat" id="<?php print $this->get_field_id( 'title' ); ?>"
                   name="<?php print $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php print $instance['title']; ?>" />
        </p>
        <p>
            <label for="<?php print $this->get_field_id( 'count_photos' ); ?>">
                <?php esc_html_e( 'Count photos', 'trill' ); ?>
            </label>
            <input class="widefat" id="<?php print $this->get_field_id( 'count_photos' ); ?>"
                   name="<?php print $this->get_field_name( 'count_photos' ); ?>" type="text"
                   value="<?php print $instance['count_photos']; ?>" />
        </p>
        <p>
            <label for="<?php print $this->get_field_id( 'user_name' ); ?>">
                <?php esc_html_e( 'User name', 'trill' ); ?>
            </label>
            <input class="widefat" id="<?php print $this->get_field_id( 'user_name' ); ?>"
                   name="<?php print $this->get_field_name( 'user_name' ); ?>" type="text"
                   value="<?php print $instance['user_name']; ?>" />
        </p>
        <?php
    }

    public function widget( $args, $instance ) {
        $username = $instance['user_name'];
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $count_photos = ( ! empty( $instance['count_photos'] ) && is_numeric( $instance['count_photos'] ) ) ? $instance['count_photos'] : 2;
        $error = false;

        print $args['before_widget'];
        if ( $title ) {
            print $args['before_title'] . $title . $args['after_title'];
        }

        if( ! empty( $username ) ) {

            if ( false === ( $instagram = get_transient( 'instagram-media-'.sanitize_title_with_dashes( $username ) ) ) ) {

                $remote = wp_remote_get( 'http://instagram.com/' . trim( $username ) );

                if ( is_wp_error( $remote ) ) {
                    $error = esc_html__( 'Unable to communicate with Instagram.', 'trill' );
                }

                if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {
                    $error = esc_html__( 'Instagram error.', 'trill' );
                }

                $shared = explode('window._sharedData = ', $remote['body']);
                $insta_json = explode( ';</script>', $shared[1] );
                $insta_array = json_decode( $insta_json[0], TRUE );

                if ( ! $insta_array ) {
                    $error = esc_html__('Instagram has returned invalid data.', 'trill' );
                }

                if( ! $error ) {
                    $images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];

                    $instagram = array();

                    foreach ( $images as $image ) {

                        $image['link'] = $image['code'];
                        $image['display_src'] = $image['display_src'];

                        $instagram[] = array(
                            'link'  => $image['link'],
                            'large' => $image['display_src']
                        );
                    }

                    $instagram = base64_encode( serialize( $instagram ) );
                    set_transient( 'instagram-media-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS*2 ) );
                }
            }

            if( $error ) {
                $output = $error;
            } else {
                $instagram = unserialize( base64_decode( $instagram ) );
                $media_array = array_slice( $instagram, 0, $count_photos );

                $output  = '<div class="instagram-gallery instagram-gallery--3cols">';

                    foreach ( $media_array as $item ) {
                        $output  .= '<div class="instagram-gallery__item js-width-to-height">';
                            $output  .= '<a href="https://instagram.com/p/'. $item['link'] .'" target="_blanck"><div class="insta-img-wrap" style="background-image:url('.esc_url( $item['large'] ).');"><img class="hidden js-bg" src="' . esc_url( $item['large'] ) . '" alt="" /></div></a>';
                        $output  .= '</div>';
                    }

                $output  .= '</div>';
            }

        } else {
            $output = esc_html__( 'Empty User name field.', 'trill' );
        }
        print $output;
        print $args['after_widget'];
    }
}

add_action( 'widgets_init', function() {
    register_widget( 'Instagram_Widget' );
});



class Consultant_Newsletter_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'Consultant_Newsletter_Widget',
            esc_html__( 'Consultant Newsletter widget', 'consultantpro' ),
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

        echo $args['before_widget'];
        if ( $title ) {
            print $args['before_title'] . $title . $args['after_title'];
        }

        $output = '<div class="lx-mailchimp">';

        $output .= ( ! empty( $form_text ) ) ? '<div class="widget-content">' . $form_text . '</div>' : '';
        $output .= ( ! empty( $mailchimp_shortcode ) ) ?  do_shortcode( $mailchimp_shortcode ) : '';
        $output .= ( ! empty( $info_title ) ) ? '<p class="newsletter-desc"> ' . $info_title . '</p>' : '';
        $output .= '</div>';

        echo $output;

        echo $args['after_widget'];
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
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:','consultantpro'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('form_text'); ?>">
                <?php esc_html_e( 'Text:','consultantpro'); ?>
                <textarea class="widefat" id="<?php echo $this->get_field_id('form_text'); ?>" name="<?php echo $this->get_field_name('form_text'); ?>"><?php echo esc_attr($form_text); ?></textarea>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('mailchimp_shortcode'); ?>">
                <?php esc_html_e( 'Mailchimp shortcode:','consultantpro'); ?>
                <textarea class="widefat" id="<?php echo $this->get_field_id('mailchimp_shortcode'); ?>" name="<?php echo $this->get_field_name('mailchimp_shortcode'); ?>"><?php echo esc_attr($mailchimp_shortcode); ?></textarea>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('info_title'); ?>"><?php esc_html_e( 'Information title:','consultantpro'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('info_title'); ?>" name="<?php echo $this->get_field_name('info_title'); ?>" type="text" value="<?php echo esc_attr($info_title); ?>" /></label>
        </p>
        <?php
    }
}

add_action( 'widgets_init', function() {
    register_widget( 'Consultant_Newsletter_Widget' );
});