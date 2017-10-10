<?php
	/**
		* Integration
		*
		* @package     
		* @subpackage  Easy Digital Downloads
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	if ( ! defined( 'ABSPATH' ) ) exit;	
	$email = (string) edd_get_payment_user_email( $payment_id );
	$user_info = (array) edd_get_payment_meta_user_info( $payment_id );
	$data = array(
		'EMAIL' => $email,
		'NAME' => ! empty( $user_info['first_name'] ) ? $user_info['first_name'] : '',
		'LNAME' => ! empty( $user_info['last_name'] ) ? $user_info['last_name'] : '',
	);
	
	include('integration.php');
	
?>