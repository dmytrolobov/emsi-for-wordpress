<?php
	/**
		* Integration
		*
		* @package     
		* @subpackage  Registration
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	$user = new WP_User( $user_id );
	$data = array(
		'EMAIL' => $user->user_email,
		'NAME' => $user->user_login,
		'LNAME' => '',
	);	
	if( '' !== $user->first_name ) {
		$data['NAME'] = $user->first_name;		
	}	
	if( '' !== $user->last_name ) {
		$data['LNAME'] = $user->last_name;
	}	
	include('integration.php');
	
?>