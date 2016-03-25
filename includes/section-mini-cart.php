<?php
global $woo_options;
global $woocommerce;

/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>
<div class="woocommerce widget_shopping_cart">

<ul class="cart_list product_list_widget widget_shopping_cart">

	<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

		<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

					$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
					$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					
					?>
					<li>
					<div class="zone-mini-cart-item-thumb">
						<?php if ( ! $_product->is_visible() ) : ?>
							<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) ?>
						<?php else : ?>
							<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
								<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
							</a>
						<?php endif; ?>
					</div>
					<div class="zone-mini-cart-item-info">
						<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"><?php echo esc_html( $product_name ) ?></a>
						<div class="zone-mini-cart-item-data"><?php echo WC()->cart->get_item_data( $cart_item ); ?></div>
						<ul>
							<li><strong><?php esc_html_e( 'Unit Price', THEME_TEXT_DOMAIN ) ?>:</strong> <?php echo esc_html( strip_tags( $product_price ) ) ?></li>
							<li><strong><?php esc_html_e( 'Quantity', THEME_TEXT_DOMAIN ) ?>:</strong> <?php echo esc_html( $cart_item['quantity'] ) ?></li>
						</ul>
					</div>
					<div class="clear"></div>
						
						<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="zone-remove-mini-cart-item" title="%s"><i class="btb bt-times bt-fw"></i></a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key ); ?>
					</li>
					<?php
				}
			}
		?>

	<?php else : ?>

		<li class="empty"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></li>

	<?php endif; ?>

</ul><!-- end product list -->

<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

	<p class="subtotal"><strong><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="mini-cart-buttons">
		<a href="<?php echo esc_url( WC()->cart->get_cart_url() ) ?>" class="button wc-forward"><i class="btb bt-shopping-cart"></i> <?php esc_html_e( 'View Cart', 'woocommerce' ); ?></a>
		<a href="<?php echo esc_url( WC()->cart->get_checkout_url() ) ?>" class="button checkout wc-forward"><i class="btb bt-sign-in"></i> <?php esc_html_e( 'Checkout', 'woocommerce' ); ?></a>
	</p>

<?php endif; ?>

</div>


<?php do_action( 'woocommerce_after_mini_cart' ); ?>
