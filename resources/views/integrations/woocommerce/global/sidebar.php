<?php
/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
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
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$sidebar_id = is_page_template( bigbox_woocommerce_dynamic_shop_page_template() ) ? 'page-' . get_the_ID() : 'shop';
$sidebar    = bigbox_get_cached_sidebar( is_active_sidebar( $sidebar_id ) ? $sidebar_id : 'shop' );

if ( '' === $sidebar ) :
	return;
endif;
?>

<div id="secondary" class="site-secondary shop-filters" role="complementary">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to results', 'bigbox' ); ?></a>

	<div class="offcanvas-drawer__content">
		<?php echo $sidebar; // WPCS: XSS okay. ?>
	</div>
</div>
