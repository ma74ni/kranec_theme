<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<div class="mx-8 text-center border border border-kskyblue-100 rounded-lg p-4 my-8">
				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed mb-4"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
					<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="pay bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
					<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="pay bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
					<?php endif; ?>
				</p>
			</div>

		<?php else : ?>

			<div class="text-center">
				<div class="my-10">
					<svg width="198.83" height="34" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 257.79 44.08" class="fill-current text-kblue-100 inline-block"><polygon class="cls-1" points="39.71 0.21 26.72 0.21 11.2 19.89 11.2 0.21 0 0.21 0 43.65 11.2 43.65 11.2 29.48 13.81 26.27 26.79 43.65 40.55 43.65 22.73 20.31 39.71 0.21"/><path class="cls-1" d="M78.43,20a13,13,0,0,0,2.23-7.85,10.78,10.78,0,0,0-1.44-5.82,11.31,11.31,0,0,0-3.9-3.78A14.44,14.44,0,0,0,70.13.64,44.67,44.67,0,0,0,63.51.21H44.72V43.65H55.86V27.72h5.2L72.87,43.65H86.56L72.06,25A16.77,16.77,0,0,0,78.43,20Zm-9.89-3.54a5.1,5.1,0,0,1-2.82,2.6,12.33,12.33,0,0,1-3.31.28c-.84,0-1.67,0-2.49,0H55l.05-11H60c1.34,0,2.52,0,3.53.1a7.78,7.78,0,0,1,2.55.47,4.55,4.55,0,0,1,2.31,1.83,5.6,5.6,0,0,1,.66,2.8A6.71,6.71,0,0,1,68.54,16.45Z"/><path class="cls-1" d="M105.32.21l-16,43.44h11.29l3-8.78h16.07l3,8.78h11.58L118.23.21Zm1,27.31,5.35-16.18L117,27.52Z"/><polygon class="cls-1" points="168.52 25.09 151.56 0.21 137.57 0.21 137.57 43.65 147.89 43.65 147.89 13.84 167.56 43.65 178.84 43.65 178.84 0.21 168.52 0.21 168.52 25.09"/><polygon class="cls-1" points="185.48 43.65 216.89 43.65 216.89 35.74 196.03 35.74 196.03 24.9 213.22 24.9 213.22 16.49 196.03 16.49 196.03 8.61 216.89 8.61 216.89 0.21 185.48 0.21 185.48 43.65"/><path class="cls-1" d="M235.73,11.34a11.19,11.19,0,0,1,3.94-2.41,14,14,0,0,1,4.5-.72,12.36,12.36,0,0,1,4,.62,19.49,19.49,0,0,1,3.47,1.53,27.58,27.58,0,0,1,2.82,1.85c.82.62,1.51,1.16,2.06,1.61h1.28V3.54c-.8-.38-1.73-.8-2.79-1.24a26.54,26.54,0,0,0-3.54-1.22A35.51,35.51,0,0,0,247.39.3a36.81,36.81,0,0,0-4.94-.3,26.23,26.23,0,0,0-9.15,1.54,19.14,19.14,0,0,0-7,4.36,19.4,19.4,0,0,0-4.49,7,25.78,25.78,0,0,0-1.55,9.14,26.13,26.13,0,0,0,1.62,9.56,18.53,18.53,0,0,0,4.57,6.89,19.26,19.26,0,0,0,7,4.16,27.63,27.63,0,0,0,8.95,1.39,32.59,32.59,0,0,0,5.13-.31,38.56,38.56,0,0,0,4-.91,23.41,23.41,0,0,0,3.12-1.09c1-.41,2-.86,3.12-1.33V30.3h-1.17c-.52.45-1.19,1-2,1.61A24.37,24.37,0,0,1,252,33.67a16.11,16.11,0,0,1-3.69,1.61,14,14,0,0,1-4,.6,14.55,14.55,0,0,1-4.32-.67,10.73,10.73,0,0,1-4-2.23,11.52,11.52,0,0,1-2.9-4.21,16.65,16.65,0,0,1-1.16-6.65A17.56,17.56,0,0,1,233,15.63,11.73,11.73,0,0,1,235.73,11.34Z"/></svg>
				</div>
				<div>
					<p class="font-light text-3xl">
						te agradece por tu compra.
					</p>
				</div>
				<div class="my-8 pb-8 separator-h-c-200">
					<svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66.9 66.9" class="fill-current text-kskyblue-100 inline-block"><path d="M33.45,0A33.45,33.45,0,1,0,66.9,33.45,33.46,33.46,0,0,0,33.45,0Zm0,62.12A28.67,28.67,0,1,1,62.12,33.45,28.67,28.67,0,0,1,33.45,62.12Z"/><path class="cls-1" d="M48.49,19.81,26.28,42l-7.87-7.87A2.39,2.39,0,1,0,15,37.47l.06.06,9.55,9.56a2.4,2.4,0,0,0,3.38,0l23.9-23.9a2.39,2.39,0,0,0-3.38-3.38Z"/></svg>
				</div>
				<div>
					<a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full">Volver a la tienda</a>
				</div>
			</div>

			<div class="my-8 w-3/5 mx-auto text-center">
				<ul class="woocommerce-order-overview woocommerce-thankyou-order-details flex justify-center divide-x divide-kskyblue-100">

					<li class="woocommerce-order-overview__order order px-4 py-2 m-2">
						<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
						<strong class="block"><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>

					<li class="woocommerce-order-overview__date date px-4 py-2 m-2">
						<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
						<strong class="block"><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>

					<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
						<li class="woocommerce-order-overview__email email px-4 py-2 m-2">
							<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
							<strong class="block"><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
						</li>
					<?php endif; ?>

					<li class="woocommerce-order-overview__total total px-4 py-2 m-2">
						<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
						<strong class="block"><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>

					<?php if ( $order->get_payment_method_title() ) : ?>
						<li class="woocommerce-order-overview__payment-method method px-4 py-2 m-2">
							<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
							<strong class="block"><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
						</li>
					<?php endif; ?>

				</ul>
			</div>

		<?php endif; ?>

		<div class="text-center font-light">
			<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
			<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
		</div>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
