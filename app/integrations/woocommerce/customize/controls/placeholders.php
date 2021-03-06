<?php
/**
 * Image placeholder controls.
 *
 * @since 1.0.0
 *
 * @package BigBox
 * @category Theme
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Image placeholder control.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function bigbox_woocommerce_customize_register_placeholder_controls( $wp_customize ) {
	// Position.
	$wp_customize->add_setting(
		'display-image-placeholders',
		[
			'default'           => true,
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'display-image-placeholders',
		[
			/* translators: Customizer control label. */
			'label'    => __( 'Display product image placeholders', 'bigbox' ),
			'type'     => 'checkbox',
			'section'  => 'woocommerce_product_images',
			'priority' => 5,
		]
	);
}
add_action( 'customize_register', 'bigbox_woocommerce_customize_register_placeholder_controls' );
