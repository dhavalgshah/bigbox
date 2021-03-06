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
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$product = wc_get_product( get_the_ID() );

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( 'product', $product ); ?>>
	<?php
	/**
	 * Before shop loop item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>

	<?php if ( bigbox_woocommerce_has_product_image( $product ) ) : ?>
	<div class="product__preview">
		<a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', $product->get_permalink(), $product ) ); ?>" aria-label="<?php echo esc_attr( $product->get_title() ); ?>" tabindex="-1">
			<?php
			/**
			 * Before shop loop item title.
			 *
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
		</a>
	</div>
	<?php endif; ?>

	<div class="product__description">

		<h2 class="product__title">
			<a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', $product->get_permalink(), $product ) ); ?>">
				<?php echo esc_html( get_the_title( $product->get_id() ) ); ?>
			</a>
		</h2>

		<?php
		/**
		 * Shop loop item title.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' );
		?>

		<?php
		/**
		 * After shop loop item title.
		 *
		 * @hooked woocommerce_template_loop_rating - 1
		 * @hooked woocommerce_template_loop_price - 3
		 * @hooked woocommerce_show_product_loop_sale_flash - 6
		 * @hooked bigbox_woocommerce_template_loop_variations - 9
		 * @hooked bigbox_woocommerce_template_loop_stock - 12
		 * @hooked bigbox_woocommerce_template_short_description - 15
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

		<?php
		/**
		 * After shop loop item.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item' );
		?>

	</div>

</li>
