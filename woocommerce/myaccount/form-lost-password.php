<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>
<div class="md:w-2/3 md:mx-auto mt-24">
	<h2 class="text-center separator-h-c-200 mb-8">Restablecer contraseña</h2>
	<form method="post" class="woocommerce-ResetPassword lost_reset_password text-center">

		<p class="text-2xl my-8">Enviaremos un correo electrónico para restablecer tú contraseña</p><?php // @codingStandardsIgnoreLine ?>

		<p class="w-2/3 mx-auto">
			<input class="woocommerce-Input woocommerce-Input--text input-text w-full appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center w-full" placeholder="Correo electrónico" type="text" name="user_login" id="user_login" autocomplete="username" />
		</p>

		<div class="clear"></div>

		<?php do_action( 'woocommerce_lostpassword_form' ); ?>

		<p class="my-8">
			<input type="hidden" name="wc_reset_password" value="true" />
			<button type="submit" class="woocommerce-Button bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
		</p>

		<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

	</form>
</div>

<?php
do_action( 'woocommerce_after_lost_password_form' );
