<?php
	/**
		* Integration
		*
		* @package     
		* @subpackage  Wow Forms
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit;	
	
	$data = array(
		'EMAIL' => $email,
		'NAME' => $name,		
	);	
	include('integration.php');
	
?>