<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>
	<div class="md:w-1/3 md:mx-auto mt-24">
		<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>	 
	 <div v-if="actionAccess == 'login'">
		 <h2 class="text-center separator-h-c-200 mb-8">Inicio de sesión</h2>
		 <form class="woocommerce-form woocommerce-form-login login flex flex-col w-2/3 mx-auto" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<div class="woocommerce-form-row woocommerce-form-row--wide w-full form-row-wide mb-8">
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center w-full" placeholder="Correo electrónico" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</div>
			<div class="woocommerce-form-row woocommerce-form-row--wide w-full form-row-wide  mb-8">
				<input class="woocommerce-Input woocommerce-Input--text input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center w-full" placeholder="Contraseña" type="password" name="password" id="password" autocomplete="current-password" />
			</div>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<div class="w-full text-center  mb-8">
				<div class="w-2/3 mx-auto rememberme-login">
					<input name="rememberme" type="checkbox" id="rememberme" value="forever" />
					<label for="rememberme" class="border border-kskyblue-100 rounded-full cursor-pointer absolute w-6 h-6 top-0"></label>
					<span class="font-light">Mantener sesión abierta</span>
				</div>
			</div>
			<div class="flex justify-center mb-8">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full mr-2" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
				<button type="button" class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full ml-2" @click="actionAccess = 'register'">Registrar</button>
			</div>
			<p class="woocommerce-LostPassword lost_password">
				<a class="font-light text-kskyblue-100" href="<?php echo esc_url( wp_lostpassword_url() ); ?>">Olvidé mi contraseña</a>
			</p>
			<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
			
			<?php endif; ?>
			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>
	 </div>
	 <?php endif; ?>
	 <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
	 <div v-if="actionAccess == 'register'">
		 <h2 class="text-center separator-h-c-200 mb-8">Registro de Cuenta</h2>
		 <form method="post" class="woocommerce-form woocommerce-form-register register flex flex-col" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide w-full mb-8">
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center" placeholder="Nombre de Usuario" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>
			<div class="flex mb-8">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide w-1/2">
					<input type="text" class="input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center" placeholder="Nombre" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide w-1/2">
					<input type="text" class="input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center" placeholder="Apellido" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    		</p>
			</div>
			<div class="flex mb-8">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide w-1/2">
					<input type="email" class="woocommerce-Input woocommerce-Input--text input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center" placeholder="Correo Electrónico" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>
	
				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
	
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide w-1/2">
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center" placeholder="Contraseña" name="password" id="reg_password" autocomplete="new-password" />
					</p>
	
				<?php else : ?>
	
					<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>
					<?php endif; ?>
			</div>
			<div class="font-light text-center mb-8">
				<?php do_action( 'woocommerce_register_form' ); ?>
			</div>

			<p class="woocommerce-form-row form-row text-center">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-form-register__submit bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">Crear cuenta</button>
			</p>
			<button class="font-light text-kskyblue-100" type="button" @click="actionAccess = 'login'">Ya tengo cuenta, ingresar</button>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>
		</div>
		<?php endif; ?>
  </div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
