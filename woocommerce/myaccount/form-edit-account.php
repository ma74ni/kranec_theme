<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account flex flex-col" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
	<p class="woocommerce-form-row woocommerce-form-row--first flex items-center justify-between mb-8">
		<label class="w-1/5 text-kskyblue-100" for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>:&nbsp;</label>
		<input type="text" class="w-full woocommerce-Input woocommerce-Input--text input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center" placeholder="Nombre" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>
	<p class="woocommerce-form-row woocommerce-form-row--last flex items-center justify-between mb-8">
		<label class="w-1/5 text-kskyblue-100" for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>:&nbsp;</label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center w-full" placeholder="Apellido" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	</p>
	<div class="clear"></div>

	<div class="woocommerce-form-row woocommerce-form-row--wide mb-8">
		<div class="flex items-center justify-between">
			<label class="w-1/5 text-kskyblue-100" for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>:&nbsp;</label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center w-full" placeholder="Nombre visible" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" />
		</div>
		<div class="flex">
			<div class="w-1/5"></div>
			<small class="font-light text-center w-full"><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></small>
		</div>
	</div>
	<div class="clear"></div>

	<p class="woocommerce-form-row woocommerce-form-row--wide flex items-center justify-between mb-8">
		<label class="w-1/5 text-kskyblue-100" for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>:&nbsp;</label>
		<input type="email" class="woocommerce-Input woocommerce-Input--email input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center w-full" placeholder="Correo electrónico" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
	</p>

	<fieldset class="my-12">
		<legend><?php esc_html_e( 'Password change', 'woocommerce' ); ?></legend>

		<div class="woocommerce-form-row woocommerce-form-row--wide mb-8">
			<div class="flex items-center justify-between">
				<label class="w-1/5 text-kskyblue-100" for="password_current">Contraseña actual: </label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center w-full" placeholder="Contraseña actual" name="password_current" id="password_current" autocomplete="off" />
			</div>
			<div class="flex items-center justify-between">
				<div class="w-1/5"></div>
				<small class="font-light text-center w-full">Dejar en blanco para no cambiar</small>
			</div>
		</div>
		<div class="woocommerce-form-row woocommerce-form-row--wide mb-8">
			<div class="flex items-center justify-between">
				<label class="w-1/5 text-kskyblue-100" for="password_1">Nueva contraseña: </label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center w-full" placeholder="Nueva contraseña" name="password_1" id="password_1" autocomplete="off" />
			</div>
			<div class="flex items-center justify-between">
				<div class="w-1/5"></div>
				<small class="font-light text-center w-full">Dejar en blanco para no cambiar</small>
			</div>
		</div>
		<div class="woocommerce-form-row woocommerce-form-row--wide mb-8">
			<div class="flex items-center justify-between">
				<label class="w-1/5 text-kskyblue-100" for="password_2">Confirmar nueva contraseña: </label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center w-full" placeholder="Confirmar nueva contraseña" name="password_2" id="password_2" autocomplete="off" />
			</div>
			<div class="flex items-center justify-between">
				<div class="w-1/5"></div>
				<small class="font-light text-center w-full">Dejar en blanco para no cambiar</small>
			</div>
		</div>
	</fieldset>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p class="text-center mb-12">
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<button type="submit" class="woocommerce-Button bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
