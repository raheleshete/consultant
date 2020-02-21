<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

if ( $related_products ) : ?>

	<div class="related products">

		<h2><?php esc_html_e( 'Related Products', 'consultantpro' ); ?></h2>

        <?php woocommerce_product_loop_start(); ?>

            <?php foreach ( $related_products as $related_product ) : ?>

                <?php 
                    $post_object = get_post( $post->ID );
                    setup_postdata( $GLOBALS['post'] =& $post_object ); 
                ?>

                <li <?php post_class( 'col-gutter-4 item' ); ?>>

                    <!-- Product image -->
                    <div class="product-img">

                        <!-- Sale marker -->
                        <?php if ( $product->is_on_sale() ) : ?>
                            <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale', 'consultantpro' ) . '</span>', $post, $product ); ?>
                        <?php endif; ?>


                        <div class="hover-img dark">
                            <a href="<?php the_permalink(); ?>" class="link-detail">
                                <!-- Add to cart button -->
                                <div class="button-cart">
                                    <?php woocommerce_template_loop_product_thumbnail(); ?>
                                </div>
                            </a>
                        </div>
                    </div> 
                   

                    <!-- Product info -->
                    <div class="product-info">
                        <div class="product-info-content">
                            <h4 class="product-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <?php wc_get_template( 'loop/price.php' ); ?>
                        </div>
                    </div>

                </li>

            <?php endforeach; ?>

        <?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
