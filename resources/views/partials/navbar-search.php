<?php
/**
 * Searching in the nav bar.
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

if ( ! bigbox_is_integration_active( 'woocommerce' ) ) :
	return;
endif;
?>

<form id="primary-search" action="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" method="GET" class="navbar-search">

	<?php
	$mod       = get_theme_mod( 'navbar-dropdown-source', 'product_cat' );
	$whitelist = bigbox_woocommerce_customize_get_dropdown_taxonomies();
	$taxonomy  = get_taxonomy( in_array( $mod, $whitelist ) ? $mod : 'product_cat' );
	$terms     = get_terms( apply_filters( 'bigbox_navbar_search_dropdown',
		[
			'taxonomy'   => $taxonomy->name,
			'hide_empty' => false,
		]
	) );

	if ( $terms && ! is_wp_error( $terms ) && ! empty( $terms ) ) :
		$selected = isset( $_GET[ $taxonomy->name ] ) ? esc_attr( $_GET[ $taxonomy->name ] ) : null;

		// Translators: %s Header search taxonomy label.
		$all = '<option value="">' . esc_html( sprintf( __( 'All %s', 'bigbox' ), strtolower( $taxonomy->labels->name ) ) ) . '</option>';
	?>

	<div id="navbar-search__category" class="navbar-search__category">
		<label for="<?php echo esc_attr( $taxonomy->name ); ?>" class="screen-reader-text">
			<?php
			// Translators: %s Header search taxonomy name.
			echo esc_html( sprintf( __( 'Choose a %s', 'bigbox' ), strtolower( $taxonomy->labels->singular_name ) ) );
			?>:
		</label>

		<select name="<?php echo esc_attr( $taxonomy->name ); ?>">
			<?php echo $all; // WPCS: XSS okay. ?>
			<?php foreach ( $terms as $term ) : ?>
			<option value="<?php echo esc_attr( $term->slug ); ?>" <?php selected( $selected, $term->slug ); ?>><?php echo esc_html( $term->name ); ?></option>
			<?php endforeach; ?>
		</select>

		<select>
			<?php
			if ( $selected ) :
				echo '<option>' . $selected . '</option>'; // WPCS: XSS okay.
			else :
				echo $all; // WPCS: XSS okay.
			endif;
			?>
		</select>
	</div>

	<?php endif; ?>

	<div class="navbar-search__keywords">
		<label for="s" class="screen-reader-text"><?php esc_html_e( 'Find a product', 'bigbox' ); ?>:</label>
		<input type="search" name="s" class="form-input" placeholder="<?php esc_html_e( 'Find a product...', 'bigbox' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" />
	</div>

	<div class="navbar-search__submit">
		<button type="submit" aria-title="<?php esc_attr_e( 'Search', 'bigbox' ); ?>">
			<?php bigbox_svg( 'search' ); ?>
		</button>

		<input type="hidden" name="post_type" value="product" />
	</div>

</form>
