<?php
	/**
		* Integration
		*
		* @package     
		* @subpackage  WooCommerce
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	$order = wc_get_order( $order_id );	
	if( method_exists( $order, 'get_billing_email' ) ) {
            $data = array(
                'EMAIL' => $order->get_billing_email(),
                'NAME' => "{$order->get_billing_first_name()} {$order->get_billing_last_name()}",
                'FNAME' => $order->get_billing_first_name(),
                'LNAME' => $order->get_billing_last_name(),
            );
        } else {
		    // NOTE: for compatibility with WooCommerce < 3.0
            $data = array(
                'EMAIL' => $order->billing_email,
                'NAME' => "{$order->billing_first_name} {$order->billing_last_name}",
                'FNAME' => $order->billing_first_name,
                'LNAME' => $order->billing_last_name,
            );
        }
	include('integration.php');
	
?>