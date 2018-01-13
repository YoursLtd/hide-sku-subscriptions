<?php
/*
Plugin Name: Hide SKU Subscriptions
Author: JointByte - Anthony Iacono
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