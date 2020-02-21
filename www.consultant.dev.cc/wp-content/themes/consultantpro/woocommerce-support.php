<?php 
/* All functions for WooCommerce */

/* add support woocommerce to theme */
if ( ! function_exists('consultant_woocommerce_support' ) ) {
	function consultant_woocommerce_support( )
	{
		add_theme_support( 'woocommerce' );
	}
}
add_action( 'after_setup_theme', 'consultant_woocommerce_support' );

if ( ! function_exists('consultant_woocommerce_scripts')) {
	function consultant_woocommerce_scripts()
	{	

		// consultant options
		$consultant = wp_get_theme();

		wp_enqueue_style( 'consultant_woocommerce_style', get_template_directory_uri() . '/woocommerce-support.css', array(), apply_filters( 'consultant_version_filter', $consultant->get( 'Version' ) ) );

		if ( is_product() ) {
			wp_enqueue_script( 'consultant_woocommerce_js', get_template_directory_uri() . '/woocommerce-support.js', array( 'jquery' ), apply_filters( 'consultant_version_filter', $consultant->get( 'Version' )), true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'consultant_woocommerce_scripts');

/* eccommerce_theme_options filters */
if ( ! function_exists('consultant_woocommerce_theme_options')) {
	function consultant_woocommerce_theme_options( $options = array() ) {
		$options[] = array(
			'name'   => 'ecommerce_options',
			'title'  => 'Ecommerce',
			'icon'   => 'fa fa-shopping-cart',
			// begin: fields
			'fields' => array(
			  array(
			    'id'      => 'shop_heading_image',
			    'type'    => 'image',
			    'title'   => 'Shop heading Image',
			  ),  
			  array(
			    'id'      => 'shop_heading_title',
			    'type'    => 'text',
			    'title'   => 'Shop heading title',
			  ), 
			  array(
			    'id'       => 'shop_heading_description',
			    'type'     => 'wysiwyg',
			    'title'    => 'Shop heading description',
			    'settings' => array(
			      'textarea_rows' => 5,
			      'tinymce'       => false,
			      'media_buttons' => false,
			    )
			  ),
			  array(
			    'id'      => 'products_per_row',
			    'type'    => 'select',
			    'title'   => 'Products per row',
			    'options' => array(
			      'col-md-4'  => 'Three columns',
			      'col-md-3'  => 'Four columns',
			      'col-md-6'  => 'Two columns',
			    ),
			    'default' => 'col-md-4',
			  ),
			),
		);
		return $options;
	}
}

add_filter( 'eccommerce_theme_options', 'consultant_woocommerce_theme_options' );

/* add banner to shop page */
if ( ! function_exists('consultant_add_shop_banner')) {
	function consultant_add_shop_banner( )
	{	
		$class_banner = cs_get_option('shop_heading_image') ? 'banner-text-white' : '';
		?>
		<?php if ( ( cs_get_option('shop_heading_title') || cs_get_option('shop_heading_description')) && ( is_shop() || is_product() || is_cart() )  ): ?>
		<div class="banner-shop s-back-switch <?php echo esc_attr( $class_banner ); ?>">
	    	<span class="enable_overlay"></span>
		    <div class="container">
		    	
			    <?php 
			    	if(cs_get_option('shop_heading_image')) {
			    		echo wp_get_attachment_image( cs_get_option('shop_heading_image'), 'full', '', array('class'=>'s-img-switch') ); 
			    	}
			    ?>

			    <?php if (cs_get_option('shop_heading_title')) { ?>
			    <h2 class="banner-shop__title"><?php echo esc_html(cs_get_option('shop_heading_title')); ?></h2>
			    <?php } ?>

			    <?php if (cs_get_option('shop_heading_description')): ?>
			    <div class="banner-shop__description">
			        <?php echo esc_html( cs_get_option('shop_heading_description') ); ?>
			    </div>
			    <?php endif ?>
		    </div>

		
		</div>
		<?php endif ?>
		<?php
	}
}
add_action( 'consultant_after_header', 'consultant_add_shop_banner' );


if ( ! function_exists('consultant_shop_post_class')) {
	function consultant_shop_post_class($classes)
	{

		if(is_shop()){
			$classes[] = cs_get_option('products_per_row').' col-xs-6';
			if(($key = array_search('product', $classes)) !== false) {
			    unset($classes[$key]);
			}  
		}

		if ( is_product() ) {
			$classes[] = 'row';
		}

		return $classes;
	}
}
add_filter( 'post_class', 'consultant_shop_post_class',100) ;


