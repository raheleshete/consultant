<?php
/**
 * Requried functions for theme backend.
 *
 * @package consultant
 * @subpackage Template
 */

/**
 *
 * Helper Functions
 * @since 1.0.0
 * @version 1.0.0
 *
 */

// cs framework missing
if (! function_exists('cs_get_option')) {
   function cs_get_option(){
    return '';
   }
   function cs_get_customize_option(){
    return '';
   }
}


/**
 *
 * Create custom html structure for comments
 *
 */
if ( ! function_exists('consultant_comment' ) ) {
  function consultant_comment( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment;

    $reply_class = ( $comment->comment_parent ) ? 'indented' : '';
    switch ( $comment->comment_type ):
      case 'pingback':
      case 'trackback':
        ?>
          <div class="pingback">
            <?php esc_html_e( 'Pingback:', 'consultantpro' ); ?> <?php comment_author_link(); ?>
            <?php edit_comment_link( esc_html__( '(Edit)', 'consultantpro' ), '<span class="edit-link">', '</span>' ); ?>
          </div>
        <?php
        break;
      default:
        // generate comments
        ?>
          <li <?php comment_class('ct-part'); ?> id="li-comment-<?php comment_ID(); ?>">
          <div id="comment-<?php comment_ID(); ?>">
            <div class="content">
              <div class="person">
                <?php echo get_avatar( $comment, '43', '', '', array('class'=>'img-circle') ); ?>
                <a href="#" class="author">
                  <?php comment_author(); ?>
                </a>
              <span class="comment-date">
                <?php comment_date( get_option('date_format') );?>
              </span>
              </div>
              <div class="text">
                <?php comment_text(); ?>
                <?php
                comment_reply_link(
                    array_merge( $args,
                        array(
                            'reply_text' => esc_html__( 'Reply', 'consultantpro' ),
                            'after' => '',
                            'depth' => $depth,
                            'max_depth' => $args['max_depth']
                        )
                    )
                );
                ?>
              </div>
            </div>
          </div>
         
        <?php
        break;
    endswitch;
  }
}


/**
 *
 * Get categories for shortcode.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists('consultant_element_values' ) ) {
  function consultant_element_values() {

    $args = array(
      'type'     => 'post',
      'taxonomy' => 'category'
    ); 

    $categories = get_categories( $args );
    $list = array();

    foreach ( $categories as $category ) {
      $list[$category->name] = $category->term_id;
    }
    return $list;
  }
}

/*
 * Change exerpt end. 
 */
if ( ! function_exists('consultant_excerpt_more' ) ) {
  function consultant_excerpt_more( $more ) {
    return '...';
  }
}
add_filter('excerpt_more', 'consultant_excerpt_more');


if ( ! function_exists('consultant_wp_link_pages' ) ) {
  function consultant_wp_link_pages() {
    get_post_format();
  }
}

/**
 *
 * Get categories for shortcode.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists('consultant_categories' ) ) {
  function consultant_categories() {

    $args = array(
      'type'     => 'post',
      'taxonomy' => 'category'
    ); 

    $categories = get_categories( $args );
    $list = array();

    foreach ( $categories as $category ) {
      $list[$category->name] = $category->slug;
    }
    return $list;
  }
}



if ( ! function_exists('consultant_portfolio' ) ) {
  function consultant_portfolio() {

    $args = array(
      'type'     => 'portfolio',
      'taxonomy' => 'portfolio-category'
    ); 

    $categories = get_terms( $args );
    $list = array();

    foreach ( $categories as $category ) {
      if(!empty($category->name)) {
        $category->name=str_replace("&amp;","&",$category->name);
      }
      if(!empty($category->slug)) {
        $list[$category->name] = $category->slug;
      }
    }
    return $list;
  }
}

// Change excerpt length.
if ( ! function_exists('consultant_excerpt_length' ) ) {
  function consultant_excerpt_length( $length ) {
    return 22;
  }
}
add_filter( 'excerpt_length', 'consultant_excerpt_length', 999 );

// Custom row styles for onepage site type+-.


// Remove role attribute from search form.
if ( ! function_exists('consultant_valid_search_form' ) ) {
  function consultant_valid_search_form ($form) {
    return str_replace('role="search" ', '', $form);
  }
}
add_filter('get_search_form', 'consultant_valid_search_form');






 
if ( ! function_exists( 'consultant_get_fd_forms' ) ) {
  function consultant_get_fd_forms() {
    $forms = array( '- Select form -' => 'none' );

    if ( function_exists('frm_forms_autoloader') ) {
      global $wpdb;
      
      $where = array(
      'status' => array( null, '', 'published' ),
    );
    $forms_arr = FrmForm::getAll( $where, 'name' );
      if(  $forms_arr ) {
        foreach ( $forms_arr as $cform ) {
          $forms[$cform->name] = $cform->id;
        }
      }
    } 

    return $forms;
  }
}


if ( ! function_exists( 'consultant_get_imstagram' ) ) {
    function consultant_get_imstagram( $username, $count_photos = 7 ) {
        $error       = false;
        $media_array = '';
        if ( false === ( $instagram = get_transient( 'instagram-media-' . sanitize_title_with_dashes( $username ) ) ) ) {

            $remote = wp_remote_get( 'http://instagram.com/' . trim( $username ) );
            if ( is_wp_error( $remote ) ) {
                $error = esc_html__( 'Unable to communicate with Instagram.', 'consultantpro' );
            }
            if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {
                $error = esc_html__( 'Instagram error.', 'consultantpro' );
            }
            $shared      = explode( 'window._sharedData = ', $remote['body'] );
            $insta_json  = explode( ';</script>', $shared[1] );
            $insta_array = json_decode( $insta_json[0], true );
            if ( ! $insta_array ) {
                $error = esc_html__( 'Instagram has returned invalid data.', 'consultantpro' );
            }
            if ( ! $error ) {
                $images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];

                $instagram = array();
                foreach ( $images as $image ) {
                    $image['link']        = $image['code'];
                    $image['display_src'] = $image['display_src'];
                    $instagram[]          = array(
                        'link'  => $image['link'],
                        'large' => $image['display_src']
                    );
                }
                $instagram = serialize( $instagram );
                set_transient( 'instagram-media-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
            }
        }
        if ( $error ) {
            $output = $error;
        } else {
            $instagram    = unserialize( $instagram );
            $count_photos = ( ! empty( $count_photos ) && is_numeric( $count_photos ) ) ? $count_photos : 7;
            $media_array  = array_slice( $instagram, 0, $count_photos );
        }

        return $media_array;
    }
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

// consultant logo
if(!function_exists('consultant_logo')) {
  function consultant_logo($type='main') {
    $name_image_option = 'logo_image';
    $name_logotype = 'logotype';
    $name_text_option = 'logotext';
    if($type=='footer') {
      $name_image_option = 'footer_'.$name_image_option;
      $name_text_option = 'footer_'.$name_text_option;
      $name_logotype = 'footer_'.$name_logotype;
    } 
    $logo_data = get_post_meta( get_the_ID(), '_custom_logo_options', true );
    if(!empty($logo_data['logo_image_custom']) || !empty($logo_data['logotext_custom'])) {
      if($logo_data['logotype']=='image') {
        echo '<img src='.esc_url( $logo_data['logo_image_custom'] ).' alt="">';
      } else {
        echo  '<p class="text-logo">'.$logo_data['logotext_custom'].'</p>';
      }
    } else {
      if (cs_get_option($name_image_option) && cs_get_option($name_logotype)=='image') { 
        $imgSrc = apply_filters( 'consultant_top_logo', cs_get_option($name_image_option)); 
        echo '<img src='.esc_url( $imgSrc ).' alt="">';
      }
      elseif(cs_get_option($name_text_option) && cs_get_option($name_logotype)=='text') {
        echo  '<p class="text-logo">'.esc_attr(cs_get_option($name_text_option)).'</p>';
      }
      else { 
       echo  get_option('blogname');
      } 
    }
  }
}


if(!function_exists('consultant_different_menu')) {
  function consultant_different_menu($menus='') {
    if(!empty($menus)) {
        $params_menu = array(    
            'theme_location' => 'primary-menu',    
            'container' => 'nav',   
            'container_class' => 'topmenu',    
            'depth' => 3,   
            'items_wrap' => '<ul id="nav" class="%2$s">%3$s</ul>'
        );
        $params_menu['menu'] = $menus;
        wp_nav_menu($params_menu);
    }
  }
}





 
/**
 * Сustom consultant menu.
 */
if ( ! function_exists('consultant_custom_menu' ) ) {
    function consultant_custom_menu() {
        if ( has_nav_menu( 'primary-menu' ) ) {
            $top_walker = new consultantTopMenuWalker();
            wp_nav_menu( 
                array( 
                    'container'      => '', 
                    'theme_location' => 'primary-menu',
                    'walker'         => $top_walker
                )
            );
        } else {
            print '<span class="no-menu">' . esc_html__( 'Please register Top Navigation from', 'consultantpro' ) . '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" target="_blank">' . esc_html__( 'Appearance &gt; Menus', 'consultantpro' ) . '</a></span>';
        }
    }
}


if ( ! function_exists( 'consultant_select_menu' ) ) {
  function consultant_select_menu( $class = '' ) {
    $menus = wp_get_nav_menus();

    $array = array();

    foreach ( $menus as $key => $menu ) {
       $array[ $menu->slug ] = $menu->name;
    }
    array_unshift($array, "No select");
    return $array;
  }
} 


if ( ! function_exists('consultant_footer_menu' ) ) {
    function consultant_footer_menu() {
        if ( has_nav_menu( 'footer-menu' ) ) {
            $top_walker = new consultantTopMenuWalker();
            echo '<nav class="lx-footer-menu">';
              wp_nav_menu( 
                  array( 
                      'container'      => '', 
                      'theme_location' => 'footer-menu',
                      'walker'         => $top_walker,
                      'depth'         => 1,
                  )
              );
            echo '</nav>';
        }
    }
}


if ( ! class_exists('consultantTopMenuWalker' ) ) {
    class consultantTopMenuWalker extends Walker_Nav_Menu { 
        // change view of top navigation menu items
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            $classes[] = 'page-scroll';

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = ' class="' . esc_attr( $class_names ) . '"';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li ' . $id . $value . $class_names .'>';

            $cur_post = get_post($item->object_id);
            @$slug = "#" . $cur_post->post_name;

            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            
            if ( substr_count($class_names, 'menu-item-has-children') ) {
                $attributes .= ' data-toggle="dropdown"';
            }
            
            $page_list = apply_filters('consultant_favorite_page', cs_get_option('favorite_page') );
            if ( get_option('show_on_front') == 'page' && cs_get_option('site_type') == 'onepage' ) {
                $pages = get_all_page_ids();
                $blog_page = get_option( 'page_for_posts' );

                if ( $blog_page && ( $key = array_search( $blog_page, $pages ) ) !== false ) {
                    unset($pages[$key]);
                }

                if (! empty( $page_list ) && in_array( $item->object_id, $page_list ) ) { // Custom page list in onepage
                    if( is_page() && in_array( get_the_ID(), $page_list ) ) {
                        $attributes .= ! empty( $item->object_id )  ? ' class="anchor-scroll" href="' . esc_url( $slug ) . '"' : '';
                    } else {
                        $attributes .= ! empty( $item->object_id )  ? ' class="test 3" href="' . home_url( '/' ) . '#' . esc_attr( $cur_post->post_name ) . '"' : '';
                    }
                } else {
                    $attributes .= ! empty( $item->url ) ? ' class="test 1" href="' . esc_url( $item->url ) . '" ' : '';
                }
            } else {
                $attributes .= ! empty( $item->url ) ? ' class="test 2" href="' . esc_url( $item->url ) . '" ' : '';
            }

            $item_output = $args->before;
            $item_output .= '<a '. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }
}


function consultant_custom_body_class( $classes ) {

    if( ! class_exists( 'consultant_Plugins' ) ) {
      $classes[] .= ' no-consultant-plugin';
    }

    if( cs_get_option('site_type') == 'onepage' && is_front_page() ) {
      $classes[] .= ' consultant-one-page';
    }

    return $classes;
}
add_filter( 'body_class', 'consultant_custom_body_class' );