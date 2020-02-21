<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $post;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

?>
<li <?php post_class(); ?>>

	<div class="prod-content-wrap">
		<div class="consultant-prod-list-image s-back-switch">

			<form class="cart consultant-add-cart-prod" method="post" enctype='multipart/form-data'>
			   <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

			   <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" />

			   <button type="submit" class="single_add_to_cart_button button alt"><?php esc_html_e( 'Buy now', 'consultantpro' ) ?></button>

			   <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			</form>

			<?php if ( $product->is_on_sale() ) : ?>

				<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'consultantpro' ) . '</span>', $post, $product ); ?>

			<?php endif;  

			$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );

			if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>">
			<?php
				$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
				the_post_thumbnail( $post->ID, $image_size, array(
					'title'	 => $props['title'],
					'alt'    => $props['alt'],
					'class'  => 's-img-switch',
				) );
			?>
			</a>
			<?php
			} elseif ( wc_placeholder_img_src() ) {
				echo wc_placeholder_img( $image_size );
			}
			?>

			<?php //do_action( 'woocommerce_after_shop_loop_item' ); ?>

		</div>

		<?php
		/**
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		?>
		<a href="<?php the_permalink(); ?>" class="consultant-prod-list-name">
			<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
		</a>

	    <?php
		/**
		 *
		 * @include woocommerce price product
		 */
		 wc_get_template( 'loop/price.php' );
		?>
	</div>

	
</li>
