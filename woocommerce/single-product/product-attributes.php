<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! $product_attributes ) {
	return;
}
?>
<div class="woocommerce-product-attributes shop_attributes">
	<?php 
	$count = -1;
	foreach ( $product_attributes as $product_attribute_key => $product_attribute ) : ?>
	<div class="border-b pt-2 pb-4 border-kskyblue-100 mb-2 woocommerce-product-attributes-item woocommerce-product-attributes-item--<?php echo esc_attr( $product_attribute_key ); ?>">
		<div @click="showAtribute = <?php echo $count; ?>" class="flex justify-between cursor-pointer">
			<h3 v-bind:class="[showAtribute == <?php echo $count; ?> ? 'active' : '']" class="uppercase font-oswald text-lg mb-2">
				<?php echo wp_kses_post( $product_attribute['label'] ); ?>
			</h3>
			<div class="circle-plus text-xl px-1" v-bind:class="[showAtribute == <?php echo $count; ?> ? 'opened' : 'closed']">
        <div class="circle relative cursor-pointer">
         <div class="horizontal rounded-full absolute bg-kskyblue-100"></div> 
         <div class="vertical rounded-full absolute bg-kskyblue-100"></div>
        </div>
      </div>
		</div>
		<div v-show="showAtribute == <?php echo $count; ?>" class="text-base px-2 text-justify attribute"><?php echo wp_kses_post( $product_attribute['value'] ); ?></div>
	</div>
	<?php 
	$count++;
	endforeach; ?>
</div>
