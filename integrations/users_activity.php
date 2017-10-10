<?php
	/**
		* Integration
		*
		* @package     
		* @subpackage  Users Activity
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	$data = array(
		'EMAIL' => $userdata['user_email'],
		'NAME' => ! empty( $userdata['user_fname'] ) ? $userdata['user_fname'] : $userdata['user_name'],
		'LNAME' => ! empty( $userdata['user_lname'] ) ? $userdata['user_lname'] : '',		
	);	
	include('integration.php');
	
?>