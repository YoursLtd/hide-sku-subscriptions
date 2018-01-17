<?php
/*
Plugin Name: Hide SKU Subscriptions
Plugin URI: https://github.com/YoursLtd/hide-sku-subscriptions
Author: JointByte - Anthony Iacono
Author URI: http://yoursltd.com/
Version: 1.0
Text Domain: hide-sku-subscriptions
*/

add_action('init', 'hide_sku_subscriptions_init');

function hide_sku_subscriptions_filter($enabled) {
    global $product;
    if(!is_admin() && is_product()) {
	if(WC_Subscriptions_Product::is_subscription($product)) {
		return false;
	}

	return $enabled;
    }

    return $enabled;
}

function hide_sku_subscriptions_init() {
	add_filter('wc_product_sku_enabled', 'hide_sku_subscriptions_filter');
}