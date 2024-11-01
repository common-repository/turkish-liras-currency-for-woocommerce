<?php
/**
 * @package WooCommerce için Türk Lirası Simgesi
 * @version 1.0
 */
/**
 * Plugin Name: WooCommerce için Türk Lirası Simgesi
 * Plugin URI: http://buraksah.in/woocommerce-icin-turk-lirasi-simgesi.html
 * Description: Türk Lirası Simgesini Siteniz Kullanabilirsiniz.
 * Version: 1.0
 * Author: Burak Şahin
 * Author URI: http://buraksah.in/
 */

define('TLCWC_PLUGIN_URL', WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)) . '/');


function TLCWC_css(){
	wp_register_style('style.css', TLCWC_PLUGIN_URL . 'style.css');
	wp_enqueue_style('style.css');
}
add_action('init', 'TLCWC_css');

 
function add_my_currency( $currencies ) {
    $currencies['TL'] = __( 'TL Birimi', 'TLCFWC' );
    return $currencies;
}
add_filter( 'woocommerce_currencies', 'add_my_currency' );
  
function add_my_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'TL': $currency_symbol = '<span class="try">t</span>'; break;
    }
    return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

?>